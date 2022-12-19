<?php
namespace extas\components\api\specs;

use extas\components\Item;
use extas\interfaces\api\IRouteGenerator;
use extas\interfaces\api\specs\IRouteRequest;

class RouteRequest extends Item implements IRouteRequest
{
    public function getRequestSpecs(): array
    {
        $specs = $this->getSpecs();
        return $specs[IRouteGenerator::SPECS__REQUEST] ?? [];
    }

    public function getProperties(): array
    {
        return $this->getRequestSpecs()[IRouteGenerator::SPECS__PROPERTIES] ?? [];
    }

    public function getSpecs(): array
    {
        return '';
    }

    protected function getSubjectForExtension(): string
    {
        return '';
    }
}
