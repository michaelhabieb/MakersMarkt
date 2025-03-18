<x-layouts.app title="Credits Beheren">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl bg-white dark:bg-gray-800 p-6 shadow-md">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Credits Beheren</h2>

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admins.credits.update') }}" class="space-y-4">
            @csrf

            <!-- Gebruiker Selecteren -->
            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Selecteer Gebruiker</label>
                <select name="user_id" id="user_id" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-gray-50 dark:bg-gray-700 dark:text-white">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Krediet Invoeren -->
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bedrag</label>
                <input type="number" name="amount" id="amount" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-gray-50 dark:bg-gray-700 dark:text-white" step="0.01">
            </div>

            <!-- Submit Knop -->
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Krediet Aanpassen
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
