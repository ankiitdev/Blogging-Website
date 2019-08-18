<?php
date_default_timezone_set("Asia/Kolkata");
$CurTime=time();
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurTime);
echo $DateTime;
?>