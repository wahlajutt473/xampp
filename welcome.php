<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit;
}
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <style>
    body {
      background-image: url('image2.jpg');
      background-size: cover;
      background-position: center;
      color: white;
      text-align: center;
      margin-top: 120px;
      font-family: "Poppins", sans-serif;
      animation: fadeIn 2s ease-in;
    }

    h1 {
      font-size: 2.8rem;
      color: #00ffb3;
      text-shadow: 0 0 10px #00ffb3, 0 0 20px #00ffaa, 0 0 40px #00ffaa;
      animation: glow 2s ease-in-out infinite alternate;
    }

    p {
      font-size: 1.2rem;
      opacity: 0;
      animation: slideUp 1.5s forwards 1s;
    }

    input[type="submit"] {
      margin-top: 40px;
      padding: 12px 30px;
      font-size: 1rem;
      background-color: #00ffaa;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      box-shadow: 0 0 10px #00ffaa;
      transition: all 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #00ff99;
      box-shadow: 0 0 20px #00ff99, 0 0 40px #00ffaa;
      transform: scale(1.05);
    }

    @keyframes glow {
      from {
        text-shadow: 0 0 10px #00ffaa, 0 0 20px #00ffaa;
      }
      to {
        text-shadow: 0 0 30px #00ffaa, 0 0 60px #00ffaa, 0 0 80px #00ffaa;
      }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes slideUp {
      from {
        transform: translateY(40px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
</head>
<body>
  <h1>🎉 Welcome, <?php echo htmlspecialchars($email); ?>!</h1>
  <p>You’ve successfully logged in to your account.</p>

  <form method="post" action="logout.php">
    <input type="submit" value="Log out">
  </form>
</body>
</html>
