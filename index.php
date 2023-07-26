<?php
$servername = "localhost";
$username = "root";
$password = "T24863179a.";
$dbname = "tikapi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, SUM(puntos) as puntos FROM puntos GROUP BY username";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El muro de tiktok</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Voltaire&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="titulo">El Muro de TikTok</h1>
    <div class="elmuro">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <div class="tag">
            <div class="nombre"><?php echo $row['username']; ?></div>
            <div class="puntos"><?php echo $row["puntos"]; ?></div>
        </div>
        <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>

    </div>
    <script src="main.js"></script>
</body>
</html>