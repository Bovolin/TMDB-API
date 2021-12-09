<!-- Utilização da função GET (concluído) -->
<?php

$id2 = $_GET['id'];

$url = "https://api.themoviedb.org/3/movie/" . $id2 ."?api_key=4725cf9d6e21755c2c22e33915da9d83&language=pt-BR";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$filmes = json_decode(curl_exec($ch));

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filmes</title>
    <script src="https://kit.fontawesome.com/036a924fd6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <section class="hero is-dark is-small">
        <div class="hero-body">
            <div class="container has-text-centered">
                <p class="title"><?php echo $filmes->title ?></p>
                <p class="subtitle"><a href="index.php">Populares</a></p>
                <p class="subtitle"><a href="top.php">TOP</a></p>
            </div>
        </div>
    </section>

    <div style="position: absolute; left: 36%">
        <br>
        <section class="container">
            <div class="columns features">
                <div class="column is-4">
                    <div class="card">
                        <div class="card-image has-text-centered">
                            <br>
                            <figure class="image is-500x500">
                                <img src="https://image.tmdb.org/t/p/w500/<?=$filmes->backdrop_path?>" class="" data-target="modal-image2">
                            </figure>
                        </div>
                    </div>
                    <div class="card-content has-text-centered">
                        <div class="content">
                            <h3>
                                <?php foreach($filmes->genres as $Genres){ 
                                    echo $Genres->name . ', ';
                                } 
                                ?>
                            </h3>
                            <p>
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <?php echo $filmes->vote_average?>
                                </span>
                            </p>
                            <p><?php echo 'Data de lançamento: ' . $filmes->release_date;?></p>
                           
                            <p>
                                <?php echo $filmes->overview?>
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
    </div>
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