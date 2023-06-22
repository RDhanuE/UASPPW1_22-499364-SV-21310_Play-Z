<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/SignUp.css">
</head>
<body style="background-image: url(Assets/BG_Login.png);">
    <div class="Login">
        <h1 class="fw-light">Log In</h1>
        <form action="In.php" method="POST">
          <label for="username">Username</label><br>
          <input type="text" id="username" name="username" class="w-100" required><br><br>

          <label for="password">Password</label><br>
          <input type="password" id="password" name="password" class="w-100" required><br><br>
      
          <button type="submit" value="Submit">Login</button>
          <p>Doesn't have an account yet? <a href="Sign_Up.php">Sign Up Now</a></p>
        </form>
        <a href="Landing.php" class="d-flex flex-row mt-5">
            <img src="Assets/Home Icon.png" alt="Home">
        </a>
    </div>
</body>
</html>