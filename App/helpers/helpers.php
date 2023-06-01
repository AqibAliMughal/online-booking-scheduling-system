<?php

function view(string $view){
    require_once VIEWS_PATH . "$view.view.php";
}

function partials(string $partial){
    require_once VIEWS_PATH . "partials/$partial.view.php";
}