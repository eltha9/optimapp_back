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

function add_place($agrs){
    
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
    
}

function user_places($agrs){
    
}
