@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Template</h1>
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
{{--        --}}

        <form method="POST" action="{{ URL('save-form-template') }}">
            @csrf
            <input type="hidden" name="formId" value="{{ $form_id }}">
            <div class="card-body">
                <div class="form-group">
                    <label for="formName">Form Name</label>
                    <input type="text" name="formName" class="form-control" id="formName" placeholder="" value="{{ $form_name }}" required>
                </div>
                <div class="form-group">
                    <label for="formDescription">Form Description</label>
                    <input type="text" name="formDescription" class="form-control" id="formDescription" placeholder="" value="{{ $form_description }}" required>
                </div>
                <button class="btn btn-success mx-1 btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                    <span class="text">Save Template</span>
                </button>

            </div>
        </form>
        <div class="card-header">
            Form Section Details
            <button class="btn btn-success btn-icon-split float-right" type="button" onclick="openSectionModal()">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                <span class="text">Add New Section</span>
            </button>
        </div>
        @foreach($form_detail_list as $row_details_data)
            <div class="card-body">
                <div class="form-group">
                    <form method="POST" action="{{ URL('delete-form-section') }}">
                        @csrf
                        <input type="hidden" name="sectionId" value="{{ $row_details_data["form_section_id"] }}">

                        <button class="btn btn-danger btn-icon-split btn-sm" type="submit">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                            <span class="text">Delete Section</span>
                        </button>
                    </form>
                    <br/>
                    <form method="POST" action="{{ URL('save-form-section') }}">
                        @csrf
                        <label for="SectionName">Section Name</label>
                        <div class="input-group mb-3">
                            <input type="hidden" name="formId" value="{{ $form_id }}">
                            <input type="hidden" name="sectionId" value="{{ $row_details_data["form_section_id"] }}">
                            <input type="text" class="form-control" id="SectionName" name="sectionName" placeholder="" value="{{ $row_details_data["form_section"] }}">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success mx-1 btn-icon-split" type="submit">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Save</span>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Field Label</th>
                        <th scope="col">Field Type</th>
                        <th scope="col">Default Value</th>
                        <th scope="col" class="text-center">Required</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($row_details_data["field_section_detail_list"] as $field_section_detail_list)
                        <tr>
                            <td>
                                <input type="hidden" name="formDetailId{{ $field_section_detail_list["form_detail_id"] }}" id="formDetailId{{ $field_section_detail_list["form_detail_id"] }}" value="{{ $field_section_detail_list["form_detail_id"] }}">
                                <input type="hidden" name="formDetailLabel{{ $field_section_detail_list["form_detail_id"] }}" id="formDetailLabel{{ $field_section_detail_list["form_detail_id"] }}" value="{{ $field_section_detail_list["field_label"] }}">
                                <input type="hidden" name="formDetailType{{ $field_section_detail_list["form_detail_id"] }}" id="formDetailType{{ $field_section_detail_list["form_detail_id"] }}" value="{{ $field_section_detail_list["field_type"] }}">
                                <input type="hidden" name="formDetailValue{{ $field_section_detail_list["form_detail_id"] }}" id="formDetailValue{{ $field_section_detail_list["form_detail_id"] }}" value="{{ $field_section_detail_list["field_value"] }}">
                                <input type="hidden" name="formDetailRequired{{ $field_section_detail_list["form_detail_id"] }}" id="formDetailRequired{{ $field_section_detail_list["form_detail_id"] }}" value="{{ $field_section_detail_list["field_required"] }}">
                                {{ $field_section_detail_list["field_label"] }}
                            </td>
                            <td>
                                {{ $field_section_detail_list["field_type"] }}
                            </td>
                            <td>
                                {{ $field_section_detail_list["field_value"] }}
                            </td>
                            <td class="text-center">
                                {{ $field_section_detail_list["field_required"] ? 'REQUIRED' : '' }}
                            </td>
                            <td class="text-right">
                                <form method="POST" action="{{ URL('delete-form-detail/'.$field_section_detail_list["form_detail_id"]) }}">
                                    @csrf
                                    <button type="button" class="btn btn-primary btn-sm" onclick="openFieldModal({{ $row_details_data["form_section_id"] }},{{ $field_section_detail_list["form_detail_id"] }})" data-id="{{ $field_section_detail_list["form_detail_id"] }}">Edit</button>

                                    <button class="btn btn-danger btn-icon btn-sm" type="submit">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button class="btn btn-success btn-icon-split" type="button" onclick="openFieldModal({{ $row_details_data["form_section_id"] }},'0')">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                        <span class="text">Add New Field</span>
                    </button>
                </div>
                <br/>
            </div>
        @endforeach

    </div>

    <!-- Modal -->
    <div class="modal fade" id="saveSectionFieldModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Section Field</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ URL('save-form-section-detail') }}">
                    @csrf
                <div class="modal-body">
                    <input type="hidden" name="formId" value="{{ $form_id }}">
                    <input type="hidden" name="fieldId" id="fieldId">
                    <input type="hidden" name="sectionId" id="sectionId">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="fieldLabel">Field Label</label>
                            <input type="text" class="form-control" id="fieldLabel" name="fieldLabel" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="fieldType">Field Type</label>
                            <select id="fieldType" name="fieldType" class="form-control form-select" aria-label="Default select example" required>
                                <option selected></option>
                                <option value="TEXT">TEXT</option>
                                <option value="DATE">DATE</option>
                                <option value="TEXTAREA">TEXTAREA</option>
                                <option value="FILE">FILE</option>
                                <option value="CHECKBOX">CHECKBOX</option>
                                <option value="EMAIL">EMAIL</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="fieldValue">Default Value</label>
                            <input type="text" class="form-control" name="fieldValue" id="fieldValue" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="REQUIRED" id="fieldRequired" name="fieldRequired">
                            <label class="form-check-label" for="fieldRequired">
                                Required
                            </label>
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
    <!-- Modal -->
    <div class="modal fade" id="saveSectionModal" tabindex="-1" role="dialog" aria-labelledby="saveSectionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ URL('save-form-section') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="formId" value="{{ $form_id }}">
                        <input type="hidden" name="sectionId" id="sectionId" value="0">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="sectionName">Section Label</label>
                                <input type="text" class="form-control" id="sectionName" name="sectionName" placeholder="" required>
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

    <script>
        function openFieldModal(section_id, field_id){

            var myModal = new bootstrap.Modal(document.getElementById('saveSectionFieldModal'), {
                keyboard: false
            });
            if(field_id !== "0") {
                var detail_id = field_id;
                let formDetailLabel = $("#formDetailLabel"+detail_id).val();
                let formDetailValue = $("#formDetailValue"+detail_id).val();
                let formDetailType = $("#formDetailType"+detail_id).val();
                let formDetailRequired = $("#formDetailRequired"+detail_id).val();
                if(formDetailRequired === "1") {
                    document.getElementById("fieldRequired").checked = true;
                } else {
                    document.getElementById("fieldRequired").checked = false;
                }
                $("#fieldId").val(field_id);
                $("#sectionId").val(section_id);
                $("#fieldLabel").val(formDetailLabel);
                $('select[name=fieldType]').val(formDetailType);
                $("#fieldValue").val(formDetailValue);
            } else {
                document.getElementById("fieldRequired").checked = false;
                $("#fieldId").val(field_id);
                $("#sectionId").val(section_id);
                $("#fieldLabel").val("");
                $('select[name=fieldType]').val("");
                $("#fieldValue").val("");
            }
            myModal.show();
        }
        function openSectionModal() {
            var myModal = new bootstrap.Modal(document.getElementById('saveSectionModal'), {
                keyboard: false
            });
            myModal.show();
        }
    </script>

@endsection
