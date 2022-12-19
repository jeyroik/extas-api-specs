<?php
namespace extas\interfaces\stages;

use extas\interfaces\IItem;
use extas\interfaces\routes\IRouteDispatcher;

interface IStageApiAfterDelete
{
    public const NAME = 'extas.api.after.delete';

    public function __invoke(IItem &$item, IRouteDispatcher $dispatcher): void;
}
