<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionField extends Model
{
    use HasFactory;
    protected $fillable = [
         'section_id',
         'field_name',
         'field_name',
    ];

    //This defines an inverse relationship — it tells Laravel that:
    //Each SectionField belongs to one Section.
    public function section()
    {
       return $this->belongsTo(Section::class);
    }
}
