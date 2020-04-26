<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderService extends Model
{
    use SoftDeletes;

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

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('Y-m-d\TH:i', $value)->format('Y-m-d H:i:s');
    }

    public function setDateResolutionAttribute($value)
    {
        $this->attributes['date_resolution'] = Carbon::createFromFormat('Y-m-d\TH:i', $value)->format('Y-m-d H:i:s');
    }

    public function getDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    public function getDateResolutionAttribute($value)
    {
        $this->attributes['date_resolution'] = Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    public function getStatusServiceAttribute($value)
    {
        return self::STATUS_SERVICE[$value];
    }
}