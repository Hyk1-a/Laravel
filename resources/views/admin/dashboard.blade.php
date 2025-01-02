<x-adminlayout>
    <div class="max-w-7xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6 ml-6">Admin Dashboard</h1>

        <div class="grid grid-cols-1 px-6  justify-center md:grid-cols-2  lg:grid-cols-4 gap-6 ">
            <!-- Number of Admins -->
            <div class="bg-blue-500 text-white p-6 rounded-md shadow">
                <h2 class="text-xl font-bold">Number of Admins</h2>
                <p class="text-3xl mt-2">{{ $adminCount }}</p>
            </div>

            <!-- Number of Users -->
            <div class="bg-green-500 text-white p-6 rounded-md shadow">
                <h2 class="text-xl font-bold">Number of Users</h2>
                <p class="text-3xl mt-2">{{ $userCount }}</p>
            </div>
        </div>
    </div>
</x-adminlayout>
