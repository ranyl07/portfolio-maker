<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our portfolios</title>

    <link rel="stylesheet" href="tamplates.css">

    <style>
        .templates{
            display:flex;
            flex-wrap:wrap;
            gap:20px;
            justify-content:center;
        }

        .temp{
            width:300px;
            height:400px;
            background:#eee;
            border-radius:10px;
            overflow:hidden;
            display:flex;
            flex-direction:column;
        }

        iframe{
            width:100%;
            height:100%;
            border:none;
        }

        button{
            padding:10px;
            border:none;
            cursor:pointer;
            background:#333;
            color:white;
        }

        button:hover{
            background:#555;
        }
    </style>
</head>

<body>

<header class="head">
    <img class="logo" src="img/M.png" alt="Logo">

    <nav>
        <ul>
            <li><a href="Homepage.php">Home</a></li>
            <li><a href="about.html">About portfolio</a></li>
            <li><a href="yours.html">Yours</a></li>
        </ul>
    </nav>
</header>

<h1>Our portfolios</h1>
<p>Choose a template to create your portfolio</p>

<!-- FORM START -->
<form method="POST">

<div class="templates">

    <div class="temp">
        <iframe src="meriemmodel.html"></iframe>
        <button type="submit" name="template" value="meriemmodel">Choose</button>
    </div>

    <div class="temp">
        <iframe src="hadylmodel.html"></iframe>
        <button type="submit" name="template" value="hadylmodel">Choose</button>
    </div>

    <div class="temp">
        <iframe src="wassilamodel.html"></iframe>
        <button type="submit" name="template" value="wassilamodel">Choose</button>
    </div>

    <div class="temp">
        <iframe src="soundosmodel.html"></iframe>
        <button type="submit" name="template" value="soundosmodel">Choose</button>
    </div>
 <a href="userdata.php" id="generate">Generate</a>
</div>

</form>

<?php
 include 'homepage';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO model (model_name) VALUES (?)");
    $stmt->bind_param("s", $template);
    $stmt->execute();

    echo "<p style='color:green;'>Template saved: $template</p>";
}
?>

</body>
</html>