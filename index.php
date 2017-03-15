<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
$q = isset($_GET['q']) ? $_GET['q'] : NULL; //1
$con = new PDO("mysql:host=localhost;dbname=lobrasil;charset=utf8", "root", "root");   
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM cidade WHERE nome LIKE :q LIMIT 10;";
$stmt = $con->prepare($sql);   
$q= "%".$q."%"; 
$stmt->bindParam(":q", $q);   
$e = $stmt->execute();
$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
$js = json_encode($rs);
header('Content-Type: application/json');
echo $js;
/*retorna todos os estados do Brasil*/
/*$sql = "SELECT * FROM estado;";
$e = $con->query($sql, PDO::FETCH_ASSOC);
$rs = $e->fetchAll();
$js = json_encode($rs);
echo $js;*/
?>