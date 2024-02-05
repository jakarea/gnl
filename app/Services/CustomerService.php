<?php

namespace App\Services;

use App\Models\Customer;


class CustomerService
{

    public function addCustomer($request)
    {
        $data     = $request->except(['avatar']);

        $customer = Customer::create($data);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = substr(md5(time()), 0, 10) . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('customers', $filename, 'public');
            $customer->update(['avatar' => 'storage/' . $avatarPath]);
        }
        return $customer;
    }
}
