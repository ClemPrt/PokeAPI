<?php
$curl = curl_init();
$base = "https://pokeapi.co/api/v2/pokemon/";



curl_setopt_array($curl, array(
    CURLOPT_URL => $base,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "{}",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

//if ($err) {
//  echo "cURL Error #:" . $err;
//} else {
//  echo $response;
//}

    // Define city and use Paris as default
    $id = empty($_GET['id']) ? '1' : $_GET['id'];

    //$id = rand(1,800);
    $data = file_get_contents($base.$id.'/');
    $result = json_decode($data);
    //echo $result->name."<br>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <title>Pokemon list</title>
</head>
<body>
    <div class="menu">
        <div class="inner">
            <h1>Pokémon list</h1>
            <h3>
                
            </h3>
        </div>
    </div>
        <?php
        $img = $result->sprites->front_default;
        $imageData = base64_encode(file_get_contents($img));
        echo '<img src="data:image/png;base64,'.$imageData.'">'.'<br>';
        ?>
        <h1><?= $result->name ?></h1>
        <p>No.<?= $result->order ?></p>
        <div class="button">
        <?php
            if(($result->types[0]->type->name) == true){ ?>
                <p class="button_type"><?= $result->types[0]->type->name ?></p>
        <?php
            }
        ?>
        <?php
            if(($result->types[1]->type->name) == true){ ?>
                <p class="button_type"><?= $result->types[1]->type->name ?></p>
        <?php
            }
        ?>
        <p>Speed: <?= $result->stats[0]->base_stat ?></p>
        <p>Special defense: <?= $result->stats[1]->base_stat ?></p>
        <p>Special attack: <?= $result->stats[2]->base_stat ?></p>
        <p>Defense: <?= $result->stats[3]->base_stat ?></p>
        <p>Attack: <?= $result->stats[4]->base_stat ?></p>
        <p>HP: <?= $result->stats[5]->base_stat ?></p>
        </div>
        <form action="#" method="get">
            <input type="text" name="id" placeholder="Pokemon or ID">
            <input type="submit">
        </form>
        <?php
            if(($id) > 807){
                echo "ohhh no ! Pokemon not found";
            };
        ?>
    </div>
    <script src="scripts/app.js"></script>
</body>
</html>