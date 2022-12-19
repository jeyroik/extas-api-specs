<?php
namespace extas\interfaces;

/**
 * Interface IHasItemsData
 *
 * Just wrap data into items.
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasItemsData
{
    /**
     * @param array $data
     * @param string $itemClass
     * @return array
     */
    public function convertToItems(array $data, string $itemClass): array;
}
