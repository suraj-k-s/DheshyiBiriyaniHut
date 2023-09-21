<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "SELECT * from tbl_product p inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id where true";

        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
        }
        if ($_GET["subcategory"]!=null) {

            $subcategory = $_GET["subcategory"];
            $sqlQry = $sqlQry." AND sc.subcategory_id IN(".$subcategory.")";
        }
		$resultS = mysql_query($sqlQry);

        if (mysql_num_rows($resultS) > 0) {
            while ($rowS = mysql_fetch_array($resultS)) {
?>

                        <div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/Files/Products/<?php echo $rowS["product_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $rowS["product_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $rowS["product_price"]; ?>/-
                                        </h4>
                                        <p align="center">
                                            <?php echo $rowS["category_name"]; ?><br>
                                            <?php echo $rowS["subcategory_name"]; ?><br>
                                        </p>
                                         <?php
										 $stock = "select sum(stock_quantity) as stock from tbl_stock where product_id = '" . $rowS["product_id"] . "'";
											$result2 = mysql_query($stock);
                            				$row2=mysql_fetch_array($result2);
											
											$stocka = "select sum(cart_quantity) as stock from tbl_cart where product_id = '" . $rowS["product_id"] . "'";
											$result2a = mysql_query($stocka);
                            				$row2a=mysql_fetch_array($result2a);
											
											$stock = $row2["stock"] - $row2a["stock"];
										
											
                                                if ($stock > 0) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="addCart('<?php echo $rowS['product_id'] ?>')"  class="btn btn-success btn-block" style="color:white">Add to Cart</a>
                                        <?php
                                        } else if ($stock == 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block" style="color:white">Out of Stock</a>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block" style="color:white">Stock Not Found</a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
            }
        } else {
             echo "<h4 align='center'>Products Not Found!!!!</h4>";
        }
    }

?>