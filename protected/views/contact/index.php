<?php 
header('Content-type: application/json');
echo CJSON::encode($contacts);
Yii::app()->end();
?>
