<?php

header("Content-Type: text/xml");

include_once 'bd.php';

try
{ 
    $conn=new PDO($dsn,$user,$pass);
   
}
catch(PDOException $e)
{
    print "ERROR!!!!!".$e->getMessage()."<br/>";
    die();
}



$sql4="SELECT sum(in_traffic), sum(out_traffic) FROM seanse WHERE start >= :startTime AND stop <= :endTime";
//echo $_GET['startTime'];
//echo $_GET['endTime'];
$sth=$conn->prepare($sql4);
$sth->execute(array(':startTime' => $_GET['startTime'], ':endTime' => $_GET['endTime']));
$res=$sth->fetchAll();
//print_r($res);

echo '<?xml version="1.0" encoding="utf8" ?>';


?>
<stats>
    <inTraffic><?=$res[0][0]?></inTraffic>
    <outTraffic><?=$res[0][1]?></outTraffic>
</stats>