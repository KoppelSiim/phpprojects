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
<h4>Greeting function</h4>

<?php
function greeting()
{
    return "Hello world";
}
echo greeting();
?>
<h4>Bootstrap form </h4>
<div class="row">
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
        <button type="submit" class="btn btn-primary">Submit</button>
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
                print_r($formData);
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

</container>
<!-- Bootstrap library javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
