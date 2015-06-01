<?php
if (!isset($_POST['data'])) return;

$data = $_POST['data'];

if (!isset($_POST['type'])) return;
if ($_POST['type'] !== "memory") return;

$type = $_POST['type'];
$result = array(
		'0' => -1,
		'30' => -1,
		'7' => -1
		);
$size = $data[0][1];

function getTimeU($date) {
  $datetime = DateTime::createFromFormat('D M d Y G:i:s e T', $date);
  return $datetime->format('U');
}

function getTimeDate($timestamp) {
  $datetime = DateTime::createFromFormat('U', $timestamp);
  return $datetime->format('M d Y');
}

function getPrevision($xa, $xb, $ya, $yb, $size) {
// y = ax + b
// x = (y - b) / a
  $a = (float)(($yb - $ya) / ($xb - $xa));
  $x = (int)(($size - $ya) / $a);
  return ($x > 0) ? getTimeDate($x + date('U')-0) : -1;
}

function seekSevenDays($data) {
  $seeked = date('U') - (7*60*60*24);

  foreach($data as $key=>$value) {
    if (getTimeU($data[$key][0]) >= $seeked) return ($key);
  }

  return -1;
}

function seekThirtyDays($data) {
  $seeked = date('U') - (7*60*60*24*30);

  foreach($data as $key=>$value) {
    if (getTimeU($data[$key][0]) >= $seeked) return ($key);
  }

  return -1;
}

//date limit since beginning
$ya = $data[0][2];
$xa = getTimeU($data[0][0]);
$tmp = end($data);
$yb = $tmp[2];
$xb = getTimeU($tmp[0]);

$result['0'] = getPrevision($xa, $xb, $ya, $yb, $size);

//date limit since 7 days
$index_seven = seekSevenDays($data);

if ($index_seven !== -1) {
  $xa = getTimeU($data[$index_seven][0]);
  $ya = $data[$index_seven][2];
  $result['7'] = getPrevision($xa, $xb, $ya, $yb, $size);
}

//date limit since 30 days
$index_seven = seekThirtyDays($data);

if ($index_seven !== -1) {
  $xa = getTimeU($data[$index_seven][0]);
  $ya = $data[$index_seven][2];
  $result['30'] = getPrevision($xa, $xb, $ya, $yb, $size);
}

echo $result['0'].';'.$result['7'].';'.$result['30'];
?>