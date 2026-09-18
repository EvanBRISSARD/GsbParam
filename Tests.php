<?php
require_once 'modele/ModeleFront.php';

$categories = new ModeleFront();
var_dump($categories->getLesCategories());