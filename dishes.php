<form action="add_dish.php" method="post" enctype="multipart/form-data">
    <label for="naam">Naam gerecht:</label><br>
    <input type="text" name="naam" required><br><br>

    <label for="prijs">Prijs (€):</label><br>
    <input type="text" name="prijs" required><br><br>

    <label for="beschrijving">Beschrijving:</label><br>
    <textarea name="beschrijving" rows="4" required></textarea><br><br>

    <label for="categorie">Categorie (bijv. vega, kip):</label><br>
    <input type="text" name="categorie" required><br><br>

    <label for="afbeelding">Afbeelding uploaden (optioneel):</label><br>
    <input type="file" name="afbeelding"><br><br>

    <input type="submit" value="Gerecht toevoegen">
</form>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Databaseconnectie
$host = "db";
$user = "user";
$pass = "password";
$db   = "mydatabase";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $naam = $_POST['naam'];
        $prijs = $_POST['prijs'];
        $beschrijving = $_POST['beschrijving'];
        $categorie = $_POST['categorie'];
        $afbeelding = null;

        // Als er een afbeelding is geüpload
        if (!empty($_FILES['afbeelding']['name'])) {
            $uploadDir = "images/";
            $uploadFile = $uploadDir . basename($_FILES['afbeelding']['name']);
            if (move_uploaded_file($_FILES['afbeelding']['tmp_name'], $uploadFile)) {
                $afbeelding = basename($_FILES['afbeelding']['name']);
            } else {
                echo "Fout bij uploaden van afbeelding.";
            }
        }

        // Voeg toe aan database
        $stmt = $pdo->prepare("INSERT INTO menu (naam, prijs, beschrijving, categorie, afbeelding) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$naam, $prijs, $beschrijving, $categorie, $afbeelding]);

        echo "Gerecht succesvol toegevoegd!";
    }
} catch (PDOException $e) {
    echo "Fout: " . $e->getMessage();
}
?>
