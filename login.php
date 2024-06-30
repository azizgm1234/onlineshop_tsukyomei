<?php  
// Check if session is not already started
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
} include_once 'includes/config.php';
 //run whenever this file is used no need of isset or any condition to get website image footer etc
 $sql5 ="SELECT * FROM  settings;";
 $result5 = $conn->query($sql5);
 $row5 = $result5->fetch_assoc();
 $_SESSION['web-name'] = $row5['website_name'];
 $_SESSION['web-img'] = $row5['website_logo'];
 $_SESSION['web-footer'] = $row5['website_footer'];
//it is used to get number of carts item 
if(isset($_SESSION['id'])){
$sql44 ="SELECT * FROM  carts WHERE uid='{$_SESSION['id']}';";
$result44 = $conn->query($sql44);
$_SESSION['cartItemNum']=0;
if ($result44->num_rows > 0) {
	while($row44 = $result44->fetch_assoc()) {
		$_SESSION['cartItemNum']+=$row44['quantity'];
	}
}
}
?>

<?php
 //1st step(i.e connection) done through config file
if(isset($_POST['signin'])){

    if(empty($_POST['email'])){
           echo "<h4 id='error_login'>Enter email</h4>";
    }

    if(empty($_POST['pwd'])){
        echo "<h4 id='error_login'>Enter password</h4>";
 }

$email = mysqli_real_escape_string($conn,$_POST['email']);
$password =mysqli_real_escape_string($conn,$_POST['pwd']);

$sql ="SELECT * FROM  customer WHERE customer_email='{$email}';";
$result = $conn->query($sql);

if($result->num_rows==1){ //if any one data found go inside it
    $row = $result->fetch_assoc();
    if($password == $row['customer_pwd']){
    //session will be created only if users email and passwords matched
	$_SESSION['id'] = $row['customer_id'];
	$_SESSION['customer_role'] = $row['customer_role'];
header("Location:profile.php?id={$_SESSION['id']}");
            // put exit after a redirect as header() does not stop execution
            exit;}else{
         $incorrectpwd =true;
            }


}else{
    if($_POST['email']){ //it means it will run if email field is filled
      $userunavailable =true;
    }
}
}//end of 1st ifstatement
?>
<head>    <link rel="stylesheet" href="assets/css/login.css"></head>
<style>
    .login-wrap {

  height: 610px;

}
</style>
<body>
<div class="login-wrap" >
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form class="form-horizontal loginFrm" action="<?php echo $_SERVER['PHP_SELF']?> " method="post">
					<div class="group">
						<label for="user" class="label" style="color: white;">email</label>
						<input id="inputEmail" name="email" type="email" class="input">
					</div>
					<div class="group">
						<label for="pass" class="label" style="color: white;">Password</label>
						<input id="inputPassword" name="pwd"  type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<input id="check" type="checkbox" class="check" checked>
						<label for="check"><span class="icon"></span> Keep me Signed in</label>
					</div>
					<div class="group" id="btn">
						<input href="index.html"  name="signin"  type="submit" class="button" value="Sign In">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<a href="index.html">Home</a>
					</div>
				</form>
				<?php
		if(isset($_POST['signin'])) echo "<br> <br>"; if(isset($userunavailable)) echo '<div class="alert alert-danger">User Unavailable.</div>';else if(isset($incorrectpwd))echo '<div class="alert alert-danger">Incorrect Password.</div>'
		?>
		<?php

		?>
		<?php
		if(isset($userunavailable) || isset($incorrectpwd)){
		?>
		<script>
			console.log('osdfsdfsdfasd')
			var target = document.getElementById('login');
			if (target.classList.contains('hide')) {
			target.classList.remove('hide');
			} else {
			target.classList.add('hide');
			}
			</script>
		<?php
		}
		?>
				</div>
                <div class="sign-up-htm" id="disp">
                <form action="includes/signup.inc.php" method="post">
    <div class="group">
        <label for="user" class="label">Name</label>
        <input id="user" type="text" class="input" name="name"  >
        
        <label for="email" class="label">Email</label>
        <input id="email" type="text" class="input" name="email">
    </div>
    <div class="group">
        <label for="address" class="label">Address</label>
        <input id="address" type="text" class="input" name="address" >
        
        <label for="phone" class="label">Phone</label>
        <input id="phone" type="text" class="input" name="number" >
    </div>
    <div class="group" id="passwords">
        <label for="pass" class="label">Password</label>
        <input id="pass" type="password" class="input" data-type="password" name="pwd">
        
        <label for="repeat-pass" class="label">Repeat Password</label>
        <input id="repeat-pass" type="password" class="input" data-type="password" name="rpwd" >
    </div>
    <div class="group">
        <input type="submit" class="button" value="Sign Up" style="margin-left:70px;"  name="submit" >
    </div>
    <?php
// if(isset($_GET['error'])){
//    if($_GET['error']==='!loggedin') echo '<br> <br><div class="alert alert-danger">Signup or Login first.</div>';

if(isset($_GET['error'])){
switch($_GET['error']){
   case '!loggedin':echo '<br> <br><div class="alert alert-danger">Signup or Login first.</div>';break;
   case 'enterValidNumber':echo '<br> <br><div class="alert alert-danger">Enter valid number.</div>';break;
   case 'invalidemail':echo '<br> <br><div class="alert alert-danger">Enter valid email address.</div>';break;
   case 'pwdnotmatch':echo '<br> <br><div class="alert alert-danger">Entered password does not matched.</div>';break;
   case 'emptyInput':echo '<br> <br><div class="alert alert-danger">Form must be filled.</div>';break;
   case 'emailAlreadytaken':echo '<br> <br><div class="alert alert-danger">Account is already registered with this email.</div>';break;
}
}

    ?>
    <div class="hr"></div>
    </form>
</div>

		</div>
	</div>
</div>
<script src="./js/jquery.js" type="text/javascript"></script>
	<script src="./js/bootstrap.min.js" type="text/javascript"></script>
</body>
