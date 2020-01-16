<?php
$bdd = parse_ini_file("./config.ini", true);

// echo '<pre>';
// var_dump($bdd);
// echo '</pre>';


try{
    $pdo = new PDO('mysql:dbname='.$bdd['bdd']['name'].';host='.$bdd['bdd']['host'].';port='.$bdd['bdd']['port'].';',$bdd['bdd']['login'],$bdd['bdd']['psw']);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_OBJ);
}
catch( PDOException $e){
    die('error in db connection');
}


