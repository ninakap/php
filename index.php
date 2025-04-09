<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css?v=1.1">
    <title>Thai Palace</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Joan&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <!-- Header -->
        <div class="top-bar">
            <div class="menu-icon">☰</div>
            <h1 class="title">Thai Palace</h1>
        </div>
        <div class="main-content">
            <img class="buddha-image" src="images/budda.png" alt="Buddha Art">>
        </div>
        <div class="section">
            <div class="icon"></div>
            <button class="book-btn">boek nu</button>
            <div class="arrow"></div>
        </div>
        
    <div class="info-section">
        <p><strong>Smaken, geuren en kleuren</strong><br>
        Wij willen dat onze gasten proeven, ruiken en zien dat de maaltijden op authentieke Thaise wijze worden bereid en van een hoge kwaliteit zijn. 
        De maaltijden worden met liefde en een glimlach klaargemaakt en geserveerd. 
        De verse ingrediënten zijn samen met de authentieke bereidingswijzen het geheim van de smaakvolle keuken van Thai Palace.</p>
        <img class="restaurant-image" src="images/res1.png" alt="Thai Palace Restaurant">
    </div>
</div>
<a href="menu.php" class="menu-link">
    <div class="menu-section">
        <div class="menu-content">
            <h2>menu</h2>
            <p>Onze keuken is geopend<br>vanaf 18:00 uur t/m 23:00 uur</p>
        </div>
        <div class="menu-circle"></div>
        <div class="boeknu"></div>
    </div>
</a>
</div>
<div class="reservation-section">
    <div class="food-images">
        <img src="images/etenvoorpagina1.png" alt="Gerecht 1">
        <img src="images/etenvoorpagina2.png"Gerecht 2">
        <img src="images/etenvoorpagina3.png" alt="Gerecht 3">
    </div>
    <div class="reservation-box">
        <p>Smaken, geuren en kleuren<br>Reserveer een tafel online of per telefoon</p>
        <button class="reserve-button">boek nu</button>
    </div>
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



<?php
$host = 'db';
$db = 'mydatabase';
$user = 'user';
$pass = 'password';
$charset = 'utf8mb4';



$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false, 
];

try {
    $connect = new PDO($dsn, $user, $pass, $opt);
    echo "Verbinding is gemaakt.";
} catch (PDOException $e) {
    echo "Database connectie mislukt: " . $e->getMessage();
    die("Sorry, database probleem");
}
?>
