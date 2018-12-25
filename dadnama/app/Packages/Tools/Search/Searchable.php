<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 1/23/2017
 * Time: 11:19 AM
 */

namespace App\Packages\Tools\Search;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

trait Searchable
{

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearchable($query, Request $request)
    {


        if ($request->has('group')) {
            $group = trim($request->group);
            $term = $request->search;
            if ((string)$group === "0" or (string)$group === "all") {
                $query->where(function ($query) use ($term, $group) {
                    foreach ($query->getSearch() as $item) {
                        $argc = collect(explode('.', $item));
                        if (count($argc) > 1) {
                            $argv = $argc[1];
                            $query->orWhereHas($argc[0], function ($query) use ($term, $argv) {
                                $query->OrWhere($argv, 'like', '%' . $term . '%');
                            });
                        } else {
                            $query->OrWhere($item, 'like', '%' . $term . '%');
                        }
                    }
                });

            } else {
                $argc = collect(explode('.', $group));

                if (count($argc) > 1) {
                    $argv = $argc[1];
                    $query->whereHas($argc[0], function ($query) use ($term, $argv) {
                        $query->where($argv, 'like', '%' . $term . '%');
                    });
                } else {
                    $query->where($request->group, 'like', '%' . $request->search . '%');
                }
            }
        }
        return $query;
    }


    public function scopeGetSearch($query)
    {
        $model = $this;
        return $model->searchable;
    }


}