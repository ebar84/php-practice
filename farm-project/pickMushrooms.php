<?php
function pickMushrooms(){
    global $location, $has_mushrooms;

    if ($location !== "woods"){
        echo "There arent any mushrooms to pick!\n";
    } else {
        echo "You've picked some mushrooms.\n";
        $has_mushrooms = TRUE;
    }
}