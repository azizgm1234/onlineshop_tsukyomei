<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/talelcss/css/fontawesome.css">
  <link rel="stylesheet" href="css/talelcss/css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="css/talelcss/css/owl.css">
  <link rel="stylesheet" href="css/talelcss/css/animate.css">
  <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
  .main-banner{
    padding-top:20;
  }
  .contact-page .left-text ul li  {
    font-size:16px;
  }
</style>
</head>
<?php
 include_once('./includes/headerNav.php')
?>

<body>
  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-text">
            <div class="section-heading">
              <h6>Contact Us</h6>
              <h2>Say Hello!</h2>
            </div>
            <ul>
              <li><span>Address</span> Tunisie,Ariana </li>
              <li><span>Phone</span> +216 29 843 730</li>
              <li><span>Email</span> tsukyomei@contact.com</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-content">
            <div class="row">
              <div class="col-lg-12">
                <div id="map">
                  
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1619.4352989189085!2d10.186244761346304!3d36.85598947614518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd34b3bdfe4815%3A0x7e6b58032621f5ae!2sV54P%2B87J%2C%20Ariana!5e0!3m2!1sen!2stn!4v1719355087117!5m2!1sen!2stn"  width="100%" height="325px" frameborder="0" style="border:0; border-radius: 23px;" allowfullscreen=""></iframe>
                </div>
              </div>
              <div class="col-lg-12">
                <form id="contact-form" action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post">
                  <div class="row">
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="surname" name="surname" id="surname" placeholder="Your Surname..." autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" >
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" id="message" placeholder="Your Message"></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="orange-button" value='submit' name='submit'>Send Message Now</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
	<?php
  if(isset($_POST['submit']))    {
    $sql = $conn->prepare("INSERT INTO email (name,email,subject,message) VALUES (?,?,?,?)");
 
    //sending value in ??? format will prevent injection
    $sql->bind_param('ssss',$_POST['name'],$_POST['email'],$_POST['subject'],$_POST['message']);
    if($sql->execute()){
        echo "<h3 style='text-align:center'>Email Sent Successfully...</h3>";
    };
 
    $conn->close();
    $sql->close(); 
}

?>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="./js/jquery.js" type="text/javascript"></script>
	<script src="./js/bootstrap.min.js" type="text/javascript"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
