<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    //use Searchable;
    //


    public $asYouType = true;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    /*public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }*/


    protected $fillable = [
        'name', 'description','category_id', 'exchange','address','state_id','user_id','visible','views','item_condition'
    ];

    public function poster(){
        return $this->belongsTo('\App\User','user_id');
    }

    public function reviews(){
        return $this->hasMany('\App\Models\Review','item_id');
    }
    public function state(){
        return $this->belongsTo('\App\Models\State','state_id');
    }
    public function category(){
        return $this->belongsTo('\App\Models\Category','category_id');
    }
    public function images(){
        return $this->hasMany('\App\Models\ItemImage','item_id');
    }

    public function incrementViews(){
        $this->views = (int)$this->views + 1;
        $this->save();
        return $this;
    }

    public static function createRules(){
        return array(
            'name' => 'required',
            'category_id' => 'required',
            'state_id' => 'required',
            'exchange' => 'required'
        );
    }

    public static function itemConditions(){
        return array(
             'Excellent',
             'Very Good',
             'Good',
             'Fairly Good'
        );
    }

    public static function shorten($string,$length){

        if(empty($string)) return "";
        if(empty($length) || !is_numeric($length) || (strlen($string) < $length)) return $string;
        return substr($string,0,$length).'...';
    }
}
