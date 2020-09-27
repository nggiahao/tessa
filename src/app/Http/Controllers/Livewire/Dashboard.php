<?php


namespace Nggiahao\Tessa\app\Http\Controllers\Livewire;


use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view(tessa_view('dashboard'));
    }
}