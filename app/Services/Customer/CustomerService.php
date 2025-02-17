<?php

namespace App\Services\Customer;

use LaravelEasyRepository\BaseService;

interface CustomerService extends BaseService{

    public function getAllCustomerWithSearch($request);
  public function getCustomersInSameArea($adminHubArea);
    public function getCustomerDetail($id);
    public function storeCustomerData($dataCustomer);
    public function updateCustomerData($id,$data);
}
