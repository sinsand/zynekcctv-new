<?
  if (base64url_decode($_COOKIE[$CookieType])=="Admin") {
    ?>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-7">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-log-out"></i></span>

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
        <div class="col-md-6 col-sm-6 col-xs-12">
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
        <div class="col-md-6 col-sm-6 col-xs-12">
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
        <div class="col-md-6 col-sm-6 col-xs-12">
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

        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ปฎิทินการลางาน</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
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

                        $sql_hr_check  ="SELECT * FROM admin WHERE (ID_admin = '".base64url_decode($_COOKIE[$CookieID])."' AND ID_admin IN ( SELECT approve_id FROM z_hr_permission_prove  ))";
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
      <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">โครงสร้างราคาล่าสุด</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">

            <ul class="timeline timeline-inverse">
              <?
                if (  base64url_decode($_COOKIE[$CookieType])=="Admin"  ) {
                  $WHERE = "  ";
                }else {
                  if (base64url_decode($_COOKIE[$CookieGroup])=="Prosecure") {
                    $WHERE = " AND  type_group = '1' ";
                  }else {
                    $WHERE = "  AND  type_group = '2' ";
                  }
                }
                $sql = "SELECT *
                        FROM z_structure_price
                        WHERE ( file_status = '1' $WHERE )
                        ORDER BY create_date DESC
                        LIMIT 3 ;";
                if (select_numz($sql)>0) { $new="";$old=""; $i=1;
                  foreach (select_tbz($sql) as $row) {
                    $new = substr($row['create_date'],0,10);
                    if($old==''){
                      ?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['create_date']);?> </span> </li><?
                      $old = $new;
                      $i=1;
                    }else{
                      if($old==$new){

                      }else{
                        ?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['create_date']);?> </span> </li><?
                        $i=1;
                      }
                      $old = $new;
                    }
                    ?>
                    <li><i class="fa fa-newspaper-o bg-blue"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> <?=substr($row['create_date'],11);?></span>
                        <h3 class="timeline-header"><?=$row['price_name'];?></h3>
                        <div class="timeline-body">
                          <?=$row['price_detail'];?>
                        </div>
                        <div class="timeline-footer">
                          <a href="<?=SITE_URL;?>jquery/file.php?file=<?=$row['link_file'];?>" target="_blank" class=" btn <?=$row['type_group']=="1"?"btn-success":"btn-info";?> btn-sm" id="<?=$row['file_id'];?>" >
                              <i class="fa fa-download" aria-hidden="true"></i> ดาวโหลด
                              <?
                                if (base64url_decode($_COOKIE[$CookieType])=="Admin") {
                                  echo $row['type_group']=="1"?"(โปรซีเคียว)":"(ตัวแทน)";
                                }
                              ?>
                          </a>
                        </div>
                      </div>
                    </li>
                    <?
                  }
                }else {
                  ?>
                  <li class="time-label"> <span class="bg-red"> <?=datetime_th(date("Y-m-d"));?> </span> </li>
                  <li><i class="fa fa-newspaper-o bg-blue"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?=substr(date("Y-m-d H:i:s"),11);?></span>
                      <h3 class="timeline-header">ไม่มีข้อมูล</h3>
                      <div class="timeline-body">
                        ยังไม่มีข้อมูล โครงสร้างราคาสินค้าใหม่
                      </div>
                    </div>
                  </li>
                  <?
                }
              ?>
            </ul>

          </div>
          <div class="box-footer text-center">
            <a href="<?=SITE_URL_ADMIN;?>structure-price" class="uppercase">ดูทั้งหมด</a>
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


    <?
  }else if(base64url_decode($_COOKIE[$CookieType])=="Customer") {
    ?>
    <div class="row">
      <div class="col-xs-12">
        <!-- ราคาโครงสร้าง -->
        <div class="col-xs-12 col-sm-12 col-md-5">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">โครงสร้างราคาล่าสุด</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">

              <ul class="timeline timeline-inverse">
                <?
                  if (  base64url_decode($_COOKIE[$CookieType])=="Admin"  ) {
                    $WHERE = "  ";
                  }else {
                    if (base64url_decode($_COOKIE[$CookieGroup])=="Prosecure") {
                      $WHERE = " AND  type_group = '1' ";
                    }else {
                      $WHERE = "  AND  type_group = '2' ";
                    }
                  }
                  $sql = "SELECT *
                          FROM z_structure_price
                          WHERE ( file_status = '1' $WHERE )
                          ORDER BY create_date DESC
                          LIMIT 3 ;";
                  if (select_numz($sql)>0) { $new="";$old=""; $i=1;
                    foreach (select_tbz($sql) as $row) {
                      $new = substr($row['create_date'],0,10);
                      if($old==''){
                        ?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['create_date']);?> </span> </li><?
                        $old = $new;
                        $i=1;
                      }else{
                        if($old==$new){

                        }else{
                          ?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['create_date']);?> </span> </li><?
                          $i=1;
                        }
                        $old = $new;
                      }
                      ?>
                      <li><i class="fa fa-newspaper-o bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> <?=substr($row['create_date'],11);?></span>
                          <h3 class="timeline-header"><?=$row['price_name'];?></h3>
                          <div class="timeline-body">
                            <?=$row['price_detail'];?>
                          </div>
                          <div class="timeline-footer">
                            <a href="<?=SITE_URL;?>jquery/file.php?file=<?=$row['link_file'];?>" target="_blank" class=" btn <?=$row['type_group']=="1"?"btn-success":"btn-info";?> btn-sm" id="<?=$row['file_id'];?>" >
                                <i class="fa fa-download" aria-hidden="true"></i> ดาวโหลด
                                <?
                                  if (base64url_decode($_COOKIE[$CookieType])=="Admin") {
                                    echo $row['type_group']=="1"?"(โปรซีเคียว)":"(ตัวแทน)";
                                  }
                                ?>
                            </a>
                          </div>
                        </div>
                      </li>
                      <?
                    }
                  }else {
                    ?>
                    <li class="time-label"> <span class="bg-red"> <?=datetime_th(date("Y-m-d"));?> </span> </li>
                    <li><i class="fa fa-newspaper-o bg-blue"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> <?=substr(date("Y-m-d H:i:s"),11);?></span>
                        <h3 class="timeline-header">ไม่มีข้อมูล</h3>
                        <div class="timeline-body">
                          ยังไม่มีข้อมูล โครงสร้างราคาสินค้าใหม่
                        </div>
                      </div>
                    </li>
                    <?
                  }
                ?>
              </ul>

            </div>
            <div class="box-footer text-center">
              <a href="<?=SITE_URL_ADMIN;?>structure-price" class="uppercase">ดูทั้งหมด</a>
            </div>
          </div>
        </div>
        <!-- ราคาโครงสร้าง -->


        <!-- Check Claim  -->
        <div class="col-xs-12  col-sm-12 col-md-7">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#checkclaim" data-toggle="tab">ตรวจสอบรายการงานซ่อมทั้งหมด</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="checkclaim">
                <div class="active tab-pane" id="settings">
                  <div style="padding:0 0 20px 0;">
                      <div class="input-group input-group-md">
                        <input type="text" class="form-control"  id="sn_check" placeholder="Serial Number">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat" id="btn_sn_check">ค้นหา!</button>
                            </span>
                      </div>
                  </div>
                  <ul class="timeline timeline-inverse" style="display:none;">
                        <li class="time-label">
                          <span class="bg-red"> 10 Feb. 2014 </span>
                        </li>
                        <li>
                          <i class="fa fa-envelope bg-blue"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                            <div class="timeline-body">
                              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                              weebly ning heekya handango imeem plugg dopplr jibjab, movity
                              jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                              quora plaxo ideeli hulu weebly balihoo...
                            </div>
                            <div class="timeline-footer">
                              <a class="btn btn-primary btn-xs">Read more</a>
                              <a class="btn btn-danger btn-xs">Delete</a>
                            </div>
                          </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                          <i class="fa fa-user bg-aqua"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                            </h3>
                          </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                          <i class="fa fa-comments bg-yellow"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                            <div class="timeline-body">
                              Take me to your leader!
                              Switzerland is small and neutral!
                              We are more like Germany, ambitious and misunderstood!
                            </div>
                            <div class="timeline-footer">
                              <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                            </div>
                          </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        <li class="time-label">
                              <span class="bg-green">
                                3 Jan. 2014
                              </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                          <i class="fa fa-camera bg-purple"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                            <div class="timeline-body">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                            </div>
                          </div>
                        </li>
                        <!-- END timeline item -->
                        <li>
                          <i class="fa fa-clock-o bg-gray"></i>
                        </li>
                      </ul>
                  <div id="view_sn_check">

                  </div>
              </div>
            </div>
          </div>
          </div>
        </div>
        <style>
          .wrapper_in {
            width: 100%;
            font-size: 16px;
            padding: 20px 0;
          }
          .StepProgress {
            position: relative;
            padding-left: 45px;
            list-style: none;
          }
          .StepProgress::before {
            display: inline-block;
            content: '';
            position: absolute;
            top: 0;
            left: 15px;
            width: 10px;
            height: 100%;
            border-left: 2px solid #CCC;
          }
          .StepProgress-item {
            position: relative;
            counter-increment: list;
          }
          .StepProgress-item:not(:last-child) {
            padding-bottom: 20px;
          }
          .StepProgress-item::before {
            display: inline-block;
            content: '';
            position: absolute;
            left: -30px;
            height: 100%;
            width: 10px;
          }
          .StepProgress-item::after {
            content: '';
            display: inline-block;
            position: absolute;
            top: 0;
            left: -37px;
            width: 17px;
            height: 17px;
            border: 2px solid #CCC;
            border-radius: 50%;
            background-color: #FFF;
          }
          .StepProgress-item.is-done::before {
            border-left: 2px solid green;
          }
          .StepProgress-item.is-done::after {
            content: "✔";
            font-size: 11px;
            color: #fff !important;
            text-align: center;
            border: 2px solid green;
            background-color: green;
          }
          .StepProgress-item.current::before {
            border-left: 2px solid #f00;
          }
          .StepProgress-item.current::after {
            content: counter(list);
            padding-top: 0px;
            width: 19px;
            height: 19px;
            top: 0px;
            left: -38px;
            font-size: 12px;
            text-align: center;
            color: #f00;
            border: 2px solid #f00;
            background-color: white;
          }
          .StepProgress strong {
            display: block;
          }


          .StepProgress-item{
            color:#000;
          }
          .StepProgress-item strong{
            color:#e1e1e1;font-weight: 100;
            font-family: 'db_helvethaicaais_x45_light';
          }
          .StepProgress-item.current strong{
            color:#f00;font-weight: bold;
            font-family: 'db_helvethaicaais_x75_bd';
          }
          .StepProgress-item.is-done strong{
            color:#099a0b;font-weight: bold;
            font-family: 'db_helvethaicaais_x55_regular';
          }
        </style>
        <script>
          $(document).ready(function() {

            $("#sn_check").keyup(function() {
                $(this).val($(this).val().toUpperCase());
            });


            $("#sn_check").bind('keypress', function(e) {
              if (e.keyCode ==13 || e.which ==13) {
                if ($(this).val() =="") {
                  $("#view_sn_check").html("<div class='alert alert-warning alert-dismissible' style='margin:5px 0 0 0;'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <strong>ผิดพลาด</strong> กรุณากรอกรหัสสินค้าให้ถูกต้อง </div>");
                }else {
                  $("#view_sn_check").html("กำลังทำการตวจสอบ กรุณารอสักครู่...");
                  $.post("../../../jquery/check-claim.php",
                  {
                    _sn  : $(this).val(),
                    post : "sn_check_claim"
                  },
                  function(d){
                      $("#view_sn_check").html(d);
                  });
                }
              }
            });
            $("#btn_sn_check").click(function(e) {
              if ($("#sn_check").val() =="") {
                $("#view_sn_check").html("<div class='alert alert-warning alert-dismissible' style='margin:5px 0 0 0;'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <strong>ผิดพลาด</strong> กรุณากรอกรหัสสินค้าให้ถูกต้อง </div>");
              }else {
                $("#view_sn_check").html("กำลังทำการตวจสอบ กรุณารอสักครู่...");
                $.post("../../../jquery/check-claim.php",
                {
                  _sn  : $("#sn_check").val(),
                  post : "sn_check_claim"
                },
                function(d){
                    $("#view_sn_check").html(d);
                });
              }
            });
          });
        </script>
        <!-- Check Claim  -->


        <!-- History claim -->
        <div class="col-xs-12 col-sm-12  col-md-7">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">รายการงานซ่อมล่าสุด</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <!-- Table claim history -->
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                    <tr>
                      <th style="width:120px;">เลขที่งานซ่อม</th>
                      <th>รุ่นสินค้า</th>
                      <th>หมายเลขสินค้า</th>
                      <th>สถานะ</th>
                      <th style="width:120px;">วันที่รับซ่อม</th>
                      <th>รายละเอียด</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?
                      $sql = "SELECT pc.*
                              FROM product_claim pc
                              INNER JOIN member m ON ( m.username = pc.username AND m.user_new = pc.username )
                              WHERE (  m.member_id = '".base64url_decode($_COOKIE[$CookieID])."' )
                              ORDER BY pc.timestamp DESC
                              LIMIT 10;";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?>
                            <tr>
                              <td><a href="#"><?=$row['ID_job'];?></a></td>
                              <td><?=$row['model'];?></td>
                              <td><?=$row['serial_number'];?></td>
                              <td>
                                <?
                                  if ($row[repair]=="0" && $row[processing]!="1") {
                                    ?><span class="label label-danger">ได้รับสินค้าแล้ว รอตรวจสอบ</span><?
                                  }elseif ($row[repair]=="0" && $row[processing]=="1") {
                                    ?><span class="label label-warning">ดำเนินการซ่อม*</span><?
                                  }elseif (( $row[repair]=="1" || $row[repair]=="2" || $row[repair]=="3" ) && substr($row[date_complete],0,4)=="0000") {
                                    ?><span class="label label-warning">ดำเนินการซ่อม</span><?
                                  }elseif ($row[num_job]!="" &&
                                           substr($row[date_complete],0,4)!="0000" &&
                                           substr($row[dateprint],0,4)!="0000"  &&
                                           substr($row[date_sand_product],0,4)!="0000") {
                                    ?><span class="label label-info">รอสินค้านำส่งคืน</span><?
                                  }elseif (substr($row[date_complete],0,4)!="0000") {
                                    ?><span class="label label-success">เสร็จสมบูรณ์</span><?
                                  }
                                ?>
                              </td>
                              <td style="min-width: 100px;"><?=date_($row['date_claim']);?></td>
                              <td style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;max-width: 120px;"><?=$row['problem_description'];?></td>
                            </tr>
                            <?
                          }
                        }else {
                          ?>
                          <tr>
                            <td colspan="5" class="text-center">ไม่มีข้อมูลงานซ่อม</td>
                          </tr>
                          <?
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              <!-- Table claim history -->
            </div>
            <div class="box-footer text-center">
              <span class="label label-default">หมายเหตุ * = อยู่ในช่วง ทดสอบ, เสนอราคา หรือเปลี่ยนอุปกรณ์ใหม่</span></br>
              <a href="<?=SITE_URL_ADMIN;?>view-check-claim" class="uppercase" style="padding-top:10px;display: inline-block;">ดูทั้งหมด</a>
            </div>
          </div>
        </div>
        <!-- History claim -->

      </div>
    </div>
    <?
  }
?>
