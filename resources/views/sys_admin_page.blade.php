@extends('layouts.app')

@section('content')
    <!-- Custom styles for this page -->


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">System Administrator Accounts</h1>

    </div>

    <!-- All students -->
    <div class="card mb-4">
        <div class="card-header">List of System Admin
{{--            <button href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-icon-split btn-sm float-right">--}}
{{--                                        <span class="icon text-white-50">--}}
{{--                                            <i class="fas fa-user"></i>--}}
{{--                                        </span>--}}
{{--                <span class="text">Add Admin User</span>--}}
{{--            </button>--}}
        </div>
        <div class="card-body p-0">
            <!-- All students table-->
            <div class="table-responsive card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user_list as $row_data)
                        <tr>
                            <td>{{ $row_data->first_name }}</td>
                            <td>{{ $row_data->last_name }}</td>
                            <td>{{ $row_data->email }}</td>
                            <td>{{ $row_data->date_of_birth }}</td>
                            <td>
                                @if($row_data->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                                @if($row_data->email_verified_at)
                                    <span class="badge badge-success">Verified</span>
                                @else
                                    <span class="badge badge-warning">Not Verified</span>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    <span class="text">View</span>
                                </a>


                                @if($row_data->status == 1)
                                    <a href="#" class="btn btn-danger btn-sm">
                                        <span class="text">Deactivate</span>
                                    </a>
                                @else
                                    <a href="#" class="btn btn-success btn-sm">
                                        <span class="text">Activate</span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add System Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send Invite</button>
                    </div>
                </div>
            </div>
        </div>

@endsection
