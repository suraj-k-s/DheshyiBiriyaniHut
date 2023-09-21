<option value="">Select Place</option>
<?php
include("../Connection/Connection.php");
		$selQry = "select * from tbl_place where district_id='".$_GET["did"]."'";
		$re = mysql_query($selQry);
		while($row=mysql_fetch_array($re))
		{
			?>
				<option value="<?php echo $row["place_id"]?> "><?php echo $row["place_name"]?></option>
                <?php
		}
?>