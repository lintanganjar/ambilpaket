<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use LaravelEasyRepository\Implementations\Eloquent;

class UserRepositoryImplement extends Eloquent implements UserRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function createUserWithRole($dataUser,$role)
    {
        $user = new $this->model;
        $user->username = Str::lower($dataUser['first_name'].$dataUser['last_name']);
        $user->email = $dataUser['email'];
        $user->password = Hash::make($dataUser['password']);
        $user->role = $role;

        $user->save();

        return $user;
    }

    public function banUser($id,$reason)
    {
        $user = $this->model->find($id);
        $user->banned = true;
        $user->ban_reason = $reason['ban_reason'];

        $user->save();

        return $user;
    }

    public function unBanUser($id)
    {
        $user = $this->model->find($id);
        $user->banned = false;
        $user->ban_reason = null;

        $user->save();

        return $user;
    }

    public function getUserByRole(array $role, ?bool $count = false){
        $query = $this->model->query();
        if($role){
            $query = $this->model->whereIn('role', $role);
        }
        if($count){
            $query->selectRaw('role , COUNT(*) as count')->groupBy('role');
        }
        return $query->get();
    }
}
