<?php

namespace App\Proposal;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'proposal';
   protected $fillable = [
       'salutation', 'firstname', 'middlename', 'lastname', 'papertitle', 'email',
	   'phonenumber', 'position', 'institution', 'postaladdress', 'papertitle', 'papertype', 
	   'abstract', 'summary', 'biostatement'
   ];
}
