<div id="sidebar" class="fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-slate-800">
    <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center">
            <ion-icon name="logo-instagram"></ion-icon>
            <h1 class="text-bold text-gray-200 text-[15px] ml-3">Admin Dashboard</h1>
            <button id="closeSidebar" class="px-2 py-1 hover:bg-slate-500 rounded-lg text-white ml-auto transition duration-300 ease-in-out transform hover:scale-105">
                <ion-icon name="menu-outline" class="hidden md:block" size="large"></ion-icon>
                <ion-icon name="menu-outline" class="block md:hidden" size="small"></ion-icon>
            </button>
        </div>
        <hr class="my-2 text-gray-600">
        <a href="{{route('admin')}}" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-500 text-white">
            <ion-icon name="home-outline" size="small"></ion-icon>
            <span class="text-[15px] ml-3">Home</span>
        </a>
        <a href="{{route('admin.admins')}}" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-500 text-white">
            <ion-icon name="person-outline" size="small"></ion-icon>
            <span class="text-[15px] ml-3">Admin</span>
        </a>
        <a href="{{route('admin.users')}}" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-500 text-white">
            <ion-icon name="people-outline" size="small"></ion-icon>
            <span class="text-[15px] ml-3">User Management</span>
        </a>
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