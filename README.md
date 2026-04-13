# Webanwendung: User-Sequence mit Login, Shop und Checkout

Dieses Projekt ist eine kleine Webanwendung, die eine durchgehende User-Sequence von der Anmeldung über eine Produktseite bis hin zum Checkout demonstriert.

## Inhaltsverzeichnis
1. [Ziel der Aufgabe](#ziel-der-aufgabe)
2. [Verwendete Technologien](#verwendete-technologien)
3. [Projektstruktur und Dateierklärung](#projektstruktur-und-dateierklärung)
4. [Funktionsumfang und Erklärung](#funktionsumfang-und-erklärung)
    - [Login-Seite](#1-login-seite)
    - [Shop-Seite](#2-shop-seite)
    - [Checkout-Seite](#3-checkout-seite)
5. [Erklärung der Funktionalität](#erklärung-der-funktionalität)
    - [Benutzerfluss](#benutzerfluss)
    - [Rollen der Technologien](#rollen-der-technologien)
    - [Warenkorb-Funktionalität](#warenkorb-funktionalität)
    - [Validierung](#validierung)
    - [Datenverarbeitung und -speicherung](#datenverarbeitung-und--speicherung)
6. [Kommentierung des Codes](#kommentierung-des-codes)
7. [Wichtige Sicherheitsaspekte](#wichtige-sicherheitsaspekte)
8. [Mindestanforderungen](#mindestanforderungen)

---

### Ziel der Aufgabe
Das Ziel ist die Entwicklung einer zusammenhängenden Webanwendung, in der ein Benutzer sich anmeldet, Produkte in einen Warenkorb legt und die Bestellung abschließt. Die Anwendung ist strukturiert aufgebaut, kommentiert und soll die grundlegende Funktionsweise einer E-Commerce-Anwendung veranschaulichen.

### Verwendete Technologien
*   **HTML**: Für die semantische Struktur der Webseiten.
*   **CSS**: Für kleinere, benutzerdefinierte Stilanpassungen.
*   **Bootstrap**: Für das responsive Layout, Formulare, Buttons und Produktkarten.
*   **JavaScript**: Für die clientseitige Interaktivität, insbesondere die Warenkorb-Logik und die Formularvalidierung.
*   **PHP**: Für die serverseitige Logik wie die Seitenstruktur (Header/Footer), Session-Management und Weiterleitungen.

### Projektstruktur und Dateierklärung
*   `login.php`: Die Startseite mit dem Anmeldeformular.
*   `products.php`: Die Shop-Seite, auf der Produkte angezeigt und dem Warenkorb hinzugefügt werden können.
*   `checkout.php`: Die Kassenseite zum Abschluss der Bestellung.
*   `logout.php`: Beendet die Benutzer-Session und leitet zum Login zurück.
*   `header.php` / `footer.php`: Wiederverwendbare Codeblöcke für den Kopf- und Fußbereich der Seiten, um Redundanz zu vermeiden.
*   `style.css`: Enthält benutzerdefinierte CSS-Regeln.
*   `app.js`: Beinhaltet die zentrale JavaScript-Logik für den Warenkorb und die Validierung.

### Funktionsumfang und Erklärung

#### 1. Login-Seite (`login.php`)
Eine einfache und übersichtliche Login-Seite, die mit Bootstrap gestaltet ist.
*   **Funktion**: Ein Benutzer muss sich mit vordefinierten Zugangsdaten anmelden, um auf die Shop-Seite zu gelangen.
*   **Zugangsdaten (Demo)**:
    *   Benutzername: `admin`
    *   Passwort: `1234`
*   **Prüfung**: Die Prüfung erfolgt serverseitig in PHP. Bei erfolgreichem Login wird eine Session gestartet und der Benutzer zur `products.php` weitergeleitet. Bei falschen Daten erscheint eine Fehlermeldung.

#### 2. Shop-Seite (`products.php`)
Eine mit Bootstrap-Karten gestaltete Produktübersicht.
*   **Funktion**: Zeigt eine Auswahl von Produkten an. Jeder Artikel hat einen "In den Warenkorb"-Button.
*   **Warenkorb**: Klickt ein Benutzer auf den Button, wird das Produkt über JavaScript zum Warenkorb hinzugefügt. Der Warenkorb (Anzahl der Artikel und Gesamtsumme) ist jederzeit sichtbar. Die Daten des Warenkorbs werden im `localStorage` des Browsers gespeichert, damit sie beim Wechsel zur Checkout-Seite erhalten bleiben.

#### 3. Checkout-Seite (`checkout.php`)
Eine Seite zum Abschluss des Bestellvorgangs.
*   **Funktion**: Zeigt eine Zusammenfassung der Artikel im Warenkorb an. Ein Formular erfasst die Kundendaten.
*   **Validierung**: Das Formular wird clientseitig mit JavaScript und den Validierungsfunktionen von Bootstrap geprüft. Leere oder ungültige Felder werden markiert und das Absenden verhindert, bis alle Eingaben korrekt sind.
*   **Abschluss**: Nach erfolgreicher Validierung und Klick auf den Bestellbutton wird eine Bestätigungsnachricht angezeigt.

### Erklärung der Funktionalität

#### Benutzerfluss
1.  Der Benutzer startet auf der **Login-Seite**.
2.  Nach erfolgreicher Anmeldung wird er zur **Shop-Seite** weitergeleitet.
3.  Dort kann er Produkte in den Warenkorb legen und anschließend zum **Checkout** wechseln.
4.  Auf der **Checkout-Seite** gibt er seine Daten ein und schließt die Bestellung ab.
5.  Über den Logout-Link kann die Session beendet werden, was zurück zur Login-Seite führt.

#### Rollen der Technologien
*   **HTML/PHP**: Die `.php`-Dateien erzeugen die HTML-Struktur. PHP wird genutzt, um Header und Footer dynamisch einzubinden und den Zugriff auf die Seiten basierend auf dem Login-Status zu steuern.
*   **Bootstrap/CSS**: Bootstrap liefert das Grundgerüst für ein responsives und modernes Design. `style.css` ergänzt spezifische Anpassungen.
*   **JavaScript**: Ist das "Gehirn" im Frontend. Es steuert den Warenkorb (Hinzufügen, Aktualisieren) und prüft die Formulareingaben im Checkout in Echtzeit.
*   **PHP-Session**: Speichert den Login-Status des Benutzers serverseitig.

#### Warenkorb-Funktionalität
Der Warenkorb ist rein clientseitig mit JavaScript umgesetzt.
1.  **Speicherung**: Die Artikel werden als Array von Objekten im `localStorage` des Browsers gespeichert. Dies ist eine einfache Form des persistenten Speichers auf Client-Seite.
2.  **Funktionen**: JavaScript-Funktionen kümmern sich um das Hinzufügen von Artikeln, die Berechnung der Gesamtsumme und die Aktualisierung der Anzeige.
3.  **Datenübergabe**: Da die Daten im `localStorage` verbleiben, kann die `checkout.php`-Seite darauf zugreifen und die Bestellübersicht dynamisch generieren.

#### Validierung
*   **Login**: Die Prüfung der Zugangsdaten erfolgt in `login.php` serverseitig durch einen einfachen Vergleich der POST-Daten mit den vordefinierten Werten.
*   **Checkout-Formular**: Die Validierung findet clientseitig mit JavaScript statt. Es wird geprüft, ob die Pflichtfelder (z.B. Name, E-Mail, Adresse) ausgefüllt sind und ob die E-Mail ein gültiges Format hat. Bootstrap-Klassen werden verwendet, um dem Benutzer visuelles Feedback zu geben.

#### Datenverarbeitung und -speicherung
*   **Login-Status**: Wird in der PHP `$_SESSION` gespeichert. Dies ist eine serverseitige Speichermethode.
*   **Warenkorb**: Wird im `localStorage` des Browsers gespeichert (clientseitig).
*   **Formulardaten**: Werden im Checkout-Formular erfasst und nach dem Absenden (in einer realen Anwendung) an einen Server zur weiteren Verarbeitung gesendet. In diesem Demo-Projekt werden sie nur validiert.

### Kommentierung des Codes
Der Code ist so kommentiert, dass die Logik und die Struktur verständlich sind. Kommentare markieren wichtige Abschnitte wie die Navigation, Formulare, Produktkarten oder spezifische JavaScript-Funktionen. Offensichtliche Zeilen werden bewusst nicht kommentiert, um die Lesbarkeit zu wahren.

### Wichtige Sicherheitsaspekte
Diese Anwendung dient zu Demonstrationszwecken. In einer realen Produktionsumgebung müssten folgende Sicherheitsaspekte dringend beachtet werden:

1.  **Unsicherer Demo-Login**: Die Zugangsdaten sind fest im Code hinterlegt. In einem echten System würden Benutzerdaten in einer Datenbank gespeichert und Passwörter ausschließlich als Hash-Werte (z.B. mit `password_hash()`) abgelegt.
2.  **Validierung von Eingaben**: Clientseitige Validierung (JavaScript) ist benutzerfreundlich, aber nicht sicher. Alle vom Benutzer kommenden Daten müssen **immer** auch serverseitig (in PHP) validiert und bereinigt werden (z.B. mit `htmlspecialchars()`), um Angriffe wie Cross-Site Scripting (XSS) zu verhindern.
3.  **Passwörter im Klartext**: Passwörter dürfen niemals im Klartext gespeichert oder übertragen werden.
4.  **Sensible Daten im Browser**: Der `localStorage` ist nicht für sensible Daten geeignet, da er von jedem auf dem Computer ausgeführten JavaScript ausgelesen werden kann. Für einen echten Warenkorb wäre eine serverseitige Speicherung (z.B. in der PHP-Session oder einer Datenbank) die sicherere Wahl.
5.  **Serverseitige Prüfung ist entscheidend**: Ein Angreifer kann JavaScript-Prüfungen leicht umgehen. Die serverseitige Logik ist die einzige verlässliche Verteidigungslinie.

### Mindestanforderungen
Alle geforderten Kriterien sind erfüllt:
*   Drei verbundene Seiten (Login, Shop, Checkout).
*   Sichtbarer Einsatz von Bootstrap für das Layout.
*   Funktionierender Warenkorb auf JavaScript-Basis.
*   Sinnvolle Kommentare und eine ausführliche Erklärung.
*   Hinweise auf die grundlegenden Sicherheitsaspekte.

