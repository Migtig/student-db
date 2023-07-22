<?php header("Cache-Control: no-cache"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Student Database Project</title>
    <link rel="stylesheet" href="styles/normalize-fwd.css">
    <?php
    echo("<link rel='stylesheet' href='styles/themes/red.css'>");
    ?>
</head>
<body>
<header>
    <h1 class="assignment-title">Student Database</h1>
    <h2 class="assignment-by">By Connor Froese, FWD33</h2>
</header>

<main>
<section>

    <?php
    require("dbinfo.php");
    
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if( mysqli_connect_errno() != 0 ){
        die("<p>Could not connect to database: " . $db->connect_error . "</p>");
    }
    $heldId = $_GET["id"];

    $studentQuery = "SELECT id,firstname,lastname FROM students WHERE id='$heldId';";
    $result = $db->query($studentQuery);
    $stuInfo = $result->fetch_row();

    echo("<form action='32-delete-student-processing.php?id=$heldId' method='post'>");
    ?>
        <fieldset>
            <legend>Delete a Student Record - Are you sure?</legend>

            <?php
            echo("<p>" . $stuInfo[0] . " " . $stuInfo[1] . " " . $stuInfo[2] . "</p>");
            ?>

            <input type="radio" name="confirm" value="yes" id="yes">
            <label for="yes">Yes</label>

            <input type="radio" name="confirm" value="no" id="no" checked="checked">
            <label for="no">No</label>

        </fieldset>

        <input type="submit" value="Submit">
    </form>
    <?php
    $db->close();
    ?>
    </section>
</main>
</body>
</html>