**This might become part of PEST's core anytime soon**

<div style="text-align: center">

# Register PEST helpers as a TestCase method.
![CI status](https://github.com/felixdorn/pest-plugin-auto-helpers/workflows/Tests/badge.svg)
![CI status](https://github.com/felixdorn/pest-plugin-auto-helpers/workflows/Formats/badge.svg)

</div>

## Getting started

### Installation
This library can be installed using composer, if you don't have it already, [download it](https://getcomposer.org/download).

You can run this command :
```bash
composer require delights/pest-plugin-helpers-auto-register
```

## Usage
> We do not support namespaced functions in `Helpers.php`. However, as of PHP8 and this [rfc](https://wiki.php.net/rfc/namespaced_names_as_token) this will be possible.

Once, you installed it, every function in your `tests/Helpers.php` file will be available as a method in your test case.

**If a method and a helper have the same name, the method will be called.**

```php
// tests/Helpers.php
function assertReallyEqual($a, $b) {
    $this->assertEquals($a, $b);
    $this->assertEquals($a, $b);
}

// tests/SomeTest.php

it('tests')
    ->assertReallyEqual(1, 1);

it('tests but better', function () {
    $this->assertReallyEqual(1, 1);
});
```
