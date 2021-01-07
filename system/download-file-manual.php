<div class="row" style="margin:0px;clear:both;">
  <div class="container" style="padding:0px;">
    <div class="col-lg-12 col-md-12" style="padding:20px 15px;">

      <h3 class="text-center" style="margin: 50px 0 20px 0;">โปรแกรมและคู่มือ</h3>

      <div class="row" style="margin:40px 0;">
          <div class="col-xs-12" style="padding:0px;">



            <!--- Show tab --->
            <div class="col-xs-12 col-sm-8 col-md-9" style="padding:5px;">
              <div class="panel-group">
                 <div class="panel panel-default" style="padding:15px 5px;">
                   <?
                     $sql = "SELECT p.pb_name,dl.ID_brand
                             FROM dl_status dl
                             INNER JOIN price_brand p ON dl.ID_brand = p.pb_id
                             WHERE ( dl.dl_status='Y' AND dl.ID_DL_status IN (SELECT ID_status FROM dl_sub_detail ))
                             GROUP BY p.pb_name,dl.ID_brand
                             ORDER BY p.pb_name ASC; ";
                     if (select_numz($sql)>0) { $iiq=0;
                       foreach (select_tbz($sql) as $valuein) {


                         $sql_menu = "SELECT *
                                      FROM dl_menu dm
                                      INNER JOIN dl_status ds ON dm.ID_DL_menu = ds.ID_DL_menu
                                      WHERE (ds.ID_brand  = '".$valuein[ID_brand]."' AND
                                            ds.ID_DL_status IN (SELECT ID_status FROM dl_sub_detail ) )
                                      GROUP BY dm.DL_menu_name
                                      ORDER BY dm.DL_menu_name ASC";
                         if (select_numz($sql_menu)>0) {

                           ?>
                           <div class="tab_show" id="show_<?=$valuein["ID_brand"];?>" style="<?=$valuein["ID_brand"]=='3'?"display:block;":"display:none;";?>">
                             <h3><?=$valuein['pb_name'];?></h3>
                             <ul class=" nav nav-tabs nav_tab_link" style=" border-bottom: none !important;">
                               <? $i=0; $colum_md=""; $colum_xs="";
                               if (select_numz($sql_menu)<='3') {
                                  $colum_md = "col-md-4 col-sm-4";
                               }else {
                                  $colum_md = "col-md-3 col-sm-6";
                               }

                               foreach (select_tbz($sql_menu) as $row) {
                                 ?>
                                 <li class="<? if(select_numz($sql_menu)==($i+1) && select_numz($sql_menu)>2){if (($i+1) % 2 != '0') {echo "col-xs-12";}else{echo "col-xs-6";}}else{echo "col-xs-6";} ?> <?=$colum_md;?> menu_link <?=$i==0?"active":" "?>">
                                   <a data-toggle="tab" href="#tab_3_<?=$row["ID_brand"];?>_<?=$row["ID_DL_menu"];?>" style=" "><?=$row["DL_menu_name"];?>

                                     <div class="in_tab">
                                       <div style="">
                                         <?
                                         $sql_detail = "SELECT t1.ID_DL_menu, t3.pb_id ,t3.pb_name , t2.DL_menu_name, t1.dl_status
                                                           , t4.DL_sub_detail, t4.DL_sub_url, t4.DL_sub_tpye_file, t4.DL_sub_size, t4.DL_sub_date, t4.DL_sub_status
                                                         FROM dl_status t1
                                                         INNER JOIN dl_menu t2 ON(t1.ID_DL_menu=t2.ID_DL_menu)
                                                         INNER JOIN price_brand t3 ON(t1.ID_brand=t3.pb_id)
                                                         INNER JOIN dl_sub_detail t4 ON(t1.ID_DL_status=t4.ID_status)
                                                         WHERE  t1.dl_status='Y' AND t4.DL_sub_status='Y'
                                                                AND t1.ID_brand = '".$row[ID_brand]."'
                                                                AND t1.ID_DL_menu = '".$row[ID_DL_menu]."'
                                                         ORDER BY t4.DL_sub_date DESC";
                                         echo select_numz($sql_detail);
                                         ?>
                                       </div>
                                     </div>
                                   </a>
                                 </li>
                                 <? $i++;
                               }
                               ?>
                             </ul>
                             <div class="tab-content">
                               <?

                               if (select_numz($sql_menu)>0) { $i=0;
                                 foreach (select_tbz($sql_menu)  as $row) {
                                   ?>
                                   <div id="tab_3_<?=$row["ID_brand"];?>_<?=$row["ID_DL_menu"];?>" class="tab-pane fade <?=$i=='0'?"in active":""?>" style="padding:5px 0;background:#1cab4d;">
                                     <div class="table-responsive" style="border:0px !important;">
                                     <?
                                     $sql_detail = "SELECT t1.ID_DL_menu, t3.pb_id ,t3.pb_name , t2.DL_menu_name, t1.dl_status
                                                       , t4.DL_sub_detail, t4.DL_sub_url, t4.DL_sub_tpye_file, t4.DL_sub_size, t4.DL_sub_date, t4.DL_sub_status
                                                     FROM dl_status t1
                                                     INNER JOIN dl_menu t2 ON(t1.ID_DL_menu=t2.ID_DL_menu)
                                                     INNER JOIN price_brand t3 ON(t1.ID_brand=t3.pb_id)
                                                     INNER JOIN dl_sub_detail t4 ON(t1.ID_DL_status=t4.ID_status)
                                                     WHERE  t1.dl_status='Y' AND t4.DL_sub_status='Y' AND  t1.ID_brand = '".$row[ID_brand]."'
                                                     ORDER BY t4.DL_sub_date DESC";
                                     //echo $sql_detail;
                                     if (select_numz($sql_detail)>0) {  $a=1;
                                       ?><table class="table table-hover table-striped" style="background:#fff;margin:10px 0 0 0;">
                                           <tbody><?
                                       foreach (select_tbz($sql_detail)  as $rowin) {
                                         if ($row["DL_menu_name"]==$rowin["DL_menu_name"]) {
                                           $vale = sprintf("%02s", $a++);
                                         ?>
                                         <tr>
                                           <td class="text-center" style="width:3%;line-height: 1.5;"><?=($vale);?></td>
                                           <td style="line-height: 1.5;">
                                             <a href="<?=$rowin["DL_sub_url"];?>" target="_blank"><?=$rowin["DL_sub_detail"];?>
                                               <span class="label label-default" style="letter-spacing: 1px;<?=color_type($rowin[DL_sub_tpye_file]);?>"><?=$rowin[DL_sub_tpye_file];?></span><br>
                                               <span style="padding: 0px;  margin: 0px;  color: #8a8989;"><?=$rowin[DL_sub_date];?> ( <?=$rowin[DL_sub_size];?> )</span>
                                             </a>
                                           </td>
                                         </tr>
                                         <?
                                         }
                                       }
                                         ?></tbody>
                                       </table><?
                                     }
                                     ?>
                                     </div>
                                   </div>
                                   <? $i++;
                                 }
                               }
                               ?>
                             </div>
                           </div>
                           <?
                         }

                       }
                     }

                   ?>
                 </div>
               </div>
            </div>
            <!--- Show tab --->

            <!--- tab -->
            <div class="col-xs-12 col-sm-4 col-md-3" style="padding:5px;">
              <div class="panel-group" id="accordion">
                 <div class="panel panel-default">
                   <div class="panel-heading">
                     <h3 class="panel-title" data-parent="#accordion"><b>เลือกตามยี่ห้อ</b></h3>
                   </div>
                   <div id="collapse1" class="panel-collapse collapse in">
                     <div class="panel-body">

                       <ul class="menu_left">
                         <?
                         $sql = "SELECT p.pb_name,dl.ID_brand
                                 FROM dl_status dl
                                 INNER JOIN price_brand p ON dl.ID_brand = p.pb_id
                                 WHERE ( dl.dl_status='Y' AND dl.ID_DL_status IN (SELECT ID_status FROM dl_sub_detail ))
                                 GROUP BY p.pb_name,dl.ID_brand
                                 ORDER BY p.pb_name ASC; ";
                           if (select_numz($sql)>0) { $iiq=0;
                             foreach (select_tbz($sql) as $valuein) {
                               ?>
                               <li><a class="click" style="cursor:pointer;" id="<?=$valuein["ID_brand"];?>"><?=$valuein['pb_name'];?></a></li>
                               <?
                             }
                           }
                          ?>
                       </ul>
                       <script>
                         $(document).ready(function() {
                           $(".click").click(function(event) {
                             $(".tab_show").attr('style', 'display:none;');
                             $("#show_"+$(this).attr("id")).attr('style', 'display:block;');

                           });
                         });
                       </script>
                       <style media="screen">
                        ul.menu_left{
                          list-style:none;
                          line-height:1.7;
                          padding:0px;
                        }
                        ul.menu_left li{
                        }
                        ul.menu_left li a{
                          display: block;
                          color: #000;
                          padding:10px 15px;
                          margin: 3px 0;
                          text-decoration: none;
                        }
                        ul.menu_left li a:hover{
                          background: #e1e1e1;
                          border-radius: 6px;
                        }
                       </style>

                     </div>
                   </div>
                 </div>
              </div>
            </div>
            <!--- tab -->


          </div>
      </div>


    </div>
  </div>
</div>

<?
function color_type($value){
  if ($value=="ppt" || $value=="ppsx" || $value=="pps" || $value=="pdf" || $value=="pptx" || $value=="doc" || $value=="docx") {
    return "background:#f00;";
  }elseif ($value=="rar" || $value=="zip") {
    return "background:#ffca01;color:#000;";
  }elseif ($value=="exe") {
    return "background:#000;";
  }else{
    return "background:#777;";
  }
}

?>

<style>
  .table tbody tr td a{color:#000;}
  /* tabe bar */
  .nav_tab_link{
    border-bottom: 2px solid #1cab4d !important;
  }
  .nav_tab_link > li{
    padding: 0px !important;
    border: 0px !important;
  }
  .nav_tab_link > li > a{
    margin: 0px !important;
    border-radius: 0px !important;
    text-align: center !important;
    color: #000 !important;
    background: #d4d2d2 !important;
    border: 3px solid #d4d2d2 !important;
  }
  .nav_tab_link > li.active > a{
    background: #1cab4d !important;
    color:#fff !important;
    border: 3px solid #1cab4d !important;
  }
  .nav_tab_link > li > a:hover{
    background: #3ac168 !important;
    color:#fff !important;
    border: 3px solid #3ac168 !important;
  }
  .nav_tab_link > li.active > a:hover{
    background: #1cab4d !important;
    color:#fff !important;
    border: 3px solid #1cab4d !important;
  }


  .nav_tab_link > .menu_link > a:hover > .in_tab,
  .nav_tab_link > .active > a:hover > .in_tab{
    color: #79ce96 !important;
  }
  .nav_tab_link > .menu_link > a > .in_tab,
  .nav_tab_link > .active > a > .in_tab,
  .nav_tab_link > .menu_link > a:hover > .in_tab,
  .nav_tab_link > .active > a:hover > .in_tab{
    position: absolute;
    bottom: 0;
    right: 7px !important;
    font-size: 14px !important;
  }
</style>
