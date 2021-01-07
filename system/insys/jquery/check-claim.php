<?
require_once ("../config/function.php");

///// check Claim
if ($_POST["post"]=="sn_check_claim") {


    $sql = "SELECT pc.*
            FROM product_claim pc
            WHERE pc.serial_number = '".$_POST[_sn]."'
            ORDER BY pc.timestamp DESC
            LIMIT 1 ;";
    if (select_numz($sql)>0) {
        foreach (select_tbz($sql) as $row) {
          ?>
          <dd>สินค้ารุ่น : <label><?=$row[model];?></label></dd>
          <?=!empty($_COOKIE[$CookieID])?"<dd>รายละเอียด : ".$row['problem_description']."</dd>":"";?>
          <?
        }
      ?>
      <div class="wrapper_in">
        <ul class="StepProgress">
          <?
            foreach (select_tbz($sql) as $row) {
              if ($row[repair]=="0" && $row[processing]!="1") {
                ?>
                <li class="StepProgress-item current"><strong>ได้รับสินค้าแล้ว รอตรวจสอบ</strong> <?=datetime_th(substr($row[timestamp],0,10));?></li>
                <li class="StepProgress-item"><strong>ดำเนินการซ่อม หรือ เสนอราคา</strong></li>
                <li class="StepProgress-item"><strong>รอสินค้านำส่งคืน</strong></li>
                <li class="StepProgress-item"><strong>เสร็จสมบูรณ์</strong></li>
                <?
              }else if ($row[repair]=="0" && $row[processing]=="1") {
                ?>
                <li class="StepProgress-item is-done"><strong>ได้รับสินค้าแล้ว รอตรวจสอบ</strong> <?=datetime_th(substr($row[timestamp],0,10));?></li>
                <li class="StepProgress-item current"><strong>ดำเนินการซ่อม</strong> อยู่ในช่วง ทดสอบ, เสนอราคา หรือเปลี่ยนอุปกรณ์ใหม่</li>
                <li class="StepProgress-item"><strong>รอสินค้านำส่งคืน</strong></li>
                <li class="StepProgress-item"><strong>เสร็จสมบูรณ์</strong></li>
                <?
              }else if (( $row[repair]=="1" || $row[repair]=="2" || $row[repair]=="3" ) && substr($row[date_complete],0,4)=="0000") {
                ?>
                <li class="StepProgress-item is-done"><strong>ได้รับสินค้าแล้ว รอตรวจสอบ</strong> <?=datetime_th(substr($row[timestamp],0,10));?></li>
                <li class="StepProgress-item current"><strong>ดำเนินการซ่อม</strong></li>
                <li class="StepProgress-item"><strong>รอสินค้านำส่งคืน</strong></li>
                <li class="StepProgress-item"><strong>เสร็จสมบูรณ์</strong></li>
                <?
              }

              if ( $row[num_job]!="" &&
                   substr($row[date_complete],0,4)!="0000" &&
                   substr($row[dateprint],0,4)!="0000"  &&
                   substr($row[date_sand_product],0,4)!="0000" ) {
                ?>
                <li class="StepProgress-item is-done"><strong>ได้รับสินค้าแล้ว รอตรวจสอบ</strong> <?=datetime_th(substr($row[timestamp],0,10));?></li>
                <? if ($row[remark1]!="") { ?> <li class="StepProgress-item is-done"><strong>มีการเสนอราคา</strong> เนื่องจากหมดประกัน ,นอกเหนือการรับประกัน หรืออื่นๆ</li> <? } ?>
                <li class="StepProgress-item is-done"><strong>ดำเนินการซ่อม</strong></li>
                <li class="StepProgress-item is-done "><strong>รอสินค้านำส่งคืน</strong> <?=datetime_th(substr($row[date_complete],0,10));?></li>
                <li class="StepProgress-item is-done "><strong>เสร็จสมบูรณ์</strong> <?=datetime_th(substr($row[date_sand_product],0,10));?></li>
                <?
              }else if (substr($row[date_complete],0,4)!="0000") {
                ?>
                <li class="StepProgress-item is-done"><strong>ได้รับสินค้าแล้ว รอตรวจสอบ</strong> <?=datetime_th(substr($row[timestamp],0,10));?></li>
                <? if ($row[remark1]!="") { ?> <li class="StepProgress-item is-done"><strong>มีการเสนอราคา</strong> เนื่องจากหมดประกัน ,นอกเหนือการรับประกัน หรืออื่นๆ</li> <? } ?>
                <li class="StepProgress-item is-done"><strong>ดำเนินการซ่อม</strong></li>
                <li class="StepProgress-item current"><strong>รอสินค้านำส่งคืน</strong> <?=datetime_th(substr($row[date_complete],0,10));?></li>
                <li class="StepProgress-item"><strong>เสร็จสมบูรณ์</strong></li>
                <?
              }
            }
          ?>
        </ul>
      </div>
      <?
    }else {
      ?>
      <div class="wrapper">
        <ul class="StepProgress">
          <li class="StepProgress-item current"><strong>ไม่มีข้อมูล</strong>**<span style="font-weight:bold;">อยู่ในช่วงจัดส่งสินค้าหรือนำสินค้าเข้าระบบเคลมสินค้า</span> <br>
              <span style="color:#807e7e;">โปรดกรอกรหัสสินค้าให้ถูกต้อง หรือสอบถามฝ่ายบริการงามซ่อม </span></li>
        </ul>
      </div>
      <?
    }
}

?>
