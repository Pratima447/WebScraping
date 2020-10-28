<?php

namespace App\Http\SiteOperations;

use Illuminate\Http\Request;
use App\Contracts\SiteInterface;
use KubAT\PhpSimple\HtmlDomParser;

class ShakedealScrape implements SiteInterface
{
    public function get_all_data($site_name, $req_brand, $req_cat) {

        $html = HtmlDomParser::file_get_html($site_name);

        $product_data = [];
        $i = 0;
        
        foreach($html->find(".ty-grid-list__item") as $product) {            

            $item_name  = $this->getItemName($product);
            $item_url   = $this->getItemUrl($product);

            $item_old_p = $this->getItemOldPrice($product);
            $item_new_p = $this->getItemNewPrice($product);
            $item_disc  = $this->getItemDiscount($product);
            $item_image = $this->getItemImage($product);

            $product_data[$i]['prod_name'] = $item_name;
            $product_data[$i]['prod_url']  = $item_url;
            $product_data[$i]['old_price'] = $item_old_p;
            $product_data[$i]['new_price'] = $item_new_p;
            $product_data[$i]['discount']  = $item_disc;
            $product_data[$i]['image_url'] = $item_image;

            if ($req_brand != '') 
            {
                $product_data[$i]['brand'] = $req_brand;
            } 
            elseif ($req_cat != '') 
            {
                $product_data[$i]['category'] = $req_cat;
            }

            $i++;
           
        }

        return $product_data;
    }

    public function getItemName($product) {
        foreach($product->find(".product-title") as $item) {
           $name = $item->title;
        }

        return $name;
    }

    public function getItemUrl($product) {
        foreach($product->find(".product-title") as $item) {
            $link = $item->href;
        }

        return $link;
    }

    public function getItemBrand($product) {

        foreach($product->find(".sd_custom_anchor") as $item) {
            $brand = $item->plaintext;
        }

        return $brand;

    }

    public function getItemImage($product) {

        foreach($product->find("img") as $item) {
            $image = $item->src;
        }

        return $image;
    }

    public function getItemOldPrice($product) {

        $no_price  = $product->find(".sd-no-price");
        $old_price = $product->find(".sd_list_price");

        if ($no_price || ! $old_price) {
            return 0;
        }

        $old_price  = $product->find(".sd_list_price");
        
        foreach($product->find(".sd_list_price > span") as $item) {
            $old_price = $item->plaintext;
        }
        $old_price = str_replace(",", "", $old_price);

        return $old_price;
    }

    public function getItemNewPrice($product) {

        $no_price = $product->find(".sd-no-price");

        if ($no_price) {
            return 0;
        }

        foreach($product->find(".ty-price > span") as $item) {
            $new_price = $item->plaintext;
        }

        $new_price = str_replace(",", "", $new_price);

        return $new_price;
    }

    public function getItemDiscount($product) {
        $no_price   = $product->find(".sd-no-price");
        $disc_price = $product->find(".sd_plp_discount");

        if ($no_price || !$disc_price) {
           
            return 0;
        }

        foreach($product->find(".sd_plp_discount") as $item) {
            $discount = trim($item->plaintext," % OFF");
        }

        return $discount;
    }

}