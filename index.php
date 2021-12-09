<?php

## pegando url da API + chave pessoal
$url = "https://api.themoviedb.org/3/movie/popular?api_key=4725cf9d6e21755c2c22e33915da9d83";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
## utilização do JSON vindo da API
$filmes = json_decode(curl_exec($ch));

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filmes</title>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/036a924fd6.js" crossorigin="anonymous"></script>
    <!-- GoogleAPIs (OpenSans) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <!-- Bulma -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <!-- CSS style.css -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <section class="hero is-dark is-small">
        <div class="hero-body">
            <div class="container has-text-centered">
                <p class="title">Listagem de Filmes - Populares</p>
                <p class="subtitle"><a href="index.php">Populares</a></p>
                <p class="subtitle"><a href="top.php">TOP</a></p>
            </div>
        </div>
    </section>
    <section class="container">
        <!-- verificação se há objetos dentro do array -->
        <?php
        if(count($filmes->results)){
            $i = 0;
            foreach($filmes->results as $Results){
                $i++;
        ?>
        <?php if($i % 3 == 1) { ?>
        <br>
        <div class="columns features">
        <?php
            } ?>
            <div class="column is-4">
                <div class="card">
                    <div class="card-image has-text-centered">
                        <figure class="image is-500x500">
                            <img src="https://image.tmdb.org/t/p/w500/<?=$Results->backdrop_path?>" class="" data-target="modal-image2">
                        </figure>
                    </div>
                    <div class="card-content has-text-centered">
                        <div class="content">
                            <h4><?=$Results->title?></h4>
                            <p><?php echo $Results->release_date;?></p>
                            <p>
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <?php echo $Results->vote_average?>
                                </span>
                            </p>
                            <p>
                                <!-- fazer com que apareça e desapareça os resumos de cada filme (toggle - JS) -->
                                <button type="button" class="btn" id="<?php echo $i ?>" onclick="aparecer(event)">Resumo</button>                                
                            </p>
                            <p class="escondida" id="text-<?php echo $i ?>">
                                <?php echo $Results->overview?>
                            </p>
                            <div>
                                <!-- função GET (Não concluída) -->
                                <form action="acesso.php" method="GET">
                                    <input type="number" name="id" value="<?=$Results->id?>" style="display: none;">
                                    <button type="submit"> Acessar </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($i % 3 == 0){ ?>
        </div>
            <?php } } } ?>
        
        
    </section>

</body>

<script>
    // função toggle
    function aparecer(event){
        //  console.log(event.target.id);
        console.log(`text-${event.target.id}`);
        if(document.getElementById(`text-${event.target.id}`).className === 'aparecida'){
            document.getElementById(`text-${event.target.id}`).className = 'escondida';
            console.log("Escondeu");
        }

        else{
            document.getElementById(`text-${event.target.id}`).className = 'aparecida';
            console.log("Apareceu");
        }
        
    }
</script>

</html>