<!DOCTYPE html>
<html>
<meta charset="UTF-8"/>
<?php 
$id0=$_POST[uid0];
$le0=$_POST[ulevel0];
$id1=$_POST[uid1];
$le1=$_POST[ulevel1];
$id2=$_POST[uid2];
$le2=$_POST[ulevel2];
$id3=$_POST[uid3];
$le3=$_POST[ulevel3];
$id4=$_POST[uid4];
$le5=$_POST[ulevel4];
require_once '../database.php';
$db = new database();
if(strlen($id0)>0)
{
	$chk_values=array('id_card' => $id0);
	$hos_re=$db->get_field_from_table('users','level',$chk_values);
	$db->update_table('users','level',$hos_re[0]['level']+$le0,'id_card',$id0);
	if(strlen($id1)>0)
	{
		$chk_values1=array('id_card' => $id1);
		$hos_re1=$db->get_field_from_table('users','level',$chk_values1);
		$db->update_table('users','level',$hos_re1[0]['level']+$le1,'id_card',$id1);
		if(strlen($id2)>0)
		{
			$chk_values2=array('id_card' => $id2);
			$hos_re2=$db->get_field_from_table('users','level',$chk_values2);
			$db->update_table('users','level',$hos_re2[0]['level']+$le2,'id_card',$id2);
			if(strlen($id3)>0)
			{
				$chk_values3=array('id_card' => $id3);
				$hos_re3=$db->get_field_from_table('users','level',$chk_values3);
				$db->update_table('users','level',$hos_re3[0]['level']+$le3,'id_card',$id3);
				if(strlen($id4)>0)
				{
					$chk_values4=array('id_card' => $id4);
					$hos_re4=$db->get_field_from_table('users','level',$chk_values4);
					$db->update_table('users','level',$hos_re4[0]['level']+$le4,'id_card',$id4);
				}
			}
		}
	}
	echo "<script type='text/javascript'>alert('提交成功');location='user_level.html';</script>"; 
}
else
echo "<script type='text/javascript'>alert('你未提交任何信息');location='user_level.html';</script>"; 
?>
</html> 