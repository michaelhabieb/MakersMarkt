<div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
    <h2 class="text-2xl font-bold text-center text-[#4c5c74]">Log in to Makers Markt</h2>
    <p class="text-center text-gray-600 text-sm mt-2">Enter your email and password below to log in</p>

    <!-- Session Status -->
    <x-auth-session-status class="text-center text-green-600 mt-2" :status="session('status')" />

    <!-- Foutmelding -->
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mt-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="login" class="mt-6 space-y-4">
        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[#4c5c74] text-sm font-medium">Email address</label>
            <input type="email" wire:model="email" id="email" required
                   class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4c5c74] text-black"
                   placeholder="email@example.com">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div class="relative">
            <label for="password" class="block text-[#4c5c74] text-sm font-medium">Password</label>
            <input type="password" wire:model="password" id="password" required
                   class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4c5c74] text-black"
                   placeholder="••••••••">
            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="absolute right-2 top-8 text-sm text-[#4c5c74] hover:underline">
                    Forgot your password?
                </a>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input type="checkbox" wire:model="remember" id="remember" class="w-4 h-4 text-[#4c5c74] focus:ring-[#4c5c74]"
                {{ $remember ? 'checked' : '' }}>
            <label for="remember" class="ml-2 text-[#4c5c74] text-sm">Remember me</label>
        </div>

        <!-- Login Button -->
        <button type="submit"
                class="w-full bg-[#4c5c74] hover:bg-opacity-90 text-white font-semibold py-3 rounded-lg transition duration-200">
            Log in
        </button>
    </form>

    <!-- Register Link -->
    @if (Route::has('register'))
        <p class="mt-4 text-center text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-[#4c5c74] hover:underline">Sign up</a>
        </p>
    @endif
</div>
