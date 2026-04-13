// app.js

// Event-Listener, der beim Laden der Seite ausgeführt wird
document.addEventListener('DOMContentLoaded', () => {
    // Aktualisiert die Warenkorb-Anzeige auf der Produkt- und Checkout-Seite
    if (document.getElementById('cart-items')) {
        updateCartDisplay();
    }
    if (document.getElementById('checkout-cart-items')) {
        updateCheckoutDisplay();
    }
});

/**
 * Fügt ein Produkt zum Warenkorb hinzu oder erhöht die Menge.
 * @param {string} name - Der Name des Produkts.
 * @param {number} price - Der Preis des Produkts.
 */
function addToCart(name, price) {
    // Warenkorb aus dem localStorage laden oder einen leeren erstellen
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Prüfen, ob das Produkt bereits im Warenkorb ist
    const existingProduct = cart.find(item => item.name === name);

    if (existingProduct) {
        // Wenn ja, Menge erhöhen
        existingProduct.quantity++;
    } else {
        // Wenn nein, als neues Produkt hinzufügen
        cart.push({ name, price, quantity: 1 });
    }

    // Aktualisierten Warenkorb im localStorage speichern
    localStorage.setItem('cart', JSON.stringify(cart));
    
    // Warenkorb-Anzeige aktualisieren
    updateCartDisplay();
}

/**
 * Aktualisiert die Anzeige des Warenkorbs auf der Shop-Seite.
 */
function updateCartDisplay() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartItemsElement = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');
    
    if (!cartItemsElement || !cartTotalElement) return;

    cartItemsElement.innerHTML = ''; // Bisherige Einträge leeren
    let total = 0;

    if (cart.length === 0) {
        cartItemsElement.innerHTML = '<li class="list-group-item">Ihr Warenkorb ist leer.</li>';
    } else {
        cart.forEach(item => {
            // Für jedes Produkt ein Listenelement erstellen
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.textContent = `${item.name} (x${item.quantity})`;
            
            const priceSpan = document.createElement('span');
            priceSpan.className = 'badge bg-secondary';
            priceSpan.textContent = `${(item.price * item.quantity).toFixed(2)} €`;
            
            li.appendChild(priceSpan);
            cartItemsElement.appendChild(li);
            
            // Gesamtsumme berechnen
            total += item.price * item.quantity;
        });
    }

    // Gesamtsumme im HTML aktualisieren
    cartTotalElement.textContent = total.toFixed(2);
}

/**
 * Aktualisiert die Anzeige des Warenkorbs auf der Checkout-Seite.
 */
function updateCheckoutDisplay() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartItemsElement = document.getElementById('checkout-cart-items');
    const cartTotalElement = document.getElementById('checkout-cart-total');
    const cartCountElement = document.getElementById('cart-count');

    if (!cartItemsElement || !cartTotalElement || !cartCountElement) return;

    cartItemsElement.innerHTML = '';
    let total = 0;
    let itemCount = 0;

    if (cart.length === 0) {
        cartItemsElement.innerHTML = '<li class="list-group-item">Ihr Warenkorb ist leer.</li>';
    } else {
        cart.forEach(item => {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between lh-sm';
            
            const itemDiv = document.createElement('div');
            const itemName = document.createElement('h6');
            itemName.className = 'my-0';
            itemName.textContent = item.name;
            itemDiv.appendChild(itemName);
            
            const itemQuantity = document.createElement('small');
            itemQuantity.className = 'text-muted';
            itemQuantity.textContent = `Menge: ${item.quantity}`;
            itemDiv.appendChild(itemQuantity);
            
            li.appendChild(itemDiv);
            
            const itemPrice = document.createElement('span');
            itemPrice.className = 'text-muted';
            itemPrice.textContent = `${(item.price * item.quantity).toFixed(2)} €`;
            li.appendChild(itemPrice);
            
            cartItemsElement.appendChild(li);

            total += item.price * item.quantity;
            itemCount += item.quantity;
        });
    }

    cartTotalElement.textContent = `${total.toFixed(2)} €`;
    cartCountElement.textContent = itemCount;
}


// Bootstrap-Formularvalidierung (von der Bootstrap-Dokumentation übernommen)
// Dieser Code sorgt dafür, dass die Validierungs-Stile von Bootstrap auf das Formular angewendet werden.
(function () {
  'use strict'

  // Alle Formulare finden, auf die wir Validierungsstile anwenden wollen
  var forms = document.querySelectorAll('.needs-validation')

  // Schleife über die Formulare und Verhindern des Sendens bei ungültigen Eingaben
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
