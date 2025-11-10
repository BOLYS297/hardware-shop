<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $clients = User::where('role','client')->paginate(25);
        return view('admin.users.index', compact('clients'));
    }

    public function show($id)
    {
        $client = User::with('commandes','adresses')->findOrFail($id);
        return view('admin.users.show', compact('client'));
    }

    public function edit($id)
    {
        $client = User::findOrFail($id);
        return view('admin.users.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = User::findOrFail($id);
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$client->id,
            'telephone' => 'nullable|string|max:20',
            'role' => 'required|in:client,admin'
        ]);

        $client->update($data);

        return redirect()->route('admin.users.index')->with('success','Client mis à jour.');
    }

    public function destroy($id)
    {
        $client = User::findOrFail($id);
        $client->delete();
        return back()->with('success','Client supprimé.');
    }

    /**
     * Réinitialiser mot de passe (admin)
     */
    public function resetPassword(Request $request, $id)
    {
        $client = User::findOrFail($id);
        $request->validate(['password' => 'required|min:8|confirmed']);
        $client->password = Hash::make($request->password);
        $client->save();
        return back()->with('success','Mot de passe réinitialisé.');
    }
}
