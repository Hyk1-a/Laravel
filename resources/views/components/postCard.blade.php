@props(['post', 'full' => false])

<div class="card">
    {{-- post image --}}
    <div class="mb-3">
        @if ($post->image)
            <img src="{{asset('storage/' . $post->image)}}" alt="Photo" class="rounded-md w-full object-cover h-auto">
        @else
            <img src="{{asset('storage/posts_image/default.png')}}" alt="" class="rounded-md w-full object-cover h-auto">
        @endif
    </div>

    {{-- Post content --}}
    
        {{-- Title --}}
        <h2 class="font bold text-2xl">{{$post->title}}</h2>
        {{-- Author and Date --}}
        <div class="font-light text-xs mb-4">
            <span>Posted at {{$post->created_at->diffForHumans()}} by</span>
            <a href="{{route('posts.user', $post->user  )}}" class="text-blue-500 font-bold">{{$post->user->username}}</a>
        </div>
        {{-- Body  --}}
        
        @if ($full)
        <div class="text-sm">
            <span>{{$post->body}}</span>
            
        </div>
        @else
        <div class="text-sm">
            <span>{{Str::words($post->body, 15 )}}</span>
            <a href="{{route('posts.show', $post)}}" class=" text-xs text-blue-500"> Read more &rarr; </a>
        </div>
        @endif
        <div class="flex items-center justify-end gap-4 mt-6">
            {{ $slot}}
        </div>
</div>
