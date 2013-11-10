<?php

# Load Slim App
require '../app/vendor/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

# SlimApp instance
$app = new \Slim\Slim();

# Load Twig for Views
# Using Twig as a standalone, 
#   which means we'll have to pass the 
#   $twig variable to each route callback
require '../app/vendor/Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

# Twig instance
$loader = new Twig_Loader_Filesystem('../app/views');

# Need to add ../app/views/app in order to load base.twig
#   see: http://stackoverflow.com/questions/13018034/twig-include-template-from-other-directory
$loader->addPath('../app/views/app');

# Cache directory for Twig to store it's PHP templates
#   You will need to rm -rf ../app/views/cache 
#   after each modification to the views
$twig = new Twig_Environment($loader, array(
    'cache' => '../app/views/cache',
));

# load routes from ../app/routes/*
# TODO: autoload routes

# Your routes should include the $twig variable, example:
$app->get('/', function() use ($twig){
	# can use $twig here
	echo 'Hello, world!';
});


# run app
$app->run();

?>
