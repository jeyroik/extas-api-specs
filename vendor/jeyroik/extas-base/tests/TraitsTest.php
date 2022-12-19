<?php
namespace tests;


use extas\components\THasEndpoint;
use extas\components\THasHash;
use extas\interfaces\IHasClass;
use extas\interfaces\IHasEndpoint;
use extas\interfaces\IHasHash;
use extas\interfaces\IHasPriority;
use extas\interfaces\IHasAliases;
use extas\interfaces\IHasCreatedAt;
use extas\interfaces\IHasUpdatedAt;
use extas\interfaces\IHasDeletedAt;
use extas\interfaces\IHasId;
use extas\interfaces\IHasPath;
use extas\interfaces\IHasType;
use extas\interfaces\IHasValue;
use extas\interfaces\IHasVersion;
use extas\interfaces\IHasName;
use extas\interfaces\IHasDescription;
use extas\interfaces\IHasState;
use extas\interfaces\IHasItemsData;

use extas\components\THasClass;
use extas\components\THasPriority;
use extas\components\THasTags;
use extas\components\THasInfo;
use extas\components\THasAliases;
use extas\components\THasCreatedAt;
use extas\components\THasUpdatedAt;
use extas\components\THasDeletedAt;
use extas\components\THasId;
use extas\components\THasPath;
use extas\components\THasType;
use extas\components\THasValue;
use extas\components\THasVersion;
use extas\components\THasName;
use extas\components\THasDescription;
use extas\components\THasState;
use extas\components\THasItemsData;
use extas\components\TIsApplicableArray;

use \PHPUnit\Framework\TestCase;

/**
 * Class TraitsTest
 *
 * @author jeyroik <jeyroik@gmail.com>
 */
class TraitsTest extends TestCase
{
    public function testHasDescription()
    {
        /**
         * @var $test \extas\interfaces\IHasDescription
         */
        $test = new class {
            use THasDescription;
            protected array $config = [];
        };

        $test->setTitle('Test')->setDescription('Test');
        $this->assertEquals('Test', $test->getTitle());
        $this->assertEquals('Test', $test->getDescription());
    }

    public function testHasName()
    {
        /**
         * @var $test IHasName
         */
        $test = new class {
            use THasName;
            protected array $config = [];
        };

        $test->setName('Test');
        $this->assertEquals('Test', $test->getName());
    }

    public function testHasEndpoint()
    {
        /**
         * @var $test IHasEndpoint
         */
        $test = new class {
            use THasEndpoint;
            protected array $config = [];
        };

        $test->setEndpoint('Test');
        $this->assertEquals('Test', $test->getEndpoint());
    }

    public function testHasPriority()
    {
        /**
         * @var $test IHasPriority
         */
        $test = new class {
            use THasPriority;
            protected array $config = [];
        };

        $test->setPriority(10);
        $this->assertEquals(10, $test->getPriority());
    }

    public function testHasHash()
    {
        /**
         * @var $test IHasHash
         */
        $test = new class {
            use THasHash;
            protected array $config = [];
        };

        $test->setHash('test');
        $this->assertEquals('test', $test->getHash());
    }

    public function testHasInfo()
    {
        /**
         * @var $test IHasDescription|IHasName
         */
        $test = new class {
            use THasInfo;
            protected array $config = [];
        };

        $test->setName('Test');
        $test->setTitle('Test')->setDescription('Test');

        $this->assertEquals('Test', $test->getName());
        $this->assertEquals('Test', $test->getTitle());
        $this->assertEquals('Test', $test->getDescription());
    }

    public function testHasVersion()
    {
        /**
         * @var $test IHasVersion
         */
        $test = new class {
            use THasVersion;
            protected array $config = [];
        };

        $test->setVersion('Test');

        $this->assertEquals('Test', $test->getVersion());
    }

    public function testHasValue()
    {
        /**
         * @var $test IHasValue
         */
        $test = new class {
            use THasValue;
            protected array $config = [];

            public function getTemplateName(): string
            {
                return 'test';
            }
        };

        $test->setValue('Test');

        $this->assertEquals('Test', $test->getValue());
    }

    public function testHasType()
    {
        /**
         * @var $test IHasType
         */
        $test = new class {
            use THasType;
            protected array $config = [];
        };

        $test->setType('Test');

        $this->assertEquals('Test', $test->getType());
    }

    public function testHasPath()
    {
        /**
         * @var $test IHasPath
         */
        $test = new class {
            use THasPath;
            protected array $config = [];
        };

        $test->setPath('Test');

        $this->assertEquals('Test', $test->getPath());
    }

    public function testHasId()
    {
        /**
         * @var $test IHasId
         */
        $test = new class {
            use THasId;
            protected array $config = [];
        };

        $test->setId('Test');

        $this->assertEquals('Test', $test->getId());
    }

    public function testHasUpdatedAt()
    {
        /**
         * @var $test IHasUpdatedAt
         */
        $test = new class {
            use THasUpdatedAt;
            protected array $config = [];
        };

        $now = time();
        $format = 'Y-m-d H:i:s';
        $test->setUpdatedAt($now);

        $this->assertEquals($now, $test->getUpdatedAt());
        $this->assertEquals(date($format, $now), $test->getUpdatedAt($format));

        $test->setUpdatedAt(new \DateTime(date('Y/m/d H:i:s', $now)));
        $this->assertEquals(date($format, $now), $test->getUpdatedAt($format));
    }

    public function testHasCreatedAt()
    {
        /**
         * @var $test IHasCreatedAt
         */
        $test = new class {
            use THasCreatedAt;
            protected array $config = [];
        };

        $now = time();
        $format = 'Y-m-d H:i:s';

        $test->setCreatedAt($now);

        $this->assertEquals($now, $test->getCreatedAt());
        $this->assertEquals(date($format, $now), $test->getCreatedAt($format));

        $test->setCreatedAt(new \DateTime(date('Y/m/d H:i:s', $now)));
        $this->assertEquals(date($format, $now), $test->getCreatedAt($format));
    }

    public function testHasDeletedAt()
    {
        /**
         * @var $test IHasDeletedAt
         */
        $test = new class {
            use THasDeletedAt;
            protected array $config = [];
        };

        $now = time();
        $format = 'Y-m-d H:i:s';

        $test->setDeletedAt($now);

        $this->assertEquals($now, $test->getDeletedAt());
        $this->assertEquals(date($format, $now), $test->getDeletedAt($format));

        $test->setDeletedAt(new \DateTime(date('Y/m/d H:i:s', $now)));
        $this->assertEquals(date($format, $now), $test->getDeletedAt($format));
    }

    public function testHasAliases()
    {
        /**
         * @var $test IHasAliases
         */
        $test = new class {
            use THasAliases;
            protected array $config = [];
        };

        $test->setAliases(['Test']);
        $this->assertEquals(['Test'], $test->getAliases());

        $test->addAlias('Test2');
        $this->assertEquals(true, $test->hasAlias('Test2'));

        $test->removeAlias('Test2');
        $this->assertEquals(false, $test->hasAlias('Test2'));
    }

    public function testHasState()
    {
        /**
         * @var $test IHasState
         */
        $test = new class {
            use THasState;
            protected array $config = [];
        };

        $test->setState('Test');

        $this->assertEquals('Test', $test->getState());
    }

    public function testHasItemsData()
    {
        /**
         * @var $test IHasItemsData
         * @var $dates \DateTime[]
         */
        $test = new class {
            use THasItemsData;
        };

        $now = time();
        $dates = $test->convertToItems(
            [
                'key' => date('Y/m/d H:i:s', $now)
            ],
            \DateTime::class
        );

        $this->assertArrayHasKey('key', $dates);
        $this->assertEquals(date('Y-m-d', $now), $dates['key']->format('Y-m-d'));
    }

    public function testIsApplicableArray()
    {
        $test = new class {
            use TIsApplicableArray;
            public function isApplicable(string $value): bool
            {
                return !empty($value);
            }

            function apply($v)
            {
                return $v . '.ok';
            }

            public function __invoke($value)
            {
                return $this->applyToArray($value);
            }
        };

        $notArray = $test('that.is');
        $this->assertEquals('that.is.ok', $notArray);

        $array = $test(['test1' => 'that.is', 'test2' => 'another.is']);
        $this->assertEquals('that.is.ok', $array['test1']);
        $this->assertEquals('another.is.ok', $array['test2']);
    }

    public function testHasClass()
    {
        $item = new class () {
            use THasClass;

            protected array $config = [IHasClass::FIELD__CLASS => EmptyClass::class];
        };

        $result = $item->runWithParameters([], '__invoke', 'test', 'test1');
        $this->assertEquals('is ok: test, test1', $result);

        $item->setClass('unknown');
        $this->expectExceptionMessage('Missed or unknown class "unknown"');
        $item->buildClassWithParameters();
    }

    public function testHasTags()
    {
        $item = new class {
            use THasTags;
            protected array $config = [];
        };
        $this->assertFalse($item->hasTag('test'));

        $item->addTags(['test']);
        $this->assertTrue($item->hasTag('test'));

        $item->removeTag('test');
        $this->assertFalse($item->hasTag('test'));
    }
}
