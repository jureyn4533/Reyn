<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <img src="logo.png">
    <h1>WELCOME STUDENTS</h1>
    <div class="box">
        <img src="logo.png">
        <div class="form-box">
            <?php
            include("config.php");
            if (isset($_POST['submit'])) {
                $username = mysqli_real_escape_string($con, $_POST['username']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $result = mysqli_query($con, "SELECT * FROM users WHERE Username='$username' AND Password='$password'") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if (is_array($row) && !empty($row)) {
                    $_SESSION['name'] = $row['Name'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['id'] = $row['ID'];
                    $_SESSION['password'] = $row['Password'];
                } else {
                    echo "<div class='message'>
                            <p>Wrong Username or Password</p>
                          </div>";
                }
                if (isset($_SESSION['valid'])) {
                    header("Location: create.php");
                }
            }
            ?>
            <header>LOGIN</header>
            <form action="" method="post">
                <div class="field">
                    <div class="input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" placeholder="Enter username" required>
                    </div>
                    <div class="input">
                        <label for="password">Password</label>
                        <div class="password-input">
                            <input type="password" name="password" id="password" autocomplete="off" placeholder="Enter password"> 
                            <span class="password-toggle" onclick="togglePasswordVisibility()"> 
                                
                            </span>
                        </div>
                    </div>

                    <div class="submission">
                        <input type="submit" class="btn" name="submit" id="login" value="Login" required>
                    </div>
                </div>
                <div class="create">
                    Create Account <a href="create.php">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.querySelector(".password-toggle i");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>

</body>
</html>
