<?
if (isset($_POST["SubmitUploadStructure"])) {
  $allowed =  array('pdf');
  $File = pathinfo($_FILES['ap_StructureUpload']['name'], PATHINFO_EXTENSION);
  if (  !in_array($File,$allowed)  ) {
    ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ประเภทไฟล์ไม่ถูกต้อง ยอมรับเฉพาะไฟล์  pdf เท่านั้น.
      <br>File  : <?=$_FILES['ap_StructureUpload']['type'];?>
    </div>
    <?
  }else {

    $tem = explode(".", $_FILES["ap_StructureUpload"]["name"]);
    $NewFile   = "Price_".date("Ymd_his").".".end($tem);
    $Direct =  "file/price/";
    if (  move_uploaded_file($_FILES["ap_StructureUpload"]["tmp_name"], $Direct.$NewFile)   ) {

        $sql = "INSERT INTO z_structure_price
                  VALUES(0,
                      '".$_POST['ap_StructureName']."',
                      '".$_POST['ap_StructureDetail']."',
                      '".$_POST['ap_StructureGroup']."',
                      '".$NewFile."',
                      '".$_POST['ap_StatusStructure']."',
                      now(),
                      '".base64url_decode($_COOKIE[$CookieID])."'
                  );";
        if (insert_tbz($sql)==true) {
          ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            อัพโหลดข้อมูลโครงสร้างราคา สำเร็จ.
          </div>
          <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
          <?
        }else {
          ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            ไม่สามารถ อัพโหลดข้อมูลโครงสร้างราคา ได้.
          </div>
          <?
        }
    }else {
      ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        ไม่สามารถ อัพโหลดข้อมูลโครงสร้างราคา รูปได้.
        <br>ไฟล์รูป 1920 : <?=$NewFile;?>
      </div>
      <?
    }
  }
}
?>

<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#manage_structure_add" data-toggle="tab"><i class="fa fa-cog" aria-hidden="true" style="color:orange;"></i> อัพโหลดโครงสร้างราคาใหม่</a></li>
        <li><a href="#manage_structure_view" data-toggle="tab"><i class="fa fa-cog" aria-hidden="true" style="color:orange;"></i> รายการโครงสร้างราคาใหม่</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="manage_structure_add">

          <!-- เพิ่มไฟล์ราคา โครงสร้างใหม่ -->
          <div class="row">
            <div class="col-xs-12" style="padding:20px 15px;">
              <form class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-6 col-lg-6">

                  <div class="form-group">
                    <label for="" class="col-md-3 control-label">ชื่อรายการ :</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" id="ap_StructureName" name="ap_StructureName" placeholder="ชื่อรายการโครงสร้าง "/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-md-3 control-label">รายละเอียด  :</label>
                    <div class="col-md-9">
                      <textarea class="form-control" rows="5" id="ap_StructureDetail" name="ap_StructureDetail" placeholder="รายละเอียด"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-md-3 control-label">กลุ่มลูกค้า</label>
                    <div class="col-md-9">
                      <select class="form-control" name="ap_StructureGroup" id="ap_StructureGroup">
                        <option value="">เลือกกลุ่มลูกค้า</option>
                        <option value="2">ตัวแทนจำหน่าย</option>
                        <option value="1">โปรซีเคียว</option>
                      </select>
                    </div>
                  </div><div class="form-group">
                    <label for="" class="col-md-3 control-label">ไฟล์อัพโหลด * :</label>
                    <div class="col-md-9">
                      <input type="file" class="form-control" id="ap_StructureUpload" name="ap_StructureUpload"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-md-3 control-label">สถานะ :</label>
                    <div class="col-md-9">
                      <select class="form-control" id="ap_StatusStructure" name="ap_StatusStructure">
                        <option value="">เลือกสถานะการใช้งาน</option>
                        <option value="1">เปิดใช้งาน</option>
                        <option value="0">ปิดใช้งาน</option>
                      </select>
                    </div>
                  </div>

                </div>
                <div class="col-xs-12">
                    <button type="submit" name="SubmitUploadStructure" id="SubmitUploadStructure" class="btn btn-info ">เพิ่มข้อมูล</button>
                  </div>
              </form>
            </div>
          </div>
          <!-- เพิ่มไฟล์ราคา โครงสร้างใหม่ -->

        </div>
        <div class="tab-pane" id="manage_structure_view">

          <!-- รายการไฟล์ราคา โครงสร้างใหม่ -->
          <div class="row">
            <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;">
              <div class="col-xs-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="กรอกข้อมูลค้นหา รุ่นสินค้า" id="SearchView">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default">ค้นหา</button>
                    </span>
                </div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="table-responsive">

                  <table class="table table-striped table-hover TablePrice">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อรายการ</th>
                        <th>รายละเอียด</th>
                        <th class="text-center">ประเภทกลุ่มลูกค้า</th>
                        <th class="text-center">ลิ้งดาวโหลดไฟล์</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                        $sql = "SELECT *
                                FROM z_structure_price
                                ORDER BY create_date DESC";
                        if (select_numz($sql)>0) { $i=1;
                          foreach (select_tbz($sql) as $row) {
                            ?>
                              <tr>
                                <td><?=$i;?></td>
                                <td><?=$row['price_name'];?></td>
                                <td><?=$row['price_detail'];?></td>
                                <td class="text-center"><?=$row['type_group']=="1"?"<span class='label label-danger'>โปรซีเคียว</span>":"<span class='label label-success'>ตัวแทนจำหน่าย</span>";?></td>
                                <td class="text-center"><a class="btn btn-default btn-xs" href="<?=SITE_URL."file/price/".$row['link_file'];?>" target="_blank">ดูรายการ</a></td>
                                <td class="text-center"><?=$row['file_status']!="1"?"<span class='label label-danger'>ปิด</span>":"<span class='label label-success'>เปิด</span>";?></td>
                                <td class="text-center">
                                  <div class="btn-group" style="width: 100px;">
                                    <!--<button id="<?=$row['file_id'];?>" data-toggle="modal" data-target="#modal-view" class="btn btn-default click_view_price_upload"><i class="fa fa-search"></i></button>-->
                                    <button id="<?=$row['file_id'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit_price_upload"><i class="fa fa-pencil"></i></button>
                                    <button id="<?=$row['file_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete_price_upload"><i class="fa fa-trash-o"></i></button>
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
          <!-- รายการไฟล์ราคา โครงสร้างใหม่ -->

        </div>
      </div>
    </div>
  </div>
</div>





<!-- edit Structure Price -->
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_edit_price_upload").click(function(e) {
      $(".ep_UpdatePriceUpload").attr("id",$(this).attr("id"));
      $.post("../../new/jquery/others.php",
      {
        value : $(this).attr("id"),
        post  : "StructurePriceUploadView"
      },
      function(d) {
        var i = d.split("|||");
        $("#ep_StructureName").val(i[0]);
        $("#ep_StructureDetail").val(i[1]);
        $("#ep_StructureGroup").val(i[2]);
        $("#ep_StatusStructure").val(i[3]);
      });
    });

    $(".ep_UpdatePriceUpload").click(function(e) {
      if ( $("#ep_StructureName").val() != "" &&
           $("#ep_StructureDetail").val() != "" &&
           $("#ep_StructureGroup").val() != "" &&
           $("#ep_StatusStructure").val() != "" ) {

        $.post('../../new/jquery/others.php',
        {
          fileid   : $(this).attr("id"),
          filename : $("#ep_StructureName").val(),
          filedetail: $("#ep_StructureDetail").val(),
          filegroup: $("#ep_StructureGroup").val(),
          filestatus: $("#ep_StatusStructure").val(),
          post     : "StructurePriceUploadUpdate"
        },
        function(d) {
          $(".alert_update_price_upload").html(d);
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
        <h4 class="modal-title"><i class="fa fa-pencil"></i> แก้ไขรายละเอียดโครงสร้างราคา</h4>
      </div>

      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">

            <!-- Form -->
            <form class="form-horizontal">
              <div class="form-group">
                <label for="" class="col-md-3 control-label">ชื่อรายการ :</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" id="ep_StructureName" name="ep_StructureName" placeholder="ชื่อรายการโครงสร้าง "/>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-md-3 control-label">รายละเอียด  :</label>
                <div class="col-md-9">
                  <textarea class="form-control" rows="5" id="ep_StructureDetail" name="ep_StructureDetail" placeholder="รายละเอียด"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-md-3 control-label">กลุ่มลูกค้า</label>
                <div class="col-md-9">
                  <select class="form-control" name="ep_StructureGroup" id="ep_StructureGroup">
                    <option value="">เลือกกลุ่มลูกค้า</option>
                    <option value="2">ตัวแทนจำหน่าย</option>
                    <option value="1">โปรซีเคียว</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-md-3 control-label">สถานะ :</label>
                <div class="col-md-9">
                  <select class="form-control" id="ep_StatusStructure" name="ep_StatusStructure">
                    <option value="">เลือกสถานะการใช้งาน</option>
                    <option value="1">เปิดใช้งาน</option>
                    <option value="0">ปิดใช้งาน</option>
                  </select>
                </div>
              </div>
            </form>
            <!-- Form -->

          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 alert_update_price_upload">

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info ep_UpdatePriceUpload">บันทึก</button>
      </div>

    </div>
  </div>
</div>
<!-- edit Structure Price -->



<!-- delete Structure Price -->
<script>
  $(document).ready(function() {

      $(".click_delete_price_upload").click(function(e) {
        $(".dp_DeleteStructurePrice").attr("id", $(this).attr("id"));
      });
      //// check delete
      $(".dp_DeleteStructurePrice").click(function(e) {
        $.post("../../new/jquery/others.php",
        {
          value : $(this).attr("id"),
          post : "StructurePriceUploadDelete"
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
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger dp_DeleteStructurePrice">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- delete Structure Price -->
