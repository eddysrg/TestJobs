<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent="createVacant">
    <div>
        <x-input-label for="title" :value="__('Vacant Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')"
            placeholder="Vacant Title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="salary" :value="__('Monthly Salary')" />
        <select id="salary" wire:model="salary"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">-- Select a salary --</option>
            @foreach ($salaries as $salary)
            <option value="{{$salary->id}}">{{$salary->salary}}</option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="category" :value="__('Category')" />
        <select id="category" wire:model="category"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">-- Select a category --</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')"
            placeholder="Company: eg. Netflix, Uber, Shopify" />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="last_day" :value="__('Last day to apply')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day" :value="old('last_day')"
            placeholder="Company: eg. Netflix, Uber, Shopify" />
        <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Job Description')" />
        <textarea wire:model="description" id="description"
            class="block mt-1 w-full h-72 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" wire:model="image" accept="image/*" />

        <div class="my-5 w-80">
            @if ($image)
            Image:
            <img src="{{$image->temporaryUrl()}}" alt="Image">
            @endif
        </div>

        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <x-primary-button>
        {{ __('Create Vacant') }}
    </x-primary-button>
</form>