<x-layouts.app title="Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 bg-[#d7d2c1]">
        <!-- Header section with title -->
        <div class="text-center mb-6">
            <h1 class="text-[#4c5c74] font-bold text-4xl leading-tight">Dashboard</h1>
            <p class="text-[#96938d] text-lg mt-2">Welkom bij het dashboard. Beheer en bekijk hier alle gegevens op één plek.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- First Section: Welkomstbericht -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-[#96938d] dark:border-[#4c5c74] bg-white p-4 shadow-md hover:shadow-lg transition-shadow">
                <h2 class="text-[#4c5c74] font-semibold text-2xl">Welkom</h2>
                <p class="text-[#96938d] mt-2">Fijn dat je er bent! Gebruik het dashboard om snel toegang te krijgen tot alle belangrijke functies.</p>
            </div>

            <!-- Second Section: Klok -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-[#96938d] dark:border-[#4c5c74] bg-white p-4 shadow-md hover:shadow-lg transition-shadow flex justify-center items-center">
                <h2 class="absolute top-4 left-4 text-[#4c5c74] font-semibold text-2xl">Huidige Tijd</h2>
                <p id="clock" class="text-[#4c5c74] text-3xl font-bold"></p>
            </div>

            <!-- Third Section: Vragen? Mail ons -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-[#96938d] dark:border-[#4c5c74] bg-white p-4 shadow-md hover:shadow-lg transition-shadow">
                <h2 class="text-[#4c5c74] font-semibold text-2xl">Vragen?</h2>
                <p class="text-[#96938d] mt-2">Neem contact met ons op bij vragen:</p>
                <ul class="text-[#4c5c74] mt-2 list-disc list-inside">
                    <li>Mail naar <a href="mailto:support@bedrijf.nl" class="text-blue-600">support@bedrijf.nl</a></li>
                    <li>Bezoek onze helpdesk</li>
                </ul>
            </div>
        </div>

        <!-- Bedrijfsregels -->
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-[#96938d] dark:border-[#4c5c74] bg-white p-4">
            <h2 class="text-[#4c5c74] font-semibold text-2xl">Bedrijfsregels</h2>
            <ul class="text-[#96938d] mt-2 list-disc list-inside">
                <li>Respecteer alle medewerkers en klanten.</li>
                <li>Gebruik bedrijfsmiddelen verantwoordelijk.</li>
                <li>Houd werkruimtes schoon en georganiseerd.</li>
                <li>Volg de veiligheidsvoorschriften.</li>
                <li>Communiceer duidelijk en professioneel.</li>
            </ul>
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
</x-layouts.app>
