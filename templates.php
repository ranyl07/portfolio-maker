

<?php
$server   = "localhost";
$username = "root";
$password = "";
$database = "portfolio";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
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

<!-- FORM START -->
<form method="POST">

<div class="templates">
 <div class="temp">
        <iframe src="hadylmodel.html"></iframe>
        <button type="submit" class="choose-btn"  name="template" data-model-id="1">Choose</button>
    </div>
    <div class="temp">
        <iframe src="imenemodel.html"></iframe>
        <button type="submit" name="template" class="choose-btn" >Choose</button>
    </div>

   <div class="temp">
        <iframe src="meriemmodel.html"></iframe>
        <button type="submit" name="template" class="choose-btn" >Choose</button>
    </div>

    <div class="temp">
        <iframe src="soundosmodel.html"></iframe>
        <button type="submit" class="choose-btn" name="template" value="soundosmodel">Choose</button>
    </div>
      <div class="temp">
        <iframe src="wassilamodel.html"></iframe>
        <button type="submit" class="choose-btn" name="template" data-model-id="5">Choose</button>
    </div>
 <a href="userdata.php" id="generate">Generate</a>
</div>

</form>

<?php
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO user_portfolio (id_model) VALUES (?)");
    $stmt->bind_param("s", $template);
    $stmt->execute();

    echo "<p style='color:green;'>Template saved: $template</p>";
}
?>

</body>
</html>