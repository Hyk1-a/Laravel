<x-layout>

    <a href="{{route('dashboard')}}" class="block text-sm mb-2 text-blue-500 ">&larr; Back</a>
    <div class="card">
        <h2 class="font-bold mb-4 ">Update Your Post</h2>
        <form action="{{route('posts.update', $post)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Post title --}}
                <div class="mb-4 ">
                    <label for="title">Name for Title</label>
                    <div class="input @error('body') ring-red-600 @enderror">
                        <input type="text" name="title"value="{{ $post->title }}" >
                    </div>
                    @error('title')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Post body --}}
                
                <div class="mb-4">
                    <label for="body">Post Content</label>

                    <textarea name="body" 
                            class= "input @error('body') ring-red-600 @enderror"  
                            rows="5">{{ $post->body }}</textarea>

                    @error('body')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>

                {{-- current photo if it exists --}}
                @if ($post->image)
                <div class="h-64 rounded-md mb-4 w-1/4 object-cover overflow-hidden">
                    <img src="{{asset('storage/' . $post->image)}}" alt="Photo">
                </div>
                @endif
                {{-- Post image --}}
                <div class="mb-4">
                    <label for="image">Post Image</label>
                    <input type="file" name="image" id ="image"></label>
                    @error('image')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class=" btn">Submit</button>
                </div>
        </form>
    </div>
</x-layout>


