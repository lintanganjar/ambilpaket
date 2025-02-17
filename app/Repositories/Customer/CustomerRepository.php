<?php

namespace App\Repositories\Customer;

use LaravelEasyRepository\Repository;

interface CustomerRepository extends Repository{

    public function getAllCustomerWithSearch($request);
    public function getCustomersByArea($area);
    public function getCustomerDetail($id);
    public function storeCustomerData($dataCustomer);
}
