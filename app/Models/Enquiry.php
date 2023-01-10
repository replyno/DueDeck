<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id';
    protected $table = 'enquiries';
    protected $fillable = [ 'name',
                            'email',
                            'contact_no',
                            'message',
                            'ip_address',
                            'isactive'];
}
