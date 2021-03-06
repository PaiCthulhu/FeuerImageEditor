<?php

namespace PaiCthulhu\FeuerImageEditor;

use PaiCthulhu\FeuerImageEditor\Engine\ImagickEngine;

abstract class ImageBase
{

    /**
     * @var \PaiCthulhu\FeuerImageEditor\Engine\Engine $engine
     */
    protected $engine;
    /**
     * @var float $width
     */
    protected $width;
    /**
     * @var float $height
     */
    protected $height;


    /**
     * ImageBase constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->engine = new ImagickEngine();
    }

    public function __clone()
    {
        $this->engine = clone $this->engine;
    }

    public function getHandle()
    {
        return $this->engine->getHandle();
    }

    public function base64()
    {
        return base64_encode($this->engine->getBlob());
    }

    public function save($path)
    {
        $this->engine->saveFile($path);
        return $this;
    }

    public function asText()
    {
        return $this->engine->getAsText();
    }

    /**
     * @param $width
     * @param $height
     * @return static
     * @throws \Exception
     */
    public static function new($width, $height)
    {
        $i = new static();
        $i->width = $width;
        $i->height = $height;
        $i->engine->newFile($width, $height);
        return $i;
    }

    /**
     * Factory from file
     * @param string $path path to file
     * @param int $dpi
     * @return static
     * @throws \Exception
     */
    public static function open($path, $dpi = 72)
    {
        $i = new static();
        $i->engine->loadFile($path, $dpi);
        $i->reloadSize();
        return $i;
    }

    public function openFile($path)
    {
        return $this->engine->loadFile($path);
    }

    public function reloadSize()
    {
        list($this->width, $this->height) = $this->engine->getSize();
        return $this;
    }

    public function resize($width, $height = null)
    {
        $height = $height ?? $width;
        $this->engine->resize($width, $height);
        $this->reloadSize();
        return $this;
    }

    public function scale($width = 0, $height = 0)
    {
        if ($width == 0 && $width == $height) {
            return $this;
        }
        $this->engine->scale($width, $height);
        $this->reloadSize();
        return $this;
    }

    public function setFormat($format){
        $this->engine->setFormat($format);
        return $this;
    }

    public function setBGColor($color)
    {
        $this->engine->setBGColor($color);
        return $this;
    }

    public function setCMYK()
    {
        $this->engine->setCMYK();
        return $this;
    }

    public function setRGB()
    {
        $this->engine->setRGB();
        return $this;
    }

    public function setColorProfile($path, $type = "icc")
    {
        $this->engine->setColorProfile($path, $type);
        return $this;
    }

    public function jpegCompress($quality)
    {
        $this->engine->jpegCompress($quality);
        return $this;
    }

    public function thumb($path, $size = 512, $quality = 75)
    {
        $thumb = clone $this;
        $thumb->resize($size)->jpegCompress($quality)->save($path);
        return $this;
    }

}
