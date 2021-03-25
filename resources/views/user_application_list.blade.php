@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Submitted Applications</h1>
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
        <div class="card-header">
            Your Applications
        </div>
        <div class="card-body p-0">
            <!-- All students table-->
            <div class="table-responsive card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">Form Name</th>
                        <th scope="col">Form Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($form_list as $row_data)
                        <tr>
                            <td>{{ $row_data->form_name }}</td>
                            <td>{{ $row_data->form_description }}</td>
                            <td>
                                @switch($row_data->application_status_id)
                                    @case(1)
                                        <span class="badge badge-warning">For Review</span>
                                    @break
                                    @case(2)
                                        <span class="badge badge-warning">For Approval</span>
                                    @break
                                    @case(3)
                                        <span class="badge badge-success">Approved</span>
                                    @break
                                    @case(4)
                                        <span class="badge badge-danger">Disapproved</span>
                                    @break
                                    @case(5)
                                    <span class="badge badge-info">Draft</span>
                                    @break
                                @endswitch
                            </td>
                            <td>
                                <form method="POST" action="{{ URL('/delete-application/'.$row_data->id) }}">
                                    @csrf
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ URL("/view-application/".$row_data->id) }}"
                                           class="btn btn-primary btn-icon btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        </a>
                                        @if($row_data->application_status_id != 3)
                                            <button type="submit" class="btn btn-danger btn-icon btn-sm">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                        @endif
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection
