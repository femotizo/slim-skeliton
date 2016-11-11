<?php
namespace App\Middleware;

class AuthMW extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        if (!$this->container->auth->check()){
            $this->container->flash->addMessage('error', "Please sign in first");
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }

        $response = $next($request, $response);
        return $response;
    }
}