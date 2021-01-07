<?
   //      print_r($_POST);
		$hostname="localhost";
		$username="zynek";
		$password="z7895123";
		$dbname="zynek_tech";
		$conn=mysql_connect($hostname,$username,$password);
		if(!conn) die("ติดต่อไม่ได้");
		mysql_select_db($dbname,$conn) or die("ติดต่อฐานข้อมูล $dbname ไม่ได้") ;
?>