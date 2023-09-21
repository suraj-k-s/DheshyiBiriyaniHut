<option value="">---select---</option>
<?php
include("../Connection/Connection.php");
		$selQry = "select * from tbl_subcategory where category_id='".$_GET["did"]."'";
		$re = mysql_query($selQry);
		while($row=mysql_fetch_array($re))
		{
			?>
				<option value="<?php echo $row["subcategory_id"]?> "><?php echo $row["subcategory_name"]?></option>
                <?php
		}
?>