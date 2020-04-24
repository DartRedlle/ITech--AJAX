<?php
header("Content-Type: application/json");

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

$sql2="SELECT seanse.ID_Seanse,seanse.start,seanse.stop,seanse.in_traffic,seanse.out_traffic  
    FROM client JOIN seanse ON client.ID_Client = FID_Client
        WHERE client.name = :username";

    $sth=$conn->prepare($sql2);
    $sth->execute(array(':username' => $_GET['username']));
    $res=$sth->fetchAll(PDO::FETCH_OBJ);

    
    
    echo(json_encode($res));
   
?>