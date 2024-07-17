<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Apply for this vacancy</h3>

    @if (session()->has('message'))
    <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
        {{session('message')}}
    </p>
    @else
    <form action="" class="w-96 mt-5" wire:submit.prevent='apply'>
        <div class="mb-4">
            <x-input-label for="cv" :value="__('CV (PDF)')" />
            <x-text-input id="password" class="block mt-1 w-full" type="file" accept=".pdf" wire:model="cv" />
        </div>

        <x-input-error :messages="$errors->get('cv')" class="mt-2" />

        <x-primary-button>
            {{__('Apply')}}
        </x-primary-button>
    </form>
    @endif
</div>