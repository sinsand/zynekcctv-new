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
  setcookie($CookieID, null, -1,'/');
  setcookie($CookieName, null, -1,'/');
  setcookie($CookieGroup, null, -1,'/');
  setcookie($CookieType, null, -1,'/');

  unset($_COOKIE[$CookieID]);
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
                     m.non_active = '0' ); ";
    if (select_numz($sql)>0) {
      foreach (select_tbz($sql) as $row) {
        if ($row['mem_group_name']=="Delete" || $row['mem_group_name']=="Non-Active" || $row['mem_group_name']=="Remove" ) {
            $sql_log = " INSERT INTO log_login VALUES(0,'".$row['user_new']."',now(),0);";
            insert_tbz($sql_log);
            ?>
            0|||<p class="text-center" style="padding:15px 0;color:#f00;"><i class="fa fa-shield"></i> ขณะนี้ท่านขาดการติดต่อกับบริษัทเป็นเวลานาน กรุณาติดต่อ ฝ่ายขาย 02-274-1389 กด 1 </p>
            <?
        }else {
            $_SESSION[$SessionID] = base64url_encode($row['member_id']);
            $_SESSION[$SessionName] = base64url_encode($row['company']);
            $_SESSION[$SessionGroup] = base64url_encode($row['mem_group_name']);
            $_SESSION[$SessionType] = base64url_encode("Customer");

            setcookie($CookieID, base64url_encode($row['member_id']), time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($CookieName, base64url_encode($row['company']), time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($CookieGroup, base64url_encode($row['mem_group_name']), time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie($CookieType, base64url_encode("Customer"), time() + (86400 * 30), "/"); // 86400 = 1 day

            $sql_log = " INSERT INTO log_login VALUES(0,'".$row['user_new']."',NOW(),0);";
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
                     m.non_active = '0' ); ";
    if (select_numz($sql)>0) {
      foreach (select_tbz($sql) as $row) {
        $_SESSION[$SessionID] = base64url_encode($row['member_id']);
        $_SESSION[$SessionName] = base64url_encode($row['company']);
        $_SESSION[$SessionGroup] = base64url_encode($row['mem_group_name']);
        $_SESSION[$SessionType] = base64url_encode("Customer");

        //setcookie($CookieID, base64url_encode($row['member_id']), time() + (86400 * 30), "/"); // 86400 = 1 day
        //setcookie($CookieName, base64url_encode($row['company']), time() + (86400 * 30), "/"); // 86400 = 1 day
        //setcookie($CookieGroup, base64url_encode($row['mem_group_name']), time() + (86400 * 30), "/"); // 86400 = 1 day
        //setcookie($CookieType, base64url_encode("Customer"), time() + (86400 * 30), "/"); // 86400 = 1 day

        $sql_log = " INSERT INTO log_login VALUES(0,'".$row['user_new']."',NOW(),0);";
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

  if (!empty($_POST['member'])) {
    $Where = " (a.ID_admin = '".$_POST['member']."') ";
  }
  if (!empty($_POST['typeleave'])) {
    $Where = " (zhtl.type_leave_id = '".$_POST['typeleave']."') ";
  }
  if (!empty($_POST['str_date']) && !empty($_POST['end_date'])) {
    $Where = " (( zhl.str_date BETWEEN  '".$_POST['str_date']."' AND  '".$_POST['end_date']."') AND
               ( zhl.end_date BETWEEN  '".$_POST['str_date']."' AND  '".$_POST['end_date']."'))
             ";
  }else {
    if (!empty($_POST['str_date'])) {
      $Where = " ( zhl.str_date = '".$_POST['str_date']."' ";
    }
    if (!empty($_POST['end_date'])) {
      $Where = " ( zhl.end_date = '".$_POST['end_date']."') ";
    }
  }

  $sql = "SELECT *
          FROM z_hr_leave zhl
          INNER JOIN  admin a ON ( a.ID_admin = zhl.admin_id )
          INNER JOIN  z_hr_type_leave zhtl ON ( zhtl.type_leave_id = zhl.type_leave_id )
          WHERE
          ORDER BY zhl.create_date DESC";


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






//// Sale Add
if(isset($_POST["Submit_SaleAdd"])){
	$sql = "INSERT INTO service_sale_pro
            VALUES(0,
    					".$_COOKIE[$CookieID].",
    					'".$_POST["date_str_service"]."',
    					'".$_POST["date_end_service"]."',
    					'".$_POST["branchpro"]."',
    					'".$_POST["contact_name"]."',
    					'".$_POST["detail"]."',
    					NULL,
    					NULL,
    					'".$_POST["remark"]."',
    					'".$_POST["date_service"]."',
    					'".$_POST["province"]."',
    					'".$_POST["ddlGeo"]."',
    					now()
            );";
	if(insert_tbz($sql)==true){
		$sql = "SELECT MAX(service_id) FROM service_sale_pro  LIMIT 1;";
		if(select_tbz($sql)>0){
			foreach(select_tbz($sql)as $rowin){

				for($i=0;$i<count($_FILES["photo"]["name"]);$i++){
					if($_FILES["photo"]["name"][$i] != ""){
						$images = $_FILES["photo"]["tmp_name"][$i];
						$temp = explode(".", $_FILES["photo"]["name"][$i]); ///  Explode
						$new_images = $rowin[0]."-".$i.".".end($temp);   /// Change name

						copy($images,"file/sale/".$new_images);
						$width=1000; //*** Fix Width & Heigh (Autu caculate) ***//
						$size=GetimageSize($images);
						$height=round($width*$size[1]/$size[0]);
						$images_orig = ImageCreateFromJPEG($images);
						$photoX = ImagesX($images_orig);
						$photoY = ImagesY($images_orig);
						$images_fin = ImageCreateTrueColor($width, $height);
						ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
						ImageJPEG($images_fin,"file/sale/".$new_images);
						ImageDestroy($images_orig);
						ImageDestroy($images_fin);

						$sqll = "INSERT INTO service_photo VALUES(0,".$rowin[0].",'file/sale/".$new_images."',now());";
						insert_tbz($sqll);
						$path_img += 1;
					}
				}
			}
		}
		if($path_img!=0){
			$pa = "Upload $path_img  Photo.";
		}
		echo "<div class='alert alert-success alert-dismissible' role='alert'>
  					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>เพิ่มรายการเยี่ยมชมลูกค้า เสร็จสิ้น. $pa
			   </div>";
	}else{
		echo "<div class='alert alert-danger alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>ไม่สามารถเพิ่มรายการเยี่ยมลูกค้าได้.</div>";
	}
}
/// View Proince on Sale
if($_POST["post"]=="ViewProvinceOnSale"){
		$sql = "SELECT sp.ID_province,sp.name_province
						FROM sales_name sn
						INNER JOIN sales_area sa ON sn.ID_area = sa.ID_area
						INNER JOIN sales_province sp ON sa.ID_area = sp.ID_area
						WHERE sa.sign_area = '".$_POST["value"]."'
						GROUP BY  sp.ID_province,sp.name_province ";
		if(select_numz($sql)>0){
				?> <option value="">เลือกจังหวัด</option> <?
				foreach(select_tbz($sql)as $row){
						?> <option value="<?=$row[0];?>"><?=$row[1];?></option> <?
				}
		}else{

			if(	$_POST["value"]=="BC" ||
					$_POST["value"]=="BE" ||
					$_POST["value"]=="BN" ||
					$_POST["value"]=="BS" ||
					$_POST["value"]=="BW"){

					?>
					<option value="">เลือกจังหวัด</option>
					<option value="1">กรุงเทพมหานคร</option>
					<option value="2">สมุทรปราการ</option>
					<option value="3">นนทบุรี</option>
					<option value="4">ปทุมธานี</option>
					<?
			}

			if(empty($_POST["value"])){
				$sql = "SELECT ID_province,name_province	FROM sales_province ; ";
				if(select_numz($sql)>0){
						?> <option value="">เลือกจังหวัด</option> <?
						foreach(select_tbz($sql)as $ro){
								?> <option value="<?=$ro[0];?>"><?=$ro[1];?></option> <?
						}
				}
			}

		}


}
//// view table search Sale
if($_POST["post"]=="ViewSearchSaleOnTable"){


	/*if($_COOKIE["username"] != "62" and $_COOKIE["username"] != "119"){
		$WHERE[] = " ssp.admin_id = '".$_POST["date_str"]."' ";
	}*/

	if($_POST["date_str"] != "" and $_POST["date_end"] != ""){
		$WHERE[] = " ( ssp.date_start BETWEEN '".$_POST["date_str"]."' AND '".$_POST["date_end"]."' ) ";
	}else{
		if($_POST["date_str"] != "" ){
			$WHERE[] = " ( ssp.date_start = '".$_POST["date_str"]."' ) ";
		}
		if($_POST["date_end"] != "" ){
			$WHERE[] = " ( ssp.date_end  = '".$_POST["date_end"]."' ) ";
		}
	}
	if($_POST["contact_name"]!=""){
		$WHERE[] = " ( ssp.contact_name_service LIKE  '%".$_POST["contact_name"]."%' ) ";
	}
	if($_POST["branchpro"]!=""){
		$WHERE[] = " ( ssp.member_id = '".$_POST["branchpro"]."' ) ";
	}
	if($_POST["province"]!=""){
		$WHERE[] = " ( ssp.province_id =  '".$_POST["province"]."' ) ";
	}
	if($_POST["ddl_geo"]!=""){
		$WHERE[] = " ( ssp.area_sale =  '".$_POST["ddl_geo"]."' ) ";
	}
	if($_POST["type_service"]!=""){
		$WHERE[] = " ( ssp.type_service_id =  '".$_POST["type_service"]."' ) ";
	}

	$WHEREPRO = "";
	for($i=0;$i<count($WHERE);$i++){
		if($i==0){
			$WHEREPRO  .= " WHERE ".$WHERE[$i];
		}else{
			$WHEREPRO .= " AND ".$WHERE[$i];
		}
	}



					$sql = "SELECT m.company,ssp.contact_name_service,ssp.date_start,
								   ssp.date_end,p.name_province,ssp.time_stamp,ssp.service_id,tss.name_service,DATE_FORMAT(ssp.date_start,'%Y-%m'),ssp.admin_id
							FROM service_sale_pro ssp
							LEFT OUTER JOIN member m ON ssp.member_id = m.member_id
							LEFT OUTER JOIN sales_province p ON ssp.province_id = p.ID_province
							LEFT OUTER JOIN type_service_sale tss ON ssp.type_service_id = tss.ID_type_service
							$WHEREPRO
							ORDER BY ssp.date_start DESC ";
					//echo $sql;
	?>

  	 <h2 class="animated bounceInUp findMe go" data-sequence='500' style=" margin:10px 0;text-align: center;color: #AEAEAE;">
     	<span class="glyphicon glyphicon-search"></span> <label for="taskTitle">View Service</label>
		 </h2>
    <div class="table-responsive  animated bounceInUp findMe go" data-sequence='500' style=" background-color: rgb(255, 255, 255);">
      <div id="msg_show_box"></div>
      <!-- Table -->
      <table class="table table-striped table-hover">
        <thead>
            <tr style="font-weight:bold; border:solid 0; background:#FF0000; color:#fff;">
                <th>No.</th>
                <th>Company</th>
                <th>Contact</th>
                <th class="text-center">Type Service</th>
                <th class="text-center">StartDate-EndDate</th>
                <th class="text-center">Province</th>
                <th class="text-center">Date Stamp</th>
                <th class="text-center">Status</th>
                <th class="text-center">Manage</th>
             </tr>
         </thead>
         <tbody>
         <?
         if(select_numz($sql)>0){
                $i=1;
								$sum=0;
								$pre='';
                foreach(select_tbz($sql) as $row){




									$new = $row[8];
									if($old==''){
										?><tr>
												<td style="font-size: smaller;padding: 0px 0px 0px 10px;background-color:#060;color:#fff;padding: 5px 0px 5px 10px;" colspan="9"><?=day_format_month($row[8]);?> ผู้ดูแล <?=admin_by($row[9]);?></td>
											</tr><?
										$old = $new;
										$i=1;
										if($i==1){
											/*$sql_all = "SELECT service_id FROM service_sale_pro
														WHERE DATE_FORMAT(time_stamp,'%Y-%m') = '".$row[8]."'
														 ORDER BY time_stamp DESC  ";
											foreach(select_tbz($sql) as $eee){
												if($eee[0]==$row[8]){
													$sum = $sum +1;
												}
											}
											$i = select_numz($sql_all) - ($sum-1);
											//echo "($sql_all)".select_num($sql_all)." - ".($sum-1);
											if($i==0){
												$i=1;
											}*/
										}
									}else{
										if($old==$new){

										}else{
											?><tr>
													<td style="font-size: smaller;padding: 0px 0px 0px 10px;background-color:#060;color:#fff;padding: 5px 0px 5px 10px;" colspan="9"><?=day_format_month($row[8]);?> ผู้ดูแล <?=admin_by($row[9]);?></td>
												</tr><?
											$i=1;
										}
										$old = $new;
									}





         ?>
         <tr>
            <td><?=($i++);?></td>
            <td><?=$row['company'];?>
            <td><div style="white-space: nowrap; text-overflow: ellipsis;overflow: hidden;width: 250px;"><?=$row['contact_name_service'];?></div></td>
            <td class="text-center"><?=$row['name_service'];?>
            <td class="text-center"><label style="<?=sty($row[date_start],$row[date_end]);?>">(<?=day_format_month_sho($row['date_start']).")</label>-<label style='".sty($row[date_start],$row[date_end])."' >(".day_format_month_sho($row['date_end']);?>)</label></td>
            <td class="text-center"><?=$row['name_province'];?></td>
            <td class="text-center"><?=$row['time_stamp'];?></td>
            <td class="text-center"><?=chkstatus($row['service_id']);?></td>
            <td class="text-center">

                <div class="btn-group-md" role="group" aria-label="...">
                    <!--- View --->
                    <button type="button" data-toggle="modal" data-target=".bs-example-modal-sm-ed-service"
                    class="btn btn-default btn-xs view_service" bbb='view' id="<?=$row['service_id'];?>">
                        <span data-toggle="tooltip" title="View"  data-placement="left"
                        	class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                    <!--- Edit --->
                    <button type="button" data-toggle="modal"
                    data-target=".bs-example-modal-sm-ed-service" class="btn btn-default btn-xs view_service"
                    id="<?=$row['service_id'];?>" bbb='edit' <?=chkcomment($row['service_id']);?> >
                        <span data-toggle="tooltip" title="Edit"  data-placement="top"
                        	class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>
                    <!--- Delete --->
                    <button type="button" data-toggle="modal"
                    id="<?=$row['service_id'];?>" data-target=".bs-example-modal-sm-del"
                    class="btn btn-default btn-xs delete_service" <?=chkuser_comment($row['service_id']);?>>
                        <span data-toggle="tooltip" title="Delete"  data-placement="bottom"
                        	class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                    <!--- Comment --->
                    <button type="button" data-toggle="modal"
                    id="<?=$row['service_id'];?>" data-target=".bs-example-modal-sm-comment"
                    class="btn btn-default btn-xs admin_comment_service" <?=chkadmin($row['service_id']);?>>
                        <span data-toggle="tooltip" title="Admin Comment"  data-placement="top"
                        	class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </button>
                    <!--- Print --->
                    <a href="printpage.php?id=<?=$row['service_id'];?>" target="_blank"
                        type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Print"  data-placement="left" >
                        <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                    </a>
               </div>


            </td>
         </tr>
         <?
                }
         }else{
              ?>
          <tr>
            <td colspan="9">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> Not Have Data
                </div>
            </td>
         </tr>
              <?
                    }
         ?>
      </tbody>
      </table>
    </div>



		<!-- edit service -->
		<script>
  		$(document).ready(function(e) {
  			//// view service
  			$(".view_service").click(function(e) {

  				$("#e_date_service").val("");
  				$("#e_date_str_service").val("");
  				$("#e_date_end_service").val("");
  				$("#e_ddlGeo").val("");
  				$("#e_province").val("");
  				$("#e_branchpro").val("");
  				$("#e_contact_name").val("");
  				$("#e_detail_comment").val("");
  				$("#e_remark").val("");
  				$("#e_admin_comment").val("");
  				$("#e_photo").html("");


  				if($(this).attr("bbb") =='view'){
  					$(".e_update_service").addClass("disabled");
  				}else if($(this).attr("bbb") =='edit'){
  					$(".e_update_service").removeClass("disabled");
  				}

  				$(".e_update_service").attr("id",$(this).attr("id"));


  				$.post("../../jquery/others.php",
  				{
  					service_id : $(this).attr("id"),
  					post: "view_service"
  				},
  				function(d){
  					//alert(d);
  					var l = d.split("|||");
  					if(l.length>0){
  						$("#e_date_service").val(l[0]);
  						$("#e_date_str_service").val(l[1]);
  						$("#e_date_end_service").val(l[2]);
  						$("#e_ddlGeo").val(l[3]);
  						$("#e_province").val(l[4]);
  						$("#e_branchpro").val(l[5]);
  						$("#e_contact_name").val(l[6]);
  						$("#e_detail_comment").val(l[7]);
  						$("#e_remark").val(l[8]);
  						$("#e_admin_comment").val(l[9]);
  						$("#e_photo").html(l[10]);
  					}else{
  						$("#show_msg_update").html(d);
  					}
  				});
  		    });
  			// update service
  			$(".e_update_service").click(function(e) {
  		        if(
  					$("#e_date_service").val() !="" &&
  					$("#e_date_str_service").val() !="" &&
  					$("#e_date_end_service").val() !="" &&
  					$("#e_province").val() !="" &&
  					$("#e_branchpro").val() !="" &&
  					$("#e_contact_name").val() !="" &&
  					$("#e_detail_comment").val() !=""
  				){
  					$.post("../../jquery/others.php",
  					{
  						type_service_id : $("#e_date_service").val() ,
  						date_str : $("#e_date_str_service").val() ,
  						date_end : $("#e_date_end_service").val() ,
  						area_sale : $("#e_ddlGeo").val(),
  						province : $("#e_province").val(),
  						branchpro : $("#e_branchpro").val() ,
  						contact_name : $("#e_contact_name").val(),
  						detail_comment : $("#e_detail_comment").val(),
  						remark_comment : $("#e_remark").val(),
  						service_id    : $(this).attr("id"),
  						post  : "update_service"
  					},
  					function(d){
  						if(d=="Completed!"){
  							setTimeout(function(){
  								window.location = "?page=viewservice";
  							},500);
  						}else{
  							$("#show_msg_update").html(d);
  						}
  					});
  				}else{
  					$("#show_msg_update").html("Please insert value");
  				}
  		    });
  		});
		</script>
		<div class="modal fade bs-example-modal-sm-ed-service" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-md">
		    <div class="modal-content">
		      	<div class="modal-header"  style=" background-color:#F00; color:#FFF; border-radius:5px 5px 0 0">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">View Service</h4>
		      </div>
		      <div class="modal-body">


		        <form class="form-horizontal" style=" background-color: rgb(255, 255, 255);border-radius: 11px;padding-left: 30px;border: solid 1px #D2D2D2;padding-right: 30px;padding-bottom: 18px; padding-top:18px;">


		                  <div class="form-group">
		                        <label class="col-sm-4 control-label">Type Service</label>
		                      <div class="col-sm-8">
		                        <select class="form-control" id="e_date_service" required name="e_date_service">
		                        	<option value="" selected>ประเภทการเยี่ยม</option>
		                        	<?
									$sql_type = "SELECT * FROM type_service_sale " ;
									if(select_numz($sql_type)>0){
										foreach(select_tbz($sql_type) as $row){
											?><option value="<?=$row['ID_type_service'];?>"><?=$row['name_service'];?></option><?
										}
									}
									?>
		                        </select>
		                      </div>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Date Start Service</label>
		                      <div class="col-sm-8">
		                        <input type="text" class="form-control" required data-date-format="yyyy-mm-dd"
		                        	readonly style="background:#fff;" placeholder="<?=date("Y/m/d");?>" id="e_date_str_service"
		                            name="e_date_str_service">
		                      </div>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Date End Service</label>
		                      <div class="col-sm-8">
		                        <input type="text" class="form-control" required data-date-format="yyyy-mm-dd"
		                        	readonly  style="background:#fff;"placeholder="<?=date("Y/m/d");?>" id="e_date_end_service"
		                            name="e_date_end_service">
		                          <script>
								  	$(function () {
									  $("#e_date_str_service,#e_date_end_service").datepicker( );

									})
								  </script>
		                      </div>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Area Sale</label>
		                      <div class="col-sm-8">

		                        	<select id="e_ddlGeo" name="e_ddlGeo"  class="form-control" >
		                            	<option value="">เขตพื้นที่</option>
		                                <option value="BC">เขต BC</option>
		                                <option value="BE">เขต BE</option>
		                                <option value="BN">เขต BN</option>
		                                <option value="BS">เขต BS</option>
		                                <option value="BW">เขต BW</option>
		                                <option value="C1">เขต C1</option>
		                                <option value="C2">เขต C2</option>
		                                <option value="C3">เขต C3</option>
		                                <option value="C4">เขต C4</option>
		                                <option value="E1">เขต E1</option>
		                                <option value="E2">เขต E2</option>
		                                <option value="E3">เขต E3</option>
		                                <option value="FL">เขต FL</option>
		                                <option value="N1">เขต N1</option>
		                                <option value="N3">เขต N3</option>
		                                <option value="S1">เขต S1</option>
		                                <option value="S2">เขต S2</option>
		                                <option value="S3">เขต S3</option>
		                            </select>

		                      </div>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Province</label>
		                      <div class="col-sm-8">
		                        <select class="form-control" required name="e_province" id="e_province">
		                        	<option value="">จังหวัด</option>
									<?
									$sql_province = "SELECT * FROM province  ORDER BY PROVINCE_NAME ASC";
										if(select_numz($sql_province)>0){
											foreach(select_tbz($sql_province) as $row){
											?><option value="<?=$row['PROVINCE_ID'];?>"><?=$row['PROVINCE_NAME'];?></option><?
											}
										}
									?>
		                        </select>
		                      </div>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Branch</label>
		                      <div class="col-sm-8">
		                        <select class="form-control" id="e_branchpro" name="e_branchpro" >
		                        	<option value="" selected>สาขาโปรซีเคียว</option>
								<?
								$sqlpro = "SELECT m.member_id,m.company,mg.mem_group_name
										   FROM member m
		                   INNER JOIN sales_area sa ON  m.area_sale = sa.sign_area
		                   INNER JOIN sales_name sn ON sa.ID_area = sn.ID_area
		                   INNER JOIN member_group mg ON m.group_member = mg.mem_group
										   WHERE ( m.group_member = 'fr' OR m.group_member = 'Pa' OR m.group_member = 'Dl' OR m.group_member = 'In' OR m.group_member = 'Sh' )
		                   ORDER BY m.company ASC" ;
		             if(select_numz($sqlpro)>0){ $i=1;
									 ?> <option value="272">ลูกค้าอื่นๆ ในเครือบริษัท Zynek (Dealer)</option> <?
										foreach(select_tbz($sqlpro) as $row){
											?><option value="<?=$row['member_id'];?>">(<?=sprintf("%03d",($i++));?>) <?=$row['company'];?> (<?=$row['mem_group_name'];?>)</option><?
										}
									}
								?>
		                        </select>
		                      </div><br>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Contact Name</label>
		                      <div class="col-sm-8">
		                        <input type="text" class="form-control" required
		                        	placeholder="ชื่อบุคคลที่ติดต่อได้" name="e_contact_name" id="e_contact_name">
		                      </div><br>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Detail</label>
		                      <div class="col-sm-8">
		                        <textarea class="form-control" required placeholder="รายละเอียด" name="e_detail_comment" id="e_detail_comment"></textarea>
		                      </div>
		                  </div>
		                  <div class="form-group">
		                        <label class="col-sm-4 control-label">Remark</label>
		                      <div class="col-sm-8">
		                        <textarea class="form-control"  placeholder="หมายเหตุ" name="e_remark" id="e_remark"></textarea>
		                      </div>
		                  </div>
		                  <div class="form-group">
		                        <label class="col-sm-4 control-label">Photo</label>
		                      <div class="col-sm-8" id="e_photo">
		                      </div>
		                  </div>

		        <div class="row">
		      		<div class="modal-footer">


		                  <div class="form-group">
		                        <label class="col-sm-4 control-label">Comment Admin</label>
		                      <div class="col-sm-8">
		                        <textarea class="form-control" readonly placeholder="Comment Admin" id="e_admin_comment"></textarea>
		                      </div>
		                  </div>

		            <label id="show_msg_update"></label>
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
		            <button type="button" class="btn btn-red e_update_service"  id="">Update</button>
		            </div>
		        </div>
		            </form>


		      </div>
		    </div>
		  </div>
		</div>
		<!-- end edit Service --->


		<script>
  		$(document).ready(function(e) {
  			$('[data-toggle="tooltip"]').tooltip();
  			$(".delete_service").click(function(e) {
  				$(".btn_delete_popup").removeAttr("id");
  		        $(".btn_delete_popup").attr("id",$(this).attr("id"));
  		    });

  		    $(".btn_delete_popup").click(function(e) {
  		        $.post("../../jquery/others.php",
      				{
      					id : $(this).attr("id"),
      					post:"delete_service"
      				},
      				function(d){
      					$("#msg_show_box").html(d);
      					setTimeout(function(d){
      						location.reload();
      					},1000);
      				});
  		    });
  		});
		</script>
		<!--Alert Delete Popup -->
		<div class="modal fade bs-example-modal-sm-del" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="row" style="text-align:center; margin: 20px 0;">
		       <h2><span class="glyphicon glyphicon-trash animated tada go" aria-hidden="true"></span></h2>
		       <p>Delete Now !</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		        <button type="button" class="btn btn-success btn_delete_popup" data-dismiss="modal" id="">OK</button>
		      </div>
		    </div>
		  </div>
		</div>



		<!-- admin comment service -->
		<script>
  		$(document).ready(function(e) {




  			//// view admin service
  			$(".admin_comment_service").click(function(e) {

  				$("#c_date_service").val("");
  				$("#c_date_str_service").html("");
  				$("#c_date_end_service").html("");
  				$("#c_ddlGeo").val("");
  				$("#c_province").val("");
  				$("#c_branchpro").val("");
  				$("#c_contact_name").html("");
  				$("#c_detail_comment").val("");
  				$("#c_remark").val("");


  				$(".c_admin_update_service").attr("id",$(this).attr("id"));


  				$.post("../../jquery/others.php",
  				{
  					service_id : $(this).attr("id"),
  					post: "view_service"
  				},
  				function(d){
  					var l = d.split("|||");
  					if(l.length>0){
  						$("#c_date_service").val(l[0]);
  						$("#c_date_str_service").html(l[1]);
  						$("#c_date_end_service").html(l[2]);
  						$("#c_ddlGeo").val(l[3]);
  						$("#c_province").val(l[4]);
  						$("#c_branchpro").val(l[5]);
  						$("#c_contact_name").html(l[6]);
  						$("#c_detail_comment").val(l[7]);
  						$("#c_remark").val(l[8]);
  					}else{
  						$("#show_msg_update").html(d);
  					}
  				});
  		    });



  			// update comment admin service
  			$(".c_admin_update_service").click(function(e) {
  		        if(true){
  					$.post("../../jquery/others.php",
  					{
  						admin_comment : $("#c_admincomment").val(),
  						service_id    : $(this).attr("id"),
  						post  : "admin_update_comment_service"
  					},
  					function(d){
  						if(d=="Completed!"){
  							setTimeout(function(){
  								window.location = "?page=viewservice";
  							},500);
  						}else{
  							$("#show_msg_update_admin").html(d);
  						}
  					});
  				}else{
  					$("#show_msg_update_admin").html("Please insert value");
  				}
  		    });


  		});

		</script>
		<div class="modal fade bs-example-modal-sm-comment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-md">
		    <div class="modal-content">
		      	<div class="modal-header"  style=" background-color:#F00; color:#FFF; border-radius:5px 5px 0 0">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Admin Comment Service</h4>
		      </div>
		      <div class="modal-body">


		        <form class="form-horizontal" style=" background-color: rgb(255, 255, 255);border-radius: 11px;padding-left: 30px;border: solid 1px #D2D2D2;padding-right: 30px;padding-bottom: 18px; padding-top:18px;">


		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Type Service</label>
		                      <div class="col-sm-8">
		                        <select class="form-control" id="c_date_service" readonly>
		                        	<option value="" selected>ประเภทการเยี่ยม</option>
		                        	<?
									$sql_type = "SELECT * FROM type_service_sale " ;
									if(select_numz($sql_type)>0){
										foreach(select_tbz($sql_type) as $row){
											?><option value="<?=$row['ID_type_service'];?>"><?=$row['name_service'];?></option><?
										}
									}
									?>
		                        </select>
		                      </div>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Date Start Service</label>
		                      <div class="col-sm-8">
		                        <label class="form-control" id="c_date_str_service" readonly></label>
		                      </div>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Date End Service</label>
		                      <div class="col-sm-8">
		                        <label class="form-control" id="c_date_end_service"readonly></label>
		                      </div>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Area Sale</label>
		                      <div class="col-sm-8">
		                       	<label id="c_ddlGeo"class="form-control" readonly></label>
		                      </div>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Province</label>
		                      <div class="col-sm-8">
		                        <select class="form-control" id="c_province" readonly>
		                        	<option value="">จังหวัด</option>
									<?
									$sql_province = "SELECT * FROM province  ORDER BY PROVINCE_NAME ASC";
										if(select_numz($sql_province)>0){
											foreach(select_tbz($sql_province) as $row){
											?><option value="<?=$row['PROVINCE_ID'];?>"><?=$row['PROVINCE_NAME'];?></option><?
											}
										}
									?>
		                        </select>
		                      </div>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Branch</label>
		                      <div class="col-sm-8">
		                        <select class="form-control" id="c_branchpro" readonly>
		                        	<option value="" selected>สาขาโปรซีเคียว</option>
								<?
								$sqlpro = "SELECT m.member_id,m.company,mg.mem_group_name
										   FROM member m
		                   INNER JOIN sales_area sa ON  m.area_sale = sa.sign_area
		                   INNER JOIN sales_name sn ON sa.ID_area = sn.ID_area
		                   INNER JOIN member_group mg ON m.group_member = mg.mem_group
										   WHERE ( m.group_member = 'fr' OR m.group_member = 'Pa' OR m.group_member = 'Dl' OR m.group_member = 'In' OR m.group_member = 'Sh' )
											GROUP BY m.member_id,m.company,mg.mem_group_name
		                   ORDER BY m.company ASC" ;
		             if(select_numz($sqlpro)>0){ $i=1;

					 						?> <option value="272">ลูกค้าอื่นๆ ในเครือบริษัท Zynek (Dealer)</option> <?
										foreach(select_tbz($sqlpro) as $row){
											?><option value="<?=$row['member_id'];?>">(<?=sprintf("%03d",($i++));?>) <?=$row['company'];?> (<?=$row['mem_group_name'];?>)</option><?
										}
									}
								?>
		                        </select>
		                      </div><br>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Contact Name</label>
		                      <div class="col-sm-8">
		                        <label  class="form-control" id="c_contact_name" readonly></label>
		                      </div><br>
		                 </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Detail</label>
		                      <div class="col-sm-8">
		                        <textarea class="form-control" id="c_detail_comment" readonly></textarea>
		                      </div>
		                  </div>
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Remark</label>
		                      <div class="col-sm-8">
		                        <textarea class="form-control" id="c_remark" readonly></textarea>
		                      </div>
		                  </div>

		        <div class="row">
		      		<div class="modal-footer">
		                 <div class="form-group">
		                        <label class="col-sm-4 control-label">Admin Comment</label>
		                      <div class="col-sm-8">
		                        <textarea class="form-control"  placeholder="รายละเอียดของ Admin" id="c_admincomment"></textarea>
		                      </div>
		                  </div>
		            <label id="show_msg_update_admin"></label>
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
		            <button type="button" class="btn btn-red c_admin_update_service"  id="">Add Comment</button>
		            </div>
		        </div>
		            </form>


		      </div>
		    </div>
		  </div>
		</div>
		<!-- admin comment Service --->
    <?
}
////  view sale
if($_POST["post"]=="view_service"){
	$sqll = "SELECT  ssp.type_service_id,ssp.date_start,ssp.date_end,ssp.area_sale,ssp.province_id,
					ssp.member_id,ssp.contact_name_service,ssp.comment,ssp.remark,ssp.admin_comment
			FROM service_sale_pro  ssp
			WHERE ssp.service_id = '".$_POST["service_id"]."'; ";
	if(select_numz($sqll)>0){



		 $val="";
		foreach(select_tbz($sqll) as $row){
			$sqlz = "SELECT path_photo
							FROM service_photo
							WHERE service_id = '".$_POST["service_id"]."' ";
			$p = select_numz($sqlz);
			if($p>0){
					if($p==1){ $pp='12'; }elseif($p==2){$pp='6';}elseif($p==3){$pp='4';}elseif($p==4) {$pp='3';}
					$val .="<div class='row'>";
					foreach(select_tbz($sqlz) as $ro){
							$val .= "<a href='".$ro[path_photo]."' target='_blank' style='padding:0px !important;' class='col-xs-$pp '><img src='".$ro[path_photo]."' class='col-xs-12 img-thumbnail' style='padding:3px;'  ></a>";
					}
					$val .="</div>";
			}else{
					$val = "No Photo";
			}

			echo $row[0]."|||".$row[1]."|||".$row[2]."|||".$row[3]."|||".$row[4]."|||".
				 $row[5]."|||".$row[6]."|||".$row[7]."|||".$row[8]."|||".$row[9]."|||".$val;
		}
	}else{
		echo " Error, Cannot View Data.";
	}

}
//// update sale
if($_POST["post"]=="update_service"){
	$sql = "UPDATE service_sale_pro
				SET
					admin_id = '".$_COOKIE["username"]."',
					date_start = '".$_POST["date_str"]."',
					date_end = '".$_POST["date_end"]."',
					member_id = '".$_POST["branchpro"]."',
					contact_name_service = '".$_POST["contact_name"]."',
					comment = '".$_POST["detail_comment"]."',
					remark = '".$_POST["remark_comment"]."',
					type_service_id = '".$_POST["type_service_id"]."',
					province_id = '".$_POST["province"]."',
					area_sale = '".$_POST["area_sale"]."'
			WHERE service_id = '".$_POST["service_id"]."'";
	if(update_tbz($sql)==true){
		echo "Completed!";
	}else{
		echo "<div class='alert alert-danger alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>Cannot Update.
			   </div>";
	}


}
//// delete Sale
if($_POST["post"]=="delete_service"){
	$sql = "DELETE FROM service_sale_pro WHERE service_id = '".$_POST["id"]."'; ";
	if(delete_tbz($sql)==true){
		$sql = "DELETE FROM service_photo WHERE service_id = '".$_POST["id"]."';  ";
		if(delete_tbz($sql)==true){
			echo "<div class='alert alert-success text-right' role='alert'>Delete Successfully.</div>";
		}else{
			echo "<div class='alert alert-danger text-right' role='alert'>Cannot delete Photo</div>";
		}
	}else{
		echo "<div class='alert alert-danger text-right' role='alert'>Cannot Delete this task</div>";
	}
}
//// admin update sale
if($_POST["post"]=="admin_update_comment_service"){
	$sql = "UPDATE service_sale_pro
				SET admin_comment = '".$_POST["admin_comment"]."',
					admin_by_id = '".$_COOKIE["username"]."'
			WHERE service_id = '".$_POST["service_id"]."'; ";
	if(update_tbz($sql)==true){
		$sql = "DELETE FROM service_photo WHERE service_id = '".$_POST["service_id"]."' ";
		delete_tbz($sql);
		echo "Completed!";
	}else{
		echo "<div class='alert alert-danger alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>Cannot Add Comment.
			   </div>";
	}
}








///// view leave
if ($_POST['post']=="LeaveView") {
  $sql = "SELECT *
          FROM z_hr_leave
          WHERE leave_id = '".$_POST['value']."'; ";
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
        echo SITE_URL."file/hr/".$row['file_refer'];
      }else {
        echo "#";
      }
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

?>
