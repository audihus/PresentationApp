<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTutorial extends Model
{
    protected $fillable = [
        'master_tutorial_id',
        'text',
        'gambar',
        'code',
        'url',
        'order',
        'status',
    ];

    public function master()
    {
        return $this->belongsTo(MasterTutorial::class, 'master_tutorial_id');
    }
}
