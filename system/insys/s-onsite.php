<div class="row">
  <div class="col-sm-12 col-xs-12">


    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li><a href="#new_onsite_service" data-toggle="tab">เพิ่มรายการ Onsite</a></li>
        <li class="active"><a href="#view_onsite_service" data-toggle="tab">ดูรายการ Onsite</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane" id="new_onsite_service">
          <div class="row">
            <div class="col-xs-12">

            </div>
          </div>
        </div>
        <div class="active tab-pane" id="view_onsite_service">
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
            </div>
            <div class="col-xs-12">
              <div class="table-responsive" style="border:0px;">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">ลำดับ</th>
                      <th>ผู้ขอ</th>
                      <th>รูปแบบงาน</th>
                      <th>จังหวัด</th>
                      <th class="text-center">จำนวนเข้าร่วม</th>
                      <th style="min-width:100px;">วันที่เริ่มงาน</th>
                      <th class="text-center">สถานะ</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                      $sql = "SELECT so.id_sup_onsite,so.name_re,ns.nickname_th,saa.sign_area,sw.name_workshop,p.PROVINCE_NAME,so.location,so.p_count,so.str_date
                        		  FROM sup_onsite so
                        		  LEFT OUTER JOIN sup_approve sa ON (so.id_sup_onsite = sa.id_sup_onsite)
                        		  INNER JOIN sales_name ns ON (so.ID_sales = ns.ID_sales)
                        		  INNER JOIN sales_area saa ON (ns.ID_area = saa.ID_area)
                        		  INNER JOIN sup_workshop sw ON (so.id_workshop = sw.id_workshop )
                        		  INNER JOIN province p ON (so.id_province = p.PROVINCE_ID)
                        		  ORDER BY so.on_datetime DESC";
                      $Per_Page = 50;   // Per Page
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
                      if (select_numz($sql)>0) { $i=1;
                        foreach (select_tbz($sql) as $row) {
                          ?>
                            <tr>
                              <td class="text-center"><?=($id_run++);?></td>
                              <td><?=$row['name_re'];?></td>
                              <td><?=$row['name_workshop'];?></td>
                              <td><?=$row['PROVINCE_NAME'];?></td>
                              <td class="text-center"><?=$row['p_count'];?></td>
                              <td><?=date_($row['str_date']);?></td>
                              <td>
                                <?
                                  if(check_status_onsite_view($row['id_sup_onsite'])=="0"){
                                    ?><span class="label label-warning">รออนุมัติ</span><?
                            			}else if(check_status_onsite_view($row['id_sup_onsite'])=="1"){
                                    ?><span class="label label-success">อนุมัติ</span><?
                            			}else{
                                    ?><span class="label label-danger">ไม่อนุมัติ</span><?
                            			}
                                ?>
                              </td>
                              <td class="text-center">
                                <div class="btn-group" style="width: 117px;">
                                  <button id="<?=$row['id_sup_onsite'];?>" data-toggle="modal" data-target="#modal-view"   class="btn btn-default click_view"><i class="fa fa-search"></i></button>
                                  <button id="<?=$row['id_sup_onsite'];?>" data-toggle="modal" data-target="#modal-approve" class="btn btn-default click_approve"><i class="fa fa-pencil-square-o"></i></button>
                                  <button id="<?=$row['id_sup_onsite'];?>" data-toggle="modal" data-target="#modal-delete" class="btn btn-default click_delete <?=check_status_onsite_view($row['id_sup_onsite'])!="0"?"disabled":"";?>" <?=check_status_onsite_view($row['id_sup_onsite'])!="0"?"disabled":"";?> ><i class="fa fa-trash-o"></i></button>
                                </div>
                              </td>
                            </tr>
                          <?
                        }
                      }
                    ?>

                  </tbody>
                </table>
              </div>
              <div class="col-xs-12">
                <nav>
                  <ul class="pagination">
                   <?
                      if($Prev_Page){
                        ?><li><a href="<?=SITE_URL_ADMIN;?>call-service/<?=$Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?
                      }
                      for($i=1; $i<=$Num_Pages; $i++){
                        $Page1 = $Page-2;
                        $Page2 = $Page+2;
                        if($i != $Page && $i >= $Page1 && $i <= $Page2){
                          ?><li><a href="<?=SITE_URL_ADMIN;?>call-service/<?=$i;?>"><?=$i;?></a></li><?
                        }else if($i==$Page){
                          ?><li class="active"><a href="#"><?=$i;?></a></li><?
                        }
                      }
                      if($Page!=$Num_Pages){
                        ?><li><a href="<?=SITE_URL_ADMIN;?>call-service/<?=$Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?
                      }
                  ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
