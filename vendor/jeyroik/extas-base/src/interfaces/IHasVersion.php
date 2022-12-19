<?php
namespace extas\interfaces;

/**
 * Interface IHasVersion
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasVersion
{
    public const FILED__VERSION = 'version';

    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @param string $version
     *
     * @return $this
     */
    public function setVersion(string $version);

    /**
     * @param string $version
     * @param string $operator
     *
     * @return bool
     */
    public function compareVersionTo(string $version, $operator = '=='): bool;
}
