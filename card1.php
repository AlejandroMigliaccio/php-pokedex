<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="shortcut icon" href="pokeball-16799-128x128.ico">
    <title>PokeCardPHP</title>

</head>

<body class="body">
    <?php

    $url = "https://pokeapi.co/api/v2/pokemon";
    $json = file_get_contents($url);
    $datos = json_decode($json, true);
    $pokemones = $datos["results"];


    function infillSelect($a)
    {
        $html = "";
        foreach ($a as $nombre) {
            $html .= "<option value=" . $nombre['url'] . ">" . $nombre['name'] . "</option>";
        }
        return $html;
    }



    ?>

    <header class="header">
        <div class="header__search">
            <img src="pokeball-16799.png" alt="pokeball" class="header__search__pokeball" />
            <select name="Pokelist" class="header__search__list" id="Pokelist">
                <option value=-1>Selecciones un pokemon</option>
                <?php echo infillSelect($pokemones) ?>
            </select>
            <img src="pokemon-logo-png-1421.png" alt="titlepokemon" class="poke__title">
        </div>
    </header>
    <div class="nostalgiaRoom">
        <audio controls class="nostalgiaRoom_mp3">
            <source src="104-oak research lab.mp3" type="audio/mp3">
        </audio>
        <audio controls class="nostalgiaRoom_mp3">
            <source src="109-pewter city's theme.mp3" type="audio/mp3">
        </audio>
    </div>
    <article class="articule" id="Articule">
        <div class="pokedex-frame">
            <div class="articule__box">
                <div class="articule__head">
                    <h1 id="Id" class="articule__head__id"></h1>
                    <hr>
                    <h2 id="Name" class="articule__head__name"></h2>
                </div>
            </div>
            <div class="articule__poke">
                <div class="articule__poke__pik">
                    <img src="" alt="front" id="ImageFront" class="articule__poke__pik__img">
                    <img src="" alt="back" id="ImageBack" class="articule__poke__pik__img">
                </div>
            </div>
            <div id="Abilities" class="articule__description">
            </div>
        </div>
        <h3 class="haveFun">Have Fun</h3>
        <div class="gifbox" id="Pokegif">
        </div>

    </article>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="selector.js"></script>
</body>

</html>