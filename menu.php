<?php
// DATABASE CONNECTIE
$host = "db";
$user = "user";
$pass = "password";
$dbname = "mydatabase";
$charset = "utf8mb4"; // voeg deze toe

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset"; // dit ontbrak

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $stmt = $pdo->query("SELECT * FROM dishes");
    $dishes = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Databasefout: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Thai Palace</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Joan&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <div class="top-bar">
            <div class="menu-icon">☰</div>
            <h1 class="title">Thai Palace</h1>  
        </div>
    </div>

    <div class="kitchen-info">
        <p class="kitchen-title">Menu</p>
        <p class="kitchen-text">Onze keuken is geopend vanaf 18:00 uur tm 23:00 uur</p>
    </div>

    <div class="dishes">
        <?php foreach ($dishes as $dish): ?>
            <div class="dish">
                <img src="<?= htmlspecialchars($dish['image']) ?>" alt="<?= htmlspecialchars($dish['name']) ?>">
                <h3><?= htmlspecialchars($dish['name']) ?> (<?= htmlspecialchars($dish['category']) ?>)</h3>
                <p><?= htmlspecialchars($dish['description']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <h2>Thai Palace</h2>
                <p>nep adres</p>
                <p>+0766666666</p>
            </div>
            <div class="footer-right">
                <h3>Werkdagen</h3>
                <p>maandag: 18:00 - 23:00</p>
                <p>dinsdag: 18:00 - 23:00</p>
                <p>woensdag: 18:00 - 23:00</p>
                <p>donderdag: 18:00 - 23:00</p>
                <p>vrijdag: 18:00 - 23:00</p>
                <p>zaterdag: 18:00 - 23:00</p>
            </div>
        </div>
    </footer>
</body>
</html>
