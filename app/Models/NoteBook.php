<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 *
 */
class NoteBook extends Model
{

    public $table = 'note_books';
    



    public $fillable = [
        'name',
        'name',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'name' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
