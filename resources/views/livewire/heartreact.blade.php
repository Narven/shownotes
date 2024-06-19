<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public Note $note;
    public $heartCount;

    public function mount(Note $note)
    {
        $this->note = $note;
        $this->heartCount = $note->heart_count;
    }

    public function increaseHeartCount()
    {
        $this->note->update([
            'heart_count' => $this->heartCount + 1,
        ]);

        $this->heartCount = $this->note->heart_count;
    }
}; ?>

<div>
    <x-button rose spinner xs icon='heart' wire:click='increaseHeartCount()'>{{ $this->heartCount }}</x-button>
</div>
