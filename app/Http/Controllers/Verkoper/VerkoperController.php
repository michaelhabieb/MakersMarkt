<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class VerkoperController extends Controller
{
    public function __construct()
    {
        // Zorg ervoor dat alleen verkopers toegang hebben
        $this->middleware('role:verkoper');
    }

    // Toon het dashboard van de verkoper
    public function dashboard()
    {
        $products = Product::where('maker_id', auth()->user()->id)->get();
        return view('verkoper.dashboard', compact('products'));
    }

    // Voeg een nieuw product toe
    public function create()
    {
        return view('verkoper.products.create');
    }

    // Sla het nieuwe product op
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            // Voeg hier andere validaties toe
        ]);

        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'maker_id' => auth()->user()->id,
        ]);
        
        $product->save();

        return redirect()->route('verkoper.dashboard')->with('success', 'Product succesvol toegevoegd');
    }

    // Toon het formulier om een product te bewerken
    public function edit($id)
    {
        $product = Product::where('maker_id', auth()->user()->id)->findOrFail($id);
        return view('verkoper.products.edit', compact('product'));
    }

    // Werk het product bij
    public function update(Request $request, $id)
    {
        $product = Product::where('maker_id', auth()->user()->id)->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        
        // Andere eigenschappen bijwerken als nodig
        
        $product->save();

        return redirect()->route('verkoper.dashboard')->with('success', 'Product succesvol bijgewerkt');
    }

    // Verwijder een product
    public function destroy($id)
    {
        $product = Product::where('maker_id', auth()->user()->id)->findOrFail($id);
        
        $product->delete();

        return redirect()->route('verkoper.dashboard')->with('success', 'Product succesvol verwijderd');
    }
}
