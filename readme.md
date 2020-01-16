#Optimapp bach


#routes

Routes for "souvenirs" view

- ?q=user

- ?q=user-events


Routes for "map" view

- ?q=places
    &type= [`resto`,`monuments`,`insolite`,`famille`,`romantique`,`decouverte`]
    &lnt= `latitude` 4 decimal float
    &lgn= `longitude` 4 decimal float

- ?q=add-place
    &id= `user id`
    $json= `json who provide data about the place`

- ?q=place-info
    &id= `place_id`


Routes for "voyage" view

- ?q=journey
    &id= `user id`

- ?q=user-places
    &id= `user id`


##Configuration file
You need to create a file `conig.ini` into the root project directory, whithe this structure :

[api-key]
google-places = `google api places key`
navitia = `navitia api key`

[bdd]
host= `database host`
name= `database name`
port= `database port`
login= `database login`
psw= `database password`