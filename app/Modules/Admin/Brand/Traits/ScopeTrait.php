<?php

namespace App\Modules\Admin\Brand\Traits;

/**
 * @ScopeTrait
 */
trait ScopeTrait
{
    /**
     * @param $query
     * @param $request
     *
     * @return mixed
     */
    public function scopeSearch($query, $request): mixed
    {
        return $query->when(
            !empty($request->key_search),
            function ($q) use ($request) {
                $q->where('name', 'like', '%'.escapeLike($request->key_search).'%');
            }
        )->when(
            isset($request->status),
            function ($q) use ($request) {
                $q->where('status', $request->status);
            }
        )->when(
            !empty($request->start_date) || !empty($request->end_date),
            function ($q) use ($request) {
                if (!empty($request->start_date) && !empty($request->end_date)) {
                    $q->whereBetween('created_at', [convertDateToDateTime($request->start_date), convertDateToDateTime($request->end_date)]);
                } elseif (!empty($request->start_date)) {
                    $q->where('created_at', '>=', convertDateToDateTime($request->start_date));
                } elseif (!empty($request->end_date)) {
                    $q->where('created_at', '<=', convertDateToDateTime($request->end_date));
                }
            }
        );
    }
}
