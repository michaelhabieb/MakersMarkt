<?php

namespace App\Http\Controllers\Verkoper;


use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerkoperController extends Controller
{
    public function index()
    {
        return view('verkopers.products.index');
    }

    // Toon het dashboard met producten van de ingelogde verkoper
    public function dashboard()
    {
        $products = Product::where('maker_id', auth()->id())->get();
        return view('verkopers.dashboard', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('productType')->findOrFail($id);

        // Geef het product door aan de view
        return view('verkopers.products.show', compact('product'));
    }


    // Formulier voor een nieuw product
    public function create()
    {
        $productTypes = ProductType::all(); // Haal alle producttypes op
        return view('verkopers.products.create', compact('productTypes'));
    }

    // Sla het nieuwe product op
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'product_type_id' => 'required|exists:product_types,id',
            'material' => 'nullable|string|max:255',
            'production_time' => 'nullable|string|max:255',
            'complexity' => 'nullable|string|max:255',
            'durability' => 'nullable|string|max:255',
            'unique_features' => 'nullable|string',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'product_type_id' => $request->product_type_id,
            'material' => $request->material,
            'production_time' => $request->production_time,
            'complexity' => $request->complexity,
            'durability' => $request->durability,
            'unique_features' => $request->unique_features,
            'maker_id' => auth()->id(),
        ]);

        return redirect()->route('verkopers.index')->with('success', 'Product succesvol toegevoegd');
    }

    // Formulier om een product te bewerken
    public function edit($id)
    {
        $productTypes = ProductType::all();
        $product = Product::where('maker_id', auth()->id())->findOrFail($id);
        return view('verkopers.products.edit', compact('product','productTypes'));
    }

    // Update een bestaand product
    public function update(Request $request, $id)
    {
        $product = Product::where('maker_id', auth()->id())->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'product_type_id' => 'required|exists:product_types,id',
            'material' => 'nullable|string|max:255',
            'production_time' => 'nullable|string|max:255',
            'complexity' => 'nullable|string|max:255',
            'durability' => 'nullable|string|max:255',
            'unique_features' => 'nullable|string',
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'product_type_id' => $request->product_type_id,
            'material' => $request->material,
            'production_time' => $request->production_time,
            'complexity' => $request->complexity,
            'durability' => $request->durability,
            'unique_features' => $request->unique_features,
        ]);

        return redirect()->route('verkopers.index')->with('success', 'Product succesvol bijgewerkt');
    }

    // Verwijder een product
    public function destroy($id)
    {
        $product = Product::where('maker_id', auth()->id())->findOrFail($id);
        $product->delete();

        return redirect()->route('verkopers.index')->with('success', 'Product succesvol verwijderd');
    }
}
