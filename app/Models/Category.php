<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'name_fr'
    ];

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
    public function categorySelect()
    {
        $lang = session()->get('localeDB');
        return $this::select('id',
            DB::raw("(CASE WHEN name$lang IS NULL THEN name ELSE name$lang END) as name")
        )->orderby('name')->get();

        // DB::raw("(CASE WHEN category$lang IS NULL THEN category ELSE category$lang END) as category")
        // )->orderby('category')->get();
    }
}
