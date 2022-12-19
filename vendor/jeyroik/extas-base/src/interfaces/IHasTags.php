<?php
namespace extas\interfaces;

/**
 * Interface IHasTags
 *
 * @package extas\interfaces
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IHasTags
{
    public const FIELD__TAGS = 'tags';

    /**
     * @return array
     */
    public function getTags(): array;

    /**
     * @param string $tag
     * @return bool
     */
    public function hasTag(string $tag): bool;

    /**
     * @param string $tag
     * @return $this
     */
    public function addTag(string $tag);

    /**
     * @param array $tags
     * @return $this
     */
    public function addTags(array $tags);

    /**
     * @param array $tags
     * @return $this
     */
    public function setTags(array $tags);

    /**
     * @param string $tag
     * @return $this
     */
    public function removeTag(string $tag);
}
