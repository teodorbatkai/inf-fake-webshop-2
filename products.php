<?php
include 'header.php'; // Header einbinden

// Prüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // Wenn nicht, zum Login weiterleiten
    exit;
}
?>

<div class="row">
    <!-- Produktkarten -->
    <div class="col-lg-8">
        <h2>Unsere Produkte</h2>
        <div class="row">
            <!-- Produkt 1 -->
            <div class="col-md-6 product-card">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Profi-Angelrute "Big Fish"</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Eine hochmoderne Carbon-Angelrute für den anspruchsvollen Fischer.</p>
                        <p class="card-text"><strong>Preis: 129,99 €</strong></p>
                        <button class="btn btn-primary" onclick='addToCart("Profi-Angelrute \"Big Fish\"", 129.99)'>In den Warenkorb</button>
                    </div>
                </div>
            </div>
            <!-- Produkt 2 -->
            <div class="col-md-6 product-card">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Köder-Set "All-in-One"</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Ein Set mit 50 verschiedenen Ködern für Süß- und Salzwasser.</p>
                        <p class="card-text"><strong>Preis: 29,99 €</strong></p>
                        <button class="btn btn-primary" onclick='addToCart("Köder-Set \"All-in-One\"", 29.99)'>In den Warenkorb</button>
                    </div>
                </div>
            </div>
            <!-- Produkt 3 -->
            <div class="col-md-6 product-card">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Wasserdichte Angeltasche</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Robuste und geräumige Tasche, die Ihre Ausrüstung trocken hält.</p>
                        <p class="card-text"><strong>Preis: 49,99 €</strong></p>
                        <button class="btn btn-primary" onclick="addToCart('Wasserdichte Angeltasche', 49.99)">In den Warenkorb</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warenkorb-Zusammenfassung -->
    <div class="col-lg-4">
        <h2>Warenkorb</h2>
        <div class="cart-summary">
            <ul id="cart-items" class="list-group mb-3">
                <!-- Warenkorb-Elemente werden hier per JS eingefügt -->
            </ul>
            <h5>Gesamtsumme: <span id="cart-total">0,00</span> €</h5>
            <a href="checkout.php" class="btn btn-success w-100">Zur Kasse</a>
        </div>
        <div class="alert alert-warning mt-3">
            <h4 class="alert-heading">Hinweis zur Datenspeicherung</h4>
            <p>Der Warenkorb wird im <code>localStorage</code> des Browsers gespeichert. Dies ist für eine Demo praktisch, aber für echte sensible Daten nicht sicher, da die Daten ungeschützt auf dem Client liegen.</p>
        </div>
    </div>
</div>

<?php
include 'footer.php'; // Footer einbinden
?>
