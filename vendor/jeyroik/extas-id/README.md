![PHP Composer](https://github.com/jeyroik/extas-id/workflows/PHP%20Composer/badge.svg?branch=master)
![codecov.io](https://codecov.io/gh/jeyroik/extas-id/coverage.svg?branch=master)
<a href="https://codeclimate.com/github/jeyroik/extas-id/maintainability"><img src="https://api.codeclimate.com/v1/badges/ded98f28320e7855f6a9/maintainability" /></a>
[![Latest Stable Version](https://poser.pugx.org/jeyroik/extas-id/v)](//packagist.org/packages/jeyroik/extas-jsonrpc)
[![Total Downloads](https://poser.pugx.org/jeyroik/extas-id/downloads)](//packagist.org/packages/jeyroik/extas-jsonrpc)
[![Dependents](https://poser.pugx.org/jeyroik/extas-id/dependents)](//packagist.org/packages/jeyroik/extas-jsonrpc)


# extas-id

Tools for working with ID

# using

```php

use extas\interfaces\IHaveStringid;
use extas\components\THasStringId;
use extas\components\UUID;

class My implements IHaveStringId
{
    use THasStringId;

    protected array $config = [];
}

$my = new My();

UUID::setId($my, 4); 
echo $my->getId();// something like 0a961099-fd10-4f89-a128-2ae7c8ae5fef
```
