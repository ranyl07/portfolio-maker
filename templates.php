<?php
$server   = "localhost";
$username = "root";
$password = "";
$database = "portfolio";

// Connects to the database
$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['template'])) {
    
    $template = intval($_POST['template']);

    $stmt = $conn->prepare("INSERT INTO user_portfolio (id_model) VALUES (?)");
    $stmt->bind_param("i", $template);
    $stmt->execute();

    header("Location: /makefolio/userdata.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our portfolios</title>
    <link rel="stylesheet" href="tamplates.css">
</head>
<body>

<header class="head">
    <img class="logo" src="img/M.png" alt="Logo">
    <nav>
        <ul>
            <li><a href="/makefolio/Homepage.php">Home</a></li>
            <li><a href="/makefolio/about.html">About portfolio</a></li>
            <li><a href="/makefolio/usersportfolio.php">Yours</a></li>
        </ul>
    </nav>
</header>

<h1>Our portfolios</h1>
<p>Choose a template to create your portfolio</p>

<div class="templates">

    

    <div class="temp">
        <iframe src="hadylmodel.html"></iframe>
        <form method="POST">
            <button type="submit" name="template" value="1" class="choose-btn">Choose this template</button>
        </form>
    </div>

    <div class="temp">
        <iframe src="imenemodel.html"></iframe>
        <form method="POST">
            <button type="submit" name="template" value="2" class="choose-btn">Choose this template</button>
        </form>
    </div>

    <div class="temp">
        <iframe src="meriemmodel.html"></iframe>
        <form method="POST">
            <button type="submit" name="template" value="3" class="choose-btn">Choose this template</button>
        </form>
    </div>

    <div class="temp">
        <iframe src="soundosmodel.html"></iframe>
        <form method="POST">
            <button type="submit" name="template" value="4" class="choose-btn">Choose this template</button>
        </form>
    </div>

    <div class="temp">
        <iframe src="wassilamodel.html"></iframe>
        <form method="POST">
            <button type="submit" name="template" value="5" class="choose-btn">Choose this template</button>
        </form>
    </div>

</div>

</body>
</html>