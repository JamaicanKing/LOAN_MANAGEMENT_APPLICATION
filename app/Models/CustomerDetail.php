<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'phone_number',
        'address',
        'street_address',
        'city',
        'state/province',
        'postal/zip_code',
        'trn',
        'identification',
        'identification_number',
        'identification_expiration',
        'contact_person_name',
        'contact_person_add',
        'contact_person_number',
        'kinship',
        'length_of_relationship',
        
    ];

}
