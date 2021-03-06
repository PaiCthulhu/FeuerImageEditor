# Feuer Image Editor

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Feuer Image Editor is a PHP image handling and manipulation library, made to fill the gaps between Imagick and GD, with focus on greater text handling (like text boxes, which is absent on similar libraries)


## Install

Via Composer

``` bash
$ composer require pai-cthulhu/feuerimageeditor
```

## Usage

### Simple thumbnail example

``` php
$img = Image::open('/path/to/file.jpg');
$img->thumb('/path/to/thumb.jpg');
```

### Textbox
```` php
$img = Image::open('/path/to/file.jpg');

$tb = new Textbox();
$tb->setPos(0, 120)
    ->setSize(400, 150)
    ->setBGColor('#f28d1a')
    ->setFont('/path/to/font.ttf', 32)
    ->setColor('#ffffff')
    ->setText('Hello World!')
    ->setAlignment(Align::CENTER, Align::MIDDLE);
$img->addLayer($tb);

$img->save('/path/to/save/file.jpg');
````

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email william.jvenancio@gmail.com instead of using the issue tracker.

## Credits

- [William J. Venancio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pai-cthulhu/feuerimageeditor.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/PaiCthulhu/FeuerImageEditor/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/PaiCthulhu/FeuerImageEditor.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/PaiCthulhu/FeuerImageEditor.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pai-cthulhu/feuerimageeditor.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pai-cthulhu/feuerimageeditor
[link-travis]: https://travis-ci.org/PaiCthulhu/FeuerImageEditor
[link-scrutinizer]: https://scrutinizer-ci.com/g/PaiCthulhu/FeuerImageEditor/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/PaiCthulhu/FeuerImageEditor
[link-downloads]: https://packagist.org/packages/pai-cthulhu/feuerimageeditor
[link-author]: https://github.com/PaiCthulhu
[link-contributors]: ../../contributors
