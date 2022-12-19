<?php
namespace extas\components;

use extas\interfaces\IHasUpdatedAt;

/**
 * Trait THasUpdatedAt
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasUpdatedAt
{
    use THasCreatedAt;

    /**
     * @param string $format
     *
     * @return string|int
     */
    public function getUpdatedAt(string $format = '')
    {
        return $this->getTime(IHasUpdatedAt::FIELD__UPDATED_AT, $format);
    }

    /**
     * @param string|int|\DateTime $time
     *
     * @return $this
     */
    public function setUpdatedAt($time)
    {
        return $this->setTime(IHasUpdatedAt::FIELD__UPDATED_AT, $time);
    }
}
