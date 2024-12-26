<x-layout>

    <h1 class="title">Welcome {{auth()->user()->username}}</h1>
    <p class="text-sm pb-2 font-sans">You have a total of {{$posts -> total()}} posts.</p>

    <div class="card">
        <h2 class="font-bold mb-4 ">Create a New Post</h2>
        @if (session('success'))
            <x-flashMsg msg="{{session('success')}}"></x-flashMsg>
        @elseif (session('delete'))
            <x-flashMsg msg="{{session('delete')}}" bg="bg-red-500"></x-flashMsg>
        @endif

        {{-- Create Post Form --}}
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Post title --}}
            <div class="mb-4 ">
                <label for="title">Name for Title</label>
                <div class="input @error('body') ring-red-600 @enderror">
                    <input type="text" name="title"value="{{ old('title') }}" >
                </div>
                @error('title')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            {{-- Post body --}}
            
            <div class="mb-4">
                <label for="body">Post Content</label>

                <textarea name="body" class= "input @error('body') ring-red-600 @enderror"  rows="5">{{ old('body') }}</textarea>

                @error('body')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            {{-- Post image --}}
            <div class="mb-4">
                <label for="image">Post Image</label>
                <input type="file" name="image" id ="image"></label>
                @error('image')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            {{-- Submit Buttom --}}
            <div class="flex justify-end">
                <button class=" btn">Submit</button>
            </div>

        </form>
    </div>
    <br>
        <h2 class="font-bold mb-4">Your Latest Posts</h2>
        <div class="grid grid-cols-1 gap-6">
 
            @foreach ($posts as $post)
                <x-postCard :post="$post">

                    {{-- Update post--}}
                    <a href="{{route('posts.edit', $post)}}" class="bg-green-500 hover:bg-green-800 text-white px-2 py-1 rounded-md text-xs">
                        Update
                    </a>

                    {{-- Delete post--}}
                    <form action="{{route('posts.destroy', $post)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-800 text-white px-2 py-1 rounded-md text-xs">
                            Delete
                        </button> 
                    </form>
                </x-postCard>
            @endforeach
        </div>

        <div>
            {{$posts->links()}}
        </div>
</x-layout>


