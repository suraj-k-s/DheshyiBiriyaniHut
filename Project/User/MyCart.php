<?php
ob_start();
include("Head.php");

session_start();
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
            />
        <style>
            .product-image {
                float: left;
                width: 15%;
            }

            .product-details {
                float: left;
                width: 20%;
            }

            .product-price {
                float: left;
                width: 12%;
            }

            .product-quantity {
                float: left;
                width: 16%;
            }
			.product-kg {
                float: left;
                width: 16%;
            }

            .product-removal {
                float: left;
                width: 9%;
            }

            .product-line-price {
                float: left;
                width: 12%;
                text-align: right;
            }

            /* This is used as the traditional .clearfix class */
            .group:before,
            .shopping-cart:before,
            .column-labels:before,
            .product:before,
            .totals-item:before,
            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .product:after,
            .totals-item:after {
                content: "";
                display: table;
            }

            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .product:after,
            .totals-item:after {
                clear: both;
            }

            .group,
            .shopping-cart,
            .column-labels,
            .product,
            .totals-item {
                zoom: 1;
            }

            /* Apply clearfix in a few places */
            /* Apply dollar signs */
            .product .product-price:before,
            .product .product-line-price:before,
            .totals-value:before {
                content: "₹";
            }

            /* Body/Header stuff */
            body {
                padding: 0px 30px 30px 20px;
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light",
                    "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-weight: 100;
            }

            h1 {
                font-weight: 100;
            }

            label {
                color: #aaa;
            }

            .shopping-cart {
                margin-top: -45px;
            }

            /* Column headers */
            .column-labels label {
                padding-bottom: 15px;
                margin-bottom: 15px;
                border-bottom: 1px solid #eee;
            }
            .column-labels .product-image,
            .column-labels .product-details,
            .column-labels .product-removal {
                text-indent: -9999px;
            }

            /* Product entries */
            .product {
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
            }
            .product .product-image {
                text-align: center;
            }
            .product .product-image img {
                width: 100px;
            }
            .product .product-details .product-title {
                margin-right: 20px;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }
            .product .product-details .product-description {
                margin: 5px 20px 5px 0;
                line-height: 1.4em;
            }
            .product   input {
                width: 40px;
            }
            .product .remove-product {
                border: 0;
                padding: 4px 8px;
                background-color: #c66;
                color: #fff;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
                font-size: 12px;
                border-radius: 3px;
            }
            .product .remove-product:hover {
                background-color: #a44;
            }

            /* Totals section */
            .totals .totals-item {
                float: right;
                clear: both;
                width: 100%;
                margin-bottom: 10px;
            }
            .totals .totals-item label {
                float: left;
                clear: both;
                width: 79%;
                text-align: right;
            }
            .totals .totals-item .totals-value {
                float: right;
                width: 21%;
                text-align: right;
            }
            .totals .totals-item-total {
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }

            .checkout {
                float: right;
                border: 0;
                margin-top: 20px;
                padding: 6px 25px;
                background-color: #6b6;
                color: #fff;
                font-size: 25px;
                border-radius: 3px;
            }

            .checkout:hover {
                background-color: #494;
            }

            /* Make adjustments for tablet */
            @media screen and (max-width: 650px) {
                .shopping-cart {
                    margin: 0;
                    padding-top: 20px;
                    border-top: 0px solid #eee;
                }

                .column-labels {
                    display: none;
                }

                .product-image {
                    float: right;
                    width: auto;
                }
                .product-image img {
                    margin: 0 0 10px 10px;
                }

                .product-details {
                    float: none;
                    margin-bottom: 10px;
                    width: auto;
                }

                .product-price {
                    clear: both;
                    width: 70px;
                }

                .product-quantity {
                    width: 100px;
                }
                .product-quantity input {
                    margin-left: 20px;
                }

                .product-quantity:before {
                    content: "x";
                }

                .product-removal {
                    width: auto;
                }

                .product-line-price {
                    float: left	;
                    width: 70px;
                }
            }
            /* Make more adjustments for phone */
            @media screen and (max-width: 350px) {
                .product-removal {
                    float: right;
                }

                .product-line-price {
                    float: right;
                    clear: left;
                    width: auto;
                    margin-top: 10px;
                }

                .product .product-line-price:before {
                    content: "Item Total: ₹";
                }

                .totals .totals-item label {
                    width: 60%;
                }
                .totals .totals-item .totals-value {
                    width: 40%;
                }
            }


            label{
                margin: 0px 15px;
            }



            /*SWITCH 2 ------------------------------------------------*/
            .switch2{
                position: relative;
                display: inline-block;
                width: 60px;
                height: 32px;
                border-radius: 27px;
                background-color: #bdc3c7;
                cursor: pointer;
                transition: all .3s;
            }
            .switch2 input{
                display: none;
            }
            .switch2 input:checked + div{
                left: calc(100% - 40px);
            }
            .switch2 div{
                position: absolute;
                width: 40px;
                height: 40px;
                border-radius: 25px;
                background-color: white;
                top: -4px;
                left: 0px;
                box-shadow: 0px 0px 0.5px 0.5px rgb(170,170,170);
                transition: all .2s;
            }

            .switch2-checked{
                background-color: #2ecc71;
            }


        </style>
    <title>Cart</title>
    </head>
    <?php
       
        if (isset($_POST["btn_checkout"])) {
                 
                 $amt = $_POST["carttotalamt"];
				 
				 
			
                
                echo $selC = "select * from tbl_booking where user_id='" .$_SESSION["uid"]. "'and booking_status='0'";
                $rs = mysql_query($selC);
                $row=mysql_fetch_array($rs);
                
                $_SESSION["bid"] = $row["booking_id"];
                
                $upQry3 = "update tbl_booking set booking_date=curdate(),booking_amount='".$amt."',booking_status='1' where booking_id='" .$row["booking_id"]. "'";
				
				mysql_query($upQry3);
				$upQry1 = "update tbl_cart set cart_status='1' where booking_id='" .$row["booking_id"]. "'";
                if(mysql_query($upQry1))
                {
                   
         		  	?>
                    <script>
					window.location="Payment.php";
					</script>
                    <?php
					
                }
                 
                
                
   
        }


    ?>
    <body onload="recalculateCart()" style="padding:0px">

    <br><br><br><br><br>
    <div style="padding: 30px;" align="center">
        <h1>Cart</h1>
        <br>
        <br>
            <div class="column-labels">
                <label class="product-price" style="width: 10%; text-align:center">Image</label>
                <label class="product-price" style="width: 20%; text-align:center">Details</label>	
                <label class="product-price" style="width: 11%; text-align:center">Price</label>
                <label class="product-price" style="width: 12%; text-align:center">Qty</label>
                <label class="product-price" style="width: 13%; text-align:center">Remove</label>
                <label class="product-price" style="width: 8%; text-align:right">Total</label>
            </div>
<form method="post">
        <div class="shopping-cart" style="margin-top: 50px">            <?php                
            $sel = "select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id where b.user_id='" .$_SESSION["uid"]. "' and booking_status='0' and cart_status=0";
            //echo $sel; 
            $res = mysql_query($sel);
                while ($row=mysql_fetch_array($res)) {
                    $selPr = "select * from tbl_product p inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id where product_id='" .$row["product_id"]. "'";
                    $respr = mysql_query($selPr);
                    if ($rowpr=mysql_fetch_array($respr)) {
                       
            ?>

            <div class="product">
                <div class="product-image">
                    <img
                        src="../Assets/Files/Products/<?php echo $rowpr["product_photo"]; ?>"
                        />
                </div>
                <div class="product-details" style="padding-top:0px">
                    <div class="product-title"><?php echo $rowpr["product_name"] ?></div>
                    <p class="product-description">
                    <?php echo $rowpr["product_desc"] ?>
                    </p>
                    <?php
                        if($rowpr["cat_name"]=="Cakes")
                        {
                            ?>
                                <img src="file.png" width="30" height="30" onClick="triggerFile()">
                    	        <input alt="<?php echo $row["cart_id"] ?>" id="fileUpload"  onChange="handleFileSelect(this)" type="file" style="visibility:hidden" />
                            
                            <?php
                             if($row["product_photo"]=="")
                             {
                                 echo "Photo Not Found";
                             }else
                             {
                                 echo "Photo Found";
                             }
                         
                        }
                    ?>
                   
                </div>
                <div class="product-price"	>
				
				<?php echo $rowpr["product_price"] ?></div>
              
                <div class="product-quantity">
                    <input alt="<?php echo $row["cart_id"] ?>" type="number" onchange="qty(this)" value="<?php echo $row["cart_quantity"] ?>" min="1" />
                </div>
               
               
                <div class="product-removal">
                    <button class="remove-product" value="<?php echo $row["cart_id"] ?>">Remove</button>
                </div>
                <div class="product-line-price">
                    <?php
                        $pr = $rowpr["product_price"];
                        $qty = $row["cart_quantity"];
                        
                        $tot = $pr * $qty ;
                        
						
                        echo $tot;
                    ?>
                </div>
            </div>
            <?php
                    
                }
              
                }
            ?>

            <div class="totals">
                <div class="totals-item totals-item-total">
                    <label>Grand Total</label>
                    <div class="totals-value" id="cart-total">0</div>
                    <input type="hidden" id="cart-totalamt" name="carttotalamt" value=""/>
                </div>
            </div>
            
             
            
                <button type="submit" class="checkout" name="btn_checkout">Place Order</button>
            

        </div>
</form>
        <!-- partial -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>



function triggerFile(){
			
			$('#fileUpload').click();
			document.getElementById('fileUpload').addEventListener('change', handleFileSelect, false);
			
		}
		
		
		
		
		
		function handleFileSelect(evt) {
                var f = evt.target.files[0]; // FileList object
                var reader = new FileReader();
                // Closure to capture the file information.
                reader.onload = (function(theFile) {
                    return function(e) {
                        var binaryData = e.target.result;
                        //Converting Binary Data to base 64
                        var base64String = window.btoa(binaryData);
                        //showing file converted to base64
 						var val = 'data:image/jpeg;base64,' + base64String;
						
						var form_data = new FormData();                  
    					form_data.append('file', f);
						form_data.append('id', evt.target.alt);
						
						$.ajax({
								url: 'uploadPhoto.php', // <-- point to server-side PHP script 
								dataType: 'text',  // <-- what to expect back from the PHP script, if anything
								cache: false,
								contentType: false,
								processData: false,
								data: form_data,                         
								type: 'POST',
								success: function(php_script_response){
									location.reload();
								}
							 });
                    };
                })(f);
                reader.readAsBinaryString(f);
            }
		












        /* Set rates + misc */
         var fadeTime = 300;

        /* Assign actions */
        function qty(val)
        {   $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=Update&id=" + val.alt + "&qty=" + val.value
            });
            updateQuantity1(val);
			
		

        }

        function qty2(val)
        {   $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=Update&id=" + val.alt + "&qty=" + val.value
            });
            updateQuantity(val);
			
		

        }


        function updateQuantity1(quantityInput) {
            /* Calculate line price */
            var productRow = $(quantityInput).parent().parent();
            var price = parseFloat(productRow.children(".product-price").text());
            var quantity = $(quantityInput).val();
            var linePrice = price * quantity;
			//alert(linePrice);
            /* Update line price display and recalc cart totals */
            productRow.children(".product-line-price").each(function() {
                $(this).fadeOut(fadeTime, function() {
                    $(this).text(linePrice.toFixed(2));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }




        function nameUp(val)
        {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=nUpdate&id=" + val.alt + "&name=" + val.value
            });
           
        }


        function kgUp(val)
        {
            
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=KUpdate&id=" + val.alt + "&qty=" + val.value
            });
            updateKg(val);
        }
		
        $(".product-removal button").click(function() {

            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=Delete&id=" + this.value
            });
            removeItem(this);
        });

        /* Recalculate cart */
        function recalculateCart() {
            var subtotal = 0;

            /* Sum up row totals */
            $(".product").each(function() {
                subtotal += parseFloat(
                        $(this).children(".product-line-price").text()
                        );
            });

            /* Calculate totals */
            var total = subtotal;

            /* Update totals display */
            $(".totals-value").fadeOut(fadeTime, function() {
                $("#cart-total").html(total.toFixed(2));
                document.getElementById("cart-totalamt").value = total.toFixed(2);
                if (total == 0) {
                    $(".checkout").fadeOut(fadeTime);
                } else {
                    $(".checkout").fadeIn(fadeTime);
                }
                $(".totals-value").fadeIn(fadeTime);
            });
        }

        /* Update quantity */
        function updateQuantity(quantityInput) {
            /* Calculate line price */
            var productRow = $(quantityInput).parent().parent();
            var price = parseFloat(productRow.children(".product-price").text());
            var quantity = $(quantityInput).val();
			var kg = $(".product-kg input").val();
            var linePrice = price * quantity * kg;
			//alert(linePrice);
            /* Update line price display and recalc cart totals */
            productRow.children(".product-line-price").each(function() {
                $(this).fadeOut(fadeTime, function() {
                    $(this).text(linePrice.toFixed(2));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }


 function updateKg(quantityInput) {
            /* Calculate line price */
            var productRow = $(quantityInput).parent().parent();
            var price = parseFloat(productRow.children(".product-price").text());
            var kg = $(quantityInput).val();
			var quantity = $(".product-quantity input").val();
            var linePrice = price * quantity*kg;
			//alert(linePrice)
			//window.location("MyCart.php");
            /* Update line price display and recalc cart totals */
            productRow.children(".product-line-price").each(function() {
                $(this).fadeOut(fadeTime, function() {
                    $(this).text(linePrice.toFixed(2));
					
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }

        /* Remove item from cart */
        function removeItem(removeButton) {
            /* Remove row from DOM and recalc cart total */
            var productRow = $(removeButton).parent().parent();
            productRow.slideUp(fadeTime, function() {
                productRow.remove();
                recalculateCart();
            });

        }

        $('.switch2 input').on('change', function() {
            var dad = $(this).parent();
            if ($(this).is(':checked'))
                dad.addClass('switch2-checked');
            else
                dad.removeClass('switch2-checked');
        });
        </script>
    </div>
    </body>
  
</html>

<?php
ob_flush();
include("Foot.php");
?>
