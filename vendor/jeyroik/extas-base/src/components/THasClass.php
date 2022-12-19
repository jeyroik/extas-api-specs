<?php
namespace extas\components;

use extas\components\exceptions\MissedOrUnknown;
use extas\interfaces\IHasClass;

/**
 * Trait THasClass
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasClass
{
    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->config[IHasClass::FIELD__CLASS] ?? '';
    }

    /**
     * @param string $class
     *
     * @return $this
     */
    public function setClass(string $class)
    {
        $this->config[IHasClass::FIELD__CLASS] = $class;

        return $this;
    }

    /**
     * @param array $parameters
     * @return bool|mixed
     * @throws MissedOrUnknown
     */
    public function buildClassWithParameters(array $parameters = [])
    {
        $className = $this->getClass();
        $class = class_exists($className)
            ? new $className($parameters)
            : $this->getByMagic($className, $parameters);

        if (!$class) {
            throw new MissedOrUnknown('class "' . $className . '"');
        }

        return $class;
    }

    /**
     * @param array $constructConfig
     * @param string $method
     * @param mixed ...$methodArgs
     * @return mixed
     * @throws MissedOrUnknown
     */
    public function runWithParameters(array $constructConfig, string $method, ...$methodArgs)
    {
        $dispatcher = $this->buildClassWithParameters($constructConfig);

        return $dispatcher->$method(...$methodArgs);
    }

    /**
     * @param string $name
     * @param array $parameters
     * @return mixed
     */
    protected function getByMagic(string $name, array $parameters)
    {
        return method_exists($this, 'hasMethod') && $this->hasMethod($name)
            ? $this->$name($parameters)
            : null;
    }
}
