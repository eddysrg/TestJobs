<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacants as $vacant)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="space-y-3">
                <a href="{{route('vacants.show', $vacant->id)}}" class="text-xl font-bold">
                    {{$vacant->title}}
                </a>
                <p class="text-sm text-gray-600 font-bold">
                    {{$vacant->company}}
                </p>
                <p class="text-sm text-gray-500">Last day: {{$vacant->last_day}}</p>
            </div>
            <div class="flex flex-col md:flex-row gap-3 items-stretch mt-5 md:mt-0">
                <a href="#" class="text-center bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold">
                    Candidates
                </a>

                <a href="{{route('vacants.edit', $vacant->id)}}"
                    class="text-center bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold">
                    Edit
                </a>

                <button wire:click="$emit('showAlert', {{$vacant->id}})"
                    class="text-center bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold">
                    Eliminate
                </button>
            </div>
        </div>
        @empty
        <p class="p-3 text-center text-sm text-gray-600">There are no vacancies to show</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{$vacants->links()}}
    </div>

</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('showAlert', vacantId =>{
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            //Eliminate Vacant
            Livewire.emit('eliminateVacant', vacantId);
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success",
            });
        }
    });
    })
</script>
@endpush