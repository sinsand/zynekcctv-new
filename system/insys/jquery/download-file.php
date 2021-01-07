<?
require_once ("../config/function.php");
if ($_POST['post']=="download-software") {



  $sql_menu = "SELECT *
               FROM dl_menu dm
               INNER JOIN dl_status ds ON dm.ID_DL_menu = ds.ID_DL_menu
               WHERE ds.ID_brand  = '".$_POST[value]."' AND
                     ds.ID_DL_status IN (SELECT ID_status FROM dl_sub_detail )
               GROUP BY dm.DL_menu_name
               ORDER BY dm.DL_menu_name ASC";
  if (select_numz($sql_menu)>0) { $i=0;

    ?>
    <style>
      .nav_tab_link > .active > a{
          background: #63e48e !important;
          color:#00671f !important;
      }

      .nav_tab_link > .menu_link.active,
      .nav_tab_link > .menu_link{
        margin: 0px !important;
      }

      .nav_tab_link > .menu_link > a{
        height: 90px !important;
        margin: 0px !important;
        display: block !important;
        margin: 1px !important;
        font-size: 14px ;
      }

      .nav_tab_link > .menu_link > a > .in_tab{
        color: #00671f !important;
      }
      .nav_tab_link > .active > a > .in_tab{
        color: #63e48e !important;
      }


      .nav_tab_link > .menu_link > a{
        background: #63e48e !important;
        color:#00671f !important;
      }
      .nav_tab_link > .menu_link > a:hover{
          background: #1daa4c !important;
          color:#fff !important;
      }

      .nav_tab_link > .menu_link > a:hover > .in_tab,
      .nav_tab_link > .active > a:hover > .in_tab{
        color: #63e48e !important;
      }
      .nav_tab_link > .menu_link > a > .in_tab,
      .nav_tab_link > .active > a > .in_tab,
      .nav_tab_link > .menu_link > a:hover > .in_tab,
      .nav_tab_link > .active > a:hover > .in_tab{
        position: absolute;
        bottom: 0;
        right: 0;
        font-size: 40px;
      }
    </style>
    <div class="nav-tabs-custom">
      <ul class=" nav nav-tabs">
        <? $i=1;
        //$sql ="SELECT pb_id,pb_name FROM price_brand WHERE pb_status='1' ORDER BY pb_name ASC"; $i=1;
        foreach (select_tbz($sql_menu) as $row) {
          ?>
          <li class="<?=$i==1?"active":" "?>">
            <a data-toggle="tab" href="#tab_3<?=$row[ID_DL_menu];?>"><?=$row[DL_menu_name];?>
                (<?
                  $sql_detail = "SELECT t1.`ID_DL_menu`, t3.`pb_id` ,t3.`pb_name` , t2.`DL_menu_name`, t1.`dl_status`
                										, t4.`DL_sub_detail`, t4.`DL_sub_url`, t4.`DL_sub_tpye_file`, t4.`DL_sub_size`, t4.`DL_sub_date`, t4.`DL_sub_status`
              										FROM `dl_status` t1
              										INNER JOIN `dl_menu` t2 ON(t1.`ID_DL_menu`=t2.`ID_DL_menu`)
              										INNER JOIN `price_brand` t3 ON(t1.`ID_brand`=t3.`pb_id`)
              										INNER JOIN `dl_sub_detail` t4 ON(t1.`ID_DL_status`=t4.`ID_status`)
              										WHERE  t1.`dl_status`='Y' AND t4.`DL_sub_status`='Y'
                                         AND t1.ID_brand = '".$row[ID_brand]."'
                                         AND t1.ID_DL_menu = '".$row[ID_DL_menu]."'
                									ORDER BY t4.`DL_sub_date` DESC";
                  echo select_numz($sql_detail);
                  ?>)
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
            <div id="tab_3<?=$row[ID_DL_menu];?>" class="tab-pane fade <?=$i=='0'?"in active":""?>" style="padding:5px 0;">
              <div class="table-responsive">
              <?
              $sql_detail = "SELECT t1.`ID_DL_menu`, t3.`pb_id` ,t3.`pb_name` , t2.`DL_menu_name`, t1.`dl_status`
            										, t4.`DL_sub_detail`, t4.`DL_sub_url`, t4.`DL_sub_tpye_file`, t4.`DL_sub_size`, t4.`DL_sub_date`, t4.`DL_sub_status`
          										FROM `dl_status` t1
          										INNER JOIN `dl_menu` t2 ON(t1.`ID_DL_menu`=t2.`ID_DL_menu`)
          										INNER JOIN `price_brand` t3 ON(t1.`ID_brand`=t3.`pb_id`)
          										INNER JOIN `dl_sub_detail` t4 ON(t1.`ID_DL_status`=t4.`ID_status`)
          										WHERE  t1.`dl_status`='Y' AND t4.`DL_sub_status`='Y' AND  t1.ID_brand = '".$row[ID_brand]."'
            									ORDER BY t4.`DL_sub_date` DESC";
              //echo $sql_detail;
              if (select_numz($sql_detail)>0) {  $a=1;
                ?><table class="table table-hover table-striped table-bordered">
                    <tbody><?
                foreach (select_tbz($sql_detail)  as $rowin) {
                  if ($row[DL_menu_name]==$rowin[DL_menu_name]) {
                    $vale = sprintf("%02s", $a++);
                  ?>
                  <tr>
                    <td class="text-center" style="width:3%;"><?=($vale);?></td>
                    <td><a href="<?=$rowin[DL_sub_url];?>" target="_blank"><?=$rowin[DL_sub_detail];?></a>  <span class="label label-default" style="letter-spacing: 1px;"><?=$rowin[DL_sub_tpye_file];?></span><br><span style="font-size: 11px;padding: 0px;  margin: 0px;  color: #8a8989;"><?=$rowin[DL_sub_date];?> ( <?=$rowin[DL_sub_size];?> )</span></td>
                    <!--<td class="text-center" style="width:3%;"><a href="<?=$rowin[DL_sub_url];?>" target="_blank" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i></a></td>-->
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
  }else {
    ?>
    <div class="alert alert-warning">
      <strong>ขออภัย</strong>  ไม่พบข้อมูลที่ต้องการ
    </div>
    <?
  }


}
?>
