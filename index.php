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

    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

    session_start();

    if(isset($_SESSION["errorMsg"])) {
        if(is_array($_SESSION["errorMsg"])) {
            echo("<ul class='error'>");
            foreach($_SESSION["errorMsg"] as $error) {
                echo("<li>$error</li>");
            }
            echo("</ul>");
        }
        else {
            echo("<p class='error'>" . $_SESSION["errorMsg"] . "</p>");
        }

        unset($_SESSION["errorMsg"]);
    }

    if(isset($_SESSION["successMsg"])) {
        echo("<p class='success'>" . $_SESSION["successMsg"] . "</p>");

        unset($_SESSION["successMsg"]);
    }

    require("dbinfo.php");

    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if( mysqli_connect_errno() != 0 ){
        die("<p>Could not connect to database: " . $db->connect_error . "</p>");
    }

    $query = "SELECT id,firstname,lastname FROM students;";
    $results = $db->query($query);

    $fieldNames = $results->fetch_fields();


    echo("<h2>Student List:</h2>");
    echo("<p><a href='11-add-student.php'>Add a Student</a></p>");
    echo("<table>");

    echo("<tr>");
    foreach($fieldNames as $fieldNameObj){
        echo("<th>" . strtoupper($fieldNameObj->name) . "</th>");
    }
    echo("<th></th>");
    echo("<th></th>");
    echo("</tr>");

    while( $student = $results->fetch_row() ){
        echo("<tr>");
        foreach($student as $field){
            echo("<td>" . ucfirst(strtolower($field)) . "</td>");
        }
        echo("<td><a href='21-update-student.php?id=" . $student[0] . "'>Update</a></td>");
        echo("<td><a href='31-delete-student.php?id=" . $student[0] . "'>Delete</a></td>");
        echo("</tr>");
    }

    echo("</table>");

    




    $db->close();
    session_destroy();
    ?>
    
    </section>
</main>
</body>
</html>