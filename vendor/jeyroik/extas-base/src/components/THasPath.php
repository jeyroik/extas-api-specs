<?php
namespace extas\components;

use extas\interfaces\IHasPath;

/**
 * Trait THasPath
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasPath
{
    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->config[IHasPath::FIELD__PATH] ?? '';
    }

    /**
     * @param string $path
     *
     * @return $this
     */
    public function setPath(string $path)
    {
        $this->config[IHasPath::FIELD__PATH] = $path;

        return $this;
    }
}
