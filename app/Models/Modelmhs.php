<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Modelmhs extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'mhsnim';
    public $timestamps = true;

    public $sortable = [
        'mhsnim','mhsnama','mhstelp','mhsalamat',
    ];
}
