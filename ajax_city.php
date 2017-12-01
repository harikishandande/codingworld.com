<?php
include('db.php');
if($_POST['data'])
{
	$data=$_POST['data'];
	$sql=mysql_query("select b.id,b.data from data_parent a,data b where b.id=a.did and parent='$data'");

	echo '<option value="">--Select Course--</option>';

	while($row=mysql_fetch_array($sql))
	{
		$data=$row['data'];
		echo '<option value="'.$data.'">'.$data.'</option>';
	}
}
?>