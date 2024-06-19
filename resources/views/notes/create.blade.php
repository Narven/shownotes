<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <x-button class="mb-5" href="{{ route('notes.index') }}" icon="arrow-left" secondary>All Notes</x-button>
                <livewire:notes.create-note />
            </div>
        </div>
    </div>
</x-app-layout>
