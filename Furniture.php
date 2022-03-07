<?php

class Furniture extends Product
{
    protected $height;
    protected $width;
    protected $length;

    public function persistFields(): array
    {
        $fields = parent::persistFields();
        $fields['height'] = $this->height;
        $fields['width'] = $this->width;
        $fields['length'] = $this->length;

        return $fields;
    }
    public function getHeight()
    {
        return $this->height;
    }
    public function setHeight($height)
    {
        return $this->height = $height;
    }
    public function getWidth()
    {
        return $this->width;
    }
    public function setWidth($width)
    {
        return $this->width = $width;
    }
    public function getLength()
    {
        return $this->length;
    }
    public function setLength($length)
    {
        return $this->length = $length;
    }

    public function getSize() //just to show polymorphism :)
    {
        return $this->height . 'x' .$this->width . 'x' . $this->length;
    }
}