<div class="flex flex-col justify-center items-center gap-5 p-10 h-screen w-screen bg-gray-950">

    <div class="w-screen flex flex-col justify-center items-center px-5">

        <form wire:submit="createNewUser"
            class="flex flex-col rounded-md shadow-lg shadow-rose-950 bg-red-950 justify-center items-center gap-10 xl:w-1/3 p-5 min-[375px]:p-10">
            <h1 class="font-bold text-white text-3xl">Create new User</h1>
            <div class="w-full">
                <label for="name" class="text-white ps-2">Name</label>
                <input class="bg-transparent px-3 py-2 text-white border mt-2 border-gray-950 rounded-3xl w-full"
                    type="text" id="name" wire:model="name">
            </div>
            <div class="w-full">
                <label for="email" class="text-white ps-3">Email</label>
                <input class="bg-transparent px-3 py-2 text-white border mt-2 border-gray-950 rounded-3xl w-full"
                    type="email" id="email" wire:model="email">
            </div>
            <div class="w-full">
                <label for="password" class="text-white ps-2">Password</label>
                <input class="bg-transparent px-3 py-2 text-white border mt-2 border-gray-950 rounded-3xl w-full"
                    type="password" id="password" wire:model="password">
            </div>
            <button class="px-10 py-2 border border-gray-950 rounded-3xl text-white">Create</button>
        </form>


    </div>
    <hr>
    <div
        class="mt-5 flex flex-col rounded-md shadow-lg shadow-rose-950 bg-red-950 justify-center items-center gap-10 xl:w-1/3 p-5 min-[375px]:p-10">
        <h1 class="font-bold text-white text-3xl">All Users</h1>

        <table class="min-w-full bg-transparent border border-gray-200 shadow-md rounded-lg">
            <thead class="bg-gray-900 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)


                <tr class="hover:bg-gray-300 group">
                    <td class="px-6 py-4 text-sm text-white border-b group-hover:text-black">{{ $user->id }}</td>
                    <td class="px-6 py-4 text-sm text-white border-b group-hover:text-black">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-sm text-white border-b group-hover:text-black">{{ $user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>