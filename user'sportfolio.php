<?php
$conn = new mysqli("localhost","root","","makefolio");


$conn->query("DELETE FROM skill WHERE id_portfolio = (SELECT id_portfolio FROM user_portfolio ORDER BY id_portfolio DESC LIMIT 1)");

$conn->query("DELETE FROM user WHERE id_portfolio = (SELECT id_portfolio FROM user_portfolio ORDER BY id_portfolio DESC LIMIT 1)");

$conn->query("DELETE FROM user_portfolio ORDER BY id_portfolio DESC LIMIT 1");

echo "deleted";
?>

<?php
$conn = new mysqli("localhost","root","","makefolio");


$result = $conn->query("SELECT id_portfolio FROM user_portfolio ORDER BY id_portfolio DESC LIMIT 1");

$row = $result->fetch_assoc();
$id = $row['id_portfolio'];


$link = "http://localhost/project/portfolio.php?id=".$id;


$conn->query("UPDATE user_portfolio SET share_link='$link' WHERE id_portfolio=$id");

echo $link;
?>

<?php
$conn = new mysqli("localhost","root","","makefolio");


$result = $conn->query("SELECT share_link FROM user_portfolio ORDER BY id_portfolio DESC LIMIT 1");

$row = $result->fetch_assoc();

echo $row['share_link'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Portfolio</title>
<link rel="stylesheet" href="user'sportfolio.css">
</head>

<body>

<div class="container">

 
  <div id="empty" class="card hidden">
    <h1>No Portfolio Yet 😕</h1>
    <p>Create a portfolio to express your self!</p>
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

<script src="user'sportfolio.js"></script>

</body>
</html>
