<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    use HasFactory;
    
    protected $fillable=[nameResponsable,email ,adress,cpfCnpj,businessType,phone,webSite];
}
