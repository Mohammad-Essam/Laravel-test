<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//TODO: remove this xss hunting after making another webserver specified in this
class XssRequest extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'xss_requests';
}
