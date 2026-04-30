<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portfolio maker</title>
    <link rel="stylesheet" href="userdata.css">
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <div class="Q">
    
        <div id="welcome">
            <h1>Welcome to MakeFolio</h1>
            <p id="make">Let's start by creating your portfolio</p>
            <button class="Start">Start</button>

            <form method="POST" enctype="multipart/form-data">

                <div class="fill" id="form">
                    <fieldset> 
                        <legend>Personal Informations</legend>
                        <label for="user-name">Name</label><br>
                        <input type="text" placeholder="Enter your name" id="user-name" name="name" required> <br>
                        <label for="user-email">Email</label><br>
                        <input type="email" id="user-email" name="email" required> <br>
                        <label for="user-phone">Phone Number</label><br>
                        <input type="number" id="user-phone" name="phone" required><br>
                        <label for="user-linkedin">LinkedIn</label><br>
                        <input type="url" id="user-linkedin" name="linkedin" placeholder="optional">
                    </fieldset>
                    <button class="next" type="button">Next</button>
                </div>

                <div class="fill" id="about">
                    <fieldset>
                        <legend>About you</legend>
                        <label for="user-about">Describe yourself in few lines</label><br>
                        <input type="text" id="user-about" name="about" rows="2" cols="25" width="200"><br>
                        <label for="user-tagline">Tagline</label><br>
                        <input type="text" id="user-tagline" name="tagline" width="30" placeholder="express in one sentence"><br>
                        <label for="user-pic">Upload your pic/avatar</label><br>
                        <input type="file" id="user-pic" name="photo" accept="image/*">
                    </fieldset>
                    <button class="pre" type="button">Previous</button>
                    <button class="next" type="button">Next</button>
                </div>

                <div class="fill" id="skills">
                    <fieldset>
                        <legend>Skills</legend>
                        <label>Do you have any skills?</label><br>
                        <button id="yes" class="btn" type="button">yes</button>
                        <button class="no" type="button">No</button>
                    </fieldset>
                    <button class="pre" type="button">Previous</button>
                </div>

                <div class="fill">
                    <fieldset>
                        <legend>Your skills</legend>
                        <input type="text" placeholder="Enter a skill" id="skill" name="skill">
                        <button class="add" id="skill-add" type="button">add</button>
                        <div class="tags"></div>
                    </fieldset>
                    <button class="pre" type="button">Previous</button>
                    <button class="next" type="button">Next</button>
                </div>

                <div class="fill" id="experience">
                    <fieldset>
                        <legend>Experience</legend>
                        <label>Do you have any experience?</label><br>
                        <button id="exist" class="btn" type="button">yes</button>
                        <button class="no" type="button">No</button>
                    </fieldset>
                    <button class="pre back" type="button">Previous</button>
                </div>

                <div class="fill">
                    <fieldset>
                        <legend>Your Experience</legend>
                        <input type="text" placeholder="Enter your experience" id="experience-title" name="experience">
                        <button class="add" type="button" id="experience-add">add</button>
                        <div class="tags"></div>
                    </fieldset>
                    <button class="pre" type="button">Previous</button>
                    <button class="next" type="button">Next</button>
                </div>

                <div class="fill">
                    <fieldset> 
                        <legend>Projects</legend>
                        <label>Do you have any projects?</label><br>
                        <button id="bool" class="btn" type="button">yes</button>
                        <button class="no" type="button">No</button>
                    </fieldset>
                    <button class="pre back" type="button">Previous</button>
                </div>

                <div class="fill">
                    <fieldset class="appear">
                        <legend>Your Projects</legend>
                        <label for="project-title">The title of your project</label><br>
                        <input type="text" placeholder="Title" id="project-title" name="project_title">
                        <label for="project-description">Enter a brief description</label><br>
                        <input type="text" id="project-description" name="project_description">
                        <label for="project-link">Enter your project link</label><br>
                        <input type="url" id="project-link" name="project_link" placeholder="https://makefolio.com">
                        <button class="add" type="button" id="project-add">add</button>
                        <div class="tags"></div>
                    </fieldset>
                    <button class="pre" type="button">Previous</button>
                    <button class="next" type="button">Next</button>
                </div>

                <div class="fill">
                    <fieldset>
                        <legend>Contact</legend>
                        <label>Do you have any Social media accounts?</label><br>
                        <button id="true" class="btn" type="button">yes</button>
                        <button class="no" type="button">No</button>
                    </fieldset>
                    <button class="pre back" type="button">Previous</button>
                </div>

                <div class="fill">
                    <fieldset>
                        <legend>Your Contact</legend>
                        <label for="user-contact">Enter your social links</label><br>
                        <input type="url" id="user-contact" name="social_link" placeholder="https://instagram.com/username">
                        <div class="tags" id="contact-tags"></div>
                        <button class="add" type="button" id="contact-add">add</button>
                    </fieldset>
                    <button class="pre" type="button">Previous</button>
                    <button id="submit" type="submit">Submit</button>
                </div>

            </form>

        </div>
    </div>

    <?php include "homepage.php"; 
if ($server['REQUEST_METHOD'] === 'POST') {

    $name        = htmlspecialchars(trim($_POST['name']));
    $email       = htmlspecialchars(trim($_POST['email']));
    $phone       = htmlspecialchars(trim($_POST['phone']));
    $linkedin    = htmlspecialchars(trim($_POST['linkedin']));
    $about       = htmlspecialchars(trim($_POST['about']));
    $tagline     = htmlspecialchars(trim($_POST['tagline']));
    $skill       = htmlspecialchars(trim($_POST['skill']));
    $experience  = htmlspecialchars(trim($_POST['experience']));
    $proj_title  = htmlspecialchars(trim($_POST['project_title']));
    $proj_desc   = htmlspecialchars(trim($_POST['project_description']));
    $proj_link   = htmlspecialchars(trim($_POST['project_link']));
    $social      = htmlspecialchars(trim($_POST['social_link']));

    // Handle photo upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $photo = uniqid() . "_" . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photo);
    }

    echo "✅ Data received!";
     <?php
// INSERT 1 — user
$stmt1 = $conn->prepare("
    INSERT INTO user (user_name, email, phone_number)
    VALUES (?, ?, ?)
");
$stmt1->bind_param("sss", $name, $email, $phone);
$stmt1->execute();

// Get the user id that was just created
$user_id = $conn->insert_id;

// INSERT 2 — user_portfolio
$stmt2 = $conn->prepare("
    INSERT INTO user_portfolio (about, tagline, avatar, skill_name, experience)
    VALUES (?, ?, ?, ?, ?)
");
$stmt2->bind_param("sssss", $about, $tagline, $photo, $skill, $exp);
$stmt2->execute();

// INSERT 3 — project
$stmt3 = $conn->prepare("
    INSERT INTO project (project_title, description, link)
    VALUES (?, ?, ?)
");
$stmt3->bind_param("sss", $proj, $desc, $link);
$stmt3->execute();

// INSERT 4 — social_link
$stmt4 = $conn->prepare("
    INSERT INTO social_link (platform_link)
    VALUES (?)
");
$stmt4->bind_param("s", $social);
$stmt4->execute();
?>
    $stmt->bind_param("sssssssssssss",
        $name, $email, $phone, $linkedin,
        $about, $tagline, $photo, $skill,
        $exp, $proj, $desc, $link, $social
    );
    $stmt->execute();
}
?>
    
    ?>

    <script src="userdata.js"></script>
</body>
</html>