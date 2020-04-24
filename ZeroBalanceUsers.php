<?php
include 'bd.php'; 

try
{ 
    $conn=new PDO($dsn,$user,$pass);
    
}
catch(PDOException $e)
{
    print "ERROR!!!!!".$e->getMessage()."<br/>";
    die();
}

$sql1="SELECT client.ID_Client,client.name,client.balance FROM client WHERE client.balance<=0";

$sth=$conn->prepare($sql1);
$sth->execute();
$res=$sth->fetchAll();
echo"<table border=2><tr><th>id</th><th>name</th><th>balance</th></tr>";
    foreach($res as $row)
    {
        print("<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>");
    }
echo"</table>";
$conn=null;
