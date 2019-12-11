<?php

require_once ('game/FieldRenderer.php');
require_once ('game/Player.php');
require_once ('game/Map.php');

$x = 5;
if(isset($_GET["x"])){
    $x = $_GET["x"];
}
$y = 5;
if(isset($_GET["y"])){
    $y = $_GET["y"];
}

$map = new Map(11);

if(isset($_GET['flock'])){
    $map->insertItems();
}

$player = new Player($x,$y);

?>

<html lang ="de">
<head>
    <title>Fress die Ziege</title>
</head>
<body>
<table>
    <?php for ($u = 0; $u < 11; $u++) { ?>

        <tr>
            <?php for ($i = 0; $i < 11; $i++) { ?>
                <td>

                    <?php
                    if ($player->isOnField($u,$i)) {
                        FieldRenderer::render('player');
                        $map->storeItem($u,$i);
                    } else {
                        if ($map->hasItem($u, $i)) {
                            if ($player->vision($u, $i) == 'green' ) {
                                echo '<a href="index.php?x=' . $u . '&y=' . $i . '">';
                                FieldRenderer::render('goat');
                                echo '</a>';
                            }
                            else{
                                FieldRenderer::render('goat');
                            }
                        } else {
                            if ($player->vision($u, $i) == 'green' ) {
                                echo '<a href="index.php?x=' . $u . '&y=' . $i . '">';
                                FieldRenderer::render('green');
                                echo '</a>';
                            }
                            if ($player->vision($u, $i) == 'gray') {
                                FieldRenderer::render('gray');
                            }

                        }
                    }
                    ?>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>



<form>
    <input type="submit" name="flock" value="flock = new level">
</form>
<h1>Gefressene Marshmallows</h1>
<?php foreach($map ->item_indicator() as $simon){
    echo FieldRenderer::render('goat');
}

?>
</body>
</html>