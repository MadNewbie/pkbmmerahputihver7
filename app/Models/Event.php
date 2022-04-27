<?php
namespace App\Models;

use App\Base\BaseModel;
use App\Traits\Backyard\Event\TraitIsPublic;

class Event extends BaseModel
{
    use TraitIsPublic;
    
    protected $table = 'events';

    protected $fillable = [
        'title',
        'content',
        'thumb_img',
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