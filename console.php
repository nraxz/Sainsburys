<?php
require_once 'vendor/autoload.php';
use Symfony\Component\Console\Application;
use App\Crawl\ExeCommand;

$application = new Application();
$application->add(new ExeCommand());
$application->run();