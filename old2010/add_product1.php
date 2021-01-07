<?
include "connect.php";
if (!defined('UPLOADDIR')) define('UPLOADDIR', (dirname(__FILE__) ."/uploadfiles") );
if (is_uploaded_file($_FILES['picture']['tmp_name'])) {
$File_tmpname = $_FILES["picture"]["tmp_name"];  
$File_name = $_FILES["picture"]["name"];
$File_type = $_FILES["picture"]["type"];
$File_extension = substr($File_type,(strrpos($File_type,"/")+1));
$File_size = $_FILES["picture"]["size"];
echo "File_name ".$File_name;

if (strlen($File_name)>0){
// echo $File_size;
 if ($File_size > 102400 ){

	 ?>
		<script type="text/javascript">
		alert('รูปมีขนาดใหญ่เกิน 100 Kb')
		</script>
	<?
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL= update_member.php?ID_member=$ID_member\">";
	$num=1;
}else if (($File_type != "image/gif") and  ($File_type != "image/jpeg")and  ($File_type != "image/jpg")and  ($File_type != "image/pjpeg")){
		 ?>
		<script type="text/javascript">
		alert('ไม่สามารถรองรับไฟล์นอกเหนือจาก .jpg /.jpeg /.gif ')
		</script>
	<?
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL= update_member.php?ID_member=$ID_member\">";
	$num=1;
}else if ( move_uploaded_file($File_tmpname, (UPLOADDIR . "/" . $File_name)) ) {
}
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ขายเน็ตบุ๊ค, โปรเจ๊คเตอร์, อุปกรณ์คอมพิวเตอร์ ,ตู้สาขา, LCD TV </title>
<link rel="stylesheet" href="style.css">

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div align="center"></div>
</form>
</body>
</html>
