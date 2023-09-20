<?php
// Start or resume the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap library css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container mt-3 mb-3">
<h1>Chapter 7</h1>
<br>
<h4>Greeting function</h4>
<?php
function greeting()
{
    return "Hello world<br>";
}
echo greeting();
?>

<h4>Bootstrap newsletter form</h4>

<!--Bootstrap Form row and column -->
<div class="row mb-3 mt-3">
    <div class="col-3">
<?php
function generate_form()
{
    echo('
        <form action="chapter7.php" method="POST">
        <div class="mb-3">
            <label for="user" class="form-label">User</label>
            <input type="text" class="form-control" id="user" name="user" placeholder="Enter your username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
        ');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Check if the "user" and "email" fields are set in the POST data
        if (isset($_POST["user"]) && isset($_POST["email"])) {

            // Create an empty array to store user and email data
            $formData = [];

             // Check if $formData is already set in session to preserve existing data
            if (!isset($_SESSION["formData"]) || !is_array($_SESSION["formData"])) {
                $_SESSION["formData"] = []; // Initialize an empty array if not set
            }

            // Get the new user and email data
            $newUser = $_POST["user"];
            $newEmail = $_POST["email"];

            // Check if the user or email is already in use
            $userExists = false;
            $emailExists = false;

            foreach ($_SESSION["formData"] as $data) {
                if ($data["user"] === $newUser) {
                    $userExists = true;
                    break;
                }
                if ($data["email"] === $newEmail) {
                    $emailExists = true;
                    break;
                }
            }

            if ($userExists || $emailExists) {
                // Display an error message if the user or email is not unique
                echo "Sorry, the ";
                if ($userExists) {
                    echo "username";
                    if ($emailExists) {
                        echo " and email";
                    }
                } else {
                    echo "email";
                }
                echo " is already in use. Please choose a different one.";
            } else {
                // Add the new user and email data to the array
                $newData = [
                    "user" => $newUser,
                    "email" => $newEmail
                ];

                // Save to session
                $_SESSION["formData"][] = $newData;

                echo "Thank you, " . htmlspecialchars($_POST["user"]) . "!<br>You are now subscribed!<br>";
            }
            /* Debugging: Display all user and email data
                echo "<pre>";
                print_r($_SESSION["formData"]);
                echo "</pre>";
            */
        } else{
            echo "Please fill out both user and email fields.";
        }
    }
}

generate_form();
?>

</div>
    </div>
<!--Bootstrap Form row and column end -->

<h4>Username and E-mail function</h4>

<!--Bootstrap Form row and column -->
<div class="row mb-3 mt-3">
    <div class="col-3">
        <form action="chapter7.php" method="POST">
            <div class="mb-3">
                <label for="userName" class="form-label">User</label>
                <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter your username" required>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
    </div>
</div>
<!--Bootstrap Form row and column end -->
    
<?php
    function userAndEmail($userName){
        $uToLower = strtolower($userName);
        $email = $uToLower."@hkhk.edu.ee";
        $code = '';
        for($i = 0; $i < 7; $i++){

            // Choose with approximately 50% chance to generate either a number or letter
            $choice = rand(0,1);

            if($choice == 0){
            // Random int from 0 - 9, both inclusive
            $randomNr = rand(0, 9);
            $code .= $randomNr;
            }
            else{
            // chr - convert the generated ASCII code back into a character
            // ASCII codes for 'A' to'Z', both inclusive
            $randomLetter = chr(rand(65, 90)); 
            $code .= $randomLetter;
            }
            
        }

        return "Your username is ".$uToLower." and your e-mail is ".$email ."<br>Your personal code is: ".$code."<br><br>";
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["userName"]))  {
        $result = userAndEmail($_POST["userName"]);
        echo $result;
    }
?>

<h4>Numbers</h4>
<form action = "chapter7.php" method="POST" class="mb-3">
    <div class="row">
        <div class="col-1">
            <label for="start" class="form-label">Start</label>
            <input type="number" class="form-control" id="start" name="start" placeholder="Start" required min="0" pattern="[0-9]+">
        </div>
        <div class="col-1">
            <label for="stop" class="form-label">Stop</label>
            <input type="number" class="form-control" id="stop" name="stop" placeholder="Stop" required min="1" pattern="[0-9]+">
        </div>
        <div class="col-1">
            <label for="step" class="form-label">Step</label>
            <input type="number" class="form-control" id="step" name="step" placeholder="Step" required min="1"pattern="[0-9]+">
        </div>
        <div class="col-1">
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </div>
    </div>
</form>
<?php
    function numbers($start, $stop, $step){
        for ($i = $start; $i <= $stop; $i += $step){
            echo $i . " ";
        }
        echo "<br>";
    }
   if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["start"], $_POST["stop"], $_POST["step"])) {
    numbers($_POST["start"], $_POST["stop"], $_POST["step"]);
   }
?>
<br>
<h4>Rectangular area</h4>
<form action = "chapter7.php" method="POST" class="mb-3 mt-3">
    <div class="row">
        <div class="col-2">
            <label for="width" class="form-label">Width</label>
            <input type="number" class="form-control" id="width" name="width" placeholder="Width" required min="0" pattern="[0-9]+">
        </div>
        <div class="col-2">
            <label for="length " class="form-label">Length</label>
            <input type="number" class="form-control" id="length" name="length" placeholder="Length" required min="0" pattern="[0-9]+">
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </div>
    </div>
</form>
<?php
    function rectArea($width, $length){
        return $width * $length;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["width"], $_POST["length"])) {
        echo "The area of the rectangle is ".rectArea($_POST["width"],$_POST["length"])."<br>";
    }
?>
<br>
<h4>Social security number</h4>
<form action = "chapter7.php" method="POST" class="mb-3 mt-3">
    <div class="row">
        <div class="col-3 mb-3">
            <label for="ssn" class="form-label">SSN</label>
            <input type="text" class="form-control" id="ssn" name="ssn" placeholder="SSN" pattern="[0-9]+">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Submit</button>
</form>
<?php
    
    function validation($ssn){
        $valid = false;
        $data = []; 
        if(strlen($ssn) == 11){
            $valid = true;
        }
        if($valid){
            if ($ssn[0] === '3'){
                $sex = "male";
            }
            elseif($ssn[0] === '4'){
                $sex = "female";
            }
            array_push($data, $sex);
            $yearPart = substr($ssn, 1, 2);
            $birthYear = 1900 + intval($yearPart);
            array_push($data, $birthYear);
            return $data;
        }
        else{
            return "Invalid SSN lenght<br>";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ssn"])){
        $res = validation($_POST["ssn"]);
        if(is_array($res)){
            echo "Your sex is ".$res[0]." and your birthyear is ".$res[1]."<br>";
        }
        else{
            echo $res;
        }
    }
?>
<br>
<h4>Good thoughts</h4>
<?php
    //I do not expect these to make sense
    function good_thoughts() {
        $subject = array("Sun", "Man","Woman", "Bear", "I");
        $predicate = array("shines","fly", "eat", "sleep", "drink");
        $objective = array("water","honey","bed","warmth","dream");
        $randomSubject = $subject[array_rand($subject)];
        $randomPredicate = $predicate[array_rand($predicate)];
        $randomObjective = $objective[array_rand($objective)];
        $sentance = $randomSubject." ".$randomPredicate." ".$randomObjective.".<br>";
        return $sentance;
    }
    echo good_thoughts();
?>
</container>

<!-- Bootstrap library javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
