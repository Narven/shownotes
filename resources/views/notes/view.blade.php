<x-guest-layout>
    <div class="flex flex-col justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $note->title }}
        </h2>
        <p class="mt-2">{{ $note->body }}</p>
        <div class="flex items-center justify-end mt-12 space-x-2">
            <h3 class="mr-4 text-sm">Sent from {{ $user->name }}</h3>
            <livewire:heartreact :note="$note" />
        </div>
    </div>
</x-guest-layout>
