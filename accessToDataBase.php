<?php
$servername='localhost';
$username="root";
$password="Hosni@12345.";
 
try
{
    $bdd=new PDO("mysql:host=$servername;dbname=cinema",$username,$password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
}
     
?>


