<?php
namespace extas\interfaces;

/**
 * Interface IHasDeletedAt
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasDeletedAt
{
    public const FIELD__DELETED_AT = 'deleted_at';

    /**
     * @param string $format
     *
     * @return string|int
     */
    public function getDeletedAt(string $format = '');

    /**
     * @param int|\DateTime $time
     * @return $this
     */
    public function setDeletedAt($time);
}
