<?php
$conn = new mysqli("localhost", "root", "", "portfolio");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = null;

// Support shared link with ?id=
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $conn->prepare("SELECT up.*, GROUP_CONCAT(s.skill_name SEPARATOR ',') AS skills
                            FROM user_portfolio up
                            LEFT JOIN skill s ON s.id_portfolio = up.id_portfolio
                            WHERE up.id_portfolio = ?
                            GROUP BY up.id_portfolio");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
} else {
    // Load the latest portfolio
    $result = $conn->query("SELECT up.*, GROUP_CONCAT(s.skill_name SEPARATOR ',') AS skills
                            FROM user_portfolio up
                            LEFT JOIN skill s ON s.id_portfolio = up.id_portfolio
                            GROUP BY up.id_portfolio
                            ORDER BY up.id_portfolio DESC LIMIT 1");
    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="usersportfolio.css">
</head>
<body>
<header class="head">
  
        <a href="homepage.php"> <img class="logo" src="img/M.png" alt="Logo"></a>
    <nav>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="about.html">About portfolio</a></li>
            <li><a href="user'sportfolio.php">Yours</a></li>
        </ul>
    </nav>
</header>

<div class="container">

    <div id="empty" class="card hidden">
        <h1>No Portfolio Yet 😕</h1>
        <p>Create a portfolio to express yourself!</p>
        <a href="userdata.php" class="btn">Make Portfolio</a>
    </div>

    <div id="portfolio" class="card hidden">
        <h1 id="name"></h1>
        <p id="tagline"></p>

        <h2>About</h2>
        <p id="about"></p>

        <h2>Skills</h2>
        <div id="skills"></div>

        <h2>Contact</h2>
        <p id="email"></p>
        <p id="phone"></p>

        <br>

        <button class="btn delete" id="delete">Delete</button>
        <button class="btn" id="save">Save</button>
        <button class="btn" id="share">Share</button>
    </div>

</div>
 <?<php 
$conn= new mysqli("localhost","root","",portfolio);
$id=$_GET['id'];
$user=$conn->query("SELECT*FROM user WHERE id=$id")->fetch_assoc();
$portfolio=$conn->query("SELECT*FROM userportfolio WHERE id=$id")->fetch_assoc();
$projects=$conn->query("SELECT*FROM project WHERE user_id=$id");
$socials=$conn->query("SELECT*FROM social_link WHERE user_id=$id");
?>

<script>
    let portfolioData = <?php echo json_encode($data); ?>;
</script>
<script src="usersportfolio.js"></script>
</body>
</html>
