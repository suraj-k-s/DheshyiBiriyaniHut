<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>User Request LIST</title>

</head>
<?php
ob_start();
include("Head.php");  
$selQry="select * from tbl_booking b inner join tbl_cart c on c.booking_id = b.booking_id inner join  tbl_product p on p.product_id = c.product_id where booking_status>0 and cart_status>0"; 
	$res=mysql_query($selQry);


      
  if(isset($_GET["sts"]))
  {
    $upQry = "update tbl_cart set cart_status='".$_GET["sts"]."' where cart_id='".$_GET["pid"]."'";
    if(mysql_query($upQry))
    {
      ?>
        <script>
            window.location="ViewBooking.php";
        </script>
      <?php
    }
  
  }  
	?>

<body>
  <section class="main_content dashboard_part">

    <!--/ menu  -->
    <div class="main_content_iner ">
      <div class="container-fluid p-0">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="QA_section">
              <h1>User Booking</h1>
              <div class="QA_table mb_30">
                <!-- table-responsive -->
                <table class="table lms_table_active">
                  <thead>
                    <tr style="background-color: #74CBF9">
                     
                      <td align="center" scope="col">SlNo</td>
                      <td align="center" scope="col">Name</td>
                      <td align="center" scope="col">Photo</td>
                      <td align="center" scope="col">Quantity</td>
                      <td align="center" scope="col">Total amount</td>
                      <td align="center" scope="col">Status</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
	  $i=0;
	while($row=mysql_fetch_array($res))
	{
		$quantity=$row["cart_quantity"];
		$price=$row["product_price"];
		$totalamount=$quantity*$price;
		$i++;
		
  ?>
                    <tr>
	<td align="center" ><?php echo $i;?></td>
    <td align="center" ><?php echo $row["product_name"];?></td>
    <td align="center" ><img src="../Assets/Files/Products/<?php echo $row["product_photo"];?>" width="47" /></td>
    <td align="center" ><?php echo $row["cart_quantity"];?></td>
    <td align="center" ><?php echo  "$totalamount";?></td>
	<td align="center" >
  <?php
                            if($row['cart_status']=="1")
                            {
                              ?>
                               Order Placed / <a href="ViewBooking.php?pid=<?php echo $row["cart_id"]?>&sts=2" class="status_btn">Process</a>
                              <?php
                            }
                            else if($row['cart_status']=="2")
                            {
                              ?>
                               Order Processing / <a href="ViewBooking.php?pid=<?php echo $row["cart_id"]?>&sts=3" class="status_btn">Process Completed</a>
                              <?php
                            }
                            else if($row['cart_status']=="3")
                            {
                              ?>
                               Order Ready To Deliver / <a href="ViewBooking.php?pid=<?php echo $row["cart_id"]?>&sts=4" class="status_btn">Order Delivered</a>
                              <?php
                            }
                            else if($row['cart_status']=="4")
                            {
                              echo "Order Completed";
                            }

                        ?> 
                    </td>
                    
					
       </tr>
                    <?php                     }


                                            ?>

                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</body>
<?php
		include('Foot.php');
		 ob_end_flush();
		?>

</html>