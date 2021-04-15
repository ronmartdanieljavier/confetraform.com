@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($compare_list as $compare_data)
            <div class="col-6">
                @switch($compare_data["application_status_id"])
                    @case(1)
                    <div class="alert alert-warning" role="alert">
                        This Form is for Review
                    </div>
                    @break
                    @case(2)
                    <div class="alert alert-info" role="alert">
                        This Form is for Approval
                    </div>
                    @break
                    @case(3)
                    <div class="alert alert-success" role="alert">
                        THIS FORM HAS BEEN APPROVED
                    </div>
                    @break
                    @case(4)
                    <div class="alert alert-danger" role="alert">
                        THIS FORM HAS BEEN DISAPPROVED
                    </div>
                    @break
                    @case(5)
                    <div class="alert alert-info" role="alert">
                        This Form is draft
                    </div>
                    @break
                @endswitch
            <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="h3 mb-0 text-gray-800">{{ $compare_data["form_name"] }}</h1>
                        <p class="lead">
                            {{ $compare_data["form_description"] }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            @if($compare_data["application_status_id"] == "2")

                                <div class="col-md-6 text-right">
                                    <form method="POST" action="{{ URL('remove-approver') }}">
                                        @csrf
                                        <input type="hidden" name="formId" value="{{ $compare_data["form_id"] }}">
                                        <div class="form-group col-md-12">
                                            <label for="inputState">Approver</label> <br/>
                                            {{ $compare_data["approver_name"] }}
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-sm" name="action" value="Remove Approver"/>
                                    </form>
                                </div>
                            @endif
                            @if($compare_data["application_status_id"] == "1" OR $compare_data["application_status_id"] == "3" OR $compare_data["application_status_id"] == "4")
                                <div class="col-md-6 text-right assign_div" style="display: none">
                                    <form method="POST" action="{{ URL('save-approver') }}">
                                        @csrf
                                        <input type="hidden" name="formId" value="{{ $compare_data["form_id"] }}">
                                        <div class="form-group col-md-12">
                                            <label for="inputState">Approver</label>
                                            <select id="inputState" name="approver_id" class="form-control">
                                                <option selected>Choose approver</option>
                                                @foreach($compare_data["approver_list"] as $row_approver)
                                                    <option value="{{ $row_approver->id }}">{{ $row_approver->label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-sm" name="action" value="Save Approver"/>
                                        <input type="button" onclick="hideAssignDiv()" class="btn btn-primary btn-sm" name="action" value="Cancel"/>
                                    </form>
                                </div>
                                <div class="col-md-6 text-right processed_div">
                                    <form method="POST" action="{{ URL('process-submitted-form') }}">
                                        @csrf
                                        <input type="hidden" name="formId" value="{{ $compare_data["form_id"] }}">
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
                                            @if($compare_data["application_status_id"] == "1" OR $compare_data["application_status_id"] == "2")
                                                <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            @else
                                                Processed by: <strong>{{ $compare_data["processed_by"] }}</strong> <br/>
                                                <strong>{{ $compare_data["processed_at"] }}</strong> <br/>
                                                Comments: {{ $compare_data["processed_by_comment"] }}
                                            @endif
                                        </div>
                                        @if($compare_data["application_status_id"] == "1" OR $compare_data["application_status_id"] == "2")
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <input type="submit" class="btn btn-success" name="action" value="Approve"/>
                                                <input type="submit" class="btn btn-danger" name="action" value="Disapprove"/>

                                            </div>
                                            @if(auth()->user()->user_type_id==1)
                                                <input type="button" onclick="showAssignDiv()" class="btn btn-secondary" name="action" value="Assign Approver"/>
                                            @endif
                                        @else
                                            <input type="submit" class="btn btn-secondary btn-sm" name="action" value="Undo Status"/>
                                            <br/>
                                        @endif

                                    </form>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <table class="table">
                                    <thead>
                                    <tr class="table-secondary">
                                        <th colspan="2">Summary Cost</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($compare_data["application_status_id"] == "1" OR $compare_data["application_status_id"] == "2")
                                        <tr class="table-danger">
                                            <td>Cost</td>
                                            <td class="text-right"><span class="badge badge-primary text-right">${{ $compare_data["total_cost"] }}</span></td>
                                        </tr>
                                    @else
                                        <tr class="table-danger">
                                            <td>Cost</td>
                                            <td class="text-right"><span class="badge badge-primary text-right">${{ $compare_data["total_old_cost"] }}</span></td>
                                        </tr>
                                        <tr class="table-success">
                                            <td>Approved Cost</td>
                                            <td class="text-right"><span class="badge badge-primary">${{ $compare_data["total_cost"] }}</span></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
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
                <div>
                    <form method="POST" action="{{ URL('submit-application') }}">
                        @csrf
                        <input type="hidden" name="form_id" value="{{ $compare_data["form_id"] }}">
                        <div class="card mb-4">
                            <div class="card-header">
                                Student Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Full Name:</label>
                                        <span>{{ $compare_data["first_name"] }} {{ $compare_data["last_name"] }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Contact Number:</label>
                                        <span>{{ ($compare_data["contact_number"]) }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Email:</label>
                                        <span>{{ ($compare_data["email"]) }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Student ID:</label>
                                        <span>{{ strtoupper($compare_data["student_number"]) }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Course:</label>
                                        <span>{{ $compare_data["course_name"] }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">University:</label>
                                        <span>{{ $compare_data["university_name"] }} | {{ $compare_data["university_branch"] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($compare_data["applications_detail_list"] as $row_details_data)
                            <div class="card mb-4">
                                <div class="card-header">
                                    <strong>{{ $row_details_data["form_section"] }}</strong>
                                </div>
                                <div class="card-body">
                                    @foreach($row_details_data["field_section_detail_list"] as $field_section_detail_list)
                                        <div class="mb-3">
                                            @switch($field_section_detail_list["field_type"])
                                                @case("TEXTAREA")
                                                <label for="{{ $field_section_detail_list["field_name"] }}" class="form-label"><strong>{{ $field_section_detail_list["field_label"] }}: </strong></label>

                                                {{ $field_section_detail_list["field_value"] }}
                                                @break
                                                @case("FILE")
                                                <a href="{{ URL::to('/download/'.$field_section_detail_list["form_detail_id"]) }}">
                                                    {{ $field_section_detail_list["field_label"] }}
                                                </a>
                                                @break
                                                @default
                                                <label for="{{ $field_section_detail_list["field_name"] }}" class="form-label"><strong>{{ $field_section_detail_list["field_label"] }}: </strong></label>

                                                {{ $field_section_detail_list["field_value"] }}
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
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" class="text-right">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody id="breakdownBody">
                                    @foreach($compare_data["applications_breakdown_list"] as $row_data)
                                        <form method="POST" action="{{ URL('update-application-breakdown') }}">
                                            @csrf
                                            <tr>
                                                <td>{{ $row_data->cost_name }}</td>
                                                <td>{{ $row_data->cost_description }}</td>
                                                <td class="text-right">{{ $row_data->old_amount }}</td>
                                                <td class="text-right">
                                                    @if($compare_data["application_status_id"] == "1" OR $compare_data["application_status_id"] == "2")
                                                        <input class="form-control text-right" id="breakdownAmount_{{$row_data->id}}" name="breakdownAmount_{{$row_data->id}}" placeholder="0.00" value="{{ $row_data->new_amount }}" required>
                                                    @else
                                                        {{ $row_data->new_amount }}
                                                    @endif

                                                </td>
                                                @if($compare_data["application_status_id"] == "1" OR $compare_data["application_status_id"] == "2")
                                                    <td class="text-right">
                                                        <input type="hidden" name="breakdown_id" value="{{ $row_data->id }}">
                                                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                                                    </td>
                                                @endif

                                            </tr>
                                        </form>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function showAssignDiv() {
            $(".assign_div").show();
            $(".processed_div").hide();
        }
        function hideAssignDiv() {
            $(".assign_div").hide();
            $(".processed_div").show();
        }
    </script>
@endsection
