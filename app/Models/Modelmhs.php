<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelmhs extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'mhsnim';
    public $timestamps = true;
}
