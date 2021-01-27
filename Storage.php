<?php

class Storage
{
    /**
     * @var array
     */
    private $products;
    public function __construct(array $products)
    {
        $this->products = $products;
    }

    /**
     * @return array
     */
    public function getById(int $id): array
    {
        foreach ($this->products as $prod)
            if ($id == $prod['id'])
                return $prod;
        return [];
    }

}
