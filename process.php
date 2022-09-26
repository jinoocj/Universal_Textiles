<?php 
$errors = [];
if (empty($_POST['tshirtno'])) {
    echo $data = 'Need Number';
}else{
    $a = [250,500,1000,2000,5000];
    $value =$_POST['tshirtno'];
    $i=$d=0;
    $result=$possible=array();
    $possible = possibleValues($a,$value);
    $results=array();
    foreach($possible as $b){
    $results[]= getAllResults($possible,$value,$b);
    }
    foreach($results as $res){
    $count = count($res);
    $sum = array_sum($res);
    $diff = $sum-$value;
    if($i==0){
        $i = $count;
        $d = $diff;
        $result = $res;
    }else if($d > $diff){
        $i = $count;
        $d = $diff;
        $result = $res;
    }else if($d == $diff && $count<$i){
        $i = $count;
        $d = $diff;
        $result = $res;
    }
    }
    rsort($result);
    $data ="<h1>Packs to send</h1>";
    $ress = array_count_values($result);
    foreach($ress as $x => $val){
        $data = $data.$x. " x ".$val."</br>";
    }
    echo $data;
}
function getAllResults($possible,$value,$b){
  $results=array();
    $s=$value;
    $r=array();
      $s = $s-$b;
      array_push($r,$b);
      if($s<=0){
        return $r;
      }else{
        $pos = possibleValues($possible,$s);
        foreach($pos as $b){
          $rs = getAllResults($pos,$s,$b);
          foreach($rs as $rr){
            $r[] =$rr;
          }
          return $r;
        }
      }
  
}

function possibleValues($a,$value){
  $p=array();
  sort($a);
  foreach($a as $b){
  	if($b==$value){
      	$p[] = $b;
        break;
    }else if($b<$value){
      	$p[]=$b;
    }else{
      	$p[]=$b;
        break;
    }
  } 
  rsort($p);
  return $p;
}
?>