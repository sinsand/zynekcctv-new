<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ระบบจัดการเว็บ Zynektechnologies</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css">
<style type="text/css">
<!--
.style1 {
	font-family: "Microsoft Sans Serif";
	font-size: 12px;
}
.style2 {font-size: 12px}
-->
</style>
</head>
<body onload="document.login.username.focus();">
<form name="login" method="post" action="checklogin_admin.php" id="login">
  <div style="position: relative; top: 100px;" align="center">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="414">
  <tbody><tr>
    <td colspan="3"><img src="images/Admin_zynek.jpg" width="413" height="60"></td>
  </tr>
  <tr>
    <td rowspan="3" valign="top" width="224"><img src="images/pic_cp.jpg" height="153" width="224"></td>
    <td colspan="2"><img src="images/Admin_login.jpg" width="189" height="30"></td>
  </tr>
  <tr>
    <td width="173" height="118" align="left" valign="top" bgcolor="#FFFFFF" class="style2">
		<div class="style11" style="width: 165px; margin-left: 7px;">User Login : </div>
		<div class="style1" style="margin-left: 7px;"><input name="username" id="username" style="width: 140px;" type="text"></div>
		<div class="style11" style="width: 165px; margin-left: 7px;">Password : </div>	
		<div style="margin-left: 7px;"><span class="style2" style="font-family: &quot;Microsoft Sans Serif&quot;">
		  <input name="password" id="password" style="width: 140px;" type="password">
		</span><span style="font-family: &quot;Microsoft Sans Serif&quot;">		</span></div>
	  <div style="margin-top: 3px; margin-left: 105px;">
	    <input src="images/bt.gif" onclick="return CheckDataMember();" border="0" type="image"></div>	</td>
    <td width="17"><img src="images/border-right.gif" height="116" width="14"></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><div align="left"><img src="images/border-bottom.gif" width="187" height="7" align="top"></div></td>
  </tr>
</tbody>
</table>
</div>
</form>
<script language="javascript">

function CheckDataMember() {
  var userdata= document.getElementById("username");
  var check1 = userdata.value;
  var passdata= document.getElementById("password");
  var check2 = passdata.value;

  if (!check1) {
    alert("คุณยังไม่ได้กรอก \"ชื่อผู้ใช้ระบบ\"");
    document.login.username.focus();
    return false;
  }
   if (!check2) {
    alert("คุณยังไม่ได้กรอก \"รหัสผ่าน\"");
	document.login.password.focus();
    return false;
  }
document.login.submit();
}
</script>
</body></html>
