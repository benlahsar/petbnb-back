<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
'listing_title',
 'description', 
 'location', 
 'pet_types',
  'space_type',
   'amenities',
    'photos',
     'price',
      'availability_date'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
