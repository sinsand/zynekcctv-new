
<?
  $sqlll = "SELECT * FROM admin WHERE (ID_admin = '".base64url_decode($_COOKIE[$CookieID])."' AND ID_admin IN ( SELECT approve_id FROM z_hr_permission_prove  )) ";
  if (select_numz($sqlll)>0) {
  ?>
    <div class="row">

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-log-out"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">ค้างอนุมัติ (ทีม)<small></small></span>
            <span class="info-box-number">
              <?
                $sqll = " SELECT *
                          FROM z_hr_leave zhl
                          INNER JOIN z_hr_permission_prove zhr ON (zhl.admin_id = zhr.admin_id)
                          INNER JOIN admin a ON ( zhr.admin_id = a.ID_admin )
                          WHERE ( zhl.status_leave = '0' AND
                                  zhr.approve_id = '".base64url_decode($_COOKIE[$CookieID])."' AND
                                  zhl.admin_id IN ( SELECT admin_id FROM z_hr_permission_prove  )
                                )
                          ORDER BY zhl.leave_id DESC;";
                echo number_format(select_numz($sqll));
              ?>
            </span>
          </div>
        </div>
      </div>

    </div>
  <?
 }
?>



<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-log-out"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">จำนวนการลา (ครั้ง) <small></small></span>
        <span class="info-box-number">
          <?
            $sqll2 = "SELECT *
                    FROM z_hr_leave zhl
                    INNER JOIN z_hr_type_leave zhtl ON ( zhl.type_leave_id = zhtl.type_leave_id )
                    INNER JOIN admin a ON ( zhl.admin_id = a.ID_admin )
                    WHERE ( zhl.status_leave != '0' AND
                            zhl.status_leave = '1' AND
                            zhl.admin_id = '".base64url_decode($_COOKIE[$CookieID])."' AND
                            (  ( DATE_FORMAT(zhl.str_date,'%Y') BETWEEN '".date("Y")."' AND '".date("Y")."' ) AND
                               ( DATE_FORMAT(zhl.end_date,'%Y') BETWEEN '".date("Y")."' AND '".date("Y")."' )
                            )
                          )
                    ORDER BY zhl.leave_id DESC;";
            echo number_format(select_numz($sqll2));
          ?>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-log-out"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">ลาป่วย (ครั้ง)<small></small></span>
        <span class="info-box-number">
          <?
            $sqll2 = "SELECT *
                    FROM z_hr_leave zhl
                    INNER JOIN z_hr_type_leave zhtl ON ( zhl.type_leave_id = zhtl.type_leave_id )
                    INNER JOIN admin a ON ( zhl.admin_id = a.ID_admin )
                    WHERE ( zhl.status_leave != '0' AND
                            zhl.type_leave_id = '3' AND
                            zhl.status_leave = '1' AND
                            zhl.admin_id = '".base64url_decode($_COOKIE[$CookieID])."' AND
                            (  ( DATE_FORMAT(zhl.str_date,'%Y') BETWEEN '".date("Y")."' AND '".date("Y")."' ) AND
                               ( DATE_FORMAT(zhl.end_date,'%Y') BETWEEN '".date("Y")."' AND '".date("Y")."' )
                            )
                          )
                    ORDER BY zhl.leave_id DESC;";
            echo number_format(select_numz($sqll2));
          ?>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-log-out"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">ลากิจ (ครั้ง)<small></small></span>
        <span class="info-box-number">
          <?
            $sqll2 = "SELECT *
                    FROM z_hr_leave zhl
                    INNER JOIN z_hr_type_leave zhtl ON ( zhl.type_leave_id = zhtl.type_leave_id )
                    INNER JOIN admin a ON ( zhl.admin_id = a.ID_admin )
                    WHERE ( zhl.status_leave != '0' AND
                            zhl.type_leave_id = '1' AND
                            zhl.status_leave = '1' AND
                            zhl.admin_id = '".base64url_decode($_COOKIE[$CookieID])."' AND
                            (  ( DATE_FORMAT(zhl.str_date,'%Y') BETWEEN '".date("Y")."' AND '".date("Y")."' ) AND
                               ( DATE_FORMAT(zhl.end_date,'%Y') BETWEEN '".date("Y")."' AND '".date("Y")."' )
                            )
                          )
                    ORDER BY zhl.leave_id DESC;";
            echo number_format(select_numz($sqll2));
          ?>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-log-out"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">ลาพักร้อน (ครั้ง)<small></small></span>
        <span class="info-box-number">
          <?
            $sqll2 = "SELECT *
                    FROM z_hr_leave zhl
                    INNER JOIN z_hr_type_leave zhtl ON ( zhl.type_leave_id = zhtl.type_leave_id )
                    INNER JOIN admin a ON ( zhl.admin_id = a.ID_admin )
                    WHERE ( zhl.status_leave != '0' AND
                            zhl.type_leave_id = '2' AND
                            zhl.status_leave = '1' AND
                            zhl.admin_id = '".base64url_decode($_COOKIE[$CookieID])."' AND
                            (  ( DATE_FORMAT(zhl.str_date,'%Y') BETWEEN '".date("Y")."' AND '".date("Y")."' ) AND
                               ( DATE_FORMAT(zhl.end_date,'%Y') BETWEEN '".date("Y")."' AND '".date("Y")."' )
                            )
                          )
                    ORDER BY zhl.leave_id DESC;";
            echo number_format(select_numz($sqll2));
          ?>
        </span>
      </div>
    </div>
  </div>
</div>

<?
if (isset($_POST['SubmitAddLeave'])) {
  $NewFile = '-';
  if ($_FILES['ah_fileRefer']['name'] !='' ){
    $allowed =  array('png','jpg','pdf');
    $File = pathinfo($_FILES['ah_fileRefer']['name'], PATHINFO_EXTENSION);
    if (!in_array($File,$allowed)) {
      ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        ประเภทไฟล์ไม่ถูกต้อง ยอมรับเฉพาะไฟล์  JPG,PNG และ PDF เท่านั้น.
        <br>File  : <?=$_FILES['ah_fileRefer']['type'];?>
      </div>
      <?
    }else {
      $tem = explode(".", $_FILES["ah_fileRefer"]["name"]);
      $NewFile   = "filerefer_".date("Ymd_his").".".end($tem);
      $Direct =  "file/hr/";
      if ( move_uploaded_file($_FILES["ah_fileRefer"]["tmp_name"], $Direct.$NewFile) ) {
        ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            เพิ่มไฟล์แนบการลาสำเร็จ.
          </div>
        <?
      }
    }
  }

  $sql = "INSERT INTO z_hr_leave
              VALUES(0,
                '".$_POST['ah_TypeLeave']."',
                '".base64url_decode($_COOKIE[$CookieID])."',
                0,
                '".$_POST['ah_StartDate']."',
                '".$_POST['ah_EndDate']."',
                '".$_POST['ah_StartTime']."',
                '".$_POST['ah_EndTime']."',
                '".$_POST['ah_AmountLeave']."',
                '".$_POST['ah_Detail']."',
                '".$NewFile."',
                0,
                '',
                0,
                now()
              );";
  if (insert_tbz($sql)==true) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      เพิ่มข้อมูลการลาสำเร็จ.
    </div>
    <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถเพิ่มข้อมูลการลาได้.
    </div>
    <?
  }
}
?>


<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li><a href="#new_leave" data-toggle="tab">ลางาน</a></li>
        <li class="active"><a href="#view_leave" data-toggle="tab">ดูวันลางานทั้งหมด</a></li>
        <li><a href="#calendar_view" data-toggle="tab">ปฎิทินการลา</a></li>
        <?
          $sql_hr_check  ="SELECT * FROM admin WHERE (ID_admin = '".base64url_decode($_COOKIE[$CookieID])."' AND ID_admin IN ( SELECT approve_id FROM z_hr_permission_prove  ))";
          if (select_numz($sql_hr_check)>0) {
            ?>
            <li><a href="#setApprove_leave" data-toggle="tab"><i class="fa fa-fw fa-cog"></i> อนุมัติวันลา</a></li>
            <li><a href="#view_permission_approve" data-toggle="tab">สิทธิ์อนุมัติการลา</a></li>
            <?
          }
        ?>
      </ul>
      <div class="tab-content">
        <div class="tab-pane" id="new_leave">


          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
              <form class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">ประเภทการลางาน</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="ah_TypeLeave" id="ah_TypeLeave">
                      <option value="">เลือกประเภทการลา</option>
                      <?
                        $sql = "SELECT *
                                FROM z_hr_type_leave
                                ORDER BY type_leave_name ASC;";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['type_leave_id'];?>"><?=$row['type_leave_name'];?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">การลางาน</label>
                  <div class="col-sm-9">
                    <div class="radio">
                      <label> <input type="radio" name="LeaveDay" id="" value="A" class="CheckLeave"> ลาเต็มวัน</label>
                    </div>
                    <div class="radio">
                      <label> <input type="radio" name="LeaveDay" id="" value="H" class="CheckLeave"> ลาครั่งวัน</label>
                      <div class="panel panel-default leavetypeck_">
                        <div class="radio">
                          <label> <input type="radio" name="LeaveDay_" id="" value="D" class="CheckLeave_"> ลาช่วงเช้า</label>
                        </div>
                        <div class="radio">
                          <label> <input type="radio" name="LeaveDay_" id="" value="B" class="CheckLeave_"> ลาช่วงบ่าย</label>
                        </div>
                      </div>

                      <link rel="stylesheet" href="<?=SITE_URL;?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
                      <script src="<?=SITE_URL;?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

                      <link rel="stylesheet" href="<?=SITE_URL;?>plugins/timepicker/bootstrap-timepicker.min.css">
                      <script src="<?=SITE_URL;?>plugins/timepicker/bootstrap-timepicker.min.js"></script>

                      <script type="text/javascript">
                        $(document).ready(function() {
                          $(".CheckLeave").click(function(event) {
                            if ($(this).is(":Checked") && $(this).val() =="H") {
                              $(".leavetypeck_").attr('style', 'display:block;');
                            }else {
                              $(".leavetypeck_").attr('style', 'display:none;');
                            }

                            if ($(this).is(":Checked") && $(this).val() =="A") {
                              //$("#ah_EndDate").addClass('disabled');
                              //$("#ah_EndDate").attr('disabled', 'disabled');
                            }else {
                              //$("#ah_EndDate").removeClass('disabled');
                              //$("#ah_EndDate").removeAttr('disabled');
                            }
                          });

                        });
                        $(function () {

                            //Date picker
                            $('#ah_StartDate').datepicker({
                              autoclose: true,
                              format: 'yyyy/mm/dd'
                            });
                            $('#ah_EndDate').datepicker({
                              autoclose: true,
                              format: 'yyyy/mm/dd'
                            });


                            //Timepicker
                            $('#ah_StartTime').timepicker({
                              showInputs: false,
                              showSeconds: false,
                              showMeridian: false,
                              defaultTime: false
                            });
                            $('#ah_EndTime').timepicker({
                              showInputs: false,
                              showSeconds: false,
                              showMeridian: false,
                              defaultTime: false
                            });
                        })
                      </script>
                      <style media="screen">
                        .leavetypeck_{padding:0 15px 15px 15px;margin:15px 0;display: none;}
                      </style>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">วันที่เริ่มลา</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="ah_StartDate" id="ah_StartDate" value="<?=date("Y/m/d");?>" placeholder="<?=date("Y/m/d");?>"  autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">วันที่สิ้นสุดลา</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="ah_EndDate" id="ah_EndDate" value="<?=date("Y/m/d");?>" placeholder="<?=date("Y/m/d");?>"  autocomplete="off">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="" class="col-sm-3 control-label">เวลาเริ่มลา</label>
                  <div class="col-sm-9 bootstrap-timepicker">
                    <input type="text" class="form-control timepicker" name="ah_StartTime" id="ah_StartTime" value="08:00" placeholder="08:00" autocomplete="off">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="" class="col-sm-3 control-label">เวลาสิ้นสุดลา</label>
                  <div class="col-sm-9 bootstrap-timepicker">
                    <input type="text" class="form-control timepicker" name="ah_EndTime" id="ah_EndTime" value="17:00" placeholder="08:00" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">จำนวนวันลา ทั้งสิ้น</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="ah_AmountLeave" id="ah_AmountLeave" placeholder="เต็มวันใส่ 1 ,ไม่เต็มวันใส่ 0.5" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">เหตุผลการลา</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" placeholder="เหตุผลการลา" name="ah_Detail" id="ah_Detail"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">เอกสารอ้างอิง</label>
                  <div class="col-sm-9">
                    <input type="file" name="ah_fileRefer" id="ah_fileRefer">
                    <p class="help-block">เอกสารแนบ ยืนยัน (ถ้ามี)</p>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="SubmitAddLeave" id="SubmitAddLeave" class="btn btn-danger">ยืนยันการลา</button>
                  </div>
                </div>
              </form>
            </div>
          </div>


        </div>
        <div class="active tab-pane" id="view_leave">
          <div class="row">
            <div class="col-xs-12">

              <div class="table-responsive">
                  <table class="table table-striped table-hover ">
                    <thead>
                      <tr>
                        <th class="text-center">ลำดับ</th>
                        <th class="text-center">ประเภท</th>
                        <th class="text-center">วันลา</th>
                        <th class="text-center">เวลาลา</th>
                        <th class="text-center">เอกสารแนบ</th>
                        <th class="text-center">จำนวนวันลา</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-left">รายละเอียด</th>
                        <th class="text-center">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                        $sql = "SELECT *
                                FROM z_hr_leave zhl
                                INNER JOIN z_hr_type_leave zhtl ON ( zhl.type_leave_id = zhtl.type_leave_id )
                                WHERE ( zhl.admin_id = '".base64url_decode($_COOKIE[$CookieID])."' )
                                ORDER BY zhl.leave_id DESC;";
                        if (select_numz($sql)>0) { $i=1;
                          foreach (select_tbz($sql) as $row) {
                            ?>
                              <tr>
                                <td class="text-center"><?=$i;?></td>
                                <td class="text-center"><?=$row['type_leave_name'];?></td>
                                <td class="text-center">(<?=date_($row['str_date'])." - ".date_($row['end_date']);?>)</td>
                                <td class="text-center">(<?=substr($row['str_time'],0,5)." - ".substr($row['end_time'],0,5);?>)</td>
                                <td class="text-center"><?=$row['file_refer']==""||$row['file_refer']=="-"?"-":"<a href='".SITE_URL."file/hr/".$row['file_refer']."' target='_blank'>ดูไฟล์แนบ</a>";?></td>
                                <td class="text-center"><?=$row['amount_leave'];?></td>
                                <td class="text-center">
                                  <?
                                    if ($row['status_leave']=='0') {
                                      ?><span class='label label-warning'>รอการอนุมัติ</span><?
                                    }elseif ($row['status_leave']=='1') {
                                      ?><span class='label label-success'>อนุมัติ</span><?
                                    }else {
                                      ?><span class='label label-danger'>ไม่อนุมัติ</span><?
                                    }
                                  ?>
                                </td>
                                <td class="text-left"><?=$row['detail_leave'];?></td>
                                <td class="text-center">
                                  <div class="btn-group" style="<?=select_numz($sql_hr_check)>0?"width: 152px;":"width: 117px;";?>">
                                    <?
                                    if (select_numz($sql_hr_check)>0) {
                                      ?><button id="<?=$row['leave_id'];?>" data-toggle="modal" data-target="#modal-approve" class="btn btn-warning click_approve <?=check_hr_leave_disable($row['leave_id']);?>" <?=check_hr_leave_disable($row['leave_id']);?>><i class="fa fa-pencil-square-o"></i></button><?
                                    }
                                    ?>
                                    <button id="<?=$row['leave_id'];?>" data-toggle="modal" data-target="#modal-view" class="btn btn-default click_view"><i class="fa fa-search"></i></button>
                                    <button id="<?=$row['leave_id'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit <?=check_hr_leave_disable($row['leave_id']);?>" <?=check_hr_leave_disable($row['leave_id']);?>><i class="fa fa-pencil"></i></button>
                                    <button id="<?=$row['leave_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete <?=check_hr_leave_disable($row['leave_id']);?>" <?=check_hr_leave_disable($row['leave_id']);?> ><i class="fa fa-trash-o"></i></button>
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
        <?
          if (select_numz($sql_hr_check)>0) {
            ?>
            <div class="tab-pane" id="setApprove_leave">
              <div class="row">
                <div class="col-xs-12">

                  <div class="table-responsive">
                      <table class="table table-striped table-hover ">
                        <thead>
                          <tr>
                            <th class="text-center">ลำดับ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th class="text-center">ประเภท</th>
                            <th class="text-center">วันลา</th>
                            <th class="text-center">เวลาลา</th>
                            <th class="text-center">เอกสารแนบ</th>
                            <th class="text-center">จำนวนวันลา</th>
                            <th class="text-center">สถานะ</th>
                            <th class="text-left">รายละเอียด</th>
                            <th class="text-center">จัดการ</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?
                            $sql = "SELECT *
                                    FROM z_hr_leave zhl
                                    INNER JOIN z_hr_type_leave zhtl ON ( zhl.type_leave_id = zhtl.type_leave_id )
                                    INNER JOIN admin a ON ( zhl.admin_id = a.ID_admin )
                                    INNER JOIN z_hr_permission_prove zhr ON (zhr.approve_id = a.ID_admin)
                                    WHERE ( a.ID_admin = '".base64url_decode($_COOKIE[$CookieID])."' AND
                                            a.ID_admin IN ( SELECT approve_id FROM z_hr_permission_prove  )
                                          )
                                    GROUP BY zhl.leave_id
                                    ORDER BY zhl.leave_id DESC;";





                            $sql = "SELECT *
                                    FROM z_hr_leave zhl
                                    INNER JOIN z_hr_permission_prove zhr ON (zhl.admin_id = zhr.admin_id)
                                    INNER JOIN z_hr_type_leave zhtl ON (zhtl.type_leave_id = zhl.type_leave_id)
                                    INNER JOIN admin a ON ( zhl.admin_id = a.ID_admin )
                                    WHERE (
                                            ( zhl.admin_id IN ( SELECT admin_id FROM z_hr_permission_prove  ) ) AND
                                            zhr.approve_id = '".base64url_decode($_COOKIE[$CookieID])."'
                                          )

                                    GROUP BY zhl.leave_id
                                    ORDER BY zhl.leave_id DESC";


                            //echo $sql;
                            if (select_numz($sql)>0) { $i=1;
                              foreach (select_tbz($sql) as $row) {
                                ?>
                                  <tr>
                                    <td class="text-center"><?=$i;?></td>
                                    <td><?=$row['name_admin'];?></td>
                                    <td class="text-center"><?=$row['type_leave_name'];?></td>
                                    <td class="text-center">(<?=date_($row['str_date'])." - ".date_($row['end_date']);?>)</td>
                                    <td class="text-center">(<?=substr($row['str_time'],0,5)." - ".substr($row['end_time'],0,5);?>)</td>
                                    <td class="text-center"><?=$row['file_refer']==""?"-":"<a href='".SITE_URL."file/hr/".$row['file_refer']."' target='_blank'>ดูไฟล์แนบ</a>";?></td>
                                    <td class="text-center"><?=$row['amount_leave'];?></td>
                                    <td class="text-center">
                                      <?
                                        if ($row['status_leave']=='0') {
                                          ?><span class='label label-warning'>รอการอนุมัติ</span><?
                                        }elseif ($row['status_leave']=='1') {
                                          ?><span class='label label-success'>อนุมัติ</span><?
                                        }else {
                                          ?><span class='label label-danger'>ไม่อนุมัติ</span><?
                                        }
                                      ?>
                                    </td>
                                    <td class="text-left"><?=$row['detail_leave'];?></td>
                                    <td class="text-center">
                                      <div class="btn-group" style="width:80px;">
                                        <button id="<?=$row['leave_id'];?>" data-toggle="modal" data-target="#modal-approve" class="btn btn-warning click_approve  <?=check_hr_leave_disable($row['leave_id']);?>"  <?=check_hr_leave_disable($row['leave_id']);?>><i class="fa fa-pencil-square-o"></i></button>
                                        <button id="<?=$row['leave_id'];?>" data-toggle="modal" data-target="#modal-view" class="btn btn-default click_view"><i class="fa fa-search"></i></button>
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
            <div class="tab-pane" id="view_permission_approve">
              <div class="row">
                <div class="col-xs-12">
                  <div class="col-xs-12">

                  </div>
                  <div class="col-xs-12">
                    <div class="table-responsive">
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <th class="text-center">ลำดับ</th>
                            <th>ผู้อนุมัติ</th>
                            <th>ผู้ถูกอนุมัติ (วันที่เพิ่ม)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?
                            $sql = "SELECT MIN(ahpp.z_permission_id) as z_permission_id,a.name_admin,ahpp.approve_id,ag.name_status
                                    FROM z_hr_permission_prove ahpp
                                    INNER JOIN admin a ON (ahpp.approve_id = a.ID_admin)
                                    INNER JOIN admin_group ag ON (a.admin_status = ag.ID_admin_group)
                                    WHERE ( ahpp.approve_id = '".base64url_decode($_COOKIE[$CookieID])."')
                                    GROUP BY a.name_admin
                                    ORDER BY ahpp.create_date DESC;";
                            if (select_numz($sql)>0) { $i=1;
                              foreach (select_tbz($sql) as $row) {
                                ?>
                                <tr>
                                  <td class="text-center"><?=($i++);?></td>
                                  <td><?=$row['name_admin'];?><br>(<?=$row['name_status'];?>)</td>
                                  <td>
                                    <?
                                        $sqlin = "SELECT a.name_admin,ahpp.create_date,a.nickname
                                                  FROM z_hr_permission_prove ahpp
                                                  INNER JOIN admin a ON (ahpp.admin_id = a.ID_admin)
                                                  WHERE ahpp.approve_id = '".$row['approve_id']."' ;";
                                        if (select_numz($sqlin)>0) {
                                          ?><ul class="list-group"><?
                                          foreach (select_tbz($sqlin) as $rowin) {
                                            ?>
                                              <li class="list-group-item">
                                                <div class="row">
                                                  <div class="col-xs-12 col-sm-6"><?=$rowin['name_admin']." (".$rowin['nickname'].")";?></div>
                                                  <div class="col-xs-12 col-sm-6"><span class="label" style="float: right;background-color: #aeb7ca;color: #fff;"><?=$rowin['create_date'];?></span></div>
                                                </div>
                                              </li>
                                            <?
                                          }
                                          ?></ul><?
                                        }
                                    ?>
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
            <?
          }
        ?>
        <div class="tab-pane" id="calendar_view">
          <div class="row">
            <div class="col-xs-12">

              <!--- Calebdar -->
              <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.print.min.css" media='print'>
              <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.css">
              <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/moment.min.js"></script>
              <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.js"></script>

              <div id="ViewCalendar"></div>
              <style media="screen">
                .fc-day-grid-event{cursor: pointer;}
              </style>
              <script>
                $(document).ready(function() {

                  $('#ViewCalendar').fullCalendar({
                    header: {
                      left: 'prev,next today',
                      center: 'title',
                      right: 'month,agendaWeek'//,agendaDay,listWeek'
                    },
                    defaultDate: '<?=date("Y-m-d");?>',
                    navLinks: false, // can click day/week names to navigate views
                    editable: false,
                    eventLimit: true, // allow "more" link when too many events
                    events: [
                      <?


                        if (select_numz($sql_hr_check)>0) {
                          $sql = "SELECT a.name_admin,zhtl.type_leave_id,zhtl.type_leave_name,zhl.str_date,zhl.end_date,zhl.leave_id,zhl.str_time,zhl.end_time
                                  FROM z_hr_leave zhl
                                  INNER JOIN z_hr_permission_prove zhr ON (zhl.admin_id = zhr.admin_id)
                                  INNER JOIN z_hr_type_leave zhtl ON (zhtl.type_leave_id = zhl.type_leave_id)
                                  INNER JOIN admin a ON ( zhr.admin_id = a.ID_admin )
                                  WHERE (
                                          ( ( zhl.admin_id IN ( SELECT admin_id FROM z_hr_permission_prove  ) )  AND
                                            zhr.approve_id = '".base64url_decode($_COOKIE[$CookieID])."' AND
                                            zhl.status_leave = '1' AND
                                            zhl.admin_id IN ( SELECT admin_id FROM z_hr_permission_prove  )
                                          )
                                        )

                                  GROUP BY zhl.leave_id
                                  ORDER BY zhl.leave_id DESC";
                        }else {
                          $sql = "SELECT a.name_admin,zhtl.type_leave_id,zhtl.type_leave_name,zhl.str_date,zhl.end_date,zhl.leave_id,zhl.str_time,zhl.end_time
                                  FROM z_hr_leave zhl
                                  INNER JOIN z_hr_type_leave zhtl ON ( zhl.type_leave_id = zhtl.type_leave_id )
                                  INNER JOIN admin a ON ( zhl.admin_id = a.ID_admin )
                                  WHERE ( zhl.status_leave = '1' AND
                                          zhl.admin_id = '".base64url_decode($_COOKIE[$CookieID])."'
                                        )
                                  ORDER BY zhl.leave_id DESC;";
                        }







                        if (select_numz($sql)>0) { $i=0;
                          foreach (select_tbz($sql) as $row) {
                            $background = "";
                            if ($row['type_leave_id']=='1') {
                              $background = " backgroundColor: '#f39c12',borderColor    : '#f39c12' "; /// yellow
                            }
                            if ($row['type_leave_id']=='2') {
                              $background = " backgroundColor: '#00a65a',borderColor    : '#00a65a' "; /// green
                            }
                            if ($row['type_leave_id']=='3') {
                              $background = " backgroundColor: '#00c0ef',borderColor    : '#00c0ef'  "; /// blue
                            }
                            if ($row['type_leave_id']=='4') {
                              $background = " backgroundColor: '#f56954',borderColor    :'#f56954' "; /// red
                            }

                            if ($i==0) {
                              echo "{
                                      leaveid: '".$row['leave_id']."',
                                      title: '".nl2br($row['name_admin'])."',
                                      start: '".$row['str_date']."T".$row['str_time']."',
                                      end: '".$row['end_date']."T".$row['end_time']."',
                                      $background
                                    }";
                            }else {
                              echo ",{
                                      leaveid: '".$row['leave_id']."',
                                      title: '".nl2br($row['name_admin'])."',
                                      start: '".$row['str_date']."T".$row['str_time']."',
                                      end: '".$row['end_date']."T".$row['end_time']."',
                                      $background
                                    }";
                            }
                            $i++;
                          }
                        }
                      ?>
                    ],
                    eventClick: function(calEvent, jsEvent, view) {
                      $.post("../../new/jquery/others.php",
                      {
                        value : calEvent.leaveid,
                        post  : "LeaveView"
                      },
                      function(d) {
                        var i = d.split("|||");
                        $("#vh_TypeLeave").val(i[0]);
                        $("#vh_StartDate").val(i[1]);
                        $("#vh_EndDate").val(i[2]);
                        $("#vh_StartTime").val(i[3]);
                        $("#vh_EndTime").val(i[4]);
                        $("#vh_AmountLeave").val(i[5]);
                        $("#vh_Detail").val(i[6]);

                        if (i[7]=='1') {
                          $("#vh_LeaveProve").html("อนุมัติ");
                        }else {
                          $("#vh_LeaveProve").html("ไม่อนุมัติ");
                        }
                        $("#vh_RemarkDetail").val(i[8]);
                        if (i[9]!="#") {
                          $("#vh_Link").attr("href",i[9]);
                          $("#vh_Link").html("ดูไฟล์แนบ");
                        }else {
                          $("#vh_Link").html("");
                          $("#vh_Link").attr("href","#");
                        }
                        $("#vh_NameLeave").html(i[10]);
                      });
              				$('#modal-view').modal();
              			}
                  });

                });
              </script>
              <!--- Calendar -->

            </div>
          </div>
        </div>
      </div>
  </div>
</div>







<!-- view leave -->
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_view").click(function(e) {
      $.post("../../new/jquery/others.php",
      {
        value : $(this).attr("id"),
        post  : "LeaveView"
      },
      function(d) {
        var i = d.split("|||");
        $("#vh_TypeLeave").val(i[0]);
        $("#vh_StartDate").val(i[1]);
        $("#vh_EndDate").val(i[2]);
        $("#vh_StartTime").val(i[3]);
        $("#vh_EndTime").val(i[4]);
        $("#vh_AmountLeave").val(i[5]);
        $("#vh_Detail").val(i[6]);

        if (i[7]=='1') {
          $("#vh_LeaveProve").html("อนุมัติ");
        }else {
          $("#vh_LeaveProve").html("ไม่อนุมัติ");
        }
        $("#vh_RemarkDetail").val(i[8]);
        if (i[9]!="#") {
          $("#vh_Link").attr("href",i[9]);
          $("#vh_Link").html("ดูไฟล์แนบ");
        }else {
          $("#vh_Link").html("");
          $("#vh_Link").attr("href","#");
        }
        $("#vh_NameLeave").html(i[10]);
      });
    });

  });
</script>
<div class="modal fade" id="modal-view" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-search"></i> ดูการลางาน <span class="label label-primary" id="vh_NameLeave"></span></h4>
      </div>

      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">

            <!-- Form -->
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-3 control-label">ประเภทการลางาน</label>
                <div class="col-sm-9">
                  <select class="form-control" name="vh_TypeLeave" id="vh_TypeLeave" readonly>
                    <option value="">เลือกประเภทการลา</option>
                    <?
                      $sql = "SELECT *
                              FROM z_hr_type_leave
                              ORDER BY type_leave_name ASC;";
                      if (select_numz($sql)>0) {
                        foreach (select_tbz($sql) as $row) {
                          ?><option value="<?=$row['type_leave_id'];?>"><?=$row['type_leave_name'];?></option><?
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">วันที่เริ่มลา</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="vh_StartDate" id="vh_StartDate" placeholder="<?=date("Y/m/d");?>" autocomplete="off" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">วันที่สิ้นสุดลา</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="vh_EndDate" id="vh_EndDate" placeholder="<?=date("Y/m/d");?>" autocomplete="off" readonly>
                </div>
              </div>
              <div class="form-group ">
                <label for="" class="col-sm-3 control-label">เวลาเริ่มลา</label>
                <div class="col-sm-9 bootstrap-timepicker">
                  <input type="text" class="form-control timepicker" name="vh_StartTime" id="vh_StartTime" placeholder="<?=date("H:i");?>" autocomplete="off" readonly>
                </div>
              </div>
              <div class="form-group ">
                <label for="" class="col-sm-3 control-label">เวลาสิ้นสุดลา</label>
                <div class="col-sm-9 bootstrap-timepicker">
                  <input type="text" class="form-control timepicker" name="vh_EndTime" id="vh_EndTime" placeholder="<?=date("H:i");?>" autocomplete="off" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">จำนวนวันลา ทั้งสิ้น</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="vh_AmountLeave" id="vh_AmountLeave" autocomplete="off" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">เหตุผลการลา</label>
                <div class="col-sm-9">
                  <textarea class="form-control" placeholder="เหตุผลการลา" name="vh_Detail" id="vh_Detail" readonly></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">ไฟล์แนบ</label>
                <div class="col-sm-9">
                  <div class="form-control"><a href="#" target="_blank" class="vh_Link" id="vh_Link"></a></div>
                </div>
              </div>



              <hr class="col-xs-12" />
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">สถานะการอนุมัติ</label>
                <div class="col-sm-9">
                  <span id="vh_LeaveProve" class="form-control" readonly></span>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">หมายเหตุการอนุมัติ</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="vh_RemarkDetail" readonly></textarea>
                </div>
              </div>
            </form>
            <!-- Form -->

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info"  data-dismiss="modal">ปิด</button>
      </div>

    </div>
  </div>
</div>
<!-- view leave -->




<!-- edit leave -->
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_edit").click(function(e) {
      $(".SubmitUpdateLeave").attr("id",$(this).attr("id"));
      $.post("../../new/jquery/others.php",
      {
        value : $(this).attr("id"),
        post  : "LeaveView"
      },
      function(d) {
        var i = d.split("|||");
        $("#eh_TypeLeave").val(i[0]);
        $("#eh_StartDate").val(i[1]);
        $("#eh_EndDate").val(i[2]);
        $("#eh_StartTime").val(i[3]);
        $("#eh_EndTime").val(i[4]);
        $("#eh_AmountLeave").val(i[5]);
        $("#eh_Detail").val(i[6]);

      });
    });

    $(".SubmitUpdateLeave").click(function(e) {
      if ( $("#eh_TypeLeave").val() != "" &&
           $("#eh_StartDate").val() != "" &&
           $("#eh_EndDate").val() != "" &&
           $("#eh_StartTime").val() != "" &&
           $("#eh_EndTime").val() != "" &&
           $("#eh_AmountLeave").val() != "" &&
           $("#eh_Detail").val() != ""  ) {

         $.post('../../new/jquery/others.php',
         {
           leaveid   : $(this).attr("id"),
           typeleave : $("#eh_TypeLeave").val(),
           strdate   : $("#eh_StartDate").val(),
           enddate   : $("#eh_EndDate").val(),
           strtime   : $("#eh_StartTime").val(),
           endtime   : $("#eh_EndTime").val(),
           amountleave: $("#eh_AmountLeave").val(),
           detailleave: $("#eh_Detail").val(),
           post     : "LeaveUpdate"
         },
         function(d) {
           $(".alert_update_edit_leave").html(d);
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
        <h4 class="modal-title"><i class="fa fa-pencil"></i> แก้ไขการลางาน</h4>
      </div>

      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">

            <!-- Form -->
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-3 control-label">ประเภทการลางาน</label>
                <div class="col-sm-9">
                  <select class="form-control" name="eh_TypeLeave" id="eh_TypeLeave">
                    <option value="">เลือกประเภทการลา</option>
                    <?
                      $sql = "SELECT *
                              FROM z_hr_type_leave
                              ORDER BY type_leave_name ASC;";
                      if (select_numz($sql)>0) {
                        foreach (select_tbz($sql) as $row) {
                          ?><option value="<?=$row['type_leave_id'];?>"><?=$row['type_leave_name'];?></option><?
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">วันที่เริ่มลา</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="eh_StartDate" id="eh_StartDate" placeholder="<?=date("Y/m/d");?>" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">วันที่สิ้นสุดลา</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="ah_EndDate" id="eh_EndDate" placeholder="<?=date("Y/m/d");?>" autocomplete="off">
                </div>
              </div>
              <div class="form-group ">
                <label for="" class="col-sm-3 control-label">เวลาเริ่มลา</label>
                <div class="col-sm-9 bootstrap-timepicker">
                  <input type="text" class="form-control timepicker" name="eh_StartTime" id="eh_StartTime" placeholder="<?=date("H:i");?>" autocomplete="off">
                </div>
              </div>
              <div class="form-group ">
                <label for="" class="col-sm-3 control-label">เวลาสิ้นสุดลา</label>
                <div class="col-sm-9 bootstrap-timepicker">
                  <input type="text" class="form-control timepicker" name="eh_EndTime" id="eh_EndTime" placeholder="<?=date("H:i");?>" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">จำนวนวันลา ทั้งสิ้น</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="eh_AmountLeave" id="eh_AmountLeave" placeholder="1" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">เหตุผลการลา</label>
                <div class="col-sm-9">
                  <textarea class="form-control" placeholder="เหตุผลการลา" name="eh_Detail" id="eh_Detail"></textarea>
                </div>
              </div>

            </form>
            <!-- Form -->

          </div>
          <div class="col-xs-12 alert_update_edit_leave">

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info SubmitUpdateLeave">บันทึก</button>
      </div>

    </div>
  </div>
</div>
<!-- edit leave -->








<!-- approve Or Not -->
<script>
  $(document).ready(function() {
    $(".click_approve").click(function(event) {
      $(".SubmitUpdateProve").attr("id",$(this).attr("id"));
    });

    $(".SubmitUpdateProve").click(function(e) {
      $.post('../../new/jquery/others.php',
      {
        leaveid       : $(this).attr("id"),
        status_prove  : $(".apphr_Status:checked").val(),
        detailleave   : $("#ahr_remark").val(),
        post     : "LeaveSetProve"
      },
      function(d) {
        $(".alert_update_prove").html(d);
        setTimeout(function(){
          window.location.href = "<?=$HostLinkAndPath;?>";
        },2000);
      });
    });

    //// check not approve
    $(".apphr_Status").click(function(event) {
      if ( $(this).is(":Checked") && $(this).val() == "2" ) {
        $("#ahr_form_remark").attr('style', 'display:block;');
      }else {
        $("#ahr_form_remark").attr('style', 'display:none;');
      }
    });

  });
</script>
<div class="modal fade" id="modal-approve" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-cogs"></i> การยืนยันอนุมัติ</h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">

            <form class="form-horizontal">
              <div class="col-sm-12">

                <div class="form-group">
                  <label for="" class="col-md-3 control-label">การอนุมัติ :</label>
                  <div class="col-md-9">
                    <div class="radio">
                      <label> <input type="radio"  name="apphr_Status" id="LeaveTypeProveYes" value="1" class="apphr_Status" checked> อนุมัติ</label>
                    </div>
                    <div class="radio">
                      <label> <input type="radio"  name="apphr_Status" id="LeaveTypeProveNot" value="2" class="apphr_Status"> ไม่อนุมัติ</label>
                    </div>
                  </div>
                </div>
                <div class="form-group" id="ahr_form_remark" style="display:none;">
                  <label for="" class="col-md-3 control-label">หมายเหตุ :</label>
                  <div class="col-md-9">
                      <textarea class="form-control" name="ahr_remark" id="ahr_remark" placeholder="หมายเหตุ การไม่อนุมัติ"></textarea>
                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 alert_update_prove">

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success SubmitUpdateProve">ยืนยัน</button>
      </div>
    </div>
  </div>
</div>
<!-- approve Or Not -->






<!-- delete Leave -->
<script>
  $(document).ready(function() {

      $(".click_delete").click(function(e) {
        $(".dhr_DeleteLeave").attr("id", $(this).attr("id"));
      });

      //// check delete leave
      $(".dhr_DeleteLeave").click(function(e) {
          $.post("../../new/jquery/others.php",
          {
            value : $(this).attr("id"),
            post : "LeaveDelete"
          },
          function(data) {
              $("#View_data_delete").html(data);
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
        <div class="row">
          <div class="col-xs-12 text-center">
            <div class="col-md-12" id="View_data_delete" style="margin:15px 0;padding:15px;">ยืนยัน การลบข้อมูล</div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background-color: white; text-align: center;">
        <button type="button" style="width: 48%;float:left;" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger dhr_DeleteLeave">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- delete Leave -->
