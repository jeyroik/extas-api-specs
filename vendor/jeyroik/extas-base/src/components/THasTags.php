<?php
namespace extas\components;

use extas\interfaces\IHasTags;

/**
 * Trait THasTags
 *
 * @property array $config
 *
 * @package extas\components
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasTags
{
    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->config[IHasTags::FIELD__TAGS] ?? [];
    }

    /**
     * @param string $tag
     * @return bool
     */
    public function hasTag(string $tag): bool
    {
        return in_array($tag, $this->getTags());
    }

    /**
     * @param string $tag
     * @return $this
     */
    public function addTag(string $tag)
    {
        if (!$this->hasTag($tag)) {
            $tags = $this->getTags();
            $tags[] = $tag;
            $this->setTags($tags);
        }

        return $this;
    }

    /**
     * @param array $tags
     * @return $this
     */
    public function addTags(array $tags)
    {
        foreach ($tags as $tag) {
            $this->addTag($tag);
        }

        return $this;
    }

    /**
     * @param array $tags
     * @return $this
     */
    public function setTags(array $tags)
    {
        $this->config[IHasTags::FIELD__TAGS] = $tags;

        return $this;
    }

    /**
     * @param string $tag
     * @return $this
     */
    public function removeTag(string $tag)
    {
        if ($this->hasTag($tag)) {
            $tagsByName = array_flip($this->getTags());
            unset($tagsByName[$tag]);
            $this->setTags($tagsByName);
        }

        return $this;
    }
}
