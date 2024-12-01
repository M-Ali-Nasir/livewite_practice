<div class="flex flex-col justify-center items-center gap-5 p-10">

    <h1 class="w-fit">{{ $title }}</h1>

    <p class="w-fit">{{ count($users) }}</p>
    <button wire:click="createNewUser"
        class="w-fit bg-white text-black font-bold text-lg rounded-4 px-10 py-5 rounded-md">
        Create New User
    </button>
</div>