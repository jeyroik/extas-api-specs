<?php
namespace extas\interfaces;

/**
 * Interface IHasPath
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasPath
{
    public const FIELD__PATH = 'path';

    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @param string $path
     *
     * @return $this
     */
    public function setPath(string $path);
}
