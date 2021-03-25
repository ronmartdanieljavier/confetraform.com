<?php

namespace App\Http\Controllers;

use App\Model\FormDetailsModel;
use App\Model\FormSectionModel;
use App\Model\FormTemplateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function loadFormListPage(Request $request)
    {
        $form_model_holder = new FormTemplateModel();
        $form_model_data = $form_model_holder->loadFormList(Auth::user()->university_id);
        return view('form_list_page', ["form_list" => $form_model_data]);
    }

    public function loadFormById($id)
    {
        if($id) {
            $form_model_holder = new FormTemplateModel();
            $form_model_data = $form_model_holder->getFirstFormById(Auth::user()->university_id, $id);
            if($form_model_data) {
                $form_id = $form_model_data->id;
                $form_name = $form_model_data->form_name;
                $form_description = $form_model_data->form_description;
                $status_name = $form_model_data->status_name;

                $form_detail_data = $form_model_holder->getFormDetails($form_id);
                $form_detail_list = [];

                $form_section_uniq = collect($form_detail_data)->unique("form_section");
                foreach ($form_section_uniq as $section_data) {
//                    $field_section_detail_list = [];
                    $field_section_detail_list = collect($form_detail_data)->where("form_section", $section_data["form_section"])->whereNotNull("field_name")->all();
                    $form_detail_list[] = [
                        "form_section_id" => $section_data["form_section_id"],
                        "form_section" => $section_data["form_section"],
                        "field_section_detail_list" => $field_section_detail_list
                    ];
                }

                $view_data_array = [
                    "form_id" => $id,
                    "form_name" => $form_name,
                    "form_description" => $form_description,
                    "status_name" => $status_name,
                    "form_detail_list" => $form_detail_list,
                ];
                return view('form_view', $view_data_array);
            }
        }
        return redirect("form-list");
    }

    public function saveFormTemplate(Request $request)
    {
        $form_id = $request->input("formId");
        $form_name = $request->input("formName");
        $form_description = $request->input("formDescription");

        $validator = Validator::make($request->all(), [
            'formName' => 'required|max:255',
            'formDescription' => 'required|max:255'
        ]);


        $form_model_holder = new FormTemplateModel();
        if($form_id == "0") {
            if ($validator->fails()) {
                return redirect('/form-list')
                    ->withErrors($validator)
                    ->withInput();
            }
            $form_id = $form_model_holder->createFormTemplate($form_name, $form_description);
        } else {
            if ($validator->fails()) {
                return redirect('/view-form/'.$form_id)
                    ->withErrors($validator)
                    ->withInput();
            }
            $form_model_holder->updateFormTemplateById($form_id ,$form_name, $form_description);
        }

        return redirect('/view-form/'.$form_id);
    }
    public function deleteFormTemplate($id)
    {
        $form_model_holder = new FormTemplateModel();
        $form_model_holder->deleteFormTemplate($id);
        return redirect('/form-list');
    }

    public function saveFormDetail(Request $request)
    {
        $form_id = $request->input("formId");
        $field_id = $request->input("fieldId");
        $section_id = $request->input("sectionId");
        $field_label = $request->input("fieldLabel");
        $field_type = $request->input("fieldType");
        $field_value = $request->input("fieldValue");
        $field_required = $request->input("fieldRequired");

        $validator = Validator::make($request->all(), [
            'fieldLabel' => 'required|max:255',
            'fieldType' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/view-form/'.$form_id)
                ->withErrors($validator)
                ->withInput();
        }
        $field_name = preg_replace('/[^A-Za-z0-9]/', "", $field_label);
        $form_detail_model_holder = new FormDetailsModel();
        $flag_req = false;
        if(isset($field_required)) $flag_req = true;
        if(!$field_value) $field_value = "";
        if($field_id == "0") {
            $array_data = [
                "form_section_id" => $section_id,
                "field_name" => $field_name,
                "field_label" => $field_label,
                "field_type" => $field_type,
                "field_value" => $field_value,
                "field_order" => 99,
                "field_required" => $flag_req,
                "created_at" => DB::raw('NOW()')
            ];
            $form_detail_model_holder->createFormDetail($array_data);
        } else {
            $array_data = [
                "field_name" => $field_name,
                "field_label" => $field_label,
                "field_type" => $field_type,
                "field_value" => $field_value,
                "field_order" => 99,
                "field_required" => $flag_req,
                "updated_at" => DB::raw('NOW()')
            ];
            $form_detail_model_holder->updateFormDetailById($field_id, $array_data);
        }

        return redirect('/view-form/'.$form_id);
    }

    public function deleteFormDetail($id)
    {
        $form_detail_model_holder = new FormDetailsModel();
        $form_detail_model_holder->deleteFormDetailById($id);
        return Redirect::back();
    }

    public function saveFormSection(Request $request)
    {
        $section_id = $request->input("sectionId");
        $section_name = $request->input("sectionName");
        $form_id = $request->input("formId");

        $form_section_model_holder = new FormSectionModel();
        if($section_id == "0") {
            $array_data = [
                "form_id" => $form_id,
                "form_section" => $section_name,
                "form_section_order" => 99,
            ];
            $form_section_model_holder->createFormSection($array_data);
        } else {
            $array_data = [
                "form_section" => $section_name,
            ];
            $form_section_model_holder->updateFormSectionById($section_id, $array_data);
        }

        return redirect('/view-form/'.$form_id);
    }
    public function deleteFormSection(Request $request)
    {
        $section_id = $request->input("sectionId");

        $form_section_model_holder = new FormSectionModel();
        $form_section_model_holder->deleteFormSectionById($section_id);
        $form_detail_model_holder = new FormDetailsModel();
        $form_detail_model_holder->deleteFormDetailBySectionId($section_id);

        return Redirect::back();
    }
}

