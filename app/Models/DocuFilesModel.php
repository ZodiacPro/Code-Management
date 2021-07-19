<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DocuRequestModel;

class DocuFilesModel extends Model
{
    use HasFactory;

    protected $table = 'docufiles';

    protected $primaryKey = 'docu_id_code';

    protected $fillable = [
        'docu_id_code',
        'filename',
        'docu_title',
        'date_uploaded',
        'token_status',
     
    ];

    public $timestamps = false;
    public $incrementing = false;

    
    public function doculogs()
    {
        return $this->hasMany(DocuRequestModel::class, 'docu_id_code');
    }
    
}
