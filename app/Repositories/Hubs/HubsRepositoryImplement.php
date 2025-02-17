<?php

namespace App\Repositories\Hubs;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Hubs;
use Illuminate\Support\Facades\Auth;

class HubsRepositoryImplement extends Eloquent implements HubsRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Hubs $model)
    {
        $this->model = $model;
    }

    public function getAllHubWithSearch($request)
    {
        $query =  $this->model->query();
        $user = Auth::user();
        if($user->role == 'Admin'){
            $query->where('id', $user->admin->hub_id);
        }
        if ($request->name) {
            $query->where('name',$request->name);
        }
        return $query->paginate(20);
    }

    public function getHubDetail($id)
    {
        return $this->model->where('id',$id)->first();
    }
}
