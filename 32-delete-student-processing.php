<?php
require("dbinfo.php");

session_start();

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if( mysqli_connect_errno() != 0 ){
    die("<p>Could not connect to database: " . $db->connect_error . "</p>");
}

$heldId = $_GET["id"];

if(isset($_POST["confirm"])) {
    if($_POST["confirm"] == "yes") {
        $deleteQuery = "DELETE FROM students WHERE id='$heldId';";
        $deleteResult = $db->query($deleteQuery);
    
        if($deleteResult) {
            $_SESSION["successMsg"] = "The student record was successfully deleted.";
        }
        else {
            $_SESSION["errorMsg"] = "The student records were not successfully deleted.";
        }
    }
    else {
        $_SESSION["successMsg"] = "The delete attempt was successfully aborted.";
    }
}

$db->close();
header("location: index.php");
die();
?>