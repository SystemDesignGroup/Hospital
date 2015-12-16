<!DOCTYPE html>
<html>
<meta charset="UTF-8"/>
<?php 
$getco=$_POST[boxes];
$getal=$_POST[hids];
require_once '../database.php';
$db = new database();
for($i=0;$i<count($getal);$i++)
{
	if(in_array($getal[$i],$getco))
	{
		$db->update_table('users','status',2,'id_card',$getal[$i]);
	}
	else
	{
		$db->update_table('users','status',3,'id_card',$getal[$i]);
	}
}
echo "<script type='text/javascript'>alert('审核完成');location='user_check.php';</script>"; 
?>
</html> 