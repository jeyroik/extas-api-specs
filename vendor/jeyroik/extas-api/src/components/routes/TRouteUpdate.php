<?php
namespace extas\components\routes;

use extas\components\extensions\TExtendable;
use extas\components\Plugins;
use extas\interfaces\IItem;
use extas\interfaces\stages\IStageApiAfterUpdate;
use extas\interfaces\stages\IStageApiBeforeUpdate;
use extas\interfaces\stages\IStageApiUpdateData;
use Psr\Http\Message\ResponseInterface;

/**
 * @property string $repoName
 * 
 * @method void setResponseData(array $data, string $errorMessage = '')
 * @method array getWhere()
 */
trait TRouteUpdate
{
    use TExtendable;

    public function execute(): ResponseInterface
    {
        try {
            $item = $this->getItem();
            $data = $this->getRequestData();

            $this->before($data);
            $this->updateData($item, $data);
            $this->after($item);
            $this->setResponseData($item->__toArray());
        } catch (\Exception $e) {
            $this->setResponseData([], $e->getMessage());
        }
        
        return $this->response;
    }

    protected function after(IItem &$item): void
    {
        foreach(Plugins::byStage(IStageApiAfterUpdate::NAME) as $plugin) {
            $plugin($item, $this);
        }

        foreach(Plugins::byStage(IStageApiAfterUpdate::NAME . '.' . $this->repoName) as $plugin) {
            $plugin($item, $this);
        }
    }

    protected function before(array &$data): void
    {
        foreach(Plugins::byStage(IStageApiBeforeUpdate::NAME) as $plugin) {
            $plugin($data, $this);
        }

        foreach(Plugins::byStage(IStageApiBeforeUpdate::NAME . '.' . $this->repoName) as $plugin) {
            $plugin($data, $this);
        }
    }

    protected function updateData(IItem &$item, array $data): void
    {
        foreach (Plugins::byStage(IStageApiUpdateData::NAME) as $plugin) {
            $plugin($item, $data, $this);
        }

        foreach (Plugins::byStage(IStageApiUpdateData::NAME . '.' . $this->repoName) as $plugin) {
            $plugin($item, $data, $this);
        }
    }

    protected function getItem(): IItem
    {
        $where = $this->getWhere();

        return $this->{$this->repoName}()->one($where);
    }
}
