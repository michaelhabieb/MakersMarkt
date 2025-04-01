<x-layouts.app title="Verkopers">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 bg-[#d7d2c1]">
        <!-- Header section with title -->
        <div class="text-center mb-6 ">
            <h1 class="text-[#4c5c74] font-bold text-4xl leading-tight">Verkopers Pagina</h1>
            <p class="text-[#96938d] text-lg mt-2">Beheer hier alle verkopers en hun producten. Klik op de knop hieronder om een nieuw product toe te voegen.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- First product section -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-[#96938d] dark:border-[#4c5c74] bg-white p-4">
                <h2 class="text-[#4c5c74] font-semibold text-2xl">Producten Overzicht</h2>
                <p class="text-[#96938d] mt-2">Bekijk en beheer de producten die beschikbaar zijn voor verkoop.</p>
                <p class="text-[#96938d] mt-2">klik op de naam op meer van het product te zien!</p>
            </div>

            <!-- Second placeholder section -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-[#96938d] dark:border-[#4c5c74] bg-white p-4">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                <h2 class="absolute top-4 left-4 text-[#4c5c74] font-semibold text-2xl">Placeholder voor extra content</h2>
            </div>

            <!-- Create Button Section -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-[#96938d] dark:border-[#4c5c74] bg-white p-4 flex justify-center items-center">
                <!-- Create Button -->
                <div class="absolute top-4 left-4">
                    <a href="{{ route('verkopers.create') }}">
                        <button type="button" class="bg-[#4c5c74] hover:bg-[#3b4a62] text-white px-6 py-3 rounded-xl shadow-lg transition duration-200">
                            Voeg Nieuw Product Toe
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="relative  flex-1 overflow-hidden rounded-xl border border-[#96938d] dark:border-[#4c5c74] bg-[#d7d2c1]">
            <div class="relative mx-auto h-full">
                <livewire:products-table />
            </div>
        </div>
    </div>
</x-layouts.app>
