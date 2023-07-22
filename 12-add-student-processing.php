<?php
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

require("dbinfo.php");

session_start();

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if( mysqli_connect_errno() != 0 ){
    die("<p>Could not connect to database: " . $db->connect_error . "</p>");
}

$stuNumRegex = "/^a0[0-9]{7}$/i";
$formValid = true;
$errorMessages = array();

// Checks the validity of the first name
if(isset($_POST["firstname"]) == true) {
    if(trim($_POST["firstname"]) === "") {
        $formValid = false;
        array_push($errorMessages, "You didn't enter a First Name!");
    }
    else {
        $fname = $_POST["firstname"];
    }
}
else {
    $formValid = false;
    array_push($errorMessages, "This isn't a valid form! Something is broken. Are you the man Jeff warned us about?");
}

// Checks the validity of the last name
if(isset($_POST["lastname"])) {
    if(trim($_POST["lastname"]) === "") {
        $formValid = false;
        array_push($errorMessages, "You didn't enter a Last Name!");
    }
    else {
        $lname = $_POST["lastname"];
    }
}
else {
    $formValid = false;
    array_push($errorMessages, "This isn't a valid form! Something is broken. Are you the man Jeff warned us about?");
}

// Checks the validity of the student number
if(isset($_POST["stuNum"])) {
    if(trim($_POST["stuNum"]) === "") {
        $formValid = false;
        array_push($errorMessages, "You didn't enter a student ID!");
    }
    else {
        if(!preg_match($stuNumRegex, $_POST["stuNum"])) {
            $formValid = false;
            array_push($errorMessages, "This is not a valid student ID. It should be formatted as 'A0#######'");        
        }
        else {
            $testNum = $_POST["stuNum"];
            $searchQuery = "SELECT COUNT(id) FROM students WHERE id='$testNum';";
            $searchResults = $db->query($searchQuery);
            $resultCount = $searchResults->fetch_row();

            if($resultCount[0] > 0) {
                $formValid = false;
                array_push($errorMessages, "This student ID already exists!");
            }
            else {
                $stuNum = $_POST["stuNum"];
            }
        }
    }
}
else {
    $formValid = false;
    array_push($errorMessages, "This isn't a valid form! Something is broken. Are you the man Jeff warned us about?");
}





if(!$formValid) {
    $_SESSION["errorMsg"] = $errorMessages;
}
else {
    $insertQuery = "INSERT INTO students (id,firstname,lastname) VALUES('$stuNum','$fname','$lname');";
    $insertResult = $db->query($insertQuery);



    if($insertResult) {
        $_SESSION["successMsg"] = "New student " . $fname . " " . $lname . " was added to the database.";
    }
    else {
        $_SESSION["errorMsg"] = "The new student could not be successfully added to the database." . $fname . $lname . $stuNum;
    }
}

$db->close();
header("location: index.php");
die();

?>