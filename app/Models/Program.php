<?php
namespace App\Models;

use App\Base\BaseModel;
use App\Traits\Backyard\Program\TraitIsPublic;

class Program extends BaseModel
{
    use TraitIsPublic;

    protected $table = 'programs';

    protected $fillable = [
        'title',
        'description',
        'thumb_img',
        'materi_path',
        'schedule_path',
        'isPublic',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}