<x-layouts.app title="Product Details">
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-xl">
        <!-- Terugknop -->
        <a href="{{ route('verkopers.index') }}" class="inline-block text-sm text-[#4c5c74] hover:underline mb-4">
            &larr; Terug naar overzicht
        </a>

        <h1 class="text-2xl font-semibold text-[#4c5c74]">{{ $product->name }}</h1>
        <div class="space-y-4 mt-4">
            <div>
                <strong class="text-[#4c5c74]">Beschrijving:</strong>
                <p>{{ $product->description }}</p>
            </div>
            <div>
                <strong class="text-[#4c5c74]">Product Type:</strong>
                <p>{{ $product->productType->name ?? 'Onbekend' }}</p>
            </div>
            <div>
                <strong class="text-[#4c5c74]">Materiaal:</strong>
                <p>{{ $product->material ?? 'Niet gespecificeerd' }}</p>
            </div>
            <div>
                <strong class="text-[#4c5c74]">Productietijd:</strong>
                <p>{{ $product->production_time ?? 'Niet gespecificeerd' }}</p>
            </div>
            <div>
                <strong class="text-[#4c5c74]">Complexiteit:</strong>
                <p>{{ $product->complexity ?? 'Niet gespecificeerd' }}</p>
            </div>
            <div>
                <strong class="text-[#4c5c74]">Duurzaamheid:</strong>
                <p>{{ $product->durability ?? 'Niet gespecificeerd' }}</p>
            </div>
            <div>
                <strong class="text-[#4c5c74]">Unieke Kenmerken:</strong>
                <p>{{ $product->unique_features ?? 'Niet gespecificeerd' }}</p>
            </div>
        </div>
    </div>
</x-layouts.app>
