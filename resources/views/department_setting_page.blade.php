@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">University Departments</h1>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- All students -->
    <div class="card mb-4">
        <div class="card-header">List of Department
            <button href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-icon-split btn-sm float-right">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                <span class="text">Add Department</span>
            </button>
        </div>
        <div class="card-body p-0">
            <!-- All students table-->
            <div class="table-responsive card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">Department Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @foreach($department_list as $row_data)
                        <tbody>
                            <tr>
                                <td>{{ $row_data['department_name'] }}</td>

                                <td>
                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample{{ $row_data['department_id'] }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <tbody class="collapse" id="collapseExample{{ $row_data['department_id'] }}">
                            <tr>
                                <td colspan="5">
                                    <form method="POST" action="{{ URL('edit-department') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $row_data['department_id'] }}" name="department_id">
                                        <div class="modal-body">
                                            <div class="alert alert-danger" id="error-div" style="display: none">
                                                <ul id="error-ul">
                                                </ul>
                                            </div>
                                            <div class="form-group">
                                                <b><span class="text-success" id="success-message"> </span></b>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="department_name">Department Name</label>
                                                    <input type="text" name="department_name" class="form-control" id="department_name" value="{{ $row_data['department_name'] }}" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ URL('add-department') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="alert alert-danger" id="error-div" style="display: none">
                                <ul id="error-ul">
                                </ul>
                            </div>
                            <div class="form-group">
                                <b><span class="text-success" id="success-message"> </span></b>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="department_name">Department Name</label>
                                    <input type="text" name="department_name" class="form-control" id="department_name" required>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
