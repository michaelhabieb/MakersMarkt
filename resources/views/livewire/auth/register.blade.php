<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Makers Markt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #d7d2c1;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-[#d7d2c1]">

<div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
    <h2 class="text-2xl font-bold text-center text-[#4c5c74]">Create an account</h2>
    <p class="text-center text-gray-600 text-sm mt-2">Enter your details below to create your account</p>

    <!-- Session Status -->
    <x-auth-session-status class="text-center text-green-600 mt-2" :status="session('status')" />

    <form wire:submit.prevent="register" class="mt-6 space-y-4">
        <!-- Name -->
        <div>
            <label for="name" class="block text-[#4c5c74] text-sm font-medium">Full Name</label>
            <input type="text" wire:model="name" id="name" required
                   class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4c5c74] text-black"
                   placeholder="Your full name">
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[#4c5c74] text-sm font-medium">Email address</label>
            <input type="email" wire:model="email" id="email" required
                   class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4c5c74] text-black"
                   placeholder="email@example.com">
        </div>

        <!-- Password -->
        <div class="relative">
            <label for="password" class="block text-[#4c5c74] text-sm font-medium">Password</label>
            <input type="password" wire:model="password" id="password" required
                   class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4c5c74] text-black"
                   placeholder="••••••••">
        </div>

        <!-- Confirm Password -->
        <div class="relative">
            <label for="password_confirmation" class="block text-[#4c5c74] text-sm font-medium">Confirm Password</label>
            <input type="password" wire:model="password_confirmation" id="password_confirmation" required
                   class="w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4c5c74] text-black"
                   placeholder="••••••••">
        </div>

        <!-- Register Button -->
        <button type="submit"
                class="w-full bg-[#4c5c74] hover:bg-opacity-90 text-white font-semibold py-3 rounded-lg transition duration-200">
            Create account
        </button>
    </form>

    <!-- Login Link -->
    <p class="mt-4 text-center text-sm text-gray-600">
        Already have an account?
        <a href="{{ route('login') }}" class="text-[#4c5c74] hover:underline">Log in</a>
    </p>
</div>

</body>
</html>
