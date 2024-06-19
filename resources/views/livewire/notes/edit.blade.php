<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    public Note $note;

    public $title;
    public $body;
    public $recipient;
    public $send_date;
    public $is_published;

    public function mount(Note $note)
    {
        $this->authorize('update', $note);
        $this->fill($note);
    }

    public function submit()
    {
        $this->validate([
            'title' => ['required', 'min:5'],
            'body' => ['required', 'min:5'],
            'recipient' => ['required', 'email'],
            'send_date' => ['required', 'date'],
            'is_published' => ['required', 'bool'],
        ]);

        $this->note->update([
            'title' => $this->title,
            'body' => $this->body,
            'recipient' => $this->recipient,
            'send_date' => $this->send_date,
            'is_published' => $this->is_published,
        ]);

        $this->dispatch('note-saved');

        // redirect(route('notes.index'));
    }
}; ?>

<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Edit Note') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-6 text-gray-900">
            <form wire:submit='submit' class="space-y-4">
                @csrf
                <x-input wire:model="title" label="Title" placeholder="Title" />
                <x-input wire:model="body" label="Body" />
                <x-input icon="user" wire:model="recipient" label="Recipient" />
                <x-input icon="calendar" wire:model="send_date" type="date" label="Send Date" />
                <x-checkbox id="is_published" label="Is Published" wire:model="is_published" />
                <div class="pt-4">
                    <x-button type="submit" primary right-icon="calendar" spinner>Save Note</x-button>
                </div>
                <x-action-message on="note-saved" />
                <x-errors />
            </form>
        </div>
    </div>
</div>
