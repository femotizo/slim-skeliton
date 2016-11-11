<?php
namespace App\Middleware;

class CsrfViewMW extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        $this->container->view->getEnvironment()->addGlobal('csrf', [
            'field' => '
            <input type="hidden" value="' . $this->container->csrf->getTokenName() . '" name="' . $this->container->csrf->getTokenNameKey() . '">
            <input type="hidden" value="' . $this->container->csrf->getTokenValue() . '" name="' . $this->container->csrf->getTokenValueKey() . '">
            ',
        ]);

        $response = $next($request, $response);
        return $response;
    }
}