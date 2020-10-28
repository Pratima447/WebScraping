<?php

namespace App\Contracts;

interface SiteInterface 
{
    public function getItemName($dom);
    public function getItemUrl($dom);
    public function getItemBrand($dom);
    public function getItemImage($dom);
    public function getItemOldPrice($dom);
    public function getItemNewPrice($dom);
    public function getItemDiscount($dom);

}