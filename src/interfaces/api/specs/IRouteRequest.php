<?php
namespace extas\interfaces\api\specs;

use extas\interfaces\IItem;

interface IRouteRequest extends IItem, IHaveSpecs
{
    public const SUBJECT = 'extas.api.specs.request';
}
