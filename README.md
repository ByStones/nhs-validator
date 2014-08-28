# NHS Validator

This library to check whether a NHS number is valid.

## Installing via Composer

```javascript
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/bystones/nhs-validator"
        }
    ],
        "require": {
            "bystones/nhs-validator": "dev-master"
        }
}
```


## Example

```php

use ByStones\NHSNumber;

$number = new NHSNumber(3012468579);

echo sprintf('This NHS number is %s', $number->isValid() ? 'valid' : 'invalid');
```

