<x-layouts.app title="Credits Beheren">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-8 bg-[#d7d2c1] rounded-xl shadow-lg">
        <!-- Header section with title -->
        <div class="text-center mb-6">
            <h1 class="text-[#4c5c74] font-bold text-4xl leading-tight">Credits Beheren</h1>
            <p class="text-[#96938d] text-lg mt-2">Beheer hier de kredieten van de gebruikers. Vul het bedrag in en selecteer de gebruiker om het krediet aan te passen.</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-[#4c5c74] text-white p-4 rounded-md mb-6 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Section -->
        <form method="POST" action="{{ route('admins.credits.update') }}" class="space-y-6">
            @csrf

            <!-- Gebruiker Selecteren -->
            <div>
                <label for="user_id" class="block text-sm font-medium text-[#4c5c74] mb-2">Selecteer Gebruiker</label>
                <select name="user_id" id="user_id" class="w-full p-3 border border-[#96938d] rounded-lg bg-white text-black shadow-sm focus:ring-[#4c5c74] focus:outline-none">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Krediet Invoeren -->
            <div>
                <label for="amount" class="block text-sm font-medium text-[#4c5c74] mb-2">Bedrag</label>
                <input type="number" name="amount" id="amount" class="w-full p-3 border border-[#96938d] rounded-lg bg-white text-black shadow-sm focus:ring-[#4c5c74] focus:outline-none" step="0.01">
            </div>

            <!-- Submit Knop -->
            <div>
                <button type="submit" class="w-full bg-[#4c5c74] hover:bg-[#3b4a62] text-white py-3 rounded-lg shadow-md transition-all duration-200">
                    Krediet Aanpassen
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
