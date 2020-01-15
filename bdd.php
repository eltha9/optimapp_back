<?php
$bdd = parse_ini_file("./config.ini");

// echo '<pre>';
// var_dump($bdd);
// echo '</pre>';

$cors = $bdd['cors'];

try{
    $pdo = new PDO('mysql:dbname='.$bdd['name'].';host='.$bdd['host'].';port='.$bdd['port'].';',$bdd['login'],$bdd['psw']);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_OBJ);
}
catch( PDOException $e){
    die('error in db connection');
}


