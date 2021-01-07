<?
require_once ("../config/function.php");

if ($_POST['post']=="sent_provice_view_amphur") {
  $sql = "SELECT * FROM amphur WHERE ( PROVINCE_ID = '".$_POST['value']."' )  ORDER BY AMPHUR_NAME ASC";
  if (select_numz($sql)>0) {
    ?><option value="">เลือกเขต/อำเภอ</option><?
    foreach (select_tbz($sql) as $row) {
      ?><option value="<?=$row['AMPHUR_ID'];?>"><?=$row['AMPHUR_NAME'];?></option><?
    }
  }else {
    ?><option value="">ไม่ต้องเลือกอำเภอ</option><?
  }
}




/// clear session and cookie for system
if ($_POST['post']=="clear_system") {
  setcookie($CookieID, null, time()-3600,'/');
  setcookie($CookieUserID, null, time()-3600,'/');
  setcookie($CookieName, null, time()-3600,'/');
  setcookie($CookieGroup, null, time()-3600,'/');
  setcookie($CookieType, null, time()-3600,'/');

  unset($_COOKIE[$CookieID]);
  unset($_COOKIE[$CookieUserID]);
  unset($_COOKIE[$CookieName]);
  unset($_COOKIE[$CookieGroup]);
  unset($_COOKIE[$CookieType]);

  session_unset();
  session_destroy();
}
/// Login for system
if ($_POST['post']=="login") {
  $sql = "SELECT a.ID_admin,a.name_admin,ag.name_status
          FROM admin a
          INNER JOIN admin_group ag ON ( a.admin_status = ag.ID_admin_group )
          WHERE  ( a.username_admin    = '".$_POST['_username']."' AND
                   a.pass_admin_encode = '".base64url_encode($_POST['_password'])."' AND
                   a.pass_admin = '".$_POST['_password']."' AND
                   a.login_status = '1' ) ;";
  if (select_numz($sql)>0) {
    foreach (select_tbz($sql) as $row) {
      $_SESSION[$SessionID] = base64url_encode($row['ID_admin']);
      $_SESSION[$SessionName] = base64url_encode($row['name_admin']);
      $_SESSION[$SessionGroup] = base64url_encode($row['name_status']);
      $_SESSION[$SessionType] = base64url_encode("Admin");


      setcookie($CookieID, base64url_encode($row['ID_admin']), time() + (86400 * 30), "/"); // 86400 = 1 day
      setcookie($CookieName, base64url_encode($row['name_admin']), time() + (86400 * 30), "/"); // 86400 = 1 day
      setcookie($CookieGroup, base64url_encode($row['name_status']), time() + (86400 * 30), "/"); // 86400 = 1 day
      setcookie($CookieType, base64url_encode("Admin"), time() + (86400 * 30), "/"); // 86400 = 1 day


      $sql_log = " INSERT INTO log_admin_login VALUES(0,'".$row['ID_admin']."',now(),'เข้าสู่ระบบ')";
      insert_tbz($sql_log);

      ?>
      1|||<p class="text-center" style="padding:15px 0;color:#060;">รอสักครู่.. <i class="fa fa-spinner fa-spin animated"></i></p>
      <?
    }
  }else{
    $sql = "SELECT *
            FROM member m
            INNER JOIN member_group mg ON ( m.ID_mem_group = mg.ID_mem_group )
            WHERE  ( m.username  = '".$_POST['_username']."' AND
                     m.pass_member_encode = '".base64url_encode($_POST['_password'])."' AND
                     m.status_member = 'Y' AND
                     m.group_member != 'Fr' AND
                     m.non_active = '0' ); ";
    if (select_numz($sql)>0) {
      foreach (select_tbz($sql) as $row) {
        if ($row['mem_group_name']=="Delete" || $row['mem_group_name']=="Non-Active" || $row['mem_group_name']=="Remove" ) {
            $sql_log = " INSERT INTO log_login VALUES(0,'".$row['user_new']."',now(),'พยายามเข้าสู่ระบบ');";
            insert_tbz($sql_log);
            ?>
            0|||<p class="text-center" style="padding:15px 0;color:#f00;"><i class="fa fa-shield"></i> ขณะนี้ท่านขาดการติดต่อกับบริษัทเป็นเวลานาน กรุณาติดต่อ ฝ่ายขาย 02-274-1389 กด 1 </p>
            <?
        }else {
            $_SESSION[$SessionID] = base64url_encode($row['member_id']);
            $_SESSION[$SessionUserID] = base64url_encode($row['user_new']);
            $_SESSION[$SessionName] = base64url_encode($row['company']);
            $_SESSION[$SessionGroup] = base64url_encode($row['mem_group_name']);
            $_SESSION[$SessionType] = base64url_encode("Customer");

            setcookie($CookieID, base64url_encode($row['member_id']), time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($CookieUserID, base64url_encode($row['user_new']), time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($CookieName, base64url_encode($row['company']), time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($CookieGroup, base64url_encode($row['mem_group_name']), time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($CookieType, base64url_encode("Customer"), time() + (86400 * 30), "/"); // 86400 = 1 day

            $sql_log = " INSERT INTO log_login VALUES(0,'".$row['user_new']."',NOW(),'เข้าสู่ระบบ');";
            insert_tbz($sql_log);
            ?>
            1|||<p class="text-center" style="padding:15px 0;color:#060;">รอสักครู่.. <i class="fa fa-spinner fa-spin animated"></i></p>
            <?
        }
      }
    }else {
      ?>
        0|||<p class="text-center" style="color:#f00;padding:15px 0;"><i class="fa fa-shield"></i> ข้อมูลไม่ถูกต้อง กรูณากรอกข้อมูลใหม่ </p>
      <?
    }
  }
}
/// check login for have cookie
if ($_POST['post']=="check_login") {
  $sql_ = "SELECT a.ID_admin,a.name_admin,ag.name_status
          FROM admin a
          INNER JOIN admin_group ag ON ( a.admin_status = ag.ID_admin_group )
          WHERE  ( a.ID_admin    = '".base64url_decode($_COOKIE[$CookieID])."' AND
                   a.pass_admin_encode = '".base64url_encode($_POST['_password'])."' AND
                   a.pass_admin = '".$_POST['_password']."'  AND
                   a.login_status = '1' ) ;";
  if (select_numz($sql_)>0) {
    foreach (select_tbz($sql_) as $row) {
      $_SESSION[$SessionID] = base64url_encode($row['ID_admin']);
      $_SESSION[$SessionName] = base64url_encode($row['name_admin']);
      $_SESSION[$SessionGroup] = base64url_encode($row['name_status']);
      $_SESSION[$SessionType] = base64url_encode("Admin");


      //setcookie($CookieID, base64url_encode($row['ID_admin']), time() + (86400 * 30), "/"); // 86400 = 1 day
      //setcookie($CookieName, base64url_encode($row['name_admin']), time() + (86400 * 30), "/"); // 86400 = 1 day
      //setcookie($CookieGroup, base64url_encode($row['name_status']), time() + (86400 * 30), "/"); // 86400 = 1 day
      //setcookie($CookieType, base64url_encode("Admin"), time() + (86400 * 30), "/"); // 86400 = 1 day

      $sql_log = " INSERT INTO log_admin_login VALUES(0,'".$row['ID_admin']."',NOW(),'เข้าสู่ระบบอีกครั้งที่มีการใช้งานค้างอยู่');";
      insert_tbz($sql_log);

      ?>
      1|||<p class="text-center" style="padding:15px 0;color:#060;">รอสักครู่.. <i class="fa fa-spinner fa-spin animated"></i></p>
      <?
    }
  }else{
    $sql = "SELECT *
            FROM member m
            INNER JOIN member_group mg ON ( m.ID_mem_group = mg.ID_mem_group )
            WHERE  ( m.member_id  = '".base64url_decode($_COOKIE[$CookieID])."' AND
                     m.pass_member_encode = '".base64url_encode($_POST['_password'])."' AND
                     m.status_member = 'Y' AND
                     m.group_member != 'Fr' AND
                     m.non_active = '0' ); ";
    if (select_numz($sql)>0) {
      foreach (select_tbz($sql) as $row) {
        $_SESSION[$SessionID] = base64url_encode($row['member_id']);
        $_SESSION[$SessionUserID] = base64url_encode($row['user_new']);
        $_SESSION[$SessionName] = base64url_encode($row['company']);
        $_SESSION[$SessionGroup] = base64url_encode($row['mem_group_name']);
        $_SESSION[$SessionType] = base64url_encode("Customer");

        //setcookie($CookieID, base64url_encode($row['member_id']), time() + (86400 * 30), "/"); // 86400 = 1 day
        //setcookie($CookieName, base64url_encode($row['company']), time() + (86400 * 30), "/"); // 86400 = 1 day
        //setcookie($CookieGroup, base64url_encode($row['mem_group_name']), time() + (86400 * 30), "/"); // 86400 = 1 day
        //setcookie($CookieType, base64url_encode("Customer"), time() + (86400 * 30), "/"); // 86400 = 1 day

        $sql_log = " INSERT INTO log_login VALUES(0,'".$row['user_new']."',NOW(),'เข้าสู่ระบบอีกครั้งที่มีการใช้งานค้างอยู่');";
        insert_tbz($sql_log);

        ?>
        1|||<p class="text-center" style="padding:15px 0;color:#060;">รอสักครู่.. <i class="fa fa-spinner fa-spin animated"></i></p>
        <?

      }
    }else {
      ?>
      0|||<p class="text-center" style="padding:15px 0;color:#f00;"><i class="fa fa-shield"></i> ข้อมูลไม่ถูกต้อง กรูณากรอกข้อมูลใหม่ </p>
      <?
    }
  }
}
//// check username
if ($_POST['post']=="CheckUsername") {
  if(preg_match("/^[a-z0-9]+$/", $_POST['value']) == 1) {
    $sql = "SELECT username_admin
            FROM admin
            WHERE username_admin = '".$_POST['value']."'
            LIMIT 1; ";
    if (select_numz($sql)<=0) {
      echo "true";
    }else {
      echo "false";
    }
  }else {
    echo "false";
  }
}






/// HR Prove View
if ($_POST['post']=="HRProveViewChange") {
  $sql = "SELECT ahpp.z_permission_id,a.name_admin,a.nickname,ahpp.approve_id
          FROM z_hr_permission_prove ahpp
          INNER JOIN admin a ON (ahpp.admin_id = a.ID_admin)
          WHERE ahpp.approve_id = '".$_POST['value']."'; ";
  if (select_numz($sql)>0) { $i=1;
    foreach (select_tbz($sql) as $row) {
      ?>
      <div class="panel panel-default" style="margin-bottom:5px;">
        <div class="panel-body" style="padding: 2px;">
          <div class="panel-title">
            <div class="row" style="font-size:14px;">
              <p class="col-xs-10 col-sm-10" style="margin:0px;padding: 6px 5px 5px 25px;"><?=($i++);?>. <?=$row['name_admin']." (".$row['nickname'].")";?></p>
              <p class="col-xs-2 col-sm-2 text-right"   style="margin:0px;">
                <button id="<?=$row['z_permission_id']."-".$_POST['value'];?>" class="btn btn-default click_delete_admin"><i class="fa fa-trash"></i></button>
              </p>
            </div>
          </div>
        </div>
      </div>
      <?
    }
    ?>
    <script type="text/javascript">
      $(document).ready(function() {


        $(".click_delete_admin").click(function(event) {
          var i = $(this).attr("id").split("-");

          $.post("../../jquery/others.php",
          {
            value : i[0],
            post  : "HRProveDeleteMember"
          },
          function(d) {
            $("#alert_change_member_prove").html(d);
          });

          $.post("../../jquery/others.php",
          {
            value : i[1],
            post  : "HRProveViewChange"
          },
          function(d) {
            $("#view_hrprove_").html(d);
          });

        });
      });
    </script>
    <?
  }
}
//// HR Prove Delete adminid
if ($_POST['post']=="HRProveDeleteMember") {
  $sql = "DELETE FROM z_hr_permission_prove WHERE z_permission_id = '".$_POST['value']."'; ";
  if (delete_tbz($sql)==true) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ลบข้อมูล จัดการสิทธิ์สำเร็จ.
    </div>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถ ลบข้อมูล จัดการสิทธิ์ได้.
    </div>
    <?
  }
}
//// HR Prove Delete
if ($_POST['post']=="HRProveDelete") {
  $sql = "DELETE FROM z_hr_permission_prove WHERE approve_id = '".$_POST['value']."'; ";
  if (delete_tbz($sql)==true) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ลบข้อมูล จัดการสิทธิ์สำเร็จ.
    </div>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถ ลบข้อมูล จัดการสิทธิ์ได้.
    </div>
    <?
  }
}
//// view search
if ($_POST['post']=="HRViewSearch") {
  $Where;
  if (!empty($_POST['member'])) {
    $Where[] = " (a.ID_admin = '".$_POST['member']."') ";
  }
  if (!empty($_POST['typeleave'])) {
    $Where[] = " (zhtl.type_leave_id = '".$_POST['typeleave']."') ";
  }
  if (!empty($_POST['str_date']) && !empty($_POST['end_date'])) {
    $Where[] = " (( zhl.str_date BETWEEN  '".$_POST['str_date']."' AND  '".$_POST['end_date']."') AND
               ( zhl.end_date BETWEEN  '".$_POST['str_date']."' AND  '".$_POST['end_date']."'))
             ";
  }else {
    if (!empty($_POST['str_date'])) {
      $Where[] = " ( zhl.str_date = '".$_POST['str_date']."' ";
    }
    if (!empty($_POST['end_date'])) {
      $Where[] = " ( zhl.end_date = '".$_POST['end_date']."') ";
    }
  }

  for ($i=0; $i <count($Where) ; $i++) {
    if ($i==0) {
      $ValueSearch = " WHERE ".$Where[$i];
    }else {
      $ValueSearch .= " AND ".$Where[$i];
    }
  }

  $sql = "SELECT *
          FROM z_hr_leave zhl
          INNER JOIN  admin a ON ( a.ID_admin = zhl.admin_id )
          INNER JOIN  z_hr_type_leave zhtl ON ( zhtl.type_leave_id = zhl.type_leave_id )
          $ValueSearch
          ORDER BY zhl.create_date DESC";
    ?>
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
                <td class="text-center"><?=$row['file_refer']==""?"-":"<a href='".SITE_URL."file/hr/".$row['file_refer']."' target='_blank'>ดูไฟล์แนบ</a>";?></td>
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
          }else {
            ?>
            <tr>
              <td colspan="9" class="text-center">ไม่พบข้อมูล</td>
            </tr>
            <?
          }
          ?>
        </tbody>
      </table>
    </div>
    <?
}











//// View Customer For addClaim
if ($_POST['post']=="CheckViewCustomerForClaim") {
  $sql = "SELECT *
          FROM member
          WHERE ( user_new = '".$_POST['value']."' OR username = '".$_POST['value']."' )
          LIMIT 1;";
 if (select_numz($sql)>0) {
   echo "Y"."|||";
   foreach (select_tbz($sql) as $row) {
     echo $row['company']."|||".
          $row['telephone']."|||".
          $row['contact']."|||".
          $row['fax']."|||".
          $row['address'];
   }
 }else {
   echo "N"."|||ไม่มีข้อมูล";
 }
}
//// View Model For quote Claim
if ($_POST['post']=="ViewForClaim") {
  $sql = "SELECT *
          FROM product_claim
          WHERE ID_product = '".$_POST['idproduct']."'
          LIMIT 1;";
  foreach (select_tbz($sql) as $row) {
    echo  $row['ID_job']."|||".    /////1
          $row['company']."|||".    /////2
          $row['contact']."|||".    /////3
          $row['telephone']."|||".    /////4
          $row['model']."|||".    /////5
          $row['type_product']."|||".    /////6
          $row['serial_number']."|||".    /////7
          $row['problem_description']."|||".    /////8
          $row['remark']."|||".    /////9
          $row['date_claim']."|||".    /////10
          $row['repair']."|||".    /////11
          $row['problem_description_support']."|||".    /////12
          $row['status_claim']."|||".    /////13
          $row['timestamp']."|||".    /////14
          $row['num_job']."|||".    /////15
          $row['processing']."|||".    /////16
          $row['username']."|||".    /////17
          $row['address']."|||".    /////18
          $row['date_complete']."|||".    /////19
          $row['day_claim']."|||".    /////20
          $row['dateprint']."|||".    /////21
          $row['quotation']."|||".    /////22


          $row['type_brand']."|||". ////// 23
          $row['type_products']."|||". ////// 24
          $row['Power_Cable']."|||". ////// 25
          $row['Adapter']."|||". ////// 26
          $row['Remote']."|||". ////// 27
          $row['Harddisk']."|||". ////// 28
          $row['Bracket']."|||". ////// 29
          $row['Lens']."|||". ////// 30
          $row['mouse']."|||". ////// 31
          $row['lan']."|||". ////// 32
          $row['cd_software']."|||". //////33
          $row['jack_alarm']."|||". ////// 34
          $row['sata']."|||". ////// 35
          $row['board_power']."|||". ////// 36
          $row['charge']."|||". ////// 37
          $row['accessories']."|||"; ////// 38

  }
}
//// Update Quote For Quote Claim
if ($_POST['post']=="UpdateQuoteForClaim") {
  $sql = "UPDATE product_claim
            SET quotation   = '".$_POST['quot']."'
          WHERE ID_product = '".$_POST['idproduct']."'; ";
 if (update_tbz($sql)==true) {
   ?>
   <div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เพิ่มเลขที่ใบเสนอราคาสำเร็จ.
   </div>
   <?
 }else {
   ?>
   <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ เพิ่มเลขที่ใบเสนอราคาได้.
   </div>
   <?
 }
}
//// Delete For Claim
if ($_POST['post']=="ClaimDelete") {
  $sql = "DELETE FROM product_claim WHERE ID_product = '".$_POST['value']."'; ";
  if (delete_tbz($sql)==true) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ลบข้อมูลงานซ่อมสำเร็จ.
    </div>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถ ลบข้อมูลงานซ่อมได้.
    </div>
    <?
  }
}
//// Update claim
if ($_POST['post']=="UpdateClaim") {
  $sql = "UPDATE product_claim
            SET
            username = '".$_POST['codeuser']."',
            company = '".$_POST['company']."',
            telephone = '".$_POST['mobile']."',
            contact = '".$_POST['contact']."',
            address = '".$_POST['address']."',
            ID_job = '".$_POST['jobid']."',
            type_brand = '".$_POST['brand']."',
            type_camera = '".$_POST['grouppro']."',
            type_products = '".$_POST['typepro']."',
            model = '".$_POST['model']."',
            serial_number = '".$_POST['sn']."',
            problem_description = '".$_POST['problem']."',
            Power_Cable = '".$_POST['powercable']."',
            Adapter = '".$_POST['adapter']."',
            Remote = '".$_POST['remote']."',
            Harddisk = '".$_POST['harddisktext']."',
            Bracket = '".$_POST['bracket']."',
            Lens = '".$_POST['lenstext']."',
            mouse = '".$_POST['mouse']."',
            lan = '".$_POST['lan']."',
            cd_software = '".$_POST['cdsoftware']."',
            jack_alarm = '".$_POST['jackalarm']."',
            sata = '".$_POST['sata']."',
            board_power = '".$_POST['boardpower']."',
            charge = '".$_POST['charge']."',
            accessories = '".$_POST['accessories']."'

          WHERE ID_product = '".$_POST['idproduct']."'; ";
  if (update_tbz($sql)==true) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      เปลี่ยนแปลงข้อมูลสำเร็จ.
    </div>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถ เปลี่ยนแปลงข้อมูลได้.
    </div>
    <?
  }
}

/// view
if ($_POST['post']=="ViewRJobForClaim") {
  $sql = "SELECT *
          FROM product_claim
          WHERE ID_product = '".$_POST['idproduct']."'
          LIMIT 1";
  foreach (select_tbz($sql) as $row) {
    ?>
    <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="panel-title">
              <div class="row" style="font-size:14px;">
                <p class="col-xs-1 col-sm-1 text-left" style="margin:0px;">ลำดับ</p>
                <p class="col-xs-3 col-sm-3 text-left" style="margin:0px;">รุ่นสินค้า</p>
                <p class="col-xs-3 col-sm-3 text-left" style="margin:0px;">หมายเลขสินค้า</p>
                <p class="col-xs-3 col-sm-3 text-left" style="margin:0px;">สถานะการซ่อม</p>
                <p class="col-xs-2 col-sm-2 text-left" style="margin:0px;font-weight:bold;"><input type="checkbox" value='1' id='pcc_checkallfor' class="pcc_PrintCheckAll" /> <label for="pcc_checkallfor">เลือกทั้งหมด</label></p>
              </div>
            </div>
          </div>
        </div>
        <?
          $sqll = "SELECT *
                  FROM product_claim
                  WHERE ID_job = '".$row['ID_job']."' "; $i=1;
          foreach (select_tbz($sqll) as $rowin) {
            ?>
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="panel-title">
                  <div class="row" style="font-size:14px;">
                    <p class="col-xs-1 col-sm-1" style="margin:0px;"><?=($i++);?></p>
                    <p class="col-xs-3 col-sm-3" style="margin:0px;"><?=$rowin['model'];?></p>
                    <p class="col-xs-3 col-sm-3" style="margin:0px;"><?=$rowin['serial_number'];?></p>
                    <p class="col-xs-3 col-sm-3" style="margin:0px;"><?=$rowin['status_claim'];?></p>
                    <p class="col-xs-2 col-sm-2" style="margin:0px;"><input type="checkbox" value="<?=$rowin['ID_product'];?>" class="pcc_Print" /></p>
                  </div>
                </div>
              </div>
            </div>
            <?
          }
        ?>
    </div>
  <?
  }
  ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".pcc_Print").click(function(e) {
        $("input[type='checkbox'].pcc_Print").map(function(_, el) { return $(el).val(); }).get();
        $(".pc_SubmitPrint").attr("href","http://www.zynektechnologies.co.th/print/printclaim.php?idclaim=" + $(".pcc_Print:checked").map(function(_, el) { return $(el).val(); }).get());
      });

      $(".pcc_PrintCheckAll").click(function(e) {
        if ($(".pcc_PrintCheckAll").is(":checked")) {
          $(".pcc_Print").prop("checked",true);
          $("input[type='checkbox'].pcc_Print").map(function(_, el) { return $(el).val(); }).get();
          $(".pc_SubmitPrint").attr("href","http://www.zynektechnologies.co.th/print/printclaim.php?idclaim=" + $(".pcc_Print:checked").map(function(_, el) { return $(el).val(); }).get());
        }else {
          $(".pcc_Print").prop("checked",false);
          $(".pc_SubmitPrint").attr("href","http://www.zynektechnologies.co.th/print/printclaim.php?idclaim=");
        }
      });
    });
  </script>
  <?
}
/// Set For Claim
if ($_POST['post']=="SetForClaim") {
  $Set;
  if ($_POST['repair']==1) {
    $Set = " processing ='1', status_claim = '".$_POST['detail']."'   ";
  }else {
    $Set = " repair = '1', status_claim = 'ซ่อมเสร็จแล้ว', problem_description_support = '".$_POST['detail']."'  ";
  }
  $sql = "UPDATE product_claim
            SET
              $Set
          WHERE ID_product = '".$_POST['idproduct']."';  ";
  if (update_tbz($sql)==true) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      เปลี่ยนแปลงข้อมูลสำเร็จ. <?=$sql;?>
    </div>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถ เปลี่ยนแปลงข้อมูลได้.
    </div>
    <?
  }
}













//// delete upload slide
if ($_POST['post']=="DeleteUploadSlide") {
  $sql = "SELECT * FROM z_slide WHERE slide_id = '".$_POST['value']."' ;";
  foreach (select_tbz($sql) as $row) {
    if (!unlink("../file/slide/".$row['file_s']) && !unlink("../file/slide/".$row['file_w']) ){
      ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        ไม่สามารถ ลบไฟล์ข้อมูลได้.
      </div>
      <?
    }else{
      $sql = "DELETE FROM z_slide WHERE slide_id = '".$_POST['value']."'; ";
      if (delete_tbz($sql)==true) {
        ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          ลบข้อมูลสำเร็จ.
        </div>
        <?
      }else {
        ?>
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          ไม่สามารถ ลบข้อมูลในซานข้อมูลได้.
        </div>
        <?
      }
    }
  }
}
/// view slide
if ($_POST['post']=="ViewSlide") {
  $sql = "SELECT * FROM z_slide WHERE slide_id = '".$_POST['value']."' ;";
  foreach (select_tbz($sql) as $row) {
    echo $row['name_slide']."|||".
         $row['str_date']."|||".
         $row['end_date']."|||".
         SITE_URL."file/slide/".$row['file_w']."|||".
         SITE_URL."file/slide/".$row['file_s']."|||".
         $row['link_host']."|||".
         $row['order_by']."|||".
         $row['status_open'];
  }
}
/// Update slide
if ($_POST['post']=="UpdateSlide") {
  $sql = "UPDATE z_slide
            SET name_slide = '".$_POST['nameslide']."',
                link_host  = '".$_POST['linkhost']."',
                str_date   = '".$_POST['strdate']."',
                end_date   = '".$_POST['enddate']."',
                status_open= '".$_POST['statusopen']."',
                order_by   = '".$_POST['orderby']."'
          WHERE slide_id = '".$_POST['slideid']."'; ";
 if (update_tbz($sql)==true) {
   ?>
   <div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เปลี่ยนแปลงข้อมูลสำเร็จ.
   </div>
   <?
 }else {
   ?>
   <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ เปลี่ยนแปลงข้อมูลได้.
   </div>
   <?
 }
}





/// View promotion
if ($_POST['post']=="PromotionView") {
  $sql = "SELECT *
          FROM z_promotion
          WHERE ( promotion_id = '".$_POST['value']."' ) ;";
  if (select_numz($sql)>0) {
    foreach (select_tbz($sql) as $row) {
      echo $row['pro_name']."|||".
           SITE_URL."file/promotion/".$row['file_cover']."|||".
           SITE_URL."file/promotion/".$row['file_detail']."|||".
           $row['pro_group']."|||".
           $row['pro_status']."|||".
           $row['brand_id']."|||".
           $row['str_date']."|||".
           $row['end_date']."|||".
           $row['create_date'];
    }
  }
}
/// update promotion
if ($_POST['post']=="PromotionUpdate") {
  $sql = "UPDATE z_promotion
            SET pro_name   = '".$_POST['promoname']."',
                pro_group  = '".$_POST['progroup']."',
                pro_status = '".$_POST['prostatus']."',
                brand_id   = '".$_POST['probrand']."',
                str_date   = '".$_POST['prostart']."',
                end_date   = '".$_POST['proend']."'
          WHERE promotion_id = '".$_POST['promoid']."'; ";
 if (update_tbz($sql)==true) {
   ?>
   <div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เปลี่ยนแปลงข้อมูลสำเร็จ.
   </div>
   <?
 }else {
   ?>
   <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ เปลี่ยนแปลงข้อมูลได้.
   </div>
   <?
 }
}
/// delete promotion
if ($_POST['post']=="PromotionDelete") {
  $sql = "SELECT * FROM z_promotion WHERE promotion_id = '".$_POST['value']."' ;";
  foreach (select_tbz($sql) as $row) {
    if (!unlink("../file/promotion/".$row['file_cover']) &&
        !unlink("../file/promotion/".$row['file_detail']) ){
      ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        ไม่สามารถ ลบไฟล์ข้อมูลได้.
      </div>
      <?
    }else{
      $sql = "DELETE FROM z_promotion WHERE promotion_id = '".$_POST['value']."'; ";
      if (delete_tbz($sql)==true) {
        ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          ลบข้อมูลสำเร็จ.
        </div>
        <?
      }else {
        ?>
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          ไม่สามารถ ลบข้อมูลได้.
        </div>
        <?
      }
    }
  }
}






// view file price
if ($_POST['post']=="StructurePriceUploadView") {
  $sql = "SELECT *
          FROM z_structure_price
          WHERE ( file_id = '".$_POST['value']."' ) ;";
  if (select_numz($sql)>0) {
    foreach (select_tbz($sql) as $row) {
      echo $row['price_name']."|||".
           $row['price_detail']."|||".
           $row['type_group']."|||".
           $row['file_status'];
    }
  }
}
/// update file price
if ($_POST['post']=="StructurePriceUploadUpdate") {
  $sql = "UPDATE z_structure_price
            SET price_name = '".$_POST['filename']."',
                price_detail  = '".$_POST['filedetail']."',
                type_group   = '".$_POST['filegroup']."',
                file_status   = '".$_POST['filestatus']."'
          WHERE file_id = '".$_POST['fileid']."'; ";
 if (update_tbz($sql)==true) {
   ?>
   <div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เปลี่ยนแปลงข้อมูลสำเร็จ.
   </div>
   <?
 }else {
   ?>
   <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ เปลี่ยนแปลงข้อมูลได้.
   </div>
   <?
 }
}
//// delete file price
if ($_POST['post']=="StructurePriceUploadDelete") {
  $sql = "SELECT * FROM z_structure_price WHERE file_id = '".$_POST['value']."' ;";
  foreach (select_tbz($sql) as $row) {
    if (!unlink("../file/price/".$row['link_file']) ){
      ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        ไม่สามารถ ลบไฟล์ข้อมูลได้.
      </div>
      <?
    }else{
      $sql = "DELETE FROM z_structure_price WHERE file_id = '".$_POST['value']."'; ";
      if (delete_tbz($sql)==true) {
        ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          ลบข้อมูลสำเร็จ.
        </div>
        <?
      }else {
        ?>
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          ไม่สามารถ ลบข้อมูลได้.
        </div>
        <?
      }
    }
  }
}





/// view admin user
if ($_POST['post']=="AdminView") {
  $sql = "SELECT * FROM admin WHERE ID_admin = '".$_POST['value']."' ;";
  foreach (select_tbz($sql) as $row) {
    echo $row['username_admin']."|||".
         $row['name_admin']."|||".
         $row['Email_admin']."|||".
         $row['admin_status']."|||".
         $row['login_status'];
  }
}
/// update Admin user
if ($_POST['post']=="AdminUpdate") {
  $sql = "UPDATE admin
            SET name_admin   = '".$_POST['adminname']."',
                pass_admin  = '".$_POST['adminpass']."',
                pass_admin_encode  = '".base64url_encode($_POST['adminpass'])."',
                Email_admin = '".$_POST['adminemail']."',
                admin_status   = '".$_POST['admingroup']."',
                login_status   = '".$_POST['adminlogin']."'
          WHERE ID_admin = '".$_POST['adminid']."'; ";
 if (update_tbz($sql)==true) {
   ?>
   <div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เปลี่ยนแปลงข้อมูลสำเร็จ.
   </div>
   <?
 }else {
   ?>
   <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ เปลี่ยนแปลงข้อมูลได้.
   </div>
   <?
 }
}
/// update Admin Set user
if ($_POST['post']=="AdminSetUpdate") {
  $sql = "UPDATE admin
            SET login_status   = '".$_POST['adminlogin']."'
          WHERE ID_admin = '".$_POST['adminid']."'; ";
 if (update_tbz($sql)==true) {
   ?>
   <div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เปลี่ยนแปลงข้อมูลสำเร็จ.
   </div>
   <?
 }else {
   ?>
   <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ เปลี่ยนแปลงข้อมูลได้.
   </div>
   <?
 }
}
//// delete Admin user
if ($_POST['post']=="AdminDelete") {
  $sql = "DELETE FROM admin WHERE ID_admin = '".$_POST['value']."'; ";
  if (delete_tbz($sql)==true) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ลบข้อมูลสำเร็จ.
    </div>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถ ลบข้อมูลได้.
    </div>
    <?
  }
}




//// View Customer
if ($_POST['post']=="CustomerView") {
  $sql = "SELECT *
          FROM member m
          LEFT OUTER JOIN member_group mg ON ( m.group_member = mg.mem_group )
          WHERE member_id = '".$_POST['value']."' ;";
  foreach (select_tbz($sql) as $row) {
    echo $row['user_new']."|||".
         $row['acronym']."|||".
         $row['company']."|||".
         $row['address']."|||".
         $row['province']."|||".
         $row['telephone']."|||".
         $row['phone']."|||".
         $row['fax']."|||".
         $row['email']."|||".
         $row['contact']."|||".
         $row['authorized_capital']."|||".
         $row['status_member']."|||".
         $row['ID_mem_group']."-".$row['mem_group'];
  }
}
/// update Set Customer
if ($_POST['post']=="CustomerSetUpdate") {
  $sql = "UPDATE member
            SET status_member   = '".$_POST['cus_login']."'
          WHERE member_id = '".$_POST['customerid']."'; ";
 if (update_tbz($sql)==true) {
   ?>
   <div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เปลี่ยนแปลงข้อมูลสำเร็จ.
   </div>
   <?
 }else {
   ?>
   <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ เปลี่ยนแปลงข้อมูลได้.
   </div>
   <?
 }
}
/// update customer
if ($_POST['post']=="CustomerUpdate") {

  $aTypePart = explode('-',$_POST['typepart']);
  $password = "";
  if (!empty($_POST['mempass'])) {
    $password = " pass_member = '".$_POST['mempass']."', pass_member_encode = '".base64url_encode($_POST['mempass'])."', ";
  }
  $sql = "UPDATE member
            SET user_new   = '".$_POST['codesap']."',
                acronym    = '".$_POST['typebus']."',
                company   = '".$_POST['memcompany']."',
                address   = '".$_POST['memadress']."',
                province   = '".$_POST['memprovince']."',
                telephone   = '".$_POST['memtel']."',
                phone   = '".$_POST['memmobile']."',
                fax   = '".$_POST['memfax']."',
                email   = '".$_POST['mememail']."',
                contact   = '".$_POST['memcontact']."',
                authorized_capital   = '".$_POST['memregister']."',
                status_member   = '".$_POST['statuslogin']."',
                ID_mem_group   = '".$aTypePart[0]."',
                $password
                group_member   = '".$aTypePart[1]."'

          WHERE member_id = '".$_POST['memberid']."'; ";
 if (update_tbz($sql)==true) {
   ?>
   <div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เปลี่ยนแปลงข้อมูลสำเร็จ.
   </div>
   <?
 }else {
   ?>
   <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ เปลี่ยนแปลงข้อมูลได้.
   </div>
   <?
 }
}
//// delete customer
if ($_POST['post']=="CustomerDelete") {
  $sql = "DELETE FROM member WHERE member_id = '".$_POST['value']."'; ";
  if (delete_tbz($sql)==true) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ลบข้อมูลสำเร็จ.
    </div>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถ ลบข้อมูลได้.
    </div>
    <?
  }
}
//// search Customer
if ($_POST['post']=="CustomerSearchView") {
  $WHERE = array();
  if (!empty($_POST['smkeycom'])) {
    $WHERE[] = " ( m.company LIKE '%".$_POST['smkeycom']."%' ) ";
  }
  if (!empty($_POST['smkeycode'])) {
    $WHERE[] = " ( m.user_new LIKE '%".$_POST['smkeycode']."%' ) ";
  }
  if (!empty($_POST['smprovince'])) {
    $WHERE[] = " ( m.province = '".$_POST['smprovince']."' ) ";
  }
  if (!empty($_POST['smtypecus'])) {

    $WHERE[] = " ( m.ID_mem_group = '".$_POST['smtypecus']."' ) ";
  }
  if (!empty($_POST['smstatuscus'])) {
    $WHERE[] = " ( m.status_member = '".$_POST['smstatuscus']."' ) ";
  }
  if (!empty($_POST['smcatbus'])) {
    $WHERE[] = " ( m.acronym = '".$_POST['smcatbus']."' ) ";
  }

  $ValueWhere = "";
	for($i=0;$i<count($WHERE);$i++){
		if($i==0){
			$ValueWhere  .= " WHERE ".$WHERE[$i];
		}else{
			$ValueWhere  .= " AND ".$WHERE[$i];
		}
	}


  $sql = "SELECT *
          FROM member m
          LEFT OUTER JOIN member_group mg ON ( m.group_member = mg.mem_group )
          $ValueWhere ";
  if (select_numz($sql)>0) { $i=1;
    ?>
    <div class="col-xs-12" style="padding:15px 0;">
      <span class="label label-default"><?=select_numz($sql);?> รายการ</span>
    </div>
    <div class="table-responsive col-xs-12" style="padding:15px 0;">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center">ลำดับ</th>
            <th>รหัสลูกค้า</th>
            <th>ชื่อบริษัท</th>
            <th>ชื่อผู้ติดต่อ</th>
            <th>เบอร์ติดต่อ</th>
            <th>เบอร์โทรศัพท์</th>
            <th>กลุ่มลูกค้า</th>
            <th>สถานะ</th>
            <th class="text-center">จัดการ</th>
          </tr>
        </thead>
        <tbody>
        <?
        foreach (select_tbz($sql) as $row) {
          ?>
          <tr>
            <td class="text-center"><?=($i++);?></td>
            <td class="text-left"><?=$row['user_new'];?></td>
            <td class="text-left"><?=$row['company'];?></td>
            <td class="text-left"><?=$row['contact'];?></td>
            <td class="text-left"><?=$row['phone'];?></td>
            <td class="text-left"><?=$row['telephone'];?></td>
            <td class="text-left"><?=$row['mem_group_name'];?></td>
            <td class="text-left"><?=$row['status_member']=="Y"?"<span class='label label-success'>ใช้งาน</span>":"<span class='label label-danger'>ยกเลิก</span>";?></td>
            <td class="text-center">
              <div class="btn-group" style="width: 117px;">
                <button id="<?=$row['member_id'];?>" data-toggle="modal" data-target="#modal-set"   class="btn btn-warning click_status_customer_"><i class="fa fa-cogs"></i></button>
                <button id="<?=$row['member_id'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit_customer_"><i class="fa fa-pencil"></i></button>
                <button id="<?=$row['member_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete_customer_"><i class="fa fa-trash-o"></i></button>
              </div>
            </td>
          </tr>
          <?
        }
        ?>
        </tbody>
        <tfoot>
          <tr>
            <th class="text-center">ลำดับ</th>
            <th>รหัสลูกค้า</th>
            <th>ชื่อบริษัท</th>
            <th>ชื่อผู้ติดต่อ</th>
            <th>เบอร์ติดต่อ</th>
            <th>เบอร์โทรศัพท์</th>
            <th>กลุ่มลูกค้า</th>
            <th>สถานะ</th>
            <th class="text-center">จัดการ</th>
          </tr>
        </tfoot>
      </table>
    </div>

    <!-- Set -->
    <script type="text/javascript">
      $(document).ready(function() {

        $(".click_status_customer_").click(function(e) {
          $(".SubmitUpdateSetCustomer").attr("id",$(this).attr("id"));
          $.post("../../jquery/others.php",
          {
            value : $(this).attr("id"),
            post  : "CustomerView"
          },
          function(d) {
            var i = d.split("|||");
            $("#sc_UserCustomer").val(i[0]);
            $("#sc_ContactName").val(i[9]);
            $("#sc_Company").val(i[2]);
            $("#sc_StatusLogin").val(i[11]);
          });
        });

        $(".SubmitUpdateSetCustomer").click(function(e) {
          if ( $("#sc_StatusLogin").val() != "" ) {

            $.post('../../jquery/others.php',
            {
              customerid   : $(this).attr("id"),
              cus_login    : $("#sc_StatusLogin").val(),
              post         : "CustomerSetUpdate"
            },
            function(d) {
              $(".alert_update_set_customer").html(d);
              setTimeout(function(){
                window.location.href = "<?=SITE_URL_ADMIN;?>manage-member";
              },2000);
            });
          }else {

          }
        });

      });
    </script>

    <!-- edit -->
    <script type="text/javascript">
      $(document).ready(function() {

        $(".click_edit_customer_").click(function(e) {
          $(".SubmitUpdateCustomer").attr("id",$(this).attr("id"));
          $.post("../../jquery/others.php",
          {
            value : $(this).attr("id"),
            post  : "CustomerView"
          },
          function(d) {
            var i = d.split("|||");
            $("#emCodeSAP").val(i[0]);
            $("#emTypeBusiness").val(i[1]);
            $("#emCompanyName").val(i[2]);
            $("#emAddress").val(i[3]);
            $("#em_province").val(i[4]);
            $("#emTelephone").val(i[5]);
            $("#emMobile").val(i[6]);
            $("#emFAX").val(i[7]);
            $("#emEmail").val(i[8]);
            $("#emContact").val(i[9]);
            $("#emRegister").val(i[10]);
            $("#emStatusLogin").val(i[11]);
            $("#emTypePart").val(i[12]);
          });
        });

        $(".SubmitUpdateCustomer").click(function(e) {
          if ( $("#emCodeSAP").val() != "" &&
               $("#emCompanyName").val() != "" &&
               $("#emAddress").val() != "" &&
               $("#em_province").val() != "" &&
               $("#emTelephone").val() != "" &&
               $("#emContact").val() != "" &&
               $("#emStatusLogin").val() != ""  ) {

              if ( $("#ec_Password").val() == $("#ec_RePassword").val()  ) {
                $.post('../../jquery/others.php',
                {
                  memberid   : $(this).attr("id"),
                  codesap    : $("#emCodeSAP").val(),
                  typebus    : $("#emTypeBusiness").val(),
                  memcompany : $("#emCompanyName").val(),
                  memadress  : $("#emAddress").val(),
                  memprovince: $("#em_province").val(),
                  memtel     : $("#emTelephone").val(),
                  memmobile  : $("#emMobile").val(),
                  memfax     : $("#emFAX").val(),
                  mememail   : $("#emEmail").val(),
                  memcontact : $("#emContact").val(),
                  memregister: $("#emRegister").val(),
                  statuslogin: $("#emStatusLogin").val(),
                  typepart   : $("#emTypePart").val(),
                  mempass    : $("#emPassword").val(),


                  post     : "CustomerUpdate"
                },
                function(d) {
                  $(".alert_update_ccustomer").html(d);
                  setTimeout(function(){
                    window.location.href = "<?=SITE_URL_ADMIN;?>manage-member";
                  },2000);
                });
              }else {

              }
          }else {

          }
        });

      });
    </script>

    <!-- delete -->
    <script>
      $(document).ready(function() {

          $(".click_delete_customer_").click(function(e) {
            $(".da_DeleteCustomer").attr("id", $(this).attr("id"));
          });
          //// check delete
          $(".da_DeleteCustomer").click(function(e) {
            if ( $("#da_Pass_re").val() == "Admin" ) {
              $.post("../../jquery/others.php",
              {
                value : $(this).attr("id"),
                post : "CustomerDelete"
              },
              function(data) {
                  $("#View_data_delete").html(data);
                  setTimeout(function(){
                    window.location.href = "<?=SITE_URL_ADMIN;?>manage-member";
                  },2000);
              });
            }else {

            }
          });

      });
    </script>
    <?
  }else {
    ?>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th class="text-center">ลำดับ</th>
          <th>รหัสลูกค้า</th>
          <th>ชื่อบริษัท</th>
          <th>ชื่อผู้ติดต่อ</th>
          <th>เบอร์ติดต่อ</th>
          <th>เบอร์โทรศัพท์</th>
          <th>กลุ่มลูกค้า</th>
          <th>สถานะ</th>
          <th class="text-center">จัดการ</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center" colspan="8">ไม่พบข้อมูล</td>
        </tr>
      </tbody>
    </table>
    <?
  }

}



//// Claim view sub type product
if ($_POST['post']=="CheckViewSubTypeProduct") {
  $sql = "SELECT *
          FROM name_type
          WHERE ( ID_group = '".$_POST['value']."' )
          ORDER BY name_type ASC";
  if (select_numz($sql)>0) {
    ?><option value="">ประเภทสินค้าย่อย</option><?
    foreach (select_tbz($sql) as $row) {
      ?><option value="<?=$row['ID_type'];?>"><?=$row['name_type'];?></option><?
    }
  }else {
    ?><option value="0">ไม่มีประเภทสินค้าย่อย</option><?
  }
}




/////////////////////////////// Sl Onsite
///// sale view service ---- >admin
if($_POST["post"]=="sale-view-service"){
	$sqll = " SELECT *
      			FROM service_sale_pro
      			WHERE service_id = '".$_POST["service_id"]."'; ";
	if(select_numz($sqll)>0){ $val="";
		foreach(select_tbz($sqll) as $row){


			echo $row['type_service_id']."|||".
           $row['date_start']."|||".
           $row['date_end']."|||".
           $row['area_sale']."|||".
           $row['province_id']."|||".
           $row['member_id']."|||".
           $row['contact_name_service']."|||".
           $row['comment']."|||".
           $row['remark']."|||".
           $row['admin_comment']."|||";


			$sqlz = "SELECT path_photo
							FROM service_photo
							WHERE service_id = '".$_POST["service_id"]."' ";
			$p = select_numz($sqlz);
			if($p>0){
					if($p==1){ $pp='12'; }elseif($p==2){$pp='6';}elseif($p==3){$pp='4';}elseif($p==4) {$pp='3';}
					$val .="<div class='row' style='margin:0px;'>";
					foreach(select_tbz($sqlz) as $ro){
            $ex = explode("/",$ro['path_photo']);
            $site = "";
            if ($ex[0]=="photo") {
              $site = "http://www.zynekcctv.com/servicepro/".$ro['path_photo'];
            }else {
              $site = SITE_URL.$ro['path_photo'];
            }
							$val .= "<a href='".$site."' target='_blank' style='padding:0px !important;' class='col-xs-$pp '><img src='".$site."' class='col-xs-12 img-thumbnail' style='padding:3px;'  ></a>";
					}
					$val .="</div>";
			}else{
					$val = "ไม่มีรูปภาพ";
			}
      echo $val;
		}
	}else{
		echo " ไม่สามารถแสดงข้อมูลได้ ";
	}

}
///// sale view service ---- >admin
if($_POST["post"]=="sale-view-service-admin"){
	$sqll = " SELECT *
      			FROM service_sale_pro
      			WHERE service_id = '".$_POST["service_id"]."'; ";
	if(select_numz($sqll)>0){ $val="";
		foreach(select_tbz($sqll) as $row){


			echo $row['type_service_id']."|||".
           date_($row['date_start'])."|||".
           date_($row['date_end'])."|||".
           $row['area_sale']."|||".
           $row['province_id']."|||".
           $row['member_id']."|||".
           $row['contact_name_service']."|||".
           $row['comment']."|||".
           $row['remark']."|||".
           $row['admin_comment']."|||";


			$sqlz = "SELECT path_photo
							FROM service_photo
							WHERE service_id = '".$_POST["service_id"]."' ";
			$p = select_numz($sqlz);
			if($p>0){
					if($p==1){ $pp='12'; }elseif($p==2){$pp='6';}elseif($p==3){$pp='4';}elseif($p==4) {$pp='3';}
					$val .="<div class='row' style='margin:0px;'>";
					foreach(select_tbz($sqlz) as $ro){
            $ex = explode("/",$ro['path_photo']);
            $site = "";
            if ($ex[0]=="photo") {
              $site = "http://www.zynekcctv.com/servicepro/".$ro['path_photo'];
            }else {
              $site = SITE_URL.$ro['path_photo'];
            }
							$val .= "<a href='".$site."' target='_blank' style='padding:0px !important;' class='col-xs-$pp '><img src='".$site."' class='col-xs-12 img-thumbnail' style='padding:3px;'  ></a>";
					}
					$val .="</div>";
			}else{
					$val = "ไม่มีรูปภาพ";
			}
      echo $val;
		}
	}else{
		echo " ไม่สามารถแสดงข้อมูลได้ ";
	}

}
///// Sale-Service-Schedule
if ($_POST['post']=="Sale-Service-Schedule") {
  // code...
}
//// delete Sale
if($_POST["post"]=="delete_service"){
	$sql = "DELETE FROM service_sale_pro WHERE ( service_id = '".$_POST["id"]."' ); ";
	if(delete_tbz($sql)==true){
    $sqlin = "SELECT * FROM service_photo WHERE ( service_id = '".$_POST["id"]."' )";
    if (select_numz($sqlin)>0) {$i=0;
      foreach (select_tbz($sqlin) as $value) {
        if (unlink("../../../file/sale_upload/".$vale['path_photo'])) {
          $i = $i+1;
        }
      }
    }
		$sql = "DELETE FROM service_photo WHERE ( service_id = '".$_POST["id"]."' );  ";
		if(delete_tbz($sql)==true){
      ?>C|||
        <div class='alert alert-success alert-dismissible' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  						<span aria-hidden='true'>&times;</span>
  					</button>ลบข้อมูล <?=$i!=0?"และรูปภาพ : ".$i." รายการ":"";?> เรียบร้อย.
        </div>
      <?
		}else{
      ?>NC|||
        <div class='alert alert-danger alert-dismissible' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  						<span aria-hidden='true'>&times;</span>
  					</button>ไม่สามารถลบข้อมูลรูปภาพได้.
        </div>
      <?
		}
	}else{
    ?>NC|||
      <div class='alert alert-danger alert-dismissible' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>ไม่สามารถลบข้อมูลได้.
      </div>
    <?
	}
}
//// sale service ------> admin update
if($_POST["post"]=="admin_update_comment_service"){
	$sql = "UPDATE service_sale_pro
				    SET  admin_comment = '".$_POST["admin_comment"]."',
					       admin_by_id = '".base64url_decode($_COOKIE[$CookieID])."'
			WHERE service_id = '".$_POST["service_id"]."'; ";
	if(update_tbz($sql)==true){
		//$sql = "DELETE FROM service_photo WHERE service_id = '".$_POST["service_id"]."' ";
		//delete_tbz($sql);
    ?>C|||
      <div class='alert alert-success alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>เพิ่มข้อเสนอแนะ เรียบร้อย.
      </div>
    <?
	}else{
		?>NC|||
      <div class='alert alert-danger alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>ไม่สามารถเพิ่มข้อเสนอแนะได้.
      </div>
    <?
	}
}





///// sale view plan
if($_POST["post"]=="sale-plan-view-service"){
	$sqll = " SELECT *
      			FROM service_sale_plan
      			WHERE (plan_id = '".$_POST["plan_id"]."'); ";
	if(select_numz($sqll)>0){ $val="";
		foreach(select_tbz($sqll) as $row){
			echo $row['type_area']."|||".
           date_($row['str_date'])."|||".
           date_($row['end_date'])."|||".
           $row['province_id']."|||".
           $row['member_id']."|||".
           $row['detail_plan']."|||".
           $row['type_service_id'];
		}
	}else{
		echo " ไม่สามารถแสดงข้อมูลได้ ";
	}

}
///// sale view plan
if($_POST["post"]=="sale-plan-view-service-for-edit"){
	$sqll = " SELECT *
      			FROM service_sale_plan
      			WHERE (plan_id = '".$_POST["plan_id"]."'); ";
	if(select_numz($sqll)>0){
		foreach(select_tbz($sqll) as $row){
			echo $row['type_area']."|||".
           $row['str_date']."|||".
           $row['end_date']."|||".
           $row['province_id']."|||".
           $row['member_id']."|||".
           $row['detail_plan']."|||".
           $row['type_service_id'];
		}
	}else{
		echo " ไม่สามารถแสดงข้อมูลได้ ";
	}

}
////  sale update plan
if ($_POST['post']=="update_sale_serive_plan") {
  $sql = "UPDATE service_sale_plan
            SET  type_service_id = '".$_POST["type_service_id"]."',
                 str_date = '".$_POST["str_date"]."',
                 end_date = '".$_POST["end_date"]."',
                 type_area = '".$_POST["area_plan"]."',
                 province_id = '".$_POST["province_id"]."',
                 member_id = '".$_POST["branchpro"]."',
                 detail_plan = '".$_POST["detail_plan"]."'
      WHERE ( plan_id = '".$_POST["plan_id"]."' ); ";
  if(update_tbz($sql)==true){
    ?>C|||
      <div class='alert alert-success alert-dismissible' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>เปลี่ยนแปลงข้อมูล เรียบร้อย.
      </div>
    <?
  }else{
    ?>NC|||
      <div class='alert alert-danger alert-dismissible' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>ไม่สามารถเปลี่ยนแปลงข้อมูลได้.
      </div>
    <?
  }
}
//// sale delete plan
if ($_POST['post']=="delete_sale_plan") {
  $sql = "DELETE FROM service_sale_pro WHERE ( service_id = '".$_POST["id"]."' ); ";
	if(delete_tbz($sql)==true){
    ?>C|||
      <div class='alert alert-success alert-dismissible' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>ลบข้อมูลการวางแผนงาน เรียบร้อย.
      </div>
    <?
  }else {
    ?>NC|||
      <div class='alert alert-danger alert-dismissible' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>ไม่สามารถลบข้อมูลได้.
      </div>
    <?
  }
}





///// view leave
if ($_POST['post']=="LeaveView") {
  $sql = "SELECT *
          FROM z_hr_leave zhl
          INNER JOIN admin a ON ( zhl.admin_id = a.ID_admin )
          WHERE zhl.leave_id = '".$_POST['value']."'; ";
  if (select_numz($sql)>0) {
    foreach (select_tbz($sql) as $row) {
      echo $row['type_leave_id']."|||".
           $row['str_date']."|||".
           $row['end_date']."|||".
           $row['str_time']."|||".
           $row['end_time']."|||".
           $row['amount_leave']."|||".
           $row['detail_leave']."|||".

           $row['status_leave']."|||".
           $row['detail_status_leave']."|||";
      if (!empty($row['file_refer']) || $row['file_refer']!="") {
        echo SITE_URL."file/hr/".$row['file_refer']."|||";
      }else {
        echo "#|||";
      }
      echo $row['name_admin']."|||";



    }
  }
}
/// proce leave
if ($_POST['post']=="LeaveSetProve") {
  $sql = "UPDATE z_hr_leave
            SET  status_leave  = '".$_POST['status_prove']."',
                 detail_status_leave   = '".$_POST['detailleave']."',
                 admin_approve_id   = '".base64url_decode($_COOKIE[$CookieID])."'
          WHERE leave_id = '".$_POST['leaveid']."'; ";
 if (update_tbz($sql)==true) {
   ?>
   <div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ยืนยันสำเร็จ.
   </div>
   <?
 }else {
   ?>
   <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ยืนยันไม่สำเร็จ. <?=$sql;?>
   </div>
   <?
 }
}
/// update leave
if ($_POST['post']=="LeaveUpdate") {
  $sql = "UPDATE leave
            SET  type_leave_id  = '".$_POST['typeleave']."',
                 str_date   = '".$_POST['strdate']."',
                 end_date   = '".$_POST['enddate']."',
                 str_time   = '".$_POST['strtime']."',
                 end_time   = '".$_POST['endtime']."',
                 amount_leave   = '".$_POST['amountleave']."',
                 detail_leave   = '".$_POST['detailleave']."'
          WHERE leave_id = '".$_POST['leaveid']."'; ";
 if (update_tbz($sql)==true) {
   ?>
   <div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เปลี่ยนแปลงข้อมูลสำเร็จ.
   </div>
   <?
 }else {
   ?>
   <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ เปลี่ยนแปลงข้อมูลได้.
   </div>
   <?
 }
}
//// delete Leave
if ($_POST['post']=="LeaveDelete") {
  $sql = "DELETE FROM z_hr_leave WHERE leave_id = '".$_POST['value']."'; ";
  if (delete_tbz($sql)==true) {
    ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ลบข้อมูลสำเร็จ.
    </div>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถ ลบข้อมูลได้.
    </div>
    <?
  }
}



/// view permission prove
if ($_POST['post']=="PermissionProveView") {
  $sql = "SELECT *
          FROM z_hr_permission_prove
          WHERE z_permission_id = '".$_POST['value']."'; ";
  if (select_numz($sql)>0) { $i=0;
    foreach (select_tbz($sql) as $row) {
      if ($i==0) {
        echo $row['admin_id'];
      }else {
        echo "|||".$row['admin_id'];
      }
    }
  }
}







////// /Forecast
/// Forecast View Schedule
if ($_POST['post']=="ForecastViewSchedule") {
  $sql = "SELECT *
          FROM for_schedule
          WHERE ( schedule_id = '".$_POST['value']."')";
  if (select_numz($sql)>0) {
    foreach (select_tbz($sql) as $row) {
      echo $row['title_schedule']."|||".$row['str_date']."|||".$row['end_date']."|||".$row['schedule_status'];
    }
  }
}
/// Forecast Update Schedule
if ($_POST['post']=="ForecastUpdateSchedule") {
  $sql = "UPDATE for_schedule
            SET  title_schedule  = '".$_POST['_title']."',
                 str_date   = '".$_POST['_strdate']."',
                 end_date   = '".$_POST['_enddate']."',
                 schedule_status   = '".$_POST['_status']."',
                 admin_id   = '".base64url_decode($_COOKIE[$CookieID])."'
          WHERE schedule_id = '".$_POST['value']."'; ";
  if (update_tbz($sql)==true) {
   ?>
   1|||<div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เปลี่ยนแปลงข้อมูลสำเร็จ.
   </div>
   <?
  }else {
   ?>
   0|||<div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ เปลี่ยนแปลงข้อมูลได้. <?=$sql;?>
   </div>
   <?
  }
}
/// Forecast Delete Schedule
if ($_POST['post']=="ForecastDeleteSchedule") {
  $sql = "DELETE FROM for_schedule WHERE schedule_id = '".$_POST['value']."'; ";
  if (delete_tbz($sql)==true) {
   ?>
   1|||<div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ลบข้อมูลสำเร็จ.
   </div>
   <?
  }else {
   ?>
   0|||<div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ ลบข้อมูลได้. <?=$sql;?>
   </div>
   <?
  }
}



/// Forecast Update ProductView
if ($_POST['post']=="ForecastUpdateProductView") {
  $sql = "UPDATE for_stock
            SET  order_run  = '".$_POST['_order_run']."'
          WHERE ( stock_id = '".$_POST['value']."' ); ";
  if (update_tbz($sql)==true) {
   ?>
   1|||<div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เปลี่ยนแปลงข้อมูลสำเร็จ.
   </div>
   <?
  }else {
   ?>
   0|||<div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ เปลี่ยนแปลงข้อมูลได้. <?=$sql;?>
   </div>
   <?
  }
}
/// Forecast Delete ProductView
if ($_POST['post']=="ForecastDeleteProductView") {
  $sql = "UPDATE for_stock
            SET  order_run  = null
          WHERE ( stock_id = '".$_POST['value']."' ); ";
  if (delete_tbz($sql)==true) {
   ?>
   1|||<div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ลบข้อมูลสำเร็จ.
   </div>
   <?
  }else {
   ?>
   0|||<div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ ลบข้อมูลได้. <?=$sql;?>
   </div>
   <?
  }
}



//// Forecast Update Amount *** Update
if ($_POST['post']=="ForecastUpdateAmount") {
  $sql = "UPDATE for_taskdetail
            SET amount_last = '".$_POST['_amount']."',
                update_last = now()
          WHERE ( taskdetail_id = '".$_POST['value']."' )";
  if (update_tbz($sql)==true) {
    ?>
    1|||<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      เปลี่ยนแปลงข้อมูลสำเร็จ.
    </div>
    <?
   }else {
    ?>
    0|||<div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถ เปลี่ยนแปลงข้อมูลได้. <?=$sql;?>
    </div>
    <?
   }
}
//// Forecast Delete Task
if ($_POST['post']=="ForecastDeleteTask") {
  $sql = "SELECT *
          FROM for_task ft
          INNER JOIN for_taskdetail ftd ON ( ft.task_id = ftd.task_id )
          WHERE ( taskdetail_id = '".$_POST['value']."' )";
  if (select_numz($sql)>1) {
    $sql = "DELETE FROM for_taskdetail WHERE taskdetail_id = '".$_POST['value']."'; ";
    if (delete_tbz($sql)==true) {
     ?>
     1|||<div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <h4><i class="icon fa fa-warning"></i> Alert!</h4>
       ลบข้อมูลสำเร็จ.
     </div>
     <?
    }else {
     ?>
     0|||<div class="alert alert-warning alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <h4><i class="icon fa fa-warning"></i> Alert!</h4>
       ไม่สามารถ ลบข้อมูลได้. <?=$sql;?>
     </div>
     <?
    }
  }else {
    foreach (select_tbz($sql) as $row) {
      $sql        = "DELETE FROM for_task WHERE task_id = '".$row['task_id']."'; ";
      $sqldetail  = "DELETE FROM for_taskdetail WHERE task_id = '".$row['task_id']."'; ";
      if (delete_tbz($sql)==true && delete_tbz($sqldetail)==true) {
       ?>
       1|||<div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <h4><i class="icon fa fa-warning"></i> Alert!</h4>
         ลบข้อมูลสำเร็จ.
       </div>
       <?
      }else {
       ?>
       0|||<div class="alert alert-warning alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <h4><i class="icon fa fa-warning"></i> Alert!</h4>
         ไม่สามารถ ลบข้อมูลได้. <?=$sql;?>
       </div>
       <?
      }

    }
  }



}


/// update stock
if ($_POST['post']=="ForecastUpdateStock") {
  $sql = "UPDATE for_stock
            SET
                  amount_last  = '".$_POST['_amount']."',
                  update_last  = now()
          WHERE ( stock_id = '".$_POST['value']."' ); ";
  if (update_tbz($sql)==true) {
   ?>
   1|||<div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     เปลี่ยนแปลงข้อมูลสำเร็จ.
   </div>
   <?
  }else {
   ?>
   0|||<div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ  เปลี่ยนแปลงข้อมูลได้. <?=$sql;?>
   </div>
   <?
  }
}
/// delete stock
if ($_POST['post']=="ForecastDeleteStock") {
  $sql = "DELETE FROM for_stock WHERE ( stock_id = '".$_POST['value']."' ); ";
  if (delete_tbz($sql)==true) {
   ?>
   1|||<div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ลบข้อมูลสำเร็จ.
   </div>
   <?
  }else {
   ?>
   0|||<div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
     <h4><i class="icon fa fa-warning"></i> Alert!</h4>
     ไม่สามารถ ลบข้อมูลได้. <?=$sql;?>
   </div>
   <?
  }
}


if ($_POST['post']=="feedback-setStatus") {
  $sql = "UPDATE pr_feedback
            SET fb_comment = '".htmlspecialchars($_POST['txt_detail'],ENT_QUOTES)."',
                fb_status = '1'
          WHERE ( feedback_id = '".$_POST['feedbackid']."' )";
  if (update_tbz($sql)==true) {
    ?>C|||<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      เพิ่มข้อมูลตรวจสอบสำเร็จ.
    </div>
    <?
   }else {
    ?>0|||<div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถ เพิ่มข้อมูลตรวจสอบได้. <?=$sql;?>
    </div>
    <?
   }
}



?>
