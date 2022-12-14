<?php

namespace App\Models;

use App\Models\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Tenantable;

    protected $guarded = ['id'];
    protected $table = 'events';

    protected $fillable = [
        'cod',
        'tenant_id',
        'nome',
        'slug',
        'descricao',
        'schedule',
        'status'
    ];

    protected $hidden = [
        'tenant_id',
        'id',
        'status'
    ];
}
