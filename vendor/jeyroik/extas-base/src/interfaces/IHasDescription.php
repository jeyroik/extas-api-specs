<?php
namespace extas\interfaces;

/**
 * Interface IHasDescription
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasDescription
{
    public const FIELD__TITLE = 'title';
    public const FIELD__DESCRIPTION = 'description';

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title);

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description);
}
