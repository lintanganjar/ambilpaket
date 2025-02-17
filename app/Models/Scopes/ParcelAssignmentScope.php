<?php

namespace App\Models\Scopes;

use App\Models\User;
use App\Models\Parcels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class ParcelAssignmentScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::check()) { // in Development stage, for seeder
            $user = User::findOrFail(Auth::user()->id);
            switch ($user->role) {
                case 'Agen':
                    $parcel = Parcels::where('agen_id',$user['agen']->id)->get();
                    $parcelId = $parcel->pluck('id')->toArray();
                    if($parcelId->count()>0){
                        $builder->whereIn('parcel_id',$parcelId);
                    }else Log::error('No parcel IDs found for agen_id: ' . $user['agen']->id);
                    break;
    
                case 'Courier':
                    $builder->where('kurir_id',$user['couriers']->id);
                    break;
    
                case 'Customer':
                    $builder->whereHas('parcel', function ($query) use ($user) {
                        $query->whereHas('customer', function ($query) use ($user) {
                            $query->where('id', $user['customer']->id);
                        });
                    });
                    break;

                case 'UMKM':
                    $parcel = Parcels::where('customer_umkm_id',$user['customerUmkm']->id)->get();
                    $parcelId = $parcel->pluck('id')->toArray();
                    if (count($parcelId) > 0) {
                        $builder->whereIn('parcel_id',$parcelId);
                    }else Log::error('No parcel IDs found for customer_umkm_id: ' . $user['customerUmkm']->id);
                    break;
                    
                default:
                    # do nothing
                    break;
            }
        }
    }
}
