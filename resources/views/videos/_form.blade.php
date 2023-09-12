@csrf
<div class="mb-6">
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ?? $video->title" required
        autofocus />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>
<div class="mb-6">
    <x-input-label for="unique_video_id" :value="__('Unique Video ID')" />
    <x-text-input id="unique_video_id" class="block mt-1 w-full" type="text" name="unique_video_id" :value="old('unique_video_id') ?? $video->unique_video_id"
        required />
    <x-input-error :messages="$errors->get('unique_video_id')" class="mt-2" />
</div>

<div class="flex mb-6 gap-x-4">
    <div class="w-full lg:w-1/2">
        <x-input-label for="episode" :value="__('Episode')" />
        <x-text-input id="episode" class="block mt-1 w-full" type="text" name="episode" :value="old('episode') ?? $video->episode"
            required />
        <x-input-error :messages="$errors->get('episode')" class="mt-2" />
    </div>
    <div class="w-full lg:w-1/2">
        <x-input-label for="runtime" :value="__('Runtime')" />
        <x-text-input id="runtime" class="block mt-1 w-full" type="text" name="runtime" :value="old('runtime') ?? $video->runtime"
            required />
        <x-input-error :messages="$errors->get('runtime')" class="mt-2" />
    </div>
</div>

<div class="mb-6">
    <label for="intro" class="inline-flex items-center">
        <input {{ $video->intro ? 'checked' : '' }} id="intro" type="checkbox"
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="intro">
        <span class="ml-2 text-sm text-gray-600 select-none">{{ __('Introduction') }}</span>
    </label>
</div>

<x-primary-button>{{ $submit }}</x-primary-button>
