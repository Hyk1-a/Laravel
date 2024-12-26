<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/png" href="{{asset('image/instalogo.png')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body >
    <header class="bg-slate-800 shadow-md ">
        <nav class="container ">
            <div class="flex justify-between items-center" >
                    <button id="sidebarToggle" class="px-2 py-2 hover:bg-slate-500 rounded-lg text-white transition duration-300 ease-in-out transform hover:scale-105">
                        <ion-icon name="menu-outline" size="small"></ion-icon>
                    </button>
            </div>
            <div class="flex justify-center items-center">
                <h1 class="text-white text-sm sm:text-xl">Welcome Admin</h1>
            </div>
        </nav>
    </header>
    <main>
        <div id="sidebar" class="fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-slate-800">
            <div class="text-gray-100 text-xl">
                <div class="p-2.5 mt-1 flex items-center">
                    <ion-icon name="logo-instagram"></ion-icon>
                    <h1 class="text-bold text-gray-200 text-[15px] ml-3">Admin Dashboard</h1>
                    <button id="closeSidebar" class="px-2 py-1 hover:bg-slate-500 rounded-lg text-white ml-auto transition duration-300 ease-in-out transform hover:scale-105">
                        <ion-icon name="menu-outline" size="small"></ion-icon>
                    </button>
                </div>
                <hr class="my-2 text-gray-600">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-500 text-white">
                    <ion-icon name="home-outline" size="small"></ion-icon>
                    <span class="text-[15px] ml-3">Home</span>
                </div>
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-500 text-white">
                    <ion-icon name="people-outline" size="small"></ion-icon>
                    <span class="text-[15px] ml-3">User Management</span>
                </div>
                <hr class="my-2 text-gray-600">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-500 text-white">
                    <ion-icon name="log-out-outline" size="small"></ion-icon>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="text-[15px] ml-3">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </main>



<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>