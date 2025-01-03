@props(['post', 'full' => false])
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<div class="card">
    {{-- post image --}}
    <div class="mb-3">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Photo" class="rounded-md w-full object-cover h-auto">
        @else
            <img src="{{ asset('storage/posts_image/default.png') }}" alt=""
                class="rounded-md w-full object-cover h-auto">
        @endif
    </div>

    {{-- Post content --}}

    {{-- Title --}}
    <h2 class="font bold text-2xl">{{ $post->title }}</h2>
    {{-- Author and Date --}}
    <div class="font-light text-xs mb-4">
        <span>Posted at {{ $post->created_at->diffForHumans() }} by</span>
        <a href="{{ route('posts.user', $post->user) }}" class="text-blue-500 font-bold">{{ $post->user->username }}</a>
    </div>
    {{-- Body  --}}

    @if ($full)
        <div class="text-md">
            <span>{{ $post->body }}</span>
        </div>
        <hr class="my-2 border-gray-600">

        {{-- view comments in posts --}}
        @foreach ($post->comments as $comment)
            <div class="flex justify-between gap-2 border-r-gray-500 mt-6">
                <div class="flex justify-start">
                    <p><strong>Commented by @if ($comment->user) {{ $comment->user->username }} @else [Deleted User] @endif :</strong><br>{{ $comment->body }}</p>
                </div>
                <div class="flex justify-end">
                    <p>{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <hr class="my-6 border-gray-600">
        @endforeach

        {{-- Comment for Posts --}}
        <div class="flex justify-start ml-4">
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <p class="mr-2 ml-4 mb-2 text-sm">Comment</p>
                <div class="ml-4 md:mr-4 sm:mr-4">
                    <textarea name="body" cols="100 " rows="1" class="border border-gray-300 rounded-md w-full p-2  text-sm"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn ml-4 mt-2 text-sm">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    @else
        <div class="text-sm">
            <span>{{ Str::words($post->body, 15) }}</span>
            <a href="{{ route('posts.show', $post) }}" class=" text-xs text-blue-500"> Read more &rarr; </a>
        </div>
        <div class="flex justify-auto gap-4 rounded-md mt-4">
            {{-- Like Icon --}}
            <button class="flex items-center gap-2  text-blue-500 hover:text-blue-800 ml-2 mt-2">
                <ion-icon name="thumbs-up-outline" class="hidden md:block" size="large"></ion-icon>
                <ion-icon name="thumbs-up-outline" class="block md:hidden" size="small"></ion-icon>

            </button>
            {{-- Comment Icon --}}
            <div class="mt-2 ml-2">
                <a href="{{ route('posts.show', $post) }}" class="text-sm text-blue-500 hover:text-blue-800 ">
                    <ion-icon name="chatbubble-outline" class="hidden md:block" size="large"></ion-icon>
                    <ion-icon name="chatbubble-outline" class="block md:hidden" size="small"></ion-icon>
                </a>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 mt-6">
            {{ $slot }}
        </div>
    @endif
</div>
