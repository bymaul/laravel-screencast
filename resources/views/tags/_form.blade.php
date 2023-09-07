@csrf
<div class="mb-6">
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $tags->name" required
        autofocus />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>
<x-primary-button>{{ $submit }}</x-primary-button>
