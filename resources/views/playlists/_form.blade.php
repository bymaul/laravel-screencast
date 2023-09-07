@csrf
<div class="mb-6">
    <input type="file" name="thumbnail" id="thumbnail">
    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
</div>
<div class="mb-6">
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $playlist->name" required
        autofocus />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>
<div class="mb-6">
    <x-input-label for="price" :value="__('Price')" />
    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price') ?? $playlist->price" required />
    <x-input-error :messages="$errors->get('price')" class="mt-2" />
</div>
<div class="mb-6">
    <x-input-label for="description" :value="__('Description')" />
    <x-textarea id="description" class="block mt-1 w-full" name="description" required>
        {{ old('description') ?? $playlist->description }}
    </x-textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>
<div class="mb-6">
    <x-input-label for="tags" :value="__('Tags')" />
    <select id="tags"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
        name="tags[]" multiple>
        @foreach ($tags as $tag)
            <option {{ $playlist->tags()->find($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">
                {{ $tag->name }}</option>
        @endforeach
    </select>
</div>
<x-input-error :messages="$errors->get('tags')" class="mt-2" />
<x-primary-button>{{ $submit }}</x-primary-button>
