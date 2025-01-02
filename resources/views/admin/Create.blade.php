<x-adminlayout>
    <h1 class="title ml-4 lg:flex justify-center">
        Add a New account
    </h1>
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{route('storeuser')}}" method="post">
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

            <div class="mb-5">
                <label for="usertype">Usertype</label>
                <div  class="input">
                    <select name="usertype" id="usertype" class="border border-gray-300 rounded w-full px-4 py-2">
                        <option value="user" {{ old('usertype') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>                
                </div>
            </div>

            <div style="text-align: center">
                <button class="btn">
                    Add
                </button>
            </div>
 
        </form>


    </div>
</x-adminlayout>
    