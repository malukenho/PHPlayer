<?php
use Joomla\Application\AbstractCliApplication;

require_once __DIR__ . '/vendor/autoload.php';


$app = new PHPlayer\player();
$app->execute();