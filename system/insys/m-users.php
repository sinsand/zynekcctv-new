<div class="row">
    <div class="col-lg-3 col-xs-4">
      <div class="small-box bg-blue">
        <div class="inner">
          <h3>
            <?
              $sql = "SELECT ID_admin FROM admin ";
              echo number_format(select_numz($sql));
            ?>
          </h3>
          <p>พนักงานในระบบทั้งหมด</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
      </div>
    </div>
    <div class="col-lg-3 col-xs-4">
      <div class="small-box bg-green">
        <div class="inner">
          <h3>
            <?
              $sql = "SELECT ID_admin FROM admin  WHERE login_status = '1' ;";
              echo number_format(select_numz($sql));
            ?>
          </h3>
          <p>พนักงานที่ใช้งาน ในระบบทั้งหมด</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
      </div>
    </div>
    <div class="col-lg-3 col-xs-4">
      <div class="small-box bg-red">
        <div class="inner">
          <h3>
            <?
              $sql = "SELECT ID_admin FROM admin  WHERE login_status = '0' ;";
              echo number_format(select_numz($sql));
            ?>
          </h3>
          <p>พนักงานที่ไม่ได้ใช้งาน ในระบบทั้งหมด</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
      </div>
    </div>
</div>



<div class="row" id="">
  <div class="col-xs-12">
    <?
    if (isset($_POST['SubmitAdd'])) {
      if (($_POST['au_Password']==$_POST['au_RePassword'] ) && $_POST['au_Password']!="") {

        $sql = "SELECT * FROM admin WHERE (	username_admin = '".$_POST['au_Username']."');";
        if (select_numz($sql)>0) {
          ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-warning"></i> Alert!</h4>
              ไม่สามารถเพิ่มพนักงานใหม่ได้  เนื่องจากมีข้อมูลลูกค้าแล้ว โปรดตรวจสอบข้อมูลให้ถูกต้อง.
            </div>
          <?
        }else {
          $sql = "INSERT INTO admin
                      VALUES(0,
                          '".$_POST['au_UserName']."',
                          '".$_POST['au_Password']."',
                          '".base64url_encode($_POST['au_Password'])."',
                          '".$_POST['au_Email']."',
                          '".$_POST['au_NameAdmin']."',
                          '".$_POST['au_Group']."',
                          '".$_POST['au_Company']."',
                          '".$_POST['au_EmployeeId']."',
                          '".$_POST['au_TitleThai']."',
                          '".$_POST['au_FnameThai']."',
                          '".$_POST['au_LastThai']."',
                          '".$_POST['au_TitleEng']."',
                          '".$_POST['au_FnameEng']."',
                          '".$_POST['au_LastEng']."',
                          '".$_POST['au_Nickname']."',
                          '".$_POST['au_StartJob']."',
                          '".$_POST['au_Position']."',
                          '".$_POST['au_Department']."',
                          '0','0','0','0','0',
                          '".$_POST['au_StatusLogin']."'
                          ,now()
                      );"; /// add member
          if (insert_tbz($sql)==true) {
            ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-success"></i> Alert!</h4>
                เพิ่มรายการพนักงานใหม่ เสร็จสิ้น.
              </div>
            <?
          }else {
            ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-warning"></i> Alert!</h4>
              ไม่สามารถเพิ่มพนักงานใหม่ได้ โปรดตรวจสอบข้อมูลให้ถูกต้อง.
            </div>
            <?
          }
        }
      }else {
        ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            ไม่สามารถเพิ่มพนักงานใหม่ได้ โปรดตรวจสอบรหัสผ่านให้ถูกต้อง.
          </div>
        <?
      }
    }
    ?>
  </div>
</div>





<div class="row">
  <div class="col-xs-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#users_show" data-toggle="tab">ข้อมูลพนักงาน</a></li>
          <li><a href="#users_new" data-toggle="tab">เพิ่มข้อมูลพนักงานใหม่</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="users_show">
            <div class="row">
              <div class="col-xs-12">
                <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;">
                  <div class="col-xs-12" style="padding:0px;">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="กรอกข้อมูลค้นหา รุ่นสินค้า" id="SearchView" name="SearchView"  autocomplete="off">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">ค้นหา</button>
                        </span>
                    </div>
                  </div>
                </div>
                <div class="table-responsive col-xs-12" style="margin:15px 0 0 0;padding:0px;">
                  <table class="table table-striped table-bordered table-hover TableMember">
                    <thead>
                      <tr>
                        <th class="text-center">ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>Email</th>
                        <th>กลุ่ม</th>
                        <th>วันที่ลง</th>
                        <th class="text-center">สถานะ</th>
                        <th class="text-center">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                      $sql = "SELECT *
                              FROM admin a
                              LEFT OUTER JOIN admin_group ag ON ( a.admin_status = ag.ID_admin_group)
                              ORDER BY a.ID_admin DESC";
                      if (select_numz($sql)>0) { $i=1;
                        foreach (select_tbz($sql) as $row) {
                          ?>
                          <tr>
                            <td class="text-center"><?=$i;?></td>
                            <td class="text-left"><?=$row['name_admin']." (".$row['nickname'].")";?></td>
                            <td class="text-left"><?=$row['username_admin'];?></td>
                            <td class="text-left"><?=!empty($row['Email_admin'])||$row['Email_admin']!=""?$row['Email_admin']:"-";?></td>
                            <td class="text-left"><?=$row['name_status'];?></td>
                            <td class="text-left"><?=$row['timestamp_admin'];?></td>
                            <td class="text-center"><?=$row['login_status']=="1"?"<span class='label label-success'>เปิด</span>":"<span class='label label-danger'>ปิด</span>";?></td>
                            <td class="text-center">
                              <div class="btn-group" style="width: 117px;">
                                <button id="<?=$row['ID_admin'];?>" data-toggle="modal" data-target="#modal-set"   class="btn btn-warning click_status_member"><i class="fa fa-cogs"></i></button>
                                <button id="<?=$row['ID_admin'];?>" data-toggle="modal" data-target="#modal-edit"   class="btn btn-default click_edit_member"><i class="fa fa-pencil"></i></button>
                                <button id="<?=$row['ID_admin'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete_member"><i class="fa fa-trash-o"></i></button>
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


              </div>
            </div>




          </div>
          <div class="tab-pane" id="users_new">


            <div class="row">
              <div class="col-xs-12">
                <!--
                <form class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post" style="display:none;">
                  <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group" id="CheckUsername">
                      <label for="" class="col-md-3 control-label">รหัสเข้าใช้งาน :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Username" id="aUserName" name="aUserName"  minlength="4" required />
                        <span class="help-block" id="help-block"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">รหัสผ่าน :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="รหัสผ่าน" id="aPassword" name="aPassword" required />

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">รหัสผ่าน อีกครั้ง :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="รหัสผ่าน อีกครั้ง" id="aRePassword" name="aRePassword" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">ชื่อ - นามสกุล :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control"  placeholder="ชื่อ - นามสกุล" id="aFName" name="aFName" required  />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">E-mail  :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control"  placeholder="E-mail " id="aEmail" name="aEmail" required  />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">สถานะการใช้งาน  :</label>
                      <div class="col-md-9">
                        <select class="form-control" id="aStatusLogin" name="aStatusLogin" required>
                          <option value="">เลือกการใช้งาน</option>
                          <option value="1">เปิดใช้งาน</option>
                          <option value="0">ปิดใช้งาน</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">กลุ่มพนักงาน :</label>
                      <div class="col-md-9">
                        <select class="form-control" id="aGroup" name="aGroup" required >
                          <option value="">เลือกกลุ่มพนักงาน</option>
                          <?
                            $sql = "SELECT *
                                    FROM admin_group
                                    ORDER BY name_status ASC";
                            if (select_numz($sql)>0) {
                              foreach (select_tbz($sql) as $row) {
                                ?><option value="<?=$row['ID_admin_group'];?>"><?=$row['name_status'];?></option><?
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                  </div>
                  <div class="col-xs-12">
                      <button type="submit" class="btn btn-info " id="SubmitAdd" name="SubmitAdd">เพิ่มข้อมูล</button>
                      <button type="button" class="btn btn-default">เริ่มใหม่</button>
                    </div>
                </form>
                -->




                <!-- New User -->
                <form class="form-horizontal"  action="<?=$HostLinkAndPath;?>" method="post" autocomplete="off" >
                  <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_NameAdmin"  name="au_NameAdmin" placeholder="ชื่อ-นามสกุล" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="au_Email" name="au_Email"  placeholder="Email" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="form-group" id="CheckUsername">
                      <label for="inputName" class="col-sm-3 control-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_Username" name="au_Username" placeholder="Username" autocomplete="off" required>
                        <span class="help-block" id="help-block"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPass" class="col-sm-3 control-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="au_Password" name="au_Password" placeholder="Password" autocomplete="off"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputRePass" class="col-sm-3 control-label">Re-Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="au_RePassword" name="au_RePassword" placeholder="Re-Password" autocomplete="off"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">สถานะการใช้งาน  :</label>
                      <div class="col-md-9">
                        <select class="form-control" id="au_StatusLogin" name="au_StatusLogin" required>
                          <option value="">เลือกการใช้งาน</option>
                          <option value="1">เปิดใช้งาน</option>
                          <option value="0">ปิดใช้งาน</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">กลุ่มพนักงาน :</label>
                      <div class="col-md-9">
                        <select class="form-control" id="au_Group" name="au_Group" required >
                          <option value="">เลือกกลุ่มพนักงาน</option>
                          <?
                            $sql = "SELECT *
                                    FROM admin_group
                                    ORDER BY name_status ASC";
                            if (select_numz($sql)>0) {
                              foreach (select_tbz($sql) as $row) {
                                ?><option value="<?=$row['ID_admin_group'];?>"><?=$row['name_status'];?></option><?
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>




                    <hr />
                    <h4 class="text-center">ข้อมูลส่วนตัว</h4>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">รหัสพนักงาน</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_EmployeeId" name="au_EmployeeId" placeholder="รหัสพนักงาน" autocomplete="off"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">สังกัดบริษัท</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="au_Company" name="au_Company" required>
                          <option value="">เลือกสังกัด</option>
                          <option value="บริษัท โปรซีเคียว จำกัด">บริษัท โปรซีเคียว จำกัด</option>
                          <option value="บริษัท ซายเนค เทคโนโลยี่ จำกัด">บริษัท ซายเนค เทคโนโลยี่ จำกัด</option>
                          <option value="บริษัท อินเนค เทคโนโลยี่ จำกัด">บริษัท อินเนค เทคโนโลยี่ จำกัด</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">แผนก :</label>
                      <div class="col-md-9">
                        <select class="form-control" id="au_Department" name="au_Department" required >
                          <option value="">เลือกแผนก</option>
                          <?
                            $sql = "SELECT *
                                    FROM z_hr_department
                                    ORDER BY department_name ASC";
                            if (select_numz($sql)>0) {
                              foreach (select_tbz($sql) as $row) {
                                ?><option value="<?=$row['department_id'];?>"><?=$row['department_name'];?></option><?
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">วันเริ่มงาน</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_StartJob" name="au_StartJob" placeholder="วันเริ่มงาน" autocomplete="off"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">ตำแหน่ง</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_Position" name="au_Position" placeholder="ตำแหน่ง" autocomplete="off"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">ชื่อเล่น</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_Nickname" name="au_Nickname" placeholder="ชื่อเล่น" autocomplete="off"  required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">คำนำหน้าชื่อ ไทย</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_TitleThai" name="au_TitleThai" placeholder="คำนำหน้าชื่อ" autocomplete="off"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">ชื่อไทย</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_FnameThai" name="au_FnameThai" placeholder="ชื่อไทย" autocomplete="off"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">นามสกุลไทย</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_LastThai" name="au_LastThai" placeholder="นามสกุลไทย" autocomplete="off"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">คำนำหน้าชื่อ อังกฤษ</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_TitleEng" name="au_TitleEng" placeholder="Title Name English"  autocomplete="off"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">ชื่ออังกฤษ</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_FnameEng" name="au_FnameEng" placeholder="FirstName English"  autocomplete="off"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-3 control-label">นามสกุลอังกฤษ</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="au_LastEng" name="au_LastEng" placeholder="LastName English" autocomplete="off"  required>
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
                        <button type="submit" name="SubmitNewAdmin" class="btn btn-danger">เพิ่มข้อมูลพนักงาน</button>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- New User -->

              </div>
            </div>

          </div>
       </div>
  </div>
</div>


<!--- Check Username -->
<script>
  $(document).ready(function() {

    $("#au_Username").keyup(function(e) {
      if ($(this).val().length >= 4) {
        $.post('../../new/jquery/others.php',
        {
          value : $(this).val(),
          post : "CheckUsername"
        },
        function(d){
          console.log("Para " + d);
          console.log("Value : " + $("#au_Username").val());
          if ( d == 'false') {
            $("#CheckUsername").removeClass('has-success');
            $("#CheckUsername").addClass('has-warning');
            $("#help-block").html("ไม่สามารถใช้งานได้");
          }else {
            $("#CheckUsername").removeClass('has-warning');
            $("#CheckUsername").addClass('has-success');
            $("#help-block").html("ใช้งานได้.");
          }
        });
      }else {
        $("#CheckUsername").removeClass('has-success');
        $("#CheckUsername").removeClass('has-warning');
        $("#CheckUsername").addClass('has-warning');
        $("#help-block").html("กรุณาใช้ a-z 0-9 จำนวน 4 ตัวอักษร ขึ้นไป");
      }
    });

  });
</script>


<!-- Search Table -->
<script>
  $(document).ready(function() {
    ////// Search For Table
      $("#SearchView").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($(".TableMember tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();
        });
      });
  });
</script>


<!-- edit set Member -->
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_status_member").click(function(e) {
      $(".SubmitUpdateSetMember").attr("id",$(this).attr("id"));
      $.post("../../new/jquery/others.php",
      {
        value : $(this).attr("id"),
        post  : "AdminView"
      },
      function(d) {
        var i = d.split("|||");
        $("#sm_UserName").val(i[0]);
        $("#sm_FName").val(i[1]);
        $("#sm_Email").val(i[2]);
        $("#sm_StatusLogin").val(i[4]);
      });
    });

    $(".SubmitUpdateSetMember").click(function(e) {
      if ( $("#sm_StatusLogin").val() != "" ) {

        $.post('../../new/jquery/others.php',
        {
          adminid   : $(this).attr("id"),
          adminlogin: $("#sm_StatusLogin").val(),
          post     : "AdminSetUpdate"
        },
        function(d) {
          $(".alert_update_set_member").html(d);
          setTimeout(function(){
            window.location.href = "<?=$HostLinkAndPath;?>";
          },2000);
        });
      }else {

      }
    });

  });
</script>
<div class="modal fade" id="modal-set" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-pencil"></i> แก้ไขข้อมูลการเข้าใช้งาน</h4>
      </div>

      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">

            <!-- Form -->
            <form class="form-horizontal">
              <div class="col-sm-12">
                <div class="form-group" id="e_CheckUsername">
                  <label for="" class="col-md-3 control-label">รหัสเข้าใช้งาน :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Username" id="sm_UserName" name="sm_UserName"  minlength="4" readonly />
                    <span class="help-block" id="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">ชื่อ - นามสกุล :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="ชื่อ - นามสกุล" id="sm_FName" name="sm_FName" readonly  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">E-mail  :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="E-mail " id="sm_Email" name="sm_Email"  readonly  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">สถานะการใช้งาน  :</label>
                  <div class="col-md-9">
                    <select class="form-control" id="sm_StatusLogin" name="sm_StatusLogin" >
                      <option value="">เลือกการใช้งาน</option>
                      <option value="1">เปิดใช้งาน</option>
                      <option value="0">ปิดใช้งาน</option>
                    </select>
                  </div>
                </div>

              </div>
            </form>
            <!-- Form -->

          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 alert_update_set_member">

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info SubmitUpdateSetMember">บันทึก</button>
      </div>

    </div>
  </div>
</div>
<!-- edit set Member -->



<!-- edit Member -->
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_edit_member").click(function(e) {
      $(".SubmitUpdateMember").attr("id",$(this).attr("id"));
      $.post("../../new/jquery/others.php",
      {
        value : $(this).attr("id"),
        post  : "AdminView"
      },
      function(d) {
        var i = d.split("|||");
        $("#em_UserName").val(i[0]);
        $("#em_FName").val(i[1]);
        $("#em_Email").val(i[2]);
        $("#em_Group").val(i[3]);
        $("#em_StatusLogin").val(i[4]);
      });
    });

    $(".SubmitUpdateMember").click(function(e) {
      if ( $("#em_UserName").val() != "" &&
           $("#em_FName").val() != "" &&
           $("#em_Email").val() != "" &&
           $("#em_Group").val() != "" &&
           $("#em_StatusLogin").val() != "" &&
           $("#em_Password").val() != "" &&
           $("#em_RePassword").val() != ""  ) {

          if ( $("#em_Password").val() == $("#em_RePassword").val()  ) {
            $.post('../../new/jquery/others.php',
            {
              adminid   : $(this).attr("id"),
              adminpass : $("#em_Password").val(),
              adminname : $("#em_FName").val(),
              adminemail: $("#em_Email").val(),
              admingroup: $("#em_Group").val(),
              adminlogin: $("#em_StatusLogin").val(),
              post     : "AdminUpdate"
            },
            function(d) {
              $(".alert_update_member").html(d);
              setTimeout(function(){
                window.location.href = "<?=$HostLinkAndPath;?>";
              },2000);
            });
          }else {

          }
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
        <h4 class="modal-title"><i class="fa fa-pencil"></i> แก้ไขข้อมูลพนักงาน</h4>
      </div>

      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">

            <!-- Form -->
            <form class="form-horizontal">
              <div class="col-sm-12">
                <div class="form-group" id="e_CheckUsername">
                  <label for="" class="col-md-3 control-label">รหัสเข้าใช้งาน :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Username" id="em_UserName" name="em_UserName"  minlength="4" readonly />
                    <span class="help-block" id="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">รหัสผ่าน :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="รหัสผ่าน" id="em_Password" name="em_Password"  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">รหัสผ่าน อีกครั้ง :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="รหัสผ่าน อีกครั้ง" id="em_RePassword" name="em_RePassword"  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">ชื่อ - นามสกุล :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="ชื่อ - นามสกุล" id="em_FName" name="em_FName"   />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">E-mail  :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="E-mail " id="em_Email" name="em_Email"   />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">สถานะการใช้งาน  :</label>
                  <div class="col-md-9">
                    <select class="form-control" id="em_StatusLogin" name="em_StatusLogin" >
                      <option value="">เลือกการใช้งาน</option>
                      <option value="1">เปิดใช้งาน</option>
                      <option value="0">ปิดใช้งาน</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">กลุ่มพนักงาน :</label>
                  <div class="col-md-9">
                    <select class="form-control" id="em_Group" name="em_Group"  >
                      <option value="">เลือกกลุ่มพนักงาน</option>
                      <?
                        $sql = "SELECT *
                                FROM admin_group
                                ORDER BY name_status ASC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['ID_admin_group'];?>"><?=$row['name_status'];?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>

              </div>
            </form>
            <!-- Form -->

          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 alert_update_member">

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info SubmitUpdateMember">บันทึก</button>
      </div>

    </div>
  </div>
</div>
<!-- edit Member -->



<!-- delete member -->
<script>
  $(document).ready(function() {

      $(".click_delete_member").click(function(e) {
        $(".da_DeleteMember").attr("id", $(this).attr("id"));
      });
      //// check delete
      $(".da_DeleteMember").click(function(e) {
        if ( $("#da_Pass_re").val() == "Admin" ) {
          $.post("../../new/jquery/others.php",
          {
            value : $(this).attr("id"),
            post : "AdminDelete"
          },
          function(data) {
              $("#View_data_delete").html(data);
              setTimeout(function(){
                window.location.href = "<?=$HostLinkAndPath;?>";
              },2000);
          });
        }else {

        }
      });

  });
</script>
<div class="modal fade" id="modal-delete" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color: #f00;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash-o" style=" color: #FFF"></i> ลบข้อมูล</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12 text-center">
            <div class="col-md-12" id="View_data_delete" style="margin:15px 0;padding:15px;">ยืนยัน การลบข้อมูล</div>
            <div class="col-md-12" style="padding:15px;">
              <input type="password" class="form-control text-center" placeholder="กรอกรหัสผ่าน เพื่อยืนยัน" id="da_Pass_re" name="da_Pass_re"  />
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background-color: white; text-align: center;">
        <button type="button" style="width: 48%;float:left;" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger da_DeleteMember">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- delete member -->
