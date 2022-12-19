<?php
namespace routes;

use Psr\Http\Message\ResponseInterface;
//use-head:
use \extas\interfaces\api\specs\IRouteSpec;

class RouteOasExample extends \extas\components\routes\dispatchers\JsonDispatcher
{
    //use-class

    protected string $repoName = 'oas_examples';

    public function execute(): ResponseInterface
    {
        $data = $this->getRequestData();

        //execute-before
        try {
            $this->before($data);

            $class = $this->{$this->repoName}()->getItemClass();
            $item  = new $class($data);
            $item  = $this->{$this->repoName}()->create($item);
            
            $this->after($item);

            //execute-before-response
            $this->setResponseData($item->__toArray());
        } catch (\Exception $e) {
            $message = $e->getMessage();
            //execute-error
            $this->setResponseData($data, $message);
        }
        //execute-after

        return $this->response;
    }

    public function help(): ResponseInterface
    {
        //help-before
        $route = $this->getRoute();
        $specs = $this->routesSpecs()->one([
            IRouteSpec::FIELD__NAME => RouteSpec::constructName($route->getMethod(), $route->getName())
        ]);

        $this->setResponseData($specs->getSpecs());
        //help-after
        return $this->response;
    }

        
    // see /mnt/c/Users/aivanov/var/www/own/jeyroik/extas-api-specs/resources/where.php to change template
    protected function getWhere(): array
    {
        return $this->getRequestData();
    }

}
