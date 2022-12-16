<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="recover_email.css">
    <title>Netflix - Watch TV Shows Online, Watch Movies Online</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
</head>
<body>
	<?php  
           include 'dbcon.php';
           if(isset($_POST['submit'])){
			
			$email = mysqli_real_escape_string($con, $_POST['email']);		
			$emailquery = " select * from registration where email= $email ";
		    $query = mysqli_query($con,$emailquery);
            $emailcount = mysqli_num_rows($query);
			      if($emailcount){
							$userdata=mysqli_fetch_assoc($query);
							$username = $userdata['username'];
							$token = $userdata['token'];	
							$subject = "password reset";
							$body = "hi! $username. click here to reset password http://localhost/project/reset_pass.php?token=$token";
							$sender_email="From: dhruva3089@gmail.com";
						if(mail($email,$subject,$body,$sender_email)){
								$_SESSION['msg']="check your mail to reset your password $email";
								header('loaction:signin.php');
						}
						else{
								echo "email sending failed";
							}
					}
					else{
						echo "no found";
						}
			}	  
?>

	<header class="showcase">
	<div class="container">	
		<form action="recover_email.php" method="POST" id="form" class="form">
			<h1>Recover your Account</h1>
		<!--	<div class="form-control">
				<label for="username">Username</label>
				<input type="text" placeholder="pateldd1114" id="username" />
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error message</small>
			</div>-->
			<div class="form-control">
				<label for="username">Email</label>
				<input type="email" placeholder="patel1114@gmail.com" id="email" />
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error message</small>
			</div>
			<!--<div class="form-control">
				<label for="username">Password</label>
				<input type="password" placeholder="Password" id="password"/>
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error message</small>
			</div>
			<div class="form-control">
				<label for="username">Confirm Password</label>
				<input type="password" placeholder="Confirm Password" id="password2"/>
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error message</small>
			</div>-->
			<div class="btn">
				<button type="submit" name="submit" class="btn-primary" >Send Mail</button>
			</div>
			<!--<div class="help">
				<div>
					<input value="true" type="checkbox"><label>Remember me</label>
				</div>

				<a href="https://www.netflix.com/dz-en/LoginHelp">Need Help ?</a>

			</div>-->
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
			<a href="https://www.netflix.com/dz-en/">Sign up now</a>
		</div>
		<div class="more">
			<p>
				This page is protected by Google reCAPTCHA to ensure you're not a bot. <a href="#">Learn more.</a>
			</p>
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

	</footer>

</header>
        
	<script src="src/signup.js"></script>
	<!-- SOCIAL PANEL HTML 
	<div class="social-panel-container">
		<div class="social-panel">
			<p>Created with <i class="fa fa-heart"></i> by
				<a target="_blank" href="https://florin-pop.com">Florin Pop</a></p>
			<button class="close-btn"><i class="fas fa-times"></i></button>
			<h4>Get in touch on</h4>
			<ul>
				<li>
					<a href="https://www.patreon.com/florinpop17" target="_blank">
						<i class="fab fa-discord"></i>
					</a>
				</li>
				<li>
					<a href="https://twitter.com/florinpop1705" target="_blank">
						<i class="fab fa-twitter"></i>
					</a>
				</li>
				<li>
					<a href="https://linkedin.com/in/florinpop17" target="_blank">
						<i class="fab fa-linkedin"></i>
					</a>
				</li>
				<li>
					<a href="https://facebook.com/florinpop17" target="_blank">
						<i class="fab fa-facebook"></i>
					</a>
				</li>
				<li>
					<a href="https://instagram.com/florinpop17" target="_blank">
						<i class="fab fa-instagram"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<button class="floating-btn">
		Get in Touch
	</button>
	
	<div class="floating-text">
		Part of <a href="https://florin-pop.com/blog/2019/09/100-days-100-projects" target="_blank">#100Days100Projects</a>
	</div>   -->
	</body>