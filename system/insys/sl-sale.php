<?
if(isset($_POST["Submit_SaleAdd"])){
  $sql = "INSERT INTO service_sale_pro
            VALUES(0,
              '".base64url_decode($_COOKIE[$CookieID])."',
              '".$_POST['date_str_service']."',
              '".$_POST['date_end_service']."',
              '".$_POST['time_str_service']."',
              '".$_POST['time_end_service']."',
              '".$_POST['branchpro']."',
              '".$_POST['contact_name']."',
              '".$_POST['detail']."',
              NULL,
              NULL,
              '".$_POST['remark']."',
              '".$_POST['type_service']."',
              '".$_POST['province']."',
              '".$_POST['ddlGeo']."',
              now(),
              now()
            );";
  if(insert_tbz($sql)==true){
    $sql = "SELECT MAX(service_id) FROM service_sale_pro  LIMIT 1;";
    if(select_tbz($sql)>0){
      foreach(select_tbz($sql)as $rowin){

        $Direct =  "file/sale_upload/";
        $path_img = 0;
        for($i=0;$i<count($_FILES["SalePhoto"]["name"]);$i++){

            $tem = explode(".", $_FILES["SalePhoto"]["name"][$i]);
            $NewFile   = "img_".date("Ymd_his").".".end($tem);

            if(move_uploaded_file($_FILES["SalePhoto"]["tmp_name"][$i], $Direct.$NewFile)){
                $sqll = "INSERT INTO service_photo VALUES(0,".$rowin[0].",'".$Direct.$NewFile."',now());";
                insert_tbz($sqll);
                $path_img = $path_img + 1;
            }

            /*copy($images,$Direct.$new_images);
            $width=1000; // Fix Width & Heigh (Autu caculate)
            $size=GetimageSize($images);
            $height=round($width*$size[1]/$size[0]);
            $images_orig = ImageCreateFromJPEG($images);
            $photoX = ImagesX($images_orig);
            $photoY = ImagesY($images_orig);
            $images_fin = ImageCreateTrueColor($width, $height);
            ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
            ImageJPEG($images_fin,$Direct.$new_images);
            ImageDestroy($images_orig);
            ImageDestroy($images_fin);
            */


        }
      }
    }
    if($path_img>0){
      $pa = "อัพโหลดภาพ  $path_img  รายการ.";
    }
    ?>
       <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <h4><i class="icon fa fa-warning"></i> Alert!</h4>
         เพิ่มข้อมูลสำเร็จ
       </div>
       <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
    <?
  }else{
    ?>
      <div class='alert alert-danger alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>ไม่สามารถเพิ่มข้อมูลได้. โปรตรวจสอบข้อมูลอีกครั้ง.
      </div>
    <?
  }
}


if (isset($_POST["Submit_PlanAdd"])) {
  $sql=  "INSERT INTO service_sale_plan
            VALUES(0,
              '".base64url_decode($_COOKIE[$CookieID])."',
              '".$_POST['pl_type_service']."',
              '".$_POST['pl_date_str_service']."',
              '".$_POST['pl_date_end_service']."',
              '".$_POST['pl_ddlGeo']."',
              '".$_POST['pl_province']."',
              '".$_POST['pl_branchpro']."',
              '".$_POST['pl_detail']."',
              now()
            );";
  if(insert_tbz($sql)==true){
    ?>
       <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <h4><i class="icon fa fa-warning"></i> Alert!</h4>
         เพิ่มข้อมูลการวางแผนงานสำเร็จ
       </div>
       <meta http-equiv="refresh" content="2;url=<?=$HostLinkAndPath;?>"/>
    <?
  }else {
    ?>
      <div class='alert alert-danger alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>ไม่สามารถเพิ่มข้อมูลการวางแผนงานได้. โปรตรวจสอบข้อมูลอีกครั้ง.
      </div>
    <?
  }
}
?>


<div class="row">
  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">รายงาน</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-xs-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#sale_show" data-toggle="tab">ดูรายงานการเยี่ยมลูกค้า</a></li>
                <li><a href="#sale_new" data-toggle="tab">เพิ่มรายงานเยื่ยมใหม่</a></li>
                <li><a href="#sale_calendar" data-toggle="tab">ตารางปฎิทิน</a></li>
              </ul>
              <div class="tab-content">
                <div class="active tab-pane" id="sale_show">
                  <div class="row">
                    <div class="col-xs-12" style="margin:15px 0;">
                      <form action="<?=$HostLinkAndPath;?>" method="post">
                        <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-offset-1 col-md-8 col-offset-2 col-lg-8 col-lg-offset-2">
                          <div class="col-sm-6" style="margin:15px 0 0 0;padding:0px;">
                            <div class="col-xs-12">
                              <div class="form-group">
                                <label for="" class="control-label">จังหวัด :</label>
                                <select class="form-control province_view select2 "  style="width:100%;" name="Sprovince">
                                	<option value="">จังหวัด</option>
                    							<?
                    							$sql_province = "SELECT * FROM province ORDER BY PROVINCE_NAME ASC";
                    								if(select_numz($sql_province)>0){
                    									foreach(select_tbz($sql_province) as $row){
                    									?><option value="<?=$row['PROVINCE_ID'];?>"><?=$row['PROVINCE_NAME'];?></option><?
                    									}
                    								}

                    							?>
                                </select>
                              </div>
                            </div>
                            <div class="col-xs-12">
                              <div class="form-group">
                                <label for="" class="control-label">เขตพื้นที่ :</label>
                                <select class="form-control ddl_geo select2"  style="width:100%;" name="Sarea">
                                  	<option value="">เลือกเขตพื้นที่</option>
                                    <option value="BKK">เขต BKK</option>
                                    <option value="C">เขต C</option>
                                    <option value="N">เขต N</option>
                                    <option value="E">เขต E</option>
                                    <option value="S">เขต S</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6" style="margin:15px 0 0 0;padding:0px;">
                            <div class="col-xs-12">
                              <div class="form-group">
                                <label for="" class="control-label">วันที่เริ่ม :</label>
                                <input type="text" class="form-control" readonly placeholder="<?=date("Y/m/d");?>" value="<?=$_POST['SstrDate']!=""?$_POST['SstrDate']:date("Y/m/d");?>" id="date_str_service" data-date-format="yyyy/mm/dd" name="SstrDate" />
                              </div>
                            </div>
                            <div class="col-xs-12">
                              <div class="form-group">
                                <label for="" class="control-label">วันที่สิ้นสุด :</label>
                                <input type="text" class="form-control" readonly placeholder="<?=date("Y/m/d");?>" value="<?=$_POST['SendDate']!=""?$_POST['SendDate']:date("Y/m/d");?>" id="date_end_service" data-date-format="yyyy/mm/dd" name="SendDate" />
                              </div>
                            </div>
                          </div>
                          <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;">
                            <div class="col-xs-12 col-sm-6">
                              <div class="form-group">
                                <label for="" class="control-label">ประเภทการเยี่ยม :</label>
                                <select class="form-control" name="StypeService">
                                	<option value="">ประเภท</option>
                                	<?
                      							$sql_type = "SELECT * FROM type_service_sale " ;
                      							if(select_numz($sql_type)>0){
                      								foreach(select_tbz($sql_type) as $row){
                      									?><option value="<?=$row['ID_type_service'];?>" <?=$row['ID_type_service']==$_POST['StypeService']?"selected":"";?>><?=$row['name_service'];?></option><?
                      								}
                    							}
                    							?>
                                </select>
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                              <label for="" class="control-label">ร้านค้า/บริษัท :</label>
                              <div class="input-group">
                                  <!--<input type="text" class="form-control" placeholder="กรอกข้อมูลค้นหา ร้านค้า/บริษัท" name="Sbranch">-->
                                  <select class="form-control select2"  name="Sbranch" style="width:100%;">
                                    <option value="">เลือกร้าน/บริษัท</option>
                                    <?
                                    $sqlpro = "SELECT m.member_id,m.company,mg.mem_group_name
                                           FROM member m
                                           INNER JOIN member_group mg ON m.group_member = mg.mem_group
                                           WHERE (
                                                    ( m.group_member = 'fr' OR
                                                      m.group_member = 'Pa' OR
                                                      m.group_member = 'Dl' OR
                                                      m.group_member = 'In' OR
                                                      m.group_member = 'Sh'
                                                    )
                                                )
                                           ORDER BY m.company ASC" ;
                                     if(select_numz($sqlpro)>0){ $i=1;
                                       ?><option value="272">ลูกค้าอื่นๆ ในเครือบริษัท Zynek (Dealer)</option><?
                                        foreach(select_tbz($sqlpro) as $row){
                                          ?><option value="<?=$row['member_id'];?>">(<?=sprintf("%03d",($i++));?>) <?=$row['company'];?> (<?=$row['mem_group_name'];?>)</option><?
                                        }
                                      }
                                    ?>
                                </select>
                                  <span class="input-group-btn">
                                      <button type="submit" class="btn btn-default" name="SubmitSearch">ค้นหา</button>
                                  </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="col-xs-12" id="show_table_search">
                      <div class="table-responsive">
                        <?
                          if (isset($_POST["SubmitSearch"])) {
                            if($_POST["SstrDate"] != "" && $_POST["SendDate"] != ""){
                              ?> <span class="label label-default">ระหว่างวันที่ (<?=date_($_POST["SstrDate"])." - ".date_($_POST["SendDate"]);?>)</span> <?
                            }else{
                              if($_POST["SstrDate"] != "" ){
                                ?> <span class="label label-default">เริ่มวันที่ <?=date_($_POST["SstrDate"]);?></span> <?
                              }
                              if($_POST["SendDate"] != "" ){
                                ?> <span class="label label-default">สิ้นสุดวันที่ <?=date_($_POST["SendDate"]);?></span> <?
                              }
                            }
                            if($_POST["Sbranch"]!=""){
                              $sqlz = "SELECT company FROM member WHERE ( member_id = '".$_POST["Sbranch"]."' )";
                              if (select_numz($sqlz)>0) {
                                foreach (select_tbz($sqlz) as $kevalue) {
                                  ?> <span class="label label-default">ลูกค้า : <?=$kevalue["company"];?></span> <?
                                }
                              }
                            }
                            if($_POST["Sprovince"]!=""){
                              $sqlz = "SELECT PROVINCE_NAME FROM province WHERE ( PROVINCE_ID = '".$_POST["Sprovince"]."' )";
                              if (select_numz($sqlz)>0) {
                                foreach (select_tbz($sqlz) as $kevalue) {
                                  ?> <span class="label label-default">จังหวัด : <?=$kevalue["PROVINCE_NAME"];?></span> <?
                                }
                              }
                            }
                            if($_POST["Sarea"]!=""){
                              ?> <span class="label label-default">เขตพื้นที่ <?=$_POST["Sarea"];?></span> <?
                            }
                            if($_POST["StypeService"]!=""){
                              $sqlz = "SELECT name_service FROM type_service_sale WHERE ( ID_type_service = '".$_POST["StypeService"]."' )";
                              if (select_numz($sqlz)>0) {
                                foreach (select_tbz($sqlz) as $kevalue) {
                                  ?> <span class="label label-default">ประเภทการเยี่ยมชม : <?=$kevalue["name_service"];?></span> <?
                                }
                              }

                            }
                          }
                        ?>
                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>ลำดับ</th>
                              <th>บริษัท</th>
                              <th>ชื่อผู้ติดต่อ</th>
                              <th>ประเภทการเยี่ยม</th>
                              <th style="min-width: 100px;">วันที่เยี่ยม</th>
                              <th>จังหวัด</th>
                              <th style="min-width: 160px;">ล่าสุด ณ วันที่</th>
                              <th>จัดการ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?
                            if (isset($_POST["SubmitSearch"])) {

                            	if($_POST["SstrDate"] != "" && $_POST["SendDate"] != ""){
                            		$WHERE[] = " ( ssp.date_start BETWEEN '".$_POST["SstrDate"]."' AND '".$_POST["SendDate"]."' ) ";
                            	}else{
                            		if($_POST["SstrDate"] != "" ){
                            			$WHERE[] = " ( ssp.date_start = '".$_POST["SstrDate"]."' ) ";
                            		}
                            		if($_POST["SendDate"] != "" ){
                            			$WHERE[] = " ( ssp.date_end  = '".$_POST["SendDate"]."' ) ";
                            		}
                            	}
                            	if($_POST["Sbranch"]!=""){
                            		$WHERE[] = " ( m.member_id = '".$_POST["Sbranch"]."' ) ";
                            	}
                            	if($_POST["Sprovince"]!=""){
                            		$WHERE[] = " ( ssp.province_id =  '".$_POST["Sprovince"]."' ) ";
                            	}
                            	if($_POST["Sarea"]!=""){
                            		$WHERE[] = " ( ssp.area_sale =  '".$_POST["Sarea"]."' ) ";
                            	}
                            	if($_POST["StypeService"]!=""){
                            		$WHERE[] = " ( ssp.type_service_id =  '".$_POST["StypeService"]."' ) ";
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
                    								        ssp.date_end,p.name_province,ssp.time_stamp,ssp.service_id,tss.name_service,
                                            DATE_FORMAT(ssp.date_start,'%Y-%m'),ssp.admin_id,ssp.create_date,
                                            ssp.admin_comment,ssp.admin_id
                        							FROM service_sale_pro ssp
                        							LEFT OUTER JOIN member m ON ssp.member_id = m.member_id
                        							LEFT OUTER JOIN sales_province p ON ssp.province_id = p.ID_province
                        							LEFT OUTER JOIN type_service_sale tss ON ssp.type_service_id = tss.ID_type_service
                                      $WHEREPRO
                        							ORDER BY m.company DESC
                                      LIMIT 100;";
                              //echo $sql;
                              if (select_numz($sql)>0) { $i=1;
                                foreach (select_tbz($sql) as $row) {
                                  ?>
                                  <tr>
                                    <td class="text-center"><?=$i;?></td>
                                    <td class="text-left"><?=$row['company'];?></td>
                                    <td class="text-left"><?=$row['contact_name_service'];?></td>
                                    <td class="text-left"><?=$row['name_service'];?></td>
                                    <td class="text-center"><?=date_($row['date_start']);?><?=$row['date_start']!=$row['date_end']?"<br>".date_($row['date_end']):"";?></td>
                                    <td class="text-left"><?=$row['name_province'];?></td>
                                    <td class="text-center"><?=datetime($row['create_date']);?></td>
                                    <td class="text-center">
                                      <div class="btn-group" style="width: 195px;">
                                        <button id="<?=$row['service_id'];?>" data-view="edit" data-toggle="modal" data-target="#modal-edit" class="btn btn-default click_edit <?=$row['admin_id']==base64url_decode($_SESSION[$SessionID])?"":"disabled";?>" <?=$row['admin_id']==base64url_decode($_SESSION[$SessionID])?"":"disabled";?>><i class="fa fa-pencil"></i></button>
                                        <button id="<?=$row['service_id'];?>" data-view="view" data-toggle="modal" data-target="#modal-view" class="btn btn-default click_view"><i class="fa fa-search"></i></button>
                                        <button id="<?=$row['service_id'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-warning click_delete <?=$row['admin_id']==base64url_decode($_SESSION[$SessionID])?"":"disabled";?> <?=!empty($row['admin_comment'])?"disabled":"";?>" <?=!empty($row['admin_comment'])?"disabled":"";?> <?=$row['admin_id']==base64url_decode($_SESSION[$SessionID])?"":"disabled";?>><i class="fa fa-trash-o"></i></button>
                                        <button id="<?=$row['service_id'];?>" data-toggle="modal" data-target="#modal-sign" class="btn btn-<?=!empty($row['admin_comment'])?"success":"danger";?> click_sign <?=base64url_decode($_SESSION[$SessionID])=='3'||base64url_decode($_SESSION[$SessionID])=='23'||base64url_decode($_SESSION[$SessionID])=='10'||base64url_decode($_SESSION[$SessionID])=='119'?"":"disabled";?>" <?=base64url_decode($_SESSION[$SessionID])=='3'||base64url_decode($_SESSION[$SessionID])=='23'||base64url_decode($_SESSION[$SessionID])=='10'||base64url_decode($_SESSION[$SessionID])=='119'?"":"disabled";?>><i class="fa fa-edit"></i></button>
                                        <a href="<?=SITE_URL;?>print/sale-print-report.php?id=<?=$row['service_id'];?>" class="btn btn-default" target="_blank"><i class="fa fa-print"></i></a>
                                      </div>

                                    </td>
                                  </tr>
                                  <? $i++;
                                }
                              }

                              // code...
                            }else {
                              ?>
                              <tr>
                                <td colspan="8" class="text-center">กรุณาค้นหาข้อมูล</td>
                              </tr>
                              <?
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- Search Table Sale -->
                  </div>
                </div>
                <div class="tab-pane" id="sale_new">
                  <div class="row">
                    <div class="col-xs-12">
                      <form class="form-horizontal" action="<?=$HostLinkAndPath;?>" method="post" enctype="multipart/form-data" >
                        <div class="col-sm-12 col-md-8">
                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">ประเภทการเยี่ยม * :</label>
                            <div class="col-md-9">
                              <select class="form-control" id="date_service" required name="type_service">
                                <option value="">เลือกประเภทการเยี่ยม</option>
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
                            <label for="" class="col-md-3 control-label">วันที่เริ่ม :</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control"  required data-date-format="yyyy/mm/dd" value="<?=date("Y/m/d");?>" style="background:#fff;" placeholder="<?=date("Y/m/d");?>" id="date_str_service"   name="date_str_service" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">เวลาเริ่ม :</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control"  data-date-format="H:i" value="<?=date("H:i");?>" style="background:#fff;" placeholder="<?=date("H:i");?>" id="time_str_service"   name="time_str_service" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">วันที่สิ้นสุด :</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" required data-date-format="yyyy/mm/dd"  value="<?=date("Y/m/d");?>"  style="background:#fff;"placeholder="<?=date("Y/m/d");?>" id="date_end_service"   name="date_end_service" />
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">เวลาสิ้นสุด :</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control"  data-date-format="H:i" value="<?=date("H:i");?>" style="background:#fff;" placeholder="<?=date("H:i");?>" id="time_end_service"   name="time_end_service" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">เขตพื้นที่ :</label>
                            <div class="col-md-9">
                              <select id="ddlGeo" name="ddlGeo" class="form-control ddlGeo_area select2" required  style="width:100%;">
                                <option value="">เลือกเขตพื้นที่</option>
                                <option value="BKK">เขต BKK</option>
                                <option value="C">เขต C</option>
                                <option value="N">เขต N</option>
                                <option value="E">เขต E</option>
                                <option value="S">เขต S</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">จังหวัด :</label>
                            <div class="col-md-9">
                              <select class="form-control province_view select2" required name="province" id="province"  style="width:100%;">
                              	<option value="0">จังหวัด</option>
                    							<?
                    							$sql_province = " SELECT  p.PROVINCE_ID,p.PROVINCE_NAME
                                                    FROM province p
                                                    ORDER BY p.PROVINCE_NAME ASC";
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
                            <label for="" class="col-md-3 control-label">ร้าน/บริษัท  :</label>
                            <div class="col-md-9">
                              <select class="form-control select2" id="branchpro" name="branchpro" required style="width:100%;">
                                <option value="">เลือกร้าน/บริษัท</option>
                                <?
                                $sqlpro = "SELECT m.member_id,m.company,mg.mem_group_name
                                       FROM member m
                                       INNER JOIN member_group mg ON m.group_member = mg.mem_group
                                       WHERE (
                                                ( m.group_member = 'fr' OR
                                                  m.group_member = 'Pa' OR
                                                  m.group_member = 'Dl' OR
                                                  m.group_member = 'In' OR
                                                  m.group_member = 'Sh'
                                                )
                                            )
                                       ORDER BY m.company ASC" ;
                                 if(select_numz($sqlpro)>0){ $i=1;
                                   ?><option value="272">ลูกค้าอื่นๆ ในเครือบริษัท Zynek (Dealer)</option><?
                                    foreach(select_tbz($sqlpro) as $row){
                                      ?><option value="<?=$row['member_id'];?>">(<?=sprintf("%03d",($i++));?>) <?=$row['company'];?> (<?=$row['mem_group_name'];?>)</option><?
                                    }
                                  }
                                ?>
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">ชื่อผู้ติดต่อ  :</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" required	placeholder="ชื่อบุคคลที่ติดต่อได้" name="contact_name" id="contact_name" autocomplete="off">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">วัตถุประสงค์  :</label>
                            <div class="col-md-9">
                              <textarea class="form-control" rows="5" placeholder="วัตถุประสงค์การเยี่ยมชม" required  name="detail"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">สรุปผล  :</label>
                            <div class="col-md-9">
                              <textarea class="form-control" rows="5" placeholder="สรุปผล" name="remark" ></textarea>
                            </div>
                          </div>


                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">รูปที่ 1  :</label>
                            <div class="col-md-9">
                              <input type="file" class="form-control"  id="photo1" name="SalePhoto[]" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">รูปที่ 2  :</label>
                            <div class="col-md-9">
                              <input type="file" class="form-control"  id="photo2" name="SalePhoto[]">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">รูปที่ 3  :</label>
                            <div class="col-md-9">
                              <input type="file" class="form-control"  id="photo3" name="SalePhoto[]">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-md-3 control-label">รูปที่ 4  :</label>
                            <div class="col-md-9">
                              <input type="file" class="form-control"  id="photo4" name="SalePhoto[]">
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-info " name="Submit_SaleAdd">เพิ่มข้อมูล</button>
                            <button type="reset"  class="btn btn-default">เริ่มใหม่</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="sale_calendar">

                  <!--- Calebdar -->
                  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.print.min.css" media='print'>
                  <link rel="stylesheet" href="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.css">
                  <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/moment.min.js"></script>
                  <script src="<?=SITE_URL;?>plugins/fullcalendar/dist/fullcalendar.min.js"></script>


                  <div class="col-xs-12" style="padding:10px 15px;">
                    <span class="label label-info">การเข้าเยี่ยม อย่างน้อย 2 ~ 3 ครั้ง/วัน</span><br>
                    <span class="label label-success">โทรศัพท์พูดคุย อย่างน้อย 5 ~ 10 ครั้ง/วัน</span>
                  </div>

                  <div class="col-xs-12" style="padding:10px 15px;">
                    <span class="label label-info">เข้าเยี่ยมชม</span>
                    <span class="label label-success">โทรศัพท์คุย</span>
                    <span class="label label-danger">ฝึกอบรบ</span>
                    <span class="label label-warning">สนับสนุน</span>
                    <span class="label label-default">อื่นๆ</span>
                  </div>
                  <div id="ViewCalendar_sale"></div>
                  <style media="screen">
                    .fc-time{display: none;}
                    .fc-day-grid-event{cursor: pointer;}
                  </style>
                  <script>
                    $(document).ready(function() {

                      $('#ViewCalendar_sale').fullCalendar({
                        header: {
                          left: 'prev,next today',
                          center: 'title',
                          right: 'month'//,agendaWeek',agendaDay,listWeek'
                        },
                        defaultDate: '<?=date("Y-m-d");?>',
                        navLinks: false, // can click day/week names to navigate views
                        editable: false,
                        eventLimit: true, // allow "more" link when too many events
                        events: [
                          <?

                            $sql = "SELECT ssp.*,tss.*,a.name_admin
                                    FROM service_sale_pro ssp
                                    INNER JOIN type_service_sale tss ON ( ssp.type_service_id = tss.ID_type_service )
                                    INNER JOIN admin a ON ( ssp.admin_id = a.ID_admin )
                                    ORDER BY ssp.create_date ASC";


                            if (select_numz($sql)>0) { $i=0;
                              foreach (select_tbz($sql) as $row) {
                                $background = "";

                                if ($row['type_service_id']==1) {
                                  $background = " backgroundColor: '#00c0ef',borderColor : '#00c0ef' "; /// info
                                }else if ($row['type_service_id']==2){
                                  $background = " backgroundColor: '#00a65a',borderColor : '#00a65a' "; /// success
                                }else if ($row['type_service_id']==3){
                                  $background = " backgroundColor: '#dd4b39',borderColor : '#dd4b39' "; /// danger
                                }else if ($row['type_service_id']==4){
                                  $background = " backgroundColor: '#f39c12',borderColor : '#f39c12' "; /// warning
                                }else{
                                  $background = " backgroundColor: '#d2d6de',borderColor : '#d2d6de' "; /// default
                                }


                                if ($i==0) {
                                  echo "{
                                          service_id : '".$row['service_id']."',
                                          title: '".trim($row['name_admin'])."',
                                          start: '".$row['date_start']."T00:00:00',
                                          end: '".$row['date_end']."T23:59:59',
                                          $background
                                        }";
                                }else {
                                  echo ",{
                                          service_id : '".$row['service_id']."',
                                          title: '".trim($row['name_admin'])."',
                                          start: '".$row['date_start']."T00:00:00',
                                          end: '".$row['date_end']."T23:59:59',
                                          $background
                                        }";
                                }
                                $i++;
                              }
                            }
                          ?>
                        ],
                        eventClick: function(calEvent, jsEvent, view) {

                          //$(".SubmitUpdateSchedule").attr("id",calEvent.service_id);

                          $.post("../../jquery/others.php",
                          {
                            service_id  : calEvent.service_id,
                            post  : "sale-view-service-admin"
                          },
                          function(d) {
                            var l = d.split("|||");
                    				if(l.length>0){
                    					$("#v_date_service").val(l[0]);
                    					$("#v_date_str_service").val(l[1]);
                    					$("#v_date_end_service").val(l[2]);
                    					$("#v_ddlGeo").val(l[3]);
                    					$("#v_province").val(l[4]);
                    					$("#v_branchpro").val(l[5]);
                    					$("#v_contact_name").val(l[6]);
                    					$("#v_detail_comment").val(l[7]);
                    					$("#v_remark").val(l[8]);
                    					$("#v_admin_comment").val(l[9]);
                    					$("#v_photo").html(l[10]);
                            }
                          });
                          $('#modal-view').modal();

                        }
                      });

                    });
                  </script>
                  <!--- Calendar -->

                </div>
             </div>
            </div>
          </div>
        </div>
      </div>
     </div>
  </div>

  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">แผนงานอนาคต</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-xs-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active "><a href="#sale_planview" data-toggle="tab"> <i class="fa fa-line-chart" aria-hidden="true"></i> <b>ดูรายการแผนงาน</b></a></li>
                <li><a href="#sale_plannew" data-toggle="tab"> <i class="fa fa-line-chart" aria-hidden="true"></i> <b>สร้างแผนงาน</b></a></li>
                <li><a href="#sale_plancalendar" data-toggle="tab"> <i class="fa fa-line-chart" aria-hidden="true"></i> <b>ตารางปฎิทินการวางแผนงาน</b></a></li>
              </ul>
              <div class="tab-content">
                  <div class="tab-pane" id="sale_plannew">
                    <div class="row">
                      <div class="col-xs-12" style="margin:15px 0;">
                        <form action="<?=$HostLinkAndPath;?>" method="post"  class="form-horizontal">
                          <div class="col-sm-12 col-md-6 col-lg-12">
                            <div class="form-group">
                              <label for="" class="col-md-3 control-label">ประเภทการเยี่ยม * :</label>
                              <div class="col-md-9">
                                <select class="form-control" required name="pl_type_service">
                                  <option value="">เลือกประเภทการเยี่ยม</option>
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
                              <label for="" class="col-md-3 control-label">วันที่เริ่ม :</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  required data-date-format="yyyy/mm/dd" value="<?=date("Y/m/d");?>" style="background:#fff;" placeholder="<?=date("Y/m/d");?>" id="date_str_service"   name="pl_date_str_service" />
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-3 control-label">วันที่สิ้นสุด :</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" required data-date-format="yyyy/mm/dd"  value="<?=date("Y/m/d");?>"  style="background:#fff;"placeholder="<?=date("Y/m/d");?>" id="date_end_service"   name="pl_date_end_service" />
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-3 control-label">เขตพื้นที่ :</label>
                              <div class="col-md-9">
                                <select name="pl_ddlGeo" class="form-control ddlGeo_area select2" required  style="width:100%;">
                                  <option value="">เลือกเขตพื้นที่</option>
                                  <option value="BKK">เขต BKK</option>
                                  <option value="C">เขต C</option>
                                  <option value="N">เขต N</option>
                                  <option value="E">เขต E</option>
                                  <option value="S">เขต S</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-3 control-label">จังหวัด :</label>
                              <div class="col-md-9">
                                <select class="form-control province_view select2" required name="pl_province"  style="width:100%;">
                                	<option value="0">จังหวัด</option>
                      							<?
                      							$sql_province = " SELECT  p.PROVINCE_ID,p.PROVINCE_NAME
                                                      FROM province p
                                                      ORDER BY p.PROVINCE_NAME ASC";
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
                              <label for="" class="col-md-3 control-label">ร้าน/บริษัท  :</label>
                              <div class="col-md-9">
                                <select class="form-control select2" name="pl_branchpro" required style="width:100%;">
                                  <option value="">เลือกร้าน/บริษัท</option>
                                  <?
                                  $sqlpro = "SELECT m.member_id,m.company,mg.mem_group_name
                                         FROM member m
                                         INNER JOIN member_group mg ON m.group_member = mg.mem_group
                                         WHERE (
                                                  ( m.group_member = 'fr' OR
                                                    m.group_member = 'Pa' OR
                                                    m.group_member = 'Dl' OR
                                                    m.group_member = 'In' OR
                                                    m.group_member = 'Sh'
                                                  )
                                              )
                                         ORDER BY m.company ASC" ;
                                   if(select_numz($sqlpro)>0){ $i=1;
                                     ?><option value="272">ลูกค้าอื่นๆ ในเครือบริษัท Zynek (Dealer)</option><?
                                      foreach(select_tbz($sqlpro) as $row){
                                        ?><option value="<?=$row['member_id'];?>">(<?=sprintf("%03d",($i++));?>) <?=$row['company'];?> (<?=$row['mem_group_name'];?>)</option><?
                                      }
                                    }
                                  ?>
                              </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-md-3 control-label">วัตถุประสงค์แผนงาน  :</label>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="5" placeholder="วัตถุประสงค์การวางแผนงาน" required  name="pl_detail"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="col-xs-12">
                              <button type="submit" class="btn btn-info " name="Submit_PlanAdd">เพิ่มข้อมูลการวางแผนงาน</button>
                              <button type="reset"  class="btn btn-default">เริ่มใหม่</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="active tab-pane" id="sale_planview">
                    <div class="row">
                      <div class="col-xs-12" style="margin:15px 0;">
                        <form action="<?=$HostLinkAndPath;?>" method="post">
                          <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-offset-1 col-md-8 col-offset-2 col-lg-8 col-lg-offset-2">
                            <div class="col-sm-6" style="margin:15px 0 0 0;padding:0px;">
                              <div class="col-xs-12">
                                <div class="form-group">
                                  <label for="" class="control-label">จังหวัด :</label>
                                  <select class="form-control province_view select2 "  style="width:100%;" name="PLprovince">
                                  	<option value="">จังหวัด</option>
                      							<?
                      							$sql_province = "SELECT * FROM province ORDER BY PROVINCE_NAME ASC";
                      								if(select_numz($sql_province)>0){
                      									foreach(select_tbz($sql_province) as $row){
                      									?><option value="<?=$row['PROVINCE_ID'];?>"><?=$row['PROVINCE_NAME'];?></option><?
                      									}
                      								}

                      							?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-xs-12">
                                <div class="form-group">
                                  <label for="" class="control-label">เขตพื้นที่ :</label>
                                  <select class="form-control ddl_geo select2"  style="width:100%;" name="PLarea">
                                    	<option value="">เลือกเขตพื้นที่</option>
                                      <option value="BKK">เขต BKK</option>
                                      <option value="C">เขต C</option>
                                      <option value="N">เขต N</option>
                                      <option value="E">เขต E</option>
                                      <option value="S">เขต S</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6" style="margin:15px 0 0 0;padding:0px;">
                              <div class="col-xs-12">
                                <div class="form-group">
                                  <label for="" class="control-label">วันที่เริ่ม :</label>
                                  <input type="text" class="form-control" readonly placeholder="<?=date("Y/m/d");?>" value="<?=$_POST['PLstrDate']!=""?$_POST['PLstrDate']:date("Y/m/d");?>" id="date_str_service" data-date-format="yyyy/mm/dd" name="PLstrDate" />
                                </div>
                              </div>
                              <div class="col-xs-12">
                                <div class="form-group">
                                  <label for="" class="control-label">วันที่สิ้นสุด :</label>
                                  <input type="text" class="form-control" readonly placeholder="<?=date("Y/m/d");?>" value="<?=$_POST['PLendDate']!=""?$_POST['PLendDate']:date("Y/m/d");?>" id="date_end_service" data-date-format="yyyy/mm/dd" name="PLendDate" />
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-12" style="margin:15px 0 0 0;padding:0px;">
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                  <label for="" class="control-label">ประเภทแผน :</label>
                                  <select class="form-control" name="PLtypeService">
                                  	<option value="">เลือกประเภท</option>
                                  	<?
                        							$sql_type = "SELECT * FROM type_service_sale " ;
                        							if(select_numz($sql_type)>0){
                        								foreach(select_tbz($sql_type) as $row){
                        									?><option value="<?=$row['ID_type_service'];?>" <?=$row['ID_type_service']==$_POST['StypeService']?"selected":"";?>><?=$row['name_service'];?></option><?
                        								}
                      							}
                      							?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <label for="" class="control-label">ร้านค้า/บริษัท :</label>
                                <div class="input-group">
                                    <!--<input type="text" class="form-control" placeholder="กรอกข้อมูลค้นหา ร้านค้า/บริษัท" name="Sbranch">-->
                                    <select class="form-control select2"  name="PLbranch" style="width:100%;">
                                      <option value="">เลือกร้าน/บริษัท</option>
                                      <?
                                      $sqlpro = "SELECT m.member_id,m.company,mg.mem_group_name
                                             FROM member m
                                             INNER JOIN member_group mg ON m.group_member = mg.mem_group
                                             WHERE (
                                                      ( m.group_member = 'fr' OR
                                                        m.group_member = 'Pa' OR
                                                        m.group_member = 'Dl' OR
                                                        m.group_member = 'In' OR
                                                        m.group_member = 'Sh'
                                                      )
                                                  )
                                             ORDER BY m.company ASC" ;
                                       if(select_numz($sqlpro)>0){ $i=1;
                                         ?><option value="272">ลูกค้าอื่นๆ ในเครือบริษัท Zynek (Dealer)</option><?
                                          foreach(select_tbz($sqlpro) as $row){
                                            ?><option value="<?=$row['member_id'];?>">(<?=sprintf("%03d",($i++));?>) <?=$row['company'];?> (<?=$row['mem_group_name'];?>)</option><?
                                          }
                                        }
                                      ?>
                                  </select>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default" name="SubmitPlanSearch">ค้นหา</button>
                                    </span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>

                      <div class="col-xs-12" id="show_table_search">
                        <div class="table-responsive">
                          <?
                            if (isset($_POST["SubmitPlanSearch"])) {
                              if($_POST["PLstrDate"] != "" && $_POST["PLendDate"] != ""){
                                ?> <span class="label label-default">ระหว่างวันที่ (<?=date_($_POST["PLstrDate"])." - ".date_($_POST["PLendDate"]);?>)</span> <?
                              }else{
                                if($_POST["PLstrDate"] != "" ){
                                  ?> <span class="label label-default">เริ่มวันที่ <?=date_($_POST["PLstrDate"]);?></span> <?
                                }
                                if($_POST["PLendDate"] != "" ){
                                  ?> <span class="label label-default">สิ้นสุดวันที่ <?=date_($_POST["PLendDate"]);?></span> <?
                                }
                              }
                              if($_POST["PLbranch"]!=""){
                                $sqlz = "SELECT company FROM member WHERE ( member_id = '".$_POST["PLbranch"]."' )";
                                if (select_numz($sqlz)>0) {
                                  foreach (select_tbz($sqlz) as $kevalue) {
                                    ?> <span class="label label-default">ลูกค้า : <?=$kevalue["company"];?></span> <?
                                  }
                                }
                              }
                              if($_POST["PLprovince"]!=""){
                                $sqlz = "SELECT PROVINCE_NAME FROM province WHERE ( PROVINCE_ID = '".$_POST["PLprovince"]."' )";
                                if (select_numz($sqlz)>0) {
                                  foreach (select_tbz($sqlz) as $kevalue) {
                                    ?> <span class="label label-default">จังหวัด : <?=$kevalue["PROVINCE_NAME"];?></span> <?
                                  }
                                }
                              }
                              if($_POST["PLarea"]!=""){
                                ?> <span class="label label-default">เขตพื้นที่ <?=$_POST["PLarea"];?></span> <?
                              }
                              if($_POST["PLtypeService"]!=""){
                                $sqlz = "SELECT name_service FROM type_service_sale WHERE ( ID_type_service = '".$_POST["PLtypeService"]."' )";
                                if (select_numz($sqlz)>0) {
                                  foreach (select_tbz($sqlz) as $kevalue) {
                                    ?> <span class="label label-default">ประเภทแผน : <?=$kevalue["name_service"];?></span> <?
                                  }
                                }

                              }
                            }
                          ?>
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ลำดับ</th>
                                <th>บริษัท</th>
                                <th>ประเภทแผน</th>
                                <th style="min-width: 100px;">วันที่เริ่มแผน</th>
                                <th>จังหวัด</th>
                                <th style="min-width: 160px;">ล่าสุด ณ วันที่</th>
                                <th>จัดการ</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?
                              if (isset($_POST["SubmitPlanSearch"])) {

                              	if($_POST["PLstrDate"] != "" && $_POST["PLendDate"] != ""){
                              		$WHERE[] = " ( ssp.str_date BETWEEN '".$_POST["PLstrDate"]."' AND '".$_POST["PLendDate"]."' ) ";
                              	}else{
                              		if($_POST["PLstrDate"] != "" ){
                              			$WHERE[] = " ( ssp.str_date = '".$_POST["PLstrDate"]."' ) ";
                              		}
                              		if($_POST["PLendDate"] != "" ){
                              			$WHERE[] = " ( ssp.end_date  = '".$_POST["PLendDate"]."' ) ";
                              		}
                              	}
                              	if($_POST["PLbranch"]!=""){
                              		$WHERE[] = " ( m.member_id = '".$_POST["PLbranch"]."' ) ";
                              	}
                              	if($_POST["PLprovince"]!=""){
                              		$WHERE[] = " ( ssp.province_id =  '".$_POST["PLprovince"]."' ) ";
                              	}
                              	if($_POST["PLarea"]!=""){
                              		$WHERE[] = " ( ssp.area_plan =  '".$_POST["PLarea"]."' ) ";
                              	}
                              	if($_POST["PLtypeService"]!=""){
                              		$WHERE[] = " ( ssp.type_service_id =  '".$_POST["PLtypeService"]."' ) ";
                              	}

                              	$WHEREPRO = "";
                              	for($i=0;$i<count($WHERE);$i++){
                                		if($i==0){
                                			$WHEREPRO  .= " WHERE ".$WHERE[$i];
                                		}else{
                                			$WHEREPRO .= " AND ".$WHERE[$i];
                                		}
                                	}
                                $sqlp = "SELECT tss.name_service,
                                               ssp.str_date,ssp.end_date,ssp.type_area,
                                               p.name_province,
                                               m.company,
                                               ssp.detail_plan,ssp.create_date,ssp.admin_id,ssp.plan_id
                          							FROM service_sale_plan ssp
                          							LEFT OUTER JOIN member m ON ( ssp.member_id = m.member_id )
                          							LEFT OUTER JOIN sales_province p ON ( ssp.province_id = p.ID_province )
                          							LEFT OUTER JOIN type_service_sale tss ON ( ssp.type_service_id = tss.ID_type_service )
                                        $WHEREPRO
                          							ORDER BY ssp.create_date DESC;";
                                //echo $sql;
                                if (select_numz($sqlp)>0) { $i=1;
                                  foreach (select_tbz($sqlp) as $row) {
                                    ?>
                                    <tr>
                                      <td class="text-center"><?=$i;?></td>
                                      <td class="text-left"><?=$row['company'];?></td>
                                      <td class="text-left"><?=$row['name_service'];?></td>
                                      <td class="text-left"><?=date_($row['str_date']);?><?=$row['str_date']!=$row['end_date']?"<br>".date_($row['end_date']):"";?></td>
                                      <td class="text-left"><?=$row['name_province'];?></td>
                                      <td class="text-center"><?=datetime($row['create_date']);?></td>
                                      <td class="text-center">
                                        <div class="btn-group" style="width: 117px;">
                                          <button id="<?=$row['plan_id'];?>" data-toggle="modal" data-target="#modal-edit-plan" class="btn btn-default click_edit_plan <?=$row['admin_id']==base64url_decode($_SESSION[$SessionID])?"":"disabled";?>" <?=$row['admin_id']==base64url_decode($_SESSION[$SessionID])?"":"disabled";?>><i class="fa fa-pencil"></i></button>
                                          <button id="<?=$row['plan_id'];?>" data-toggle="modal" data-target="#modal-view-plan" class="btn btn-default click_view_plan"><i class="fa fa-search"></i></button>
                                        </div>
                                      </td>
                                    </tr>
                                    <? $i++;
                                  }
                                }

                                // code...
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
                      <!-- Search Table Sale -->
                    </div>
                  </div>
                  <div class="tab-pane" id="sale_plancalendar">
                    <div class="row">
                      <div class="col-xs-12">



                          <div class="col-xs-12" style="padding:10px 15px;">
                            <span class="label label-info">เข้าเยี่ยมชม</span>
                            <span class="label label-success">โทรศัพท์คุย</span>
                            <span class="label label-danger">ฝึกอบรบ</span>
                            <span class="label label-warning">สนับสนุน</span>
                            <span class="label label-default">อื่นๆ</span>
                          </div>
                          <div id="ViewCalendar_Plan"></div>
                          <style media="screen">
                            .fc-time{display: none;}
                            .fc-day-grid-event{cursor: pointer;}
                          </style>
                          <script>
                            $(document).ready(function() {

                              $('#ViewCalendar_Plan').fullCalendar({
                                header: {
                                  left: 'prev,next today',
                                  center: 'title',
                                  right: 'month'//,agendaWeek',agendaDay,listWeek'
                                },
                                defaultDate: '<?=date("Y-m-d");?>',
                                navLinks: false, // can click day/week names to navigate views
                                editable: false,
                                eventLimit: true, // allow "more" link when too many events
                                events: [
                                  <?

                                    $sql = "SELECT ssp.*,tss.*,a.name_admin
                                            FROM service_sale_plan ssp
                                            INNER JOIN type_service_sale tss ON ( ssp.type_service_id = tss.ID_type_service )
                                            INNER JOIN admin a ON ( ssp.admin_id = a.ID_admin )
                                            ORDER BY ssp.create_date ASC";


                                    if (select_numz($sql)>0) { $i=0;
                                      foreach (select_tbz($sql) as $row) {
                                        $background = "";

                                        if ($row['type_service_id']==1) {
                                          $background = " backgroundColor: '#00c0ef',borderColor : '#00c0ef' "; /// info
                                        }else if ($row['type_service_id']==2){
                                          $background = " backgroundColor: '#00a65a',borderColor : '#00a65a' "; /// success
                                        }else if ($row['type_service_id']==3){
                                          $background = " backgroundColor: '#dd4b39',borderColor : '#dd4b39' "; /// danger
                                        }else if ($row['type_service_id']==4){
                                          $background = " backgroundColor: '#f39c12',borderColor : '#f39c12' "; /// warning
                                        }else{
                                          $background = " backgroundColor: '#d2d6de',borderColor : '#d2d6de' "; /// default
                                        }


                                        if ($i==0) {
                                          echo "{
                                                  plan_id : '".$row['plan_id']."',
                                                  title: '".trim($row['name_admin'])."',
                                                  start: '".$row['str_date']."T00:00:00',
                                                  end: '".$row['end_date']."T23:59:59',
                                                  $background
                                                }";
                                        }else {
                                          echo ",{
                                                  plan_id : '".$row['plan_id']."',
                                                  title: '".trim($row['name_admin'])."',
                                                  start: '".$row['str_date']."T00:00:00',
                                                  end: '".$row['end_date']."T23:59:59',
                                                  $background
                                                }";
                                        }
                                        $i++;
                                      }
                                    }
                                  ?>
                                ],
                                eventClick: function(calEvent, jsEvent, view) {

                                  //$(".SubmitUpdateSchedule").attr("id",calEvent.service_id);
                                  $("#plv_ddlGeo").val("");
                                  $("#plv_date_str_service").val("");
                                  $("#plv_date_end_service").val("");
                                  $("#plv_province").val("");
                                  $("#plv_branchpro").val("");
                                  $("#plv_detail").val("");
                                  $("#plv_type_service").val("");

                                  $.post("../../jquery/others.php",
                            			{
                            				plan_id : calEvent.plan_id,
                            				post: "sale-plan-view-service"
                            			},
                            			function(d){
                            				//alert(d);
                            				var l = d.split("|||");
                            				if(l.length>0){
                                      $("#plv_ddlGeo").val(l[0]);
                                      $("#plv_date_str_service").val(l[1]);
                                      $("#plv_date_end_service").val(l[2]);
                                      $("#plv_province").val(l[3]);
                                      $("#plv_branchpro").val(l[4]);
                                      $("#plv_detail").val(l[5]);
                                      $("#plv_type_service").val(l[6]);
                            				}
                            			});
                                  $('#modal-view-plan').modal();

                                }
                              });

                            });
                          </script>
                          <!--- Calendar -->


                      </div>
                    </div>
                  </div>
               </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<!-- Sale service --->
<!-- view service -->
<script>
	$(document).ready(function(e) {
		//// view service
		$(".click_view").click(function(e) {

  			$("#v_date_service").val("");
  			$("#v_date_str_service").val("");
  			$("#v_date_end_service").val("");
  			$("#v_ddlGeo").val("");
  			$("#v_province").val("");
  			$("#v_branchpro").val("");
  			$("#v_contact_name").val("");
  			$("#v_detail_comment").val("");
  			$("#v_remark").val("");
  			$("#v_admin_comment").val("");
  			$("#v_photo").html("");


  			$.post("../../jquery/others.php",
  			{
  				service_id : $(this).attr("id"),
  				post: "sale-plan-view-service"
  			},
  			function(d){
  				//alert(d);
  				var l = d.split("|||");
  				if(l.length>0){
  					$("#v_date_service").val(l[0]);
  					$("#v_date_str_service").val(l[1]);
  					$("#v_date_end_service").val(l[2]);
  					$("#v_ddlGeo").val(l[3]);
  					$("#v_province").val(l[4]);
  					$("#v_branchpro").val(l[5]);
  					$("#v_contact_name").val(l[6]);
  					$("#v_detail_comment").val(l[7]);
  					$("#v_remark").val(l[8]);
  					$("#v_admin_comment").val(l[9]);
  					$("#v_photo").html(l[10]);
  				}
  			});
	  });
  });
</script>
<div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ดูรายการ</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
           <div class="form-group">
            <label class="col-sm-4 control-label">ประเภทการเยี่ยม</label>
            <div class="col-sm-8">
              <select class="form-control" id="v_date_service" readonly>
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
              <label class="col-sm-4 control-label">วันที่เริ่ม</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="<?=date("Y/m/d");?>"  id="v_date_str_service"  readonly>
              </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">วันที่สิ้นสุด</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="<?=date("Y/m/d");?>" id="v_date_end_service" readonly>
                <script>
        			  	$(function () {
    				        $("#e_date_str_service,#e_date_end_service").datepicker( );
      				    })
        			  </script>
              </div>
           </div>
           <div class="form-group">
                <label class="col-sm-4 control-label">เขตพื้นที่</label>
                <div class="col-sm-8">
                	<input type="text" id="v_ddlGeo" class="form-control" readonly>
                </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">จังหวัด</label>
              <div class="col-sm-8">
                <select class="form-control" id="v_province" readonly>
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
              <label class="col-sm-4 control-label">ร้านค้า/บริษัท</label>
              <div class="col-sm-8">
                <select class="form-control" id="v_branchpro" readonly>
                	<option value="">ร้านค้า/บริษัท</option>
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
              </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">ชื่อผู้ติดต่อ</label>
              <div class="col-sm-8">
                <input type="text" class="form-control"	placeholder="ชื่อผู้ติดต่อ"  id="v_contact_name" readonly>
              </div>
           </div>
           <div class="form-group">
                <label class="col-sm-4 control-label">วัตถุประสงค์</label>
                <div class="col-sm-8">
                  <textarea class="form-control"  placeholder="วัตถุประสงค์"  id="v_detail_comment" readonly></textarea>
                </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">สรุปผล</label>
              <div class="col-sm-8">
                <textarea class="form-control"  placeholder="สรุปผล"  id="v_remark" readonly></textarea>
              </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">รูป</label>
              <div class="col-sm-8" id="v_photo"></div>
           </div>
           <div class="form-group">
             <label class="col-sm-4 control-label">ข้อเสนอแนะผู้จัดการ</label>
             <div class="col-sm-8">
               <textarea class="form-control" placeholder="ข้อเสนอแนะผู้จัดการ" id="v_admin_comment" readonly></textarea>
             </div>
           </div>
           <div class="row">
        		<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
           </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end view Service --->
<!-- edit service -->
<script>
	$(document).ready(function(e) {
		//// view service
		$(".click_edit").click(function(e) {

			$(".e_update_service").attr("id",$(this).attr("id"));

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



			$.post("../../jquery/others.php",
			{
				service_id : $(this).attr("id"),
				post: "sale-view-service"
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
    					date_str        : $("#e_date_str_service").val() ,
    					date_end        : $("#e_date_end_service").val() ,
    					area_sale       : $("#e_ddlGeo").val(),
    					province        : $("#e_province").val(),
    					branchpro       : $("#e_branchpro").val() ,
    					contact_name    : $("#e_contact_name").val(),
    					detail_comment  : $("#e_detail_comment").val(),
    					remark_comment  : $("#e_remark").val(),
    					service_id      : $(this).attr("id"),
    					post            : "update_service"
    				},
    				function(d){
    					if(d=="Completed!"){
    						setTimeout(function(){
    							window.location.href = "<?=$HostLinkAndPath;?>";
    						},1000);
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
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ดูรายการ</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
           <div class="form-group">
            <label class="col-sm-4 control-label">ประเภทการเยี่ยม</label>
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
              <label class="col-sm-4 control-label">วันที่เริ่ม</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" required data-date-format="yyyy-mm-dd" readonly style="background:#fff;" placeholder="<?=date("Y/m/d");?>"  id="e_date_str_service" name="e_date_str_service">
              </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">วันที่สิ้นสุด</label>
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
                <label class="col-sm-4 control-label">เขตพื้นที่</label>
                <div class="col-sm-8">
                	<select id="e_ddlGeo" name="e_ddlGeo"  class="form-control" >
                  	<option value="">เขตพื้นที่</option>
                    <option value="BKK">เขต BKK</option>
                    <option value="C">เขต C</option>
                    <option value="N">เขต N</option>
                    <option value="E">เขต E</option>
                    <option value="S">เขต S</option>
                  </select>
                </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">จังหวัด</label>
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
              <label class="col-sm-4 control-label">ร้านค้า/บริษัท</label>
              <div class="col-sm-8">
                <select class="form-control select2" style="width:100%;" id="e_branchpro" name="e_branchpro" >
                	<option value="">ร้านค้า/บริษัท</option>
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
              </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">ชื่อผู้ติดต่อ</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" required
                	placeholder="ชื่อผู้ติดต่อ" name="e_contact_name" id="e_contact_name">
              </div>
           </div>
           <div class="form-group">
                <label class="col-sm-4 control-label">วัตถุประสงค์</label>
                <div class="col-sm-8">
                  <textarea class="form-control" required placeholder="วัตถุประสงค์" name="e_detail_comment" id="e_detail_comment"></textarea>
                </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">สรุปผล</label>
              <div class="col-sm-8">
                <textarea class="form-control"  placeholder="สรุปผล" name="e_remark" id="e_remark"></textarea>
              </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">รูป</label>
              <div class="col-sm-8" id="e_photo"></div>
           </div>
           <div class="row">
        		<div class="modal-footer">
              <div class="form-group">
                <label class="col-sm-4 control-label">ข้อเสนอแนะผู้จัดการ</label>
                <div class="col-sm-8">
                  <textarea class="form-control" readonly placeholder="ข้อเสนอแนะผู้จัดการ" id="e_admin_comment"></textarea>
                </div>
              </div>
              <label id="show_msg_update"></label>
          	  <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
              <button type="button" class="btn btn-success e_update_service"  id="">บันทึก</button>
            </div>
           </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end edit Service --->
<!--Alert Delete Popup -->
<script>
	$(document).ready(function(e) {
		$(".click_delete").click(function(e) {
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
  						window.location.href = "<?=$HostLinkAndPath;?>";
  					},1000);
  				});
	    });
	});
</script>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="row" style="text-align:center; margin: 20px 0;">
       <h2><span class="glyphicon glyphicon-trash animated tada go" aria-hidden="true"></span></h2>
       <p>ยืนยันการลบข้อมูล !</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-success btn_delete_popup" data-dismiss="modal" id="">ลบข้อมูล</button>
      </div>
    </div>
  </div>
</div>
<!--Alert Delete Popup -->
<!-- admin comment service -->
<script>
	$(document).ready(function(e) {
		//// view admin service
		$(".click_sign").click(function(e) {

			$("#c_date_service").val("");
			$("#c_date_str_service").html("");
			$("#c_date_end_service").html("");
			$("#c_ddlGeo").val("");
			$("#c_province").val("");
			$("#c_branchpro").val("");
			$("#c_contact_name").html("");
			$("#c_detail_comment").val("");
			$("#c_remark").val("");


			$(".click_sign_update").attr("id",$(this).attr("id"));


			$.post("../../jquery/others.php",
			{
				service_id : $(this).attr("id"),
				post: "sale-view-service-admin"
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
          $("#c_admincomment").val(l[9]);
					$("#a_photo_comment").html(l[10]);

				}
			});
	    });

		// update comment admin service
		$(".click_sign_update").click(function(e) {
	     if($("#c_admincomment").val()){
				$.post("../../jquery/others.php",
				{
					admin_comment : $("#c_admincomment").val(),
					service_id    : $(this).attr("id"),
					post  : "admin_update_comment_service"
				},
				function(dd){
          var i = dd.split("|||");
					if(i[0]=="C"){
            $("#show_msg_update_admin").html(i[1]);
						setTimeout(function(){
							window.location.href = "<?=$HostLinkAndPath;?>";
						},2000);
					}else{
						$("#show_msg_update_admin").html(i[1]);
					}
				});
			}else{
				$("#show_msg_update_admin").html("Please insert value");
			}
    });
	});
</script>
<div class="modal fade" id="modal-sign" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ข้อเสนอแนะผู้จัดการ</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
           <div class="form-group">
                <label class="col-sm-4 control-label">ประเภทการเยี่ยม</label>
                <div class="col-sm-8">
                  <select class="form-control" id="c_date_service" readonly>
                  	<option value="">ประเภทการเยี่ยม</option>
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
                <label class="col-sm-4 control-label">วันที่เริ่ม</label>
                <div class="col-sm-8">
                  <label class="form-control" id="c_date_str_service" readonly></label>
                </div>
           </div>
           <div class="form-group">
                <label class="col-sm-4 control-label">วันที่สิ้นสุด</label>
                <div class="col-sm-8">
                  <label class="form-control" id="c_date_end_service"readonly></label>
                </div>
           </div>
           <div class="form-group">
                <label class="col-sm-4 control-label">เขตพื้นที่</label>
                <div class="col-sm-8">
                 	<input id="c_ddlGeo"class="form-control" readonly value="" />
                </div>
           </div>
           <div class="form-group">
                <label class="col-sm-4 control-label">จังหวัด</label>
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
                  <label class="col-sm-4 control-label">ร้านค้า/บริษัท</label>
                <div class="col-sm-8">
                  <select class="form-control" id="c_branchpro" readonly>
                  	<option value="">ร้านค้า/บริษัท</option>
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
                <label class="col-sm-4 control-label">ผู้ติดต่อ</label>
                <div class="col-sm-8">
                  <label  class="form-control" id="c_contact_name" readonly></label>
                </div><br>
           </div>
           <div class="form-group">
                <label class="col-sm-4 control-label">วัตถุประสงค์</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="c_detail_comment" readonly></textarea>
                </div>
            </div>
           <div class="form-group">
                <label class="col-sm-4 control-label">สรุปผล</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="c_remark" readonly></textarea>
                </div>
            </div>
           <div class="form-group">
                <label class="col-sm-4 control-label">รูปภาพ</label>
                <div class="col-sm-8" id="a_photo_comment">

                </div>
            </div>
            <div class="form-group">
                 <div class="col-sm-12" id="show_msg_update_admin"></div>
             </div>
           <div class="row">
        		 <div class="modal-footer">
               <div class="form-group">
                      <label class="col-sm-4 control-label">ข้อเสนอแนะผู้จัดการ</label>
                    <div class="col-sm-8">
                      <textarea class="form-control"  placeholder="ข้อเสนอแนะผู้จัดการ" id="c_admincomment"></textarea>
                    </div>
                </div>
            	  <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-success click_sign_update"  id="">เพิ่มข้อเสนอแนะ</button>
             </div>
           </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- admin comment Service --->



<!-- Sale Plan -->
<!-- view plan -->
<script>
	$(document).ready(function(e) {
		//// view service
		$(".click_view_plan").click(function(e) {

        $("#plv_ddlGeo").val("");
        $("#plv_date_str_service").val("");
        $("#plv_date_end_service").val("");
        $("#plv_province").val("");
        $("#plv_branchpro").val("");
        $("#plv_detail").val("");
        $("#plv_type_service").val("");


  			$.post("../../jquery/others.php",
  			{
  				plan_id : $(this).attr("id"),
  				post: "sale-plan-view-service"
  			},
  			function(d){
  				//alert(d);
  				var l = d.split("|||");
  				if(l.length>0){
            $("#plv_ddlGeo").val(l[0]);
            $("#plv_date_str_service").val(l[1]);
            $("#plv_date_end_service").val(l[2]);
            $("#plv_province").val(l[3]);
            $("#plv_branchpro").val(l[4]);
            $("#plv_detail").val(l[5]);
            $("#plv_type_service").val(l[6]);
  				}
  			});
	  });
  });
</script>
<div class="modal fade" id="modal-view-plan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ดูรายการ</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
           <div class="form-group">
            <label class="col-sm-4 control-label">ประเภทการเยี่ยม</label>
            <div class="col-sm-8">
              <select class="form-control" id="plv_type_service" readonly>
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
              <label class="col-sm-4 control-label">วันที่เริ่ม</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="<?=date("Y/m/d");?>"  id="plv_date_str_service"  readonly>
              </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">วันที่สิ้นสุด</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="<?=date("Y/m/d");?>" id="plv_date_end_service" readonly>
              </div>
           </div>
           <div class="form-group">
                <label class="col-sm-4 control-label">เขตพื้นที่</label>
                <div class="col-sm-8">
                	<input type="text" id="plv_ddlGeo" class="form-control" readonly>
                </div>
           </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">จังหวัด</label>
              <div class="col-sm-8">
                <select class="form-control" id="plv_province" readonly>
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
              <label class="col-sm-4 control-label">ร้านค้า/บริษัท</label>
              <div class="col-sm-8">
                <select class="form-control" id="plv_branchpro" readonly>
                	<option value="">ร้านค้า/บริษัท</option>
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
              </div>
           </div>
           <div class="form-group">
                <label class="col-sm-4 control-label">วัตถุประสงค์แผน</label>
                <div class="col-sm-8">
                  <textarea class="form-control"  placeholder="วัตถุประสงค์แผน"  id="plv_detail" readonly></textarea>
                </div>
           </div>
           <div class="row">
          		<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
              </div>
           </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end view plan --->
<!-- edit service -->
<script>
	$(document).ready(function(e) {
		//// view service
		$(".click_edit_plan").click(function(e) {

			$(".e_update_service_plan").attr("id",$(this).attr("id"));

      $("#ple_ddlGeo").val("");
      $("#ple_date_str_service").val("");
      $("#ple_date_end_service").val("");
      $("#ple_province").val("");
      $("#ple_branchpro").val("");
      $("#ple_detail").val("");
      $("#ple_type_service").val("");


      $.post("../../jquery/others.php",
      {
        plan_id : $(this).attr("id"),
        post: "sale-plan-view-service-for-edit"
      },
      function(d){
        //alert(d);
        var l = d.split("|||");
        if(l.length>0){
          $("#ple_ddlGeo").val(l[0]);
          $("#ple_date_str_service").val(l[1]);
          $("#ple_date_end_service").val(l[2]);
          $("#ple_province").val(l[3]);
          $("#ple_branchpro").val(l[4]);
          $("#ple_detail").val(l[5]);
          $("#ple_type_service").val(l[6]);
        }
      });
	  });
		// update service
		$(".e_update_service_plan").click(function(e) {
	        if(
              $("#ple_ddlGeo").val() !="" &&
              $("#ple_date_str_service").val() !="" &&
              $("#ple_date_end_service").val() !="" &&
              $("#ple_province").val() !="" &&
              $("#ple_branchpro").val() !="" &&
              $("#ple_detail").val() !="" &&
              $("#ple_type_service").val() !=""
			       ){
    				$.post("../../jquery/others.php",
    				{
    					type_service_id : $("#ple_type_service").val() ,
    					str_date     : $("#ple_date_str_service").val() ,
    					end_date     : $("#ple_date_end_service").val() ,
    					area_plan    : $("#ple_ddlGeo").val(),
    					province_id  : $("#ple_province").val(),
    					branchpro    : $("#ple_branchpro").val(),
    					detail_plan  : $("#ple_detail").val(),
    					plan_id      : $(this).attr("id"),
    					post            : "update_sale_serive_plan"
    				},
    				function(d){
              var i = d.split("|||");
    					if(i[0]=="C"){
                $("#show_msg_update_plan").html(i[1]);
    						setTimeout(function(){
    							window.location.href = "<?=$HostLinkAndPath;?>";
    						},1000);
    					}else{
    						$("#show_msg_update_plan").html(i[1]);
    					}
    				});
    			}else{
    				$("#show_msg_update_plan").html("กรุณากรอกข้อมูล ...ให้ครบ");
    			}
	    });
	});
</script>
<div class="modal fade" id="modal-edit-plan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ดูรายการ</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
           <label class="col-sm-4 control-label">ประเภทการเยี่ยม</label>
           <div class="col-sm-8">
             <select class="form-control" id="ple_type_service">
               <option value="">ประเภทการเยี่ยม</option>
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
             <label class="col-sm-4 control-label">วันที่เริ่ม</label>
             <div class="col-sm-8">
               <input type="text" class="form-control" placeholder="<?=date("Y/m/d");?>"  id="ple_date_str_service" />
             </div>
             <script>
               $(function () {
                 $("#ple_date_str_service,#ple_date_end_service").datepicker();
               })
             </script>
          </div>
          <div class="form-group">
             <label class="col-sm-4 control-label">วันที่สิ้นสุด</label>
             <div class="col-sm-8">
               <input type="text" class="form-control" placeholder="<?=date("Y/m/d");?>" id="ple_date_end_service" />
             </div>
          </div>
          <div class="form-group">
               <label class="col-sm-4 control-label">เขตพื้นที่</label>
               <div class="col-sm-8">
                 <select id="ple_ddlGeo" class="form-control"  style="width:100%;">
                   <option value="">เลือกเขตพื้นที่</option>
                   <option value="BKK">เขต BKK</option>
                   <option value="C">เขต C</option>
                   <option value="N">เขต N</option>
                   <option value="E">เขต E</option>
                   <option value="S">เขต S</option>
                 </select>
               </div>
          </div>
          <div class="form-group">
             <label class="col-sm-4 control-label">จังหวัด</label>
             <div class="col-sm-8">
               <select class="form-control select2" id="ple_province"  style="width:100%;">
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
             <label class="col-sm-4 control-label">ร้านค้า/บริษัท</label>
             <div class="col-sm-8">
               <select class="form-control select2" id="ple_branchpro" style="width:100%;">
                 <option value="">ร้านค้า/บริษัท</option>
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
             </div>
          </div>
          <div class="form-group">
             <label class="col-sm-4 control-label">วัตถุประสงค์แผน</label>
             <div class="col-sm-8">
               <textarea class="form-control"  placeholder="วัตถุประสงค์แผนงาน"  id="ple_detail"></textarea>
             </div>
          </div>
          <div class="row">
        		<div class="modal-footer">
              <label id="show_msg_update_plan"></label>
          	  <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
              <button type="button" class="btn btn-success e_update_service_plan"  id="">บันทึก</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end edit plan --->
<!--Alert Delete plan -->
<script>
	$(document).ready(function(e) {
		$(".click_delete_plan").click(function(e) {
			$(".btn_delete_plan").removeAttr("id");
      $(".btn_delete_plan").attr("id",$(this).attr("id"));
    });

	    $(".btn_delete_plan").click(function(e) {
	        $.post("../../jquery/others.php",
  				{
  					id : $(this).attr("id"),
  					post:"delete_sale_plan"
  				},
  				function(d){
            var i = d.split("|||");
            if (i[0]=="C") {
    					$("#msg_show_delete_plan").html(i[1]);
    					setTimeout(function(d){
    						window.location.href = "<?=$HostLinkAndPath;?>";
    					},1000);
            }else {
    					$("#msg_show_delete_plan").html(i[1]);
            }
  				});
	    });
	});
</script>
<div class="modal fade" id="modal-delete-plan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="row" style="text-align:center; margin: 20px 0;">
       <h2><span class="glyphicon glyphicon-trash animated tada go" aria-hidden="true"></span></h2>
       <p id="msg_show_delete_plan">ยืนยันการลบข้อมูล !</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-success btn_delete_plan" data-dismiss="modal" id="">ลบข้อมูล</button>
      </div>
    </div>
  </div>
</div>
<!--Alert Delete plan -->









<script src="<?=SITE_URL;?>plugins/select2/dist/js/select2.min.js"></script>
<script>
  $(function () {
     //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<link rel="stylesheet" href="<?=SITE_URL;?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
<script src="<?=SITE_URL;?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
  $(function () {
    //Date picker
    $('#date_end_service,#date_str_service').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd'
    });
  })
</script>
