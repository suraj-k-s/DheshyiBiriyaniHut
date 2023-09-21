<!DOCTYPE html>
<html>
<?php

include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{

	$name=$_POST["txtname"];
	$contact=$_POST["txtcontact"];
	$email=$_POST["txtemail"];
	$address=$_POST["txtaddress"];
	$place_id=$_POST["sel_place"];
  $password=$_POST["txtpassword"];
	
	$photo=$_FILES["filephoto"]["name"];
	$path=$_FILES["filephoto"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Files/Photo/".$photo);
	
	
	
	$insQry="insert into tbl_user(user_name,user_contact,user_address,user_email,place_id,user_photo,user_password)values('".$name."','".$contact."','".$address."','".$email."','".$place_id."','".$photo."','".$password."')";
		if(mysql_query($insQry))
			{
				?>
              <script>
				alert('inserted');
				location.href='User.php';
				</script>
				<?php
			}
		    else
			{
				 ?>
				 <script>
				 alert('failed');
			   	 location.href='User.php';
				 </script>
                 <?php
			}
}
?>



<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="../Assets/Template/Main/images/favicon.png" type="">

  <title> Biriyani Hut </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="../Assets/Template/Main/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../Assets/Template/Main/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../Assets/Template/Main/css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="../Assets/Template/Main/images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
            Biriyani Hut
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item active">
                <a class="nav-link" href="../">Home <span class="sr-only">(current)</span></a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="About.html">About</a>
              </li>
            </ul>
            <div class="user_option">
              <a href="User.php" class="user_link">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
             
              <a href="Login.php" class="order_online">
                Sign In
              </a>
          </div>
          </div>
        </nav>
      </div>
    </header>
   
  </div>

  <!-- offer section -->


  <!-- end about section -->

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Sign Up Now
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <div>
                <input type="text" name="txtname" id="txtname " autocomplete="off" required class="form-control" placeholder="Your Name"/>
              </div>
              <div>
                <input type="text" name="txtcontact" id="txtcontact" pattern="[+0-9]{10,13}" autocomplete="off" required class="form-control" placeholder="Your Contact"/>
              </div>
              <div>
              <select class="form-control" name="sel_district" id="sel_district" onChange="getplace(this.value)" autocomplete="off" required>
                    <option disabled selected value="">Select District</option>
                    <?php
                        $districtQry="select * from tbl_district";
                        $res=mysql_query($districtQry);
                        while($row=mysql_fetch_array($res))
                        {
                      ?>
                              <option value=<?php echo $row["district_id"]; ?> > <?php echo $row["district_name"]; ?> </option>
                              <?php
                        }?>
              </select>
              </div>
              <div>
                <select class="form-control" name="sel_place" id="sel_place" autocomplete="off" required>
                    <option value="">Select Place</option>
                </select>
              </div>
              <div>
                <input placeholder="Your Email"  class="form-control" type="email" name="txtemail" id="txtemail"  autocomplete="off" required/>
              </div>
              <div>
                  <textarea placeholder="Your Address"  class="form-control" name="txtaddress" id="txtaddress"cols="45" rows="5"autocomplete="off" required ></textarea>
              </div>
              <div>
                  <input class="form-control" type="file" name="filephoto" id="filephoto"  required/>
              </div>
              <div>
                  <input class="form-control" placeholder="Your Password" type="password" name="txtpassword" id="txtpassword2"  autocomplete="off" required />
              </div>
              <div class="btn_box">
                <button type="submit" name="btnsave">
                  Book Now
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
          <img src="../Assets/Template/Main/images/f9.png"/>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              Biriyani Hut
            </a>
            <p>
              Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Everyday
          </p>
          <p>
            10.00 Am -10.00 Pm
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->
  <script src="../Assets/JQ/jQuery.js"></script>
      <script>
          function getplace(did)
        {

          $.ajax({url:"../Assets/AjaxPages/Ajaxplace.php?did="+ did,
          success:function(result)
          {
            
            $("#sel_place").html(result);
          }});
        }
        
	
	</script>
  <!-- jQery -->
  <script src="../Assets/Template/Main/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="../Assets/Template/Main/js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  
  <!-- custom js -->
  <script src="../Assets/Template/Main/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>>
</html>>
</html>