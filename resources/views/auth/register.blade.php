<x-layout>
    <h1 class="title">
        Register a New account
    </h1>
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="mb-5">
                <label for="username">Username</label>
                <div class="input @error('username') ring-red-500 @enderror">
                    <input type="text" name="username" value="{{ old('username') }}" >
                </div>
                    @error('username')
                        <p class="error">{{$message}}</p>
                    @enderror
            </div>
            
            <div class="mb-5">
                <label for="email">Email</label>
                <div class="input @error('email') ring-red-500 @enderror">
                    <input type="text" name="email" value="{{ old('email') }}" class= "input" >
                </div>
                    @error('email')
                        <p class="error">{{$message}}</p>
                    @enderror
            </div>
            
            <div class="mb-5">
                <label for="password">Password</label>
                <div class="input @error('password')ring-red-500 @enderror">
                    <input type="password" name="password" >
                </div>                
                    @error('password')
                        <p class="error">{{$message}}</p>
                    @enderror
            </div>
            
            <div class="mb-5">
                <label for="password_confirmation">Re-Enter Your password</label>
                <div  class="input">
                    <input type="password" name="password_confirmation">
                </div>
                
            </div>

            <div style="text-align: center">
                <button class="btn">
                    Register
                </button>
                <a href="#" class="text-xs hover:bg rounded-md">Forget Password?</a>
            </div>
 
        </form>


    </div>
</x-layout>
    