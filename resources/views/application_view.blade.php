@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-0 text-gray-800">{{ $form_name }}</h1>
    <p class="lead">
        {{ $form_description }}
    </p>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <form method="POST" action="{{ URL('submit-application') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="form_id" value="{{ $form_id }}">
            <div class="card mb-4">
                <div class="card-header">
                    Student Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Full Name:</label>
                            <span>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Contact Number:</label>
                            <span>{{ (auth()->user()->contact_number) }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email:</label>
                            <span>{{ (auth()->user()->email) }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Student ID:</label>
                            <span>{{ strtoupper(auth()->user()->student_number) }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Course:</label>
                            <span>{{ $course_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">University:</label>
                            <span>{{ $university_name }} | {{ $university_branch }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($form_detail_list as $row_details_data)
                <div class="card mb-4">
                    <div class="card-header">
                        {{ $row_details_data["form_section"] }}
                    </div>
                    <div class="card-body">
                        @foreach($row_details_data["field_section_detail_list"] as $field_section_detail_list)
                            <div class="mb-3">
                                <label for="{{ $field_section_detail_list["field_name"] }}" class="form-label">{{ $field_section_detail_list["field_label"] }}</label>
                                @switch($field_section_detail_list["field_type"])
                                    @case("TEXT")
                                    <input class="form-control" id="{{ $field_section_detail_list["field_name"] }}" name="{{ $field_section_detail_list["field_name"] }}" placeholder="" value="{{ $field_section_detail_list["field_value"] }}" {{ $field_section_detail_list["field_required"] ? 'required' : '' }} />
                                    @break
                                    @case("DATE")
                                    <input class="form-control" id="{{ $field_section_detail_list["field_name"] }}" name="{{ $field_section_detail_list["field_name"] }}" placeholder="" value="{{ $field_section_detail_list["field_value"] }}" {{ $field_section_detail_list["field_required"] ? 'required' : '' }}/>
                                    @break
                                    @case("TEXTAREA")
                                    <textarea class="form-control" id="{{ $field_section_detail_list["field_name"] }}" name="{{ $field_section_detail_list["field_name"] }}" rows="3" {{ $field_section_detail_list["field_required"] ? 'required' : '' }}>{{ $field_section_detail_list["field_value"] }}</textarea>
                                    @break
                                    @case("FILE")
                                    <input type="file" class="form-control-file" id="{{ $field_section_detail_list["field_name"] }}" name="{{ $field_section_detail_list["field_name"] }}" {{ $field_section_detail_list["field_required"] ? 'required' : '' }}/>
                                    @break
                                    @case("CHECKBOX")
                                    <input class="form-check-input" type="checkbox" value="{{ $field_section_detail_list["field_value"] }}" id="{{ $field_section_detail_list["field_name"] }}" name="{{ $field_section_detail_list["field_name"] }}" {{ $field_section_detail_list["field_required"] ? 'required' : '' }}/>
                                    @break
                                    @case("DECIMAL")
                                    <input class="form-control" id="{{ $field_section_detail_list["field_name"] }}" name="{{ $field_section_detail_list["field_name"] }}" placeholder="" value="{{ $field_section_detail_list["field_value"] }}" {{ $field_section_detail_list["field_required"] ? 'required' : '' }}/>
                                    @break
                                    @case("INTEGER")
                                    <input class="form-control" id="{{ $field_section_detail_list["field_name"] }}" name="{{ $field_section_detail_list["field_name"] }}" placeholder="" value="{{ $field_section_detail_list["field_value"] }}" {{ $field_section_detail_list["field_required"] ? 'required' : '' }}/>
                                    @break
                                    @case("EMAIL")
                                    <input type="email" class="form-control" id="{{ $field_section_detail_list["field_name"] }}" name="{{ $field_section_detail_list["field_name"] }}" placeholder="name@example.com" value="{{ $field_section_detail_list["field_value"] }}" {{ $field_section_detail_list["field_required"] ? 'required' : '' }}/>
                                    @break
                                @endswitch


                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <div class="card mb-4">
                <div class="card-header">
                    Application Cost Breakdown
                </div>
                <div class="card-body">
                    <input type="hidden" name="breakdownCount" id="breakdownCount" value="0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="text-right">Amount</th>
                            <th scope="col" class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody id="breakdownBody">
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-success btn-icon-split" type="button" onclick="addNewBreakdown()">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                            <span class="text">Add New Breakdown</span>
                        </button>
                    </div>
                </div>
            </div>
            <button class="btn btn-success mx-1" type="submit">Submit Application</button>
        </form>
    </div>

    <script>
        function addNewBreakdown() {
            let count = $("#breakdownCount").val();
            count++;

            let body_html = '<tr id="breakdownRow_'+count+'"><th scope="row">'+count+'</th><td><input class="form-control" id="breakdownTitle_'+count+'" name="breakdownTitle_'+count+'" placeholder="Accomodation/hotel/transpo/allowance/etc" value="" required></td><td><textarea class="form-control" id="breakdownDesc_'+count+'" name="breakdownDesc_'+count+'" placeholder="Further details" rows="3"></textarea></td> <td class="text-right"> <input class="form-control text-right" id="breakdownAmount_'+count+'" name="breakdownAmount_'+count+'" placeholder="0.00" value="" required> </td><td class="text-right"><button class="btn btn-danger btn-icon btn-sm" type="submit"><span class="icon text-white-50"><i class="fas fa-trash"></i></span></button></td></tr>';

            $("#breakdownBody").append(body_html);

            $("#breakdownCount").val(count);
        }
    </script>

@endsection
