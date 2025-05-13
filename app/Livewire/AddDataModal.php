<?php

namespace App\Livewire;

use Livewire\Component;

class AddDataModal extends Component
{
    public $showingModal = false;

    public function openModal()
    {
        $this->showingModal = true;
    }

    public function closeModal()
    {
        $this->showingModal = false;
    }
    
    public function render()
    {
        return view('livewire.add-data-modal');
    }
}
