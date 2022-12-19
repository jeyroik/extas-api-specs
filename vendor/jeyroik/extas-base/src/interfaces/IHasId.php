<?php
namespace extas\interfaces;

/**
 * Interface IHasId
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasId
{
    public const FIELD__ID = 'id';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param mixed $name
     *
     * @return $this
     */
    public function setId(string $name);
}
