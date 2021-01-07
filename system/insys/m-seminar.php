<div class="row">
  <div class="col-sm-12 col-xs-12">




    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#new_seminar" data-toggle="tab">เพิ่มงานสัมมนา</a></li>
        <li><a href="#view_seminar" data-toggle="tab">รายการสัมมนา</a></li>
        <li><a href="#schedule_seminar" data-toggle="tab">ปฎิทินงาน</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="new_seminar">
          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ชื่องาน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="ชื่องาน">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">รายละเอียดงาน</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" placeholder="รายละเอียดงาน"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">วันเริ่ม</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" placeholder="<?=date("Y-m-d");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">เวลาเริ่ม</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" placeholder="<?=date("H:i");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">วันสิ้นสุด</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" placeholder="<?=date("Y-m-d");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">เวลาสิ้นสุด</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" placeholder="<?=date("H:i");?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="fileupload" class="col-sm-2 control-label">สถานะ</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="">
                      <option value="Y">เปิด</option>
                      <option value="N">ปิด</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileupload" class="col-sm-2 control-label">จังหวัด</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="">
                      <option value="">เลือกจังหวัด</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">เพิ่ม</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="tab-pane" id="view_seminar">
          <div class="row">
            <div class="col-xs-12">
              <div class="table-responsive">
                <!---
                  <table class="table table-striped table-hover ">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>ยี่ห้อ</th>
                        <th style="min-width:250px;">ชื่อไฟล์</th>
                        <th>ลิ้งดาวโหลด</th>
                        <th style="min-width: 80px;">ขนาดไฟล์</th>
                        <th>ประเภทไฟล์</th>
                        <th>วันที่ลง</th>
                        <th>จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                        $sql = "SELECT *
                                FROM dl_status ds
                                INNER JOIN dl_sub_detail  dld ON (ds.ID_DL_status = dld.ID_status)
                                INNER JOIN name_brand nb ON (ds.ID_brand = nb.ID_brand)
                                WHERE ( dld.DL_sub_status = 'Y' )
                                ORDER BY dld.DL_sub_date DESC ";
                        if (select_numz($sql)>0) { $i=1;
                          foreach (select_tbz($sql) as $row) {
                            ?>
                              <tr>
                                <td><?=$i;?></td>
                                <td><?=$row['name_brand'];?></td>
                                <td><?=$row['DL_sub_detail'];?></td>
                                <td><a href="<?=$row['DL_sub_url'];?>" target="_blank">ดาวโหลด</a></td>
                                <td><?=$row['DL_sub_size'];?></td>
                                <td><?=$row['group_type'];?></td>
                                <td><?=$row['DL_sub_date'];?></td>
                                <td>
                                  <div class="btn-group" style="width: 100px;">
                                    <button id="<?=$row['ID_DL_sub'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit"><i class="fa fa-pencil"></i></button>
                                    <button id="<?=$row['ID_DL_sub'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete disabled" disabled><i class="fa fa-trash-o"></i></button>
                                  </div>
                                </td>
                              </tr>
                            <? $i++;
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                -->
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane" id="schedule_seminar">

          <div class="row">
            <div class="col-xs-12">

                <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.css">
                <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.print.min.css" media='print'>
                <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/moment.min.js"></script>
                <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.js"></script>

                <div id="calendar_view"></div>
                <script>
                  $(document).ready(function() {

                    $('#calendar_view').fullCalendar({
                      header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month'//,agendaWeek,agendaDay,listWeek'
                      },
                      defaultDate: '<?=date("Y-m-d");?>',
                      navLinks: false, // can click day/week names to navigate views
                      editable: false,
                      eventLimit: true, // allow "more" link when too many events
                      events: [
                        {
                          title: 'Product RoadShow จังหวัดกรุงเทพ',
                          start: '<?=date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")));?>',
                          end: '<?=date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));?>',
                          url: '#'
                        },
                        {
                          title: 'Long Event',
                          start: '<?=date("Y-m-d",mktime(0,0,0,date("m"),date("d")+2,date("Y")));?>',
                          end: '<?=date("Y-m-d",mktime(0,0,0,date("m"),date("d")+5,date("Y")));?>'
                        },
                        {
                          id: 999,
                          title: 'Repeating Event',
                          start: '2018-03-09T16:00:00'
                        },
                        {
                          id: 999,
                          title: 'Repeating Event',
                          start: '2018-03-16T16:00:00'
                        },
                        {
                          title: 'Conference',
                          start: '2018-03-11',
                          end: '2018-03-13'
                        },
                        {
                          title: 'Meeting',
                          start: '2018-03-12T10:30:00',
                          end: '2018-03-12T12:30:00'
                        },
                        {
                          title: 'Lunch',
                          start: '2018-03-12T12:00:00'
                        },
                        {
                          title: 'Meeting',
                          start: '2018-03-12T14:30:00'
                        },
                        {
                          title: 'Happy Hour',
                          start: '2018-03-12T17:30:00'
                        },
                        {
                          title: 'Dinner',
                          start: '2018-03-12T20:00:00'
                        },
                        {
                          title: 'Birthday Party',
                          start: '2018-03-13T07:00:00'
                        },
                        {
                          title: 'Click for Google',
                          url: 'http://google.com/',
                          start: '2018-03-28'
                        }
                      ]
                    });

                  });
                </script>

            </div>
          </div>

        </div>

      </div>
    </div>




  </div>
</div>
