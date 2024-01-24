<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'titre_fr',
        'message',
        'message_fr',
        'user_id',
        'category_id'];

    public function forumHasUser() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function forumHasCategory() {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    public function forumSelect()
    {
        $lang = session()->get('localeDB');
        return $this::select('id',
            DB::raw("(CASE WHEN titre$lang IS NULL THEN titre ELSE titre$lang END) as titre"),
            DB::raw("(CASE WHEN message$lang IS NULL THEN message ELSE message$lang END) as message"),
            'created_at',
            'updated_at',
            'user_id',
            'category_id'
        )->orderby('titre')->get();
    }
}
