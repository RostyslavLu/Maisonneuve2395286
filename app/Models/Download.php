<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'file',
        'user_id',
    ];
    public function downloadHasUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
