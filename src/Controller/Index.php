<?php

namespace App\Controller;

use App\Controller\Base;

class Index extends Base
{
  public function __invoke($request, $response)
  {
    $data = [
      'pagetitle' => 'Index',
    ];

    return $this->view->render($response, 'index.twig', $data);
  }
}