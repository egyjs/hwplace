<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\Section;
use App\Models\State;
use App\Models\Place;
use Livewire\Component;



class HomeSearch extends Component
{

    public $countries;
    public $selectedCountry;
    public $states;
    public $selectedState;
    public $cities;
    public $selectedCity;
    public $sections;
    public $selectedSection;
    public $places;
    public $query;

    public function mount(){
        $this->countries = Country::all();
        $this->sections = Section::all();

        $this->selectedCountry = $this->countries->first()->id;


        $this->states = State::where('country_id',$this->selectedCountry)->get();

        $this->cities = collect();
        $this->places = collect();
    }

    public function render()
    {
        return view('livewire.home-search');
    }

    public function updatedSelectedState($value)
    {
        $this->cities = City::where('state_id',$this->selectedState)->get();
    }

    public function search()
    {
        return redirect()->route('search',[$this->selectedSection]+$this->getSelections());
//        dd($this->places);
    }

    public function getSelections(){
        return [
            'country' => $this->selectedCountry,
            'state' =>$this->selectedState,
            'city' =>$this->selectedCity,
            'section' =>$this->selectedSection,
            'query' => $this->query,
        ];
    }
}
