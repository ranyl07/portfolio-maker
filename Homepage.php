
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
    <title>Makefolio</title>
    <link rel="stylesheet" href="homepage.css">
</head>

<body>

    <header class="head ">

        <a href="homepage.php"> <img class="logo" src="img/M.png" alt="Logo"></a>

        <nav>
    <ul>
        <li><a href="/makefolio/Homepage.php">Home</a></li>
        <li><a href="/makefolio/about.html">About portfolio</a></li>
        <li><a href="/makefolio/usersportfolio.php">Yours</a></li>
    </ul>
</nav>
    </header>

    <section class="Welcome">
        <div class="Welcome-cntn">
            <h1>Welcome to <em>Makefolio</em></h1>
            <h3 class="Welcome-p">A space where your ideas become your identity</h3>

         <a class="btn-p" href="window.location.href='/makefolio/templates.php'">
  Discover Our Portfolio
</a>
        </div>
    </section>

    <section id="portfolio" class="Portfolio">

  <h1 class="modls">Our Models</h1>
  <button class="scroll-btn left" onclick="scrollCardsLeft()">⬅</button>
  <button class="scroll-btn right" onclick="scrollCardsRight()">➡</button>

  
  <div class="card-container" id="cardContainer">

    <div class="card">
      <a href="hadylmodel.html" >
       <img src="img/design1.png" alt="project1">
      <div class="overlay">
        <h3>Project 1</h3></div> 
      </a>
    
    </div>

    <div class="card">
       <a href="imenemodel.html" >
        <img src="img/design2.png" alt="project2">
      <div class="overlay">
        <h3>Project 2</h3></div>
      </a>
    </div>

    <div class="card">
       <a href="soundosmodel.html" >
        <img src="img/design3.png" alt="project3">
      <div class="overlay">
        <h3>Project 3</h3>
      </div>
      </a>
  </div>
</section>

    <section class="Aboutus">
        <div class="about-container">

            <div class="about-text">
                <h1>About Us</h1>
                <p>
                    We are a group of students and young developers passionate about web design and development.
                    This portfolio platform was created as part of our learning journey to combine creativity and
                    technical skills into one practical project.....
                </p>

                <a href="about-us.html">
                    <button class="abtus">Learn More</button>
                </a>
            </div>

            <div class="about-image">
                <img src="img/img2.png" alt="Design">
            </div>

        </div>
    </section>
    <?php
$models = ['hadylmodel', 'imenemodel', 'meriemmodel', 'soundosmodel', 'wassilamodel'];

foreach ($models as $model) {
    $stmt = $conn->prepare("INSERT INTO model (model_name) 
                            SELECT ? FROM DUAL 
                            WHERE NOT EXISTS (
                                SELECT 1 FROM model WHERE model_name = ?
                            )");
    $stmt->bind_param("ss", $model, $model);
    $stmt->execute();
    $stmt->close();
}


?>
<script>
const container = document.getElementById("cardContainer");

function scrollCardsLeft() {
  container.scrollBy({
    left: -300,
    behavior: "smooth"
  });
}

function scrollCardsRight() {
  container.scrollBy({
    left: 300,
    behavior: "smooth"
  });
}
</script>

</body>
</html>       
