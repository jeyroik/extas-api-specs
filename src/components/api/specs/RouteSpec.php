<?php
namespace extas\components\api\specs;

use extas\components\Item;
use extas\components\THasName;
use extas\components\THasStringId;
use extas\interfaces\api\specs\IRouteSpec;

class RouteSpec extends Item implements IRouteSpec
{
    use THasStringId;
    use THasName;

    public static function constructName(string $mehod, string $path): string
    {
        return $mehod . ':' . $path;
    }

    public function getSpecs(): array
    {
        return $this->config[static::FIELD__SPECS] ?? [];
    }

    public function setSpecs(array $specs): IRouteSpec
    {
        $this->config[static::FIELD__SPECS] = $specs;

        return $this;
    }

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
