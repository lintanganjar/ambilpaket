<?php

namespace App\Models\Scopes;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class MerchRequestScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::check()) { // in Development stage, for seeder
            $user = User::findOrFail(Auth::user()->id);
            switch ($user->role) {
                case 'Agen':
                    $customer = Customer::where('regency_id',$user['agen']->regency_id);
                    $customerId = $customer->pluck('id')->toArray();
                    if($customerId->count()>0){
                        $builder->whereIn('customer_id',$customerId);
                    }else Log::error('No request merch at the moment.');
                    break;

                case 'Admin':
                    $regency_id = $user['admin']['hubs']->regency_id;
                    $userId = Customer::where('regency_id', $regency_id)->pluck('user_id');// Get user id from customer
                    // dd($userId->toArray());
                    if(!$userId->isEmpty()){
                        $builder->whereIn('user_id',$userId);
                    }else Log::error('No request merch at the moment.');
                    break;
    
                case 'Customer':
                    $builder->where('customer_id', '=', $user['customer']->id);
                    break;

                default:
                    # do nothing
                    break;
            }
        }
    }
}
