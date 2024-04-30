<?php

// Will add more later, this is it for now

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

class GenerateArgon2id {

    private string $argon2idPassword;

    public function __construct(string $password) {
        // Hashes the password and stores it in the private string
        $this->argon2idPassword = password_hash($password, PASSWORD_ARGON2ID, ["cost" => 10]);;
    }

    // Returns password from the private string
    public function getArgon2idPassword() {
        return $this->argon2idPassword;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Encryption</title>
</head>
<body>
    <h1>Argon2id Example</h1>
    <form method="POST" id="password">
        <label for="password">Enter Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Generate Argon2id Password</button>
    </form>

    <p>
        <?php
        // Check if password is provided
        if (isset($_POST['password'])) {

            $password = $_POST['password'];

            // Create an instance of GenerateArgon2id class and pass the POST password
            $pass = new GenerateArgon2id($password);

            // Output the Argon2id password
            echo $pass->getArgon2idPassword();
            
        } else {
            // If password is not provided, return an error
            echo "Error: Password not provided";
        }
        ?>
    </p>
    
</body>
</html>