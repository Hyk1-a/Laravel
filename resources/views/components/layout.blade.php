<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env ('APP_NAME')}}</title>
    <link rel="icon" type="image/png" href="{{asset('image/instalogo.png')}}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">
    <header>
        <nav>
            <div>
                <a href="{{route('posts.index')}}" class="nav-link">Home</a>
            </div>
            @auth
                {{-- Drop Down button --}}
                <div class="relative grid place-items-center" x-data="{ open: false }">
                    <button x-on:click="open = !open" type="button" class="round-btn">
                        <img src="{{asset('image/cat.jpg')}}" alt="Cat">
                    </button>
                    <div x-show="open" @click.outside="open = false" class="bg-white shadow-lg border-r-gray-500 absolute top-10 right-0 rounded-lg overflow-hidden font-light">
                        <p class="font-sans text-md p-2 pl-4 ">{{auth()->user()->username}}</p>
                        <div class="border-t border-gray-300 block font-bold font-sans text-md hover:bg-slate-100 p-2 pl-4 ">
                            <a href="{{route('dashboard')}}" >Dashboard</a>
                        </div>
                        <div  class="border-t border-gray-300 block font-bold font-sans text-md hover:bg-slate-100 p-2 pl-4 ">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button>Log Out</button>
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
            @endauth
            @guest
                <div class="flex justify-end gap-4">
                    <div>
                        <a href="{{route('login')}}" class="nav-link">Login</a>
                    </div>
                    <div>
                        <a href="{{route('register')}}" class="nav-link">Register</a>
                    </div>
                    <div>
                        <a href="#" class="nav-link">Contact Us</a>
                    </div>
                </div>
            @endguest
            
        </nav>
    </header>
    <main class="py-8 px-4 max-w-screen-lg mx-auto">
        
        {{ $slot }}
        
    </main>
    
</body>
</html>
