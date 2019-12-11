<?php

class FieldRenderer
{
    public static function render($fieldKey)
    {
        if ($fieldKey == 'green') {
            echo '<img src="Grüne.png" style="width: 50px; height: 50px;">';
        }
        if ($fieldKey == 'goat') {
            echo '<img src="goat.png" style="width: 50px; height: 50px;">';
        }
        if ($fieldKey == 'gray') {
            echo '<img src="gray.png" style="width: 50px; height: 50px;">';
        }
        if ($fieldKey == 'player') {
            echo '<img src="player.PNG" style="width: 50px; height: 50px;">';
        }
    }
}