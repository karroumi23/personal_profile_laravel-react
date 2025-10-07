<?php

namespace App\Models;

use App\SectionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [ // can be filled using "create" fun
        'name',
        'type',
        'order',
    ];

    protected $casts = [ // Automatically casts the 'type' attribute to a SectionType enum
                         // Example: $section->type returns SectionType::HEADER
         'type' => SectionType::class,
    ];

    // Define relationship: one Section has many SectionFields
    public function fields()
    {
        // Links to the SectionField model using section_id foreign key
        // Allows: $section->fields to get all related fields
        return $this->hasMany(SectionField::class);
    }
}
