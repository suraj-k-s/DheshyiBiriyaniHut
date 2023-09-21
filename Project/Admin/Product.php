<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product</title>
</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');
include('Head.php');
if(isset($_POST["btn_save"]))
{
	$name=$_POST["txt_name"];
	$price=$_POST["txt_price"];
	$details=$_POST["txt_details"];
    $subcategory= $_POST["sel_subcategory"];

	$img=$_FILES["file_img"]["name"];
	$temp=$_FILES["file_img"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/Files/Products/'.$img);


	$insqry="insert into tbl_product(product_name,product_price,product_details,product_photo,subcategory_id) values('$name','$price','$details','$img','$subcategory')";
	mysql_query($insqry);	
	}
    if(isset($_GET["id"]))
    {
        $id=$_GET["id"];
        $delqry="delete from tbl_product where product_id=$id";
        mysql_query($delqry);
        header("location:Product.php");
	}	

?>
<body>
        <section class="main_content dashboard_part">
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="QA_section">
                                <!--Form-->
                                <div class="white_box_tittle list_header">
                                    <div class="col-lg-12">
                                        <div class="white_box mb_30">
                                            <div class="box_header ">
                                                <div class="main-title">
                                                    <h3 class="mb-0" >Table Product</h3>
                                                </div>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                    <label for="txt_category">Category</label>
                                                    <select class="form-control" name="sel_category" id="sel_category" onchange="getSubcategory(this.value)">
                                                    <option value="">-----Select-----</option>
                                                    <?php
                                                          $sel ="select * from tbl_category ";
                                                  $row = mysql_query($sel);
                                                  while($data = mysql_fetch_array($row))
                                                  {
                                                 ?>
                                                     <option value="<?php echo $data['category_id'];?>"><?php echo $data['category_name']; ?></option >
                                                     
                                                     <?php
                                                     }
                                                     ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_subcategory">Sub Category</label>
                                                    <select class="form-control" name="sel_subcategory" id="sel_subcategory">
                                                    <option value="">-----Select-----</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_name">Product Name</label>
                                                    <input required="" type="text" class="form-control" id="txt_name" name="txt_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_name">Product Price</label>
                                                    <input required="" type="text" class="form-control" id="txt_price" name="txt_price">
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_name">Product Image</label>
                                                    <input required="" type="file" class="form-control" id="file_img" name="file_img">
                                                </div>
                                                <div class="form-group">
                                                    <label for="txt_name">Product Details</label>
                                                    <textarea class="form-control" required name="txt_details"></textarea>
                                                </div>
                                                <div class="form-group" align="center">
                                                        <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">NAME</td>
                                                <td align="center" scope="col">PRICE</td>
                                                <td align="center" scope="col">IMAGE</td>
                                                <td align="center" scope="col">DETAILS</td>
                                                <td align="center" scope="col">ACTION</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                $selQry = "select * from tbl_product";
                                                $rs =mysql_query($selQry);
                                                while ($data = mysql_fetch_assoc($rs)) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data['product_name']; ?></td>
                                                <td align="center"><?php echo $data['product_price']; ?></td>
                                                <td align="center"><img src="../Assets/Files/Products/<?php echo $data['product_photo']; ?>" width="150" height="150" ></td>
                                                <td align="center"><?php echo $data['product_details']; ?></td>
                                                <td align="center">
                                                        <a href="Product.php?id=<?php echo $data['product_id']?>" class="status_btn">DELETE</a>/
                                                        <a href="Stock.php?id=<?php echo $data['product_id']?>" class="status_btn">Stock</a>
                                                </td>
                                            </tr>
                                            <?php                    
                                              }


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
        <script src="../Assets/JQ/jQuery.js"></script>
        <script>
            function getSubcategory(did)
            {

                $.ajax({url:"../Assets/AjaxPages/AjaxSubcategory.php?did="+ did,
                success:function(result)
                {
                    //alert(result)
                    $("#sel_subcategory").html(result);
                }});
            }
        </script>
        <?php
        include('Foot.php');
         ob_end_flush();
        ?>
</body>
</html>