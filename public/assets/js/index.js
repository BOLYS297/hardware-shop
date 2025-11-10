$(() =>{
    $('#allcategories').tooltip({trigger: 'hover', placement: 'left'});
})
  // Sélectionne tous les boutons "Ajouter au panier"
  const addButtons = document.querySelectorAll('.add-to-cart');
  const cartItemsContainer = document.getElementById('cart-items');
  const totalDisplay = document.getElementById('total');

  let cart = []; // tableau des produits du panier

  addButtons.forEach(button => {
    button.addEventListener('click', function() {
      const card = this.closest('.card');
      const name = card.querySelector('.card-title').textContent;
      const price = parseFloat(card.querySelector('.price').textContent);

      // Vérifie si le produit existe déjà
      const existingItem = cart.find(item => item.name === name);

      if (existingItem) {
        existingItem.quantity++;
      } else {
        cart.push({ name, price, quantity: 1 });
      }

      updateCart();
    });
  });

  // Met à jour le panier affiché et le total
  function updateCart() {
    cartItemsContainer.innerHTML = ''; // vide la liste avant de la recréer
    let total = 0;

    cart.forEach(item => {
      const li = document.createElement('li');
      li.className = 'list-group-item d-flex justify-content-between align-items-center';
      li.innerHTML = `
        ${item.name} - ${item.price} FCFA × ${item.quantity}
        <span>${item.price * item.quantity} FCFA</span>
      `;
      cartItemsContainer.appendChild(li);
      total += item.price * item.quantity;
    });

    totalDisplay.textContent = total;
  }

