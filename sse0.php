<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

require_once "Database.php";
$conn = (new Database())->createConnection();

$lastId = 0;
while (true) {
  $x = $lastId;
  $stmt = $conn->prepare("SELECT * FROM sendVal");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $a = $result["value"];
    $check1 = $result["check1"];
    $check2 = $result["check2"];
    $check3 = $result["check3"];
  } else {
    $a = 1;
    $check1 = true;
    $check2 = true;
    $check3 = true;
  }

  $y1 = pow(sin(deg2rad($x )* $a),2); 
  $y2 = pow(cos(deg2rad($x )* $a),2);
  $y3 = sin(deg2rad($x )* $a) * cos(deg2rad($x )* $a);
  
  echo "id: $lastId";
  echo PHP_EOL . "data: {" ;
  echo PHP_EOL . "data: \"x\": \"{$x}\"";

  if ($check1) {
    echo  ", ". PHP_EOL . "data: \"y1\": \"{$y1}\"";
  }
  if ($check2) {
    echo ", ". PHP_EOL . "data: \"y2\": \"{$y2}\"";
  }
  if ($check3) {
    echo ", ". PHP_EOL . "data: \"y3\": \"{$y3}\"";
  }
  echo PHP_EOL . "data: }" . PHP_EOL;
  echo PHP_EOL;


  $lastId++;
  ob_flush();
  flush();
  sleep(1);
}
