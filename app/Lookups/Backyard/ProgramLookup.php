<?php
namespace App\Lookups\Backyard;

use App\Base\BaseLookup;

class ProgramLookup extends BaseLookup
{
    const IS_PUBLIC = 'isPublic';

    const IS_PUBLIC_NO = 100;
    const IS_PUBLIC_YES = 200;

    public static function getItems()
    {
        return [
            self::IS_PUBLIC => [
                self::IS_PUBLIC_NO => 'Belum Dipublikasi',
                self::IS_PUBLIC_YES => 'Sudah Dipublikasi',
            ],
        ];
    }
}