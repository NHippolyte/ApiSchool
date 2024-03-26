<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Afficher une liste de tous les produits.
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Montrer le formulaire de création d'un nouveau produit.
    public function create()
    {
        return view('products.create');
    }

    // Stocker un nouveau produit dans la base de données.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', // Assurez-vous que la catégorie existe.
        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id'),
        ]);

        $product->save();

        return redirect('/products')->with('success', 'Product has been added');
    }

    // Afficher un produit spécifique.
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Montrer le formulaire d'édition pour un produit spécifique.
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Mettre à jour le produit spécifique dans la base de données.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect('/products')->with('success', 'Product has been updated');
    }

    // Supprimer le produit spécifique de la base de données.
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Product has been deleted');
    }

}
