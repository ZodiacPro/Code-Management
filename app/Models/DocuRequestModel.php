<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocuRequestModel extends Model
{
    use HasFactory;
    protected $table = 'docurequest';

    protected $primaryKey = 'docu_request_id';

    protected $fillable = [
        'request_date',
        'date_effectivity',
        'request_description',
        'user_id',
        'docu_id_code',
        'status',
        'filename',
     
    ];

    public $timestamps = false;
}
