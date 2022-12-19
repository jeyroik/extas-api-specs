<?php
namespace extas\components;

use extas\interfaces\IHasDeletedAt;

/**
 * Trait THasDeletedAt
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasDeletedAt
{
    use THasTime;

    /**
     * @param string $format
     *
     * @return string|int
     */
    public function getDeletedAt(string $format = '')
    {
        return $this->getTime(IHasDeletedAt::FIELD__DELETED_AT, $format);
    }

    /**
     * @param int|\DateTime $time
     *
     * @return $this
     */
    public function setDeletedAt($time)
    {
        return $this->setTime(IHasDeletedAt::FIELD__DELETED_AT, $time);
    }
}
