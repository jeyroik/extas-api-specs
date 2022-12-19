<?php
namespace extas\interfaces\api\specs;

interface IHaveSpecs
{
    public const FIELD__SPECS = 'specs';

    public function getSpecs(): array;
    public function setSpecs(array $specs): self;
}
