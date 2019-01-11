<?php
require "../../vendor/autoload.php";
$loader = new Twig_Loader_Filesystem('../../Templates');
$twig = new Twig_Environment($loader, array(
    'debug' => true,
    'auto_reload' => true
));

?>