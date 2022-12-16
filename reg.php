<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="reg.css">
    <title>Netflix - Watch TV Shows Online, Watch Movies Online</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php 
include 'dbcon.php';

           if(isset($_POST['submit'])){
			$username = mysqli_real_escape_string($con, $_POST['username']);
			$email = mysqli_real_escape_string($con, $_POST['email']);
		    $password = mysqli_real_escape_string($con, $_POST['password']);
		    $password2=mysqli_real_escape_string($con, $_POST['password2']);
		    
			$pass = password_hash($password,PASSWORD_BCRYPT); 
			$pass2 = password_hash($password2,PASSWORD_BCRYPT);
			
			$emailquery = " select * from registration where email='$email' ";
		    $query = mysqli_query($con,$emailquery);

            $emailcount = mysqli_num_rows($query); 

			      if($emailcount> 0){
				    ?>
					   <script> alert("email already exists");
				       </script>
				    <?php
			        }
			        else{
				              if($password=== $password2){

					                 $insertquery= "insert into registration ( username,email,password,password2) values('$username','$email','$pass','$pass2') ";

					                 $iquery = mysqli_query($con,$insertquery);
                                  if($iquery){
						             ?>
							         <script> 
							              alert("Inserted successful");
										  location.replace("signin.php");
							         </script>
						            <?php     
					               }
					              else{
						             ?> 
						             <script>
							         alert("Not inserted!!");
						            </script>
						            <?php
					                }
				                }
				               else{
					                ?>
					                <script>
					                alert("password doesnot matching!!");
					                </script> 
					                <?php
				                    }

			                }

		    }
?>
	
	<header class="showcase">
	<div class="container">	
		<form id="form" class="form" action="reg.php" method="POST">
			<h1>Sign Up</h1>
			<div class="form-control">
				<label for="username">Username</label>
				<input type="text" placeholder="pateldd1114" id="username" name="username" required/>
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error message</small>
			</div>
			<div class="form-control">
				<label for="username">Email</label>
				<input type="email" placeholder="patel1114@gmail.com" id="email" name="email" required />
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error message</small>
			</div>
			<div class="form-control">
				<label for="username">Password</label>
				<input type="password" placeholder="Password" id="password" name="password"required/>
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error message</small>
			</div>
			<div class="form-control">
				<label for="username">Confirm Password</label>
				<input type="password" placeholder="Confirm Password" id="password2" name="password2" required/>
				<i class="fas fa-check-circle"></i>
				<i class="fas fa-exclamation-circle"></i>
				<small>Error message</small>
			</div>
			<div class="btn">
				<button class="btn-primary" type="submit" name="submit" >Sign Up</button>
				<!-- onclick="window.location.href='signin.html';"-->
			</div>
			<div class="help">
				<div>
					<input value="true" type="checkbox"><label>Remember me</label>
				</div>

				<a href="recover_email.php">Forgot Password?</a>

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
			<p>Already register?</p>
			<a href="signin.php">Sign In now</a>
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
    <!--     
	<script src="src/signup.js"></script>
	SOCIAL PANEL HTML 
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