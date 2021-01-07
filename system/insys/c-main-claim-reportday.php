


<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#search_claim" data-toggle="tab">รายงานการซ่อมรายวัน</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="search_claim">
          <div class="row">
            <div class="col-xs-12">
              <div class="col-xs-12" style="margin:0;">

                <!--<h4>รายงานอาการเสียของสินค้าส่งซ่อมกล้องวงจรปิด</h4>-->
                <div class="col-xs-12 col-xs-offset-0 col-sm-12 col-sm-offset-0 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3" style="margin:0;padding:0px;">
                    <div class="col-xs-12">
                      <label for="" class="control-label">เลือกวันที่ :</label>
                      <div class="input-group">
                          <input type="text" class="form-control" id="cl_search" name="cl_search" placeholder="เลือกวันที่">
                          <span class="input-group-btn">
                              <button type="submit" name="btn_cl_search" class="btn btn-default">ค้นหา</button>
                          </span>
                      </div>
                    </div>
                  </div>
              </div>

              <!-- view table -->
              <div class="col-xs-12" style="padding:25px 0; ">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">ลำดับ</th>
                        <th class="text-left">บริษัท</th>
                        <th class="text-left">รหัสสินค้า</th>
                        <th class="text-left">อาการเสีย</th>
                        <th class="text-left">วิธีแก้ไข</th>
                        <th class="text-left">วันที่รับเคลม</th>
                        <th class="text-center">รวมวันที่ซ่อม</th>
                        <th class="text-center">วันที่ส่งคืน</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?
                          $sql = "SELECT date_complete,date_claim,
                                         DATE_FORMAT(dateprint,'%d-%m-%Y') AS todate ,
                                         DATE_FORMAT(date_claim,'%d-%m-%Y') AS date_claim,
                                         TO_DAYS('date_complete')-TO_DAYS('date_claim') AS days
                                  FROM product_claim
                                  WHERE date_claim = '".date("Y-m-d")."' ";

                          $WHERE;
                          if (isset($_POST['btn_cl_search'])) {
                            if (!empty($_POST['cl_search'])) {
                              $WHERE = " WHERE date_claim  = '".$_POST['cl_search']."'  ";
                            }
                          }else {
                              $WHERE = " WHERE date_claim  = '".date("Y-m-d")."'  ";
                          }

                          $sql = "SELECT *
                                  FROM product_claim
                                  $WHERE ";
                          if (select_numz($sql)>0) { $i=1;
                            foreach (select_tbz($sql) as $row) {
                            ?>
                            <tr>
                              <td class="text-center"><?=($i++);?></td>
                              <td class="text-left"><?=$row['company'];?></td>
                              <td class="text-left"><?=$row['model'];?></td>
                              <td class="text-left"><?=$row['problem_description'];?></td>
                              <td class="text-left"><?=$row['problem_description_support'];?></td>
                              <td class="text-left"><?=$row['date_claim'];?></td>
                              <td class="text-center">
                                <?
                                  if ($row['dateprint']!="0000-00-00") {
                                    $sql_days = "SELECT  TO_DAYS('".$row['dateprint']."')-TO_DAYS('".$row['date_claim']."') AS days " ;
                                    foreach (select_tbz($sql_days) as $value) {
                                      echo $value[0];
                                    }
                                  }else {
                                    echo "-";
                                  }

                                ?>
                              </td>
                              <td class="text-center"><?=$row['dateprint']!="000-00-00"?$row['dateprint']:"-";?></td>
                            </tr>
                            <?
                            }
                          }else {
                            ?>
                            <tr>
                              <td colspan="7" class="text-center">กรุณาค้นหาข้อมูล</td>
                            </tr>
                            <?
                          }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- view table -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box small-box-dashboard bg-olt-gradient">
      <div class="inner">
        <h3>1</h3>
        <p>รายการ<br>รับเข้างานซ่อม</p>
      </div>
      <div class="icon">
        <i class="fa fa-check-square-o"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box small-box-dashboard bg-olt-gradient">
      <div class="inner">
        <h3>1</h3>
        <p>รายการ<br>งานซ่อมเสร็จ</p>
      </div>
      <div class="icon">
        <i class="fa fa-history"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box small-box-dashboard bg-olt-gradient">
      <div class="inner">
        <h3>1</h3>
        <p>รายการ<br>งานซ่อมที่ส่งออก</p>
      </div>
      <div class="icon">
        <i class="fa fa-bell-o"></i>
      </div>
    </div>
  </div>
</div>
<style media="screen">
  .small-box {
    border-radius: 4px;
    position: relative;
    display: block;
    color:#fff;
    margin-bottom: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  }
  .small-box h3 {
    font-size: 38px;
    font-weight: bold;
    margin: 0 0 10px 0;
    white-space: nowrap;
    padding: 10px 0px 0px 15px;
    text-align: left;
  text-shadow: 0 3px 3px rgba(0,0,0,0.1);
  }
  .small-box p {
    font-size: 18px;
    position: absolute;
    top: 13px;
    right: 0;
    width: 150px;
    text-align: right;
    padding-right: 10px;
  text-shadow: 0 3px 3px rgba(0,0,0,0.1);
  }
  @media (max-width: 767px) {
  .small-box .icon {
    display: block !important;
  }
  }
  .small-box .icon {
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: -10px;
    z-index: 0;
    font-size: 73px;
    color: rgba(255, 255, 255, 0.18);
  }

  .small-box:hover .icon {
  font-size: 73px;
  color: rgba(255, 255, 255, 0.07);
  }
  .bg-olt-gradient {
      background-color: #f14b12;
      background: -moz-linear-gradient(135deg, #f14b12 1%,#a5411e 100%);
      background: -webkit-linear-gradient(135deg, #f14b12 1%,#a5411e 100%);
      background: linear-gradient(135deg, #f14b12 1%,#a5411e 100%);
  }
  .bg-orange {
      background-color: #f7b032 !important;
      color: #ffffff;
  }
  .btn-olt {
      background-color: #F04C24;
      border-color: #F04C24;
  	color:#ffffff;
  	box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  }
  .btn-olt:hover,
  .btn-olt:focus,
  .btn-olt:active {
      background-color: #C53100;
  	color:#ffffff;
  }
  .btn-olt-red {
      background-color: #f72f2f;
      border-color: #fa2c24;
      color: #ffffff;
      box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  }
  .btn-olt-red:hover,
  .btn-olt-red:focus,
  .btn-olt-red:active {
      background-color: #e62c2c;
  	color:#ffffff;
  }
</style>
