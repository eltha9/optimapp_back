<?php


// souvenirs function
function user($agrs){
    $user_data = file_get_contents('./data/user.json');

    echo $user_data;
}

function user_events($agrs){
    $user_events= file_get_contents('./data/user_events.json');
    echo $user_events;
}

// function events($agrs){
// je me demande bien pourquoi j'ai fait ça ??     
// }


//map function
function places($args){ 
    $type_places = [
        "resto"=>"restaurant",
        "monuments"=>"museum",
        "insolite"=>"tourist_attraction",
        "famille"=>"amusement_park",
        "romantique"=>"cafe",
        "decouverte"=>"tourist_attarction",
    ];
    $data = curl_places($type_places[$args["type"]],$args["lnt"],$args["lng"]);
    
    $response = [];

    foreach($data->results as $item){
        $temp = [
            "location"=>[
                "latitude"=>$item->geometry->location->lat,
                "longitude"=>$item->geometry->location->lng,
            ],
            "id"=>$item->id,
            "name"=>$item->name,
            "photos"=> $item->photos,
            "place_id"=> $item->place_id,
            "rating"=>$item->rating,
            "rating_count"=>$item->user_ratings_total,
            "reference"=>$item->reference,
            "address"=>$item->vicinity
        ];

        array_push($response, $temp);
    }

    echo json_encode($response);

}

function add_place($agrs, $pdo){
    $id = $agrs['id'];
    $content = $agrs['json'];

    $data_sql = $pdo->query('select data from main_data where id='.$id)->fetch();

    

    $data = json_decode($data_sql->data);

    if(!is_array($data)){

        $plop = [$data];
        array_push($plop, json_decode($content));


        $push = $pdo->prepare('update main_data set data=:data where id=:id');

        $push->bindValue(':data',json_encode($plop));
        $push->bindValue(':id',$id);
        $push_result=$push->execute();

    }else{

        array_push($data, json_decode($content));




        $push = $pdo->prepare('update main_data set data=:data where id=:id');

        $push->bindValue(':data',json_encode($data));
        $push->bindValue(':id',$id);
        $push_result=$push->execute();
    }

    


    echo json_encode(["result"=>$push_result]);
}

function place_info($agrs){
    $data=curl_place_by_id($agrs["id"]);

    
    $response = [
        "location"=>[
            "latitude"=>$data->result->geometry->location->lat,
            "longitude"=>$data->result->geometry->location->lng,
        ],
        "id"=>$data->result->id,
        "name"=>$data->result->name,
        "photos"=> $data->result->photos,
        "place_id"=> $data->result->place_id,
        "rating"=>$data->result->rating,
        "rating_count"=>$data->result->user_ratings_total,
        "reference"=>$data->result->reference,
        "address"=>$data->result->vicinity
    ];

    echo json_encode($response);
}


//voyage function
function journey($agrs){ 
    curl_journey();
    
}

function user_places($agrs,$pdo){
    $id = $agrs['id'];
    $data = $pdo->query('select data from main_data where id='.$id)->fetch();

    echo $data->data;
}
