<?php
require_once("config.inc");

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
?>