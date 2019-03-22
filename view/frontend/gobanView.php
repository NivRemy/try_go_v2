<?php

$title = 'Goban';

function setStone ($stoneLocation) {
    if (!isset($stoneLocation)) {
        return "";
    }
    elseif ($stoneLocation) {
        return "white";
    }
    else {
        return "black";
    }
}

ob_start();  // Début du content

echo "<table>";
    foreach ($game as $rowKey => $rowValue) {
        echo '<tr>';
        $size = count($game) - 1;
        foreach ($rowValue as $columnKey => $columnValue) {
            if ($columnKey == 0 && $rowKey == 0) {
                echo '<td class="container"><div class="top left"><div class="';  
            }
            elseif ($columnKey == $size && $rowKey == 0) {
                echo '<td class="container"><div class="top right"><div class="';
            }
            elseif ($rowKey == 0) {
                echo '<td class="container"><div class="top"><div class="';
            }
            elseif ($columnKey == 0 && $rowKey == $size) {
                echo '<td class="container"><div class="bottom left"><div class="';
            }
            elseif ($columnKey == $size && $rowKey == $size) {
                echo '<td class="container"><div class="bottom right"><div class="';
            }
            elseif ($rowKey == $size) {
                echo '<td class="container"><div class="bottom"><div class="';
            }
            elseif ($columnKey == 0) {
                echo '<td class="container"><div class="left"><div class="';
            }
            elseif ($columnKey == $size) {
                echo '<td class="container"><div class="right"><div class="';
            }
            else {
                echo '<td class="container"><div class="center"><div class="';
            }
            echo setStone($game[$rowKey][$columnKey]);
            echo '"></div></td>';
            
        }
        echo '</tr>';
    }
echo '</table>';

$content = ob_get_clean();

require('view/template.php');

?>