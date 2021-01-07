
<div class="row" style="margin:0px;background:#fff;">
  <div class="container" style="padding:0px;">
    <div class="col-lg-12 col-md-12" style="padding:20px 15px;">

      <h3 class="text-center" style="margin: 50px 0 80px 0;">Seminar Schedule</h3>


      <div class="col-xs-12 col-sm-4">
        <div class="panel-group" id="accordion">
           <div class="panel panel-default">
             <div class="panel-heading">
               <h3 class="panel-title" data-parent="#accordion"><b>ตารางงานสัมมนาเร็วๆ นี้</b></h3>
             </div>
             <div id="collapse1" class="panel-collapse collapse in">
               <div class="panel-body">

                 <ul class="menu_left">
                   <li><a href="<?=SITE_URL;?>seminar/1">Product RoadShow จังหวัดนครปฐม<br/><span class="label" style="color: #6f6e6e;padding: 0px;"><i class="far fa-clock"></i> : 2018-09-11</span></a></li>
                   <li><a href="<?=SITE_URL;?>seminar/1">Product RoadShow จังหวัดกรุงเทพ<br/><span class="label" style="color: #6f6e6e;padding: 0px;"><i class="far fa-clock"></i> : <?=date("Y-m-d");?></span></a></li>
                   <li><a href="<?=SITE_URL;?>seminar/1">Product RoadShow จังหวัดปราจีนบุรี<br/><span class="label" style="color: #6f6e6e;padding: 0px;"><i class="far fa-clock"></i> : 2018-09-11</span></a></li>
                   <li><a href="<?=SITE_URL;?>seminar/1">Product RoadShow จังหวัดจันทบุรี<br/><span class="label" style="color: #6f6e6e;padding: 0px;"><i class="far fa-clock"></i> : 2018-09-11</span></a></li>
                   <li><a href="<?=SITE_URL;?>seminar/1">Product RoadShow จังหวัดสุรินทร์<br/><span class="label" style="color: #6f6e6e;padding: 0px;"><i class="far fa-clock"></i> : 2018-09-11</span></a></li>
                   <li><a href="<?=SITE_URL;?>seminar/1">Product RoadShow จังหวัดนครสวรรค์<br/><span class="label" style="color: #6f6e6e;padding: 0px;"><i class="far fa-clock"></i> : 2018-09-11</span></a></li>
                   <li><a href="<?=SITE_URL;?>seminar/1">Product RoadShow จังหวัดเชียงใหม่<br/><span class="label" style="color: #6f6e6e;padding: 0px;"><i class="far fa-clock"></i> : 2018-09-11</span></a></li>
                   <li><a href="<?=SITE_URL;?>seminar/1">Product RoadShow จังหวัดนครพนม<br/><span class="label" style="color: #6f6e6e;padding: 0px;"><i class="far fa-clock"></i> : 2018-09-11</span></a></li>
                   <li><a href="<?=SITE_URL;?>seminar/1">Product RoadShow จังหวัดเลย<br/><span class="label" style="color: #6f6e6e;padding: 0px;"><i class="far fa-clock"></i> : 2018-09-11</span></a></li>
                 </ul>
                 <style>
                    ul.menu_left{
                      list-style:none;
                      line-height:1.7;
                      padding:0px;
                    }
                    ul.menu_left li{
                    }
                    ul.menu_left li a{
                      display: block;
                      color: #000;
                      padding:10px 15px;
                      margin: 3px 0;
                      text-decoration: none;
                      line-height: 1.2;
                      border-bottom: 1px solid #e1e1e1;
                    }
                    ul.menu_left li a:hover{
                      background: #e1e1e1;
                      border-radius: 6px;
                      border-bottom: 1px solid #e1e1e1;
                    }
                 </style>

               </div>
             </div>
           </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-8">


        <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.css">
        <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.print.min.css" media='print'>
        <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/moment.min.js"></script>
        <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.js"></script>

        <div id="calendar"></div>
        <script>
          $(document).ready(function() {

            $('#calendar').fullCalendar({
              header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'//,agendaWeek,agendaDay,listWeek'
              },
              defaultDate: '<?=date("Y-m-d");?>',
              navLinks: true, // can click day/week names to navigate views
              editable: false,
              eventLimit: true, // allow "more" link when too many events
              events: [
                {
                  title: 'Product RoadShow จังหวัดกรุงเทพ',
                  start: '<?=date("Y-m-d");?>',
                  end: '<?=date("Y-m-d");?>',
                  url: '<?=SITE_URL;?>seminar/1'
                },
                {
                  title: 'Long Event',
                  start: '2018-03-07',
                  end: '2018-03-10'
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
