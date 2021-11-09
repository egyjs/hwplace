<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Place as PlaceModel;

/**
 * @method static where(\Closure|string $param,$value = null)
 */
class Place extends Component
{
    public $place;

    public function mount($slug){
        $this->place = PlaceModel::where('slug', $slug)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.place')
            ->extends('layout.front')
            ->section('content');
    }
}
