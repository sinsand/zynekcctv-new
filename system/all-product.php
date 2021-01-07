<?

$sql = "SELECT * FROM price_brand WHERE pb_status='1' ORDER BY pb_name ASC";
if(select_numz($sql)>0){
  ?>
  <div class="row" style="margin:0px;background:#444;">
    <div class="container" style="margin:0px  auto;">
      <div class="hidden-xs col-sm-12" style="padding:20px 0;">
        <h4 class="text-left" style="color:#fff;">แบรนด์สินค้า</h4>
      </div>
      <div class="hidden-xs col-sm-12" style="padding:0px;min-height:70px;position: relative;">
        <nav class="navbar navbar-inverse container" style="background: #444 !important; border: none !important;padding:0px;">
          <ul class="nav navbar-nav">
            <li><a href="http://www.zynekcctv.com/price_new/price_3m.php" class="link_a">3M</a></li>
            <?
            foreach(select_tbz($sql) as $rowout){
                  ?><li><a href="<?=SITE_URL;?>product/<?=$rowout["pb_id"];?>" class="link_a"><?=$rowout[pb_name];?></a></li><?
            }
            ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <?
}
if (select_numz($sql)>0) {
  ?>
  <div class="col-xs-12 hidden-sm hidden-md hidden-lg" id="accordion" style="margin:30px 0 0 0;">
    <div class="panel panel-default" style="border:1px solid #1daa4c;">
       <a class="panel-heading " data-toggle="collapse" data-parent="#accordion" href="#brand_show" style="text-decoration: none;display: block;background:#1daa4c; color:#fff;font-size: 20px;font-weight:normal;">
         <div class="heading_brand_text">ยี่ห้อสินค้า <i class="fas fa-angle-double-down heading_brand"></i></div>
       </a>
       <div class="panel-body panel-collapse collapse " id="brand_show" >


         <a target="_blank" href="http://www.zynekcctv.com/price_new/price_3m.php" class="brand-type col-sm-4 col-md-3 col-xs-6" style="margin:5px 0;">
          <span  class="span_text" >3M</span>
         </a>

        <?
          $sql = "SELECT * FROM price_brand WHERE pb_status='1' ORDER BY pb_name ASC";
          if(select_numz($sql)>0){
            foreach(select_tbz($sql) as $row){
                  ?><a href="<?=SITE_URL;?>product/<?=$row[pb_id];?>" class="brand-type col-sm-4 col-md-3 col-xs-6" style="margin:5px 0;">
                      <? $data_w ="";
                        if (empty($UrlId)) {
                          if ($row["pb_id"]=="3") {
                            $data_w = "background:#1daa4c;color:#fff;";
                          }
                        }
                      ?>
                      <span class="span_text" style="<?=$UrlId==$row["pb_id"]?"background:#1daa4c;color:#fff;":' ';?> <?=$data_w;?>"> <?=ucwords($row['pb_name'])?></span>
                   </a>
               <?
             }
           }
        ?>
      </div>
    </div>
  </div>
  <?
}
?>
<style>
  .affix {
      top: 0;
      /*width: 100%;*/
      z-index: 9999 !important;
      border-radius: 0px;
  }
  .das{
    padding:0px !important;
    z-index: 9999 !important;
    border-radius: 0px 0px 5px 5px;
    border: 0px;
  }
  .das ul li a.link_a{
    font-size:13px !important;
    text-transform: capitalize !important;
  }

  .affix + .container-fluid {
      /*padding-top: 0px;*/
  }
</style>
<div class="row" style="background:#fff;margin:0px 0;">
  <div class="container" style="padding:30px 0;">
    <div class="col-xs-12" style="padding:0px">



      <?
      if (!empty($UrlId) && empty($UrlIdSub) ||
           empty($UrlId)  && empty($UrlIdSub) ) {
             if ($UrlId=="") {
               $UrlId = 3;
             }
             ?>
          <!-- Product -->
          <div class="col-xs-12" id="accordion" style="margin:30px 0 0 0;display:none;">
            <div class="panel panel-default" style="border:1px solid #1daa4c;">
               <div class="panel-heading " style="background:#1daa4c; color:#fff;font-size: 22px;font-weight:normal;">
                 <a class="heading_brand_text" data-toggle="collapse" data-parent="#accordion" href="#brand_show" aria-expanded="true" >ยี่ห้อสินค้า <i class="fas fa-angle-double-down heading_brand"></i></a>
               </div>
               <div class="panel-body" id="brand_show" class="panel-collapse collapse in" aria-expanded="true" >


                 <a target="_blank" href="http://www.zynekcctv.com/price_new/price_3m.php" class="brand-type col-sm-4 col-md-3 col-xs-6" style="margin:5px 0;">
                  <span  class="span_text" >3M</span>
                 </a>

                <?
                  $sql = "SELECT * FROM price_brand WHERE pb_status='1' ORDER BY pb_name ASC";
                  if(select_numz($sql)>0){
                    foreach(select_tbz($sql) as $row){
                          ?><a href="<?=SITE_URL;?>product/<?=$row[pb_id];?>" class="brand-type col-sm-4 col-md-3 col-xs-6" style="margin:5px 0;">
                              <? $data_w ="";
                                if (empty($UrlId)) {
                                  if ($row["pb_id"]=="3") {
                                    $data_w = "background:#1daa4c;color:#fff;";
                                  }
                                }
                              ?>
                              <span class="span_text" style="<?=$UrlId==$row["pb_id"]?"background:#1daa4c;color:#fff;":' ';?> <?=$data_w;?>"> <?=ucwords($row['pb_name'])?></span>
                           </a>
                       <?
                     }
                   }else{
                     echo  "ไม่มีข้อมูล";//$sql;
                   }
                ?>
              </div>
            </div>
          </div>
          <div class="col-xs-12">
              <?
                if(empty($UrlIdSub)){ $UrlIdSub='3'; }  ////////// Check Data Empty == 3 innekt
                $sql_brand = "SELECT DISTINCT price_brand_sub.pbs_id,price_brand_sub.pbs_name,price_brand.pb_name
                    FROM price_products,price_brand_sub,price_brand
                    WHERE (price_products.pbs_id=price_brand_sub.pbs_id AND
                        price_brand.pb_id = '".$UrlId."' AND
                        price_products.pb_id = '".$UrlId."' AND
                        price_brand_sub.pbs_id != '4'  and
                        price_brand_sub.pbs_status = '1')
                      ORDER BY price_brand_sub.pbs_sort ASC";
              ?>

              <div style="z-index:99999; margin:0px;padding:0px;">
                <div class="container"  style="padding:0px;height:0px;opacity:0;" id="myScrollspy">
                  <div class="col-sm-12" style="padding:0px;" >

                    <nav class="navbar-nav nav-pills nav-stacked hidden-xs col-sm-12" style="padding:0px;margin:0px;" >
                      <ul class="nav navbar-nav" style="padding:0px;margin:0px;">
                        <?
                          if(select_numz($sql_brand)>0){
                            foreach(select_tbz($sql_brand) as $rr){
                              ?><li><a href="#<?=check_empty_space($rr['pb_name'])."-".check_empty_space($rr['pbs_name']);?>" class="scoll-m-bar"><?=$rr['pb_name']."-".$rr['pbs_name'];?></a></li><?
                            }
                          }
                        ?>
                      </ul>
                     </nav>

                  </div>
                </div>
              </div>


              <?
                if(select_numz($sql_brand)>0){ $rp=0;
                    foreach(select_tbz($sql_brand) as $valuein){
                        if ($rp==0) {
                          ?>
                            <div class="col-lg-12" style="margin:0px;padding:0px;">
                                <h2 class="col-xs-12 text-center" ><?=$valuein['pb_name'];?></h2>
                            </div>
                          <?
                        } $rp++;
                    }
                    ?>
                    <div class="col-xs-12" style="padding:15px;">
                        <div class="input-group">
                          <input type="search" class="form-control search input-lg" placeholder="กรอกข้อมูลสินค้าเพื่อค้นหา...">
                          <span class="input-group-btn">
                            <button class="btn btn-default btn-lg" type="button">ค้นหา!</button>
                          </span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                        ////// Search For Table
                          $(".search").keyup(function(){
                            _this = this;
                            // Show only matching TR, hide rest of them
                            $.each($(".table tr"), function() {
                                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                                   $(this).hide();
                                else
                                   $(this).show();
                            });
                          });

                          //// Scroll
                          function goToByScroll(id){
                                // Reove "link" from the ID
                              id = id.replace("link", "");
                                // Scroll
                              $('html,body').animate({
                                  scrollTop: $("#"+id).offset().top-100},
                                  'slow');
                          }
                        });
                    </script>
                    <?
                  foreach(select_tbz($sql_brand) as $row){
                    ?>
                      <table class="table" style="margin:0px;">
                        <tr>
                          <td>
                            <div id="<?=check_empty_space($row['pb_name'])."-".check_empty_space($row['pbs_name']);?>" class="col-xs-12 myNavbar" style="padding:0px;">
                              <div style="margin-top:80px;" class="hidden-xs "></div>
                              <h3><span style="display:inline-block;padding: 5px 10px;">สินค้าหมวด</span> <span class='label label-success' style="display:inline-block;"><?=$row['pb_name']." ".$row['pbs_name'];?></span></h3>
                            </div>
                          </td>
                        </tr>
                      </table>
                      <form action="export_zip.php" method="post" name="zips" target="new" id="form_zip<?=$row['pb_name']."-".$row['pbs_name'];?>">
                        <div class="col-xs-12" style="overflow:auto; padding:0px;">
                          <table cellpadding='0' style="min-width:800px;margin:0px;" cellspacing='0' class='table table-striped table-hover'>
                              <thead style="padding: 5px;/*background: #1197d5;*/ background:#1daa4c;color: #fff;">
                                  <tr>
                                    <th width="20%" class="text-center">รุ่นสินค้า</th>
                                    <th class="text-center">ภาพสินค้า</th>
                                    <th width="50%" class="text-center">รายละเอียด</th>
                                    <th width="10%" class="text-center">Spec</th>
                                    <!--<th width="10%" class="text-center">เลือก</th>-->
                                    <th width="10%" class="text-center">ราคา(บาท)</th>
                                  </tr>
                                </thead>
                              <tbody>
                                  <?
                                  $sql_sub="SELECT *
                                            FROM price_products,price_brand,price_brand_sub,price_product_apdu
                                            WHERE (price_products.pb_id = price_brand.pb_id AND
                                                   price_products.pbs_id = price_brand_sub.pbs_id AND
                                                   price_products.pro_id=price_product_apdu.pro_id AND
                                                   price_products.pb_id = '".$UrlId."' AND
                                                   price_products.pbs_id = '".$row['pbs_id']."' AND
                                                   price_products.price_stus = '1' AND
                                                   price_brand_sub.pbs_id != '4' AND
                                                   price_brand_sub.pbs_status = '1' )
                                            ORDER BY price_products.pd_sort ASC ";
                                  if(select_numz($sql_sub)>0){
                                    foreach(select_tbz($sql_sub) as $rowin){ ?>
                                      <tr>
                                          <td class="text-center" style="font-weight:bold;"><a href="<?=SITE_URL;?>product/<?=$UrlId;?>/<?=$rowin['pro_id']?>"><?=$rowin['model']?></a></td>
                                          <td>
                                            <img src="<?=SITE_URL;?>images/loading.gif" data-src='http://www.zynekcctv.com/product/pid_<?=$rowin['pro_id'];?>/thumb/thumb.png' class='col-xs-12 lazy' style='width:90px;height:auto;' />
                                          </td>
                                          <td><div style="min-width:80px; font-size:14px;white-space:normal;"><?=replace_char($rowin['description'])?></div></td>
                                          <td class="text-center"><?=file_download_products_test("http://www.zynekcctv.com/search/dl.php?id=".$rowin['pro_id'],"<button type='button' class='btn btn-primary btn-sm'><span class='fa fa-download fa-1x'></span> ดาวน์โหลด</button>");?></td>
                                          <!--<td class="text-center"> <?=file_export_zip("http://www.zynekcctv.com/search/dl.php?id=".$rowin['pro_id'],$a);?> </td>-->
                                          <td class="text-center" style="font-weight:bold;">
                                           <?
                                              // หน้าเว็บProsecure ไม่มีการกำหนดsession ระดับuserไว้ ($_SESSION['user_group']) ทำให้เข้า else โชว์ระดับuserอย่างเดียว
                                              if($_SESSION['user_group']=='admin') {
                                                if($rowin['admin']==1){ echo number_format($rowin['price_list']); }
                                                else if($row_st_brand['admin']==3){ echo "-Comming Soon-"; }
                                                else { echo "-กรุณาสอบถาม-"; }
                                              }
                                              else if($_SESSION['user_group']=='1') {
                                                if($rowin['prosecure']==1){ echo number_format($rowin['price_list']); }
                                                else if($rowin['prosecure']==3){ echo "-Comming Soon-"; }
                                                else { echo "-กรุณาสอบถาม-"; }
                                              }
                                              else if(!empty($_SESSION['user_group'])) {
                                                if($rowin['dealer']==1){ echo number_format($rowin['price_list']); }
                                                else if($rowin['dealer']==3){ echo "-Comming Soon-"; }
                                                else { echo "-กรุณาสอบถาม-"; }
                                              }
                                              else {
                                                if($rowin['user']==1){ echo number_format($rowin['price_list']); }
                                                else if($rowin['user']==3){ echo "-Comming Soon-"; }
                                                else { echo "-กรุณาสอบถาม-"; }
                                              }
                                            ?>
                                          </td>
                                      </tr><?
                                    }
                                  }
                                 ?>
                              </tbody>
                          </table>
                         </div>
                      </form>
                    <?
                   }
                }

              ?>
          </div>
          <script>
            $(document).ready(function(e) {


              var top = $('#myScrollspy').offset().top - parseFloat($('#myScrollspy').css('marginTop').replace(/auto/, 0));
              $(window).scroll(function (event) {
                var y = $(this).scrollTop();
                if (y >= top) {
                  $("#myScrollspy").attr('style','position:fixed;z-index:9999999;top:0;padding:0px;margin:0px auto;');
                }else{
                  $("#myScrollspy").attr('style','display:none;');
                }
              });



              $("a[href^='#']").click(function(e) {
              	e.preventDefault();

              	var position = $($(this).attr("href")).offset().top;
              	$("body, html").animate({
              		scrollTop: position
              	} );
              });

            });
          </script>
          <!-- Product End-->
        <?
      }else {
        if (!empty($UrlIdSub)) {
            $sql = "SELECT pp.pro_id,pp.model,pp.description,pp.price_list,pb.pb_name,pbs.pbs_id,pbs.pbs_name,pp.warranty,apu.user
                    FROM price_products pp
                    LEFT OUTER JOIN price_brand pb ON ( pb.pb_id = pp.pb_id )
                    LEFT OUTER JOIN price_brand_sub pbs ON ( pbs.pbs_id = pp.pbs_id )
                    LEFT OUTER JOIN price_product_apdu apu ON (pp.pro_id = apu.pro_id)
                    WHERE ( pp.pro_id = '".$UrlIdSub."' AND pbs.pbs_status = '1' )
                    GROUP BY pp.pro_id,pp.description,pp.price_list,pb.pb_name,pbs.pbs_name ";
            if (select_numz($sql)>=1) { $iii=0;
              foreach (select_tbz($sql)  as $row) {
                if ($row['pro_id']==$UrlIdSub) {
                  ?>
                  <div class="row" style="margin:0px;">
                    <div class="col-lg-12 page-header " style="margin:20px 0;padding:0px;">
                        <h1 class="repeat animated growIn findMe go text-left col-sm-12  hidden-xs" style="padding:20px 0 0 0;" data-sequence='500'>
                            <label  style="font-size:30px;display:block;font-weight:200;color:#101010;" class="col-sm-6 text-left">สินค้ารุ่น : <?=$row['model'];?></label>
                            <a href="#" style="font-size:18px;display:block;margin: 12px 0;color:#101010;" class="col-sm-6 text-right"></a>
                        </h1>
                        <h2 class="col-xs-12 hidden-sm hidden-md hidden-lg text-center" >สินค้ารุ่น : <?=$row['model'];?></h2>
                    </div>
                    <div class="col-xs-12 col-sm-6" style="">
                      <img  src="<?=SITE_URL;?>images/loading.gif" data-src='http://www.zynekcctv.com/product/pid_<?=$row['pro_id'];?>/thumb/thumb.png' class='col-xs-12 lazy' style='width:100%;height:auto;padding:0px;' />
                    </div>
                    <div class="col-xs-12 col-sm-6 border-left" style="margin-bottom:20px;">
                      <div class="col-xs-12" style="padding:0px;">
                        <h2>ยี่ห้อ : <?=$row['pb_name'];?></h2>
                        <h2>หมวดหมู่ : <?=$row['pbs_name'];?></h2>
                        <h3>สินค้ารุ่น : <?=$row['model'];?></h3>
                        <h3 style="margin-bottom:20px;">ราคาสินค้า :<b>
                          <?
                            if($row['user']==1){ echo number_format($row['price_list']); }
                            if($row['user']==2) { echo "-กรุณาสอบถาม-"; }
                            if($row['user']==3) { echo "-Comming Soon-"; }
                          ?></b>
                        </h3>
                      </div>
                      <div class="col-xs-12" style="margin: 0px; padding: 0px;">


                        <ul class="nav nav-tabs nav_tab_link" style="border-left: none !important;">
                          <li class="active col-xs-6 col-sm-6 col-md-4 text-center" style="padding:0px;"><a data-toggle="tab" href="#detail_view">รายละเอียด</a></li>
                          <li class=" col-xs-6 col-sm-6 col-md-4 text-center" style="padding:0px;"><a data-toggle="tab" href="#download_view">ดาวโหลด</a></li>
                        </ul>
                        <div class="tab-content" style="border-top: 3px solid #1cab4d; ">
                            <div id="detail_view" class="tab-pane fade in active" style="padding:10px;">
                              <?=replace_char($row['description'])?>
                            </div>
                            <div id="download_view" class="tab-pane fade in" style="padding:10px;">
                                <a href="http://www.zynekcctv.com/search/dl.php?id=<?=$row['pro_id'];?>" class='btn btn-primary btn-lg' target="_blank">
                                    <span class='glyphicon glyphicon-download-alt'></span> ดาวน์โหลด สเปค
                                </a>
                            </div>

                        </div>
                      </div>

                    </div>
                  </div>
                  <?

                  ?>

                  </div>
                </div>
              </div>


              <div class="row" style="background:#f9f9f9;margin:0px 0;">
                <div class="container" style="padding:30px 0;">
                  <div class="col-xs-12" style="padding:0px">



                      <div class="col-xs-12" style="padding:20px 15px;">
                          <h3><a href="<?=SITE_URL;?><?=$UrlPage;?>/<?=$UrlId;?>" style="color:#000;text-decoration:none;"> <i class="fas fa-long-arrow-alt-left"></i> ดูสินค้าทั้งหมด</a></h3>
                      </div>

                      <div class="row" style="margin:50px 0;">
                          <div class="col-lg-12 page-header " style="margin:20px 0;padding:0px;">
                              <h1 class="repeat animated growIn findMe go text-left col-sm-12  hidden-xs" style="padding:20px 0 0 0;" data-sequence='500'>
                                  <label  style="font-size:30px;display:block;font-weight:200;color:#101010;" class="col-sm-6 text-left">สินค้าที่เกี่ยวข้อง</label>
                                  <a href="#" style="font-size:18px;display:block;margin: 12px 0;color:#101010;" class="col-sm-6 text-right"></a>
                              </h1>
                              <h2 class="col-xs-12 hidden-sm hidden-md hidden-lg text-center" >สินค้าที่เกี่ยวข้อง</h2>
                          </div>
                          <?
                          $sql = "SELECT t1.pro_id, t1.pb_id, t2.pb_name, t1.pbs_id, t3.pbs_name, t1.model, t1.price_list, t1.description, t1.pb_show_price, t1.price_stus,apu.user
                								  FROM price_products t1
                								  INNER JOIN price_brand t2 ON ( t1.pb_id=t2.pb_id )
                								  INNER JOIN price_brand_sub t3 ON ( t1.pbs_id=t3.pbs_id )
                                  INNER JOIN price_product_apdu apu ON (t1.pro_id = apu.pro_id)
                								  WHERE ( t1.price_stus='1' AND t3.pbs_status ='1' AND t3.pbs_id ='".$row["pbs_id"]."'AND pb_status='1' )
                                  ORDER BY RAND()
                                  LIMIT 6;";

                          if(select_numz($sql)>0){
                          foreach(select_tbz($sql) as $row){ ?>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 " style="padding:3px">
                          <div class="col-xs-12 block-item2 no-padding">
                            <div class="row" style="background: #fff;margin:0px;">
                              <a href="<?=SITE_URL;?>product/<?=$row['pb_id'];?>/<?=$row['pro_id'];?>" style="display:block;">
                                <img  src="<?=SITE_URL;?>images/loading.gif" data-src='http://www.zynekcctv.com/product/pid_<?=$row['pro_id'];?>/thumb/thumb.png' class='col-xs-12 lazy' style='width:100%;height:auto;padding:0px;' />
                              </a>
                            </div>
                             <label class="block-label" for="ItemLegend">

                               <div class="block-name-bt col-xs-12" style="padding:5px;">
                                 <h4 class="text-center" style="margin:10px 0 0 0;"><a href="<?=SITE_URL;?>product/<?=$row['pb_id'];?>/<?=$row['pro_id']?>" class="link"><?=$row['model'];?></a></h4>
                                 <h5 class="text-center" style="margin:10px 0 0 0;"><a href="<?=SITE_URL;?>product/<?=$row['pb_id'];?>/" class="link"><?=$row['pb_name'];?></a></h5>
                                 <h4>
                                   <?
                                     if($row['user']==1){ echo number_format($row['price_list']); }
                                     if($row['user']==2) { echo "-กรุณาสอบถาม-"; }
                                     if($row['user']==3) { echo "-Comming Soon-"; }
                                   ?>
                                 </h4>
                                 <a href="<?=SITE_URL;?>product/<?=$row['pb_id'];?>/<?=$row['pro_id']?>" class="col-xs-12 btn btn-default"  style="background: #16994e;border-radius: 5px;padding: 5px;color: #fff;margin-top: 2px;"><i class="fa fa-search" aria-hidden="true"></i> ดูรายละเอียดสินค้า</a>

                               </div>
                             </label>
                            </div>
                        </div><?
                        }
                      } ?>
                      </div>



                </div>
              </div>
            </div>

            <div class="row" style="margin:0px 0;">
              <div class="container" style="padding:0px 0;">
                <div class="col-xs-12" style="padding:0px">


              <?
                }
              }
            }else {
            }
        }
      }
      ?>


    </div>
  </div>
</div>
