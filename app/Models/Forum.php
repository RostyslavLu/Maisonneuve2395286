<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'titre_en',
        'message',
        'message_en',
        'user_id',
        'category_id'];

    public function forumHasUser() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function forumHasCategory() {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}
