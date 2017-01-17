<?php

if($_REQUEST)
{
	$id 	= $_REQUEST['parent_id'];
	
	$query  = "select * from topic where branch_id = ".$id;
	$results  = @mysql_query( $query);
	$num_rows = @mysql_num_rows($results);
	if($num_rows > 0)
	{?>
		<select name="sub_category" class="parent">
		<option value="" selected="selected">-- Sub Category --</option>
		<?php
		while ($rows = mysql_fetch_assoc(@$results))
		{?>
			<option value="<?php echo $rows['topic_id'];?>"><?php echo $rows['topic_name'];?></option>
		<?php
		}?>
		</select>	
	<?php	
	}
	else{echo '<label style="padding:7px;float:left; font-size:12px;">No Record Found !</label>';}
}
?>