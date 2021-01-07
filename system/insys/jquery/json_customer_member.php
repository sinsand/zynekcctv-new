<?
    require_once ("../config/function.php");
    //$query = (!empty($_GET[que])) ? strtolower($_GET[que]) : null;
    $query;
    if (!empty($_GET[keyword])) {
      $query = strtolower($_GET[keyword]);
    }else {
      $query = null;
    }
    $sql = "SELECT * FROM member WHERE (status_member = 'Y') ORDER BY company ASC";


    $dataPoints;
    foreach (select_tbz($sql) as $rowdata) {
      $dataPoints[] = array(
                      "member_id"     => $rowdata[member_id],
                      "company"       => $rowdata[company],
                      "username"      => $rowdata[username],
                      "acronym"       => check_empty_space($rowdata[acronym]),
                      "address"       => $rowdata[address],
                      "phone"         => check_empty_space($rowdata[phone]),
                      "telephone"     => check_empty_space($rowdata[telephone]),
                      "fax"           => check_empty_space($rowdata[fax]),
                      "email"         => check_empty_space($rowdata[email]),
                      "contact"       => check_empty_space($rowdata[contact]),
                      "time_member"   => $rowdata[time_member],
                      "group_member"  => check_member_group_t($rowdata[group_member])
                    );
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

$resultProjects;
foreach ($dataPoints as $key => $rowOne) {
    if (strpos(strtolower($rowOne[company]), $query) !== false) {
        $resultProjects[] = $rowOne;
    }
}
//print_r($resultProjects);

function check_member_group_t($value){
  $sql = "SELECT mem_group_name FROM member_group WHERE (mem_group = '$value') ;";
  if (select_numz($sql)>0) {
    foreach (select_tbz($sql) as $row) {
      return $row[0];
    }
  }
}

// Means no result were found
if (empty($resultProjects)) {
    $status = false;
}
//header('Content-Type: application/json');




echo json_encode(array(
        "status" => $status,
        "error"  => null,
        "data"   => array(
          "company"   => $resultProjects
        )
    ));
?>
