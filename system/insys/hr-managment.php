<div class="row">
    <div class="col-lg-3 col-xs-4">
      <div class="small-box bg-blue">
        <div class="inner">
          <h3>
            <?
              $sql = "SELECT *
                      FROM z_hr_leave
                      WHERE  ( DATE_FORMAT(str_date,'%Y-%m') >= '".date("Y-m")."' AND DATE_FORMAT(end_date,'%Y-%m') <=  '".date("Y-m")."' ) and
                             status_leave = '1' ";
              echo number_format(select_numz($sql));
            ?>
          </h3>
          <p>ยอดการลาเดือนนี้</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
      </div>
    </div>
</div>



<?

$sql = "SELECT *
        FROM z_hr_leave zhl
        INNER JOIN  admin a ON ( a.ID_admin = zhl.admin_id )
        INNER JOIN  z_hr_type_leave zhtl ON ( zhtl.type_leave_id = zhl.type_leave_id )
        ORDER BY zhl.create_date DESC";
$Per_Page = 80;   // Per Page
$Page = $UrlIdSub;
if(!$UrlIdSub){
  $Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if(select_numz($sql)<=$Per_Page){
  $Num_Pages =1;
}
else if((select_numz($sql) % $Per_Page)==0){
  $Num_Pages =(select_numz($sql)/$Per_Page) ;
}else{
  $Num_Pages =(select_numz($sql)/$Per_Page)+1;
  $Num_Pages = (int)$Num_Pages;
}
$id_run = $Page_Start+1;

$sql .= " LIMIT $Page_Start , $Per_Page; ";

?>

<div class="row">
  <div class="col-xs-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#view_leave" data-toggle="tab">ข้อมูลการลา</a></li>
          <li><a href="#search_leave" data-toggle="tab">ค้นหาข้อมูลการลา</a></li>
          <li><a href="#calendar_leave" data-toggle="tab">ปฎิทินการลา</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="view_leave">
            <div class="row">
              <div class="col-xs-12">
                <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;">
                  <div class="col-xs-12" style="padding:0px;">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="กรอกข้อมูลค้นหา รุ่นสินค้า" id="SearchView" autocomplete="off">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">ค้นหา</button>
                        </span>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <nav>
                    <ul class="pagination">
                     <?
                        if($Prev_Page){
                          ?><li><a href="<?=SITE_URL_ADMIN;?>manage-view-holiday/<?=$Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?
                        }
                        for($i=1; $i<=$Num_Pages; $i++){
                          $Page1 = $Page-2;
                          $Page2 = $Page+2;
                          if($i != $Page && $i >= $Page1 && $i <= $Page2){
                            ?><li><a href="<?=SITE_URL_ADMIN;?>manage-view-holiday/<?=$i;?>"><?=$i;?></a></li><?
                          }else if($i==$Page){
                            ?><li class="active"><a href="#"><?=$i;?></a></li><?
                          }
                        }
                        if($Page!=$Num_Pages){
                          ?><li><a href="<?=SITE_URL_ADMIN;?>manage-view-holiday/<?=$Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?
                        }
                    ?>
                    </ul>
                  </nav>
                </div>
                <div class="table-responsive col-xs-12" style="margin:15px 0 0 0;padding:0px;">
                  <table class="table table-striped table-bordered table-hover TableMember">
                    <thead>
                      <tr>
                        <th class="text-center">ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ประเภทการลา</th>
                        <th class="text-center">วันที่ลา</th>
                        <th class="text-center">จำนวนวันลา</th>
                        <th>รายละเอียด</th>
                        <th class="text-center">ไฟล์แนบ</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                      if (select_numz($sql)>0) { $i=1;
                        foreach (select_tbz($sql) as $row) {
                          ?>
                          <tr>
                            <td class="text-center"><?=$i;?></td>
                            <td class="text-left"><?=$row['name_admin'];?> <?="(".$row['nickname'].")";?></td>
                            <td class="text-left"><?=$row['type_leave_name'];?></td>
                            <td class="text-center">
                              <?=$row['str_date']==$row['str_date']?date_($row['str_date']):"(".date_($row['str_date']).") - (".date_($row['end_date']).")";?><br>
                              <?=substr($row['str_time'],0,5)=='08:00'&&substr($row['end_time'],0,5)=='17:00'?"":"(".substr($row['str_time'],0,5)." - ".substr($row['end_time'],0,5).")";?>
                            </td>
                            <td class="text-center"><?=$row['amount_leave'];?></td>
                            <td class="text-left"><?=$row['detail_leave'];?></td>
                            <td class="text-center"><?=$row['file_refer']==""||$row['file_refer']=="-"?"-":"<a href='".SITE_URL."file/hr/".$row['file_refer']."' target='_blank'>ดูไฟล์แนบ</a>";?></td>
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
                            <td class="text-center">
                              <div class="btn-group" style="width: 117px;">
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
                <div class="col-xs-12">
                  <nav>
                    <ul class="pagination">
                     <?
                        if($Prev_Page){
                          ?><li><a href="<?=SITE_URL_ADMIN;?>manage-view-holiday/<?=$Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?
                        }
                        for($i=1; $i<=$Num_Pages; $i++){
                          $Page1 = $Page-2;
                          $Page2 = $Page+2;
                          if($i != $Page && $i >= $Page1 && $i <= $Page2){
                            ?><li><a href="<?=SITE_URL_ADMIN;?>manage-view-holiday/<?=$i;?>"><?=$i;?></a></li><?
                          }else if($i==$Page){
                            ?><li class="active"><a href="#"><?=$i;?></a></li><?
                          }
                        }
                        if($Page!=$Num_Pages){
                          ?><li><a href="<?=SITE_URL_ADMIN;?>manage-view-holiday/<?=$Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?
                        }
                    ?>
                    </ul>
                  </nav>
                </div>

              </div>
            </div>




          </div>
          <div class="tab-pane" id="search_leave">


            <div class="row">
                <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                  <div class="col-sm-12" style="margin:15px 0 0 0;padding:0px;">
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="" class="control-label">พนักงาน :</label>
                        <select class="form-control" id="sv_member">
                          <option value="">พนักงาน</option>
                          <?
                          $sql = "SELECT *
                                  FROM admin
                                  WHERE (login_status = '1')
                                  ORDER BY name_admin ASC";
                          if (select_numz($sql)>0) {
                            foreach (select_tbz($sql) as $row) {
                              ?><option value="<?=$row['ID_admin'];?>"><?=$row['name_admin']." (".$row['nickname'].")";?></option><?
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="" class="control-label">ประเภทการลา :</label>
                        <select class="form-control" id="sv_typeleave">
                          <option value="">เลือกประเภทการลา</option>
                          <?
                          $sql = "SELECT *
                                  FROM z_hr_type_leave
                                  ORDER BY type_leave_name ASC";
                          if (select_numz($sql)>0) {
                            foreach (select_tbz($sql) as $row) {
                              ?><option value="<?=$row['type_leave_id'];?>"><?=$row['type_leave_name'];?></option><?
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12" style="margin:15px 0 0 0;padding:0px;">
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="" class="control-label">วันที่เริ่ม :</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control str_datepicker" placeholder="<?=date("Y-m-d");?>"  autocomplete="off"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="" class="control-label">วันที่สิ้นสุด :</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control end_datepicker" placeholder="<?=date("Y-m-d");?>"  autocomplete="off" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;">
                    <div class="col-xs-12">
                      <button type="button" id="BTN_search_leave" class="text-center btn btn-primary" style="width:100%;">ค้นหาข้อมูลการลา</button>
                    </div>
                  </div>
                </div>
            </div>

            <script>
              $(document).ready(function() {

                $("#BTN_search_leave").click(function(e) {
                  $.post("../../new/jquery/others.php",
                  {
                    member : $("#sv_member").val(),
                    typeleave : $("#sv_typeleave").val(),
                    str_date : $(".str_datepicker").val(),
                    end_date : $(".end_datepicker").val(),
                    post : "HRViewSearch"
                  },
                  function(d) {
                    $("#view_table_search_leave").html(d);
                  });
                });

              });
            </script>
            <div class="row">
              <div class="col-xs-12" id="view_table_search_leave">

                <div class="text-center" style="    margin: 30px 0;">
                  เลือกข้อมูลเพื่อค้นหา
                </div>

              </div>
            </div>




          </div>
          <div class="tab-pane" id="calendar_leave">
            <div class="row">
              <div class="col-xs-12">

                <!--- Calendar -->
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



                          $sql = "SELECT a.name_admin,zhtl.type_leave_id,zhtl.type_leave_name,zhl.str_date,zhl.end_date,zhl.leave_id,zhl.str_time,zhl.end_time
                                  FROM z_hr_leave zhl
                                  INNER JOIN z_hr_type_leave zhtl ON ( zhl.type_leave_id = zhtl.type_leave_id )
                                  INNER JOIN admin a ON ( zhl.admin_id = a.ID_admin )
                                  WHERE ( zhl.status_leave = '1' )
                                  ORDER BY zhl.leave_id DESC;";


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



<link rel="stylesheet" href="<?=SITE_URL;?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
<script type="text/javascript" src="<?=SITE_URL;?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
  $(function () {
      //Date picker
      $('.str_datepicker,.end_datepicker').datepicker({
        autoclose: true,
        format: 'yyyy/mm/dd'
      })
  })
</script>







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
