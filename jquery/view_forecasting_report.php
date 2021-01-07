<?
include("../config/function.php");


///// Product Code
/*if ($_POST['post']=="ViewProductReport") {

  $sql = "SELECT m.company,fs.amount_last,ft.schedule_id,fdt.*
          FROM for_task ft
          INNER JOIN for_taskdetail fdt ON (ft.task_id = fdt.task_id)
          INNER JOIN member m ON (ft.member_id = m.member_id)
          INNER JOIN for_stock fs ON (fdt.stock_id = fs.stock_id)
          WHERE ( fdt.stock_id = '".$_POST['code']."' )
          GROUP BY m.company
          ORDER BY m.company ASC";

  if (select_numz($sql)>0) {



      $sum_lasted = 0;
      $sum_before = 0;
      $amount_lasted = 0;
      $amount_before = 0;
    foreach (select_tbz($sql) as $row) {
      ?>
        <tr>
          <td><?=$row['company'];?></td>
          <td class="text-center"><?=$row['amount_last'];?></td>
          <?
            $sqll = "SELECT *
                    FROM for_schedule
                    WHERE ( schedule_status = '1' AND str_date <= '".date("Y-m-d")."' )
                    ORDER BY str_date DESC
                    LIMIT 4";
            if (select_numz($sqll)>0) {
              $pre="";
              foreach (select_tbz($sqll) as $roww) {
                $amount_lasted = chc_lasted($row['taskdetail_id'],$row['product_id'],$roww['schedule_id']);
                $amount_before = chc_before($row['taskdetail_id'],$row['product_id'],$roww['schedule_id']);

                $sum_lasted = $sum_lasted + $amount_lasted;
                $sum_before = $sum_before + $amount_before;






                ?>
                  <td class="text-center"><?=$amount_lasted=="0"?"-":$amount_lasted;?></td>
                  <td class="text-center"><?=$amount_before=="0"?"-":$amount_before;?></td>
                <?
              }
            }
          ?>
        </tr>
      <?
    }
    ?>
      <tr>
        <th colspan="2" class="text-right">Total</th>
        <?
        $sqll = "SELECT *
                FROM for_schedule
                WHERE ( schedule_status = '1' AND str_date <= '".date("Y-m-d")."' )
                ORDER BY str_date DESC
                LIMIT 4";
        if (select_numz($sqll)>0) {
          $pre="";
          foreach (select_tbz($sqll) as $roww) {


            ?>
              <th class="text-center"><?=$sum_lasted;?></th>
              <th class="text-center"><?=$sum_before;?></th>
            <?
          }
        }
        ?>
      </tr>
    <?
  }else {
    ?>
      <tr>
        <td colspan="10" class="text-center">ไม่มีข้อมูล</td>
      </tr>
    <?
  }
}*/

if ($_POST['post']=="ViewProductReport") {

  $sql = "SELECT m.company,fs.amount_last,ft.schedule_id,SUM(fdt.amount_last) as amount_last ,fdt.*,ft.member_id
          FROM for_task ft
          INNER JOIN for_taskdetail fdt ON (ft.task_id = fdt.task_id)
          INNER JOIN member m ON (ft.member_id = m.member_id)
          INNER JOIN for_stock fs ON (fdt.stock_id = fs.stock_id)
          WHERE ( fdt.stock_id = '".$_POST['code']."' )
          GROUP BY m.company
          ORDER BY m.company ASC";

  if (select_numz($sql)>0) {
    $sum_before1 = 0;
    $sum_lasted1 = 0;
    $sum_before2 = 0;
    $sum_lasted2 = 0;
    $sum_before3 = 0;
    $sum_lasted3 = 0;
    $sum_before4 = 0;
    $sum_lasted4 = 0;

    $sqlsc = "SELECT schedule_id
              FROM for_schedule
              WHERE ( schedule_status = '1' AND str_date <= '".date("Y-m-d")."' )
              ORDER BY str_date DESC
              LIMIT 4";
    ?>

    <thead>
      <tr>
        <th colspan="<?=((select_numz($sqlsc)*2)+1);?>" class="text-left" style="background:#ffeb3b;">Product Forecasting Summary Detail :
          <?
          $sqlmodel = "SELECT fs.pro_id,pp.model,fs.amount_last
                       FROM for_stock fs
                       LEFT OUTER JOIN price_products pp ON (fs.pro_id = pp.pro_id)
                       WHERE ( fs.stock_id = '".$_POST['code']."' ) ";
          foreach (select_tbz($sqlmodel) as $value) {
            echo $value['model']==""?$value['pro_id']:$value['model'];
            echo " คงเหลือ ".$value['amount_last'];
          }
          ?>
        </th>
      </tr>
      <tr>
        <th>Prosecure</th>
        <?
          $sqla = "SELECT *
                  FROM for_schedule
                  WHERE ( schedule_status = '1' AND str_date <= '".date("Y-m-d")."' )
                  ORDER BY str_date DESC
                  LIMIT 4";
          //echo $sql;
          $TrCode = 1;
          if (select_numz($sqla)>0) { $qw=0; $label="";
            foreach (select_tbz($sqla) as $row) {
              if ($qw==0) {
                $label = "success";
              }elseif ($qw==1) {
                $label = "warning";
              }elseif ($qw==2) {
                $label = "danger";
              }elseif ($qw==3) {
                $label = "primary";
              } $qw++;
              $TrCode = $TrCode +2;
              ?>
                <th class="text-center"><span class="label label-<?=$label;?>"><?="(".date_($row['str_date']).")";?></span><br><span class="label label-<?=$label;?>"><?="(".date_($row['end_date']).")";?></span><br>Lasted</th>
                <th class="text-center"><span class="label label-<?=$label;?>"><?="(".date_($row['str_date']).")";?></span><br><span class="label label-<?=$label;?>"><?="(".date_($row['end_date']).")";?></span><br>Before</th>
              <?
            }
          }

        ?>
      </tr>
    </thead>
    <tbody>
      <?
      foreach (select_tbz($sql) as $row) {
        ?>
          <tr>
            <td><?=$row['company'];?></td>
            <?

            $sql = "SELECT schedule_id
                    FROM for_schedule
                    WHERE ( schedule_status = '1' AND str_date <= '".date("Y-m-d")."' )
                    ORDER BY str_date DESC
                    LIMIT 4";
            //echo $sql;
            if (select_numz($sql)>0) { $qa=0;
              foreach (select_tbz($sql) as $roww) {

                  if ($qa==0) {
                    $sum_before1 = $sum_before1 + chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"before");
                    $sum_lasted1 = $sum_lasted1 + chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"last");
                    $amount_before = chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"before");
                    $amount_lasted = chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"last");
                  }elseif ($qa==1) {
                    $sum_before2 = $sum_before2 + chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"before");
                    $sum_lasted2 = $sum_lasted2 + chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"last");
                    $amount_before = chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"before");
                    $amount_lasted = chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"last");
                  }elseif ($qa==2) {
                    $sum_before3 = $sum_before3 + chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"before");
                    $sum_lasted3 = $sum_lasted3 + chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"last");
                    $amount_before = chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"before");
                    $amount_lasted = chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"last");
                  }else {
                    $sum_before4 = $sum_before4 + chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"before");
                    $sum_lasted4 = $sum_lasted4 + chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"last");
                    $amount_before = chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"before");
                    $amount_lasted = chc_price($row['stock_id'],$row['member_id'],$roww['schedule_id'],"last");
                  }

                ?>
                <td class="text-center"><?=$amount_lasted=="0"?"-":$amount_lasted;?></td>
                <td class="text-center"><?=$amount_before=="0"?"-":$amount_before;?></td>
                <?
                $qa++;
              }
            }


            ?>
          </tr>
        <?
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="text-right">Total</th>
        <?
        $sqll = "SELECT *
                FROM for_schedule
                WHERE ( schedule_status = '1' AND str_date <= '".date("Y-m-d")."' )
                ORDER BY str_date DESC
                LIMIT 4";
        if (select_numz($sqll)>0) {
          $pre=0;
          foreach (select_tbz($sqll) as $roww) {
            if ($pre==0) {
              ?><th class="text-center"><?=number_format($sum_lasted1);?></th><th class="text-center"><?=number_format($sum_before1);?></th><?
            }elseif ($pre==1) {
              ?><th class="text-center"><?=number_format($sum_lasted2);?></th><th class="text-center"><?=number_format($sum_before2);?></th><?
            }elseif ($pre==2) {
              ?><th class="text-center"><?=number_format($sum_lasted3);?></th><th class="text-center"><?=number_format($sum_before3);?></th><?
            }else {
              ?><th class="text-center"><?=number_format($sum_lasted4);?></th><th class="text-center"><?=number_format($sum_before4);?></th><?
            }

            $pre++;
          }
        }
        ?>
      </tr>
    </tfoot>
    <?
  }else {
    ?>
      <tr>
        <td colspan="9" class="text-center">ไม่มีข้อมูล</td>
      </tr>
    <?
  }
}


/*///// Schedule Detail
if ($_POST['post']=="ViewScheduleReport") {


  $sql = "SELECT fdt.product_id,fs.pro_id,pp.model,fdt.taskdetail_id,ft.schedule_id,fs.amount,fdt.product_id
          FROM for_task ft
          INNER JOIN for_taskdetail fdt ON (ft.task_id = fdt.task_id)
          INNER JOIN for_schedule fsc ON (ft.schedule_id = fsc.schedule_id)
          INNER JOIN for_productview fpv ON (fdt.product_id = fpv.product_id)
          INNER JOIN for_stock fs ON (fpv.stock_id = fs.stock_id)
          LEFT OUTER JOIN price_products pp ON (fs.pro_id = pp.pro_id)
          WHERE ( ft.schedule_id = '".$_POST['schedule']."' )
          GROUP BY fdt.product_id
          ORDER BY pp.model ASC";

  if (select_numz($sql)>0) {



    $sum_lasted = 0;
    $sum_before = 0;
    $amount_lasted = 0;
    $amount_before = 0;

    $total_before_1 = 0;
    $total_lasted_1 = 0;

    $total_before_2 = 0;
    $total_lasted_2 = 0;

    $total_before_3 = 0;
    $total_lasted_3 = 0;

    $total_before_4 = 0;
    $total_lasted_4 = 0;


    foreach (select_tbz($sql) as $row) {
      ?>
        <tr>
          <td><?=empty($row['model'])?$row['pro_id']:$row['model'];?></td>
          <td class="text-center"><?=$row['amount'];?></td>
          <?
            $sqll = "SELECT *
                    FROM for_schedule
                    WHERE ( schedule_status = '1' AND str_date <= '".date("Y-m-d")."' )
                    ORDER BY str_date DESC
                    LIMIT 4";
            if (select_numz($sqll)>0) { $a=0;
              $pre="";
              $sum_before = 0;
              $sum_lasted = 0;
              foreach (select_tbz($sqll) as $roww) {
                //$amount_lasted = chc_price($row['taskdetail_id'],$row['product_id'],$roww['schedule_id'],"last");
                //$amount_before = chc_price($row['taskdetail_id'],$row['product_id'],$roww['schedule_id'],"before");

                if ($a==0) {
                  $sum_before = $total_before_1 + $sum_before + $amount_before;
                  $sum_lasted = $total_lasted_1 + $sum_lasted + $amount_lasted;
                }elseif ($a==1) {
                  $sum_before = $total_before_2 + $sum_before + $amount_before;
                  $sum_lasted = $total_lasted_2 + $sum_lasted + $amount_lasted;
                }elseif ($a==3) {
                  $sum_before = $total_before_3 + $sum_before + $amount_before;
                  $sum_lasted = $total_lasted_3 + $sum_lasted + $amount_lasted;
                }else{
                  $sum_before = $total_before_4 + $sum_before + $amount_before;
                  $sum_lasted = $total_lasted_4 + $sum_lasted + $amount_lasted;
                }
                $a++;

                ?>
                  <td class="text-center"><?=$amount_lasted=="0"?"-":$amount_lasted;?></td>
                  <td class="text-center"><?=$amount_before=="0"?"-":$amount_before;?></td>
                <?
              }
            }
          ?>
        </tr>
      <?
    }
    ?>
      <!-- Sum Total -->
      <tr>
        <th colspan="2" class="text-right">Total</th>
        <?
        $sqll = "SELECT *
                FROM for_schedule
                WHERE ( schedule_status = '1' AND str_date <= '".date("Y-m-d")."' )
                ORDER BY str_date DESC
                LIMIT 4";
        if (select_numz($sqll)>0) {
          $pre=""; $a=0; $sum_before=0;$sum_lasted=0;
          foreach (select_tbz($sqll) as $roww) {
            if ($a==0) {
              $sum_before = $total_before_1;
              $sum_lasted = $total_lasted_1;
            }elseif ($a==1) {
              $sum_before = $total_before_2;
              $sum_lasted = $total_lasted_2;
            }elseif ($a==3) {
              $sum_before = $total_before_3;
              $sum_lasted = $total_lasted_3;
            }else{
              $sum_before = $total_before_4;
              $sum_lasted = $total_lasted_4;
            }
            $a++;
            ?>
              <th class="text-center"><?=$sum_lasted;?></th>
              <th class="text-center"><?=$sum_before;?></th>
            <?
          }
        }
        ?>
      </tr>
      <!-- Sum Total -->
    <?
  }else {
    ?>
      <tr>
        <td colspan="10" class="text-center">ไม่มีข้อมูล</td>
      </tr>
    <?
  }


}*/

///// Schedule Detail
if ($_POST['post']=="ViewScheduleReport") {


  $sql = "SELECT fdt.stock_id,fs.pro_id,pp.model,fdt.taskdetail_id,ft.schedule_id,fs.amount_last,fsc.str_date,fsc.end_date
          FROM for_task ft
          INNER JOIN for_taskdetail fdt ON (ft.task_id = fdt.task_id)
          INNER JOIN for_schedule fsc ON (ft.schedule_id = fsc.schedule_id)
          INNER JOIN for_stock fs ON (fdt.stock_id = fs.stock_id)
          LEFT OUTER JOIN price_products pp ON (fs.pro_id = pp.pro_id)
          WHERE ( ft.schedule_id = '".$_POST['schedule']."' )
          GROUP BY fdt.stock_id
          ORDER BY pp.model ASC";

  if (select_numz($sql)>0) {
    $sum_before1 = 0;
    $sum_lasted1 = 0;
    $sum_before2 = 0;
    $sum_lasted2 = 0;
    $sum_before3 = 0;
    $sum_lasted3 = 0;
    $sum_before4 = 0;
    $sum_lasted4 = 0;

    $schedule_str = "";
    $schedule_end = "";


    $sqlsc = "SELECT *
            FROM for_schedule
            WHERE ( schedule_status = '1' AND schedule_id = '".$_POST['schedule']."' );";
    foreach (select_tbz($sqlsc) as $value) {
      $schedule_str = $value['str_date'];
      $schedule_end = $value['end_date'];
    }
    $sqll = " SELECT *
              FROM for_schedule
              WHERE ( schedule_status = '1' AND
                      ( str_date <= '".$schedule_str."' )
                    )
              ORDER BY str_date DESC
              LIMIT 4";

    ?>
      <thead>
        <tr>
          <th colspan="<?=((select_numz($sqll)*2)+3);?>" class="text-left" style="background:#ffeb3b;">Schedule Forecasting Summary Detail :
            <?
            $sqlmo = "SELECT *
                         FROM for_schedule fs
                         WHERE ( schedule_id = '".$_POST['schedule']."' ) ";
            foreach (select_tbz($sqlmo) as $value) {
              echo "รอบ ".$value['title_schedule']." (".date_($value['str_date'])." ".date_($value['end_date']).")";
            }
            ?>
          </th>
        </tr>
        <tr>
          <th>Photo</th>
          <th>Product</th>
          <th class="text-center">Stock</th>
          <?
            $sqlw = "SELECT *
                    FROM for_schedule
                    WHERE ( schedule_status = '1' AND
                            ( str_date <= '".$schedule_str."' )
                          )
                    ORDER BY str_date DESC
                    LIMIT 4";
             $TrSchedule=3;
            if (select_numz($sqlw)>0) { $qw=0; $label="";
              foreach (select_tbz($sqlw) as $row) {
                if ($qw==0) {
                  $label = "success";
                }elseif ($qw==1) {
                  $label = "warning";
                }elseif ($qw==2) {
                  $label = "danger";
                }elseif ($qw==3) {
                  $label = "primary";
                } $qw++;
                $TrSchedule = $TrSchedule+2;
                ?>
                  <th class="text-center"><span class="label label-<?=$label;?>"><?="(".date_($row['str_date']).")";?></span><br><span class="label label-<?=$label;?>"><?="(".date_($row['end_date']).")";?></span><br>Lasted</th>
                  <th class="text-center"><span class="label label-<?=$label;?>"><?="(".date_($row['str_date']).")";?></span><br><span class="label label-<?=$label;?>"><?="(".date_($row['end_date']).")";?></span><br>Before</th>
                <?
              }
            }

          ?>
        </tr>
      </thead>
      <tbody>
      <?

      foreach (select_tbz($sql) as $row) {
        ?>
          <tr>
            <td><?=!empty($row['model'])?"<img src='http://www.zynekcctv.com/product/pid_".$row['pro_id']."/thumb/thumb.png' alt='' style='width:60px;height:auto;'>":"-";?> </td>
            <td><?=empty($row['model'])?$row['pro_id']:$row['model'];?></td>
            <td class="text-center"><?=$row['amount_last'];?></td>
            <?
              if (select_numz($sqll)>0) { $a=0;
                $pre="";
                $sum_before = 0;
                $sum_lasted = 0;
                foreach (select_tbz($sqll) as $roww) {
                  if ($a==0) {

                    $sum_before1 = $sum_before1 + chp_price($row['stock_id'],$roww['schedule_id'],"before");
                    $sum_lasted1 = $sum_lasted1 + chp_price($row['stock_id'],$roww['schedule_id'],"last");
                    $amount_before = chp_price($row['stock_id'],$roww['schedule_id'],"before");
                    $amount_lasted = chp_price($row['stock_id'],$roww['schedule_id'],"last");
                  }elseif ($a==1) {
                    $sum_before2 = $sum_before2 + chp_price($row['stock_id'],$roww['schedule_id'],"before");
                    $sum_lasted2 = $sum_lasted2 + chp_price($row['stock_id'],$roww['schedule_id'],"last");
                    $amount_before = chp_price($row['stock_id'],$roww['schedule_id'],"before");
                    $amount_lasted = chp_price($row['stock_id'],$roww['schedule_id'],"last");
                  }elseif ($a==2) {
                    $sum_before3 = $sum_before3 + chp_price($row['stock_id'],$roww['schedule_id'],"before");
                    $sum_lasted3 = $sum_lasted3 + chp_price($row['stock_id'],$roww['schedule_id'],"last");
                    $amount_before = chp_price($row['stock_id'],$roww['schedule_id'],"before");
                    $amount_lasted = chp_price($row['stock_id'],$roww['schedule_id'],"last");
                  }else{
                    $sum_before4 = $sum_before4 + chp_price($row['stock_id'],$roww['schedule_id'],"before");
                    $sum_lasted4 = $sum_lasted4 + chp_price($row['stock_id'],$roww['schedule_id'],"last");
                    $amount_before = chp_price($row['stock_id'],$roww['schedule_id'],"before");
                    $amount_lasted = chp_price($row['stock_id'],$roww['schedule_id'],"last");
                  }
                  $a++;

                  ?>
                    <td class="text-center"><?=$amount_lasted==0?"-":number_format($amount_lasted);?></td>
                    <td class="text-center"><?=$amount_before==0?"-":number_format($amount_before);?></td>
                  <?
                }
              }
            ?>
          </tr>
        <?
      }
      ?>

      </tbody>
      <tfoot>
        <!-- Sum Total -->
        <tr style="display:none;">
          <th colspan="3" class="text-right">Total</th>
          <?
            $sqll = " SELECT *
                      FROM for_schedule
                      WHERE ( schedule_status = '1' AND
                              ( str_date <= '".$schedule_str."' )
                            )
                      ORDER BY str_date DESC
                      LIMIT 4";
            if (select_numz($sqll)>0) {
              $pre=0;
              foreach (select_tbz($sqll) as $roww) {
                if ($pre==0) {
                  ?><th class="text-center"><?=number_format($sum_lasted1);?></th><th class="text-center"><?=number_format($sum_before1);?></th><?
                }elseif ($pre==1) {
                  ?><th class="text-center"><?=number_format($sum_lasted2);?></th><th class="text-center"><?=number_format($sum_before2);?></th><?
                }elseif ($pre==2) {
                  ?><th class="text-center"><?=number_format($sum_lasted3);?></th><th class="text-center"><?=number_format($sum_before3);?></th><?
                }else {
                  ?><th class="text-center"><?=number_format($sum_lasted4);?></th><th class="text-center"><?=number_format($sum_before4);?></th><?
                }

                $pre++;
              }
            }
          ?>
        </tr>
        <!-- Sum Total -->
      </tfoot>
      <?
  }else {
    ?>
      <tr>
        <td colspan="11" class="text-center">ไม่มีข้อมูล</td>
      </tr>
    <?
  }


}

























//// Code Product Detail Lasted and before
function chc_price($stockid,$memberid,$scheduleid,$status){
  $sql = "SELECT ftd.amount_last,ftd.amount_first
          FROM for_taskdetail ftd
          INNER JOIN for_task ft ON ( ftd.task_id = ft.task_id )
          WHERE ( ftd.stock_id = '".$stockid."' AND ft.schedule_id = '$scheduleid' AND ft.member_id = '$memberid');";
  //return $sql;
  if (select_numz($sql)>0) {
    $sumamount = 0;
    foreach (select_tbz($sql) as $row) {
      if ($status=="last") {
        $sumamount = $row['amount_last'];
      }else {
        $sumamount = $row['amount_first'];
      }
    }
    return $sumamount;
  }else {
    return 0;
  }
}


function chp_price($stockid,$scheduleid,$status){

  $sql = "SELECT SUM(ftd.amount_last) as amount_last,SUM(ftd.amount_first) as amount_first
          FROM for_taskdetail ftd
          INNER JOIN for_task ft ON ( ftd.task_id = ft.task_id )
          WHERE ( ftd.stock_id = '".$stockid."' AND ft.schedule_id = '$scheduleid');";
  //return $sql;
  if (select_numz($sql)>0) {
    $sumamount = 0;
    foreach (select_tbz($sql) as $row) {
      if ($status=="last") {
        $sumamount = $row['amount_last'];
      }else {
        $sumamount = $row['amount_first'];
      }
    }
    return $sumamount;
  }else {
    return 0;
  }
}









?>
