<x-layout>

        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>

            </header>

            <form method="POST" action="/users">
                @csrf
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">Name</label>
                    <label>
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="name"
                            placeholder="Example: John"
                            value="{{old('name')}}"
                        />
                    </label>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <label>
                        <input
                            type="email"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="email"
                            placeholder="Example: example@example.com"
                            value="{{old('email')}}"
                        />
                    </label>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">Password</label>
                    <label>
                        <input
                            type="password"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="password"
                            placeholder="Example: enter your password"
                        />
                    </label>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password2" class="inline-block text-lg mb-2">Confirm Password</label>
                    <label>
                        <input
                            type="password"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="password_confirmation"
                            placeholder="Example: enter your password again"
                        />
                    </label>
                    @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Sign Up
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        Already have an account?
                        <a href="/login" class="text-laravel"
                        >Login</a
                        >
                    </p>
                </div>
            </form>
        </div>


</x-layout>
