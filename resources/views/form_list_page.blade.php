@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Form</h1>
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
        <div class="card-header">List of Forms
            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-icon-split btn-sm float-right">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                <span class="text">New Form Template</span>
            </button>
        </div>
        <div class="card-body p-0">
            <!-- All students table-->
            <div class="table-responsive card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">Form Name</th>
                        <th scope="col">Form Description</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Updated By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($form_list as $row_data)
                        <tr>
                            <td>{{ $row_data->form_name }}</td>
                            <td>{{ $row_data->form_description }}</td>
                            <td>{{ $row_data->created_by }} | {{ $row_data->created_at }}</td>
                            <td>{{ $row_data->updated_by }} | {{ $row_data->updated_at }}</td>
                            <td>
                                {{ $row_data->status_name }}
                            </td>
                            <td>
                                <form method="POST" action="{{ URL('/delete-form-template/'.$row_data->id) }}">
                                    @csrf
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ URL("/view-form/".$row_data->id) }}"
                                           class="btn btn-primary btn-icon btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-icon btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        </button>
                                    </div>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Form Template</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ URL('save-form-template') }}">
                        @csrf
                        <input type="hidden" name="formId" value="0">
                        <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="formName">Form Name</label>
                                        <input class="form-control" name="formName" id="formName">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="formDescription">Form Description</label>
                                        <input class="form-control" name="formDescription" id="formDescription">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-success mx-1 btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text">Save</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
