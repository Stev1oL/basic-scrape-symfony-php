<?php
if(isset($_SESSION['username'])) {
    header("Location: ../primary.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>LOGIN</h2>
            <form name="form" action="login/validation.php" method="post">
                <div class="field">
                    <input type="username" id="username" name="username" required>
                    <span></span>
                    <label>Email</label>
                </div>
                <div class="field">
                    <input type="password" id="password" name="password" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <div class="forgot-password">Forgot Password?</div>
                <div class="submit">
                    <input type="submit" id="btn" name="submit" value="Login" class="form-btn"/>
                </div>
                <div class="signup">
                </div>
            </form>
        </div>
    </div>

</body>
</html>