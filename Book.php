<?php

class Book extends Product
{
    protected $weight;

    public function persistFields(): array
    {
        $fields = parent::persistFields();
        $fields['weight'] = $this->weight;

        return $fields;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($weight)
    {
        return $this->weight = $weight;
    }
    public function getSize() //polymorphism
    {
        return null;
    }
}
