<?php
include 'header.php'; // Header einbinden

// Prüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // Wenn nicht, zum Login weiterleiten
    exit;
}

// PHP-Logik für die Formularverarbeitung
$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hier würde die serverseitige Validierung und Verarbeitung stattfinden.
    // Aus Vereinfachungsgründen zeigen wir nur eine Erfolgsmeldung.
    $successMessage = 'Vielen Dank für Ihre Bestellung! Sie erhalten in Kürze eine Bestätigung per E-Mail.';
}
?>

<div class="row">
    <!-- Bestellübersicht -->
    <div class="col-md-5 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Ihr Warenkorb</span>
            <span class="badge bg-primary rounded-pill" id="cart-count">0</span>
        </h4>
        <ul class="list-group mb-3" id="checkout-cart-items">
            <!-- Checkout-Warenkorb-Elemente werden hier per JS eingefügt -->
        </ul>
        <li class="list-group-item d-flex justify-content-between">
            <span>Gesamtsumme (EUR)</span>
            <strong id="checkout-cart-total">0,00 €</strong>
        </li>
    </div>

    <!-- Kundendaten-Formular -->
    <div class="col-md-7 order-md-1">
        <h4 class="mb-3">Rechnungsadresse</h4>

        <?php if ($successMessage): ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php else: ?>
            <!-- Das Formular wird mit Bootstrap-Klassen für die Validierung vorbereitet -->
            <form class="needs-validation" novalidate action="checkout.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">Vorname</label>
                        <input type="text" class="form-control" id="firstName" required>
                        <div class="invalid-feedback">
                            Ein gültiger Vorname ist erforderlich.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Nachname</label>
                        <input type="text" class="form-control" id="lastName" required>
                        <div class="invalid-feedback">
                            Ein gültiger Nachname ist erforderlich.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                    <div class="invalid-feedback">
                        Bitte geben Sie eine gültige E-Mail-Adresse ein.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="address" placeholder="Hauptstr. 123" required>
                    <div class="invalid-feedback">
                        Bitte geben Sie Ihre Adresse ein.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="city" class="form-label">Ort</label>
                        <input type="text" class="form-control" id="city" required>
                        <div class="invalid-feedback">
                            Ein Ort ist erforderlich.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="zip" class="form-label">PLZ</label>
                        <input type="text" class="form-control" id="zip" required>
                        <div class="invalid-feedback">
                            Eine PLZ ist erforderlich.
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <h4 class="mb-3">Zahlungsart</h4>
                <div class="my-3">
                    <div class="form-check">
                        <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                        <label class="form-check-label" for="credit">Kreditkarte</label>
                    </div>
                    <div class="form-check">
                        <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="debit">PayPal</label>
                    </div>
                    <div class="form-check">
                        <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="paypal">Rechnung</label>
                    </div>
                </div>

                <hr class="my-4">

                <button class="btn btn-primary btn-lg w-100" type="submit">Bestellung abschließen</button>
            </form>
        <?php endif; ?>
        <div class="alert alert-danger mt-3">
            <h4 class="alert-heading">Wichtiger Sicherheitshinweis</h4>
            <p>Die clientseitige Validierung mit JavaScript (wie hier gezeigt) ist benutzerfreundlich, aber nicht sicher. Ein Angreifer kann sie leicht umgehen. Daher ist eine <strong>zusätzliche, serverseitige Validierung in PHP unerlässlich</strong>, um die Datenintegrität zu gewährleisten.</p>
        </div>
    </div>
</div>

<?php
include 'footer.php'; // Footer einbinden
?>
