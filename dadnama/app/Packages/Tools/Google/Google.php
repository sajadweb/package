<?php

namespace App\Packages\Tools\Google;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
trait Google
{

    public function scopeDistance($query, $lat, $lng,$distance=2)
    {
        $row = "( " .
            "6371 * " .
            "acos( " .
            "cos( radians($lat) ) * " .
            "cos( radians( lat ) ) * " .
            "cos( " .
            "radians( lng ) - radians($lng)" .
            ") + " .
            "sin( radians($lat) ) * " .
            "sin( radians( lat ) ) " .
            ")" .
            ")";
        return $query
            ->addSelect(DB::raw(" *,$row as distance"))
            ->where(DB::raw($row), '<', $distance)
            ->orderBy('distance', 'ASC');
    }
}