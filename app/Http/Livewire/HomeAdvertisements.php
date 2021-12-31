<?php

namespace App\Http\Livewire;

use App\Models\Advertisement;
use Livewire\Component;

class HomeAdvertisements extends Component
{
    public $advertisements;

    public function mount()
    {
        $this->advertisements = Advertisement::with(['places','places.city','places.state'])->get();
    }


    public function render()
    {
        return view('livewire.home-advertisements');
    }
}
