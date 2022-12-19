![PHP Composer](https://github.com/jeyroik/extas-base/workflows/PHP%20Composer/badge.svg?branch=master&event=push)
![codecov.io](https://codecov.io/gh/jeyroik/extas-base/coverage.svg?branch=master)

# Описание

Пакет с базовыми интерфейсами и трейтами с их реализацией.

# Tests

`# composer run-script test`

# Usage

```php
use extas\interafces\IHasName;
use extas\interafces\IHasDescription;

use extas\components\THasName;
use extas\components\THasDescription;
use extas\components\parameters\THasParameters;
use extas\components\Item;

class Car extends Item implements IHasName, IHasDescription
{
    use THasName;
    use THasDescription;
}

$car = new Car([
    Car::FIELD__NAME => 'My car',
    Car::FIELD__DESCRIPTION => 'This is my car'
]);

echo $car->getName(); // 'My car'
$car->setName('Not my car');

echo $car->getDescription(); // 'This is my car'
$car->setDescription('This is not my car');
```
