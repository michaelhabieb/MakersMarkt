<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#d7d2c1] flex flex-col items-center p-6 min-h-screen">
<!-- Dashboard Content -->
<div class="text-center mb-6">
    <h1 class="text-[#4c5c74] font-bold text-4xl">Dashboard</h1>
    <p class="text-[#96938d] text-lg mt-2">Welkom bij het dashboard. Beheer en bekijk hier alle gegevens op één plek.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-4xl">
    <!-- Welkomstbericht -->
    <div class="p-4 bg-white rounded-xl shadow-md border border-[#96938d]">
        <h2 class="text-[#4c5c74] font-semibold text-2xl">Welkom</h2>
        <p class="text-[#96938d] mt-2">Fijn dat je er bent! Gebruik het dashboard om snel toegang te krijgen tot alle belangrijke functies.</p>
    </div>

    <!-- Klok -->
    <div class="p-4 bg-white rounded-xl shadow-md border border-[#96938d] flex justify-center items-center">
        <p id="clock" class="text-[#4c5c74] text-3xl font-bold"></p>
    </div>

    <!-- Vragen? Mail ons -->
    <div class="p-4 bg-white rounded-xl shadow-md border border-[#96938d]">
        <h2 class="text-[#4c5c74] font-semibold text-2xl">Vragen?</h2>
        <p class="text-[#96938d] mt-2">Neem contact met ons op:</p>
        <ul class="list-disc list-inside text-[#4c5c74] mt-2">
            <li>Mail naar <a href="mailto:support@bedrijf.nl" class="text-blue-600">support@bedrijf.nl</a></li>
            <li>Bezoek onze helpdesk</li>
        </ul>
    </div>
</div>

<!-- Login/Register Section -->
<div class="mt-6 p-4 bg-white rounded-xl shadow-md border border-[#96938d] w-full max-w-4xl">
    <div class="flex justify-center space-x-6">
        @if (Route::has('login'))
            <nav class="flex items-center justify-center gap-6">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-[#4c5c74] text-white rounded-lg shadow-md hover:bg-[#3a4b60] transition duration-300">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition duration-300">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-3 bg-green-600 text-white rounded-lg shadow-md hover:bg-green-700 transition duration-300">Registreer</a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
</body>
</html>
