<?php
namespace extas\components;

use extas\interfaces\IHasVersion;

/**
 * Trait THasVersion
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasVersion
{
    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->config[IHasVersion::FILED__VERSION] ?? '';
    }

    /**
     * @param string $version
     *
     * @return $this
     */
    public function setVersion(string $version)
    {
        $this->config[IHasVersion::FILED__VERSION] = $version;

        return $this;
    }

    /**
     * @param string $version
     * @param string $operator
     *
     * @return bool
     */
    public function compareVersionTo(string $version, $operator = '=='): bool
    {
        return version_compare($this->getVersion(), $version, $operator);
    }
}
