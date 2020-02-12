<?php
require_once('bdd.php');
require_once('api_functions.php');
require_once('functions.php');
header('Content-Type: application/json');

$q= $_GET['q'];

$args = $_GET;


switch($q){
    case 'user':
        user($args);
    break;
    case 'user-events':
        user_events($args);
    break;
    // case 'events':
    //     events($args);
    // break;

    case 'places':
        places($args);
    break;
    case 'add-place':
        add_place($args,$pdo);
    break;
    case 'place-info':
        place_info($args);
    break;

    case 'journey':
        journey($args, $pdo);
    break;
    case 'user-places':
        user_places($args, $pdo);
    break;
    default:
    
        error('mauvaise route');
        die;
}

die;