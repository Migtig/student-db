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
    <form action="12-add-student-processing.php" method="post">
        <fieldset>
            <legend>Add a Student</legend>

            <label for="stuNum">ID: </label>
            <input type="text" name="stuNum" id="stuNum">

            <label for="firstname">First Name: </label>
            <input type="text" name="firstname" id="firstname">

            <label for="lastname">Last Name: </label>
            <input type="text" name="lastname" id="lastname">
        </fieldset>

        <input type="submit" value="Submit">
    </form>
    </section>
</main>
</body>
</html>