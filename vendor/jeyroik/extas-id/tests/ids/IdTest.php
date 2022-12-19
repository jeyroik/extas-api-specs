<?php

use \PHPUnit\Framework\TestCase;
use extas\components\THasStringId;
use extas\components\UUID;
use extas\interfaces\IHaveUUID;
use tests\resources\AsArray;

/**
 * Class IdTest
 * @author jeyroik <jeyroik@gmail.com>
 */
class IdTest extends TestCase
{    
    public function testUuid(): void
    {
        $obj = new AsArray();

        UUID::setId($obj);

        $this->assertNotEmpty($obj->getId());
        $this->assertEquals(36, strlen($obj->getId()));

        UUID::setUuid($obj, 'test');

        $this->assertEquals(36, strlen($obj['test']));

        UUID::appendUuid($obj, 'test');

        $this->assertEquals(73, strlen($obj['test'])); // uuid + uuid + delimiter
    }
}
