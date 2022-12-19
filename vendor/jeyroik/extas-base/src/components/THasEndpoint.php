<?php
namespace extas\components;

use extas\interfaces\IHasEndpoint;

/**
 * Trait THasEndpoint
 *
 * @property array $config
 *
 * @package extas\components
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasEndpoint
{
    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->config[IHasEndpoint::FIELD__ENDPOINT] ?? '';
    }

    /**
     * @param string $endpoint
     * @return $this
     */
    public function setEndpoint(string $endpoint)
    {
        $this->config[IHasEndpoint::FIELD__ENDPOINT] = $endpoint;

        return $this;
    }
}
