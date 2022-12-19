<?php
namespace tests\resources;

use extas\components\plugins\Plugin;
use extas\interfaces\IItem;
use extas\interfaces\routes\IRouteDispatcher;
use extas\interfaces\stages\IStageApiAfterCreate;

class PluginAfterCreate extends Plugin implements IStageApiAfterCreate
{
    public function __invoke(IItem &$item, IRouteDispatcher $dispatcher): void
    {
        $item['created'] = isset($item['created']) ? 2 : 1;
    }
}
