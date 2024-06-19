<?php

use Livewire\Volt\Component;

new class extends Component {
    public function delete($noteId): void
    {
        $note = auth()->user()->notes()->find($noteId)->first();
        $this->authorize('delete', $note);
        $note->delete();
    }

    public function with(): array
    {
        $notes = auth()->user()->notes()->orderBy('send_date', 'asc')->get();

        return [
            'notes' => $notes,
        ];
    }
}; ?>

<div>
    <div class="space-y-2">
        @if ($notes->isEmpty())
            <div>
                <p class="text-xl font-bold">No notes yet</p>
                <p class="text-sm">Let's create your first note to send.</p>
                <x-button primary icon-right="plus" href="{{ route('notes.create') }}">Create Note</x-button>
            </div>
        @else
            <div>
                <x-button primary icon-right="plus" href="{{ route('notes.create') }}">Create Note</x-button>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-12">
                @foreach ($notes as $note)
                    <x-card wire:key='{{ $note->id }}'>
                        <div class="flex justify-between">
                            <div>
                                <a href="#" class="text-xl font-bold">{{ $note->title }}</a>
                                <p>{{ Str::limit($note->body, 30) }}</p>
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ \Carbon\Carbon::parse($note->send_date)->format('d-M-Y') }}
                            </div>
                        </div>
                        <div class="flex items-end justify-between mt-4 space-x-1">
                            <p class="text-xs">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                            <div>
                                <x-button icon="eye" href="{{ route('note.edit', $note) }}"></x-button>
                                <x-button icon="trash" wire:click="delete('{{ $note->id }}')"></x-button>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </div>
</div>
</div>
