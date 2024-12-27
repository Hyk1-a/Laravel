<x-adminlayout>
    <div class="flex flex-wrap justify-between md:mx-auto gap-2">
        <h1 class="font-bold text-xl md:text-2xl mt-2">Registered User</h1>
    </div>
    <div class="overflow-x-auto mt-2">
        <table class=" border border-black w-full table-auto">
            <thead>
                <tr class="border border-black bg-gray-200">
                    <th class="border border-black px-4 py-2 md:text-sm">No.</th>
                    <th class="border border-black px-4 py-2 md:text-sm">Admin</th>
                    <th class="border border-black px-4 py-2 md:text-sm">Email</th>
                    <th class="border border-black px-4 py-2 md:text-sm">Role</th>
                    <th class="border border-black px-4 py-2 md:text-sm">Edit</th>
                    <th class="border border-black px-4 py-2 md:text-sm">Delete</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $counter = 1;
                @endphp
                
                @foreach ($users as $user)
                    @if ($user->usertype === 'user')
                        <tr class="border border-black ">
                            <td class="border border-black px-4 py-2 md:text-sm">{{ $counter }}</td>
                            <td class="border border-black px-4 py-2 md:text-sm">{{$user->username}}</td>
                            <td class="border border-black px-4 py-2 md:text-sm">{{$user->email}}</td>
                            <td class="border border-black px-4 py-2 md:text-sm">{{$user->usertype}}</td>
                            <td class="border border-black px-4 py-2 md:text-sm">
                                <button class="bg-green-500 hover:bg-green-800 text-white px-4 py-1 rounded-md text-sm ">
                                    Edit
                                </button> 
                            </td>
                            <td class="border border-black px-4 py-2">
                                <button class="bg-red-500 hover:bg-red-800 text-white px-2 py-1 rounded-md text-sm ">
                                    Delete
                                </button> 
                            </td>
                        </tr>
                    @php
                        $counter++;
                    @endphp
                    
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    
    
    
    </x-adminlayout>