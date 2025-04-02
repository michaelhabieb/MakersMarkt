<x-layouts.app title="Product Bewerken">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 bg-[#d7d2c1]">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-[#4c5c74] font-bold text-4xl leading-tight">Bewerk Product</h1>
            <p class="text-[#96938d] text-lg mt-2">Pas hieronder de details van het product aan.</p>
        </div>

        <!-- Form Container -->
        <div class="max-w-7xl mx-auto p-6 bg-white rounded-xl border border-[#96938d] shadow-lg">
            <form action="{{ route('verkopers.update', $product) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <!-- Naam Field -->
                    <div class="w-full">
                        <label for="name" class="block text-lg font-medium text-black">Naam</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                               class="mt-1 block w-full p-3 border border-[#96938d] rounded-xl text-black focus:ring-black focus:border-black" required>
                    </div>

                    <!-- Description and other fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Beschrijving -->
                        <div>
                            <label for="description" class="block text-lg font-medium text-black">Beschrijving</label>
                            <textarea id="description" name="description" class="mt-1 block w-full p-3 border border-[#96938d] rounded-xl text-black focus:ring-black focus:border-black" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        <!-- Producttype -->
                        <div>
                            <label for="product_type_id" class="block text-lg font-medium text-black">Producttype</label>
                            <select id="product_type_id" name="product_type_id" class="mt-1 block w-full p-3 border border-[#96938d] rounded-xl text-black focus:ring-black focus:border-black" required>
                                <option value="">Selecteer een producttype</option>
                                @foreach ($productTypes as $productType)
                                    <option value="{{ $productType->id }}" {{ $product->product_type_id == $productType->id ? 'selected' : '' }}>
                                        {{ $productType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Materiaal -->
                        <div>
                            <label for="material" class="block text-lg font-medium text-black">Materiaal</label>
                            <input type="text" id="material" name="material" value="{{ old('material', $product->material) }}"
                                   class="mt-1 block w-full p-3 border border-[#96938d] rounded-xl text-black focus:ring-black focus:border-black">
                        </div>

                        <!-- Productietijd -->
                        <div>
                            <label for="production_time" class="block text-lg font-medium text-black">Productietijd</label>
                            <input type="text" id="production_time" name="production_time" value="{{ old('production_time', $product->production_time) }}"
                                   class="mt-1 block w-full p-3 border border-[#96938d] rounded-xl text-black focus:ring-black focus:border-black">
                        </div>

                        <!-- Complexiteit -->
                        <div>
                            <label for="complexity" class="block text-lg font-medium text-black">Complexiteit</label>
                            <input type="text" id="complexity" name="complexity" value="{{ old('complexity', $product->complexity) }}"
                                   class="mt-1 block w-full p-3 border border-[#96938d] rounded-xl text-black focus:ring-black focus:border-black">
                        </div>

                        <!-- Duurzaamheid -->
                        <div>
                            <label for="durability" class="block text-lg font-medium text-black">Duurzaamheid</label>
                            <input type="text" id="durability" name="durability" value="{{ old('durability', $product->durability) }}"
                                   class="mt-1 block w-full p-3 border border-[#96938d] rounded-xl text-black focus:ring-black focus:border-black">
                        </div>

                    </div>
                    <!-- Unieke Kenmerken -->
                    <div class="w-full">
                        <label for="unique_features" class="block text-lg font-medium text-black">Unieke Kenmerken</label>
                        <textarea id="unique_features" name="unique_features" class="mt-1 block w-full p-3 border border-[#96938d] rounded-xl text-black focus:ring-black focus:border-black">{{ old('unique_features', $product->unique_features) }}</textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-4 mt-6">
                        <a href="{{ route('verkopers.index') }}" class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition shadow-md">
                            Annuleren
                        </a>
                        <button type="submit" class="px-6 py-3 bg-[#4c5c74] text-white rounded-xl hover:bg-[#3b4a62] transition shadow-md">
                            Opslaan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
