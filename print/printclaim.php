<? require_once ("../config/function.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="YhiSkFpqiRG1bg47XUim75_Xv2lbPt59fw2rYD8zhfA" />
  <link rel="shortcut icon" href="<?=SITE_URL;?>images/favicon.ico" type="image/x-icon">
  <title>พิมพ์ใบรับซ่อม</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/adminLTE/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/adminLTE/css/skins/_all-skins.min.css">

  <style media="screen">
    @charset "utf-8";
    /* CSS Document */

    body,th {
    font-family: tahoma;
    font-size: 12px;
    }
    body {
    margin-left: 0px;
    margin-top: 0px;
    }

    td {
    text-align: left;
    font-family:Tahoma;
    font-size:11px;
    color:#737272;
    }
    a:link {
    color: #424A4F;
    text-decoration: none;
    }
    a:visited {
    color: #566066;
    text-decoration: none;
    }
    a:hover {
    color: #098C12;
    text-decoration: none;
    }
    a:active {
    color: #077C10;
    }

    h1,h2,h3,h4,h5,h6 {
    font-family: tahoma;
    font-weight: bold;
    }
    h1 {
    font-size: 12px;
    color: #000066;
    font-family: Tahoma;
    font-style: normal;
    line-height: normal;

    }
    h2 {
    font-size: 13px;
    color: #666666;
    }
    h3 {
    font-size: 12px;
    color: #999999;
    }
    h4 {
    font-size: 12px;
    color: #737272;
    font-family: Tahoma;
    font-style: normal;
    font-weight: normal;

    }
    .title
    { font-size:14px; color:#FFFFFF; font-weight:500; font-family:tahoma}


    ul.arrow {list-style-image:url('images/blue_a.gif')}
    ul.inside {list-style-position:inside}
    ul.outside {list-style-position:outside}
    ul.disc {list-style-type: disc}

    form
    {
    margin:0px;
    }
    .style1 {
    color: #000066;
      font-size: 12px;
    font-family: Tahoma;
    font-weight: bold;
    }
    .style2 {
    font-size: 11px;
    color: #737272;
    font-family: Tahoma;
    line-height: 20px;

    }
    .style3 {
      font-size: 15px;
    color: #737272;
    font-family: CordiaUPC;
    font-style: normal;
    font-weight: normal;
    line-height: 15px;
    }
    .style4 {
      font-size: 23px;
    color: #000000 ;
    font-family: CordiaUPC;
    font-style: normal;
    font-weight: normal;
    line-height: 1.1em;
    }
    .style5 {
      font-size: 30px;
    color: #FFFFFF;
    font-family:CordiaUPC;
    font-style: normal;
    font-weight: normal;
    line-height: 15px;
    }
    .style6 {
      font-size: 25px;
    color: #000000;
    font-family: CordiaUPC;
    font-style: normal;
    font-weight: normal;
    line-height: 15px;
    }
    .style8 {
    color: #FFFFFF;
    font-family: CordiaUPC;
    font-style: normal;
    line-height: 15px;
    font-size: 35px;
    }.style9 {
    color: #000000;
    font-family: CordiaUPC;
    font-style: normal;
    line-height: 15px;
    font-size: 20px;
    }.style10 {
    font-size: 13px;
    color: #737272;
    font-family: Tahoma;
    line-height: 20px;
    }
    .style11 {
    font-size: 13px;
    color: #FF0000;
    font-family: Tahoma;
    line-height: 20px;
    }
    .style12 {
    font-size: 13px;
    color: #000099
    font-family: Tahoma;
    color: #000099;
    }
    .style13 {
    font-size: 13px;
    color: #009900;
    font-family: Tahoma;
    line-height: 20px;
    }.style14 {
    font-size: 13px;
    color: #D9AD00;
    font-family: Tahoma;
    line-height: 20px;
    }
  </style>
  <style media="screen">>

    @media print {
      #print_form {background: #ffffff !important;min-width:920px;max-width:920px;margin:0px auto; }
      body{ background: #e1e1e1 !important; }
    }
    @media screen {
      #print_form {
        background: #ffffff !important;
        min-width: 960px;
        max-width: 960px;
        min-height: 1096px;

        margin: 25px auto;
        padding: 25px;
      }
      body{ background: #e1e1e1 !important; }
    }


  </style>
  <script src="<?=SITE_URL;?>plugins/jquery/dist/jquery.min.js"></script>
  <!--<script src="<?=SITE_URL;?>js/css3-animate-it.js"></script>-->
  <script src="<?=SITE_URL;?>plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?=SITE_URL;?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?=SITE_URL;?>plugins/fastclick/lib/fastclick.js"></script>
  <script src="<?=SITE_URL;?>plugins/adminLTE/js/adminlte.min.js"></script>
  <script src="<?=SITE_URL;?>plugins/adminLTE/js/demo.js"></script>
</head>
<body topmargin="0"  onload="javascript:void(printArticle());">
  <form name="form1" method="post" action="javascript:void(printArticle());">
    <div id="print_form">
      <table  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="5">&nbsp;</td>
          <td width="618"><img src="<?=SITE_URL;?>images/head_form.jpg" width="450" height="50"></td>
          <td width="312"><table width="300" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="137" height="29" class="style4"><div align="right" class="style4"><strong>Job No. </strong></div></td>
              <td width="10" class="style4"><div align="center">:</div></td>
              <td width="154" rowspan="2" bordercolor="#000000"><div align="right">
                  <table width="150" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
                    <tr>
                      <td width="169" height="25" class="style4">&nbsp;R1708183</td>
                    </tr>
                    <tr>
                      <td height="25" class="style4">&nbsp;17-08-2017</td>
                    </tr>
                  </table>
              </div></td>
            </tr>
            <tr>
              <td class="style4"><div align="right" class="style4"><strong>Date</strong></div></td>
              <td class="style4"><div align="center">:</div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="right"></div></td>
            </tr>
          </table></td>
          <td width="5">&nbsp;</td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="19">&nbsp;</td>
          <td colspan="2"><div align="center" class="style4"><strong>ใบรับซ่อม</strong></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="19">&nbsp;</td>
          <td colspan="2" valign="bottom">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="32">&nbsp;</td>
          <td colspan="2" valign="bottom" style="padding-top:6px"><table width="172" border="1" cellpadding="0" cellspacing="0">
            <tr>
              <td width="168" height="34" bordercolor="#000000" bgcolor="#666666" style="padding-top:6px"><span class="style6"><strong>&nbsp;สำหรับลูกค้า</strong></span></td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><table width="909" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">

            <tr >
              <td width="168" height="30" class="style4" style="padding-top:8px">
                <div align="left" >&nbsp;&nbsp;บริษัท</div></td>
              <td width="735" height="30" class="style4" style="padding-top:8px"><div align="left">&nbsp;โปรซีเคียว88 (PR006000)</div></td>
            </tr>
            <tr >
              <td height="30" class="style4" style="padding-top:8px">
                <div align="left">&nbsp;&nbsp;ผู้ติดต่อ</div></td>
              <td height="30" class="style4" style="padding-top:8px"><div align="left">&nbsp;คุณอภิชาติ คงวิทยาพานิช</div></td>
            </tr>
           <tr>
              <td height="30" class="style4" style="padding-top:8px">
                <div align="left">&nbsp;&nbsp;ที่อยู่</div></td>
              <td height="30" class="style4" style="padding-top:8px"><div align="left">&nbsp;39 ถนนรามอินทรา แขวงอนุสาวรีย์ เขตบางเขน กรุงเทพฯ            </div></td>
            </tr>
            <tr>
              <td height="30" class="style4" style="padding-top:7px">
                <div align="left">&nbsp;&nbsp;เบอร์โทร/แฟ็กซ์</div></td>
              <td height="30" class="style4" style="padding-top:7px"><div align="left">&nbsp; โทร 02-970-5865 </div></td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><table width="911" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td width="48" height="34" bgcolor="#999999" class="style6"><div align="center"><strong>ลำดับ</strong></div></td>
              <td width="118" height="34" bgcolor="#999999" class="style6"><div align="center"><strong>สินค้าส่งซ่อม</strong></div></td>
              <td width="134" height="34" bgcolor="#999999" class="style6"><div align="center"><strong>หมายเลขสินค้า</strong></div></td>
              <td width="457" height="34" bgcolor="#999999" class="style6"><div align="center"><strong>อาการเสีย</strong></div></td>
              <td width="142" height="34" bgcolor="#999999" class="style6"><div align="center"><strong>หมายเหตุ</strong></div></td>
            </tr>
    		<tr><td height="30" class="style4" style="padding-top:8px"><div align="center">&nbsp;1</div></td><td height="30" class="style4" style="padding-top:8px">&nbsp;AVM583GP</td><td height="30" class="style4" style="padding-top:8px">&nbsp;FA9H00030</td><td height="30" class="style4" style="padding-top:8px">&nbsp;โปรซีเคียว 88 ยืมสินค้าไปใช้งาน 17/08/2560</td><td height="30" class="style4" style="padding-top:8px">&nbsp;</td></tr>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><table width="900" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="124" height="30" class="style4" valign="top" style="padding-top:6px"><div align="left"><strong>อุปกรณ์เพิ่มเติม : </strong></div></td>
              <td width="776" class="style4" valign="top" style="padding-top:6px"><div align="left">&nbsp;            </div></td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="193">&nbsp;</td>
          <td colspan="2" class="style4" ><table width="907" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="20" height="43">&nbsp;</td>
              <td height="43" colspan="2"><u class="style6"><strong>เงื่อนไขการให้บริการ</strong></u></td>
              </tr>
            <tr>
              <td height="25">&nbsp;</td>
              <td width="31" height="25" valign="top" class="style9"><div align="center">1</div></td>
              <td width="856" height="26" valign="top"><span class="style9">บริษัทฯ ของสงวนในการเคลมสินค้าที่มีรอยไหม้, แตก, บิ่น, หัก, ลายปริ๊นขาด, ไม่มี Serial Number และสินค้าที่ไม่ได้ใช้งานตามสภาพปกติ </span></td>
            </tr>
            <tr>
              <td height="25">&nbsp;</td>
              <td height="25" valign="top" class="style9"><div align="center">2</div></td>
              <td height="25" valign="top"><span class="style9">เพื่อความสะดวกรวดเร็วในการเคลมสินค้า กรุณาโทรแจ้งกับเจ้าหน้าที่ด้านเทคนิคก่อนส่งสินค้ามายังบริษัทฯ </span></td>
            </tr>
            <tr>
              <td height="22">&nbsp;</td>
              <td height="22" valign="top" class="style9"><div align="center">3</div></td>
              <td height="22" valign="top"><span class="style9">ผู้รับสินค้ามีหน้าที่เพียงรับสินค้าและตรวจสอบว่าครบจำนวนที่บรรจุในกล่องหรือไม่เท่านั้น </span></td>
            </tr>
            <tr>
              <td height="22">&nbsp;</td>
              <td height="22" valign="top" class="style9">&nbsp;</td>
              <td valign="top"><span class="style9">มิได้มีหน้าที่ในการตรวจสอบรายละเอียดและอาการเสียของสินค้า </span></td>
            </tr>
            <tr>
              <td height="22">&nbsp;</td>
              <td height="22" valign="top" class="style9"><div align="center">            4</div></td>
              <td valign="top"><span class="style9">การจัดส่งสินค้าเพื่อส่ง บริษัท ซายเนค เทคโนโลยี่ จำกัด เป็นหน้าที่ของผู้จัดส่งที่จะเตรียมหาบรรจุภัณฑ์</span></td>
            </tr>
            <tr>
              <td height="22">&nbsp;</td>
              <td height="22" valign="top" class="style9">&nbsp;</td>
              <td valign="top"><span class="style9">และอุปกรณ์ในการกันการกระแทกและอื่นๆ เพื่อเป็นการป้องกันการเสียหายอันอาจเกิดจากการขนส่ง </span></td>
            </tr>
            <tr>
              <td height="22">&nbsp;</td>
              <td height="22" valign="top" class="style9">&nbsp;</td>
              <td valign="top"><span class="style9"> โดยทางเจ้าหน้าที่ของบริษัทฯ ของสงวนสิทธิในการไม่รับสินค้าที่มีการบรรจุไม่อยู่ในสภาพที่จะขนส่งได้ </span></td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="19">&nbsp;</td>
          <td colspan="2" class="style4">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td height="21">&nbsp;</td>
          <td height="21" colspan="2" class="style9"><table width="882" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="394" height="35" class="style4"><div align="right">ผู้ส่งสินค้า/ Delivered by : ........................................... </div></td>
              <td width="488" height="35" class="style4"><div align="right">ผู้รับสินค้า/ Received by : .............................................. </div></td>
            </tr>
            <tr>
              <td height="35" class="style4"><div align="right">วันที่ ........................................... </div></td>
              <td height="35" class="style4"><div align="right">วันที่ .............................................. </div></td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="25">&nbsp;</td>
          <td height="25" colspan="2" class="style9">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="19" colspan="2" class="style9"><table width="172" height="43" border="1" cellpadding="0" cellspacing="0">
            <tr>
              <td width="168" height="40" bordercolor="#000000" bgcolor="#666666"><span class="style6"><strong>&nbsp;สำหรับเจ้าหน้าที่</strong></span></td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td height="28" colspan="2" class="style9"><table width="909" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td height="39" class="style6"><u>ความเห็นเจ้าหน้าที่</u></td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
            </tr>
            <tr>
              <td height="30">&nbsp;</td>
            </tr>

          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><span class="style9">&nbsp;<u>หมายเหตุ</u> กรุณาตรวจสอบสินค้าและอุปกรณ์ต่างๆ ให้เรียบร้อยก่อนส่งสินค้า กรณีต้องการสอบถามข้อมูลเพิ่มเติม สามารถติดต่อได้ที่ 02-274-1389 ต่อ 5</span></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div>
  </form>
</body>
</html>
<script language=javascript>
	function printArticle(){
		if(window.print) {
			setTimeout('window.print();',100);
		}else if (agt.indexOf("mac") !=-1) {
			alert("Press 'Cmd+p' on your keyboard to print article.");
		}else {
			alert("Press 'Ctrl+p' on your keyboard to print article.")
		}
	}
</script>
