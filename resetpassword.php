<?php
    include('header.php');
    require('UserValidator.php');
    require('User.php');
    require('conn.php');
    if (isset($_POST['reg'])) {
        $validate= new Uservalidation($_POST);
        $error= $validate->validateform(); 
                
            if(empty($error['username'])&&empty($error['email'])&&empty($error['password'])&&empty($error['confirm_password'])){
                $user= new User($_POST);
                $message=$user->PostUser();
                header('location:signin.php');
                
            }
    }


?>

<div class="contaier">
		<h3>SIGN UP</h3>
		<div class="success">
			<?php echo $message??''; ?>
		</div>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="">
			
			<label>Email: </label><br>
			<input type="text" name="email" id="email" value="<?php echo htmlspecialchars($_POST['email']??'')?>"><br>
			<div class="error">
				<?php echo $error['email']?? '';  ?>
			</div>
			<input type="submit" name="reg"  id="reg" value="Submit">
		</form>
		<p>&nbsp</p>
	</div>
	</body>
</html>
