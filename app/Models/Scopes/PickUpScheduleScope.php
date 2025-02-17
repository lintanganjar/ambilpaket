<?php

namespace App\Models\Scopes;

use App\Models\Agen;
use App\Models\User;
use App\Models\PickUpSchedule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

use function PHPUnit\Framework\isEmpty;

class PickUpScheduleScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::check()) { // in Development stage, for seeder
            $user = User::findOrFail(Auth::user()->id);
            switch ($user->role) {
                case 'Agen':
                    $builder->where('agen_id', '=', $user['agen']->id);
                    break;

                case 'Admin':
                    // get all agens, agens has scope for regency admin
                    $agens = Agen::all()->pluck('id');
                    if (!$agens->isEmpty()){
                        $builder->whereIn('agen_id',$agens);
                    }else{
                        Log::error('No parcel IDs found for admin_id: ' . $user['admin']->id);
                    }
                    break;
                case 'UMKM':
                    $builder->where('customer_umkm_id',$user['customerUmkm']->id);
                    break;
                default:
                    # do nothing
                    break;
            }
        }
    }
}
