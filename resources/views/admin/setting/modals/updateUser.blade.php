
{{-- ADD NEW PRIZE MODAL --}}
<div class="modal fade" id="UpdateUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg p-9">
        <div class="modal-content modal-rounded">
            <div class="modal-header py-7 d-flex justify-content-between">
                <h2>New User</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="modal-body scroll-y m-3">
                <form action="{{ route('admin.updateUser') }}" method="POST">

                    <div class="card-body pt-">
                        <div class="w-100">
                            <div class="fv-row mb-10">
                                @csrf
                                <input type="hidden" name="userId" value="" id="userId">
                                <label class="form-label required">Name</label>
                                <input name="name" id="name" class="form-control form-control-lg form-control-solid" value="{{ old('name') }}" />
                                @if ($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="fv-row mb-10">
                                <label class="form-label required">Email</label>
                                <input name="email" id="email" value="{{ old('email') }}" type="email" class="form-control form-control-lg form-control-solid" />
                                @if ($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label required">Password</label>
                                <input name="password" type="password" value="{{old('password')}}" class="form-control form-control-lg form-control-solid" />
                                @if ($errors->has('password'))
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label mb-3">Role</label>
                                <select id="UserRole" class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" name="role">
                                    {{-- <option id="admin" value="admin">Admin</option>
                                    <option id="employee" value="employee">employee</option>                                     --}}
                                </select>
                                @if ($errors->has('role'))
                                <div class="text-danger">{{ $errors->first('role') }}</div>
                                @endif
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label mb-3">Organization</label>
                                <select id="Organization" class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="false" name="organization_id">

                                </select>
                                @if ($errors->has('organization_id'))
                                <div class="text-danger">{{ $errors->first('organization_id') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-lg btn-primary" data-kt-element="type-next">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
            <!--begin::Modal body-->
        </div>
    </div>
</div>
