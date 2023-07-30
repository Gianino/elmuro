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

$sql = "SELECT username, MAX(avatar_url) as avatar_url, SUM(puntos) as puntos FROM puntos GROUP BY username ORDER BY puntos DESC";
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
    <link rel="stylesheet" href="livestudio.css">
</head>
<body>
    <div class="elmuro">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $image = ($row['avatar_url'] == '')?'https://placehold.co/50':base64_decode($row['avatar_url']);
        ?>
        <div class="tag">
            <div class="avatar">
                <img src="<?php echo $image; ?>" alt="">
            </div>
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
    <footer  id="firma">Deja tu firma en el Muro. Por siempre</footer>
    <script src="main.js"></script>
</body>
</html>