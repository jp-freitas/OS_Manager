<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    const STATUS_SERVICE = [
        1 => 'Aberta',
        2 => 'Em Analise',
        3 => 'Concluída',
        4 => 'Atendimento Local',
        5 => 'Atendimento Remoto'
    ];

    protected $fillable = [
        'requester',
        'department',
        'date',
        'contact',
        'reason',
        'soluction',
        'technician',
        'date_resolution',
        'status_service'
    ];

    protected $dates = [
        'date',
        'date_resolution'
    ];

    public function getStatusServiceAttribute($value)
    {
        return self::STATUS_SERVICE[$value];
    }
}