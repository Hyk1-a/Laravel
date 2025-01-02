<x-adminlayout>
    <div class="flex flex-wrap justify-between md:mx-auto gap-2">
        <h1 class="font-bold text-xl md:text-2xl mt-2 ml-4">Registered User</h1>
            <a href="{{route('adduser')}}" class="ml-auto md:ml-0 mt-2 bg-slate-100 hover:bg-slate-400 text-black px-2 py-1 rounded-md text-xs md:text-base flex items-center gap-1">
                <button>
                    <ion-icon name="person-add-outline"></ion-icon>
                    Add
                </button>
            </a>
    </div>
    <div class="overflow-x-auto mt-2 ml-4">
        <table class=" border border-black w-full table-auto">
            <thead>
                <tr class="border border-black bg-gray-200">
                    <th class="border border-black px-4 py-2 md:text-sm">No.</th>
                    <th class="border border-black px-4 py-2 md:text-sm">User</th>
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
                                <a href="{{route('edituser', $user->id)}}" class="bg-green-500 hover:bg-green-800 text-white px-4 py-1 rounded-md text-sm ">
                                    Edit
                                </a>
                            </td>
                            
                            <td class="border border-black px-4 py-2">
                                <form action="{{route('deleteuser', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-800 text-white px-2 py-1 rounded-md text-xs">
                                        Delete
                                    </button> 
                                </form>
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