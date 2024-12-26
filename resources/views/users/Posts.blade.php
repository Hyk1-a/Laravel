<x-layout>

    <h1 class="title">{{ $user->username }}'s Posts</h1>
    <p class=" font-sans font-light text-xs mb-4"> {{ $user->username }} has {{ $posts->count() }} posts.</p>

    <div class="grid grid-cols-1 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post"/>
        @endforeach
    </div>

    <div>
        {{$posts->links()}}
    </div>

</x-layout>

