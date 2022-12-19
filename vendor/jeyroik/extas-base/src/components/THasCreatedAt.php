<?php
namespace extas\components;

use extas\interfaces\IHasCreatedAt;

/**
 * Trait THasCreatedAt
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasCreatedAt
{
    use THasTime;

    /**
     * @param string $format
     *
     * @return string|int
     */
    public function getCreatedAt(string $format = '')
    {
        return $this->getTime(IHasCreatedAt::FIELD__CREATED_AT, $format);
    }

    /**
     * @param int|\DateTime $time
     *
     * @return $this
     */
    public function setCreatedAt($time)
    {
        return $this->setTime(IHasCreatedAt::FIELD__CREATED_AT, $time);
    }
}
