<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            session_start();
            include("config.php");
            if (isset($_POST['submit'])) {
                $name = mysqli_real_escape_string($con, $_POST['name']);
                $username = mysqli_real_escape_string($con, $_POST['username']);
                $id = mysqli_real_escape_string($con, $_POST['id']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                            <p>This email is already used</p>
                          </div> <br>";

                    echo "<a href='index.php'><button class='btn'>Go Back</button>";
                }   else {
                    mysqli_query($con, "INSERT INTO users(Name, Username, Email, ID, Password) VALUES('$name','$username','$email','$id','$password')") or die("Error");

                    echo "<div class='message'>
                            <p>Registration Successfully</p>
                          </div> <br>";

                    echo "<a href='index.php'><button class='btn'>Login Now</button>";
                    }
                } 
                    else {
                ?>
                <header>SIGN-UP</header>
                <form action="" method="post">
                    <div class="field">
                        <div class="input">
                            <label for="username">Name</label>
                            <input type="text" name="name" id="namename" autocomplete="off" placeholder="Enter name">
                        </div>

                        <div class="input">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" autocomplete="off" placeholder="Enter username">
                        </div>

                        <div class="input">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" autocomplete="off" placeholder="example@gmail.com">
                        </div>

                        <div class="input">
                            <label for="idnumber">ID Number</label>
                            <input type="text" name="id" id="id" autocomplete="off" placeholder="Enter ID ex.3211156">
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
                            <input type="submit" class="btn" name="submit" value="Sign-up" required>
                        </div>
                    </div>
                    <div class="create">
                        Already have an account? <a href="index.php">Login</a>
                    </div>
                </form>
            <?php
            }
            ?>
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
