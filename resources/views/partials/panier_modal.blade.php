<!-- Bouton pour ouvrir le modal -->
<button class="btn btn-primary" id="btnPanier">
  <i class="bi bi-cart"></i> Voir le panier
</button>

<!-- Modal -->
<div class="modal fade" id="panierModal" tabindex="-1" aria-labelledby="panierModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="panierModalLabel">Votre panier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body" id="panierModalContent">
        <p class="text-center text-muted">Chargement...</p>
      </div>

      <div class="modal-footer d-flex justify-content-between">
        <a href="{{ route('client.panier') }}" class="btn btn-outline-primary">Voir le panier</a>
        <a href="{{ route('client.commandes.store') }}" class="btn btn-success">Passer la commande</a>
      </div>
    </div>
  </div>
</div>
<script>
document.getElementById('btnPanier').addEventListener('click', function() {
    fetch('{{ route('panier.modal') }}')
        .then(response => response.json())
        .then(data => {
            document.getElementById('panierModalContent').innerHTML = data.html;
            var panierModal = new bootstrap.Modal(document.getElementById('panierModal'));
            panierModal.show();
        })
        .catch(error => {
            document.getElementById('panierModalContent').innerHTML = "<p class='text-danger text-center'>Erreur de chargement du panier.</p>";
        });
});
</script>
