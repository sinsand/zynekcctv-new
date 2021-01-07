<?
if (isset($_POST['SubmitAdd'])) {
    if (($_FILES["fileupload_1920"]["size"] > 2097152) && ($_FILES["fileupload_800"]["size"] > 2097152) ){
      ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        ไฟล์ใหญ่เกินไป ไฟล์ต้องมีขนาดไม่ถึง 2 เมกะไบต์.
      </div>
      <?
    }else {

      $allowed =  array('png','jpg');

      $File_s = pathinfo($_FILES['fileupload_800']['name'], PATHINFO_EXTENSION);
      $File_w = pathinfo($_FILES['fileupload_1920']['name'], PATHINFO_EXTENSION);

      if (   !in_array($File_w,$allowed) && !in_array($File_s,$allowed)  ) {
        ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          ประเภทไฟล์ไม่ถูกต้อง ยอมรับเฉพาะไฟล์  JPG และ PNG เท่านั้น.
          <br>File 1920 : <?=$_FILES['fileupload_1920']['type'];?>
          <br>File 800 : <?=$_FILES['fileupload_800']['type'];?>
        </div>
        <?
      }else {
        $temw = explode(".", $_FILES["fileupload_1920"]["name"]);
        $tems = explode(".", $_FILES["fileupload_800"]["name"]);

        $NewFile_w   = "w_".date("s")."_".date("Ymd_his").".".end($temw);
        $NewFile_s   = "s_".date("s")."_".date("Ymd_his").".".end($tems);

        $Direct =  "file/slide/";
        if ( move_uploaded_file($_FILES["fileupload_1920"]["tmp_name"], $Direct.$NewFile_w) &&
             move_uploaded_file($_FILES["fileupload_800"]["tmp_name"], $Direct.$NewFile_s) ) {
            $NameLink = null;
            if ($_POST['NameLink']=="" || empty($_POST['NameLink'])) {
              $NameLink = "null";
            }else {
              $NameLink = "'".$_POST['NameLink']."'";
            }
            $sql = "INSERT INTO z_slide
                      VALUES(0,
                          '".$_POST['NameDetail']."',
                          $NameLink,
                          '".$_POST['StartDate']."',
                          '".$_POST['EndDate']."',
                          '".$NewFile_w."',
                          '".$NewFile_s."',
                          '".$_POST['StatusOpen']."',
                          '".$_POST['OrderBy']."',
                          '".base64url_decode($_COOKIE[$CookieID])."'
                      );";
            if (insert_tbz($sql)==true) {
              ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                เพิ่มข้อมูลสำเร็จ.
              </div>
              <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
              <?
            }else {
              ?>
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                ไม่สามารถเพิ่มข้อมูลได้. <?=$message;?>
              </div>
              <?
            }
        }else {
          ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            ไม่สามารถอัพโหลดไฟล์ รูปได้.
            <br>ไฟล์รูป 1920 : <?=$Direct.$NewFile_w;?>
            <br>ไฟล์รูป 800  : <?=$Direct.$NewFile_s;?>
          </div>
          <?
        }

      }
    }
}
?>
<script src="<?=SITE_URL;?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
  $(document).ready(function() {

      //// check upload price
      $("#SubmitAdd").click(function(event) {
        if (  $("#NameDetail").val() !=""  &&
              $("#fileupload_1920").val() !=""  &&
              $("#fileupload_800").val() !=""  &&
              $("#StatusOpen").val() !=""  &&
              $("#StartDate").val() !=""  &&
              $("#EndDate").val() !=""  &&
              $("#OrderBy").val() !="" ) {
          return true;
        }else {
          $("#alert").html("<div class='alert alert-warning alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <h4><i class='icon fa fa-warning'></i> Alert!</h4>   กรุณากรอกข้อมูลให้ครบถ้วน. </div>");
          return false;
        }
      });




  });
  $(function () {
      //Date picker
      $('#StartDate').datepicker({
        autoclose: true,
        format: 'yyyy/mm/dd'
      });
      $('#EndDate').datepicker({
        autoclose: true,
        format: 'yyyy/mm/dd'
      });

      $('#es_StartDate').datepicker({
        autoclose: true,
        format: 'yyyy/mm/dd'
      });
      $('#es_EndDate').datepicker({
        autoclose: true,
        format: 'yyyy/mm/dd'
      });
  })
</script>

<div id="alert"></div>


<div class="row">
  <div class="col-sm-12 col-xs-12">


    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#new_slide" data-toggle="tab">เพิ่มแบนเนอร์สไลด์</a></li>
        <li><a href="#view_slide" data-toggle="tab">ดูแบนเนอร์สไลด์</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="new_slide">


          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
              <form class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ชื่อรายการ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="NameDetail" id="NameDetail" placeholder="ชื่อรายการ">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ลิ้งค์</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="NameLink" id="NameLink" placeholder="กรณีไม่มี ไม่ต้องใส่">
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileupload" class="col-sm-2 control-label">ภาพสไลด์แนวยาว</label>
                  <div class="col-sm-10">
                    <input type="file"  name="fileupload_1920" id="fileupload_1920">
                    <p class="help-block">Size 1920x523px (.jpg หรือ .png) <font color='#f00'>*</font></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileupload" class="col-sm-2 control-label">ภาพสไลด์แนวเหลี่ยม</label>
                  <div class="col-sm-10">
                    <input type="file" name="fileupload_800" id="fileupload_800">
                    <p class="help-block">Size 800x400px (.jpg หรือ .png) <font color='#f00'>*</font></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileupload" class="col-sm-2 control-label">สถานะ</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="StatusOpen" id="StatusOpen">
                      <option value="">สถานะ</option>
                      <option value="1">เปิด</option>
                      <option value="0">ปิด</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">วันเริ่มแสดง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="StartDate" id="StartDate" placeholder="<?=date("Y/m/d");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">วันสิ้นสุด</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="EndDate" id="EndDate" placeholder="<?=date("Y/m/d");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">ลำดับ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="OrderBy" id="OrderBy" placeholder="ลำดับ">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="SubmitAdd" id="SubmitAdd" class="btn btn-danger">เพิ่ม</button>
                  </div>
                </div>
              </form>
            </div>
          </div>


        </div>
        <div class="tab-pane" id="view_slide">
          <div class="row">
            <div class="col-xs-12">

              <div class="table-responsive">
                  <table class="table table-striped table-hover ">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อรายการ</th>
                        <th>ลิ้งรูป (w)</th>
                        <th>ลิ้งรูป (s)</th>
                        <th>ลำดับ</th>
                        <th>สถานะ</th>
                        <th>วันเริ่ม</th>
                        <th>วันสิ้นสุด</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                        $sql = "SELECT *
                                FROM z_slide
                                ORDER BY order_by ASC;";
                        if (select_numz($sql)>0) { $i=1;
                          foreach (select_tbz($sql) as $row) {
                            ?>
                              <tr>
                                <td><?=$i;?></td>
                                <td><?=$row['name_slide'];?></td>
                                <td><a href="<?=SITE_URL."file/slide/".$row['file_w'];?>" target="_blank">view</a></td>
                                <td><a href="<?=SITE_URL."file/slide/".$row['file_s'];?>" target="_blank">view</a></td>
                                <td><?=$row['order_by'];?></td>
                                <td><?=$row['status_open']=='1'?"<i class='fa fa-toggle-on fa-2x' aria-hidden='true' style='color:#060;'></i>":"<i class='fa fa-toggle-off fa-2x' aria-hidden='true' style='color:#f00;'></i>";?></td>
                                <td><?=$row['str_date'];?></td>
                                <td><?=$row['end_date'];?></td>
                                <td class="text-center">
                                  <div class="btn-group" style="width: 117px;">
                                    <button id="<?=$row['slide_id'];?>" data-toggle="modal" data-target="#modal-view" class="btn btn-default click_view"><i class="fa fa-search"></i></button>
                                    <button id="<?=$row['slide_id'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit"><i class="fa fa-pencil"></i></button>
                                    <button id="<?=$row['slide_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete" ><i class="fa fa-trash-o"></i></button>
                                  </div>
                                </td>
                              </tr>
                            <? $i++;
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





<!-- Edit Status Slide -->
<div class="modal fade" id="modal-edit" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-search"></i> แบนเนอร์สไลด์</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
            <form class="form-horizontal" >
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">ชื่อรายการ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="es_NameDetail" id="es_NameDetail" value="" >
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">วันเริ่ม</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="es_StartDate" id="es_StartDate" value="" >
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">วันสิ้นสุด</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="es_EndDate" id="es_EndDate" value="" >
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">ลิ้งค์ข้อมูล</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="es_LinkData" id="es_LinkData" placeholder="ใส่ตั้งแต่ http://" >
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">สถานะใช้งาน</label>
                <div class="col-sm-10">
                  <select class="form-control" name="es_Status" id="es_Status">
                    <option value="">เลือกสถานะใช้งาน</option>
                    <option value="1">เปิดใช้งาน</option>
                    <option value="0">ปิดใช้งาน</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">แสดงลำดับ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="es_OrderBy" id="es_OrderBy" value="" >
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">รูปแนวยาว</label>
                <div class="col-sm-10">
                  <img src="" class="col-xs-12 es_PhotoW" id="es_PhotoW" style="padding:0px;border: 1px solid #ddd;"  />
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">รูปสี่เหลี่ยม</label>
                <div class="col-sm-10">
                  <img src="" class="col-xs-12 es_PhotoS" id="es_PhotoS" style="padding:0px;border: 1px solid #ddd;"  />
                </div>
              </div>
            </form>
            <div class="alert_modal"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-info ev_SubmitUpdate">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {


    /// view and edit slide
    $(".click_edit").click(function(event) {
      $(".ev_SubmitUpdate").attr("id", $(this).attr("id"))
      $.post("../../new/jquery/others.php",
      {
        value : $(this).attr("id"),
        post  : "ViewSlide"
      },
      function(data) {
        var i = data.split("|||");
        $("#es_NameDetail").val(i[0]);
        $("#es_StartDate").val(i[1]);
        $("#es_EndDate").val(i[2]);
        $("#es_PhotoW").attr('src',i[3]);
        $("#es_PhotoS").attr('src',i[4]);
        $("#es_LinkData").val(i[5]);
        $("#es_OrderBy").val(i[6]);
        $("#es_Status").val(i[7]);
      });
    });

    /// update slide
    $(".ev_SubmitUpdate").click(function(event) {
      if (  $("#es_NameDetail").val() != "" &&
            $("#es_StartDate").val() != "" &&
            $("#es_EndDate").val() != "" &&
            $("#es_Status").val() != "" &&
            $("#es_OrderBy").val() != "") {

        $.post("../../new/jquery/others.php",
        {
          slideid   : $(this).attr("id"),
          nameslide : $("#es_NameDetail").val(),
          linkhost  : $("#es_LinkData").val(),
          strdate   : $("#es_StartDate").val(),
          enddate   : $("#es_EndDate").val(),
          statusopen: $("#es_Status").val(),
          orderby   : $("#es_OrderBy").val(),
          post  : "UpdateSlide"
        },
        function(data) {
          $(".alert_modal").html(data);
          setTimeout(function(){
            window.location.href = "<?=$HostLinkAndPath;?>";
          },1000);
        });
      }else {
        $(".alert_modal").html("<div class='alert alert-warning alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <h4><i class='icon fa fa-warning'></i> Alert!</h4>   กรุณากรอกข้อมูลให้ครบถ้วน. </div>");
      }
    });


  });
</script>
<!-- Edit Status Slide -->


<!-- View Slide -->
<div class="modal fade" id="modal-view" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-search"></i> แบนเนอร์สไลด์</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
            <form class="form-horizontal" >
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">ชื่อรายการ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="vs_NameDetail" id="vs_NameDetail" value="" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">วันเริ่ม</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="vs_StartDate" id="vs_StartDate" value="" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">วันสิ้นสุด</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="vs_EndDate" id="vs_EndDate" value="" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">ลิ้งค์ข้อมูล</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="vs_LinkData" id="vs_LinkData" value="" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">รูปแนวยาว</label>
                <div class="col-sm-10">
                  <img src="" class="col-xs-12 vs_PhotoW" id="vs_PhotoW" style="padding:0px;border: 1px solid #ddd;"  />
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">รูปสี่เหลี่ยม</label>
                <div class="col-sm-10">
                  <img src="" class="col-xs-12 vs_PhotoS" id="vs_PhotoS" style="padding:0px;border: 1px solid #ddd;"  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_view").click(function(event) {
      $.post("../../new/jquery/others.php",
      {
        value : $(this).attr("id"),
        post  : "ViewSlide"
      },
      function(data) {
        var i = data.split("|||");
        $("#vs_NameDetail").val(i[0]);
        $("#vs_StartDate").val(i[1]);
        $("#vs_EndDate").val(i[2]);
        $("#vs_PhotoW").attr('src',i[3]);
        $("#vs_PhotoS").attr('src',i[4]);
        $("#vs_LinkData").val(i[5]);
      });
    });

  });
</script>
<!-- View Slide -->



<!-- Delete Slide   -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
        <button type="button" style="width: 48%;float:left;" class="btn btn-default" data-dismiss="modal" id="">ยกเลิก</button>
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger delete_slide" id="">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {

      $(".click_delete").click(function(e) {
        $(".delete_slide").attr("id", $(this).attr("id"));
      });
      //// check delete upload price
      $(".delete_slide").click(function(e) {
        $.post("../../new/jquery/others.php",
        {
          value : $(this).attr("id"),
          post : "DeleteUploadSlide"
        },
        function(data) {
            $("#alert").html(data);
            setTimeout(function(){
              window.location.href = "<?=$HostLinkAndPath;?>";
            },1000);
        });
      });

  });
</script>
<!-- end  Delete Slide  -->
