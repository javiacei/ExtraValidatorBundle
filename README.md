# ExtraValidator bundle for Symfony2

This package contains a set of useful validators and asserts to use in your projects.

## Included Asserts/Validators

* DNI (DNI/NIF documents)
* Phone (phone numbers, by regular expresions)
* MobilePhone (mobile phone numbers)
* PrefixedPhone (phone numbers with international prefix)

## How to include ExtraValidator

You should clone this repository in your Symfony's `vendor/bundles` directory, add it into `autoload.php` file:

```php
<?php
$loader->registerNamespaces(array(
  'Symfony' => array(__DIR__.'/../vendor/symfony/src', __DIR__.'/../vendor/bundles'),
  ...
  'Ideup'   => __DIR__.'/../vendor/bundles',
  );
```

... and in your `AppKernel.php` file:

```php
<?php
public function registerBundles()
{
    $bundles = array(
      ...
        new Ideup\ExtraValidatorBundle\ExtraValidatorBundle(),
      );
}
```

## How to use ExtraValidator in your Forms/Entities

```php
<?php
namespace Acme\AcmeDemoBundle\Entity;

use Ideup\ExtraValidatorBundle\Validator as ExtraAssert;

class AcmeEntity {
  /**
   * @ExtraAssert\MobilePhone(message="Your mobile phone number is not valid")
   */
  protected $phone;

  ...
}
```

You can use both `Assert` and `ExtraAssert` validators in your entities/forms:

```php
<?php
namespace Acme\AcmeDemoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Ideup\ExtraValidatorBundle\Validator as ExtraAssert;

class AcmeEntity {
  /**
   * @Assert\NotBlank(message="El DNI es obligatorio")
   * @ExtraAssert\MobilePhone(message="Your mobile phone number is not valid")
   */
  protected $phone;

  ...
}
```

`ExtraAssert` validators do not modify symfony's regular asserts, we just add a bunch of useful set of new validators to
make our lives easy!

## Authors

* javiacei
* Moisés Maciá
