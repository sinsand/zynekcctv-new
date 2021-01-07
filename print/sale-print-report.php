<? require_once ("../config/function.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Sale Print Report</title>

<link rel="stylesheet" href="<?=SITE_URL;?>plugins/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<style media="screen">
  body{
    margin:0px;
    padding:0px;
    background-color: #e1e1e1;
    background-size: 55px;
    background-repeat: repeat;
  }
</style>
<script src="<?=SITE_URL;?>plugins/jquery/dist/jquery.min.js"></script>
<script src="<?=SITE_URL;?>plugins/jasonday-printThis-edc43df/printThis.js"></script>
</head>

<body>
  <div class="row" style="margin:0px 0px 60px 0px;">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=$HostLinkAndPath;?>#"  class="ClickPrintThis">พิมพ์ <i class="fa fa-print" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <?
  $sql = "SELECT *
  		FROM service_sale_pro ssp
  		LEFT OUTER JOIN member m ON ssp.member_id = m.member_id
  		LEFT OUTER JOIN admin a ON ssp.admin_id = a.ID_admin
  		LEFT OUTER JOIN province p ON ssp.province_id = p.PROVINCE_ID
  		LEFT OUTER JOIN type_service_sale tss ON ssp.type_service_id = tss.ID_type_service
  		WHERE ssp.service_id = '".$_GET['id']."' ";
  if(select_numz($sql)>0){
  	foreach(select_tbz($sql) as $row	){
  		?>
          <div class="row" style="margin:0px;">
            <div style="padding:0px;max-width:750px;margin:0px auto;">
              <div class="col-xs-12" style="background:#fff;" id="printThis-form">
                <form class="form-horizontal">
                  <div class="col-xs-12">
                    <img src="<?=SITE_URL;?>images/logo_prosecure.jpg" style="width:100%;height:auto;" />
                    <div class="text-center">
                      <b>รายการบันทึกข้อมูลการเยี่ยมลูกค้าของฝ่ายขาย</b>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <hr>
                    <h4>ข้อมูลพื้นฐาน</h4>
                    <div class="form-group">
                      <label class="control-label col-sm-3">ฝ่ายขายที่เข้าเยี่ยม :</label>
                      <div class=" col-sm-9">
                        <span class="form-control" style="border:none;box-shadow:none;"><?=$row['name_admin'];?></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3">วันที่ปฎิบัติงาน :</label>
                      <div class=" col-sm-9">
                        <span class="form-control" style="border:none;box-shadow:none;">(<?=date_($row['date_start']);?>) - (<?=date_($row['date_end']);?>)</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3">ร้านค้า/บริษัท :</label>
                      <div class=" col-sm-9">
                        <span class="form-control" style="border:none;box-shadow:none;"><?=$row['company'];?></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3">บุคคลที่ติดต่อ :</label>
                      <div class=" col-sm-9">
                        <span class="form-control" style="border:none;box-shadow:none;"><?=$row['contact_name_service'];?></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3">จังหวัด :</label>
                      <div class=" col-sm-9">
                        <span class="form-control" style="border:none;box-shadow:none;"><?=$row['PROVINCE_NAME'];?></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3">ประเภทการเยี่ยม :</label>
                      <div class=" col-sm-9">
                        <span class="form-control" style="border:none;box-shadow:none;"><?=$row['name_service'];?></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <hr>
                    <h4>ข้อมูลการบริการลูกค้า</h4>
                    <div class="form-group">
                      <label class="control-label col-sm-3">วัตถุประสงค์ :</label>
                      <div class=" col-sm-9">
                        <span class="form-control" style="border:none;box-shadow:none;height: auto;"><?=$row['comment'];?></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3">สรุปผล :</label>
                      <div class=" col-sm-9">
                        <span class="form-control" style="border:none;box-shadow:none;height: auto;"><?=$row['remark'];?></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <?
                      if(!empty($row['admin_comment']) && !empty($row['admin_by_id'])){
                        ?>
                          <hr>
                          <h4>ข้อเสนอแนะผู้จัดการ</h4>
                          <div class="form-group">
                            <label class="control-label col-sm-3">รายละเอียด :</label>
                            <div class=" col-sm-9">
                              <span class="form-control" style="border:none;box-shadow:none;height: auto;"><?=$row['admin_comment'];?></span>
                            </div>
                          </div>
                        <?
                      }
                    ?>
                  </div>
                  <div class="col-xs-12">
                    <?
                      $sqlz = "SELECT path_photo
                              FROM service_photo
                              WHERE service_id = '".$_GET['id']."' ";
                      $p = select_numz($sqlz);
                      if($p>0){
                        ?><hr><h4>รูปภาพเพิ่มเติม</h4><?
                          if($p==1){ $pp='6'; }elseif($p==2){$pp='6';}elseif($p==3){$pp='4';}elseif($p==4) {$pp='3';}
                          foreach(select_tbz($sqlz) as $ro){
                              ?><img src='<?=SITE_URL.$ro[path_photo];?>' class='col-xs-<?=$pp;?> img-thumbnail' style='padding:3px;' /><?
                          }
                      }
                    ?>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <script>
            $(document).ready(function() {
              $(".ClickPrintThis").click(function(e) {
                $("#printThis-form").printThis();
              });
            });
          </script>
      <?
  	}
  }
  ?>
</body>
</html>
