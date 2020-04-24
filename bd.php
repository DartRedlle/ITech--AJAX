<?php
$db_driver="mysql"; 
$host = "localhost"; 
$database = "asdf";
$dsn = "$db_driver:host=$host; dbname=$database";
$user= 'root';
$pass='';

try
{ 

    $conn=new PDO($dsn,$user,$pass);

}
catch(PDOException $e)
{
    print "ERROR!!!!!".$e->getMessage()."<br/>";
    die();
}
?>