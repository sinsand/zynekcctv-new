<div class="row">
  <div class="col-sm-12 col-xs-12">




    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li><a href="#new_call_service" data-toggle="tab">เพิ่มรายการ</a></li>
        <li class="active"><a href="#view_call_service" data-toggle="tab">ดูรายการ</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane" id="new_call_service">
          <div class="row">
            <div class="col-xs-12">

            </div>
          </div>
        </div>

        <div class="active tab-pane" id="view_call_service">
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
                      <th>ลูกค้า/บริษัท</th>
                      <th>ผู้ติดต่อ</th>
                      <th>แบรนด์</th>
                      <th>รุ่นสินค้า</th>
                      <th class="text-center">ระยะเวลา</th>
                      <th>รายละเอียด</th>
                      <th>วันที่ลงข้อมูล</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                      $sql = "SELECT ss.*
                              FROM sup_service ss
                              LEFT OUTER JOIN admin a ON (ss.id_admin = a.ID_admin)
                              WHERE ss.id_admin = '".base64url_decode($_COOKIE[$CookieID])."'
                              ORDER BY ss.id_sup_service  DESC ";
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
                              <td><?=$row['type_customer']==""?"-":$row['type_customer'];?></td>
                              <td><?=$row['name_contact'];?></td>
                              <td><?=$row['name_brand'];?></td>
                              <td><?=$row['name_product'];?></td>
                              <td class="text-center"><?=diff2time($row['start_time'],$row['end_time']);?></td>
                              <td><?=detail_query($row['id_sup_service'],1)==""||detail_query($row['id_sup_service'],1)==''?"-":detail_query($row['id_sup_service'],1);?></td>
                              <td><?=date_(substr($row['start_time'],0,10));?></td>
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
