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

<script>
let portfolioData = <?php echo json_encode($data); ?>;
</script>

<script src="user'sportfolio.js"></script>
<?php 
$conn= new mysqli("localhost","root","",portfolio);
$id=$_GET['id'];
$use_inf =$conn->prepare(" SELECT user.user_name,user.email,user.phone_number,user_portofolio.about,
user_portofolio.tagline,user_portofolio.avatar,user_portofolio.skill_name,user_portofolio.experience 
FROM user JOIN user_portfolio ON user.id = user_portfolio.user_id WHERE user.id=?");
$user_stmt->bind_param("i", $user_id);
$user_stmt->execute();
$user = $user_stmt->get_result()->fetch_assoc();
$project_stmt = $conn->prepare(" SELECT project.project_title, project.description, project.link FROM project
    WHERE project.user_id = ?");
$project_stmt->bind_param("i", $user_id);
$project_stmt->execute();
$projects = $project_stmt->get_result();
$skill_stmt = $conn->prepare(" SELECT user_portfolio.skill_name FROM user_portfolio WHERE user_portfolio.user_id = ?");
$skill_stmt->bind_param("i", $user_id);
$skill_stmt->execute();
$skills = $skill_stmt->get_result();
$social_stmt = $conn->prepare(" SELECT social_link.platform_link FROM social_link WHERE social_link.user_id = ?");
$social_stmt->bind_param("i", $user_id);
$social_stmt->execute();
$socials = $social_stmt->get_result();?>
</body>
</html>


<?php
$conn = new mysqli("localhost","root","","portfolio");


$conn->query("DELETE FROM skill WHERE id_portfolio = (SELECT id_portfolio FROM user_portfolio ORDER BY id_portfolio DESC LIMIT 1)");

$conn->query("DELETE FROM user WHERE id_portfolio = (SELECT id_portfolio FROM user_portfolio ORDER BY id_portfolio DESC LIMIT 1)");

$conn->query("DELETE FROM user_portfolio ORDER BY id_portfolio DESC LIMIT 1");

echo "deleted";
?>

<?php
$conn = new mysqli("localhost","root","","portfolio");


$result = $conn->query("SELECT id_portfolio FROM user_portfolio ORDER BY id_portfolio DESC LIMIT 1");

$row = $result->fetch_assoc();
$id = $row['id_portfolio'];


$link = "http://localhost/project/portfolio.php?id=".$id;


$conn->query("UPDATE user_portfolio SET share_link='$link' WHERE id_portfolio=$id");

echo $link;
?>

<?php
$conn = new mysqli("localhost","root","","portfolio");


$result = $conn->query("SELECT share_link FROM user_portfolio ORDER BY id_portfolio DESC LIMIT 1");

$row = $result->fetch_assoc();

echo $row['share_link'];
?>
