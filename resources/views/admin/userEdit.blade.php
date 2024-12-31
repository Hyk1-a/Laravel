<x-adminlayout>
    <h1 class="font-bold text-xl md:text-2xl mt-4">Edit User</h1>

    <form action="{{ route('updateuser',['id' => $user->id]) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="username" class="block text-sm font-medium">Username</label>
            <input type="text" name="username" id="username" value="{{ $user->username }}" 
                class="border border-gray-300 rounded w-full px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" 
                class="border border-gray-300 rounded w-full px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label for="usertype" class="block text-sm font-medium">User Type</label>
            <select name="usertype" id="usertype" class="border border-gray-300 rounded w-full px-4 py-2">
                <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>        
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Update User
        </button>
    </form>
</x-adminlayout>


