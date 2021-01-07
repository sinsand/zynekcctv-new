<?
if (isset($_POST['SubmitAddPromotion'])) {
    if (($_FILES["npro_FileCover"]["size"] > 2097152) && ($_FILES["npro_FileDetail"]["size"] > 2097152) ){
      ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        ไฟล์ใหญ่เกินไป ไฟล์ต้องมีขนาดไม่ถึง 2 เมกะไบต์.
      </div>
      <?
    }else {

      $allowed =  array('png','jpg');

      $File_cover = pathinfo($_FILES['npro_FileCover']['name'], PATHINFO_EXTENSION);
      $File_detail = pathinfo($_FILES['npro_FileDetail']['name'], PATHINFO_EXTENSION);

      if (  !in_array($File_cover,$allowed)  &&  !in_array($File_detail,$allowed) ) {
        ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          ประเภทไฟล์ไม่ถูกต้อง ยอมรับเฉพาะไฟล์  JPG และ PNG เท่านั้น.
          <br>File Cover : <?=$_FILES['npro_FileCover']['type'];?>
          <br>File Detail : <?=$_FILES['npro_FileDetail']['type'];?>
        </div>
        <?
      }else {
        $temcover  = explode(".", $_FILES["npro_FileCover"]["name"]);
        $temdetail = explode(".", $_FILES["npro_FileDetail"]["name"]);

        $NewFile_cover    = "cover_".date("Ymd_his").".".end($temcover);
        $NewFile_detail   = "detail_".date("Ymd_his").".".end($temdetail);

        $Direct =  "file/promotion/";
        if ( move_uploaded_file($_FILES["npro_FileCover"]["tmp_name"], $Direct.$NewFile_cover) &&
             move_uploaded_file($_FILES["npro_FileDetail"]["tmp_name"], $Direct.$NewFile_detail) ) {
            $sql = "INSERT INTO z_promotion
                      VALUES(0,
                          '".$_POST['npro_NamePro']."',
                          '".$NewFile_cover."',
                          '".$NewFile_detail."',
                          '".$_POST['npro_ProGroup']."',
                          '".$_POST['npro_ProStatus']."',
                          '".$_POST['npro_ProBrand']."',
                          '".$_POST['npro_StartDate']."',
                          '".$_POST['npro_EndDate']."',
                          now(),
                          '".base64url_decode($_COOKIE[$CookieID])."'
                      );";
            if (insert_tbz($sql)==true) {
              ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                เพิ่มโปรโมชั่นสำเร็จ.
              </div>
              <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
              <?
            }else {
              ?>
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                ไม่สามารถเพิ่มโปรโมชั่นได้.
              </div>
              <?
            }
        }else {
          ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            ไม่สามารถอัพโหลดไฟล์ รูปได้.
            <br>ไฟล์รูปปก : <?=$Direct.$NewFile_cover;?>
            <br>ไฟล์รูปรายละเอียด  : <?=$Direct.$NewFile_detail;?>
          </div>
          <?
        }

      }
    }
}
?>
<link rel="stylesheet" href="<?=SITE_URL;?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
<script src="<?=SITE_URL;?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      //// check upload promotion
      $("#SubmitAddPromotion").click(function(event) {
        if (  $("#npro_NamePro").val() !=""  &&
              $("#npro_FileCover").val() !=""  &&
              $("#npro_FileDetail").val() !=""  &&
              $("#npro_StartDate").val() !=""  &&
              $("#npro_EndDate").val() !=""  &&
              $("#npro_ProStatus").val() !=""  &&
              $("#npro_ProGroup").val() !=""  &&
              $("#npro_ProBrand").val() !="" ) {
          return true;
        }else {
          $(".alert_popup").html("<div class='alert alert-warning alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <h4><i class='icon fa fa-warning'></i> Alert!</h4>   กรุณากรอกข้อมูลให้ครบถ้วน. </div>");
          return false;
        }
      });
  });
  $(function () {
    //Date picker
    $('#npro_StartDate').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd'
    });
    $('#npro_EndDate').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd'
    });
  })
</script>
<div class="alert_popup"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#new_promotion" data-toggle="tab">เพิ่มรายการโปรโมชั่น</a></li>
        <li><a href="#view_promotion_edit" data-toggle="tab">รายการโปรโมชั่น</a></li>
        <li><a href="#view_promotion" data-toggle="tab">ดูรายการโปรโมชั่น</a></li>
      </ul>
      <div class="tab-content">


        <div class="active tab-pane" id="new_promotion">
          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
              <form class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ชื่อรายการ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="npro_NamePro" name="npro_NamePro" placeholder="ชื่อรายการ">
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileupload" class="col-sm-2 control-label">รูปหน้าปก</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="npro_FileCover" name="npro_FileCover">
                    <small id="fileupload_cover" class="form-text text-muted">ขนาด 800x800 Pixel* (.jpg หรือ .png)</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileupload" class="col-sm-2 control-label">รูปรายละเอียด</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="npro_FileDetail" name="npro_FileDetail">
                    <small id="fileupload_detail" class="form-text text-muted">ขนาด 2048x2048 Pixel* (.jpg หรือ .png)</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">วันเริ่มแสดง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="npro_StartDate" id="npro_StartDate" placeholder="<?=date("Y/m/d");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">วันสิ้นสุด</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="npro_EndDate" id="npro_EndDate" placeholder="<?=date("Y/m/d");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileupload" class="col-sm-2 control-label">สถานะ</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="npro_ProStatus" name="npro_ProStatus">
                      <option value="">เลือกสถานะ</option>
                      <option value="1">เปิด</option>
                      <option value="0">ปิด</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileupload" class="col-sm-2 control-label">กลุ่ม</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="npro_ProGroup" name="npro_ProGroup">
                      <option value="">เลือกกลุ่มการแสดง</option>
                      <option value="P">Prosecure</option>
                      <option value="D">Dealer</option>
                      <option value="U">User</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">เลือกยี่ห้อ</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="npro_ProBrand" name="npro_ProBrand">
                      <option value="">เลือกยี่ห้อ</option>
                      <?
                        $sql = "SELECT * FROM name_brand WHERE (status_brand = 'Y') ORDER BY name_brand ASC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['ID_brand'];?>"><?=$row['name_brand'];?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger" id="SubmitAddPromotion" name="SubmitAddPromotion">เพิ่ม</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="tab-pane" id="view_promotion">
          <div class="row">
            <div class="col-xs-12">


              <!-- User -->
              <div class="col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <h4 style="margin:0px;">กลุ่มลูกค้าทั่วไป</h4>
                      <hr class="col-xs-12 hr" />
                      <?
                        $sql = "SELECT *
                                FROM z_promotion
                                WHERE ( pro_group = 'U' )
                                ORDER BY create_date DESC";
                        if (select_tbz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?>
                              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 _Click_" id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>" data-toggle="modal" data-target="#modal-promotion"  style="padding:0px;">
                                <a class="_ClickView col-xs-12">
                                  <div style="position: absolute;z-index: 9;right: 5px;top: 5px;">
                                    <?
                                      if ($row['pro_status']=="1") {
                                        ?><span class="label label-success">แสดง</span> <?
                                      }else {
                                        ?><span class="label label-danger">ไม่แสดง</span> <?
                                      }
                                    ?>
                                  </div>
                                  <img src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="col-xs-12" />
                                </a>
                              </div>
                            <?
                          }
                        }else {
                          ?>ไม่มีข้อมูล<?
                        }
                      ?>

                  </div>
                </div>
              </div>

              <div class="col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <h4 style="margin:0px;">กลุ่มตัวแทนจำหน่าย</h4>
                      <hr class="col-xs-12 hr" />
                      <?
                        $sql = "SELECT *
                                FROM z_promotion
                                WHERE ( pro_group = 'D' )
                                ORDER BY create_date DESC";
                        if (select_tbz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?>
                              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 _Click_" id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>"  data-toggle="modal" data-target="#modal-promotion"  style="padding:0px;">
                                <a class="_ClickView col-xs-12">
                                  <div style="position: absolute;z-index: 9;right: 5px;top: 5px;">
                                    <?
                                      if ($row['pro_status']=="1") {
                                        ?><span class="label label-success">แสดง</span> <?
                                      }else {
                                        ?><span class="label label-danger">ไม่แสดง</span> <?
                                      }
                                    ?>
                                  </div>
                                  <img src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="col-xs-12" />
                                </a>
                              </div>
                            <?
                          }
                        }else {
                          ?>ไม่มีข้อมูล<?
                        }
                      ?>


                  </div>
                </div>
              </div>

              <div class="col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <h4 style="margin:0px;">กลุ่มโปรซีเคียว</h4>
                      <hr class="col-xs-12 hr" />
                      <?
                        $sql = "SELECT *
                                FROM z_promotion
                                WHERE ( pro_group = 'P' )
                                ORDER BY create_date DESC";
                        if (select_tbz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?>
                              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 _Click_ " id="<?=SITE_URL;?>file/promotion/<?=$row['file_detail'];?>" data-toggle="modal" data-target="#modal-promotion"  style="padding:0px;">
                                <a class="_ClickView col-xs-12">
                                  <div style="position: absolute;z-index: 9;right: 5px;top: 5px;">
                                    <?
                                      if ($row['pro_status']=="1") {
                                        ?><span class="label label-success">แสดง</span> <?
                                      }else {
                                        ?><span class="label label-danger">ไม่แสดง</span> <?
                                      }
                                    ?>
                                  </div>
                                  <img src="<?=SITE_URL;?>file/promotion/<?=$row['file_cover'];?>" class="col-xs-12" />
                                </a>
                              </div>
                            <?
                          }
                        }else {
                          ?>ไม่มีข้อมูล<?
                        }
                      ?>


                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

        <div class="tab-pane" id="view_promotion_edit">
          <div class="row">
              <div class="col-xs-12">
                <div class="tabel-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">ลำดับ</th>
                        <th>ชื่อรายการ</th>
                        <th class="text-center">กลุ่มลูกค้า</th>
                        <th class="text-center">สถานะใช้งาน</th>
                        <th>วันเริ่ม-สิ้นสุด</th>
                        <th class="text-center">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                        $sql = "SELECT *
                                FROM z_promotion
                                ORDER BY create_date DESC ";
                        if (select_numz($sql)>0) { $i=1;
                          foreach (select_tbz($sql) as $row) {
                            ?>
                              <tr>
                                <td class="text-center"><?=($i++);?></td>
                                <td><?=$row['pro_name'];?></td>
                                <td class="text-center"><?
                                  if ($row['pro_group']=="P") {
                                    ?>กลุ่มโปรซีเคียว<?
                                  }elseif ($row['pro_group']=="D") {
                                    ?>กลุ่มตัวแทนจำหน่าย<?
                                  }else {
                                    ?>กลุ่มลูกค้าทั่วไป<?
                                  }
                                  ?></td>
                                <td class="text-center"><?=$row['pro_status']=="1"?"<i class='fas fa-toggle-on fa-2x' style='color:#060;''></i>":"<i class='fas fa-toggle-off fa-2x' style='color:#f00;''></i>";?></td>
                                <td>(<?=$row['str_date'].") - (".$row['end_date'];?>)</td>
                                <td class="text-center">
                                  <div class="btn-group" style="width: 117px;">
                                    <button id="<?=$row['promotion_id'];?>" data-toggle="modal" data-target="#modal-view" class="btn btn-default click_view_promotion"><i class="fa fa-search"></i></button>
                                    <button id="<?=$row['promotion_id'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit_promotion"><i class="fa fa-pencil"></i></button>
                                    <button id="<?=$row['promotion_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete_promotion" ><i class="fa fa-trash-o"></i></button>
                                  </div>
                                </td>
                              </tr>
                            <?
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>


<style media="screen">
  ._Click_{
      cursor: pointer;
      padding:0px;
  }
  ._Click_ a{
    display:block;
    padding:0px;
  }
  ._Click_ a img{
    padding:2px;
  }
  .hr{
    margin: 15px 0 15px 0;
  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $("._Click_").click(function(event) {
      $("._clickview_").attr("src",$(this).attr("id"));
    });
  });
</script>
<div class="modal fade" id="modal-promotion" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-search"></i> รายละเอียด โปรโมชั่น</h4>
      </div>

      <div class="modal-body" style="padding:0px;">
        <div class="row" style="margin:0px;">
          <div class="col-xs-12" style="padding:0px;">
            <img src="" class="col-xs-12 _clickview_" style="padding:0px;">
          </div>
        </div>
      </div>

    </div>
  </div>
</div>





<!-- view promotion -->
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_view_promotion").click(function(e) {
      $.post("../../new/jquery/others.php",
      {
        value : $(this).attr("id"),
        post  : "PromotionView"
      },
      function(d) {
        var i = d.split("|||");
        $("#vp_Name").val(i[0]);
        $("#vp_PhotoCover").attr("src",i[1]);
        $("#vp_PhotoDetail").attr("src",i[2]);
        $("#vp_ProGroup").val(i[3]);
        $("#vp_ProStatus").val(i[4]);
        $("#vp_ProBrand").val(i[5]);
        $("#vp_StartDate").val(i[6]);
        $("#vp_EndDate").val(i[7]);
        $("#vp_CreateDate").val(i[8]);
      });
    });

  });
</script>
<div class="modal fade" id="modal-view" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-search"></i> รายละเอียด โปรโมชั่น</h4>
      </div>

      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">

            <!-- Form -->
            <form class="form-horizontal" >
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">ชื่อรายการ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="vp_Name" id="vp_Name" value="" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">วันเริ่ม</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="vp_StartDate" id="vp_StartDate" value="" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">วันสิ้นสุด</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="vp_EndDate" id="vp_EndDate" value="" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="fileupload" class="col-sm-2 control-label">กลุ่ม</label>
                <div class="col-sm-10">
                  <select class="form-control" id="vp_ProGroup" name="vp_ProGroup" readonly>
                    <option value="">เลือกกลุ่มการแสดง</option>
                    <option value="P">Prosecure</option>
                    <option value="D">Dealer</option>
                    <option value="U">User</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">สถานะใช้งาน</label>
                <div class="col-sm-10">
                  <select class="form-control" id="vp_ProStatus" name="vp_ProStatus" readonly>
                    <option value="">เลือกสถานะ</option>
                    <option value="1">เปิด</option>
                    <option value="0">ปิด</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">เลือกยี่ห้อ</label>
                <div class="col-sm-10">
                  <select class="form-control" id="vp_ProBrand" name="vp_ProBrand" readonly>
                    <option value="">เลือกยี่ห้อ</option>
                    <?
                      $sql = "SELECT * FROM name_brand WHERE (status_brand = 'Y') ORDER BY name_brand ASC";
                      if (select_numz($sql)>0) {
                        foreach (select_tbz($sql) as $row) {
                          ?><option value="<?=$row['ID_brand'];?>"><?=$row['name_brand'];?></option><?
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">รูปภาพ</label>
                <div class="col-sm-10">
                  <img src="" class="col-xs-12 col-sm-6 vp_PhotoCover" id="vp_PhotoCover" style="padding:0px;border: 1px solid #ddd;"  />
                  <img src="" class="col-xs-12 col-sm-6 vp_PhotoDetail" id="vp_PhotoDetail" style="padding:0px;border: 1px solid #ddd;"  />
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">เพิ่มวันที่</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="vp_CreateDate" id="vp_CreateDate" readonly="" />
                </div>
              </div>
            </form>
            <!-- Form -->

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- view promotion -->


<!-- edit promotion -->
<script type="text/javascript">
  $(function () {
    //Date picker
    $('#ep_StartDate').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd'
    });
    $('#ep_EndDate').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd'
    });
  })
  $(document).ready(function() {

    $(".click_edit_promotion").click(function(e) {
      $(".ep_UpdatePromotion").attr("id",$(this).attr("id"));
      $.post("../../new/jquery/others.php",
      {
        value : $(this).attr("id"),
        post  : "PromotionView"
      },
      function(d) {
        var i = d.split("|||");
        $("#ep_Name").val(i[0]);
        $("#ep_PhotoCover").attr("src",i[1]);
        $("#ep_PhotoDetail").attr("src",i[2]);
        $("#ep_ProGroup").val(i[3]);
        $("#ep_ProStatus").val(i[4]);
        $("#ep_ProBrand").val(i[5]);
        $("#ep_StartDate").val(i[6]);
        $("#ep_EndDate").val(i[7]);
        $("#ep_CreateDate").val(i[8]);
      });
    });

    $(".ep_UpdatePromotion").click(function(e) {
      if ( $("#ep_Name").val() != "" &&
           $("#ep_ProGroup").val() != "" &&
           $("#ep_ProStatus").val() != "" &&
           $("#ep_ProBrand").val() != "" &&
           $("#ep_StartDate").val() != "" &&
           $("#ep_EndDate").val() != "" ) {

        $.post('../../new/jquery/others.php',
        {
          promoid  : $(this).attr("id"),
          promoname: $("#ep_Name").val(),
          progroup : $("#ep_ProGroup").val(),
          prostatus: $("#ep_ProStatus").val(),
          probrand : $("#ep_ProBrand").val(),
          prostart : $("#ep_StartDate").val(),
          proend   : $("#ep_EndDate").val(),
          post     : "PromotionUpdate"
        },
        function(d) {
          $(".alert_update_promotion").html(d);
          setTimeout(function(){
            window.location.href = "<?=$HostLinkAndPath;?>";
          },2000);
        });

      }else {

      }
    });




  });
</script>
<div class="modal fade" id="modal-edit" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-pencil"></i> แก้ไขรายละเอียด โปรโมชั่น</h4>
      </div>

      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">

            <!-- Form -->
            <form class="form-horizontal" >
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">ชื่อรายการ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ep_Name" id="ep_Name" value="" >
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">วันเริ่ม</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ep_StartDate" id="ep_StartDate" value="" >
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">วันสิ้นสุด</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ep_EndDate" id="ep_EndDate" value="" >
                </div>
              </div>
              <div class="form-group">
                <label for="fileupload" class="col-sm-2 control-label">กลุ่ม</label>
                <div class="col-sm-10">
                  <select class="form-control" id="ep_ProGroup" name="ep_ProGroup" >
                    <option value="">เลือกกลุ่มการแสดง</option>
                    <option value="P">Prosecure</option>
                    <option value="D">Dealer</option>
                    <option value="U">User</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">สถานะใช้งาน</label>
                <div class="col-sm-10">
                  <select class="form-control" id="ep_ProStatus" name="ep_ProStatus" >
                    <option value="">เลือกสถานะ</option>
                    <option value="1">เปิด</option>
                    <option value="0">ปิด</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">เลือกยี่ห้อ</label>
                <div class="col-sm-10">
                  <select class="form-control" id="ep_ProBrand" name="ep_ProBrand" >
                    <option value="">เลือกยี่ห้อ</option>
                    <?
                      $sql = "SELECT * FROM name_brand WHERE (status_brand = 'Y') ORDER BY name_brand ASC";
                      if (select_numz($sql)>0) {
                        foreach (select_tbz($sql) as $row) {
                          ?><option value="<?=$row['ID_brand'];?>"><?=$row['name_brand'];?></option><?
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">รูปภาพ</label>
                <div class="col-sm-10">
                  <img src="" class="col-xs-12 col-sm-6 ep_PhotoCover" id="ep_PhotoCover" style="padding:0px;border: 1px solid #ddd;"  />
                  <img src="" class="col-xs-12 col-sm-6 ep_PhotoDetail" id="ep_PhotoDetail" style="padding:0px;border: 1px solid #ddd;"  />
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">เพิ่มวันที่</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ep_CreateDate" id="ep_CreateDate" readonly />
                </div>
              </div>
            </form>
            <!-- Form -->

          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 alert_update_promotion">

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info ep_UpdatePromotion">บันทึก</button>
      </div>

    </div>
  </div>
</div>
<!-- edit promotion -->


<!-- delete promotion -->
<script>
  $(document).ready(function() {

      $(".click_delete_promotion").click(function(e) {
        $(".dp_DeletePromotion").attr("id", $(this).attr("id"));
      });
      //// check delete
      $(".dp_DeletePromotion").click(function(e) {
        $.post("../../new/jquery/others.php",
        {
          value : $(this).attr("id"),
          post : "PromotionDelete"
        },
        function(data) {
            $("#show_log_approve").html(data);
            setTimeout(function(){
              window.location.href = "<?=$HostLinkAndPath;?>";
            },2000);
        });
      });

  });
</script>
<div class="modal fade" id="modal-delete" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color: #f00;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash-o" style=" color: #FFF"></i> ลบข้อมูล</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" style="text-align: center; margin: 0;">
            <div class="control-label" id="show_log_approve" style="padding:25px 0;">ยืนยัน การลบข้อมูล</div>
          </div>
        </form>
      </div>
      <div class="modal-footer" style="background-color: white; text-align: center;">
        <button type="button" style="width: 48%;float:left;" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger dp_DeletePromotion">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- delete promotion -->
