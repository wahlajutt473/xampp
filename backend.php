<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ---------- SIGNUP ----------
    if (isset($_POST['myemail']) && isset($_POST['Password']) && isset($_POST['confirmpassword'])) {
        $email = $_POST['myemail'];
        $password = $_POST['Password'];
        $confirm = $_POST['confirmpassword'];

        if ($password !== $confirm) {
            echo "❌ Password and Confirm Password do not match!";
            exit;
        }

        // Save email and password to users.txt
        $data = $email . "|" . $password . "\n";
        file_put_contents("users.txt", $data, FILE_APPEND);

        echo "✅ Signup successful! You can now log in.";
        exit;
    }

    // ---------- LOGIN ----------
    if (isset($_POST['email']) && isset($_POST['Password'])) {
        $email = $_POST['email'];
        $password = $_POST['Password'];

        if (!file_exists("users.txt")) {
            echo "❌ No user found! Please sign up first.";
            exit;
        }

        $users = file("users.txt", FILE_IGNORE_NEW_LINES);
        $found = false;

        foreach ($users as $user) {
            list($savedEmail, $savedPassword) = explode("|", $user);
            if ($email === $savedEmail && $password === $savedPassword) {
                $found = true;
                break;
            }
        }

        if ($found) {
            header("Location: welcome.html");
            exit;
        } else {
            echo "❌ Invalid email or password!";
            exit;
        }
    }

    // ---------- CONTACT ----------
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $data = "Name: " . $_POST['name'] . "\n";
        $data .= "Email: " . $_POST['email'] . "\n";
        $data .= "Message: " . $_POST['message'] . "\n";
        $data .= "------------------------\n";
        file_put_contents("contact_data.txt", $data, FILE_APPEND);
        echo "✅ Message saved successfully!";
        exit;
    }

    // ---------- INVALID ----------
    echo "❌ Invalid form submission!";
}
?>
