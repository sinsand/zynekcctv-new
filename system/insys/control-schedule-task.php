<link rel="stylesheet" href="<?=SITE_URL;?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
<script src="<?=SITE_URL;?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
  $(function () {
    //Date picker
    $('.date_create').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd'
    });
  })
</script>



<?
if (isset($_POST['SubmitInSchedule'])) {
  $sql = "INSERT INTO for_schedule
            VALUES(0,
              '".$_POST['cd_title']."',
              '".$_POST['cd_str_date']."',
              '".$_POST['cd_end_date']."',
              '".$_POST['cd_status']."',
              now(),
              '".base64url_decode($_COOKIE[$CookieID])."'
            );";
  if (insert_tbz($sql)>0) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      เพิ่มตารางปฎิทินงาน สำเร็จ.
    </div>
    <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถเพิ่มตารางปฎิทินงานได้.
    </div>
    <?
  }
}
?>

<div class="row">
  <div class="col-xs-12">

    <!--- Creat Date Show --->
    <div class="col-xs-12 col-sm-8 col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">สร้างข้อมูลวันที่ ทำ forecast on schedule</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
          <!-- Creat Date show -->
          <form role="form" class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post" >
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12">

                  <div class="form-group" >
                    <label for="" class="col-sm-3 control-label">ชื่อเรื่อง</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="cd_title" placeholder="ชื่อเรื่อง"  required>
                    </div>
                  </div>
                  <div class="form-group" >
                    <label for="" class="col-sm-3 control-label">วันที่เริ่ม</label>
                    <div class="col-sm-9">
                      <input class="form-control date_create" type="text" name="cd_str_date" placeholder="<?=date("Y/m/d");?>" value="<?=date("Y/m/d");?>" required>
                    </div>
                  </div>
                  <div class="form-group" >
                    <label for="" class="col-sm-3 control-label">วันที่สิ้นสุด</label>
                    <div class="col-sm-9">
                      <input class="form-control date_create" type="text" name="cd_end_date" placeholder="<?=date("Y/m/d");?>" value="<?=date("Y/m/d");?>" required>
                    </div>
                  </div>
                  <div class="form-group" >
                    <label for="" class="col-sm-3 control-label">สถานะ</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="cd_status" required>
                        <option value="0">ปิดใช้งาน</option>
                        <option value="1">ใช้งาน</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group" >
                    <label for="" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9 ">
                      <input type="checkbox" id="check_request" required> <label style="font-weight:normal;" for="check_request">ยืนยันการบันทึก</label>
                    </div>
                  </div>
                  <div class="form-group" >
                    <label for="" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                      <button type="submit" class="btn btn-primary" name="SubmitInSchedule">บันทึก</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </form>
         <!-- Creat Date show -->
      </div>
    </div>


    <!--- Calendar Schedule--->
    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">ตารางเปิดทำ Forecasting</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

          <!--- Calebdar -->
          <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.print.min.css" media='print'>
          <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.css">
          <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/moment.min.js"></script>
          <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.js"></script>

          <div id="ViewCalendar_forcasting"></div>
          <style media="screen">
            .fc-time{display: none;}
            .fc-day-grid-event{cursor: pointer;}
          </style>
          <script>
            $(document).ready(function() {

              $('#ViewCalendar_forcasting').fullCalendar({
                header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'month'//,agendaWeek',agendaDay,listWeek'
                },
                defaultDate: '<?=date("Y-m-d");?>',
                navLinks: false, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: [
                  <?

                    $sql = "SELECT *
                            FROM for_schedule
                            ORDER BY str_date ASC";


                    if (select_numz($sql)>0) { $i=0;
                      foreach (select_tbz($sql) as $row) {
                        $background = "";

                        if ($row['schedule_status']==1) {
                          $background = " backgroundColor: '#00a65a',borderColor    : '#00a65a' "; /// green
                        }else{
                          $background = " backgroundColor: '#afafaf',borderColor    : '#9c9c9c' "; /// yellow
                        }


                        if ($i==0) {
                          echo "{
                                  scheduleid: '".$row['schedule_id']."',
                                  title: '".$row['title_schedule']."',
                                  start: '".$row['str_date']."T00:00:00',
                                  end: '".$row['end_date']."T23:59:59',
                                  $background
                                }";
                        }else {
                          echo ",{
                                  scheduleid: '".$row['schedule_id']."',
                                  title: '".$row['title_schedule']."',
                                  start: '".$row['str_date']."T00:00:00',
                                  end: '".$row['end_date']."T23:59:59',
                                  $background
                                }";
                        }
                        $i++;
                      }
                    }
                  ?>
                ],
                eventClick: function(calEvent, jsEvent, view) {

                  $(".SubmitUpdateSchedule").attr("id",calEvent.scheduleid);

                  $.post("../../new/jquery/others.php",
                  {
                    value  : calEvent.scheduleid,
                    post  : "ForecastViewSchedule"
                  },
                  function(d) {
                    var i = d.split("|||");
                    $("#ed_title").val(i[0]);
                    $("#ed_str_date").val(i[1]);
                    $("#ed_end_date").val(i[2]);
                    $("#ed_status").val(i[3]);
                  });
                  $('#modal-edit').modal();

                }
              });

            });
          </script>
          <!--- Calendar -->

        </div>
      </div>
    </div>


    <!--- View Schedule Show --->
    <div class="col-xs-12 col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Product show on schedule</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">


              <!-- view order show -->
              <div class="table-responsive">
                <table class="table table-striped table-hover ">
                  <thead>
                    <tr>
                      <th class="text-center">ลำดับ</th>
                      <th>รุ่นสินค้า</th>
                      <th class="text-center">วันที่เริ่ม</th>
                      <th class="text-center">วันที่สิ้นสุด</th>
                      <th class="text-center">สถานะ</th>
                      <th class="text-center">วันที่ลงข้อมูล</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                      $sql = "SELECT *
                              FROM  for_schedule
                              ORDER BY schedule_id ASC ";
                      if (select_numz($sql)>0) { $i=1;
                        foreach (select_tbz($sql) as $row) {

                          ?>
                          <tr>
                            <td class="text-center"><?=($i++);?></td>
                            <td><?=$row['title_schedule'];?></td>
                            <td class="text-center"><?=date_($row['str_date']);?></td>
                            <td class="text-center"><?=date_($row['end_date']);?></td>
                            <td class="text-center">
                              <?=$row['schedule_status']=="1"?"<i class='fa fa-toggle-on fa-2x' style='color:#060' aria-hidden='true'></i>":"<i class='fa fa-toggle-off fa-2x'aria-hidden='true'></i>";?>
                            </td>
                            <td class="text-center"><?=$row['create_date'];?></td>
                            <td class="text-center">
                              <div class="btn-group" style="width: 80px;">
                                <button id="<?=$row['schedule_id'];?>" data-toggle="modal" data-target="#modal-edit"   class="btn btn-default modal-edit"><i class="fa fa-pencil"></i></button>
                                <button id="<?=$row['schedule_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-default modal-delete <?=ch_forecast_schedule_on_product($row['schedule_id']);?>" <?=ch_forecast_schedule_on_product($row['schedule_id']);?>><i class="fa fa-trash-o"></i></button>
                              </div>
                            </td>
                          </tr>
                          <?
                        }
                      }else {
                        ?>
                          <tr>
                            <td class="text-center" colspan="6">ไม่มีข้อมูล</td>
                          </tr>
                        <?
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- view order show -->





            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>



<?
function ch_forecast_schedule_on_product($value){
  $sql = "SELECT schedule_id FROM for_task WHERE ( schedule_id ='$value' )";
  if (select_numz($sql)>0) {
    return "disabled";
  }else {
    return "";
  }
}
?>


<!-- Edit Schedule -->
<script>
  $(document).ready(function() {

    $(".modal-edit").click(function(event) {
      $(".SubmitUpdateSchedule").attr("id",$(this).attr("id"));

      $.post("../../new/jquery/others.php",
      {
        value  : $(this).attr("id"),
        post  : "ForecastViewSchedule"
      },
      function(d) {
        var i = d.split("|||");
        $("#ed_title").val(i[0]);
        $("#ed_str_date").val(i[1]);
        $("#ed_end_date").val(i[2]);
        $("#ed_status").val(i[3]);
      });

    });


    $(".SubmitUpdateSchedule").click(function(event) {
      if (  $("#ed_title").val()!="" &&
            $("#ed_str_date").val()!="" &&
            $("#ed_end_date").val()!="" &&
            $("#ed_status").val()!="") {
        $.post("../../new/jquery/others.php",
        {
          value  : $(this).attr("id"),
          _title : $("#ed_title").val(),
          _strdate:$("#ed_str_date").val(),
          _enddate:$("#ed_end_date").val(),
          _status: $("#ed_status").val(),
          post  : "ForecastUpdateSchedule"
        },
        function(d) {
          var i = d.split("|||");
          if (i[0]!=1) {
            $(".show_update_schedule").html(i[1]);
          }else {
            $(".show_update_schedule").html(i[1]);
            setTimeout(function(){
              window.location.href = "<?=$HostLinkAndPath;?>";
            },2000);
          }
        });
      }else {
        $(".show_update_schedule").html("ตรวจสอบข้อมูลให้ถูกต้อง");
      }
    });

  });
</script>
<div class="modal fade" id="modal-edit" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-pencil"></i> แก้ไขข้อมูล <label class="eddddd"></label></h4>
      </div>

      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">

            <!-- Form -->
            <form class="form-horizontal">
              <div class="col-xs-12">

                <div class="form-group" >
                  <label for="" class="col-sm-3 control-label">ชื่อเรื่อง</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" id="ed_title" placeholder="ชื่อเรื่อง">
                  </div>
                </div>
                <div class="form-group" >
                  <label for="" class="col-sm-3 control-label">วันที่เริ่ม</label>
                  <div class="col-sm-9">
                    <input class="form-control date_create" type="text" id="ed_str_date" placeholder="<?=date("Y/m/d");?>">
                  </div>
                </div>
                <div class="form-group" >
                  <label for="" class="col-sm-3 control-label">วันที่สิ้นสุด</label>
                  <div class="col-sm-9">
                    <input class="form-control date_create" type="text" id="ed_end_date" placeholder="<?=date("Y/m/d");?>">
                  </div>
                </div>
                <div class="form-group" >
                  <label for="" class="col-sm-3 control-label">สถานะ</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="ed_status">
                      <option value="0">ปิดใช้งาน</option>
                      <option value="1">ใช้งาน</option>
                    </select>
                  </div>
                </div>

              </div>
            </form>
            <!-- Form -->

          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 show_update_schedule">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info SubmitUpdateSchedule">บันทึก</button>
      </div>

    </div>
  </div>
</div>
<!-- Edit Schedule -->


<!-- delete schedule  -->
<script>
  $(document).ready(function() {

    $(".modal-delete").click(function(event) {
      $(".BtnDeleteSchedule").attr("id",$(this).attr("id"));
    });

    $(".BtnDeleteSchedule").click(function(e) {
      $.post("../../new/jquery/others.php",
      {
        value  : $(this).attr("id"),
        post  : "ForecastDeleteSchedule"
      },
      function(d) {
        var i = d.split("|||");
        if (i[0]!=1) {
          $(".show_delete_schedule").html(i[1]);
        }else {
          $(".show_delete_schedule").html(i[1]);
          setTimeout(function(){
            window.location.href = "<?=$HostLinkAndPath;?>";
          },2000);
        }
      });
    });

  });
</script>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color: #f00;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon glyphicon-trash" style=" color: #FFF"></span> ลบข้อมูล</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group" style="text-align: center; margin: 0;">
            <div class="control-label" id="show_delete_schedule" style="padding:25px 0;">ยืนยันลบข้อมูล</div>
          </div>
        </form>
      </div>
      <div class="modal-footer" style="background-color: white; text-align: center;">
        <button type="button" style="width: 48%;float:left;" class="btn btn-default " data-dismiss="modal" id="">ยกเลิก</button>
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger BtnDeleteSchedule" data-dismiss="modal" id="">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- delete schedule -->
