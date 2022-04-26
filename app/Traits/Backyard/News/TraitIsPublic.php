<?php
namespace App\Traits\Backyard\News;

use App\Lookups\Backyard\NewsLookup;

trait TraitIsPublic
{
    public function getIsPublic()
    {
        return NewsLookup::item(NewsLookup::IS_PUBLIC, $this->isPublic);
    }

    public static function getIsPublicList()
    {
        return NewsLookup::items(NewsLookup::IS_PUBLIC);
    }

    public function isPublicYes()
    {
        return $this->isPublic == NewsLookup::IS_PUBLIC_YES;
    }


    public function isPublicNo()
    {
        return $this->isPublic == NewsLookup::IS_PUBLIC_NO;
    }

    public function getIsPublicBadge()
    {
        $class = '';
        switch ($this->isPublic) {
            case NewsLookup::IS_PUBLIC_YES:
                $class = 'success';
                break;
            
            default:
                $class = 'warning';
                break;
        }

        return sprintf(
            '<span class="badge badge-%s">%s</span>',
            $class,
            $this->getIsPublic()
        );
    }
}