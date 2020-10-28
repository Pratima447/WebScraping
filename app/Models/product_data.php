<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class product_data extends Model 
{
    protected $table      = 'product_data';
    protected $primaryKey = 'prod_id';
    public $timestamps    = false;

    public function insert_data($data) 
    {
        // check if exists
        $item_url = $data['prod_url'];

        $exists = $this::where('prod_url', $item_url)->first();

        if ($exists) {
            return -1;
        }

        $enter_data = $this::insert($data);

        if ($enter_data) {
            return 1;
        }    
        
        return 0;
    }


}