<?php

namespace App\Models;

use App\Models\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Tenantable;

    protected $guarded = ['id'];

    protected $fillable = [
        'cod',
        'tenant_id',
        'nome',
        'slug',
        'descricao',
        'preco',
        'status'
    ];

    protected $hidden = [
        'tenant_id',
        'id',
        'status'
    ];
}
