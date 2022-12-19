<?php
namespace extas\components;

use extas\interfaces\IHaveUUID;
use extas\interfaces\IUUID;
use Ramsey\Uuid\Uuid as UuidRamsey;

class UUID implements IUUID
{
    public static function setId(IHaveUUID &$item, int $version = 4): void
    {
        $item->setId(static::getId($version));
    }

    public static function getId(int $version = 4): string
    {
        $method = 'uuid' . $version;
        return UuidRamsey::$method()->toString();
    }

    public static function setUuid(\ArrayAccess &$item, string $field, int $version = 4): void
    {
        $item[$field] = static::getId($version);
    }

    public static function appendUuid(\ArrayAccess &$item, string $field, string $delimiter = '_', int $version = 4): void
    {
        $value = $item[$field];
        $item[$field] = $value . $delimiter . static::getId($version);
    }
}
