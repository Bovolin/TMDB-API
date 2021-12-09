<!-- Utilização da função GET (não concluída) -->
<?php

$url = "https://api.themoviedb.org/3/movie/popular?api_key=4725cf9d6e21755c2c22e33915da9d83";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$filmes = json_decode(curl_exec($ch));

$id = $_GET['$filmes->results->title']

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
                <p class="title"><?= $id ?> </p>
                <p class="subtitle"><a href="index.php">Populares</a></p>
                <p class="subtitle"><a href="top.php">TOP</a></p>
            </div>
        </div>
    </section>