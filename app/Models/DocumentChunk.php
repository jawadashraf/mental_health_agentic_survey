<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentChunk extends Model
{
    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'sqlite_vector';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'source_file',
        'section_heading',
        'content',
        'embedding',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'embedding' => 'array',
        ];
    }
}
