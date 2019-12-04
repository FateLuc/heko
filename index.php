<?php


function vision($u, $x, $i, $y)
{
    $range = 1;
    if ($u == $x + $range && $i == $y + $range) {
        return 'green';
    }
    if ($u == $x - $range && $i == $y + $range) {
        return 'green';
    }
    if ($u == $x - $range && $i == $y - $range) {
        return 'green';
    }
    if ($u == $x + $range && $i == $y - $range) {
        return 'green';
    }
    if ($u == $x - $range && $i == $y) {
        return 'green';
    }
    if ($u == $x + $range && $i == $y) {
        return 'green';
    }
    if ($u == $x && $i == $y - $range) {
        return 'green';
    }
    if ($u == $x && $i == $y + $range) {
        return 'green';
    }
    return 'gray';
}


$x = $_GET["x"];
$y = $_GET["y"];
?>


<html>
<body>
<table>
    <?php for ($u = 0; $u < 11; $u++) { ?>

        <tr>
            <?php for ($i = 0; $i < 11; $i++) { ?>
                <td>

                <?php
                    if ($u == $x && $i == $y){
                        echo '<img src="player.PNG" style="width: 50px; height: 50px;">';
                    }else{
                        if(vision($u,$x,$i,$y) == 'green'){
                            echo '<a href="index.php?x='.$i.'&y='.$u.'">';
                            echo '<img src="Grüne.png" style="width: 50px; height: 50px;">';
                            echo '</a>';
                        }
                        if(vision($u,$x,$i,$y) == 'gray'){
                            echo '<img src="gray.png" style="width: 50px; height: 50px;">';
                        }
                    }
                ?>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>
<script>
    function border() {

    }
</script>
</body>
</html>