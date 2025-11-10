<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{


    // ---------------- Admin ----------------
    public function index()
    {
        $categories = Categorie::paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
         $categories = Categorie::paginate(20);
        return view('admin.categories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Categorie::create($data);
        return redirect()->route('admin.categories.index')->with('success','Catégorie créée.');
    }

    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('admin.categories.edit', compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        $categorie = Categorie::findOrFail($id);
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);
        $categorie->update($data);
        return redirect()->route('admin.categories.index')->with('success','Catégorie mise à jour.');
    }

    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return back()->with('success','Catégorie supprimée.');
    }
    // ---------------- Public ----------------
    public function indexPublic()
    {
        $categories = Categorie::withCount('produits')->get();
        return view('home.categories', compact('categories'));
    }

    public function showPublic($id)
    {
        $categorie = Categorie::with('produits')->findOrFail($id);
        return view('home.categorie', compact('categorie'));
    }


}
