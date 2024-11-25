@extends('admin.layout')
@section('title', 'Customer')

@section('content')
    <x-datatable.datatable 
        ajax-url="{{ route('admin.customer.index') }}" 
        :columns="[
            ['data' => 'id', 'name' => 'ID', 'placeholder' => 'Search by ID', 'orderable' => false, 'searchable' => false],
            ['data' => 'name', 'name' => 'Name', 'placeholder' => 'Search by Name'],
            ['data' => 'email', 'name' => 'Email', 'placeholder' => 'Search by Email','orderable' => false ],
            ['data' => 'role', 'name' => 'Role', 'placeholder' => 'Search by role'],
            ['data' => 'created_at', 'name' => 'Created At','placeholder' => 'Created At'],
            ['data' => 'action', 'name' => 'Action', 'placeholder' => 'Created At', 'orderable' => false, 'searchable' => false],
        ]"
        :pageTitle="$pageTitle"
        :actionButton="$actionButton"
    />
@endsection
