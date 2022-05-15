<?php
namespace App\Traits\Backyard\Program;

use App\Lookups\Backyard\ProgramLookup;

trait TraitIsPublic
{
    public function getIsPublic()
    {
        return ProgramLookup::item(ProgramLookup::IS_PUBLIC, $this->isPublic);
    }

    public static function getIsPublicList()
    {
        return ProgramLookup::items(ProgramLookup::IS_PUBLIC);
    }

    public function isPublicYes()
    {
        return $this->isPublic == ProgramLookup::IS_PUBLIC_YES;
    }


    public function isPublicNo()
    {
        return $this->isPublic == ProgramLookup::IS_PUBLIC_NO;
    }

    public function getIsPublicBadge()
    {
        $class = '';
        switch ($this->isPublic) {
            case ProgramLookup::IS_PUBLIC_YES:
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