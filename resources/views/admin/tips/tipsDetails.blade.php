@extends('admin.layout')
@section('title', 'Donation Details')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
     <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                             Tips</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted"> Tips Details</li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center gap-2 gap-lg-3">

                    </div>
                </div>
            </div>
    <div class="d-flex flex-column flex-column-fluid">


        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                    <li class="breadcrumb-item text-muted">
                                        {{-- <h3>Yingerman User</h3>{{  ?? 'No Title Available' }} --}}
                                    </li>
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                     
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <tbody class="fw-semibold text-gray-600 donation_body">
                               
                               
                                <tr>
                                    <td><b>Comments</b></td>
                                    <td class="text-start">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Paid By</b></td>
                                    <td class="text-start">
                                        
                                    </td>
                                </tr>
                              
                               
                              
                                <tr>
                                    <td><b>Transaction Card Type</b></td>
                                    <td class="text-start"></td>
                                </tr>
                                <tr>
                                    <td><b>Transaction Card Expiry (mm/yy)</b></td>
                                    <td class="text-start"></td>
                                </tr>

                                <tr>
                                    <td><b>Payment Reference ID</b></td>
                                    <td class="text-start"></td>
                                </tr>
                                <tr>
                                    <td><b>Referrer Name</b></td>
                                    <td class="text-start"></td>
                                </tr>
                                <tr>
                                    <td><b>Referrer Link</b></td>
                                    <td class="text-start"></td>
                                </tr>
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
 

    </div>
</div>

 



@endsection
