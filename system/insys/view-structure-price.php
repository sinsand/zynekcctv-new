<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-7 col-lg-5">
  	<div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active "><a data-toggle="tab" href="#StructurePriceAll">โครงสร้างราคาทั้งหมด</a></li>
      </ul>
      <div class="tab-content">

        <div id="StructurePriceAll" class="tab-pane fade in active" style="padding:5px 0;">
          <div class="row">
            <div class="col-xs-12">
              <h3>โครงสร้างราคาสินค้า ทั้งหมด</h3>

                <ul class="timeline timeline-inverse">
                  <?
                    if (  base64url_decode($_COOKIE[$CookieType])=="Admin"  ) {
                      $WHERE = "  ";
                    }else {
                      if (base64url_decode($_COOKIE[$CookieGroup])=="Prosecure") {
                        $WHERE = " AND  type_group = '1' ";
                      }else {
                        $WHERE = "  AND  type_group = '2' ";
                      }
                    }
                    $sql = "SELECT *
                            FROM z_structure_price
                            WHERE ( file_status = '1' $WHERE )
                            ORDER BY create_date DESC;";
                    if (select_numz($sql)>0) { $new="";$old=""; $i=1;
                      foreach (select_tbz($sql) as $row) {
                        $new = substr($row['create_date'],0,10);
                        if($old==''){
                          ?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['create_date']);?> </span> </li><?
                          $old = $new;
                          $i=1;
                        }else{
                          if($old==$new){

                          }else{
                            ?><li class="time-label"> <span class="bg-red"> <?=datetime_th($row['create_date']);?> </span> </li><?
                            $i=1;
                          }
                          $old = $new;
                        }
                        ?>
                        <li><i class="fa fa-newspaper-o bg-blue"></i>
                          <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> <?=substr($row['create_date'],11);?></span>
                            <h3 class="timeline-header"><?=$row['price_name'];?></h3>
                            <div class="timeline-body">
                              <?=$row['price_detail'];?>
                            </div>
                            <div class="timeline-footer">
                              <a href="<?=SITE_URL;?>jquery/file.php?file=<?=$row['link_file'];?>" target="_blank" class=" btn <?=$row['type_group']=="1"?"btn-success":"btn-info";?> btn-sm" id="<?=$row['file_id'];?>" >
                                  <i class="fa fa-download" aria-hidden="true"></i> ดาวโหลด
                                  <?
                                    if (base64url_decode($_COOKIE[$CookieType])=="Admin") {
                                      echo $row['type_group']=="1"?"(โปรซีเคียว)":"(ตัวแทน)";
                                    }
                                  ?>
                              </a>
                            </div>
                          </div>
                        </li>
                        <?
                      }
                    }else {
                      ?>
                      <li class="time-label"> <span class="bg-red"> <?=datetime_th(date("Y-m-d"));?> </span> </li>
                      <li><i class="fa fa-newspaper-o bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> <?=substr(date("Y-m-d H:i:s"),11);?></span>
                          <h3 class="timeline-header">ไม่มีข้อมูล</h3>
                          <div class="timeline-body">
                            ยังไม่มีข้อมูล โครงสร้างราคาสินค้าใหม่
                          </div>
                        </div>
                      </li>
                      <?
                    }
                  ?>
                </ul>

            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
