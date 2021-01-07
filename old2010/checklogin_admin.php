<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
<?
@session_start();
    $UserName=$_POST['username'];
	$Password=$_POST['password'];
    $sql= "SELECT ID_admin, username_admin, pass_admin FROM admin where username_admin= '$UserName' and pass_admin='$Password'";
	mysql_query("SET CHARACTER SET utf8"); 
    $result=mysql_db_query($dbname, $sql);
	$numrow=mysql_num_rows($result);
	while($rows=mysql_fetch_array($result)){
    $ID_admin=$rows['ID_admin'];	
	}


if ($numrow == "0"){
?>
	<script type="text/javascript">
    alert('คุณกรอก Username และ Password ไม่ถูกต้อง')
   </script>
	<?
	
}else{

  session_register('ID_admin');
	$_SESSION["ID_admin"]=$ID_admin;
  echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=index_admin.php\">";
  }

?>