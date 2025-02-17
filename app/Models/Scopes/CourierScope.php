<?php

namespace App\Models\Scopes;

use App\Models\Area;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class CourierScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::check()) {
            $user = User::findOrFail(Auth::user()->id);
            switch ($user->role) {
                case 'Agen':
                    $area = Area::where('regency_id',$user['agen']->regency_id)->first();
                    $builder->where('area_id', '=', $area['id']);
                    break;
                case 'Admin':
                    $area = Area::where('regency_id',$user['admin']['hubs']->regency_id)->first();
                    $builder->where('area_id', '=', $area['id']);
                    break;
                case 'Customer':
                    $area = Area::where('regency_id',$user['customer']->regency_id)->first();
                    $builder->where('area_id', '=', $area['id']);
                    break;
                case 'UMKM':
                    $area = Area::where('regency_id',$user['customerUmkm']->regency_id)->first();
                    $builder->where('area_id', '=', $area['id']);
                    break;
                // case 'Courier':
                //     $builder->where('area_id', '=', $user['couriers']->area_id);
                //     break;
                default:
                    # do nothing
                    break;
            }
        }
    }
}
