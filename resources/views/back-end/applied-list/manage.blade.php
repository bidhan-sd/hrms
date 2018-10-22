@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Applied List</h2>
        </div>
        <div class="main_content  bg-white">
            <?php $message = Session::get('message') ?>

                @if(isset($message))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                        {{ $message }}
                    </div>
                @endif

                {{ Form::open(['route'=>'appliedListFilter','method'=>'POST']) }}

                    <table class="display table table-bordered table-hover table-striped">
                        <tbody>
                        <tr>
                            <td>
                                <b>Post Name </b>
                                <select name="filter_post_name" id="filter_post_name" class="form-control">
                                    <option value="0"> Select </option>
                                    <?php $post_names = \App\Advertisement::select("post_name")->where('publication_status',1)->get(); ?>
                                    @foreach($post_names as $post_name)
                                        <option value="{{ $post_name->post_name }}"> {{ $post_name->post_name }} </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <b>Total Exp </b>
                                <input type="text" name="filter_total_experience" id="filter_total_experience" class="form-control"/>
                            </td>
                            <td>
                                <b>Skills</b>
                                <input type="text" name="filter_skills" id="filter_skills" class="form-control"/>
                            </td>
                            <td>
                                <b>Gender</b>
                                <select name="filter_gender" id="filter_gender" class="form-control">
                                    <option value="0"> Select </option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Religion</b>
                                <select name="filter_religion" id="filter_religion" class="form-control">
                                    <option value="0"> Select </option>
                                    <option value="hindu"> Hindu </option>
                                    <option value="muslim"> Muslim </option>
                                </select>
                            </td>
                            <td>
                                <b>Home Town</b>
                                <input type="text" name="filter_home_town" id="filter_home_town" class="form-control"/>
                            </td>
                            <td>
                                <b>Name of exam.</b>
                                <select name="filter_name_of_exam" id="filter_name_of_exam" class="form-control">
                                    <option value="0"> Select </option>
                                    <option value="ssc">SSC</option>
                                    <option value="dakhil">Dakhil</option>
                                    <option value="o level">O level</option>
                                    <option value="hsc">HSC</option>
                                    <option value="alim">Alim</option>
                                    <option value="a level">A level</option>
                                    <option value="diploma">Diploma</option>
                                    <option value="bsc honors">BSC Hons</option>
                                    <option value="bsc eng">BSC Eng.</option>
                                    <option value="bcom honors">BCom Hons</option>
                                    <option value="ba honors">BA Hons</option>
                                    <option value="bss honors">BSS Hons</option>
                                    <option value="bbs honors">BBS Hons</option>
                                    <option value="bed honors">BED Hons</option>
                                    <option value="llb honors">LLB Hons</option>
                                    <option value="bba">BBA</option>
                                    <option value="bsc">BSC</option>
                                    <option value="bcom">BCom</option>
                                    <option value="ba">BA</option>
                                    <option value="bss">BSS</option>
                                    <option value="bbs">BBS</option>
                                    <option value="bed">BED</option>
                                    <option value="b.pharm">B.Pharm</option>
                                    <option value="b others">Honors Others</option>
                                    <option value="MSc">MSc</option>
                                    <option value="MCom">MCom</option>
                                    <option value="MBS">MBS</option>
                                    <option value="MBA">MBA</option>
                                    <option value="MBM">MBM</option>
                                    <option value="MSS">MSS</option>
                                    <option value="MA">MA</option>
                                    <option value="MEng">MEng.</option>
                                    <option value="MSS">MSS</option>
                                    <option value="MDS">MDS</option>
                                    <option value="MED">MED</option>
                                    <option value="M.Pharm">M.Pharm</option>
                                    <option value="MOthers">Masters Others</option>
                                </select>
                            </td>
                            <td>
                                <b>Group/subject</b>

                                <select name="filter_exam_group" id="filter_exam_group" class="form-control">

                                </select>

                            </td>
                        </tr>
                        <tbody>
                    </table>

                    <p><button type="submit" class="btn btn-success"> <i class="fas fa-search fa-xs"></i> Search</button></p>

                {{ Form::close() }}

                {{ Form::open(['route'=>'save-shortList','method'=>'POST','name'=>'shortListForm','id'=>'shortListForm']) }}

                    <table id="table_id" class="display table table-bordered table-hover table-striped text-center">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>All <input type="checkbox" id="checkAll"/> </th>
                                <th>Unique Id</th>
                                <th>Post Name</th>
                                <th>Total Exp.</th>
                                <th>Skills</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($applied_lists)
                            @foreach($applied_lists as $applied_list)
                                <tr>
                                    <td><input type="checkbox" name="checkSingle[]" id="singleCheckAll" value="{{ $applied_list->id }}"/></td>
                                    <td>{{ $applied_list->unique_apply_id }}</td>
                                    <td>{{ $applied_list->post_name }}</td>
                                    <td>@if($applied_list->totalExperince == '') 0 @else {{ $applied_list->totalExperince }} @endif</td>
                                    <td>{{ $applied_list->skills }}</td>
                                    <td><img src="{{ asset($applied_list->photo) }}" width="50" alt="Applicant Image"/></td>

                                    <td>
                                        <a href="{{ url('single-advertisement',['id' => $applied_list->id ]) }}" class="btn btn-info btn-sm" title="View">
                                            <i class="fas fa-search-plus"></i>
                                        </a>
                                        <a onclick="return confirm('Are you sure to delete!'); "  href="{{ url('delete-advertisement',['id' => $applied_list->id] ) }}" class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            <p class="text-right">
                                <input class="btn btn-success btn-sm showHidden" type="submit" name="short_list" id="short_list" value="Short List"/>
                            </p>
                        <tbody>
                    </table>

                {{ Form::close() }}
        </div>
    </div>
@endsection