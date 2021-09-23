<p align="center">
    <a href="https://www.mangoweb.cz/en/" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/38423357?s=200&v=4"/>
    </a>
</p>
<h1 align="center">
Packing Slips Plugin
<br />
    <a href="https://packagist.org/packages/mangoweb-sylius/sylius-packing-slips-plugin" title="License" target="_blank">
        <img src="https://img.shields.io/packagist/l/mangoweb-sylius/sylius-packing-slips-plugin.svg" />
    </a>
    <a href="https://packagist.org/packages/mangoweb-sylius/sylius-packing-slips-plugin" title="Version" target="_blank">
        <img src="https://img.shields.io/packagist/v/mangoweb-sylius/sylius-packing-slips-plugin.svg" />
    </a>
    <a href="http://travis-ci.org/mangoweb-sylius/SyliusPackingSlipsPlugin" title="Build status" target="_blank">
        <img src="https://img.shields.io/travis/mangoweb-sylius/SyliusPackingSlipsPlugin/master.svg" />
    </a>
</h1>

## Features

* Print packing slips or any kind of labels for orders which are not sent. The default template prints the grid with basic order information for printing small labels, however the template is easily customizable to print A4 slips too (see usabe below).

<p align="center">
	<img src="https://raw.githubusercontent.com/mangoweb-sylius/SyliusPackingSlipsPlugin/master/doc/admin.png"/>
</p>

## Installation

1. Run `$ composer require mangoweb-sylius/sylius-packing-slips-plugin`.
2. Register `\MangoSylius\PackingSlipsPlugin\MangoSyliusPackingSlipsPlugin` in your Kernel.
3. Import `@MangoSyliusPackingSlipsPlugin/Resources/config/routing.yml` in the routing.yml.

```
mango_sylius_shipment_export_plugin:
    resource: "@MangoSyliusPackingSlipsPlugin/Resources/config/routing.yml"
    prefix: /%sylius_admin.path_name%
```

### Usage

You can override package slips template.

* `@MangoSyliusPackingSlipsPlugin/show.html.twig`
* `@MangoSyliusPackingSlipsPlugin/tdUnit.html.twig`

## Development

### Usage

- Create symlink from .env.dist to .env or create your own .env file
- Develop your plugin in `/src`
- See `bin/` for useful commands

### Testing

After your changes you must ensure that the tests are still passing.
* Easy Coding Standard
  ```bash
  bin/ecs.sh
  ```
* PHPStan
  ```bash
  bin/phpstan.sh
  ```
License
-------
This library is under the MIT license.

Credits
-------
Developed by [manGoweb](https://www.mangoweb.eu/).
