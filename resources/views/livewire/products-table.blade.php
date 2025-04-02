<div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
    <!-- Zoekbalk -->
    <div class="flex gap-2 items-center p-4 bg-[#4c5c74]">
        <div class="w-full">
            <input wire:model.live.debounce.500ms="search" type="text"
                   class="bg-[#FFFFFF] text-[#4c5c74] text-sm rounded-full border-none focus:ring-0 focus:border-none block w-full p-3 placeholder-gray-400"
                   placeholder="Zoek een product op naam of beschrjving...">
        </div>
    </div>

    <table class="w-full text-sm text-left">
        <thead class="bg-[#4c5c74] text-white uppercase text-xs tracking-wider">
        <tr>
            <th scope="col" class="px-4 py-3 font-semibold">Naam</th>
            <th scope="col" class="px-4 py-3 font-semibold hidden sm:table-cell">Beschrijving</th>
            <th scope="col" class="px-4 py-3 font-semibold hidden sm:table-cell">Materiaal</th>
            <th scope="col" class="px-4 py-3 font-semibold hidden sm:table-cell">Producttype</th>
            <th scope="col" class="px-4 py-3 font-semibold hidden sm:table-cell">Productietijd</th>
            <th scope="col" class="px-4 py-3"><span class="sr-only">Acties</span></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr class="hover:bg-[#f0f4f8] transition duration-150 cursor-pointer">
                <td onclick="window.location='{{ route('verkopers.show', $product) }}'"
                    class="px-4 py-3 font-medium text-[#4c5c74]">{{ $product->name }}</td>
                <td class="px-4 py-3 text-[#4c5c74] hidden sm:table-cell">{{ Str::limit($product->description, 50) }}</td>
                <td class="px-4 py-3 text-[#4c5c74] hidden sm:table-cell">{{ $product->material ?? 'N/A' }}</td>
                <td class="px-4 py-3 text-[#4c5c74] hidden sm:table-cell">{{ $product->productType->name ?? 'N/A' }}</td>
                <td class="px-4 py-3 text-[#4c5c74] hidden sm:table-cell">{{ $product->production_time ?? 'N/A' }}</td>
                <td class="px-4 py-3 flex items-center justify-end gap-2">
                    <a href="{{ route('verkopers.edit', $product) }}"
                       class="px-4 py-2 rounded-full bg-gradient-to-r from-[#4a90e2] to-[#054162] text-white font-semibold text-sm hover:shadow-md transition duration-200">
                        Bewerken
                    </a>
                    <button type="button" onclick="deleteProduct({{ $product->id }}, '{{ $product->name }}')"
                            class="px-4 py-2 rounded-full bg-[#f44336] text-white font-semibold text-sm hover:bg-[#e53935] hover:shadow-md transition duration-200">
                        Verwijderen
                    </button>

                    <!-- Verwijderformulier (Verborgen) -->
                    <form id="delete-form-{{ $product->id }}" action="{{ route('verkopers.destroy', $product->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="py-4 px-3">
        <div class="flex items-center justify-between gap-2 flex-wrap">
            <div class="flex items-center gap-4 w-full sm:w-auto">
                <label class="text-sm text-[#4c5c74] leading-5">Per pagina</label>
                <select wire:model.live="perPage"
                        class="text-[#4c5c74] text-sm rounded-full focus:ring-[#d7c100] focus:border-[#d7c100] block w-full sm:w-auto pr-8 pl-3 p-2.5 border-[#4c5c74] appearance-none">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="w-full sm:w-auto mt-4 sm:mt-0">
                {{ $products->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteProduct(id, name) {
        Swal.fire({
            title: "Weet u zeker dat u " + name + " wilt verwijderen?",
            text: "Dit kan niet teruggedraaid worden!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ja, verwijderen!",
            cancelButtonText: "Annuleren",
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("delete-form-" + id).submit();
            }
        });
    }
</script>

