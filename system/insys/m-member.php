<div class="row">
  <div class="col-xs-12">
    <?
      $sql = "SELECT mem_group,mem_group_name
              FROM  member_group
              WHERE mem_group IN ( SELECT group_member FROM member WHERE (status_member = 'Y') )";
      if (select_numz($sql)>0) {
        foreach (select_tbz($sql) as $row) {
          ?>
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
            <div class="small-box bg-green">
              <div class="inner">
                <h3>
                  <?
                    $sql = "SELECT member_id FROM member WHERE ( status_member = 'Y' AND group_member = '".$row['mem_group']."' )";
                    echo number_format(select_numz($sql));
                  ?>
                </h3>
                <p>ลูกค้ากลุ่ม <?=$row['mem_group_name'];?></p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <?
        }
      }
    ?>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>
            <?
              $sql = "SELECT member_id FROM member ";
              echo number_format(select_numz($sql));
            ?>
          </h3>
          <p>ลูกค้าทั้งหมด</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
      </div>
    </div>
  </div>
</div>



<div class="row" id="">
  <div class="col-xs-12">
    <?
    if (isset($_POST['SubmitAdd'])) {
      $sql = "SELECT * FROM member WHERE (user_new = '".$_POST['aCodeSAP']."' OR username = '".$_POST['aCodeSAP']."' ) ;";
      if (select_numz($sql)>0) {
        ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            ไม่สามารถเพิ่มลูกค้าใหม่ได้  เนื่องจากมีข้อมูลลูกค้าแล้ว โปรดตรวจสอบข้อมูลให้ถูกต้อง.
          </div>
        <?
      }else {
        $aTypePart = explode('-',$_POST['aTypePart']);
        $sql = "INSERT INTO member
                    VALUES(0,
                        '".$_POST['aCodeSAP']."',
                        '".$_POST['aCodeSAP']."',
                        '".$_POST['aPassword']."',
                        '".base64url_encode($_POST['aPassword'])."',
                        '".$_POST['aCodeSAP']."',
                        'dXNlcg==',
                        '".$_POST['aTypeBusiness']."',
                        '".$_POST['aCompanyName']."',
                        '".$_POST['aAddress']."',
                        '".$_POST['aMobile']."',
                        '".$_POST['aFAX']."',
                        '".$_POST['aTelephone']."',
                        '".$_POST['aEmail']."',
                        '".$_POST['aContact']."',
                        '".$aTypePart[1]."',
                        '".$aTypePart[0]."',
                        '".$_POST['add_province']."',
                        '0','0','0','0','0','0','0','0',
                        '0000-00-00',
                        now(),
                        '0','0','0','0','0','0','0','0','0','0',
                        '".$_POST['aStatusLogin']."',
                        '0'
                    );"; /// add customer
        if (insert_tbz($sql)==true) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-success"></i> Alert!</h4>
              เพิ่มรายการลูกค้าใหม่ เสร็จสิ้น.
            </div>
          <?
        }else {
          ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            ไม่สามารถเพิ่มลูกค้าใหม่ได้ โปรดตรวจสอบข้อมูลให้ถูกต้อง.
          </div>
          <?
        }
      }
    }
    ?>
  </div>
</div>



<div class="row">
  <div class="col-xs-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#member_show" data-toggle="tab">ข้อมูลลูกค้า</a></li>
          <li><a href="#member_new" data-toggle="tab">เพิ่มข้อมูลลูกค้าใหม่</a></li>
          <li><a href="#member_search" data-toggle="tab">ค้นหาลูกค้า</a></li>
        </ul>
        <div class="tab-content">

          <div class="active tab-pane" id="member_show">
            <?
              $sql = "SELECT *
                      FROM member m
                      LEFT OUTER JOIN member_group mg ON ( m.group_member = mg.mem_group )
                      ORDER BY m.time_member ASC ";

              $Per_Page = 75;   // Per Page
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
              <div class="colxs-12">
                <div class="col-xs-12">
                  <nav>
                    <ul class="pagination">
                     <?
                        if($Prev_Page){
                          ?><li><a href="<?=SITE_URL_ADMIN;?>manage-member/<?=$Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?
                        }
                        for($i=1; $i<=$Num_Pages; $i++){
                          $Page1 = $Page-2;
                          $Page2 = $Page+2;
                          if($i != $Page && $i >= $Page1 && $i <= $Page2){
                            ?><li><a href="<?=SITE_URL_ADMIN;?>manage-member/<?=$i;?>"><?=$i;?></a></li><?
                          }else if($i==$Page){
                            ?><li class="active"><a href="#"><?=$i;?></a></li><?
                          }
                        }
                        if($Page!=$Num_Pages){
                          ?><li><a href="<?=SITE_URL_ADMIN;?>manage-member/<?=$Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?
                        }
                    ?>
                    </ul>
                  </nav>
                </div>
                <div class="table-responsive col-xs-12">

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
                      if (select_numz($sql)>0) { $i=1;
                        foreach (select_tbz($sql) as $row) {
                          ?>
                          <tr>
                            <td class="text-center"><?=($id_run++);?></td>
                            <td class="text-left"><?=$row['user_new'];?></td>
                            <td class="text-left"><?=$row['company'];?></td>
                            <td class="text-left"><?=$row['contact'];?></td>
                            <td class="text-left"><?=$row['phone'];?></td>
                            <td class="text-left"><?=$row['telephone'];?></td>
                            <td class="text-left"><?=$row['mem_group_name'];?></td>
                            <td class="text-left"><?=$row['status_member']=="Y"?"<span class='label label-success'>ใช้งาน</span>":"<span class='label label-danger'>ยกเลิก</span>";?></td>
                            <td class="text-center">
                              <div class="btn-group" style="width: 117px;">
                                <button id="<?=$row['member_id'];?>" data-toggle="modal" data-target="#modal-set"   class="btn btn-warning click_status_customer"><i class="fa fa-cogs"></i></button>
                                <button id="<?=$row['member_id'];?>" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit_customer"><i class="fa fa-pencil"></i></button>
                                <button id="<?=$row['member_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger click_delete_customer"><i class="fa fa-trash-o"></i></button>
                              </div>

                            </td>
                          </tr>
                          <?
                        }
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
                <div class="col-xs-12">
                  <nav>
                    <ul class="pagination">
                     <?
                        if($Prev_Page){
                          ?><li><a href="<?=SITE_URL_ADMIN;?>manage-member/<?=$Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?
                        }
                        for($i=1; $i<=$Num_Pages; $i++){
                          $Page1 = $Page-2;
                          $Page2 = $Page+2;
                          if($i != $Page && $i >= $Page1 && $i <= $Page2){
                            ?><li><a href="<?=SITE_URL_ADMIN;?>manage-member/<?=$i;?>"><?=$i;?></a></li><?
                          }else if($i==$Page){
                            ?><li class="active"><a href="#"><?=$i;?></a></li><?
                          }
                        }
                        if($Page!=$Num_Pages){
                          ?><li><a href="<?=SITE_URL_ADMIN;?>manage-member/<?=$Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?
                        }
                    ?>
                    </ul>
                  </nav>
                </div>

              </div>
            </div>

          </div>

          <div class="tab-pane" id="member_new">
            <div class="row">
              <div class="col-xs-12">
                <form class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post">
                  <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">รหัสลูกค้า :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="รหัสลูกค้า อ้างอิง ระบบ SAP" id="aCodeSAP" name="aCodeSAP"  required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">รหัสผ่าน :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="รหัสผ่าน" id="aPassword" name="aPassword" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">ชนิดธุรกิจ :</label>
                      <div class="col-md-9">
                        <select class="form-control" id="aTypeBusiness" name="aTypeBusiness" required >
                          <option value="">เลือกชนิดธุรกิจ</option>
                          <option value="บจก.">บจก.</option>
                          <option value="บมจ.">บมจ.</option>
                          <option value="หสม.">หสม.</option>
                          <option value="ร้าน">ร้าน</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">ชื่อบริษัท /ชื่อร้าน :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="ชื่อบริษัท /ชื่อร้าน" id="aCompanyName" name="aCompanyName"  required />
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">ที่อยู่ :</label>
                        <div class="col-md-9">
                          <textarea class="form-control" placeholder="ที่อยู่" id="aAddress" name="aAddress" placeholder="กรุณากรอกข้อมุลที่อยู่ให้ครบถ้วน" required ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="" class="col-md-3 control-label">จังหวัด :</label>
                       <div class="col-md-9">
                         <select class="form-control" id="add_province" name="add_province" required >
                           <option value="">เลือกจังหวัด</option>
                           <?
                           $sql = "SELECT * FROM province ORDER BY PROVINCE_NAME ASC";
                           if (select_numz($sql)>0) {
                             foreach (select_tbz($sql) as $row) {
                               ?><option value="<?=$row['PROVINCE_NAME'];?>"><?=$row['PROVINCE_NAME'];?></option><?
                             }
                           }
                           ?>
                         </select>
                       </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">โทรศัพท์ :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control"  placeholder="หมายเลขโทรศัพท์" id="aTelephone" name="aTelephone"  required  />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">เบอร์มือถือ :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control"  placeholder="เบอร์มือถือ" id="aMobile" name="aMobile"  required  />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">แฟกซ์ :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control"  placeholder="แฟกซ์" id="aFAX" name="aFAX"  required  />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">E-mail  :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control"  placeholder="E-mail " id="aEmail" name="aEmail"  required  />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">ชื่อผู้ติดต่อ :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control"  placeholder="ชื่อผู้ติดต่อ" id="aContact" name="aContact"  />
                      </div>
                    </div>
                    <!--
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">ประเภทธุรกิจ :</label>
                      <div class="col-md-9">
                        <select class="form-control" id="" required >
                          <option value="">เลือกประเภทธุรกิจ</option>
                        </select>
                      </div>
                    </div>
                    -->
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">ทุนจดทะเบียน :</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control"  placeholder="ทุนจดทะเบียน เช่น 5000000" required id="aRegister" name="aRegister"   />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">สถานะการใช้งาน :</label>
                      <div class="col-md-9">
                        <select class="form-control" name="aStatusLogin" id="aStatusLogin" required>
                          <option value="">เลือกสถานะการใช้งาน</option>
                          <option value="Y">เปิดใช้งาน</option>
                          <option value="N">ปิดใช้งาน</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-md-3 control-label">ประเภทกลุ่มลูกค้า :</label>
                      <div class="col-md-9">
                        <select class="form-control" name="aTypePart" id="aTypePart" required>
                          <option value="">เลือกประเภทกลุ่มลูกค้า</option>
                          <?
                            $sql = "SELECT * FROM member_group WHERE (mem_status = 'Y') ORDER BY mem_group_name ASC";
                            if (select_numz($sql)>0) {
                              foreach (select_tbz($sql) as $row) {
                                ?><option value="<?=$row['ID_mem_group']."-".$row['mem_group'];?>"><?=$row['mem_group_name'];?></option><?
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
              </div>
            </div>

          </div>

          <div class="tab-pane" id="member_search">

            <script type="text/javascript">
              $(document).ready(function() {

                $(".sm_province").change(function(e) {
                    $(this).searchCustomer();
                });

                $(".sm_typecustomer").change(function(e) {
                    $(this).searchCustomer();
                });

                $(".sm_statuscustomer").change(function(e) {
                    $(this).searchCustomer();
                });

                $(".sm_catbusiness").change(function(e) {
                    $(this).searchCustomer();
                });

                $(".sm_keyword_company").keypress(function(e) {
                  if (e.which == '13') {
                    $(this).searchCustomer();
                  }
                });
                $(".sm_keyword_code").keypress(function(e) {
                  if (e.which == '13') {
                    $(this).searchCustomer();
                  }
                });
                $(".sm_click_search_company").click(function(e) {
                   $(this).searchCustomer();
                });
                $(".sm_click_search_code").click(function(e) {
                   $(this).searchCustomer();
                });

                $.fn.searchCustomer = function() {
                  if ( $(".sm_keyword_company").val() == "" &&   $(".sm_keyword_code").val() == "" &&
                       $(".sm_province").val() == "" &&   $(".sm_typecustomer").val() == "" &&
                       $(".sm_statuscustomer").val() == "" &&   $(".sm_catbusiness").val() == ""  ) {
                    $("#ViewTableSearch").html("<div class='col-xs-12 text-center'>กรุณาเลือกการค้นหา.</div>");
                  }else {
                    $.post('../../../new/jquery/others.php',
                    {
                       smkeycom  : $(".sm_keyword_company").val(),
                       smkeycode  : $(".sm_keyword_code").val(),
                       smprovince  : $(".sm_province").val(),
                       smtypecus  : $(".sm_typecustomer").val(),
                       smstatuscus  : $(".sm_statuscustomer").val(),
                       smcatbus   : $(".sm_catbusiness").val(),
                       post : "CustomerSearchView"
                    },
                    function(data) {
                      setTimeout(function(){
                        //$("#ViewTableSearch").html("<div class='col-xs-12 text-center'>รอสักครู่... <i class='fa fa-refresh faa-spin animated' aria-hidden='true'></i></div>");
                      },1000);
                      $("#ViewTableSearch").html(data);
                    });
                  }
                };



              });
            </script>
            <style media="screen">
              #ViewTableSearch{margin-top: 25px; padding: 15px;}
            </style>
            <div class="row">
              <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-offset-1 col-md-8 col-offset-2 col-lg-8 col-lg-offset-2">
                <div class="col-sm-6" style="margin:15px 0 0 0;padding:0px;">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label for="" class="control-label">จังหวัด :</label>
                      <select class="form-control sm_province">
                        <option value="">เลือกจังหวัด</option>
                        <?
                        $sql = "SELECT * FROM province ORDER BY PROVINCE_NAME ASC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['PROVINCE_NAME'];?>"><?=$row['PROVINCE_NAME'];?></option><?
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label for="" class="control-label">ประเภทลูกค้า :</label>
                      <select class="form-control sm_typecustomer">
                        <option value="">เลือกประเภท</option>
                        <?
                          $sql = "SELECT * FROM member_group WHERE (mem_status = 'Y') ORDER BY mem_group_name ASC";
                          if (select_numz($sql)>0) {
                            foreach (select_tbz($sql) as $row) {
                              ?><option value="<?=$row['ID_mem_group'];?>"><?=$row['mem_group_name'];?></option><?
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6" style="margin:15px 0 0 0;padding:0px;">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label for="" class="control-label">สถานะใช้งาน :</label>
                      <select class="form-control sm_statuscustomer">
                        <option value="">สถานะ</option>
                        <option value="Y">เปิดใช้งาน</option>
                        <option value="N">ปิดใช้งาน</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label for="" class="control-label">ชนิดธุระกิจ :</label>
                      <select class="form-control sm_catbusiness" >
                        <option value="">เลือกชนิดธุรกิจ</option>
                        <option value="บจก.">บจก.</option>
                        <option value="บมจ.">บมจ.</option>
                        <option value="หสม.">หสม.</option>
                        <option value="ร้าน">ร้าน</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;">
                  <div class="col-xs-12 col-sm-6">
                    <label for="" class="control-label">กรอกชื่อบริษัท :</label>
                    <div class="input-group">
                        <input type="text" class="form-control sm_keyword_company" placeholder="กรอกข้อมูลค้นหา ชื่อบริษัท">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default sm_click_search_company">ค้นหา</button>
                        </span>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <label for="" class="control-label">กรอกรหัสบริษัท :</label>
                    <div class="input-group">
                        <input type="text" class="form-control sm_keyword_code" placeholder="กรอกข้อมูลค้นหา รหัส">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default sm_click_search_code">ค้นหา</button>
                        </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12" id="ViewTableSearch">
                <!-- Search table -->

                <!-- Search table -->
              </div>
            </div>


          </div>

       </div>
  </div>
</div>




<!-- edit set Customer -->
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_status_customer").click(function(e) {
      $(".SubmitUpdateSetCustomer").attr("id",$(this).attr("id"));
      $.post("../../new/jquery/others.php",
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

        $.post('../../new/jquery/others.php',
        {
          customerid   : $(this).attr("id"),
          cus_login    : $("#sc_StatusLogin").val(),
          post         : "CustomerSetUpdate"
        },
        function(d) {
          $(".alert_update_set_customer").html(d);
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
        <h4 class="modal-title"><i class="fa fa-pencil"></i> แก้ไขข้อมูลการเข้าใช้งาน ของลูกค้า</h4>
      </div>

      <div class="modal-body"  >
        <div class="row">
          <div class="col-xs-12">

            <!-- Form -->
            <form class="form-horizontal">
              <div class="col-sm-12">
                <div class="form-group" id="e_CheckUsername">
                  <label for="" class="col-md-3 control-label">รหัสลูกค้า :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="รหัสลูกค้า" id="sc_UserCustomer" name="sc_UserCustomer"  minlength="4" readonly />
                    <span class="help-block" id="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">ชื่อผู้ติดต่อ :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="ชื่อผู้ติดต่อ" id="sc_ContactName" name="sc_ContactName" readonly  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">บริษัท  :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="บริษัท" id="sc_Company" name="sc_Company"  readonly  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">สถานะการใช้งาน  :</label>
                  <div class="col-md-9">
                    <select class="form-control" id="sc_StatusLogin" name="sc_StatusLogin" >
                      <option value="">เลือกการใช้งาน</option>
                      <option value="Y">เปิดใช้งาน</option>
                      <option value="N">ปิดใช้งาน</option>
                    </select>
                  </div>
                </div>

              </div>
            </form>
            <!-- Form -->

          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 alert_update_set_customer">

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info SubmitUpdateSetCustomer">บันทึก</button>
      </div>

    </div>
  </div>
</div>
<!-- edit set Customer -->




<!-- edit Customer -->
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_edit_customer").click(function(e) {
      $(".SubmitUpdateCustomer").attr("id",$(this).attr("id"));
      $.post("../../new/jquery/others.php",
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
            $.post('../../new/jquery/others.php',
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
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">รหัสลูกค้า :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="รหัสลูกค้า อ้างอิง ระบบ SAP" id="emCodeSAP" name="emCodeSAP"  required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">รหัสผ่าน :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="รหัสผ่าน" id="emPassword" name="emPassword" required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">ชนิดธุรกิจ :</label>
                  <div class="col-md-9">
                    <select class="form-control" id="emTypeBusiness" name="emTypeBusiness" required >
                      <option value="">เลือกชนิดธุรกิจ</option>
                      <option value="บจก.">บจก.</option>
                      <option value="บมจ.">บมจ.</option>
                      <option value="หสม.">หสม.</option>
                      <option value="ร้าน">ร้าน</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">ชื่อบริษัท /ชื่อร้าน :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="ชื่อบริษัท /ชื่อร้าน" id="emCompanyName" name="emCompanyName"  required />
                  </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3 control-label">ที่อยู่ :</label>
                    <div class="col-md-9">
                      <textarea class="form-control" placeholder="ที่อยู่" id="emAddress" name="emAddress" placeholder="กรุณากรอกข้อมุลที่อยู่ให้ครบถ้วน" required ></textarea>
                    </div>
                </div>
                <div class="form-group">
                   <label for="" class="col-md-3 control-label">จังหวัด :</label>
                   <div class="col-md-9">
                     <select class="form-control" id="em_province" name="em_province" required >
                       <option value="">เลือกจังหวัด</option>
                       <?
                       $sql = "SELECT * FROM province ORDER BY PROVINCE_NAME ASC";
                       if (select_numz($sql)>0) {
                         foreach (select_tbz($sql) as $row) {
                           ?><option value="<?=$row['PROVINCE_NAME'];?>"><?=$row['PROVINCE_NAME'];?></option><?
                         }
                       }
                       ?>
                     </select>
                   </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">โทรศัพท์ :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="หมายเลขโทรศัพท์" id="emTelephone" name="emTelephone"  required  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">เบอร์มือถือ :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="เบอร์มือถือ" id="emMobile" name="emMobile"  required  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">แฟกซ์ :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="แฟกซ์" id="emFAX" name="emFAX"  required  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">E-mail  :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="E-mail " id="emEmail" name="emEmail"  required  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">ชื่อผู้ติดต่อ :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="ชื่อผู้ติดต่อ" id="emContact" name="emContact"  />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">ทุนจดทะเบียน :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control"  placeholder="ทุนจดทะเบียน เช่น 5000000" required id="emRegister" name="emRegister"   />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">สถานะใช้งาน :</label>
                  <div class="col-md-9">
                    <select class="form-control" name="emStatusLogin" id="emStatusLogin" required>
                      <option value="">เลือกสถานะการใช้งาน</option>
                      <option value="Y">เปิดใช้งาน</option>
                      <option value="N">ปิดใช้งาน</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-md-3 control-label">กลุ่มลูกค้า :</label>
                  <div class="col-md-9">
                    <select class="form-control" name="emTypePart" id="emTypePart" required>
                      <option value="">เลือกประเภทกลุ่มลูกค้า</option>
                      <?
                        $sql = "SELECT * FROM member_group WHERE (mem_status = 'Y') ORDER BY mem_group_name ASC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['ID_mem_group']."-".$row['mem_group'];?>"><?=$row['mem_group_name'];?></option><?
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
          <div class="col-xs-12 alert_update_ccustomer">

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info SubmitUpdateCustomer">บันทึก</button>
      </div>

    </div>
  </div>
</div>
<!-- edit Customer -->




<!-- delete Customer -->
<script>
  $(document).ready(function() {

      $(".click_delete_customer").click(function(e) {
        $(".da_DeleteCustomer").attr("id", $(this).attr("id"));
      });
      //// check delete
      $(".da_DeleteCustomer").click(function(e) {
        if ( $("#da_Pass_re").val() == "Admin" ) {
          $.post("../../new/jquery/others.php",
          {
            value : $(this).attr("id"),
            post : "CustomerDelete"
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
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger da_DeleteCustomer">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- delete Customer -->
