<div class="flex flex-col items-center justify-center md:h-screen bg-teal-950">
    <div class="px-2 py-8 mx-auto w-1/2 lg:py-0 relative">
        <h1 class="font-bold text-white text-3xl">All Users</h1>

        <table
            class="min-w-full bg-transparent border border-gray-200 shadow-md rounded-lg mt-5 justify-center items-center gap-10 xl:w-1/3 p-2 min-[375px]:p-5 mb-20">
            <thead class="bg-gray-900 border-b border-gray-200">
                <tr>
                    <th class="px-2 py-3 text-left text-sm font-medium text-white">ID</th>
                    <th class="px-2 py-3 text-left text-sm font-medium text-white">Name</th>
                    <th class="px-2 py-3 text-left text-sm font-medium text-white">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)


                <tr class="hover:bg-gray-300 group">
                    <td class="px-2 py-4 text-sm text-white border-b group-hover:text-black">{{ $user->id }}</td>
                    <td class="px-2 py-4 text-sm text-white border-b group-hover:text-black">{{ $user->name }}</td>
                    <td class="px-2 py-4 text-sm text-white border-b group-hover:text-black">{{ $user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="py-5 w-11/12 absolute bottom-0">
            {{ $users->links('vendor.livewire.pagination') }}
        </div>



    </div>
</div>