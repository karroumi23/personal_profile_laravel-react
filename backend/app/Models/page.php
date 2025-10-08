<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'is_published',
    ];

    //One Page can have many Sections,and one Section can belong to many Pages.
    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

}
