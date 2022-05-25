<?php

namespace App\Taxes;

class Detector
{
    protected $seuil;

    public function __construct(int $seuil)
    {
        $this->seuil = $seuil;
    }

    public function detect(int $amount): bool
    {
        return $amount > $this->seuil;
    }
}
