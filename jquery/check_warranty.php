<?
require_once ("../config/function.php");


if ($_POST['post']=="CheckWarranty") {
  $sql = "SELECT *
          FROM z_warranty
          WHERE serial_number LIKE '%".$_POST['value']."%'
          ORDER BY end_date ASC
          LIMIT 20 ";
  if (select_numz($sql)>0) { $i=1;
    ?>
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
        <tr>
          <th class="text-center">ลำดับ</th>
          <th>บริษัทที่จำหน่าย</th>
          <th>รุ่นสินค้า</th>
          <th>หมายเลขสินค้า</th>
          <th class="text-center" style="min-width: 120px;">วันที่เริ่มประกัน</th>
          <th class="text-center" style="min-width: 120px;">วันที่สิ้นสุดประกัน</th>
        </tr>
        </thead>
        <tbody>
          <?
          foreach (select_tbz($sql) as $row) {
            ?>
              <tr>
                <td class="text-center"><?=($i++);?></td>
                <td><?=$row['company_name']."(".$row['company_id'].")";?></td>
                <td><?=$row['model'];?></td>
                <td><?=$row['serial_number'];?></td>
                <td class="text-center"><?=date_($row['str_date']);?></td>
                <td class="text-center"><?=date_($row['end_date']);?></td>
              </tr>
            <?
          }
          ?>
        </tbody>
      </table>
    </div>
    <?
  }else {
    ?>
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
          <tr>
            <th>ลำดับ</th>
            <th>บริษัทที่จำหน่าย</th>
            <th>รุ่นสินค้า</th>
            <th>หมายเลขสินค้า</th>
            <th class="text-center">วันที่เริ่มประกัน</th>
            <th class="text-center">วันที่สิ้นสุดประกัน</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="6" class="text-center">ไม่พบการรับประกันสินค้า</td>
          </tr>
        </tbody>
      </table>
    </div>
    <?
  }
}



?>
