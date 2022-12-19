<?php
namespace extas\interfaces;

/**
 * @field.id(description="ID",type=string,edges=[1,inf])
 */
interface IHaveStringId extends IHaveId
{
    public function getId(): string;

    public function setId(string $id): self;
}
