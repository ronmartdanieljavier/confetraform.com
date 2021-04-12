@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Administrator Accounts</h1>
    </div>

    <!-- All students -->
    <div class="card mb-4">
        <div class="card-header">List of University Admin
            <button href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-icon-split btn-sm float-right">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-mail-bulk"></i>
                                        </span>
                <span class="text">Send Account Invitation</span>
            </button>
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
                        <th scope="col">University</th>
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
                            <td>{{ $row_data->university_name }}</td>
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
                                @if($row_data->status == 1)
                                    <a href="{{ URL::to("/deactivate-user/".$row_data->user_id) }}" class="btn btn-danger btn-sm">
                                        <span class="text">Inactive</span>
                                    </a>
                                @else
                                    <a href="{{ URL::to("/activate-user/".$row_data->user_id) }}" class="btn btn-success btn-sm">
                                        <span class="text">Active</span>
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
                        <h5 class="modal-title" id="exampleModalLabel">Invitation for University Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="send-invitation">
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
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="date_of_birth">Date Of Birth</label>
                                    <input type="text" name="date_of_birth" class="form-control" id="date_of_birth" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="student_number">Student Number</label>
                                    <input type="text" name="student_number" class="form-control" id="student_number" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="university_id">University</label>
                                    <select id="university_id" name="university_id" class="form-control" required>
                                        <option value="" selected>Choose...</option>
                                        @foreach($university_list as $row_data)
                                            <option value="{{ $row_data->university_id }}">{{ $row_data->university_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Invite</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

        <script type="text/javascript">


            $('#send-invitation').on('submit', function(event){
                event.preventDefault();

                $('#error-ul').html('');
                let email = $('#email').val();
                let first_name = $('#first_name').val();
                let last_name = $('#last_name').val();
                let date_of_birth = $('#date_of_birth').val();
                let student_number = $('#student_number').val();
                let contact_number = $('#contact_number').val();
                let university_id = $('#university_id').val();
                if(email === '') $('#error-ul').append('<li>Please provide a valid email address</li>');
                if(university_id === '') $('#error-ul').append('<li>Please provide a valid university</li>');
                if(first_name === '') $('#error-ul').append('<li>Please provide a valid first name</li>');
                if(last_name === '') $('#error-ul').append('<li>Please provide a valid last name</li>');
                if(date_of_birth === '') $('#error-ul').append('<li>Please provide a valid date of birth</li>');
                if(student_number === '') $('#error-ul').append('<li>Please provide a valid student or staff number</li>');
                if($('#error-ul').html() !== '') $('#error-div').show();
                else {
                    $.ajax({
                        url: "{{ URL::to('/send-uni-admin-invitation') }}",
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:{
                            email:email,
                            first_name:first_name,
                            last_name:last_name,
                            date_of_birth:date_of_birth,
                            student_number:student_number,
                            university_id:university_id,
                        },
                        success:function(response){
                            $('#error-div').hide();
                            if (response) {
                                $('#success-message').text(response.success);
                                $("#contact-form")[0].reset();
                                location.reload();
                            }
                        },
                        error: function(response) {
                            let error_list = response.responseJSON.errors;
                            for(data in error_list) {
                                $('#error-ul').append('<li>'+error_list[data][0]+'</li>');
                            }
                            if($('#error-ul').html() !== '') $('#error-div').show();
                        }
                    });
                }

            });
        </script>

@endsection
