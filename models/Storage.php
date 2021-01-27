<?php

class Storage
{
    /**
     * @var array
     */
    private $products;
    private $logger;

    public function __construct(array $products, $logger)
    {
        $this->products = $products;
        $this->logger = $logger;
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
