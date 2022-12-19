<?php
namespace extas\interfaces\api\specs;

use extas\interfaces\IHasName;
use extas\interfaces\IHaveUUID;
use extas\interfaces\IItem;

interface IRouteSpec extends IItem, IHaveUUID, IHasName, IHaveSpecs
{
    public const SUBJECT = 'extas.api.route.spec.open.api';

    public static function constructName(string $mehod, string $path): string;
}
