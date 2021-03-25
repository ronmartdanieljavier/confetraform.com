@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Submitted Forms</h1>
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
            List of Submitted Forms
            <button onclick="compareApplication()" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-icon-split btn-sm float-right">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-mail-bulk"></i>
                                        </span>
                <span class="text">Compare</span>
            </button>
        </div>
        <div class="card-body p-0">
            <!-- All students table-->
            <div class="table-responsive card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Form Name</th>
                        <th scope="col">Submitted By</th>
                        <th scope="col">Processed By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($form_list as $row_data)
                        <tr>
                            <td>
                                <div class="form-group form-check">
                                    <input name="application_id" type="checkbox" class="form-check-input" value="{{ $row_data->id }}">
                                </div>
                            </td>
                            <td>{{ $row_data->form_name }}</td>
                            <td>{{ $row_data->created_by }} | {{ $row_data->created_at }}</td>
                            <td>{{ $row_data->processed_by }} | {{ $row_data->processed_at }}</td>
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
                                <a href="{{ URL("/submitted-application-view/".$row_data->id) }}"
                                   class="btn btn-primary btn-icon btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            function compareApplication()
            {
                let yourArray = [];
                $("input:checkbox[name=application_id]:checked").each(function(){
                    yourArray.push($(this).val());
                });
                if(yourArray.length === 2) {

                    window.location = "compare-application-page?ids="+yourArray;
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please select only two application to compare',
                        icon: 'error'
                    })
                }

            }
        </script>
@endsection
