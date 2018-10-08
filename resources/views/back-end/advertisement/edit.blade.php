@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Edit Advertisement</h2>
            <a href="{{ route('manage-advertisement') }}" class="btn btn-success btn-sm">Manage Advertisement</a>
        </div>
        <div class="main_content">
            <?php $message = Session::get('message') ?>
            @if(isset($message))
                <div class="alert alert-success alert-dismissible fade show">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $message }}
                </div>
            @endif
            {{ Form::open(['route'=>'update-advertisement','method'=>'POST','class'=>'form-horizontal','id'=>'registration_form','name'=>'editAdvertisementForm']) }}
            <div class="form-group row">
                <label for="post_name" class="col-form-label col-sm-2">Post Name <span class="required">*</span></label>
                <div class="col-sm-7">
                    <input type="text" id="post_name" name="post_name" value="{{ $singleAdvertisement->post_name }}" class="form-control" placeholder="Post title">
                    <input type="hidden" name="id" value="{{ $singleAdvertisement->id }}" class="form-control" placeholder="Post title">
                </div>
                <span id="post_name_error" class="col-form-label col-sm-3 text-danger">{{ $errors->has('post_name') ? $errors->first('post_name') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2" for="company_name">Company Name <span class="required">*</span></label>
                <div class="col-sm-7">
                    <input type="text" id="company_name" name="company_name" value="{{ $singleAdvertisement->company_name }}" class="form-control" placeholder="Company Name">
                </div>
                <span class="col-form-label col-sm-3 text-danger" id="company_name_error">{{ $errors->has('company_name') ? $errors->first('company_name') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2" for="vacancy">Vacancy<span class="required">*</span></label>
                <div class="col-sm-7">
                    <input type="number" min="1" id="vacancy" name="vacancy" value="{{ $singleAdvertisement->vacancy }}" class="form-control" placeholder="Number of vacancy">
                </div>
                <span class="col-form-label col-sm-3 text-danger" id="vacancy_number_error">{{ $errors->has('vacancy') ? $errors->first('vacancy') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2" for="job_responsibilities">Job Responsibilities<span class="required">*</span></label>
                <div class="col-sm-7">
                    <textarea name="job_responsibilities" id="editor">{{ $singleAdvertisement->job_responsibilities }}</textarea>
                </div>
                <span class="col-form-label col-sm-3 text-danger" id="job_responsibilities_error">{{ $errors->has('job_responsibilities') ? $errors->first('job_responsibilities') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2" for="employee_status">Employee Status <span class="required">*</span></label>
                <div class="col-sm-7">
                    <input type="text" id="employee_status" name="employee_status" value="{{ $singleAdvertisement->employee_status }}" class="form-control" placeholder="Employee status">
                </div>
                <span class="col-form-label col-sm-3 text-danger" id="employee_status_error">{{ $errors->has('employee_status') ? $errors->first('employee_status') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Educational Requirements<span class="required">*</span></label>
                <div class="col-sm-7">
                    <textarea name="educational_requirement" id="editor1"> {{ $singleAdvertisement->educational_requirement }} </textarea>
                </div>
                <span class="col-form-label col-sm-3 text-danger">{{ $errors->has('educational_requirement') ? $errors->first('educational_requirement') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Experience Requirements<span class="required">*</span></label>
                <div class="col-sm-7">
                    <textarea name="experience_requirement" id="editor2">{{ $singleAdvertisement->experience_requirement }}</textarea>
                </div>
                <span class="col-form-label col-sm-3 text-danger">{{ $errors->has('experience_requirement') ? $errors->first('experience_requirement') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Additional Requirements<span class="required">*</span></label>
                <div class="col-sm-7">
                    <textarea name="additional_requirement" id="editor3">{{ $singleAdvertisement->additional_requirement }}</textarea>
                </div>
                <span class="col-form-label col-sm-3 text-danger">{{ $errors->has('additional_requirement') ? $errors->first('additional_requirement') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Gender<span class="required">*</span></label>
                <div class="col-sm-7">
                    <input type="radio" checked name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female
                    <input type="radio" name="gender" value="Male and Female"> Both
                </div>
                <span class="col-form-label col-sm-3 text-danger">{{ $errors->has('gender') ? $errors->first('gender') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label for="job_location" class="col-form-label col-sm-2">Job Location<span class="required">*</span></label>
                <div class="col-sm-7">
                    <input type="text" id="job_location" name="job_location" value="{{ $singleAdvertisement->job_location }}" class="form-control" placeholder="Job Location">
                </div>
                <span class="col-form-label col-sm-3 text-danger" id="job_location_error">{{ $errors->has('job_location') ? $errors->first('job_location') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label for="salary" class="col-form-label col-sm-2">Salary<span class="required">*</span></label>
                <div class="col-sm-7">
                    <input type="text" id="salary" name="salary" value="{{ $singleAdvertisement->salary }}" class="form-control" placeholder="Amount of salary">
                </div>
                <span class="col-form-label col-sm-3 text-danger" id="salary_error">{{ $errors->has('salary') ? $errors->first('salary') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Compensation & Other Benefits<span class="required">*</span></label>
                <div class="col-sm-7">
                    <textarea name="other_benefit" id="editor4">{{ $singleAdvertisement->other_benefit }}</textarea>
                </div>
                <span class="col-form-label col-sm-3 text-danger">{{ $errors->has('other_benefit') ? $errors->first('other_benefit') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label for="advertisement_date" class="col-form-label col-sm-2">Advertisement Date<span class="required">*</span></label>
                <div class="col-sm-7">
                    <input type="date" id="advertisement_date" value="{{ $singleAdvertisement->advertisement_date }}" name="advertisement_date" class="form-control">
                </div>
                <span class="col-form-label col-sm-3 text-danger" id="advertisement_date_error">{{ $errors->has('advertisement_date') ? $errors->first('advertisement_date') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label for="deadline" class="col-form-label col-sm-2">Application Deadline<span class="required">*</span></label>
                <div class="col-sm-7">
                    <input type="date" id="deadline" name="deadline" value="{{ $singleAdvertisement->deadline }}" class="form-control">
                </div>
                <span class="col-form-label col-sm-3 text-danger" id="deadline_error">{{ $errors->has('deadline') ? $errors->first('deadline') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2">Company Info<span class="required">*</span></label>
                <div class="col-sm-7">
                    <textarea name="company_info" id="editor5">{{ $singleAdvertisement->company_info }}</textarea>
                </div>
                <span class="col-form-label col-sm-3 text-danger">{{ $errors->has('company_info') ? $errors->first('company_info') : ' ' }}</span>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-2">Publication Status<span class="required">*</span></label>
                <div class="col-md-7 radio">
                    <label><input type="radio" name="publication_status" value="1" checked/> Published </label>
                    <label><input type="radio" name="publication_status" value="0"/> Unpublished </label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-2"></label>
                <div class="col-sm-7">
                    <input class="btn btn-md btn-success" type="submit" name="btn" value="Update Job Post"/>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <script>
        document.forms['editAdvertisementForm'].elements['gender'].value = '{{ $singleAdvertisement->gender}}';
        document.forms['editAdvertisementForm'].elements['publication_status'].value = '{{ $singleAdvertisement->publication_status}}';
    </script>
@endsection