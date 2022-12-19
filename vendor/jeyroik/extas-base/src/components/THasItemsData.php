<?php
namespace extas\components;

/**
 * Trait THasItemsData
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasItemsData
{
    /**
     * @param array $data
     * @param string $itemClass
     * @return array
     */
    public function convertToItems(array $data, string $itemClass): array
    {
        $items = [];

        foreach ($data as $index => $datum) {
            $items[$index] = new $itemClass($datum);
        }

        return $items;
    }
}
