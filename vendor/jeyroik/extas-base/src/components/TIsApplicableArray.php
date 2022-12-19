<?php
namespace extas\components;

/**
 * Trait TIsApplicableArray
 *
 * @method isApplicable(string $value): bool
 * @method apply($v)
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait TIsApplicableArray
{
    protected function applyToArray($value)
    {
        if (is_array($value)) {
            foreach ($value as $i => $v) {
                $value[$i] = $this->applyToArray($v);
            }

            return $value;
        } else {
            return $this->isApplicable($value) ? $this->apply($value) : $value;
        }
    }
}
