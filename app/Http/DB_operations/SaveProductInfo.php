<?php

namespace App\Http\DB_operations;

use App\Models\product_data;

class SaveProductInfo 
{
    public function save_info($product_data) {
        
        foreach ($product_data as $data) {
            $inserted_data = (new product_data)->insert_data($data);

            // if data exists, continue with next 
            if ($inserted_data == -1) {
                continue;
            }

            if( $inserted_data == 0) {
                return 0;
            }
        }
        return $inserted_data;
    }
}