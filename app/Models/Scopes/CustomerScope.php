<?php

namespace App\Models\Scopes;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class CustomerScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::check()) { // in Development stage, for seeder
            $user = User::findOrFail(Auth::user()->id);
            switch ($user->role) {
                case 'Agen':
                    $builder->where('regency_id', '=', $user['agen']->regency_id);
                    break;
                case 'Admin':
                    $builder->where('regency_id',$user['admin']['hubs']->regency_id);
                    break;
                default:
                    # do nothing
                    break;
            }
        }
    }
}
