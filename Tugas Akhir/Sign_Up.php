<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/SignUp.css">
</head>
<body style="background-image: url(Assets/BG_Login.png);">
    <div class="Login">
        <h1 class="fw-light">Sign In</h1>
        <form action="submit.php" method="POST">
          <label for="username">Username</label><br>
          <input type="text" id="username" name="username" class="w-100" required><br><br>
      
          <label for="email">Email</label><br>
          <input type="email" id="email" name="email" class="w-100" required><br><br>
      
          <label for="password">Password</label><br>
          <input type="password" id="password" name="password" class="w-100" required><br><br>
      
          <button type="submit" value="Submit">Sign In</button>
          <p>Have an account?<a href="Login.php"> Login Now</a></p>
        </form>
        <a href="Landing.php" class="d-flex flex-row mt-3">
            <img src="Assets/Home Icon.png" alt="Home">
        </a>
    </div>
</body>
</html>