<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Customer;
use App\Model\admin\Product;
use App\Model\admin\PaymentInfo;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Input;


class FormWizardController extends Controller
{
    //
    public function index()
    {
        $tbl_data = DB::table('customers')
            ->select(
                'customers.id as cid',
                'customers.name',
                'customers.email',
                'customers.mobile_no',
                'customers.country',
                'customers.state',
                'customers.city',
                'payment_info.id as pid',
                'payment_info.qty',
                'payment_info.payment_mode',
                'payment_info.main_amt',
                'products.product_name',
                'products.id as product_id'
            )
            ->leftjoin('payment_info', 'customers.id', '=', 'payment_info.customer_id')
            ->leftjoin('products', 'payment_info.product_id', '=', 'products.id')
            ->orderBy('customers.id', 'desc')
            ->paginate(5);
        // dd($tbl_data);

        $product_data = DB::table('products')->get();
        // dd($product_data);
        return view('admin_panel.formwizard', compact('tbl_data', 'product_data'));
    }
    public function index2()
    {
        # code...
        $product_data = DB::table('products')->get();
        // dd($product_data);
        return view('admin_panel.formwizard2', compact('product_data'));
    }
    public function add(Request $request)
    {
        /* echo "<pre>";
        print_r($request->all());
        die; */
        $this->validate($request, [
            // 'name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u|min:3|max:35',
            'name' => 'required|regex:/^[A-Za-z\s]+$/|min:3|max:35',
            'email' => 'required|email|unique:customers,email', //first give tbl name then colname
            'mobile_no' => 'required|numeric|regex:"[0-9\-\(\)\s]+"|unique:customers,mobile_no',
            'country' => 'required|alpha|max:10|regex:/^[A-Za-z\s]+$/',
            'state' => 'required|alpha|max:20|regex:/^[A-Za-z\s]+$/',
            'city' => 'required|alpha|max:20|regex:/^[A-Za-z\s]+$/',
            'product' => 'required',
            'quantity' => 'required|numeric|max:10|min:1',
            'payment_mode' => 'required',
        ]);


        $customer_data = [];
        $customer_data['name'] = $request->name;
        $customer_data['email'] = $request->email;
        $customer_data['mobile_no'] = $request->mobile_no;
        $customer_data['country'] = $request->country;
        $customer_data['state'] = $request->state;
        $customer_data['city'] = $request->city;
        $result_cust = Customer::create($customer_data);
        if ($result_cust) {

            $paymt_info_data = [];
            $paymt_info_data['customer_id'] = $result_cust->id;
            $paymt_info_data['product_id'] = $request->product;
            $paymt_info_data['qty'] = $request->quantity;
            $paymt_info_data['main_amt'] = $request->amt;
            $paymt_info_data['payment_mode'] = $request->payment_mode;
            $paymt_info_data['paypal_id'] = $request->paypal_id;
            $paymt_info_data['cardNumber'] = $request->cardNumber;
            $paymt_info_data['month'] = $request->month;
            $paymt_info_data['year'] = $request->year;
            $paymt_info_data['cvv'] = $request->cvv;
            // dd($paymt_info_data);
            $result = PaymentInfo::create($paymt_info_data);
            // die;
            if ($result) {
                return redirect('admin/form_wizard')
                    ->with('success', 'Added  successfully!');
            } else {
                return redirect('admin/form_wizard')
                    ->with('error', 'Failed to insert!');
            }
        } else {
            return redirect('admin/form_wizard')
                ->with('error', 'Failed to insert!');
        }

        // return view('admin_panel.formwizard');
    }
}