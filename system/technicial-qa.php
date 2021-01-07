<div class="row" style="margin:0px;background:#fff;">
  <div class="container" style="padding:0px;">
    <div class="col-lg-12 col-md-12" style="padding:20px 15px;">

      <h3 class="text-center" style="margin: 50px 0 20px 0;">Technicial Support</h3>


      <div class="col-md-12 col-sm-12" style="padding:20px 0px;">
        <div class="row" style="margin:0px;display:none;">
          <div class="col-lg-12 page-header " style="margin:0px;">
              <h1 class="repeat text-left col-sm-12  hidden-xs" style="padding:0px;">
                  <label  style="font-size:30px;display:block;font-weight:200;color:#101010;" class="col-sm-12 text-left">ติดต่อฝ่ายเทคนิค</label>
              </h1>
              <h1 class="col-xs-12 hidden-sm hidden-md hidden-lg text-center" >ติดต่อฝ่ายเทคนิค</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12" style="padding-top:20px;">

            <style>
              .bvc{
                background: none !important;
                border-radius: 3px;
                padding:0px;
              }
              .bvc div{
                background: #333;
                color: #fff;
                padding:15px;
                border-radius: 5px;
                margin-bottom:10px;
              }
              .bvc div dd.head{
                font-size: 30px;
              }
              .bvc div dd.body{
                padding-left:15px;
              }
              .bvc div dd.body d{
                font-size: 20px;
                margin-right: 10px;
              }
              .bvc div dd.body a{
                text-decoration: none;
                color: #fff;
              }
              a.link-download,a.link-download:active{ color: #f00; text-decoration: none;}
              a.link-download:hover{ color: #000; text-decoration: none;}

              a.link_button{
                font-weight: 400;
                display: none;
                float: left;
                font-size: 16px;
                display: block;
                padding: 10px 15px;
                border: 1px solid #1c5f9e;
                border-radius: 5px;
                text-align: center;
                color: #fff;
                box-shadow: 0 1px 3px #ccc;
                background: #3488d6;
              }
            </style>

            <div class="col-xs-12" style="padding:0px;">
              <div class="col-xs-12 col-sm-12 col-md-6">
                <div class=" bvc" style="margin-top:20px;">
                  <div>
                    <dd class="head"><i class="fa fa-volume-control-phone faa-horizontal animated" aria-hidden="true"></i> <a href="tel:022741389" style="color:#fff;text-decoration:none;">02 274 1389</a> <d style="font-size: 18px;">กด</d> 4 <i class="fa fa-angle-double-left faa-passing-reverse animated" aria-hidden="true"></i></dd>
                    <dd class="body"><d>- แจ้งปัญหาการใช้งาน</d></dd>
                    <dd class="body"><d>- ให้ความช่วยเหลือ</d></dd>
                    <dd class="body"><d>- ตั้งแต่เวลา 08:15น. ถึง 17:00น. ในวันเวลาทำการ</d></dd>
                  </div>
                </div>

                <a href="#" class="btn link_button">แจ้งซ่อมสินค้า</a>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-6">
                <h3 style="margin-top:20px;">ขั้นตอนการแจ้งปัญหาการใช้งาน</h3>
                <li>ต้องเป็นสินค้าของทางบริษัท หรือ มีสติ๊กเกอร์ ของ(ZYNEK), (iNNEKT), (PROSECURE) </li>
                <li>แจ้งอาการเบื้องต้นให้ ทางเจ้าหน้าที่รับทราบ</li>
                <li>แจ้งข้อมูลการเข้าใช้งานระบบ หรือ เตรียมพร้อมโปรแกรมสำหรับ Remote ระยะไกล กรณีตั้งค่าต่างๆ</li>
                <li>โปรแกรมสำหรับรีโมทระยะไกลฟรี <a href="<?=SITE_URL;?>download/AnyDesk.exe" target="_blank" class="link-download">(ดาวน์โหลด AnyDesk)</a> สำหรับ Microsoft Windows (XP, 7, 8.x, 10) Version 3.1.1 (32 & 64 Bit)</li>
                <br>
                <h5><b style="font-weight:bold;">สินค้าที่อยู่นอกเหนือการให้ความช่วยเหลือ</b></h5>
                <ul>
                  <li>สินค้าที่ไม่ใช่ของทางบริษัท</li>
                </ul>

              </div>


            </div>

          </div>
        </div>
      </div>


    </div>
  </div>
</div>



<div class="row" style="margin:0px;background:#f1f1f1;">
  <div class="container" style="padding:0px;">
    <div class="col-lg-12 col-md-12" style="padding:20px 15px;">

      <h3 class="text-center" style="margin: 50px 0 20px 0;">ค้นหา การแก้ไขปัญหา</h3>

      <div class="col-sm-12 col-md-4">

        <div class="panel panel-default">
          <div class="panel-body" style="padding:0px;">

            <div class="col-xs-12" style="border: 1px solid #e1e1e1;padding: 15px 15px 20px 15px;">
              <h3 class="text-center">เลือกการแก้ปัญหา</h3>
              <div class="col-xs-12" style="padding:0px;">
                <div class="input-group" style="width:100%;padding:5px;" >
                  <select class="form-control" id="_brand">
                    <option value="">เลือกยี่ห้อสินค้า</option>
                    <?/*
                    $sql = "SELECT ID_brand,name_brand FROM name_brand  WHERE status_brand = 'Y' ORDER BY name_brand ASC;";
                    if (select_numz($sql)>0) {
                      foreach(select_tbz($sql) as $row){
                        ?><option value='<?=$row[ID_brand];?>'><?=$row[name_brand];?></option><?
                      }
                    }else {
                      ?><option value=''>ไม่มีข้อมูล</option><?
                    }*/
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-xs-12" style="padding:0px;">
                <div class="input-group" style="width:100%;padding:5px;" >
                  <select class="form-control" id="_type">
                    <option value="">ประเภท</option>
                    <? /*
                    $sql = "SELECT id_sup_type_service,name_sup_type_service FROM sup_type_service";
                    if (select_numz($sql)>0) {
                      foreach(select_tbz($sql) as $row){
                        ?><option value='<?=$row[id_sup_type_service];?>'><?=$row[name_sup_type_service];?></option><?
                      }
                    }else {
                      ?><option value=''>ไม่มีข้อมูล</option><?
                    }*/
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-xs-12" style="padding:0px;">
                <div class="input-group" style="width:100%;padding:5px;" >
                  <select class="form-control" id="_problem">
                    <option value="">เลือกปัญหา</option>
                    <?
                    /*
                    $sql = "SELECT s.id_sup_type_sup_service,s.name_type_sub_service,n.name_brand
                            FROM sup_type_sub_service s
                            INNER JOIN name_brand n ON s.id_brand = n.ID_brand
                            ORDER BY  n.name_brand,s.name_type_sub_service ASC";
                    if (select_numz($sql)>0) {
                      foreach(select_tbz($sql) as $row){
                        ?><option value='<?=$row[id_sup_type_sup_service];?>'><?=$row[name_brand]."-".$row[name_type_sub_service];?></option><?
                      }
                    }else {
                      ?><option value=''>ไม่มีข้อมูล</option><?
                    }*/
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-xs-12" style="padding:0px;">
                <div class="input-group" style="width:100%;padding:5px;">
                  <input type="search"  class="form-control" id="sn_check" placeholder="กรอกข้อมูลปัญหา">
                  <span class="input-group-btn">
                    <button class="btn btn-success" id="btn_sn_check" type="button">ค้นหา</button>
                  </span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-8">
        <!-- css vertical -->
        <div class="row" style="margin:0px;">
          <div class="col-xs-12" style="padding:0;" id="view_sn_check"> </div>
        </div>
        <script>
          $(document).ready(function() {
            $("#sn_check").keyup(function() {
                $(this).val($(this).val().toLowerCase());
            });

            $("#sn_check").bind('keypress', function(e) {
              if (e.keyCode ==13 || e.which ==13) {
                if ($(this).val() =="") {
                  $("#view_sn_check").html("<div class='alert alert-warning alert-dismissible' style='margin:5px 0 0 0;'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <strong>ผิดพลาด</strong> กรุณากรอกรหัสสินค้าให้ถูกต้อง </div>");
                }else {
                  $("#view_sn_check").html("กำลังทำการตวจสอบ กรุณารอสักครู่...");
                  $.post("<?=SITE_URL;?>query.php",
                  {
                    _brand : $("#_brand").val(),
                    _sn  : $(this).val(),
                    post : "check_proplem"
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
                $.post("query.php",
                {
                  _brand : $("#_brand").val(),
                  _sn  : $("#sn_check").val(),
                  post : "check_proplem"
                },
                function(d){
                    $("#view_sn_check").html(d);
                });
              }
            });
          });
        </script>
        <!-- css vertical -->
      </div>

    </div>
  </div>
</div>
