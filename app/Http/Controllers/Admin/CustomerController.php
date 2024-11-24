<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Customer;
use App\Models\User;
use Closure;

class CustomerController extends Controller
{    
    public function index(Request $request)
    {
        $pageTitle = 'Customers';
        $actionButton = [
            'label' => 'Add New Customer',
            'modalTarget' => '#addCustomerModal', // Modal ID for triggering
            'url' => route('admin.customer.create'), // Use only for links
        ];

        if($request->ajax()) {
            $query = User::query()->select('id','name','email', 'role','created_at');

            // if ($request->filled('customer_name')) {
            //     $query->whereHas('customer', function ($q) use ($request) {
            //         $q->where('name', 'like', '%' . $request->customer_name . '%');
            //     });
            // }
        
            if ($request->filled('name')) {
                $query->where('name', $request->name);
            }
            
            return DataTables::of($query)
                ->addColumn('action', fn($row) => "Action")
                ->addColumn('created_at', fn($row) =>   _date($row->created_at, 'date_time'))
                ->make(true);
        }
        return view("admin.customer.index", compact('pageTitle', 'actionButton'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
