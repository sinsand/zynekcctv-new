<?
  if (base64url_decode($_COOKIE[$CookieType])=="Admin") {
?>
<div class="row">
  <div class="col-xs-12">
    <?
      $sql = "SELECT leave_e,leave_h
              FROM  admin
              WHERE ID_admin = '".base64url_decode($_COOKIE[$CookieID])."' ";

      ?>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>
              <?
              if (select_numz($sql)>0) {
                foreach (select_tbz($sql) as $row) {
                  echo $row['leave_e'];
                }
              }
              ?>
            </h3>
            <p>ลากิจ</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>
              <?
              if (select_numz($sql)>0) {
                foreach (select_tbz($sql) as $row) {
                  echo $row['leave_h'];
                }
              }
              ?>
            </h3>
            <p>ลาพักร้อน</p>
          </div>
          <div class="icon">
            <i class="fa fa-plane"></i>
          </div>
          <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
        </div>
      </div>
  </div>
</div>
<?
  }
?>








<div class="row" id="">
  <div class="col-xs-12">
    <?
    if (isset($_POST['SubmitUpdateAdmin'])) {

      if (base64url_decode($_COOKIE[$CookieType])=="Admin") {
        $Password_update = '';
        if (  (isset($_POST['inputPass']) && !empty($_POST['inputPass'])) &&
              (isset($_POST['inputRePass']) && !empty($_POST['inputRePass'])) &&
              ( $_POST['inputPass'] == $_POST['inputRePass'] )  ) {
          $Password_update = " , pass_admin = '".$_POST['inputPass']."' , pass_admin_encode = '".base64url_decode($_POST['inputPass'])."'  ";
        }

        $sql = "UPDATE admin
                  SET
                    Email_admin = '".$_POST['inputEmail']."',
                    name_admin = '".$_POST['inputName']."',
                    com_name ='".$_POST['inputCompany']."',
                    t_title = '".$_POST['inputTitleThai']."',
                    t_fname = '".$_POST['inputFnameThai']."',
                    t_lname = '".$_POST['inputLastThai']."',
                    e_title = '".$_POST['inputTitleEng']."',
                    e_fname = '".$_POST['inputFnameEng']."',
                    e_lname = '".$_POST['inputLastEng']."',

                    nickname = '".$_POST['inputNickname']."',
                    department_id = '".$_POST['']."'
                    $Password_update
                WHERE ID_admin = '".base64url_decode($_COOKIE[$CookieID])."' ";
        if (update_tbz($sql)==true) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-success"></i> Alert!</h4>
              เปลี่ยนแปลงข้อมูล เสร็จสิ้น.
              <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
            </div>
          <?
        }else {
          ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-warning"></i> Alert!</h4>
              ไม่สามารถเปลี่ยนแปลงข้อมูลได้  โปรดตรวจสอบข้อมูลให้ถูกต้อง.
            </div>
          <?
        }
      }else {





        ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            ข้อมูล ลูกค้า แก้ไข โปรไฟล์
          </div>
        <?
      }
    }


    ?>


  </div>
</div>






<div class="row">
  <div class="col-md-6 col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li><a href="#timeline" data-toggle="tab">รายการล่าสุด</a></li>
        <li class="active"><a href="#settings" data-toggle="tab">ข้อมูลส่วนตัว</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane" id="timeline">

            <?

              $DateNew = date("Y-m-d");
              $DateOld = date("Y-m-d",mktime(0,0,0,date("m"),date("d")-30,date("Y")));

              if (base64url_decode($_COOKIE[$CookieType])=="Admin") {
                $sql = "SELECT a.ID_admin, a.name_admin, l.detail, l.timestamp_log,
                            DATE_FORMAT(l.timestamp_log,'%Y-%m-%d') as t_date,
                            DATE_FORMAT(l.timestamp_log,'%H:%i:%s') as t_time
                        FROM log_admin_login l
                        LEFT OUTER JOIN admin a ON ( l.ID_admin = a.ID_admin )
                        WHERE (
                                ( DATE_FORMAT(l.timestamp_log,'%Y-%m-%d') BETWEEN '$DateOld' AND '$DateNew' ) AND
                                ( l.ID_admin = '".base64url_decode($_COOKIE[$CookieID])."') )
                        ORDER BY l.timestamp_log DESC";
               if (select_numz($sql)>0) { $i=1;  $sum=0;   $old = '';
                  ?><ul class="timeline timeline-inverse"><?
                  foreach (select_tbz($sql) as $row) {

                    $new = $row['t_date'];
                    if($old==''){
                      ?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['t_date']);?> </span> </li><?
                      $old = $new;
                      $i=1;
                    }else{
                      if($old==$new){

                      }else{
                        ?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['t_date']);?> </span> </li><?
                        $i=1;
                      }
                      $old = $new;
                    }
                    ?>
                      <li><i class="fa fa-clock-o bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> <?=$row['t_time'];?></span>
                          <h3 class="timeline-header"><?=!empty($row['detail'])?$row['detail']:"-";?></h3>
                        </div>
                      </li>
                    <?
                    $i++;
                  }
                  ?></ul><?
                }else {
                  ?>ไม่พบข้อมูล<?
                }
              }else {
                $sql = "SELECT l.timestamp_log,
                            DATE_FORMAT(l.timestamp_log,'%Y-%m-%d') as t_date,
                            DATE_FORMAT(l.timestamp_log,'%H:%i:%s') as t_time
                        FROM log_login l
                        WHERE (
                                ( DATE_FORMAT(l.timestamp_log,'%Y-%m-%d') BETWEEN '$DateOld' AND '$DateNew' ) AND
                                ( l.username = '".check_customer($_COOKIE[$CookieID],"username")."') )
                        ORDER BY l.timestamp_log DESC";
               if (select_numz($sql)>0) { $i=1;  $sum=0;   $old = '';
                  ?><ul class="timeline timeline-inverse"><?
                  foreach (select_tbz($sql) as $row) {

                    $new = $row['t_date'];
                    if($old==''){
                      ?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['t_date']);?> </span> </li><?
                      $old = $new;
                      $i=1;
                    }else{
                      if($old==$new){

                      }else{
                        ?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['t_date']);?> </span> </li><?
                        $i=1;
                      }
                      $old = $new;
                    }
                    ?>
                      <li><i class="fa fa-clock-o bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> <?=$row['t_time'];?></span>
                          <h3 class="timeline-header">เข้าสู่ระบบ</h3>
                        </div>
                      </li>
                    <?
                    $i++;
                  }
                  ?></ul><?
                }else {
                  ?>ไม่พบข้อมูล<?
                }
              }
            ?>



          <ul class="timeline timeline-inverse" style="display:none;">
            <li class="time-label"> <span class="bg-red"> 10 Feb. 2014 </span> </li>


            <li><i class="fa fa-clock-o bg-blue"></i>
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


            <li>
              <i class="fa fa-clock-o bg-aqua"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                </h3>
              </div>
            </li>
            <li>
              <i class="fa fa-clock-o bg-yellow"></i>

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
            <li class="time-label">
                  <span class="bg-green">
                    3 Jan. 2014
                  </span>
            </li>
            <li>
              <i class="fa fa-clock-o bg-purple"></i>

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
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>






        </div>
        <div class="active tab-pane" id="settings">
          <? if (base64url_decode($_COOKIE[$CookieType])=="Admin") { ?>
              <form class="form-horizontal"  action="<?=$HostLinkAndPath;?>" method="post">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ชื่อ-นามสกุล</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName"  name="inputName" placeholder="ชื่อ-นามสกุล" value="<?=check_admin($_COOKIE[$CookieID],"name_admin");?>" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail"  placeholder="Email" value="<?=check_admin($_COOKIE[$CookieID],"Email_admin");?>" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputUser" name="inputUser" placeholder="Username" readonly value="<?=check_admin($_COOKIE[$CookieID],"username_admin");?>" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPass" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPass" name="inputPass" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputRePass" class="col-sm-2 control-label">Re-Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputRePass" name="inputRePass" placeholder="Re-Password">
                  </div>
                </div>

                <hr />
                <h4>ข้อมูลส่วนตัว</h4>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">รหัสพนักงาน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmployee" placeholder="รหัสพนักงาน" readonly value="<?=check_admin($_COOKIE[$CookieID],"employee_id");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">สังกัดบริษัท</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="inputCompany" required>
                      <option value="">เลือกสังกัด</option>
                      <option <?=check_admin($_COOKIE[$CookieID],"com_name")=="บริษัท โปรซีเคียว จำกัด"?"selected":"";?> value="บริษัท โปรซีเคียว จำกัด">บริษัท โปรซีเคียว จำกัด</option>
                      <option <?=check_admin($_COOKIE[$CookieID],"com_name")=="บริษัท ซายเนค เทคโนโลยี่ จำกัด"?"selected":"";?> value="บริษัท ซายเนค เทคโนโลยี่ จำกัด">บริษัท ซายเนค เทคโนโลยี่ จำกัด</option>
                      <option <?=check_admin($_COOKIE[$CookieID],"com_name")=="บริษัท อินเนค เทคโนโลยี่ จำกัด"?"selected":"";?> value="บริษัท อินเนค เทคโนโลยี่ จำกัด">บริษัท อินเนค เทคโนโลยี่ จำกัด</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">วันเริ่มงาน</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputStartJob" placeholder="วันเริ่มงาน" readonly  value="<?=check_admin($_COOKIE[$CookieID],"str_job");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ตำแหน่ง</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPosition" placeholder="ตำแหน่ง" readonly  value="<?=check_admin($_COOKIE[$CookieID],"position_name");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ชื่อเล่น</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNickname" name="inputNickname" placeholder="ชื่อเล่น"  value="<?=check_admin($_COOKIE[$CookieID],"nickname");?>" autocomplete="off"  required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">คำนำหน้าชื่อ ไทย</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTitleThai" name="inputTitleThai" placeholder="คำนำหน้าชื่อ"  value="<?=check_admin($_COOKIE[$CookieID],"t_title");?>" autocomplete="off"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ชื่อไทย</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputFnameThai" name="inputFnameThai" placeholder="ชื่อไทย"  value="<?=check_admin($_COOKIE[$CookieID],"t_fname");?>" autocomplete="off"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">นามสกุลไทย</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLastThai" name="inputLastThai" placeholder="นามสกุลไทย"  value="<?=check_admin($_COOKIE[$CookieID],"t_lname");?>" autocomplete="off"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">คำนำหน้าชื่อ อังกฤษ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTitleEng" name="inputTitleEng" placeholder="Title Name English"  value="<?=check_admin($_COOKIE[$CookieID],"e_title");?>" autocomplete="off"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ชื่ออังกฤษ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputFnameEng" name="inputFnameEng" placeholder="FirstName English"  value="<?=check_admin($_COOKIE[$CookieID],"e_fname");?>" autocomplete="off"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">นามสกุลอังกฤษ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLastEng" name="inputLastEng" placeholder="LastName English"  value="<?=check_admin($_COOKIE[$CookieID],"e_lname");?>" autocomplete="off"  required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" id="check_confirm" value="1" required> ยืนยันการเปลี่ยนแปลง <!--<a href="#">terms and conditions</a>-->
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="SubmitUpdateAdmin" class="btn btn-danger">บันทึก</button>
                  </div>
                </div>
              </form>
          <? }else { ?>
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">บริษัท</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputCompany" placeholder="บริษัท" value="<?=check_customer($_COOKIE[$CookieID],"company");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ชื่อผู้ติดต่อ</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="ชื่อผู้ติดต่อ" value="<?=check_customer($_COOKIE[$CookieID],"contact");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">ที่อยู่</label>
                  <div class="col-sm-10">
                    <textarea id="InputAddress" class="form-control" placeholder="ที่อยู่"><?=check_customer($_COOKIE[$CookieID],"address");?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">เบอร์ติดต่อ</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputContact" placeholder="เบอร์ติดต่อ" value="<?=check_customer($_COOKIE[$CookieID],"phone");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?=check_customer($_COOKIE[$CookieID],"email");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputUser" placeholder="Username" readonly value="<?=check_customer($_COOKIE[$CookieID],"user_new");?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPass" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPass" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputRePass" class="col-sm-2 control-label">Re-Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputRePass" placeholder="Re-Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" id="check_confirm"> ยืนยันการเปลี่ยนแปลง <!--<a href="#">terms and conditions</a>-->
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-danger">บันทึก</button>
                  </div>
                </div>
              </form>
          <? } ?>


        </div>
      </div>
    </div>
  </div>
</div>
