# Pest Helpers Auto-Register
![CI status](https://github.com/felixdorn/pest-plugin-auto-helpers/workflows/Tests/badge.svg)
![CI status](https://github.com/felixdorn/pest-plugin-auto-helpers/workflows/Formats/badge.svg)

## Getting started

### Installation
This library can be installed using composer, if you don't have it already, [download it](https://getcomposer.org/download).

You can run this command :
```bash
composer require delights/pest-plugin-auto-helpers
```

## Usage

Once, you installed it, every function in your `tests/Helpers.php` file will be available as a method in your test case.

We do not support namespaced functions in `Helpers.php`. However, as of PHP8 and this [rfc](https://wiki.php.net/rfc/namespaced_names_as_token) this will be possible.

If a method and a helper have the same name, the method will be called.

