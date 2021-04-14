@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Universities</h1>
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
        <div class="card-header">List of Universities
            <button href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-icon-split btn-sm float-right">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                <span class="text">Add University</span>
            </button>
        </div>
        <div class="card-body p-0">
            <!-- All students table-->
            <div class="table-responsive card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">University Code</th>
                        <th scope="col">University Name</th>
                        <th scope="col">University Branch</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @foreach($university_list as $row_data)
                        <tbody>
                            <tr>
                                <td>{{ $row_data['university_code'] }}</td>
                                <td>{{ $row_data['university_name'] }}</td>
                                <td>{{ $row_data['university_branch'] }}</td>
                                <td>
                                    @if($row_data['status'] == "1")
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample{{ $row_data['university_id'] }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Edit
                                    </a>
                                    @if($row_data['status'])
                                        <a href="{{ URL::to("/deactivate-university/".$row_data['university_id']) }}" class="btn btn-danger btn-sm">
                                            <span class="text">Inactive</span>
                                        </a>
                                    @else
                                        <a href="{{ URL::to("/activate-university/".$row_data['university_id']) }}" class="btn btn-success btn-sm">
                                            <span class="text">Active</span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        <tbody class="collapse" id="collapseExample{{ $row_data['university_id'] }}">
                            <tr>
                                <td colspan="5">
                                    <form method="POST" action="{{ URL('edit-university') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $row_data['university_id'] }}" name="university_id">
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
                                                    <label for="university_code">University Code</label><br/>
                                                    {{ $row_data['university_code'] }}
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="university_name">University Name</label>
                                                    <input type="text" name="university_name" class="form-control" id="university_name" value="{{ $row_data['university_name'] }}" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="university_branch">University Branch</label>
                                                    <input type="text" name="university_branch" class="form-control" id="university_branch" value="{{ $row_data['university_branch'] }}" required>
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
                        <h5 class="modal-title" id="exampleModalLabel">Add University</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ URL('add-university') }}">
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
                                    <label for="university_code">University Code</label>
                                    <input type="text" name="university_code" class="form-control" id="university_code" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="university_name">University Name</label>
                                    <input type="text" name="university_name" class="form-control" id="university_name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="university_branch">University Branch</label>
                                    <input type="text" name="university_branch" class="form-control" id="university_branch" required>
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
