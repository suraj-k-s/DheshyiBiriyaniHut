<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - payment checkout</title>
  <link rel="stylesheet" href="./style.css">
<style>
@import url('https://fonts.googleapis.com/css?family=Baloo+Bhaijaan|Ubuntu');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Ubuntu', sans-serif;
}

body{
  background: #2196F3;
  margin: 0 10px;
}

.payment{
  background: #f8f8f8;
  max-width: 360px;
  margin: 80px auto;
  height: auto;
  padding: 35px;
  padding-top: 70px;
  border-radius: 5px;
  position: relative;
}

.payment h2{
  text-align: center;
  letter-spacing: 2px;
  margin-bottom: 40px;
  color: #0d3c61;
}

.form .label{
  display: block;
  color: #555555;
  margin-bottom: 6px;
}

.input{
  padding: 13px 0px 13px 25px;
  width: 100%;
  text-align: center;
  border: 2px solid #dddddd;
  border-radius: 5px;
  letter-spacing: 1px;
  word-spacing: 3px;
  outline: none;
  font-size: 16px;
  color: #555555;
}

.card-grp{
  display: flex;
  justify-content: space-between;
}

.card-item{
  width: 48%;
}

.space{
  margin-bottom: 20px;
}

.icon-relative{
  position: relative;
}

.icon-relative .fas,
.icon-relative .far{
  position: absolute;
  bottom: 12px;
  left: 15px;
  font-size: 20px;
  color: #555555;
}

.btn{
  margin-top: 40px;
  background: #2196F3;
  padding: 12px;
  text-align: center;
  color: #f8f8f8;
  border-radius: 5px;
  cursor: pointer;
}


.payment-logo{
  position: absolute;
  top: -50px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 100px;
  background: #f8f8f8;
  border-radius: 50%;
  box-shadow: 0 0 5px rgba(0,0,0,0.2);
  text-align: center;
  line-height: 85px;
}

.payment-logo:before{
  content: "";
  position: absolute;
  top: 5px;
  left: 5px;
  width: 90px;
  height: 90px;
  background: #2196F3;
  border-radius: 50%;
}

.payment-logo p{
  position: relative;
  color: #f8f8f8;
  font-family: 'Baloo Bhaijaan', cursive;
  font-size: 58px;
}

input[type=submit] {
	background-color: #2196F3;
	border: none;
	color: #f8f8f8;
	font-size: 16px;
}

@media screen and (max-width: 420px){
  .card-grp{
    flex-direction: column;
  }
  .card-item{
    width: 100%;
    margin-bottom: 20px;
  }
  .btn{
    margin-top: 20px;
  }
}
</style>
<?php
include("../Assets/connection/connection.php");
session_start();
if(isset($_POST["btnpay"]))
{
$upQry1s = "update tbl_booking set booking_status=2 where booking_id='" .$_SESSION["bid"]. "'";
					if(mysql_query($upQry1s))
					{
					  ?>
					  <script>
						 window.location="Homepage.php";
					  </script>
					  <?php
					}
}

?>
</head>
<body>
<!-- partial:index.partial.html -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
<form method="post" >
<div class="wrapper">
  <div class="payment">
    <div class="payment-logo">
      <p>p</p>
    </div>
    
    
    <h2>Payment Gateway</h2>
    <div class="form">
      <div class="card space icon-relative">
        <label class="label">Card holder:</label>
        <input type="text" class="input" placeholder="Card Holder"  required="required"  title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" onchange="nameval(this)" autocomplete="off" pattern="^[A-Z]+[a-zA-Z ]*$" />
                            <i class="fas fa-user"></i>
      </div>
      <div class="card space icon-relative">
        <label class="label">Card number:</label>
        <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number" required data-mask="0000 0000 0000 0000">
        <i class="far fa-credit-card"></i>
      </div>
      </div>
      <div class="card-grp space">
        <div class="card-item icon-relative">
          <label class="label">Expiry date:</label>
          <input type="month" name="expiry-data" class="input"  min="<?php echo date("Y-m")?>" required autocomplete="off">
         
        </div>
        <div class="card-item icon-relative">
          <label class="label">CVC:</label>
          <input type="text" class="input" data-mask="000" placeholder="000" required autocomplete="off">
          <i class="fas fa-lock"></i>
        </div>
      </div>
        
      <div class="btn">
      	
       <input type="submit" name="btnpay" id="btnpay" value="Pay"> 
      </div> 
      
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script><script  src="./script.js"></script>

</body>
</html>
