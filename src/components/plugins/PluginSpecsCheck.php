<?php
namespace extas\components\plugins;

use extas\components\api\specs\RouteSpec;
use extas\interfaces\api\specs\IRouteSpec;
use extas\interfaces\api\specs\ISpec;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\routes\IRouteDispatcher;

/**
 * @implements IStageApiBeforeCreate
 * @implements IStageApiBeforeUpdate
 * 
 * @method IRepository routesSpecs()
 */
class PluginSpecsCheck extends Plugin
{
    public function __invoke(array &$data, IRouteDispatcher $dispatcher): void
    {
        $route = $dispatcher->getRoute();
        /**
         * @var IRouteSpec $specs
         */
        $specs = $this->routesSpecs()->one([
            IRouteSpec::FIELD__NAME => RouteSpec::constructName($route->getMethod(), $route->getName())
        ]);

        $requestSpecs = $specs->getSpecs();
        $errors = [];

        foreach ($requestSpecs as $paramSpec) {
            if (!$paramSpec->isValid($data[$paramSpec->getName()])) {
                $errors = array_merge($errors, $paramSpec->getErrors());
            }
        }

        if (!empty($errors)) {
            throw new \Exception('Invalid data: ' . implode('; ', $errors));
        }
    }
}
