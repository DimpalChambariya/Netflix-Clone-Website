<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css\signin.css">
    <link rel="stylesheet" href="style.css">
    <title>Netflix - Watch TV Shows Online, Watch Movies Online</title>
</head>

<body>

<?php

include 'dbcon.php';
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $emailquery = " select * from registration where email='$email' ";
	$query = mysqli_query($con,$emailquery);

    $emailcount = mysqli_num_rows($query); 
    if($emailcount){
        $email_pass=mysqli_fetch_assoc($query);
        $db_pass=$email_pass['password'];
        $_SESSION['username']=$email_pass['username'];
        $pass_decode=password_verify($password,$db_pass);

        if($pass_decode){
            ?>
            <script>
            alert("login Successful!!");
            location.replace("homepage2.php");
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Password incorrect!!");
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
        alert("Invalid Email");
        </script>
        <?php

    }

}



?>
    <header class="showcase">


        <div class="logo">
            <img src="https://i.ibb.co/r5krrdz/logo.png">
        </div>

        <div class="showcase-content">
            <div class="formm">
                <form action="signin.php" method="POST">
                    <h1>Sign In</h1>
                    <div class="info">
                        <input class="email" type="email" placeholder="Email Id" name='email' > <br>
                        <input class="email" type="password" placeholder="Password" name='password' >
                    </div>
                    <div class="btn">
                        <button class="btn-primary" type='submit' onclick="window.location.href='homepage2.html'; name='submit'">Sign In</button>
                    </div>
                    <div class="help">
                        <div>
                            <input value="true" type="checkbox"><label>Remember me</label>
                        </div>

                        <a href="https://www.netflix.com/dz-en/LoginHelp">Need Help ?</a>

                    </div>

                </form>

            </div>

            <div class="fcbk">
                <a href="https://facebook.com">
                    <img src="https://i.ibb.co/LrVMXNR/social-fb.png" alt="Facebook">
                </a>
                <p>Login with Facebook</p>
            </div>
            <div class="signup">
                <p>New to Netflix ?</p>
                <a href="reg.php">Sign up now</a>
            </div>
            <div class="more">
                <p>
                    This page is protected by Google reCAPTCHA to ensure you're not a bot. <a href="#">Learn more.</a>
                </p>
            </div>


        </div>


        <footer>

            <div class="ftr-content">
                <div class="contact">
                    <a href="#">Quesions? Contact us.</a>
                </div>
                <div class="ftr">
                    <a href="#">Gift Card Terms</a>
                    <a href="#">Terms of Use</a>
                    <a href="#">Privacy Statement</a>
                </div>
                <div class="select">
                    <select>
                        <option>English</option>
                        <option>العربية</option>
                        <option>Français</option>

                    </select>
                </div>
            </div>
            <p class="about-me">This website is made by Ms. Dhruva Patel and Ms. Dimpal Chambariya, third year IT students of B.Tech from GCET.</p>
        </footer>

    </header>


</body>

</html>