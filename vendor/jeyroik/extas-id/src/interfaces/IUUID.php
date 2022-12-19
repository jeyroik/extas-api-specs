<?php
namespace extas\interfaces;

interface IUUID
{
    public static function setId(IHaveUUID &$item, int $version = 4): void;

    public static function getId(int $version = 4): string;

    public static function setUuid(\ArrayAccess &$item, string $field, int $version = 4): void;

    public static function appendUuid(\ArrayAccess &$item, string $field, string $delimiter = '_', int $version = 4): void;
}
