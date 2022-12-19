<?php
namespace extas\components;

use extas\interfaces\IHasDescription;

/**
 * Trait THasDescription
 *
 * Реализация интерфейса extas\interfaces\IHasDescription
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasDescription
{
    public function getTitle(): string
    {
        return $this->config[IHasDescription::FIELD__TITLE] ?? '';
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->config[IHasDescription::FIELD__TITLE] = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->config[IHasDescription::FIELD__DESCRIPTION] ?? '';
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->config[IHasDescription::FIELD__DESCRIPTION] = $description;

        return $this;
    }
}
