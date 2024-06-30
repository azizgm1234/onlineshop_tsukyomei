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
  <head>

    <link id="callCss" rel="stylesheet" href="./css/bootstrap.min.css" media="screen"/>
    <link href="./css/base.css" rel="stylesheet" media="screen"/>
	<link href="./css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="./css/font-awesome.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.css" rel="stylesheet">
	<style>
		.imglogo{
			width:140px;
			height:80px;
			
		}
		.navbar-inner1{
			background-color:#008AF8;
			width:100%;
			padding-left:20px;
			padding-right:20px;
			
		}
		.navbar{
			background-color:#008AF8;
			margin-bottom:0;
		}
		.searchbtn {
  background-color: white;
  border-radius: 10px;
  border:none;
  color:blue;
}
#myForm{
	margin-left:50px;
	margin-top:20px;
}

	</style>
	<link rel="stylesheet" href="./css/style.php">
  </head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src='./js/voiceSearch.js'></script>

<body>

<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar" >

<!--logo + search-->
  <div class="navbar-inner1">
   <a class="brand" href="index.php?id=<?php echo (isset( $_SESSION['customer_name']))? $_SESSION['id']: 'unknown';?>" style="opacity:0.8;margin-right:40px;" ><img class="imglogo" src="./images/LOGOT.png"></a>
   <form id="myForm" style='margin-right:4px;' class="form-inline navbar-search" method="post" action="./search.php"  >
	  <div class="input-group col-md-4">
            <input class="form-control py-2 border-right-0 border " type="search" name='search' id='transcript' placeholder="search" >
			
            
              <button class="searchbtn"  name='submit' type="submit">
			  <i class="bi bi-search-heart"></i>
              </button>
            
        </div>
    </form>
<!--logo + search  end -->

    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="index.php?id=<?php echo (isset( $_SESSION['customer_name']))? $_SESSION['id']: 'unknown';?>">Home</a></li>

	 <li class=""><a href="contact.php?id=<?php echo (isset( $_SESSION['customer_name']))? $_SESSION['id']: 'unknown';?>">Contact</a></li>

	 <?php 
	   if( isset( $_SESSION['id'])){
	 ?>
	 <li class="" style="opacity:1">
	 <a href="profile.php?id=<?php echo (isset( $_SESSION['customer_name']))? $_SESSION['id']: 'unknown';?>">profile
	 </a></li> <?php } else{?>
	 <li class="" style="opacity:0.5"><a href="#?loginfirst">profile</a></li> <?php }?>

	 <?php if((isset($_SESSION['id']))){?>
		<li><a href="./repair.php"  style="padding-right:0;margin-top:5px"><span id="repair" style="color:yellow"></span><img style="height:35px" src="./images/repairIcon.png" alt="repair icon"></a></li>

	 <li style="position:relative;margin-right:10px;margin-top:5px"><a href="cart.php"  style="padding-right:0"><span id="cart" style="color:yellow"></span><img style="height:35px;position:relative" src="./images/shopping-cart.png" alt="shop-cart">
	 <div class="badge" id="cartNum" >
<?php echo $_SESSION['cartItemNum'] ?>
</div>
</a>
	</li>
     <?php } ?>
	 <?php  if(isset($_SESSION['logged-in'])){?>
	 <li> <a href="admin/post.php"  style="padding-right:0;"><span class="btn btn-large btn-custom btn-warning">Admin</span></a></li>
	<?php }
	 ?>

	 <?php 
     if( isset( $_SESSION['id'])){
     ?>

    <li ><a id="lg-btn" href="" role="button"  style="padding-right:0"><span class="btn btn-large btn-custom btn-danger" >Logout</span></a>
    </li>
	<script src="./js/logout.js"></script>
	 <?php } 
   else{?>
    <li> <a href="login.php"  style="padding-right:0"><span class="btn btn-large btn-custom btn-success">Signup</span></a></li>
		  </div>
	</div>
	</li><?php }?>





    </ul>
  </div>
</div>
</div>
</div>



<script src='./js/loginToggle.js'></script>
