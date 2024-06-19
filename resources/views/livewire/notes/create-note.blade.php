<?php

use Livewire\Volt\Component;

new class extends Component {
    public $title;
    public $body;
    public $recipient;
    public $sendDate;

    public function submit()
    {
        $this->validate([
            'title' => ['required', 'min:5'],
            'body' => ['required', 'min:5'],
            'recipient' => ['required', 'email'],
            'sendDate' => ['required', 'date'],
        ]);

        auth()
            ->user()
            ->notes()
            ->create([
                'title' => $this->title,
                'body' => $this->body,
                'recipient' => $this->recipient,
                'send_date' => $this->sendDate,
                'is_published' => false,
            ]);

        redirect(route('notes.index'));
    }
}; ?>

<div>
    <form wire:submit='submit' class="space-y-4">
        <x-input wire:model="title" label="Title" placeholder="Title" />
        <x-input wire:model="body" label="Body" />
        <x-input icon="user" wire:model="recipient" label="Recipient" />
        <x-input icon="calendar" wire:model="sendDate" type="date" label="Send Date" />
        <div class="pt-4">
            <x-button wire:click="submit" primary right-icon="calendar" spinner>Schedule Note</x-button>
        </div>
        <x-errors />
    </form>
</div>
