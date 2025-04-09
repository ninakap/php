<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Menu Overzicht</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }
        h2 {
            color: #333;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color:rgb(195, 15, 15);
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<h2>Menu Overzicht</h2>

<?php
// Foutmeldingen aan
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB gegevens
$host = "db";
$user = "user";
$pass = "password";
$db   = "mydatabase";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM menu");

    echo "<table>";
    echo "<tr><th>ID</th><th>Naam</th><th>Prijs</th><th>Beschrijving</th><th>Categorie</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['naam']) . "</td>";
        echo "<td>€" . number_format($row['prijs'], 2, ',', '.') . "</td>";
        echo "<td>" . htmlspecialchars($row['beschrijving']) . "</td>";
        echo "<td>" . htmlspecialchars($row['categorie']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Fout bij databaseverbinding: " . $e->getMessage();
}
?>

</body>
</html>
