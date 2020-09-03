<?php
function doublemax($mylist){
  $maxvalue=max($mylist);
  while(list($key,$value)=each($mylist)){
    if($value==$maxvalue)$maxindex=$key;
  }
  return array("m"=>$maxvalue,"i"=>$maxindex);
}
?>