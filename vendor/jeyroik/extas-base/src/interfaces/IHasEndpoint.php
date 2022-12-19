<?php
namespace extas\interfaces;

/**
 * Interface IHasEndpoint
 *
 * @package extas\interfaces
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IHasEndpoint
{
    public const FIELD__ENDPOINT = 'endpoint';

    /**
     * @return string
     */
    public function getEndpoint(): string;

    /**
     * @param string $endpoint
     * @return $this
     */
    public function setEndpoint(string $endpoint);
}
