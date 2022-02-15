<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * @SWG\Definition(
 *  definition="Post",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="title",
 *      type="string"
 *  ),
 *  @SWG\Property(
 *      property="text",
 *      type="string"
 *  )
 * )
 */

class NoteBook extends Model
{
    protected $fillable=['fio', 'company', 'telephone', 'email', 'bath_day', 'photo'];
}
