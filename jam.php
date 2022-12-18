<?php
$tglmain="2017-02-13 20:22:00";
$lama="2 hours";
$date = date_create($tglmain);
date_add($date, date_interval_create_from_date_string($lama));
$h1=date_format($date, 'Y-m-d H:i:s');
echo"$h1<br />";

?>