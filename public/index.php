<?php
/*
 *@Summary:
 * This is the index.php file where the routings are done.
 *
 *@Created at:18/05/1998   
 *@Created by:Paras Tripathi   
 *   
 *   
*/

//These are responsible for Request and Response object for the api.
//PSR 7 is the http standard for php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

//created by composer to create dependencies
require '../vendor/autoload.php';
require '../src/config/db.php';
//Creating our app
$app = new \Slim\App;

//creating routes
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

//Creating Custom Routes
require '../src/routes/customers.php';

$app->run();

