<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\SiteOperations\ShakedealScrape;
use App\Http\DB_operations\SaveProductInfo;

use App\Models\product_data;

class FetchInfoController extends Controller
{
    public function arrange_site(Request $req) {
        $site_name        = $req->site_url;
        $requested_site   = $req->site;
        $requested_brand  = $req->brand;
        $requested_cat    = $req->cat;

        if ($requested_site == 'https://shakedeal.com') 
        {
            $product_data = (new ShakedealScrape)->get_all_data($site_name, $requested_brand, $requested_cat);

            if ($product_data) {
                //  Now save data in DB
                $insert_DB = (new SaveProductInfo)->save_info($product_data);
                
                if (! $insert_DB) {
                    return "Error found while inserting data in DB, Try Again!";
                }

                return "Fetched data successfully!";
            }

            return "Error found while fectching data from site, Try Again!";
        }

        return "Not processing - " . $site_name . " for now";
    }

    public function get_all_prods() {
        
        $all_items_data = (new product_data)
                            ->get()
                            ->toArray();

        return [
            'status' => 1,
            'data' => $all_items_data
        ];
    }

}
