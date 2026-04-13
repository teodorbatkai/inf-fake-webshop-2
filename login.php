<?php
// PHP-Logik für den Login
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Einfache serverseitige Prüfung (nur für Demo-Zwecke)
    if ($username === 'admin' && $password === '1234') {
        session_start();
        $_SESSION['loggedin'] = true;
        header('Location: products.php'); // Weiterleitung zur Shop-Seite
        exit;
    } else {
        $error = 'Ungültiger Benutzername oder falsches Passwort.';
    }
}

include 'header.php'; // Header einbinden
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <!-- Login-Formular -->
                <form action="login.php" method="POST" id="loginForm">
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Benutzername</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Passwort</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
        <div class="alert alert-info mt-3">
            <h4 class="alert-heading">Sicherheitshinweis</h4>
            <p>Dieser Login dient nur zu Demonstrationszwecken. In einer echten Anwendung würden Passwörter niemals im Klartext verglichen werden. Stattdessen sollten Passwörter immer gehasht gespeichert und überprüft werden.</p>
            <hr>
            <p class="mb-0">Test-Login: <strong>admin</strong> / <strong>1234</strong></p>
        </div>
    </div>
</div>

<?php
include 'footer.php'; // Footer einbinden
?>
