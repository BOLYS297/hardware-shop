<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Services\PaiementService;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    protected $paiementService;

    public function __construct(PaiementService $paiementService)
    {
        $this->paiementService = $paiementService;
    }

    // route: GET /paiement/{commande}
    public function payer($commandeId)
    {
        $commande = Commande::where('id', $commandeId)->where('user_id', Auth::id())->firstOrFail();
        // Préparer les données pour le service (le service attend un tableau)
        $data = [
            'commande_id' => $commande->id,
            'montant' => $commande->total ?? 0,
            'methode' => 'simulation', // par défaut 'simulation' en dev, ou récupérer depuis la requête
            'user' => Auth::user(),
        ];

        $response = $this->paiementService->createPayment($data);

        if (! empty($response['status']) && $response['status'] === 'success') {
            // paiement créé et réussi (simulation)
            return redirect()->route('user.commandes')->with('success', 'Paiement effectué.');
        }

        if (! empty($response['status']) && $response['status'] === 'redirect' && ! empty($response['url'])) {
            return redirect($response['url']);
        }

        return back()->with('error', "Impossible d'initier le paiement");
    }

    // callback: GET /paiement/callback
    public function callback(Request $request)
    {
        // Le service attend le payload complet du callback
        $payload = $request->all();

        $ok = $this->paiementService->handleGatewayCallback($payload);

        if ($ok) {
            return redirect()->route('user.commandes')->with('success', 'Paiement réussi.');
        }

        return redirect()->route('user.commandes')->with('error', 'Paiement échoué.');
    }
}
