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
<form id="form1" name="form1" method="post" action="add_product1.php" enctype="multipart/form-data" >
  <div align="center">
    <table width="920" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td colspan="3"><div align="center">
          <? include "head_admin.php" ?>
        </div></td>
      </tr>
      <tr>
        <td width="11">&nbsp;</td>
        <td width="900"><img src="images/admin_price.jpg" width="209" height="30" /></td>
        <td width="9">&nbsp;</td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td><div align="center">
          <table width="800" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="20" class="style11">&nbsp;</td>
                <td width="173" class="style11">ประเภทสินค้า : </td>
                <td width="667" height="20"><label>
                  <select name="select">
                    <option value="1">คอมพิวเตอร์</option>
                    <option value="2">โน้ตบุ๊ค</option>
                    <option value="3">เน็ตบุ๊ค</option>
                    <option value="4">เซิร์ฟเวอร์</option>
                    <option value="5">ปริ้นเตอร์</option>
                    <option value="6">อุปกรณ์เน็ตเวิร์ค</option>
                    <option value="7">ซอฟต์แวร์</option>
                    <option value="8">อื่นๆ</option>
                    <option value="16">IP Camera &amp; NVR </option>
                    <option value="9">แฟ็กซ์</option>
                    <option value="10">ตู้สาขาโทรศัพท์</option>
                    <option value="11">พานาบอร์ด</option>
                    <option value="12">โปรเจ็คเตอร์</option>
                    <option value="13">แอลซีดี ทีวี</option>
                    <option value="14">กล้องดิจิตอล</option>
                    <option value="15">ระบบเสียงห้องประชุม</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td height="20" class="style11">&nbsp;</td>
                <td class="style11"> brand สินค้า : </td>
                <td height="20"><label>
                  <select name="select2">
                    <option value="1">Lenovo</option>
                    <option value="2">Panasonic</option>
                    <option value="3">Acer</option>
                    <option value="4">Sony</option>
                    <option value="5">QNAP</option>
                    <option value="6">Canon</option>
                    <option value="8">Samsung</option>
                    <option value="9">LG</option>
                    <option value="10">Asus</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td height="20" class="style11">&nbsp;</td>
                <td class="style11">รหัสสินค้า : </td>
                <td height="20"><input type="text" name="code_product" />
                  (เช่น L5K-59022036 , LXN440C010 , LXN440C010)</td>
              </tr>
            <tr>
                <td width="38" height="27" class="style11">&nbsp;</td>
                <td class="style11">ชื่อสินค้่่่า : </td>
                <td height="20"><input type="text" name="name_product" />
                  (เช่น กล้องดิจิตอล Canon PowerShot รุ่น PWS A470 , Lenovo PC A600 All-in-1)</td>
            </tr>
              <tr>
                <td height="20" class="style11">&nbsp;</td>
                <td class="style11">คำอธิบายราคา : </td>
                <td height="20"><input name="price_product" type="text" size="60" />
                  (เช่น ราคานี้ยังไม่รวม VAT, ค่าขนส่ง, และบริการ)</td>
              </tr>
              
              <tr>
                <td height="20" class="style11">&nbsp;</td>
                <td class="style11">รายละเอียดย่อ : </td>
                <td height="20"><textarea name="short_descrip1" cols="90" rows="5" id="short_descrip1"><? echo $short_descrip1?></textarea>                </td>
              </tr>
              <tr>
                <td height="20" class="style11">&nbsp;</td>
                <td class="style11">รายละเอียดหลัก : </td>
                <td height="20"><textarea name="descrip_product" cols="90" rows="5" id="descrip_product" ><? echo $descrip_product?></textarea></td>
              </tr>
              <tr>
                <td height="20" class="style11">&nbsp;</td>
                <td class="style11">รูปสินค้า : </td>
                <td height="20"><input name="picture"  type="file" id="picture" size="60"  /></td>
              </tr>
              <tr>
                <td height="20" class="style11">&nbsp;</td>
                <td class="style11">รูปสินค้าขนาดใหญ่ : </td>
                <td height="20"><input name="big_pic" type="file" size="60"   /></td>
              </tr>
              <tr>
              <td height="20" class="style11">&nbsp;</td>
                <td class="style11">ลิงค์ไฟล์ PDF  : </td>
                <td height="20"><input name="size_pdf" type="text" size="70"  /></td>
              </tr>
            <tr>
              <td height="20" class="style11">&nbsp;</td>
                <td class="style11">หัวข้อสินค้า : </td>
                <td height="20"><label>
                  <select name="select3">
                    <option value="1">IT Products</option>
                    <option value="2">OA &amp; Communication</option>
                    <option value="3">AV Products</option>
                  </select>
                </label></td>
            </tr>
            
            <tr>
              <td height="20" class="style11">&nbsp;</td>
                <td class="style11">กลุ่มสินค้า : </td>
                <td height="20"><label>
                  <select name="select4">
                    <option value="1">ตู้สาขา Panasonic Hybrid PBX</option>
                    <option value="2">ตู้สาขา Panasonic Hybrid IP-PBX</option>
                    <option value="3">โทรศัพท์ Panasonic Integrated Telephone Systems</option>
                    <option value="4">โทรศัพท์ Panasonic Digital Cordless for 2.4 GHz</option>
                    <option value="5">Panasonic Thermal Fax</option>
                    <option value="6">Panasonic Thermal Transfer Fax Film</option>
                    <option value="7">Panasonic Laser Fax</option>
                    <option value="8">Panasonic Laser Fax Multifunction</option>
                    <option value="9">Panasonic Laser MultiFunction 3 in 1</option>
                    <option value="10">Samsung Mono Laser Printer</option>
                    <option value="11">Samsung Mono Multifunction Laser Printer</option>
                    <option value="12">Samsung Color Laser Printer</option>
                    <option value="13">Lenovo Y450</option>
                    <option value="14">Lenovo Y550</option>
                    <option value="15">Lenovo G230</option>
                    <option value="16">Lenovo G430</option>
                  </select>
                </label></td>
            </tr>
            <tr>
              <td height="20" class="style11">&nbsp;</td>
              <td class="style11">&nbsp;</td>
              <td height="20">&nbsp;</td>
            </tr>
            <tr>
              <td height="20" class="style11">&nbsp;</td>
                <td class="style11">การจัดเรียง : </td>
                <td height="20"><input type="text" name="order_product" /></td>
            </tr>
            <tr>
              <td height="20" class="style11">&nbsp;</td>
              <td class="style11">การแสดงสินค้าหน้าแรก : </td>
              <td height="20"><label>
                <select name="promotion">
                  <option value="0">0</option>
                  <option value="1">1</option>
                </select>
                (0 คือ ไม่แสดงแรก , 1 คือ แสดงหน้าแรก)</label></td>
            </tr>
            <tr>
              <td height="20" class="style11">&nbsp;</td>
                <td class="style11">สินค้าใหม่ : </td>
                <td height="20"><select name="new_product">
                    <option value="0">0</option>
                    <option value="1">1</option>
                  </select>
                  (0 คือ ไม่แสดงไอคอลสินค้าใหม่ , 1 คือ แสดงไอคอลสินค้าใหม่)</td>
            </tr>
            <tr>
              <td height="25" class="style3">&nbsp;</td>
              <td height="25" colspan="2" class="style3"><span class="style3">*** รายละเอียดสินค้าเพิ่มเติม *** </span></td>
              </tr>
            <tr>
              <td height="25" class="style3">&nbsp;</td>
              <td height="25" colspan="2" class="style3"><span class="style3">*** รายละเอียดโปรโมชั่น *** </span></td>
              </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><label>
                  <input type="submit" name="Submit" value="Submit" />
                  <input type="reset" name="Submit2" value="Reset" />
                </label></td>
              </tr>
                  </table>
        </div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center"></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>
