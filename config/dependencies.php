<?php

// Get the container
$container = $app->getContainer();

// Twig view dependency
$container['view'] = function ($c) {
  $cf = $c->get('settings')['view'];

  $view = new \Slim\Views\Twig($cf['path'], $cf['twig']);

  $view->addExtension(new \Slim\Views\TwigExtension(
    $c->router,
    $c->request->getUri()
  ));

  return $view;
};

//Override the default Not Found Handler
$container['notFoundHandler'] = function ($c) {
  return function ($request, $response) use ($c) {
    return $c['response']
      ->withStatus(404)
      ->withHeader('Content-Type', 'text/html')
      ->write('Page not found');
  };
};

//Override the default php error Handler
$container['phpErrorHandler'] = function ($c) {
  return function ($request, $response, $e) use ($c) {
    return $c['response']->withStatus(500)
      ->withHeader('Content-Type', 'text/html')
      ->write($e->getMessage());
  };
};

//Override the default error Handler
$container['errorHandler'] = function ($c) {
  return function ($request, $response, $e) use ($c) {
    return $c['response']->withStatus(500)
      ->withHeader('Content-Type', 'text/html')
      ->write($e->getMessage());
  };
};

