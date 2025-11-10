<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Affiche le formulaire de contact
     */
    public function show()
    {
        return view('home.contact');
    }

    /**
     * Traite l'envoi du message de contact (envoie un mail à l'admin)
     */
    public function send(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'nullable|string|max:30',
            'message' => 'required|string|min:5'
        ]);

        // Envoi d'un mail (utilise une Mailable si tu veux)
        Mail::raw("Message de: {$data['nom']} ({$data['email']}, {$data['telephone']})\n\n{$data['message']}", function($m) use ($data) {
            $m->to(config('mail.from.address'))
              ->subject('Nouveau message de contact - ' . config('app.name'));
        });

        return back()->with('success', 'Message envoyé. Nous vous répondrons bientôt.');
    }

}
