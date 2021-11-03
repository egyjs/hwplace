<?php

namespace App\Http\Livewire;

use App\Models\Place;
use App\Models\SectionAd;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class HomePlaces extends Component
{
    public $places;
    public $sectionAds;

    public function getPlaces(){
        $request = request();
        $section_id = request()->route('section_id');
        $qString = $request->input('query') ? explode(' ',$request->input('query')) : [];

        $this->places = Place::query();

        if (!empty($qString)){
            $this->places = $this->places->orWhere(function($q)use ($qString) {
                $q = $q
                    ->whereIn('name',$qString)
                    ->orWhereIn('description',$qString)
                    ->orWhereIn('keywords',$qString)
                    ->orWhereHas('section', function (Builder $query) use ($qString) {
                        foreach($qString as $string){
                            $query->orWhere('keywords', 'like', "%$string%");
                            $query->orWhere('name', 'like', "%$string%");
                        }
                    });
                foreach($qString as $string){
                    $q = $q
                        ->orWhere('description', 'like', "%$string%")
                        ->orWhere('keywords', 'like', "%$string%");
                }
            });
        }



        if ($request->city)
            $this->places = $this->places
                ->where('city_id',$request->city);

        $this->places = $this->places
            ->where(function($q)use ($request,$section_id){
                return $q->whereRelation('state','states.id','=',$request->state)
                    ->where('section_id',$section_id);
            })->get();



        //
        return $this->places;

    }

    public function mount()
    {
        $section_id = request()->route('section_id');
        $this->sectionAds = SectionAd::where('section_id',$section_id)->latest()->get();

        $this->places = $this->getPlaces()->count() ? $this->getPlaces() : Place::where('section_id',$section_id)->get();
        // sort
        $qString = request()->input('query') ? explode(' ',request()->input('query')) : [];

        $this->places = $this->sortByMostRelevant($qString);

    }

    function sortByMostRelevant(array $qString = []){
        // sort
        $props = ['name', 'description', 'keywords'];

        return $this->places->sortByDesc(function($i, $k) use ($qString, $props) {
            // The bigger the weight, the higher the record
            $weight = 0;
            // Iterate through search terms
            foreach($qString as $searchTerm) {
                // Iterate through properties ('name', 'description', 'keywords')
                foreach($props as $prop) {
                    // Use strpos instead of %value% (cause php)
                    if(strpos($i->{$prop}, $searchTerm) !== false)
                        $weight += 1; // Increase weight if the search term is found
                }
            }

            return $weight;
        })->values();
    }
    public function render()
    {
        return view('livewire.home-places');
    }
}
