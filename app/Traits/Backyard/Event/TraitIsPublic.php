<?php
namespace App\Traits\Backyard\Event;

use App\Lookups\Backyard\EventLookup;

trait TraitIsPublic
{
    public function getIsPublic()
    {
        return EventLookup::item(EventLookup::IS_PUBLIC, $this->isPublic);
    }

    public static function getIsPublicList()
    {
        return EventLookup::items(EventLookup::IS_PUBLIC);
    }

    public function isPublicYes()
    {
        return $this->isPublic == EventLookup::IS_PUBLIC_YES;
    }


    public function isPublicNo()
    {
        return $this->isPublic == EventLookup::IS_PUBLIC_NO;
    }

    public function getIsPublicBadge()
    {
        $class = '';
        switch ($this->isPublic) {
            case EventLookup::IS_PUBLIC_YES:
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