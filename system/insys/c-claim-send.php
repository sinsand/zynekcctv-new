<?

///// Submit Add Claim
if (isset($_POST['SubmitAddNewClaim'])) {

  /// Check type dealer 1 = dealer, 2= not dealer
  $TypeDealer;$CompanyName;$ContactName;$Telephone;$Address;$Fax;
  if ($_POST['TypeDealers']=="1") {
    $TypeDealer = $_POST['TypeDealers'];
    $CompanyCode = $_POST['ac_CodeUser'];
    $CompanyName = $_POST['ac_Company'];
    $ContactName = $_POST['ac_Contact'];
    $Telephone = $_POST['ac_Mobile'];
    $Address = $_POST['ac_Address'];
    $Fax = $_POST['ac_Fax'];
  }else {
    $TypeDealer = 0;
    $CompanyName = $_POST['ac_NCompany'];
    $ContactName = $_POST['ac_NContact'];
    $Telephone = $_POST['ac_NMobile'];
    $Address = $_POST['ac_NAddress'];
    $Fax = $_POST['ac_NFax'];
  }

  if (isset($_POST['ac_Lens'])) {
    $_POST['ac_Lens'] = $_POST['ac_Lens_Text'];
  }
  if (isset($_POST['ac_Harddisk'])) {
    $_POST['ac_Harddisk'] = $_POST['ac_Harddisk_Text'];
  }





  $sql = "INSERT INTO product_claim
              VALUES(0,
                '".$_POST['ac_JobID']."',
                '".$CompanyName."',
                '".$ContactName."',
                '".$Telephone."',
                '".$_POST['ac_Model']."',
                '0',
                '".$_POST['ac_SerialNumber']."',
                '".$_POST['ac_Problem']."',
                '".$_POST['ac_Remark']."',
                '".date("Y-m-d")."',
                '0',
                ' ',
                'ยังไม่ได้รับการซ่อม',
                now(),
                0,
                ' ',
                ' ',
                0,
                '".$CompanyCode."',
                '".$Address."',
                '0000-00-00 00:00:00',
                0,
                '000-00-00',
                '".$_POST['ac_accessories']."',
                '".$_POST['ac_Power_Cable']."',
                '".$_POST['ac_Adapter']."',
                '".$_POST['ac_Remote']."',
                '".$_POST['ac_Harddisk']."',
                '".$_POST['ac_Bracket']."',
                '".$_POST['ac_Lens']."',
                '".$_POST['ac_mouse']."',
                '".$_POST['ac_lan']."',
                '".$_POST['ac_cd_software']."',
                '".$_POST['ac_jack_alarm']."',
                '".$_POST['ac_sata']."',
                '".$_POST['ac_board_power']."',
                '".$_POST['ac_charge']."',
                ' ',
                0,
                '0000-00-00 00:00:00',
                '".$_POST['ac_GroupProduct']."',
                '".$_POST['ac_TypeSubProduct']."',
                '".$_POST['ac_Brand']."',
                '".$TypeDealer."',
                '',
                '0',
                '0',
                '0',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                ''
              );"; /// add claim
  echo $sql;
  if (insert_tbz($sql)==true) {
    ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-success"></i> Alert!</h4>
        เพิ่มงานเคลมใหม่ เสร็จสิ้น.
      </div>
    <?
  }else {
    ?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      ไม่สามารถเพิ่มได้ โปรดตรวจสอบข้อมูลให้ถูกต้อง.
    </div>
    <?
  }
}

?>





<script type="text/javascript">
  $(document).ready(function() {
    ////// Search For Table
    $("#sn_check").keyup(function(){
      _this = this;
      // Show only matching TR, hide rest of them
      $.each($(".table_wait tbody tr"), function() {
          if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
             $(this).hide();
          else
             $(this).show();
      });
    });


    ////// Search For Table
      $("#sn_check_repair").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($(".table_repair tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();
        });
      });

    ////// Search For Table
      $("#sn_check_complete").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($(".table_complete tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();
        });
      });

  });
</script>




<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#send_claim_" data-toggle="tab">งานซ่อมกำลังนำส่ง </a></li>
        <li><a href="#send_claim_completed" data-toggle="tab">งานซ่อมนำส่งสมบูรณ์ </a></li>
      </ul>
      <div class="tab-content">

        <div class="active tab-pane" id="send_claim_">
          <div class="row">
            <div class="col-xs-12">
              <div style="padding:0 0 20px 0;">
                  <div class="input-group input-group-md">
                    <input type="search" class="form-control" id="sn_check" placeholder="กรอกข้อมูลค้นหา">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" id="btn_sn_check">ค้นหา!</button>
                        </span>
                  </div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="table-responsive">
                <table class="table table-striped table-hover table_wait">
                  <thead>
                    <tr>
                      <th class="text-center">ลำดับ</th>
                      <th class="text-left">บริษัท</th>
                      <!--<th class="text-left">สินค้า</th>-->
                      <th class="text-center">จำนวนรายการ</th>
                      <th class="text-center">เลขที่ (วันที่) รับซ่อม</th>
                      <th class="text-center">เลขที่ (วันที่) ส่งคืน</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?

                          $sql = "SELECT pc.num_job ,pc.*
                                  FROM product_claim pc
                                  WHERE (
                                          pc.num_job != '' AND
                                          pc.send_product = '0'
                                        )
                                  GROUP BY pc.num_job
                                  ORDER BY pc.num_job DESC";
                          if (select_numz($sql)>0) { $i=1;
                            foreach (select_tbz($sql) as $row) {

                              ?>
                                <tr>
                                  <td class="text-center"><?=$i;?></td>
                                  <td class="text-left"><?=$row['company'];?> (<?=$row['username']==''?"-":$row['username'];?>)</td>
                                  <!--<td class="text-left"><?=$row['model'];?></td>-->
                                  <td class="text-center">
                                    <?
                                      $sql_in = " SELECT pc.model  FROM product_claim pc WHERE ( pc.num_job = '".$row['num_job']."' AND pc.send_product = '0' )";
                                      echo select_numz($sql_in);
                                    ?>
                                  </td>
                                  <td class="text-center"><?=$row['ID_job'];?> ( <?=datetime($row['date_claim']);?>)</td>
                                  <td class="text-center"><?=$row['num_job'];?> ( <?=datetime($row['dateprint']);?>)</td>
                                  <td class="text-center">
                                    <div class="btn-group" style="width: 235px;">
                                      <button id="<?=$row['num_job'];?>" data-toggle="modal" data-target="#modal-print-claim" class="btn btn-default click_print"><i class="fa fa-print"></i></button>
                                      <button id="<?=$row['num_job'];?>" data-toggle="modal" data-target="#modal-set-claim" class="btn btn-warning click_set_claim"><i class="fa fa-check-square-o"></i></button>
                                      <button id="<?=$row['num_job'];?>" data-toggle="modal" data-target="#modal-quote-claim" class="btn <?=empty($row['quotation'])||$row['quotation']==""?" btn-default ":" btn-success ";?> click_quote"><i class="fa   <?=empty($row['quotation'])||$row['quotation']==""?" fa-file-text ":" fa-info-circle ";?>"></i></button>
                                      <button id="<?=$row['num_job'];?>" data-toggle="modal" data-target="#modal-view-claim" class="btn btn-default click_view"><i class="fa fa-eye"></i></button>

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

        <div class="tab-pane" id="send_claim_completed">
          <div class="row">
            <div class="col-xs-12">
              <div style="padding:0 0 20px 0;">
                  <div class="input-group input-group-md">
                    <input type="search" class="form-control" id="sn_check" placeholder="กรอกข้อมูลค้นหา">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" id="btn_sn_check">ค้นหา!</button>
                        </span>
                  </div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="table-responsive">
                <table class="table table-striped table-hover table_wait">
                  <thead>
                    <tr>
                      <th class="text-center">ลำดับ</th>
                      <th class="text-left">บริษัท</th>
                      <th class="text-center">จำนวนรายการ</th>
                      <th class="text-center">เลขที่ (วันที่) รับซ่อม</th>
                      <th class="text-center">เลขที่ (วันที่) ส่งคืน</th>
                      <th class="text-center">วันที่เสร็จสิ้น</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?

                          $sql = "SELECT pc.num_job ,pc.*
                                  FROM product_claim pc
                                  WHERE (
                                          pc.num_job != '' AND
                                          pc.send_product != '0' AND
                                          pc.date_sand_product != '0000-00-00 00:00:00'
                                        )
                                  GROUP BY pc.num_job
                                  ORDER BY pc.num_job DESC
                                  LIMIT 100 ";
                          if (select_numz($sql)>0) { $i=1;
                            foreach (select_tbz($sql) as $row) {

                              ?>
                                <tr>
                                  <td class="text-center"><?=$i;?></td>
                                  <td class="text-left"><?=$row['company'];?> (<?=$row['username']==''?"-":$row['username'];?>)</td>
                                  <td class="text-center">
                                    <?
                                      $sql_in = " SELECT pc.model  FROM product_claim pc WHERE ( pc.num_job = '".$row['num_job']."' AND pc.send_product != '0' AND pc.date_sand_product != '0000-00-00 00:00:00' )";
                                      echo select_numz($sql_in);
                                    ?>
                                  </td>
                                  <td class="text-center"><?=$row['ID_job'];?> ( <?=datetime($row['date_claim']);?>)</td>
                                  <td class="text-center"><?=$row['num_job'];?> ( <?=datetime($row['dateprint']);?>)</td>
                                  <td class="text-left"><?=datetime($row['date_sand_product']);?></td>
                                  <td class="text-center">
                                    <div class="btn-group" style="width: 235px;">
                                      <button id="<?=$row['num_job'];?>" data-toggle="modal" data-target="#modal-print-claim" class="btn btn-default click_print"><i class="fa fa-print"></i></button>
                                      <button id="<?=$row['num_job'];?>" data-toggle="modal" data-target="#modal-set-claim" class="btn btn-warning click_set_claim"><i class="fa fa-check-square-o"></i></button>
                                      <button id="<?=$row['num_job'];?>" data-toggle="modal" data-target="#modal-quote-claim" class="btn <?=empty($row['quotation'])||$row['quotation']==""?" btn-default ":" btn-success ";?> click_quote"><i class="fa   <?=empty($row['quotation'])||$row['quotation']==""?" fa-file-text ":" fa-info-circle ";?>"></i></button>
                                      <button id="<?=$row['num_job'];?>" data-toggle="modal" data-target="#modal-view-claim" class="btn btn-default click_view"><i class="fa fa-eye"></i></button>

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



      </div>
    </div>
  </div>
</div>




<!-- Edit Claim -->
<script type="text/javascript">
  $(document).ready(function() {

    /*
    /// view and edit claim
    $(".click_edit_claim").click(function(event) {
      $(".ec_SubmitUpdate").attr("id", $(this).attr("id"));
      $.post("../../jquery/others.php",
      {
        value : $(this).attr("id"),
        post  : "ViewClaim"
      },
      function(d) {
        var i = d.split("|||");
        $("#").val(i[0]);
        $("#").val(i[1]);
      });
    });

    /// update claim
    $(".ec_SubmitUpdate").click(function(event) {
      if (  $("#").val() != "" &&
            $("#").val() != "" &&
            $("#").val() != "" &&
            $("#").val() != "" &&
            $("#").val() != "") {

        $.post("../../jquery/others.php",
        {
          vvvvvv   : $(this).attr("id"),
          vvvvvv   : $("#").val(),
          vvvvvv   : $("#").val(),
          vvvvvv   : $("#").val(),
          vvvvvv   : $("#").val(),
          vvvvvv   : $("#").val(),
          vvvvvv   : $("#").val(),
          post  : "UpdateClaim"
        },
        function(data) {
          $(".alert_modal_edit_claim").html(data);
          setTimeout(function(){
            window.location.href = "<?=$HostLinkAndPath;?>";
          },1000);
        });
      }else {
        $(".alert_modal_edit_claim").html("<div class='alert alert-warning alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <h4><i class='icon fa fa-warning'></i> Alert!</h4>   กรุณากรอกข้อมูลให้ครบถ้วน. </div>");
      }
    });
    */

  });
</script>
<div class="modal fade" id="modal-edit-claim" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil-square-o"></i> แก้ไขงานซ่อม</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
            <form class="form-horizontal" >
              <div class="col-md-12">

                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">รหัสลูกค้า</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control " id="ec_CodeUser" name="ec_CodeUser" placeholder="รหัสลูกค้า">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">ชื่อบริษัท</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="ec_Company" name="ec_Company" placeholder="ชื่อบริษัท" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">เบอร์ติดต่อ</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="ec_Mobile" name="ec_Mobile"  placeholder="เบอร์ติดต่อ" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">ชื่อผู้ติดต่อ</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="ec_Contact" name="ec_Contact"  placeholder="ชื่อผู้ติดต่อ" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">แฟ็กซ์</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="ec_Fax" name="ec_Fax"  placeholder="แฟ็กซ์" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">ที่อยู่</label>
                  <div class="col-sm-9">
                    <textarea  class="form-control" id="ec_Address" name="ec_Address" placeholder="ที่อยู่"></textarea>
                  </div>
                </div>


                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">เลขที่รับซ่อม</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="ec_JobID" name="ec_JobID" value="<?=$JobNo;?>" placeholder="เลขที่รับซ่อม" required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">ยี่ห้อสินค้า</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="ec_Brand" name="ec_Brand" required >
                      <option value="">ยี่ห้อสินค้า</option>
                      <?
                        $sql = "SELECT * FROM name_brand ORDER BY name_brand ASC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['ID_brand'];?>"><?=$row['name_brand'];?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">กลุ่มสินค้า</label>
                  <div class="col-sm-9">
                    <select class="form-control ec_GroupProduct_" id="ec_GroupProduct_" name="ec_GroupProduct_" required >
                      <option value="">กลุ่มสินค้า</option>
                      <?
                        $sql = "SELECT * FROM name_group ORDER BY name_group ASC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['ID_group'];?>"><?=$row['name_group'];?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <script type="text/javascript">
                  $(document).ready(function() {

                    $(".ec_GroupProduct_").change(function(event) {
                      if ($(this).val() != "") {
                        $.post('../../jquery/others.php',
                        {
                          value : $(this).val(),
                          post  : "CheckViewSubTypeProduct"
                        },
                        function(data) {
                          $(".ec_TypeSubProduct_").html(data);
                        });
                      }
                    });

                  });
                </script>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">ประเภทสินค้าย่อย</label>
                  <div class="col-sm-9">
                    <select class="form-control ac_TypeSubProduct_" id="ec_TypeSubProduct_" name="ec_TypeSubProduct">
                      <option value="">เลือกประเภทสินค้าย่อย</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">รุ่นสินค้า (Model)</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  id="ec_Model" name="ec_Model" placeholder="รุ่นสินค้า" required />
                    </div>
                 </div>
                 <div class="form-group">
                   <label for="" class="col-sm-3 control-label">หมายเลขสินค้า (SN)</label>
                   <div class="col-sm-9">
                     <input type="text" class="form-control"  id="ec_SerialNumber" name="ec_SerialNumber" placeholder="หมายเลขสินค้า" required  />
                   </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">อาการเสีย</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="ec_Problem" name="ec_Problem" placeholder="อาการเสีย" required ></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">หมายเหตุ</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="ec_Remark" name="ec_Remark" placeholder="หมายเหตุ" ></textarea>
                  </div>
                </div>


                <div class="form-group">
                 <label for="" class="col-sm-3 control-label">อุปกรณ์เพิ่มเติม</label>
                 <div class="col-sm-9">
                   <div class="col-xs-12">
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_Power_Cable" name="ec_Power_Cable" value="1" class=""> Power Cable</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_Adapter" name="ec_Adapter" value="1" class=""> Adapter</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_Remote" name="ec_Remote" value="1" class=""> Remote</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_Harddisk" name="ec_Harddisk" value="1" class=""> Harddisk : <input type="text" id="" name="" placeholder="ความจุฮาร์ดดิส" style="width:150px;padding:3px 12px;" /> </label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_Bracket" name="ec_Bracket" value="1" class=""> Bracket</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_Lens" name="ec_Lens" value="1" class=""> Lens : <input type="text" id="" name="" placeholder="ขนาดเลนส์" style="width:150px;padding:3px 12px;" /></label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_mouse" name="ec_mouse" value="1" class=""> Mouse</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_lan" name="ec_lan" value="1" class=""> สาย LAN</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_cd_software" name="ec_cd_software" value="1" class=""> CD Software</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_jack_alarm" name="ec_jack_alarm" value="1" class=""> Jack alarm</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_sata" name="ec_sata" value="1" class=""> สาย Sata</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_board_power" name="ec_board_power" value="1" class=""> Board Power </label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_charge" name="ec_charge" value="1" class=""> สายชาร์จ </label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="ec_accessories" name="ec_accessories" value="1" class=""> ไม่มีอุปกรณ์</label>
                      </div>
                    </div>
                 </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-xs-12" id="alert_modal_edit_claim">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info ec_SubmitUpdate">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit Claim -->



<!-- view Claim -->
<div class="modal fade" id="modal-view-claim" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-eye"></i> ดูงานซ่อม</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
            <form class="form-horizontal" >
              <div class="col-md-12">

                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">รหัสลูกค้า</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control " id="vc_CodeUser" name="vc_CodeUser" placeholder="รหัสลูกค้า">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">ชื่อบริษัท</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="vc_Company" name="vc_Company" placeholder="ชื่อบริษัท" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">เบอร์ติดต่อ</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="vc_Mobile" name="vc_Mobile"  placeholder="เบอร์ติดต่อ" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">ชื่อผู้ติดต่อ</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="vc_Contact" name="vc_Contact"  placeholder="ชื่อผู้ติดต่อ" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">แฟ็กซ์</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="vc_Fax" name="vc_Fax"  placeholder="แฟ็กซ์" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">ที่อยู่</label>
                  <div class="col-sm-9">
                    <textarea  class="form-control" id="vc_Address" name="vc_Address" placeholder="ที่อยู่"></textarea>
                  </div>
                </div>


                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">เลขที่รับซ่อม</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="vc_JobID" name="vc_JobID" value="<?=$JobNo;?>" placeholder="เลขที่รับซ่อม" required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">ยี่ห้อสินค้า</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="vc_Brand" name="vc_Brand" required >
                      <option value="">ยี่ห้อสินค้า</option>
                      <?
                        $sql = "SELECT * FROM name_brand ORDER BY name_brand ASC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['ID_brand'];?>"><?=$row['name_brand'];?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">กลุ่มสินค้า</label>
                  <div class="col-sm-9">
                    <select class="form-control vc_GroupProduct_" id="vc_GroupProduct_" name="vc_GroupProduct_" required >
                      <option value="">กลุ่มสินค้า</option>
                      <?
                        $sql = "SELECT * FROM name_group ORDER BY name_group ASC";
                        if (select_numz($sql)>0) {
                          foreach (select_tbz($sql) as $row) {
                            ?><option value="<?=$row['ID_group'];?>"><?=$row['name_group'];?></option><?
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <script type="text/javascript">
                  $(document).ready(function() {

                    $(".vc_GroupProduct_").change(function(event) {
                      if ($(this).val() != "") {
                        $.post('../../jquery/others.php',
                        {
                          value : $(this).val(),
                          post  : "CheckViewSubTypeProduct"
                        },
                        function(data) {
                          $(".vc_TypeSubProduct_").html(data);
                        });
                      }
                    });

                  });
                </script>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">ประเภทสินค้าย่อย</label>
                  <div class="col-sm-9">
                    <select class="form-control vc_TypeSubProduct_" id="vc_TypeSubProduct_" name="vc_TypeSubProduct">
                      <option value="">เลือกประเภทสินค้าย่อย</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">รุ่นสินค้า (Model)</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  id="vc_Model" name="vc_Model" placeholder="รุ่นสินค้า" required />
                    </div>
                 </div>
                 <div class="form-group">
                   <label for="" class="col-sm-3 control-label">หมายเลขสินค้า (SN)</label>
                   <div class="col-sm-9">
                     <input type="text" class="form-control"  id="vc_SerialNumber" name="vc_SerialNumber" placeholder="หมายเลขสินค้า" required  />
                   </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">อาการเสีย</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="vc_Problem" name="vc_Problem" placeholder="อาการเสีย" required ></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">หมายเหตุ</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="vc_Remark" name="vc_Remark" placeholder="หมายเหตุ" ></textarea>
                  </div>
                </div>


                <div class="form-group">
                 <label for="" class="col-sm-3 control-label">อุปกรณ์เพิ่มเติม</label>
                 <div class="col-sm-9">
                   <div class="col-xs-12">
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_Power_Cable" name="vc_Power_Cable" value="1" class=""> Power Cable</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_Adapter" name="vc_Adapter" value="1" class=""> Adapter</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_Remote" name="vc_Remote" value="1" class=""> Remote</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_Harddisk" name="vc_Harddisk" value="1" class=""> Harddisk : <input type="text" id="" name="" placeholder="ความจุฮาร์ดดิส" style="width:150px;padding:3px 12px;" /> </label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_Bracket" name="vc_Bracket" value="1" class=""> Bracket</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_Lens" name="vc_Lens" value="1" class=""> Lens : <input type="text" id="" name="" placeholder="ขนาดเลนส์" style="width:150px;padding:3px 12px;" /></label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_mouse" name="vc_mouse" value="1" class=""> Mouse</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_lan" name="vc_lan" value="1" class=""> สาย LAN</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_cd_software" name="vc_cd_software" value="1" class=""> CD Software</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_jack_alarm" name="vc_jack_alarm" value="1" class=""> Jack alarm</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_sata" name="vc_sata" value="1" class=""> สาย Sata</label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_board_power" name="vc_board_power" value="1" class=""> Board Power </label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_charge" name="vc_charge" value="1" class=""> สายชาร์จ </label>
                      </div>
                      <div class="checkbox">
                        <label> <input type="checkbox"  id="vc_accessories" name="vc_accessories" value="1" class=""> ไม่มีอุปกรณ์</label>
                      </div>
                    </div>
                 </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-xs-12" id="alert_modal_view_claim">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info"  data-dismiss="modal" aria-label="Close">ปิด</button>
      </div>
    </div>
  </div>
</div>
<!-- view Claim -->


<!-- set Claim -->
<script type="text/javascript">
  $(document).ready(function() {

    /// view and set claim
    $(".click_set_claim").click(function(e) {
      $(".ec_SubmitSetUpdate").attr("id", $(this).attr("id"));
      $.post("../../jquery/others.php",
      {
        idproduct : $(this).attr("id"),
        post  : "ViewForClaim"
      },
      function(d) {
        var i = d.split("|||");
        $("#cs_Company").val(i[1]);
        $("#cs_Rjob").val(i[0]);
        $("#cs_Models").val(i[4]);
        $("#cs_SerialNumber").val(i[6]);
      });
    });


  });
</script>
<div class="modal fade" id="modal-set-claim" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-cogs"></i> เปลี่ยนสถานะ งานซ่อม</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
            <form class="form-horizontal" >
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">บริษัท</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="cs_Company" name="" readonly />
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">เลขที่ใบรับซ่อม</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="cs_Rjob" name="" readonly />
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">รุ่นสินค้า</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="cs_Models" name="" readonly />
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">หมายเลขสินค้า</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="cs_SerialNumber" name="" readonly />
                </div>
              </div>
              <hr class="col-xs-12" style="padding:20px 0;" />
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">รูปแบบ</label>
                <div class="col-sm-9">
                  <div class="radio">
                    <label> <input type="radio" name="TypeClaim" id="TypeClaim1" value="1" class="CheckTypeClaim" selected> กำลังซ่อม</label>
                  </div>
                  <div class="radio">
                    <label> <input type="radio" name="TypeClaim" id="TypeClaim2" value="2" class="CheckTypeClaim"> ซ่อมเสร็จ</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">รายละเอียด</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="cs_Detail" placeholder="รายละเอียดการแก้ไข"></textarea>
                </div>
              </div>
            </form>
          </div>
          <div class="col-xs-12" id="alert_modal_set_claim">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success ec_SubmitSetUpdate">ยืนยันการเปลี่ยนแปลง</button>
      </div>
    </div>
  </div>
</div>
<!-- set Claim -->


<!-- quote Claim -->
<script type="text/javascript">
  $(document).ready(function() {

    $(".click_quote").click(function(e) {
      $(".ec_SubmitQuoteUpdate").attr("id",$(this).attr("id"));

      $.post("../../jquery/others.php",
      {
        idproduct : $(this).attr("id"),
        post : "ViewForClaim"
      },
      function(d) {
        var i = d.split("|||");
        $("#qu_RJob").val(i[0]);
        $("#qu_Model").val(i[4]);
        $("#qu_SerialNumber").val(i[6]);
        $("#qu_Quote").val(i[21]);
      });

    });

    $(".ec_SubmitQuoteUpdate").click(function(e) {
      if ($("#qu_Quote").val() != "") {
        $.post("../../jquery/others.php",
        {
          idproduct : $(this).attr("id"),
          quot : $("#qu_Quote").val(),
          post : "UpdateQuoteForClaim"
        },
        function(d) {
          $(".alert_modal_quote_claim").html(d);
        });
      }else {
        $(".alert_modal_quote_claim").html("กรุณากรอกข้อมูลให้ครบถ้วน");
      }
    });

  });
</script>
<div class="modal fade" id="modal-quote-claim" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-o"></i> เพิ่มเลขใบเสนอราคา</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
            <form class="form-horizontal" >
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">เลขที่ใบรับซ่อม</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="qu_RJob" readonly />
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">รุ่นสินค้า</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="qu_Model" readonly />
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">หมายเลขสินค้า</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="qu_SerialNumber" readonly />
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">เลขที่ใบเสนอราคา</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="qu_Quote" placeholder="อ้างอิงจากระบบ SAP" />
                </div>
              </div>
            </form>
          </div>
          <div class="col-xs-12" id="alert_modal_quote_claim">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info ec_SubmitQuoteUpdate">ยืนยัน</button>
      </div>
    </div>
  </div>
</div>
<!-- quote Claim -->



<!-- print Claim -->
<script type="text/javascript">
  $(document).ready(function() {



    $(".click_print").click(function(e) {
        $(".pc_SubmitPrint").attr("id", $(this).attr("id"));

        $.post("../../jquery/others.php",
        {
          idproduct : $(this).attr("id"),
          post : "ViewForClaim"
        },
        function(d) {
          var i = d.split("|||");
          $("#pc_RJobView").val(i[0]);
        });


        $(".ViewRJobForPrintClaim").html("<p class='text-center' style='padding:15px 0;color:#060;'>รอสักครู่.. <i class='fa fa-spinner fa-spin animated'></i></p>");
        $.post("../../jquery/others.php",
        {
          idproduct : $(this).attr("id"),
          post : "ViewRJobForClaim"
        },
        function(d) {
          $(".ViewRJobForPrintClaim").html(d);
        });
    });

    $(".pc_SubmitPrint").click(function(e) {
        $.post("../../jquery/others.php",
        {
          idjob : $(this).attr("id"),
          post : ""
        },
        function(d) {
          $("").html(d);
        });
    });



  });
</script>
<div class="modal fade" id="modal-print-claim" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-print"></i> เลือกรายการพิมพ์</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
            <form class="form-horizontal" >
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">เลขที่ใบรับซ่อม</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pc_RJobView" readonly />
                </div>
              </div>
            </form>

            <div class="col-xs-12 ViewRJobForPrintClaim" style="padding:15px;"></div>



          </div>
          <div class="col-xs-12" id="alert_modal_print_claim"></div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-info pc_SubmitPrint" target="_blank">พิมพ์</a>
      </div>
    </div>
  </div>
</div>
<!-- print Claim -->




<!-- delete Customer -->
<script>
  $(document).ready(function() {

      $(".click_delete").click(function(e) {
        $(".da_DeleteClaim").attr("id", $(this).attr("id"));
      });
      //// check delete
      $(".da_DeleteClaim").click(function(e) {
        if ( $("#dc_delete").val() == "Admin" ) {
          $.post("../../jquery/others.php",
          {
            value : $(this).attr("id"),
            post : "ClaimDelete"
          },
          function(data) {
              $("#View_data_delete").html(data);
              setTimeout(function(){
                window.location.href = "<?=$HostLinkAndPath;?>";
              },2000);
          });
        }else {
          $("#View_data_delete").html("<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h4><i class='icon fa fa-warning'></i> Alert!</h4>กรุณากรอกข้อมูลให้ถูกต้อง </div>");
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
              <input type="password" class="form-control text-center" placeholder="กรอกรหัสผ่าน เพื่อยืนยัน" id="dc_delete"  />
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background-color: white; text-align: center;">
        <button type="button" style="width: 48%;float:left;" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" style="width: 48%;float:right;" class="btn btn-danger da_DeleteClaim">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- delete Customer -->
