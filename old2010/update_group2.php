<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?
  @session_start();
  include "connect.php";
  echo print_r($_POST);
  $num=$_GET['num'];
  $num=$num-1;
$i=1;  
$sql = "SELECT username FROM temp_dealer  " ;
mysql_query("SET CHARACTER SET utf8");
$result=mysql_db_query($dbname, $sql);	
while($rows=mysql_fetch_array($result)){
$username1[$i] = $rows['username']; 
$i++;
}  

for ($i=1;$i<=$num;$i++){  

//$pana[$i]=$_POST['pana'.$i.''];
//$delear_QNAP[$i]=$_POST['delear_QNAP'.$i.''];
$name_sales[$i]=$_POST['name_sales'.$i.''];
$group_member[$i]=$_POST['group_member'.$i.''];



//----------------------------------------------
 if ($group_member[$i]=='1'){
 $group_member[$i]="A";
 }if ($group_member[$i]=='2'){
 $group_member[$i]="B";
 }if ($group_member[$i]=='3'){
 $group_member[$i]="C";
 }if ($group_member[$i]=='4'){
 $group_member[$i]="D";
 }if ($group_member[$i]=='5'){
 $group_member[$i]="N";
 }if ($group_member[$i]=='6'){
 $group_member[$i]="T";
 }if ($group_member[$i]=='7'){
 $group_member[$i]="F";
 }if ($group_member[$i]=='8'){
 $group_member[$i]="R";
 }
//-------------------------------------------
if ($name_sales[$i]=='1'){
 $name_sales[$i]="คุณรัฐศาสตร์ เทพสุริย์ (โก้)";
 }if ($name_sales[$i]=='2'){
 $name_sales[$i]="คุณอนุสรณ์ โชติวัฒน์ (ตี่)";
 }if ($name_sales[$i]=='3'){
 $name_sales[$i]="คุณรณกร ไตรสารศรี (บอย)";
 }if ($name_sales[$i]=='4'){
 $name_sales[$i]="คุณคนัญชิดา สุระพิพิธ (นุช)";
 }if ($name_sales[$i]=='5'){
 $name_sales[$i]="Sale ส่วนกลาง";
 }if ($name_sales[$i]=='6'){
 $name_sales[$i]="คุณสมหมาย แซ่จง (หนุ่ม)";
 }
//-------------------------------------------
if($pana[$i]==''){
$pana[$i]=0;
}if($delear_QNAP[$i]==''){
$delear_QNAP[$i]=0;
}

//echo "pana[".$i."]".$pana[$i]."<br/>";
//echo "delear_QNAP[".$i."]".$delear_QNAP[$i]."<br/>";
echo "name_sales[".$i."]".$name_sales[$i]."<br/>";
echo "group_member[".$i."]".$group_member[$i]."<br/>";


$sql = "UPDATE `member` SET  group_member = '".$group_member[$i]."',pana = '".$pana[$i]."',name_sales='".$name_sales[$i]."',delear_QNAP='".$delear_QNAP[$i]."' WHERE username = '".$username1[$i]."'" ;
//echo $sql."<br/>";
mysql_query("SET CHARACTER SET utf8"); 	 
//$result=mysql_db_query($dbname,$sql);
}
  ?>
	<script type="text/javascript">
    alert('บันทึกข้อมูลเสร็จแล้ว')
    </script>  
  <?
//echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=update_group.php\">";
?>