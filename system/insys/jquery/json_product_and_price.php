<?php
require_once ("../config/function.php");
//$query = (!empty($_GET[que])) ? strtolower($_GET[que]) : null;
$query;
if (!empty($_GET[que])) {
  $query = strtolower($_GET[que]);
}else {
  $query = null;
}
/*if (!isset($query)) {
    die('Invalid query.');
}*/
$sql = "SELECT * FROM price_products,price_brand,price_brand_sub,price_product_apdu
        WHERE price_products.pb_id=price_brand.pb_id
        AND price_products.pbs_id=price_brand_sub.pbs_id
        AND price_products.pro_id=price_product_apdu.pro_id
        AND price_products.price_stus = '1'
        AND price_brand_sub.pbs_id != '4'
        ORDER BY price_products.pd_sort ASC ";

$dataPoints;
$dataInto;
$sellbypic;
//$brands = array();

$price_pro;
$price_par;
$qty;
$stc_pro;
$stc_par;


$i=0;
foreach (select_tbz($sql) as $rowdata) {
    //$resp = GetTwitter($value);
    if($rowdata['sellby']=='1') {
      $sellbypic = "<img src='http://www.zynekcctv.com/logooffice/zynek.png' >";
    }else if($rowdata[sellby]=='2'){
      $sellbypic = "<img src='http://www.zynekcctv.com/logooffice/prosecure.png'>";
    }else{
      $sellbypic = "กรุณาสอบถาม";
    }


    if (base64url_decode($_COOKIE[$CookieType])=="Admin") {
      $price_pro = 0;
      $price_par = 0;
      $qty = 0;
      $stc_pro = 0;
      $stc_par = 0;
    }elseif (base64url_decode($_COOKIE[$CookieType])=="Customer") {
      $price_pro = number_format(CAL_PRICE($rowdata[price_list],price_structure(1,$rowdata[pb_id],$rowdata[pbs_id])));
      $price_par = number_format(CAL_PRICE($rowdata[price_list],price_structure(2,$rowdata[pb_id],$rowdata[pbs_id])));
      $qty       = $rowdata[qty];
      $stc_pro   = number_format(price_structure(1,$rowdata[pb_id],$rowdata[pbs_id]), 2, '.', '');
      $stc_par   = number_format(price_structure(2,$rowdata[pb_id],$rowdata[pbs_id]), 2, '.', '');
    }

    $dataPoints[] = array(
                    "productid" => $rowdata[pro_id],
                    "model"     => $rowdata[model],
                    "brand"     => $rowdata[pb_name],
                    "pbs_name"  => $rowdata[pbs_name],
                    "price"     => number_format($rowdata[price_list]),
                    "image"     => "http://www.zynekcctv.com/product/pid_".$rowdata[pro_id]."/thumb/thumb.png",
                    "price_pro" => check_empty_space($price_pro),
                    "price_par" => check_empty_space($price_par),
                    "qty"       => check_empty_space($qty),
                    "warranty"  => check_empty_space($rowdata[warranty]),
                    "sell_by"   => $sellbypic,
                    "stc_pro"   => check_empty_space($stc_pro),
                    "stc_par"   => check_empty_space($stc_par)
                  );
    //$dataInto[] = array($dataPoints);
    $i++;
}
$status = true;
$databaseProjects = array(
    array(
        "id"        => 1368,
        "project"   => "ZDMR2023",
        "image"     => "http://www.zynekcctv.com/product/pid_1368/thumb/thumb.png",
        "version"   => "1.7.0",
        "demo"      => 10,
        "option"    => 23,
        "callback"  => 6,
    ),
    array(
        "id"        => 311,
        "project"   => "ZPI132",
        "image"     => "http://www.zynekcctv.com/product/pid_311/thumb/thumb.png",
        "version"   => "1.4.0",
        "demo"      => 11,
        "option"    => 14,
        "callback"  => 8,
    )
);
//$dataPro = array($dataInto);
//print_r($dataPro);
//print_r($databaseProjects);
$resultProjects;
foreach ($dataPoints as $key => $rowOne) {
    if (strpos(strtolower($rowOne[model]), $query) !== false) {
        $resultProjects[] = $rowOne;
    }
}
//print_r($resultProjects);

// Means no result were found
if (empty($resultProjects)) {
    $status = false;
}
//header('Content-Type: application/json');
echo json_encode(array(
        "status" => $status,
        "error"  => null,
        "data"   => array(
          "model"   => $resultProjects
        )
    ));

?>
