<?php
    $curl = curl_init();
    $url = "https://pokeapi.co/api/v2/pokemon/";


    include 'includes/cache.php';

    // Define id and use bulbasaur as default
    $id = empty($_GET['id']) ? '1' : $_GET['id'];

    //$id = rand(1,800);
    $data = file_get_contents($url.$id.'/');
    $result = json_decode($data);
    //echo $result->name."<br>";

    include 'includes/head.php';
?>



<body>
    <div class="menu">
        <div class="inner">
            <h1>Pokémon list</h1>
        </div>
    </div>
        <?php if($result){
        $img = $result->sprites->front_default;
        $imageData = base64_encode(file_get_contents($img));
        echo '<img src="data:image/png;base64,'.$imageData.'">'.'<br>';
        } else { ?>
            <p>Oh nooooo ! Pokemon not found ! Retry</p>
        <?php
        }
        ?>
 
        <h1>
            <?= $result->name; ?>
        </h1>
        <p>
            <?php if ($result) {
                    echo 'No.'.$result->order;
                }
            ?>
        </p>
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
        </div>
        <p>
            <?php if ($result) {
                    echo 'Height: '.$result->height/10;
                }
            ?>
        </p>
        <p>
            <?php if ($result) {
                    echo 'Speed: '.$result->stats[0]->base_stat.'<br>';
                    echo 'Special defense: '.$result->stats[1]->base_stat.'<br>';
                    echo 'Special attack: '.$result->stats[2]->base_stat.'<br>';
                    echo 'Defense: '.$result->stats[3]->base_stat.'<br>';
                    echo 'Attack: '.$result->stats[4]->base_stat.'<br>';
                    echo 'HP: '.$result->stats[5]->base_stat;
                }
            ?>
        </p>
        <form action="#" method="get">
            <input type="text" name="id" placeholder="Pokemon or ID">
            <input type="submit">
        </form>
    </div>
    <script src="scripts/app.js"></script>
</body>
</html>