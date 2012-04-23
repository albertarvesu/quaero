<?php
header('Content-type: application/json');
echo CJSON::encode($response);
Yii::app()->end();
?>
