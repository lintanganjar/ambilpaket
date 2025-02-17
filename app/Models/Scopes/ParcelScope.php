<?php

namespace App\Models\Scopes;

use App\Models\User;
use App\Models\ParcelAssignment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class ParcelScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::check()) { // in Development stage, for seeder
            $user = User::findOrFail(Auth::user()->id);
            switch ($user->role) {
                case 'Agen':
                    $builder->where('agen_id', '=', $user['agen']->id);
                    break;
    
                case 'Courier':
                    $parcelAssignment = ParcelAssignment::where('kurir_id',$user['couriers']->id)->get();
                    $parcelId = $parcelAssignment->pluck('parcel_id')->toArray();
                    if($parcelAssignment->count()>0){
                        $builder->whereIn('id',$parcelId);
                    }else Log::error('No parcel IDs found for kurir_id: ' . $user['couriers']->id);
                    break;
    
                case 'Customer':
                    $builder->where('customer_id', '=', $user['customer']->id);
                    break;

                case 'UMKM':
                    $builder->where('customer_umkm_id', '=', $user['customerUmkm']->id);
                    break;
                    
                default:
                    # do nothing
                    break;
            }
        }
    }
}
