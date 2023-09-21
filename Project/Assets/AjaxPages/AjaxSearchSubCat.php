<?php
include("../Connection/Connection.php");
$selqry="select * from tbl_subcategory where category_id IN(".$_GET["data"].")";
$result=mysql_query($selqry);
while($row=mysql_fetch_array($result))
{
	?>
        <li class="list-group-item">
            <div class="form-check">
                <label class="form-check-label">
                    <input onchange="productCheck()"  type="checkbox" class="form-check-input product_check" value="<?php echo $row["subcategory_id"]; ?>" id="subcategory"><?php echo $row["subcategory_name"]; ?>
                </label>
            </div>
        </li>
    <?php 
}
?>
