<?php
namespace extas\components;

/**
 * Trait THasCreatedAt
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasTime
{
    /**
     * @param string $fieldName
     * @param string $format
     *
     * @return string|int
     */
    protected function getTime(string $fieldName, string $format = '')
    {
        $time = $this->config[$fieldName] ?? 0;

        return $format ? date($format, $time) : $time;
    }

    /**
     * @param string $fieldName
     * @param int|\DateTime $time
     *
     * @return $this
     */
    public function setTime(string $fieldName, $time)
    {
        if ($time instanceof \DateTime) {
            $time = $time->getTimestamp();
        } else {
            $time = (int) $time;
        }

        $this->config[$fieldName] = $time;

        return $this;
    }
}
