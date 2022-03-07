<?php

class DVD extends Product
{
    protected $size;

    public function persistFields(): array
    {
        $fields = parent::persistFields();
        $fields['size'] = $this->size;

        return $fields;
    }
    public function getSize()
    {
        return $this->size;
    }
    public function setSize($size)
    {
        return $this->size = $size;
    }

}