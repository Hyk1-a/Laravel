<x-layout>
    <h1 class="title">
        Login
    </h1>
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="email">Email</label>
                <div class="input @error('email') ring-red-500 @enderror">
                    <input type="text" name="email">
                </div>
                    @error('email')
                        <p class="error">{{$message}}</p>
                    @enderror
            </div>
            
            <div class="mb-4">
                <label for="password">Password</label>
                <div class="input @error('password') ring-red-500 @enderror">
                    <input type="password" name="password" >
                </div>
                    @error('password')
                        <p class="error">{{$message}}</p>
                    @enderror
            </div>

            <div class="mb-4">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>

            <div style="text-align: center">
                <button class="btn">
                    Login
                </button>
            </div> 
            
            @error('failed')
                <p class="error">{{$message}}</p>
            @enderror
        </form>
    </div>
</x-layout>
    