@extends('front-end.master')
@section('body')
    <div class="front-end-content bg-white pl-4 pt-3 pr-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="applyOnlineContent">
                    <div class="mb-2">
                        <img height="120px" width="100%" src="{{ asset("/front-end/image/banner.jpg") }}"/>
                    </div>
                    {{ Form::open(['route'=>'save-onlineApply','method'=>'POST','class'=>'form-horizontal','name'=>'onlineApplyForm','id'=>'onlineApplyForm','enctype'=>'multipart/form-data']) }}

                    <div class="form-group">

                        <div class="bg-success  p-2">
                            <h4 class="text-white font-weight-bold m-0">Name of the Position :
                                <span class="text-warning" style="font-size:17px;text-align:left !important;">{{ $post_name }}</span>
                                <b style="font-size:13px;float:right;margin-top:5px">You must fill Red (<span class="text-danger">*</span>) Indicates incorrect information.</b></h4>
                            <input type="hidden" name="post_id" value="{{ $id }}" readonly/>
                            <input type="hidden" name="post_name" value="{{ $post_name }}" readonly/>
                        </div>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Personal Info<span class="text-danger">*</span></legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="full_name">Full Name<span class="required text-danger">*</span></label>
                                    <input type="text" id="full_name" name="full_name"  class="form-control">
                                    <span id="full_name_check" class="text-danger">{{ $errors->has('full_name') ? $errors->first('full_name') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="father_name">Father's Name<span class="required text-danger">*</span></label>
                                    <input type="text" id="father_name" name="father_name"  class="form-control">
                                    <span id="father_name_check" class="text-danger">{{ $errors->has('father_name') ? $errors->first('father_name') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="mother_name">Mother's Name<span class="required text-danger">*</span></label>
                                    <input type="text" id="mother_name" name="mother_name"  class="form-control">
                                    <span id="mother_name_check" class="text-danger">{{ $errors->has('mother_name') ? $errors->first('mother_name') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="spouse_name">Spouse Name</label>
                                    <input type="text" id="spouse_name" name="spouse_name"  class="form-control">
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-3">
                                    <label for="dob">Date of birth<span class="required text-danger">*</span></label>
                                    <input type="date" id="dob" name="dob" class="form-control">
                                    <span id="dob_check" class="text-danger">{{ $errors->has('dob') ? $errors->first('dob') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="gender">Gender<span class="required text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="0"> --- Select Gender --- </option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <span id="gender_check" class="text-danger">{{ $errors->has('gender') ? $errors->first('gender') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="religion">Religion <span class="required text-danger">*</span></label>
                                    <input type="text" id="religion" name="religion"  class="form-control">
                                    <span id="religion_check" class="text-danger">{{ $errors->has('religion') ? $errors->first('religion') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="marital_status">Marital Status<span class="required text-danger">*</span></label>
                                    <select name="marital_status" id="marital_status" class="form-control">
                                        <option value="0"> --- Select Gender --- </option>
                                        <option value="unmarried">Unmarried</option>
                                        <option value="married">Married</option>
                                        <option value="single">Single</option>
                                    </select>
                                    <span id="marital_status_check" class="text-danger">{{ $errors->has('marital_status') ? $errors->first('marital_status') : ' ' }}</span>
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-3">
                                    <label for="nationality">Nationality<span class="required text-danger">*</span></label>
                                    <input type="text" id="nationality" name="nationality" value="Bangladeshi" class="form-control">
                                    <span id="nationality_check" class="text-danger">{{ $errors->has('nationality') ? $errors->first('nationality') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="national_id_no">National Id No</label>
                                    <input type="text" id="national_id_no" name="national_id_no"  class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="mobile_number">Mobile<span class="required text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" readonly value="+88" class="form-control">
                                        </div>
                                        <div class="col-md-8 customClass">
                                            <input type="text" id="mobile_number" maxlength="11" name="mobile_number"  class="form-control" placeholder="phone will 11 digit">
                                            <span id="mobile_number_check" class="text-danger">{{ $errors->has('mobile_number') ? $errors->first('mobile_number') : ' ' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="email_address">Email Address<span class="required text-danger">*</span></label>
                                    <input type="email" id="email_address" name="email_address"  class="form-control">
                                    <span id="email_address_check" class="text-danger">{{ $errors->has('email_address') ? $errors->first('email_address') : ' ' }}</span>
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-4">
                                    <label for="totalExperince">Total Year of Experience</label>
                                    <input type="number" name="totalExperince" id="totalExperince" placeholder="i.e: 5" maxlength="2" class="form-control"/>
                                    <span id="totalExperince_check" class="text-danger"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="present_address">Present / Mailing Address<span class="required text-danger">*</span></label>
                                    <textarea name="present_address" id="present_address" class="form-control"></textarea>
                                    <span id="present_address_check" class="text-danger">{{ $errors->has('present_address') ? $errors->first('present_address') : ' ' }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="permanent_address">Permanent Address<span class="required text-danger">*</span></label>
                                    <textarea name="permanent_address" id="permanent_address" class="form-control"></textarea>
                                    <span id="permanent_address_check" class="text-danger">{{ $errors->has('permanent_address') ? $errors->first('permanent_address') : ' ' }}</span>
                                </div>
                            </div>

                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Educational Qualification (Board/University & Year of Passing)<span class="required text-danger">*</span></legend>
                            <table width="100%" class="table table-bordered table-striped text-center table-hover">
                                <thead class="bg-light text-dark">
                                <tr>
                                    <th valign="middle" scope="col">Level of Education</th>
                                    <th scope="col">Name of Examination</th>
                                    <th scope="col">Group | Subject</th>
                                    <th scope="col">Division | Grade </th>
                                    <th scope="col" colspan="3">Grade<br/><hr style="background-color:#f5f5f5;margin-top:1px;margin-bottom:1px;"/>
                                        CGPA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Scale &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Marks %</th>
                                    <th scope="col">Board | University</th>
                                    <th scope="col">Passing Year [YYYY]</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>SSC/Equivalent<span class="text-danger">*</span></td>
                                        <td>
                                            <select name="ssc_exam" id="ssc_exam" class="form-control">
                                                <option value="ssc" selected>SSC</option>
                                                <option value="dakhil">Dakhil</option>
                                                <option value="o level">O level</option>
                                            </select>
                                        </td>
                                        <td width="12%">
                                            <select name="ssc_group" id="ssc_group" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="science">Science</option>
                                                <option value="commerce">Commerce</option>
                                                <option value="arts">Arts</option>
                                                <option value="general">General</option>
                                                <option value="others">Others</option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </td>
                                        <td width="12%">
                                            <select name="ssc_result" id="ssc_result" class="form-control">
                                                <option value="0"> Select </option>
                                                <option value="grade"> Grade </option>
                                                <option value="first"> First </option>
                                                <option value="second"> Second </option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </td>
                                        <td width="8%">
                                            <input  class="form-control" placeholder="cgpa" type="text" name="ssc_cgpa" id="ssc_cgpa" />
                                        </td>
                                        <td width="8%">
                                            <input  class="form-control" placeholder="scal" type="number" maxlength="1" min="4" max="5" name="ssc_scale" id="ssc_scale" />
                                        </td>
                                        <td width="11%">
                                            <input  class="form-control" placeholder="marks %" type="text" name="ssc_marks" id="ssc_marks"/>
                                        </td>
                                        <td>
                                            <select required name="ssc_board" id="ssc_board" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="barishal">Barishal</option>
                                                <option value="chattogram">Chattogram</option>
                                                <option value="cumilla">Cumilla</option>
                                                <option value="dhaka">Dhaka</option>
                                                <option value="dinajpur">Dinajpur</option>
                                                <option value="jashore">Jashore</option>
                                                <option value="rajshahi">Rajshahi</option>
                                                <option value="sylhet">Sylhet</option>
                                                <option value="madrasah">Madrasah</option>
                                                <option value="technical">Technical</option>
                                                <option value="dibs (Dhaka)">DIBS (Dhaka)</option>
                                                <option value="bangladesh open university">Bangladesh Open University</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="ssc_passing_year" id="ssc_passing_year"  placeholder="Years"/>
                                            <span class="text-danger" id="ssc_passing_year_check">{{ $errors->has('ssc_passing_year') ? $errors->first('ssc_passing_year') : ' ' }}</span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>HSC/Equivalent <span class="text-danger">*</span></td>
                                        <td>
                                            <select name="hsc_exam" id="hsc_exam" class="form-control">
                                                <option value="hsc" selected>HSC</option>
                                                <option value="alim">Alim</option>
                                                <option value="a level">A level</option>
                                                <option value="diploma">Diploma</option>
                                            </select>
                                        </td>
                                        <td width="12%">
                                            <select name="hsc_group" id="hsc_group" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="science">Science</option>
                                                <option value="arts">Arts</option>
                                                <option value="commerce">Commerce</option>
                                                <option value="general">General</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </td>
                                        <td width="12%">
                                            <select name="hsc_result" id="hsc_result" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="grade">Grade</option>
                                                <option value="first">First</option>
                                                <option value="second">Second</option>
                                            </select>
                                        </td>
                                        <td width="8%">
                                            <input  class="form-control" placeholder="cgpa" type="text" name="hsc_cgpa" id="hsc_cgpa"/>
                                        </td>
                                        <td width="8%">
                                            <input  class="form-control" placeholder="scale" type="text" name="hsc_scale" id="hsc_scale"/>
                                        </td>
                                        <td width="11%">
                                            <input  class="form-control" placeholder="marks %" type="text" name="hsc_marks" id="hsc_marks"/>
                                        </td>
                                        <td>
                                            <select required name="hsc_board" id="hsc_board" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="barishal">Barishal</option>
                                                <option value="chattogram">Chattogram</option>
                                                <option value="cumilla">Cumilla</option>
                                                <option value="dhaka">Dhaka</option>
                                                <option value="dinajpur">Dinajpur</option>
                                                <option value="jashore">Jashore</option>
                                                <option value="rajshahi">Rajshahi</option>
                                                <option value="sylhet">Sylhet</option>
                                                <option value="madrasah">Madrasah</option>
                                                <option value="technical">Technical</option>
                                                <option value="didbs (Dhaka)">DIBS (Dhaka)</option>
                                                <option value="bangladesh open university">Bangladesh Open University</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="hsc_passing_year" id="hsc_passing_year" placeholder="Years"/>
                                            <span class="text-danger" id="hsc_passing_year_check">{{ $errors->has('hsc_passing_year') ? $errors->first('hsc_passing_year') : ' ' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Graduation</td>
                                        <td>
                                            <select name="honors_exam" id="honors_exam" class="form-control">
                                                <option value="0">Select</option>
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
                                                <option value="b others">Others</option>
                                            </select>
                                        </td>
                                        <td width="12%">
                                            <select name="honors_group" id="honors_group" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="Accounting & Information System">Accounting & Information System</option>
                                                <option value="Accounting">Accounting</option>
                                                <option value="Agribusiness And Marketing">Agribusiness And Marketing</option>
                                                <option value="Agricultural Botany">Agricultural Botany</option>
                                                <option value="Agricultural Extension And Information System">Agricultural Extension And Information System</option>
                                                <option value="Agricultural Extension And Rural Development">Agricultural Extension And Rural Development</option>
                                                <option value="Agricultural Extension Education">Agricultural Extension Education</option>
                                                <option value="Agricultural Statistics">Agricultural Statistics</option>
                                                <option value="Agriculture And Mineral Sciences">Agriculture And Mineral Sciences</option>
                                                <option value="Agriculture Chemistry">Agriculture Chemistry</option>
                                                <option value="Agriculture Co-Operatives">Agriculture Co-Operatives</option>
                                                <option value="Agriculture Economics">Agriculture Economics</option>
                                                <option value="Agriculture Engineering">Agriculture Engineering</option>
                                                <option value="Agriculture Finance">Agriculture Finance</option>
                                                <option value="Agriculture Marketing">Agriculture Marketing</option>
                                                <option value="Agriculture Science">Agriculture Science</option>
                                                <option value="Agriculture Soil Science">Agriculture Soil Science</option>
                                                <option value="Agriculture">Agriculture</option>
                                                <option value="Agroforestry">Agroforestry</option>
                                                <option value="Agronomy And Agricultural Extension">Agronomy And Agricultural Extension</option>
                                                <option value="Agronomy">Agronomy</option>
                                                <option value="Agrotechnology">Agrotechnology</option>
                                                <option value="Al-Fiqh">Al-Fiqh</option>
                                                <option value="Al-Hadith And Islamic Studies">Al-Hadith And Islamic Studies</option>
                                                <option value="Al-Quran And Islamic Studies">Al-Quran And Islamic Studies</option>
                                                <option value="Anatomy And Histology">Anatomy And Histology</option>
                                                <option value="Animal Husbandry And Veterinary Science">Animal Husbandry And Veterinary Science</option>
                                                <option value="Animal Husbandry">Animal Husbandry</option>
                                                <option value="Animal Nutrition">Animal Nutrition</option>
                                                <option value="Animal Production And Biproduction Technology">Animal Production And Biproduction Technology</option>
                                                <option value="Animal Production And Management">Animal Production And Management</option>
                                                <option value="Animal Science And Nutrition">Animal Science And Nutrition</option>
                                                <option value="Animal Science">Animal Science</option>
                                                <option value="Anthropology">Anthropology</option>
                                                <option value="Applied And Environmental Chemistry">Applied And Environmental Chemistry</option>
                                                <option value="Applied Chemistry And Chemical Engineering">Applied Chemistry And Chemical Engineering</option>
                                                <option value="Applied Chemistry">Applied Chemistry</option>
                                                <option value="Applied Linguisties & Elt">Applied Linguisties & Elt</option>
                                                <option value="Applied Mathematics">Applied Mathematics</option>
                                                <option value="Applied Physics And Electronic Engineering">Applied Physics And Electronic Engineering</option>
                                                <option value="Applied Physics">Applied Physics</option>
                                                <option value="Applied Sciences And Technology">Applied Sciences And Technology</option>
                                                <option value="Applied Statistics">Applied Statistics</option>
                                                <option value="Aquaculture">Aquaculture</option>
                                                <option value="Arabic">Arabic</option>
                                                <option value="Archaeology">Archaeology</option>
                                                <option value="Architecture">Architecture</option>
                                                <option value="Arts">Arts</option>
                                                <option value="Astronomy">Astronomy</option>
                                                <option value="Bangla">Bangla</option>
                                                <option value="Banking And Insurance">Banking And Insurance</option>
                                                <option value="Banking">Banking</option>
                                                <option value="Basic Science">Basic Science</option>
                                                <option value="Biochemistry And Food Analysis">Biochemistry And Food Analysis</option>
                                                <option value="Biochemistry And Molicular Biology">Biochemistry And Molicular Biology</option>
                                                <option value="Biochemistry">Biochemistry</option>
                                                <option value="Biomedical Engineering">Biomedical Engineering</option>
                                                <option value="Biomedical Phy And Tech">Biomedical Phy And Tech</option>
                                                <option value="Biotechnology And Genetic Engineering">Biotechnology And Genetic Engineering</option>
                                                <option value="Biotechnology">Biotechnology</option>
                                                <option value="Botany And Crop Science">Botany And Crop Science</option>
                                                <option value="Botany">Botany</option>
                                                <option value="Buddist Studies">Buddist Studies</option>
                                                <option value="Business Administration">Business Administration</option>
                                                <option value="Chemical">Chemical</option>
                                                <option value="Chemistry">Chemistry</option>
                                                <option value="Civil">Civil</option>
                                                <option value="Clinical Psychology">Clinical Psychology</option>
                                                <option value="Communication Disorder">Communication Disorder</option>
                                                <option value="Community Health And Hygiene">Community Health And Hygiene</option>
                                                <option value="Computer Science And Eng.">Computer Science And Eng.</option>
                                                <option value="Computer Science">Computer Science</option>
                                                <option value="Criminology And Police Science">Criminology And Police Science</option>
                                                <option value="Criminology">Criminology</option>
                                                <option value="Crop Botany">Crop Botany</option>
                                                <option value="Crop Science And Technology">Crop Science And Technology</option>
                                                <option value="Dairy Science">Dairy Science</option>
                                                <option value="Dawah And Islamic Studies">Dawah And Islamic Studies</option>
                                                <option value="Development And Proverty Studies">Development And Proverty Studies</option>
                                                <option value="Development Studies">Development Studies</option>
                                                <option value="Disaster Management">Disaster Management</option>
                                                <option value="Disaster Risk Mgt">Disaster Risk Mgt</option>
                                                <option value="Drama And Dramatics">Drama And Dramatics</option>
                                                <option value="Drama And Music">Drama And Music</option>
                                                <option value="Drama">Drama</option>
                                                <option value="Ecology">Ecology</option>
                                                <option value="Economics And Sociology">Economics And Sociology</option>
                                                <option value="Economics">Economics</option>
                                                <option value="Education">Education</option>
                                                <option value="Electrical And Electronics">Electrical And Electronics</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="Electronics And Communication Engineering">Electronics And Communication Engineering</option>
                                                <option value="Electronics">Electronics</option>
                                                <option value="Emergency Mgt">Emergency Mgt</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="English">English</option>
                                                <option value="Entomology">Entomology</option>
                                                <option value="Environmental Sanitation">Environmental Sanitation</option>
                                                <option value="Environmental Science And Resource Management">Environmental Science And Resource Management</option>
                                                <option value="Environmental Science">Environmental Science</option>
                                                <option value="Epidemiology">Epidemiology</option>
                                                <option value="Farm Power And Machinery">Farm Power And Machinery</option>
                                                <option value="Farm Stucture And Environmental Engineering">Farm Stucture And Environmental Engineering</option>
                                                <option value="Farsi Language And Literature">Farsi Language And Literature</option>
                                                <option value="Fesheries Technology">Fesheries Technology</option>
                                                <option value="Finance And Banking">Finance And Banking</option>
                                                <option value="Finance">Finance</option>
                                                <option value="Fine Art">Fine Art</option>
                                                <option value="Fisheries And Marine Technology">Fisheries And Marine Technology</option>
                                                <option value="Fisheries Biology And Genetics">Fisheries Biology And Genetics</option>
                                                <option value="Fisheries Mgt">Fisheries Mgt</option>
                                                <option value="Fisheries">Fisheries</option>
                                                <option value="Folklore">Folklore</option>
                                                <option value="Food And Nutrition">Food And Nutrition</option>
                                                <option value="Food Technology And Engineering">Food Technology And Engineering</option>
                                                <option value="Food Technology And Nutritional Science">Food Technology And Nutritional Science</option>
                                                <option value="Food Technology And Rural Industries">Food Technology And Rural Industries</option>
                                                <option value="Foood Microbiology">Foood Microbiology</option>
                                                <option value="Forestry And Environmental Sciences">Forestry And Environmental Sciences</option>
                                                <option value="Forestry">Forestry</option>
                                                <option value="Foresty And Wood Technology">Foresty And Wood Technology</option>
                                                <option value="Genetic Engineering And Biotechnology">Genetic Engineering And Biotechnology</option>
                                                <option value="Genetics And Animal Breeding">Genetics And Animal Breeding</option>
                                                <option value="Genetics And Plant Breeding">Genetics And Plant Breeding</option>
                                                <option value="Genetics">Genetics</option>
                                                <option value="Geo Information">Geo Information</option>
                                                <option value="Geochemistry">Geochemistry</option>
                                                <option value="Geography">Geography</option>
                                                <option value="Geological Sciences">Geological Sciences</option>
                                                <option value="Geology And Mining">Geology And Mining</option>
                                                <option value="Geology">Geology</option>
                                                <option value="Glass And Ceramic Engineering">Glass And Ceramic Engineering</option>
                                                <option value="Government And Politics">Government And Politics</option>
                                                <option value="Health Economics">Health Economics</option>
                                                <option value="History">History</option>
                                                <option value="Home Economics">Home Economics</option>
                                                <option value="Homeopathy">Homeopathy</option>
                                                <option value="Horticulture">Horticulture</option>
                                                <option value="Human Nurition And Dietetics">Human Nurition And Dietetics</option>
                                                <option value="Human Resource Management">Human Resource Management</option>
                                                <option value="Human Right">Human Right</option>
                                                <option value="Humanities(Hum)">Humanities(Hum)</option>
                                                <option value="Industrial Production Engineering(Ipe)">Industrial Production Engineering(Ipe)</option>
                                                <option value="Industrial">Industrial</option>
                                                <option value="Info. Sc. And  Library Management">Info. Sc. And  Library Management</option>
                                                <option value="Information And Commun Eng">Information And Commun Eng</option>
                                                <option value="International Business">International Business</option>
                                                <option value="International Relation">International Relation</option>
                                                <option value="Irrigation And Water Management">Irrigation And Water Management</option>
                                                <option value="Is And Library Mgt">Is And Library Mgt</option>
                                                <option value="Islamic History And Culture">Islamic History And Culture</option>
                                                <option value="Islamic Philosophy">Islamic Philosophy</option>
                                                <option value="Islamic Studies">Islamic Studies</option>
                                                <option value="Journalism And Media Studies">Journalism And Media Studies</option>
                                                <option value="Journalism">Journalism</option>
                                                <option value="Laguages">Laguages</option>
                                                <option value="Law And Muslim Jurisprudence">Law And Muslim Jurisprudence</option>
                                                <option value="Law">Law</option>
                                                <option value="Leather Technology">Leather Technology</option>
                                                <option value="Life Sciences">Life Sciences</option>
                                                <option value="Linguistics">Linguistics</option>
                                                <option value="Livestock">Livestock</option>
                                                <option value="Management And Business Administration">Management And Business Administration</option>
                                                <option value="Management And Finance">Management And Finance</option>
                                                <option value="Management Information System">Management Information System</option>
                                                <option value="Management">Management</option>
                                                <option value="Marine Fisheries And Oceanography">Marine Fisheries And Oceanography</option>
                                                <option value="Marine">Marine</option>
                                                <option value="Marketing">Marketing</option>
                                                <option value="Mass Commn. And Journalism">Mass Commn. And Journalism</option>
                                                <option value="Materials And Metallurgical Engineering(Mme)">Materials And Metallurgical Engineering(Mme)</option>
                                                <option value="Materials Science">Materials Science</option>
                                                <option value="Mathematics">Mathematics</option>
                                                <option value="Mbm">Mbm</option>
                                                <option value="Mechanical">Mechanical</option>
                                                <option value="Media And Journalism">Media And Journalism</option>
                                                <option value="Medical Sciences">Medical Sciences</option>
                                                <option value="Medicine Surgery And Obstetrics">Medicine Surgery And Obstetrics</option>
                                                <option value="Medicine">Medicine</option>
                                                <option value="Microbiology And Virology">Microbiology And Virology</option>
                                                <option value="Microbiology">Microbiology</option>
                                                <option value="Modern Language">Modern Language</option>
                                                <option value="Music">Music</option>
                                                <option value="Naval Architecture And Marine Engineering(Name)">Naval Architecture And Marine Engineering(Name)</option>
                                                <option value="Neuroscience">Neuroscience</option>
                                                <option value="Nutrition And Food Technology">Nutrition And Food Technology</option>
                                                <option value="Others">Others</option>
                                                <option value="Pali(Oriental Language)">Pali(Oriental Language)</option>
                                                <option value="Parasitology">Parasitology</option>
                                                <option value="Pathology And Paracytology">Pathology And Paracytology</option>
                                                <option value="Pathology">Pathology</option>
                                                <option value="Peace And Conflict">Peace And Conflict</option>
                                                <option value="Persian Language And Literature">Persian Language And Literature</option>
                                                <option value="Petroleum And Mineral Resources Engineering(Pmre)">Petroleum And Mineral Resources Engineering(Pmre)</option>
                                                <option value="Petroleum And Mining Engineering(Pme)">Petroleum And Mining Engineering(Pme)</option>
                                                <option value="Pharmacology And Toxicology">Pharmacology And Toxicology</option>
                                                <option value="Pharmacology">Pharmacology</option>
                                                <option value="Pharmacy">Pharmacy</option>
                                                <option value="Philosophy">Philosophy</option>
                                                <option value="Physical Education And Sports Science(Pess)">Physical Education And Sports Science(Pess)</option>
                                                <option value="Physical Science">Physical Science</option>
                                                <option value="Physics">Physics</option>
                                                <option value="Physiology And Pharmacology">Physiology And Pharmacology</option>
                                                <option value="Physiology">Physiology</option>
                                                <option value="Plant Pathology">Plant Pathology</option>
                                                <option value="Political Science">Political Science</option>
                                                <option value="Political Studies And Public Adm">Political Studies And Public Adm</option>
                                                <option value="Population Science And Human Resource Development">Population Science And Human Resource Development</option>
                                                <option value="Population Science">Population Science</option>
                                                <option value="Post Havest Technology">Post Havest Technology</option>
                                                <option value="Poultry Science">Poultry Science</option>
                                                <option value="Production Economics">Production Economics</option>
                                                <option value="Psychology">Psychology</option>
                                                <option value="Public Administration">Public Administration</option>
                                                <option value="Public Finance">Public Finance</option>
                                                <option value="Public Health">Public Health</option>
                                                <option value="Resource Mgt">Resource Mgt</option>
                                                <option value="Sanskrit">Sanskrit</option>
                                                <option value="Seed Science And Technology">Seed Science And Technology</option>
                                                <option value="Social Science">Social Science</option>
                                                <option value="Social Studies">Social Studies</option>
                                                <option value="Social Welfare">Social Welfare</option>
                                                <option value="Social Work">Social Work</option>
                                                <option value="Sociology">Sociology</option>
                                                <option value="Soil Science">Soil Science</option>
                                                <option value="Statistics">Statistics</option>
                                                <option value="Surgery And Obstetrics">Surgery And Obstetrics</option>
                                                <option value="Surgery And Theriogenology">Surgery And Theriogenology</option>
                                                <option value="Television And Film">Television And Film</option>
                                                <option value="Textile Technology">Textile Technology</option>
                                                <option value="Theatre And Performance Studies">Theatre And Performance Studies</option>
                                                <option value="Theatre">Theatre</option>
                                                <option value="Tourism And Hospitality Mgt">Tourism And Hospitality Mgt</option>
                                                <option value="Urban And Regional Planning(Urp)">Urban And Regional Planning(Urp)</option>
                                                <option value="Urban And Rural Planning">Urban And Rural Planning</option>
                                                <option value="Urdu">Urdu</option>
                                                <option value="Vetenary Science">Vetenary Science</option>
                                                <option value="Water Resources Engineering(Wre)">Water Resources Engineering(Wre)</option>
                                                <option value="Water Science">Water Science</option>
                                                <option value="Womens And Gender">Womens And Gender</option>
                                                <option value="World Religions And Culture">World Religions And Culture</option>
                                                <option value="Zoology">Zoology</option>
                                            </select>
                                        </td>
                                        <td width="12%">
                                            <select name="honors_result" id="honors_result" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="grade">Grade</option>
                                                <option value="first">First</option>
                                                <option value="second">Second</option>
                                            </select>
                                        </td>
                                        <td width="8%">
                                            <input  class="form-control" placeholder="cgpa" type="text" name="honors_cgpa" id="honors_cgpa"/>
                                        </td>
                                        <td width="8%">
                                            <input  class="form-control" placeholder="scale" type="text" name="honors_scale" id="honors_scale"/>
                                        </td>
                                        <td width="11%">
                                            <input  class="form-control" placeholder="marks %" type="text" name="honors_marks" id="honors_marks"/>
                                        </td>
                                        <td width="12%">
                                            <select name="honors_board" id="honors_board" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="ASA University Bangladesh">ASA University Bangladesh</option>
                                                <option value="Ahsania Mission University of Science and Technology">Ahsania Mission University of Science and Technology</option>
                                                <option value="Ahsanullah University of Science and Technology">Ahsanullah University of Science and Technology</option>
                                                <option value="American International University-Bangladesh">American International University-Bangladesh</option>
                                                <option value="Anwer Khan Modern University">Anwer Khan Modern University </option>
                                                <option value="Army University of Engineering and Technology (BAUET), Qadirabad, Natore">Army University of Engineering and Technology (BAUET), Qadirabad, Natore</option>
                                                <option value="Asian University for Women">Asian University for Women</option>
                                                <option value="Asian University of Bangladesh">Asian University of Bangladesh</option>
                                                <option value="Atish Dipankar University of Science & Technology">Atish Dipankar University of Science & Technology</option>
                                                <option value="BGC Trust University Bangladesh">BGC Trust University Bangladesh</option>
                                                <option value="BGMEA University of Fashion & Technology(BUFT)">BGMEA University of Fashion & Technology(BUFT)</option>
                                                <option value="BRAC University">BRAC University</option>
                                                <option value="Bandarban University">Bandarban University</option>
                                                <option value="Bangabandhu Sheikh Mujib Medical University">Bangabandhu Sheikh Mujib Medical University</option>
                                                <option value="Bangabandhu Sheikh Mujibur Rahman Agricultural University">Bangabandhu Sheikh Mujibur Rahman Agricultural University</option>
                                                <option value="Bangabandhu Sheikh Mujibur Rahman Digital University">Bangabandhu Sheikh Mujibur Rahman Digital University</option>
                                                <option value="Bangabandhu Sheikh Mujibur Rahman Maritime University">Bangabandhu Sheikh Mujibur Rahman Maritime University</option>
                                                <option value="Bangabandhu Sheikh Mujibur Rahman Science & Technology University">Bangabandhu Sheikh Mujibur Rahman Science & Technology University</option>
                                                <option value="Bangladesh Agricultural University">Bangladesh Agricultural University</option>
                                                <option value="Bangladesh Army International University of Science & Technology(BAIUST) ,Comilla">Bangladesh Army International University of Science & Technology(BAIUST) ,Comilla</option>
                                                <option value="Bangladesh Army University of Science and Technology(BAUST), Saidpur, Nilphamary">Bangladesh Army University of Science and Technology(BAUST), Saidpur, Nilphamary</option>
                                                <option value="Bangladesh Islami University">Bangladesh Islami University</option>
                                                <option value="Bangladesh Open University">Bangladesh Open University</option>
                                                <option value="Bangladesh University">Bangladesh University</option>
                                                <option value="Bangladesh University of Business & Technology">Bangladesh University of Business & Technology </option>
                                                <option value="Bangladesh University of Engineering & Technology">Bangladesh University of Engineering & Technology</option>
                                                <option value="Bangladesh University of Health Sciences">Bangladesh University of Health Sciences</option>
                                                <option value="Bangladesh University of Professionals">Bangladesh University of Professionals</option>
                                                <option value="Bangladesh University of Textiles ">Bangladesh University of Textiles </option>
                                                <option value="Barisal University">Barisal University</option>
                                                <option value="Begum Rokeya University">Begum Rokeya University</option>
                                                <option value="CCN University of Science & Technology">CCN University of Science & Technology</option>
                                                <option value="Canadian University of Bangladesh">Canadian University of Bangladesh</option>
                                                <option value="Central University of Science and Technology">Central University of Science and Technology</option>
                                                <option value="Central Women's University">Central Women's University</option>
                                                <option value="Chittagong Independent University">Chittagong Independent University </option>
                                                <option value="Chittagong Medical University">Chittagong Medical University</option>
                                                <option value="Chittagong University of Engineering & Technology">Chittagong University of Engineering & Technology</option>
                                                <option value="Chittagong Veterinary and Animal Sciences University">Chittagong Veterinary and Animal Sciences University</option>
                                                <option value="City University">City University</option>
                                                <option value="Comilla University">Comilla University</option>
                                                <option value="Cox's Bazar International University">Cox's Bazar International University</option>
                                                <option value="Daffodil International University">Daffodil International University</option>
                                                <option value="Dhaka International University">Dhaka International University</option>
                                                <option value="Dhaka University of Engineering & Technology">Dhaka University of Engineering & Technology</option>
                                                <option value="East Delta University">East Delta University </option>
                                                <option value="East West University">East West University</option>
                                                <option value="Eastern University">Eastern University</option>
                                                <option value="European University of Bangladesh">European University of Bangladesh</option>
                                                <option value="Exim Bank Agricultural University, Bangladesh">Exim Bank Agricultural University, Bangladesh</option>
                                                <option value="Fareast International University">Fareast International University</option>
                                                <option value="Feni University">Feni University</option>
                                                <option value="First Capital University of Bangladesh">First Capital University of Bangladesh</option>
                                                <option value="Foreign University">Foreign University</option>
                                                <option value="German University Bangladesh">German University Bangladesh</option>
                                                <option value="Global University Bangladesh">Global University Bangladesh</option>
                                                <option value="Green University of Bangladesh">Green University of Bangladesh</option>
                                                <option value="Hajee Mohammad Danesh Science & Technology University">Hajee Mohammad Danesh Science & Technology University</option>
                                                <option value="Hamdard University Bangladesh">Hamdard University Bangladesh</option>
                                                <option value="Independent University, Bangladesh">Independent University, Bangladesh</option>
                                                <option value="International Islamic University Chittagong">International Islamic University Chittagong</option>
                                                <option value="International Standard University">International Standard University</option>
                                                <option value="International University of Business Agriculture & Technology">International University of Business Agriculture & Technology</option>
                                                <option value="Ishakha International University, Bangladesh">Ishakha International University, Bangladesh</option>
                                                <option value="Islamic Arabic University">Islamic Arabic University</option>
                                                <option value="Islamic University">Islamic University</option>
                                                <option value="Islamic University of Technology, Gazipur">Islamic University of Technology, Gazipur</option>
                                                <option value="Jagannath University">Jagannath University</option>
                                                <option value="Jahangirnagar University">Jahangirnagar University</option>
                                                <option value="Jatiya Kabi Kazi Nazrul Islam University">Jatiya Kabi Kazi Nazrul Islam University</option>
                                                <option value="Jessore University of Science & Technology">Jessore University of Science & Technology</option>
                                                <option value="Khulna Khan Bahadur Ahsanullah University">Khulna Khan Bahadur Ahsanullah University</option>
                                                <option value="Khulna University">Khulna University</option>
                                                <option value="Khulna University of Engineering and Technology">Khulna University of Engineering and Technology</option>
                                                <option value="Khwaja Yunus Ali University">Khwaja Yunus Ali University </option>
                                                <option value="Leading University">Leading University</option>
                                                <option value="Manarat International University">Manarat International University</option>
                                                <option value="Mawlana Bhashani Science & Technology University">Mawlana Bhashani Science & Technology University</option>
                                                <option value="Metropolitan University">Metropolitan University</option>
                                                <option value="N.P.I University of Bangladesh">N.P.I University of Bangladesh</option>
                                                <option value="National University">National University</option>
                                                <option value="Noakhali Science & Technology University">Noakhali Science & Technology University</option>
                                                <option value="North Bengal International University">North Bengal International University</option>
                                                <option value="North East University Bangladesh">North East University Bangladesh</option>
                                                <option value="North South University">North South University</option>
                                                <option value="North Western University">North Western University</option>
                                                <option value="Northern University Bangladesh">Northern University Bangladesh</option>
                                                <option value="Northern University of Business & Technology, Khulna">Northern University of Business & Technology, Khulna</option>
                                                <option value="Notre Dame University Bangladesh">Notre Dame University Bangladesh</option>
                                                <option value="Pabna University of Science and Technology">Pabna University of Science and Technology</option>
                                                <option value="Patuakhali Science And Technology University">Patuakhali Science And Technology University</option>
                                                <option value="Port City International University">Port City International University</option>
                                                <option value="Presidency University">Presidency University</option>
                                                <option value="Prime University">Prime University </option>
                                                <option value="Primeasia University">Primeasia University</option>
                                                <option value="Pundra University of Science & Technology">Pundra University of Science & Technology </option>
                                                <option value="Rabindra Maitree University, Kushtia">Rabindra Maitree University, Kushtia</option>
                                                <option value="Rabindra University, Bangladesh">Rabindra University, Bangladesh</option>
                                                <option value="Rajshahi Medical University ">Rajshahi Medical University </option>
                                                <option value="Rajshahi Science & Technology University (RSTU), Natore">Rajshahi Science & Technology University (RSTU), Natore</option>
                                                <option value="Rajshahi University of Engineering & Technology">Rajshahi University of Engineering & Technology</option>
                                                <option value="Ranada Prasad Shaha University">Ranada Prasad Shaha University</option>
                                                <option value="Rangamati Science and Technology University">Rangamati Science and Technology University</option>
                                                <option value="Royal University of Dhaka">Royal University of Dhaka</option>
                                                <option value="Rupayan A.K.M Shamsuzzoha University">Rupayan A.K.M Shamsuzzoha University</option>
                                                <option value="Shah Makhdum Management University, Rajshahi">Shah Makhdum Management University, Rajshahi</option>
                                                <option value="Shahjalal University of Science & Technology">Shahjalal University of Science & Technology</option>
                                                <option value="Shanto-Mariam University of Creative Technology">Shanto-Mariam University of Creative Technology</option>
                                                <option value="Sheikh Fazilatunnesa Mujib University">Sheikh Fazilatunnesa Mujib University</option>
                                                <option value="Sher-e-Bangla Agricultural University">Sher-e-Bangla Agricultural University</option>
                                                <option value="Sonargaon University">Sonargaon University</option>
                                                <option value="Southeast University">Southeast University</option>
                                                <option value="Stamford University Bangladesh">Stamford University Bangladesh</option>
                                                <option value="State University of Bangladesh">State University of Bangladesh</option>
                                                <option value="Sylhet Agricultural University">Sylhet Agricultural University</option>
                                                <option value="Tagore University of Creative Arts, Keranigonj, Bangladesh">Tagore University of Creative Arts, Keranigonj, Bangladesh</option>
                                                <option value="The International University of Scholars">The International University of Scholars</option>
                                                <option value="The Millennium University">The Millennium University</option>
                                                <option value="The University of Asia Pacific">The University of Asia Pacific</option>
                                                <option value="Times University, Bangladesh">Times University, Bangladesh</option>
                                                <option value="Trust University, Barishal">Trust University, Barishal</option>
                                                <option value="United International University">United International University</option>
                                                <option value="University of Chittagong">University of Chittagong</option>
                                                <option value="University of Creative Technology, Chittagong">University of Creative Technology, Chittagong</option>
                                                <option value="University of Development Alternative">University of Development Alternative</option>
                                                <option value="University of Dhaka">University of Dhaka</option>
                                                <option value="University of Global Village">University of Global Village</option>
                                                <option value="University of Information Technology & Sciences">University of Information Technology & Sciences</option>
                                                <option value="University of Liberal Arts Bangladesh">University of Liberal Arts Bangladesh</option>
                                                <option value="University of Rajshahi">University of Rajshahi</option>
                                                <option value="Uttara University">Uttara University</option>
                                                <option value="Varendra University">Varendra University</option>
                                                <option value="Victoria University of Bangladesh">Victoria University of Bangladesh</option>
                                                <option value="World University of Bangladesh">World University of Bangladesh</option>
                                                <option value="Z.H Sikder University of Science & Technology">Z.H Sikder University of Science & Technology</option>
                                                <option value="Z.N.R.F. University of Management Sciences">Z.N.R.F. University of Management Sciences</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control" name="honors_passing_year" id="honors_passing_year"  placeholder="Years"/></td>
                                    </tr>
                                    <tr>
                                        <td>Post Graduation</td>
                                        <td>
                                            <select name="post_graduation_exam" id="post_graduation_exam" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="MSc">MSc</option>
                                                <option value="MCom">MCom</option>
                                                <option value="MBS">MBS</option>
                                                <option value="MBA">MBA</option>
                                                <option value="MBM">MBM</option>
                                                <option value="MSS">MSS</option>
                                                <option value="MA">MA</option>
                                                <option value="MEng">MEng.</option>
                                                <option value="MA">MA</option>
                                                <option value="MSS">MSS</option>
                                                <option value="MDS">MDS</option>
                                                <option value="MED">MED</option>
                                                <option value="M.Pharm">M.Pharm</option>
                                                <option value="MOthers">Others</option>
                                            </select>
                                        </td>
                                        <td width="12%">
                                            <select name="post_graduation_group" id="post_graduation_group" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="Accounting & Information System">Accounting & Information System</option>
                                                <option value="Accounting">Accounting</option>
                                                <option value="Agribusiness And Marketing">Agribusiness And Marketing</option>
                                                <option value="Agricultural Botany">Agricultural Botany</option>
                                                <option value="Agricultural Extension And Information System">Agricultural Extension And Information System</option>
                                                <option value="Agricultural Extension And Rural Development">Agricultural Extension And Rural Development</option>
                                                <option value="Agricultural Extension Education">Agricultural Extension Education</option>
                                                <option value="Agricultural Statistics">Agricultural Statistics</option>
                                                <option value="Agriculture And Mineral Sciences">Agriculture And Mineral Sciences</option>
                                                <option value="Agriculture Chemistry">Agriculture Chemistry</option>
                                                <option value="Agriculture Co-Operatives">Agriculture Co-Operatives</option>
                                                <option value="Agriculture Economics">Agriculture Economics</option>
                                                <option value="Agriculture Engineering">Agriculture Engineering</option>
                                                <option value="Agriculture Finance">Agriculture Finance</option>
                                                <option value="Agriculture Marketing">Agriculture Marketing</option>
                                                <option value="Agriculture Science">Agriculture Science</option>
                                                <option value="Agriculture Soil Science">Agriculture Soil Science</option>
                                                <option value="Agriculture">Agriculture</option>
                                                <option value="Agroforestry">Agroforestry</option>
                                                <option value="Agronomy And Agricultural Extension">Agronomy And Agricultural Extension</option>
                                                <option value="Agronomy">Agronomy</option>
                                                <option value="Agrotechnology">Agrotechnology</option>
                                                <option value="Al-Fiqh">Al-Fiqh</option>
                                                <option value="Al-Hadith And Islamic Studies">Al-Hadith And Islamic Studies</option>
                                                <option value="Al-Quran And Islamic Studies">Al-Quran And Islamic Studies</option>
                                                <option value="Anatomy And Histology">Anatomy And Histology</option>
                                                <option value="Animal Husbandry And Veterinary Science">Animal Husbandry And Veterinary Science</option>
                                                <option value="Animal Husbandry">Animal Husbandry</option>
                                                <option value="Animal Nutrition">Animal Nutrition</option>
                                                <option value="Animal Production And Biproduction Technology">Animal Production And Biproduction Technology</option>
                                                <option value="Animal Production And Management">Animal Production And Management</option>
                                                <option value="Animal Science And Nutrition">Animal Science And Nutrition</option>
                                                <option value="Animal Science">Animal Science</option>
                                                <option value="Anthropology">Anthropology</option>
                                                <option value="Applied And Environmental Chemistry">Applied And Environmental Chemistry</option>
                                                <option value="Applied Chemistry And Chemical Engineering">Applied Chemistry And Chemical Engineering</option>
                                                <option value="Applied Chemistry">Applied Chemistry</option>
                                                <option value="Applied Linguisties &amp; Elt">Applied Linguisties &amp; Elt</option>
                                                <option value="Applied Mathematics">Applied Mathematics</option>
                                                <option value="Applied Physics And Electronic Engineering">Applied Physics And Electronic Engineering</option>
                                                <option value="Applied Physics">Applied Physics</option>
                                                <option value="Applied Sciences And Technology">Applied Sciences And Technology</option>
                                                <option value="Applied Statistics">Applied Statistics</option>
                                                <option value="Aquaculture">Aquaculture</option>
                                                <option value="Arabic">Arabic</option>
                                                <option value="Archaeology">Archaeology</option>
                                                <option value="Architecture">Architecture</option>
                                                <option value="Arts">Arts</option>
                                                <option value="Astronomy">Astronomy</option>
                                                <option value="Bangla">Bangla</option>
                                                <option value="Banking And Insurance">Banking And Insurance</option>
                                                <option value="Banking">Banking</option>
                                                <option value="Basic Science">Basic Science</option>
                                                <option value="Biochemistry And Food Analysis">Biochemistry And Food Analysis</option>
                                                <option value="Biochemistry And Molicular Biology">Biochemistry And Molicular Biology</option>
                                                <option value="Biochemistry">Biochemistry</option>
                                                <option value="Biomedical Engineering">Biomedical Engineering</option>
                                                <option value="Biomedical Phy And Tech">Biomedical Phy And Tech</option>
                                                <option value="Biotechnology And Genetic Engineering">Biotechnology And Genetic Engineering</option>
                                                <option value="Biotechnology">Biotechnology</option>
                                                <option value="Botany And Crop Science">Botany And Crop Science</option>
                                                <option value="Botany">Botany</option>
                                                <option value="Buddist Studies">Buddist Studies</option>
                                                <option value="Business Administration">Business Administration</option>
                                                <option value="Chemical">Chemical</option>
                                                <option value="Chemistry">Chemistry</option>
                                                <option value="Civil">Civil</option>
                                                <option value="Clinical Psychology">Clinical Psychology</option>
                                                <option value="Communication Disorder">Communication Disorder</option>
                                                <option value="Community Health And Hygiene">Community Health And Hygiene</option>
                                                <option value="Computer Science And Eng.">Computer Science And Eng.</option>
                                                <option value="Computer Science">Computer Science</option>
                                                <option value="Criminology And Police Science">Criminology And Police Science</option>
                                                <option value="Criminology">Criminology</option>
                                                <option value="Crop Botany">Crop Botany</option>
                                                <option value="Crop Science And Technology">Crop Science And Technology</option>
                                                <option value="Dairy Science">Dairy Science</option>
                                                <option value="Dawah And Islamic Studies">Dawah And Islamic Studies</option>
                                                <option value="Development And Proverty Studies">Development And Proverty Studies</option>
                                                <option value="Development Studies">Development Studies</option>
                                                <option value="Disaster Management">Disaster Management</option>
                                                <option value="Disaster Risk Mgt">Disaster Risk Mgt</option>
                                                <option value="Drama And Dramatics">Drama And Dramatics</option>
                                                <option value="Drama And Music">Drama And Music</option>
                                                <option value="Drama">Drama</option>
                                                <option value="Ecology">Ecology</option>
                                                <option value="Economics And Sociology">Economics And Sociology</option>
                                                <option value="Economics">Economics</option>
                                                <option value="Education">Education</option>
                                                <option value="Electrical And Electronics">Electrical And Electronics</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="Electronics And Communication Engineering">Electronics And Communication Engineering</option>
                                                <option value="Electronics">Electronics</option>
                                                <option value="Emergency Mgt">Emergency Mgt</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="English">English</option>
                                                <option value="Entomology">Entomology</option>
                                                <option value="Environmental Sanitation">Environmental Sanitation</option>
                                                <option value="Environmental Science And Resource Management">Environmental Science And Resource Management</option>
                                                <option value="Environmental Science">Environmental Science</option>
                                                <option value="Epidemiology">Epidemiology</option>
                                                <option value="Farm Power And Machinery">Farm Power And Machinery</option>
                                                <option value="Farm Stucture And Environmental Engineering">Farm Stucture And Environmental Engineering</option>
                                                <option value="Farsi Language And Literature">Farsi Language And Literature</option>
                                                <option value="Fesheries Technology">Fesheries Technology</option>
                                                <option value="Finance And Banking">Finance And Banking</option>
                                                <option value="Finance">Finance</option>
                                                <option value="Fine Art">Fine Art</option>
                                                <option value="Fisheries And Marine Technology">Fisheries And Marine Technology</option>
                                                <option value="Fisheries Biology And Genetics">Fisheries Biology And Genetics</option>
                                                <option value="Fisheries Mgt">Fisheries Mgt</option>
                                                <option value="Fisheries">Fisheries</option>
                                                <option value="Folklore">Folklore</option>
                                                <option value="Food And Nutrition">Food And Nutrition</option>
                                                <option value="Food Technology And Engineering">Food Technology And Engineering</option>
                                                <option value="Food Technology And Nutritional Science">Food Technology And Nutritional Science</option>
                                                <option value="Food Technology And Rural Industries">Food Technology And Rural Industries</option>
                                                <option value="Foood Microbiology">Foood Microbiology</option>
                                                <option value="Forestry And Environmental Sciences">Forestry And Environmental Sciences</option>
                                                <option value="Forestry">Forestry</option>
                                                <option value="Foresty And Wood Technology">Foresty And Wood Technology</option>
                                                <option value="Genetic Engineering And Biotechnology">Genetic Engineering And Biotechnology</option>
                                                <option value="Genetics And Animal Breeding">Genetics And Animal Breeding</option>
                                                <option value="Genetics And Plant Breeding">Genetics And Plant Breeding</option>
                                                <option value="Genetics">Genetics</option>
                                                <option value="Geo Information">Geo Information</option>
                                                <option value="Geochemistry">Geochemistry</option>
                                                <option value="Geography">Geography</option>
                                                <option value="Geological Sciences">Geological Sciences</option>
                                                <option value="Geology And Mining">Geology And Mining</option>
                                                <option value="Geology">Geology</option>
                                                <option value="Glass And Ceramic Engineering">Glass And Ceramic Engineering</option>
                                                <option value="Government And Politics">Government And Politics</option>
                                                <option value="Health Economics">Health Economics</option>
                                                <option value="History">History</option>
                                                <option value="Home Economics">Home Economics</option>
                                                <option value="Homeopathy">Homeopathy</option>
                                                <option value="Horticulture">Horticulture</option>
                                                <option value="Human Nurition And Dietetics">Human Nurition And Dietetics</option>
                                                <option value="Human Resource Management">Human Resource Management</option>
                                                <option value="Human Right">Human Right</option>
                                                <option value="Humanities(Hum)">Humanities(Hum)</option>
                                                <option value="Industrial Production Engineering(Ipe)">Industrial Production Engineering(Ipe)</option>
                                                <option value="Industrial">Industrial</option>
                                                <option value="Info. Sc. And  Library Management">Info. Sc. And  Library Management</option>
                                                <option value="Information And Commun Eng">Information And Commun Eng</option>
                                                <option value="International Business">International Business</option>
                                                <option value="International Relation">International Relation</option>
                                                <option value="Irrigation And Water Management">Irrigation And Water Management</option>
                                                <option value="Is And Library Mgt">Is And Library Mgt</option>
                                                <option value="Islamic History And Culture">Islamic History And Culture</option>
                                                <option value="Islamic Philosophy">Islamic Philosophy</option>
                                                <option value="Islamic Studies">Islamic Studies</option>
                                                <option value="Journalism And Media Studies">Journalism And Media Studies</option>
                                                <option value="Journalism">Journalism</option>
                                                <option value="Laguages">Laguages</option>
                                                <option value="Law And Muslim Jurisprudence">Law And Muslim Jurisprudence</option>
                                                <option value="Law">Law</option>
                                                <option value="Leather Technology">Leather Technology</option>
                                                <option value="Life Sciences">Life Sciences</option>
                                                <option value="Linguistics">Linguistics</option>
                                                <option value="Livestock">Livestock</option>
                                                <option value="Management And Business Administration">Management And Business Administration</option>
                                                <option value="Management And Finance">Management And Finance</option>
                                                <option value="Management Information System">Management Information System</option>
                                                <option value="Management">Management</option>
                                                <option value="Marine Fisheries And Oceanography">Marine Fisheries And Oceanography</option>
                                                <option value="Marine">Marine</option>
                                                <option value="Marketing">Marketing</option>
                                                <option value="Mass Commn. And Journalism">Mass Commn. And Journalism</option>
                                                <option value="Materials And Metallurgical Engineering(Mme)">Materials And Metallurgical Engineering(Mme)</option>
                                                <option value="Materials Science">Materials Science</option>
                                                <option value="Mathematics">Mathematics</option>
                                                <option value="Mbm">Mbm</option>
                                                <option value="Mechanical">Mechanical</option>
                                                <option value="Media And Journalism">Media And Journalism</option>
                                                <option value="Medical Sciences">Medical Sciences</option>
                                                <option value="Medicine Surgery And Obstetrics">Medicine Surgery And Obstetrics</option>
                                                <option value="Medicine">Medicine</option>
                                                <option value="Microbiology And Virology">Microbiology And Virology</option>
                                                <option value="Microbiology">Microbiology</option>
                                                <option value="Modern Language">Modern Language</option>
                                                <option value="Music">Music</option>
                                                <option value="Naval Architecture And Marine Engineering(Name)">Naval Architecture And Marine Engineering(Name)</option>
                                                <option value="Neuroscience">Neuroscience</option>
                                                <option value="Nutrition And Food Technology">Nutrition And Food Technology</option>
                                                <option value="Others">Others</option>
                                                <option value="Pali(Oriental Language)">Pali(Oriental Language)</option>
                                                <option value="Parasitology">Parasitology</option>
                                                <option value="Pathology And Paracytology">Pathology And Paracytology</option>
                                                <option value="Pathology">Pathology</option>
                                                <option value="Peace And Conflict">Peace And Conflict</option>
                                                <option value="Persian Language And Literature">Persian Language And Literature</option>
                                                <option value="Petroleum And Mineral Resources Engineering(Pmre)">Petroleum And Mineral Resources Engineering(Pmre)</option>
                                                <option value="Petroleum And Mining Engineering(Pme)">Petroleum And Mining Engineering(Pme)</option>
                                                <option value="Pharmacology And Toxicology">Pharmacology And Toxicology</option>
                                                <option value="Pharmacology">Pharmacology</option>
                                                <option value="Pharmacy">Pharmacy</option>
                                                <option value="Philosophy">Philosophy</option>
                                                <option value="Physical Education And Sports Science(Pess)">Physical Education And Sports Science(Pess)</option>
                                                <option value="Physical Science">Physical Science</option>
                                                <option value="Physics">Physics</option>
                                                <option value="Physiology And Pharmacology">Physiology And Pharmacology</option>
                                                <option value="Physiology">Physiology</option>
                                                <option value="Plant Pathology">Plant Pathology</option>
                                                <option value="Political Science">Political Science</option>
                                                <option value="Political Studies And Public Adm">Political Studies And Public Adm</option>
                                                <option value="Population Science And Human Resource Development">Population Science And Human Resource Development</option>
                                                <option value="Population Science">Population Science</option>
                                                <option value="Post Havest Technology">Post Havest Technology</option>
                                                <option value="Poultry Science">Poultry Science</option>
                                                <option value="Production Economics">Production Economics</option>
                                                <option value="Psychology">Psychology</option>
                                                <option value="Public Administration">Public Administration</option>
                                                <option value="Public Finance">Public Finance</option>
                                                <option value="Public Health">Public Health</option>
                                                <option value="Resource Mgt">Resource Mgt</option>
                                                <option value="Sanskrit">Sanskrit</option>
                                                <option value="Seed Science And Technology">Seed Science And Technology</option>
                                                <option value="Social Science">Social Science</option>
                                                <option value="Social Studies">Social Studies</option>
                                                <option value="Social Welfare">Social Welfare</option>
                                                <option value="Social Work">Social Work</option>
                                                <option value="Sociology">Sociology</option>
                                                <option value="Soil Science">Soil Science</option>
                                                <option value="Statistics">Statistics</option>
                                                <option value="Surgery And Obstetrics">Surgery And Obstetrics</option>
                                                <option value="Surgery And Theriogenology">Surgery And Theriogenology</option>
                                                <option value="Television And Film">Television And Film</option>
                                                <option value="Textile Technology">Textile Technology</option>
                                                <option value="Theatre And Performance Studies">Theatre And Performance Studies</option>
                                                <option value="Theatre">Theatre</option>
                                                <option value="Tourism And Hospitality Mgt">Tourism And Hospitality Mgt</option>
                                                <option value="Urban And Regional Planning(Urp)">Urban And Regional Planning(Urp)</option>
                                                <option value="Urban And Rural Planning">Urban And Rural Planning</option>
                                                <option value="Urdu">Urdu</option>
                                                <option value="Vetenary Science">Vetenary Science</option>
                                                <option value="Water Resources Engineering(Wre)">Water Resources Engineering(Wre)</option>
                                                <option value="Water Science">Water Science</option>
                                                <option value="Womens And Gender">Womens And Gender</option>
                                                <option value="World Religions And Culture">World Religions And Culture</option>
                                                <option value="Zoology">Zoology</option>
                                            </select>
                                        </td>
                                        <td width="12%">
                                            <select name="post_graduation_result" id="post_graduation_result" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="grade">Grade</option>
                                                <option value="first">First</option>
                                                <option value="second">Second</option>
                                            </select>
                                        </td>
                                        <td width="8%">
                                            <input  class="form-control" placeholder="cgpa" type="text" name="post_graduation_cgpa" id="post_graduation_cgpa"/>
                                        </td>
                                        <td width="8%">
                                            <input  class="form-control" placeholder="scale" type="text" name="post_graduation_scale" id="post_graduation_scale"/>
                                        </td>
                                        <td width="11%">
                                            <input  class="form-control" placeholder="marks %" type="text" name="post_graduation_marks" id="post_graduation_marks"/>
                                        </td>
                                        <td>
                                            <select name="post_graduation_board" id="post_graduation_board" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="ASA University Bangladesh">ASA University Bangladesh</option>
                                                <option value="Ahsania Mission University of Science and Technology">Ahsania Mission University of Science and Technology</option>
                                                <option value="Ahsanullah University of Science and Technology">Ahsanullah University of Science and Technology</option>
                                                <option value="American International University-Bangladesh">American International University-Bangladesh</option>
                                                <option value="Anwer Khan Modern University">Anwer Khan Modern University </option>
                                                <option value="Army University of Engineering and Technology (BAUET), Qadirabad, Natore">Army University of Engineering and Technology (BAUET), Qadirabad, Natore</option>
                                                <option value="Asian University for Women">Asian University for Women</option>
                                                <option value="Asian University of Bangladesh">Asian University of Bangladesh</option>
                                                <option value="Atish Dipankar University of Science & Technology">Atish Dipankar University of Science & Technology</option>
                                                <option value="BGC Trust University Bangladesh">BGC Trust University Bangladesh</option>
                                                <option value="BGMEA University of Fashion & Technology(BUFT)">BGMEA University of Fashion & Technology(BUFT)</option>
                                                <option value="BRAC University">BRAC University</option>
                                                <option value="Bandarban University">Bandarban University</option>
                                                <option value="Bangabandhu Sheikh Mujib Medical University">Bangabandhu Sheikh Mujib Medical University</option>
                                                <option value="Bangabandhu Sheikh Mujibur Rahman Agricultural University">Bangabandhu Sheikh Mujibur Rahman Agricultural University</option>
                                                <option value="Bangabandhu Sheikh Mujibur Rahman Digital University">Bangabandhu Sheikh Mujibur Rahman Digital University</option>
                                                <option value="Bangabandhu Sheikh Mujibur Rahman Maritime University">Bangabandhu Sheikh Mujibur Rahman Maritime University</option>
                                                <option value="Bangabandhu Sheikh Mujibur Rahman Science & Technology University">Bangabandhu Sheikh Mujibur Rahman Science & Technology University</option>
                                                <option value="Bangladesh Agricultural University">Bangladesh Agricultural University</option>
                                                <option value="Bangladesh Army International University of Science & Technology(BAIUST) ,Comilla">Bangladesh Army International University of Science & Technology(BAIUST) ,Comilla</option>
                                                <option value="Bangladesh Army University of Science and Technology(BAUST), Saidpur, Nilphamary">Bangladesh Army University of Science and Technology(BAUST), Saidpur, Nilphamary</option>
                                                <option value="Bangladesh Islami University">Bangladesh Islami University</option>
                                                <option value="Bangladesh Open University">Bangladesh Open University</option>
                                                <option value="Bangladesh University">Bangladesh University</option>
                                                <option value="Bangladesh University of Business & Technology">Bangladesh University of Business & Technology </option>
                                                <option value="Bangladesh University of Engineering & Technology">Bangladesh University of Engineering & Technology</option>
                                                <option value="Bangladesh University of Health Sciences">Bangladesh University of Health Sciences</option>
                                                <option value="Bangladesh University of Professionals">Bangladesh University of Professionals</option>
                                                <option value="Bangladesh University of Textiles ">Bangladesh University of Textiles </option>
                                                <option value="Barisal University">Barisal University</option>
                                                <option value="Begum Rokeya University">Begum Rokeya University</option>
                                                <option value="CCN University of Science & Technology">CCN University of Science & Technology</option>
                                                <option value="Canadian University of Bangladesh">Canadian University of Bangladesh</option>
                                                <option value="Central University of Science and Technology">Central University of Science and Technology</option>
                                                <option value="Central Women's University">Central Women's University</option>
                                                <option value="Chittagong Independent University">Chittagong Independent University </option>
                                                <option value="Chittagong Medical University">Chittagong Medical University</option>
                                                <option value="Chittagong University of Engineering & Technology">Chittagong University of Engineering & Technology</option>
                                                <option value="Chittagong Veterinary and Animal Sciences University">Chittagong Veterinary and Animal Sciences University</option>
                                                <option value="City University">City University</option>
                                                <option value="Comilla University">Comilla University</option>
                                                <option value="Cox's Bazar International University">Cox's Bazar International University</option>
                                                <option value="Daffodil International University">Daffodil International University</option>
                                                <option value="Dhaka International University">Dhaka International University</option>
                                                <option value="Dhaka University of Engineering & Technology">Dhaka University of Engineering & Technology</option>
                                                <option value="East Delta University">East Delta University </option>
                                                <option value="East West University">East West University</option>
                                                <option value="Eastern University">Eastern University</option>
                                                <option value="European University of Bangladesh">European University of Bangladesh</option>
                                                <option value="Exim Bank Agricultural University, Bangladesh">Exim Bank Agricultural University, Bangladesh</option>
                                                <option value="Fareast International University">Fareast International University</option>
                                                <option value="Feni University">Feni University</option>
                                                <option value="First Capital University of Bangladesh">First Capital University of Bangladesh</option>
                                                <option value="Foreign University">Foreign University</option>
                                                <option value="German University Bangladesh">German University Bangladesh</option>
                                                <option value="Global University Bangladesh">Global University Bangladesh</option>
                                                <option value="Green University of Bangladesh">Green University of Bangladesh</option>
                                                <option value="Hajee Mohammad Danesh Science & Technology University">Hajee Mohammad Danesh Science & Technology University</option>
                                                <option value="Hamdard University Bangladesh">Hamdard University Bangladesh</option>
                                                <option value="Independent University, Bangladesh">Independent University, Bangladesh</option>
                                                <option value="International Islamic University Chittagong">International Islamic University Chittagong</option>
                                                <option value="International Standard University">International Standard University</option>
                                                <option value="International University of Business Agriculture & Technology">International University of Business Agriculture & Technology</option>
                                                <option value="Ishakha International University, Bangladesh">Ishakha International University, Bangladesh</option>
                                                <option value="Islamic Arabic University">Islamic Arabic University</option>
                                                <option value="Islamic University">Islamic University</option>
                                                <option value="Islamic University of Technology, Gazipur">Islamic University of Technology, Gazipur</option>
                                                <option value="Jagannath University">Jagannath University</option>
                                                <option value="Jahangirnagar University">Jahangirnagar University</option>
                                                <option value="Jatiya Kabi Kazi Nazrul Islam University">Jatiya Kabi Kazi Nazrul Islam University</option>
                                                <option value="Jessore University of Science & Technology">Jessore University of Science & Technology</option>
                                                <option value="Khulna Khan Bahadur Ahsanullah University">Khulna Khan Bahadur Ahsanullah University</option>
                                                <option value="Khulna University">Khulna University</option>
                                                <option value="Khulna University of Engineering and Technology">Khulna University of Engineering and Technology</option>
                                                <option value="Khwaja Yunus Ali University">Khwaja Yunus Ali University </option>
                                                <option value="Leading University">Leading University</option>
                                                <option value="Manarat International University">Manarat International University</option>
                                                <option value="Mawlana Bhashani Science & Technology University">Mawlana Bhashani Science & Technology University</option>
                                                <option value="Metropolitan University">Metropolitan University</option>
                                                <option value="N.P.I University of Bangladesh">N.P.I University of Bangladesh</option>
                                                <option value="National University">National University</option>
                                                <option value="Noakhali Science & Technology University">Noakhali Science & Technology University</option>
                                                <option value="North Bengal International University">North Bengal International University</option>
                                                <option value="North East University Bangladesh">North East University Bangladesh</option>
                                                <option value="North South University">North South University</option>
                                                <option value="North Western University">North Western University</option>
                                                <option value="Northern University Bangladesh">Northern University Bangladesh</option>
                                                <option value="Northern University of Business & Technology, Khulna">Northern University of Business & Technology, Khulna</option>
                                                <option value="Notre Dame University Bangladesh">Notre Dame University Bangladesh</option>
                                                <option value="Pabna University of Science and Technology">Pabna University of Science and Technology</option>
                                                <option value="Patuakhali Science And Technology University">Patuakhali Science And Technology University</option>
                                                <option value="Port City International University">Port City International University</option>
                                                <option value="Presidency University">Presidency University</option>
                                                <option value="Prime University">Prime University </option>
                                                <option value="Primeasia University">Primeasia University</option>
                                                <option value="Pundra University of Science & Technology">Pundra University of Science & Technology </option>
                                                <option value="Rabindra Maitree University, Kushtia">Rabindra Maitree University, Kushtia</option>
                                                <option value="Rabindra University, Bangladesh">Rabindra University, Bangladesh</option>
                                                <option value="Rajshahi Medical University ">Rajshahi Medical University </option>
                                                <option value="Rajshahi Science & Technology University (RSTU), Natore">Rajshahi Science & Technology University (RSTU), Natore</option>
                                                <option value="Rajshahi University of Engineering & Technology">Rajshahi University of Engineering & Technology</option>
                                                <option value="Ranada Prasad Shaha University">Ranada Prasad Shaha University</option>
                                                <option value="Rangamati Science and Technology University">Rangamati Science and Technology University</option>
                                                <option value="Royal University of Dhaka">Royal University of Dhaka</option>
                                                <option value="Rupayan A.K.M Shamsuzzoha University">Rupayan A.K.M Shamsuzzoha University</option>
                                                <option value="Shah Makhdum Management University, Rajshahi">Shah Makhdum Management University, Rajshahi</option>
                                                <option value="Shahjalal University of Science & Technology">Shahjalal University of Science & Technology</option>
                                                <option value="Shanto-Mariam University of Creative Technology">Shanto-Mariam University of Creative Technology</option>
                                                <option value="Sheikh Fazilatunnesa Mujib University">Sheikh Fazilatunnesa Mujib University</option>
                                                <option value="Sher-e-Bangla Agricultural University">Sher-e-Bangla Agricultural University</option>
                                                <option value="Sonargaon University">Sonargaon University</option>
                                                <option value="Southeast University">Southeast University</option>
                                                <option value="Stamford University Bangladesh">Stamford University Bangladesh</option>
                                                <option value="State University of Bangladesh">State University of Bangladesh</option>
                                                <option value="Sylhet Agricultural University">Sylhet Agricultural University</option>
                                                <option value="Tagore University of Creative Arts, Keranigonj, Bangladesh">Tagore University of Creative Arts, Keranigonj, Bangladesh</option>
                                                <option value="The International University of Scholars">The International University of Scholars</option>
                                                <option value="The Millennium University">The Millennium University</option>
                                                <option value="The University of Asia Pacific">The University of Asia Pacific</option>
                                                <option value="Times University, Bangladesh">Times University, Bangladesh</option>
                                                <option value="Trust University, Barishal">Trust University, Barishal</option>
                                                <option value="United International University">United International University</option>
                                                <option value="University of Chittagong">University of Chittagong</option>
                                                <option value="University of Creative Technology, Chittagong">University of Creative Technology, Chittagong</option>
                                                <option value="University of Development Alternative">University of Development Alternative</option>
                                                <option value="University of Dhaka">University of Dhaka</option>
                                                <option value="University of Global Village">University of Global Village</option>
                                                <option value="University of Information Technology & Sciences">University of Information Technology & Sciences</option>
                                                <option value="University of Liberal Arts Bangladesh">University of Liberal Arts Bangladesh</option>
                                                <option value="University of Rajshahi">University of Rajshahi</option>
                                                <option value="Uttara University">Uttara University</option>
                                                <option value="Varendra University">Varendra University</option>
                                                <option value="Victoria University of Bangladesh">Victoria University of Bangladesh</option>
                                                <option value="World University of Bangladesh">World University of Bangladesh</option>
                                                <option value="Z.H Sikder University of Science & Technology">Z.H Sikder University of Science & Technology</option>
                                                <option value="Z.N.R.F. University of Management Sciences">Z.N.R.F. University of Management Sciences</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control" name="post_graduation_passing_year" id="post_graduation_passing_year"  placeholder="Years"/></td>
                                    </tr>
                                    <tr>
                                        <td>Others</td>
                                        <td>
                                            <select name="other_graduation_exam" id="other_graduation_exam" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="MSc">MSc</option>
                                                <option value="MEng">MEng.</option>
                                                <option value="MA">MA</option>
                                                <option value="MCom">MCom</option>
                                                <option value="MSS">MSS</option>
                                                <option value="MBM">MBM</option>
                                                <option value="MBA">MBA</option>
                                                <option value="MDS">MDS</option>
                                                <option value="MED">MED</option>
                                                <option value="CA">CA</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </td>
                                        <td width="12%">
                                            <select name="other_graduation_group" id="other_graduation_group" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="Accounting & Information System">Accounting & Information System</option>
                                                <option value="Accounting">Accounting</option>
                                                <option value="Agribusiness And Marketing">Agribusiness And Marketing</option>
                                                <option value="Agricultural Botany">Agricultural Botany</option>
                                                <option value="Agricultural Extension And Information System">Agricultural Extension And Information System</option>
                                                <option value="Agricultural Extension And Rural Development">Agricultural Extension And Rural Development</option>
                                                <option value="Agricultural Extension Education">Agricultural Extension Education</option>
                                                <option value="Agricultural Statistics">Agricultural Statistics</option>
                                                <option value="Agriculture And Mineral Sciences">Agriculture And Mineral Sciences</option>
                                                <option value="Agriculture Chemistry">Agriculture Chemistry</option>
                                                <option value="Agriculture Co-Operatives">Agriculture Co-Operatives</option>
                                                <option value="Agriculture Economics">Agriculture Economics</option>
                                                <option value="Agriculture Engineering">Agriculture Engineering</option>
                                                <option value="Agriculture Finance">Agriculture Finance</option>
                                                <option value="Agriculture Marketing">Agriculture Marketing</option>
                                                <option value="Agriculture Science">Agriculture Science</option>
                                                <option value="Agriculture Soil Science">Agriculture Soil Science</option>
                                                <option value="Agriculture">Agriculture</option>
                                                <option value="Agroforestry">Agroforestry</option>
                                                <option value="Agronomy And Agricultural Extension">Agronomy And Agricultural Extension</option>
                                                <option value="Agronomy">Agronomy</option>
                                                <option value="Agrotechnology">Agrotechnology</option>
                                                <option value="Al-Fiqh">Al-Fiqh</option>
                                                <option value="Al-Hadith And Islamic Studies">Al-Hadith And Islamic Studies</option>
                                                <option value="Al-Quran And Islamic Studies">Al-Quran And Islamic Studies</option>
                                                <option value="Anatomy And Histology">Anatomy And Histology</option>
                                                <option value="Animal Husbandry And Veterinary Science">Animal Husbandry And Veterinary Science</option>
                                                <option value="Animal Husbandry">Animal Husbandry</option>
                                                <option value="Animal Nutrition">Animal Nutrition</option>
                                                <option value="Animal Production And Biproduction Technology">Animal Production And Biproduction Technology</option>
                                                <option value="Animal Production And Management">Animal Production And Management</option>
                                                <option value="Animal Science And Nutrition">Animal Science And Nutrition</option>
                                                <option value="Animal Science">Animal Science</option>
                                                <option value="Anthropology">Anthropology</option>
                                                <option value="Applied And Environmental Chemistry">Applied And Environmental Chemistry</option>
                                                <option value="Applied Chemistry And Chemical Engineering">Applied Chemistry And Chemical Engineering</option>
                                                <option value="Applied Chemistry">Applied Chemistry</option>
                                                <option value="Applied Linguisties & Elt">Applied Linguisties & Elt</option>
                                                <option value="Applied Mathematics">Applied Mathematics</option>
                                                <option value="Applied Physics And Electronic Engineering">Applied Physics And Electronic Engineering</option>
                                                <option value="Applied Physics">Applied Physics</option>
                                                <option value="Applied Sciences And Technology">Applied Sciences And Technology</option>
                                                <option value="Applied Statistics">Applied Statistics</option>
                                                <option value="Aquaculture">Aquaculture</option>
                                                <option value="Arabic">Arabic</option>
                                                <option value="Archaeology">Archaeology</option>
                                                <option value="Architecture">Architecture</option>
                                                <option value="Arts">Arts</option>
                                                <option value="Astronomy">Astronomy</option>
                                                <option value="Bangla">Bangla</option>
                                                <option value="Banking And Insurance">Banking And Insurance</option>
                                                <option value="Banking">Banking</option>
                                                <option value="Basic Science">Basic Science</option>
                                                <option value="Biochemistry And Food Analysis">Biochemistry And Food Analysis</option>
                                                <option value="Biochemistry And Molicular Biology">Biochemistry And Molicular Biology</option>
                                                <option value="Biochemistry">Biochemistry</option>
                                                <option value="Biomedical Engineering">Biomedical Engineering</option>
                                                <option value="Biomedical Phy And Tech">Biomedical Phy And Tech</option>
                                                <option value="Biotechnology And Genetic Engineering">Biotechnology And Genetic Engineering</option>
                                                <option value="Biotechnology">Biotechnology</option>
                                                <option value="Botany And Crop Science">Botany And Crop Science</option>
                                                <option value="Botany">Botany</option>
                                                <option value="Buddist Studies">Buddist Studies</option>
                                                <option value="Business Administration">Business Administration</option>
                                                <option value="Chemical">Chemical</option>
                                                <option value="Chemistry">Chemistry</option>
                                                <option value="Civil">Civil</option>
                                                <option value="Clinical Psychology">Clinical Psychology</option>
                                                <option value="Communication Disorder">Communication Disorder</option>
                                                <option value="Community Health And Hygiene">Community Health And Hygiene</option>
                                                <option value="Computer Science And Eng.">Computer Science And Eng.</option>
                                                <option value="Computer Science">Computer Science</option>
                                                <option value="Criminology And Police Science">Criminology And Police Science</option>
                                                <option value="Criminology">Criminology</option>
                                                <option value="Crop Botany">Crop Botany</option>
                                                <option value="Crop Science And Technology">Crop Science And Technology</option>
                                                <option value="Dairy Science">Dairy Science</option>
                                                <option value="Dawah And Islamic Studies">Dawah And Islamic Studies</option>
                                                <option value="Development And Proverty Studies">Development And Proverty Studies</option>
                                                <option value="Development Studies">Development Studies</option>
                                                <option value="Disaster Management">Disaster Management</option>
                                                <option value="Disaster Risk Mgt">Disaster Risk Mgt</option>
                                                <option value="Drama And Dramatics">Drama And Dramatics</option>
                                                <option value="Drama And Music">Drama And Music</option>
                                                <option value="Drama">Drama</option>
                                                <option value="Ecology">Ecology</option>
                                                <option value="Economics And Sociology">Economics And Sociology</option>
                                                <option value="Economics">Economics</option>
                                                <option value="Education">Education</option>
                                                <option value="Electrical And Electronics">Electrical And Electronics</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="Electronics And Communication Engineering">Electronics And Communication Engineering</option>
                                                <option value="Electronics">Electronics</option>
                                                <option value="Emergency Mgt">Emergency Mgt</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="English">English</option>
                                                <option value="Entomology">Entomology</option>
                                                <option value="Environmental Sanitation">Environmental Sanitation</option>
                                                <option value="Environmental Science And Resource Management">Environmental Science And Resource Management</option>
                                                <option value="Environmental Science">Environmental Science</option>
                                                <option value="Epidemiology">Epidemiology</option>
                                                <option value="Farm Power And Machinery">Farm Power And Machinery</option>
                                                <option value="Farm Stucture And Environmental Engineering">Farm Stucture And Environmental Engineering</option>
                                                <option value="Farsi Language And Literature">Farsi Language And Literature</option>
                                                <option value="Fesheries Technology">Fesheries Technology</option>
                                                <option value="Finance And Banking">Finance And Banking</option>
                                                <option value="Finance">Finance</option>
                                                <option value="Fine Art">Fine Art</option>
                                                <option value="Fisheries And Marine Technology">Fisheries And Marine Technology</option>
                                                <option value="Fisheries Biology And Genetics">Fisheries Biology And Genetics</option>
                                                <option value="Fisheries Mgt">Fisheries Mgt</option>
                                                <option value="Fisheries">Fisheries</option>
                                                <option value="Folklore">Folklore</option>
                                                <option value="Food And Nutrition">Food And Nutrition</option>
                                                <option value="Food Technology And Engineering">Food Technology And Engineering</option>
                                                <option value="Food Technology And Nutritional Science">Food Technology And Nutritional Science</option>
                                                <option value="Food Technology And Rural Industries">Food Technology And Rural Industries</option>
                                                <option value="Foood Microbiology">Foood Microbiology</option>
                                                <option value="Forestry And Environmental Sciences">Forestry And Environmental Sciences</option>
                                                <option value="Forestry">Forestry</option>
                                                <option value="Foresty And Wood Technology">Foresty And Wood Technology</option>
                                                <option value="Genetic Engineering And Biotechnology">Genetic Engineering And Biotechnology</option>
                                                <option value="Genetics And Animal Breeding">Genetics And Animal Breeding</option>
                                                <option value="Genetics And Plant Breeding">Genetics And Plant Breeding</option>
                                                <option value="Genetics">Genetics</option>
                                                <option value="Geo Information">Geo Information</option>
                                                <option value="Geochemistry">Geochemistry</option>
                                                <option value="Geography">Geography</option>
                                                <option value="Geological Sciences">Geological Sciences</option>
                                                <option value="Geology And Mining">Geology And Mining</option>
                                                <option value="Geology">Geology</option>
                                                <option value="Glass And Ceramic Engineering">Glass And Ceramic Engineering</option>
                                                <option value="Government And Politics">Government And Politics</option>
                                                <option value="Health Economics">Health Economics</option>
                                                <option value="History">History</option>
                                                <option value="Home Economics">Home Economics</option>
                                                <option value="Homeopathy">Homeopathy</option>
                                                <option value="Horticulture">Horticulture</option>
                                                <option value="Human Nurition And Dietetics">Human Nurition And Dietetics</option>
                                                <option value="Human Resource Management">Human Resource Management</option>
                                                <option value="Human Right">Human Right</option>
                                                <option value="Humanities(Hum)">Humanities(Hum)</option>
                                                <option value="Industrial Production Engineering(Ipe)">Industrial Production Engineering(Ipe)</option>
                                                <option value="Industrial">Industrial</option>
                                                <option value="Info. Sc. And  Library Management">Info. Sc. And  Library Management</option>
                                                <option value="Information And Commun Eng">Information And Commun Eng</option>
                                                <option value="International Business">International Business</option>
                                                <option value="International Relation">International Relation</option>
                                                <option value="Irrigation And Water Management">Irrigation And Water Management</option>
                                                <option value="Is And Library Mgt">Is And Library Mgt</option>
                                                <option value="Islamic History And Culture">Islamic History And Culture</option>
                                                <option value="Islamic Philosophy">Islamic Philosophy</option>
                                                <option value="Islamic Studies">Islamic Studies</option>
                                                <option value="Journalism And Media Studies">Journalism And Media Studies</option>
                                                <option value="Journalism">Journalism</option>
                                                <option value="Laguages">Laguages</option>
                                                <option value="Law And Muslim Jurisprudence">Law And Muslim Jurisprudence</option>
                                                <option value="Law">Law</option>
                                                <option value="Leather Technology">Leather Technology</option>
                                                <option value="Life Sciences">Life Sciences</option>
                                                <option value="Linguistics">Linguistics</option>
                                                <option value="Livestock">Livestock</option>
                                                <option value="Management And Business Administration">Management And Business Administration</option>
                                                <option value="Management And Finance">Management And Finance</option>
                                                <option value="Management Information System">Management Information System</option>
                                                <option value="Management">Management</option>
                                                <option value="Marine Fisheries And Oceanography">Marine Fisheries And Oceanography</option>
                                                <option value="Marine">Marine</option>
                                                <option value="Marketing">Marketing</option>
                                                <option value="Mass Commn. And Journalism">Mass Commn. And Journalism</option>
                                                <option value="Materials And Metallurgical Engineering(Mme)">Materials And Metallurgical Engineering(Mme)</option>
                                                <option value="Materials Science">Materials Science</option>
                                                <option value="Mathematics">Mathematics</option>
                                                <option value="Mbm">Mbm</option>
                                                <option value="Mechanical">Mechanical</option>
                                                <option value="Media And Journalism">Media And Journalism</option>
                                                <option value="Medical Sciences">Medical Sciences</option>
                                                <option value="Medicine Surgery And Obstetrics">Medicine Surgery And Obstetrics</option>
                                                <option value="Medicine">Medicine</option>
                                                <option value="Microbiology And Virology">Microbiology And Virology</option>
                                                <option value="Microbiology">Microbiology</option>
                                                <option value="Modern Language">Modern Language</option>
                                                <option value="Music">Music</option>
                                                <option value="Naval Architecture And Marine Engineering(Name)">Naval Architecture And Marine Engineering(Name)</option>
                                                <option value="Neuroscience">Neuroscience</option>
                                                <option value="Nutrition And Food Technology">Nutrition And Food Technology</option>
                                                <option value="Others">Others</option>
                                                <option value="Pali(Oriental Language)">Pali(Oriental Language)</option>
                                                <option value="Parasitology">Parasitology</option>
                                                <option value="Pathology And Paracytology">Pathology And Paracytology</option>
                                                <option value="Pathology">Pathology</option>
                                                <option value="Peace And Conflict">Peace And Conflict</option>
                                                <option value="Persian Language And Literature">Persian Language And Literature</option>
                                                <option value="Petroleum And Mineral Resources Engineering(Pmre)">Petroleum And Mineral Resources Engineering(Pmre)</option>
                                                <option value="Petroleum And Mining Engineering(Pme)">Petroleum And Mining Engineering(Pme)</option>
                                                <option value="Pharmacology And Toxicology">Pharmacology And Toxicology</option>
                                                <option value="Pharmacology">Pharmacology</option>
                                                <option value="Pharmacy">Pharmacy</option>
                                                <option value="Philosophy">Philosophy</option>
                                                <option value="Physical Education And Sports Science(Pess)">Physical Education And Sports Science(Pess)</option>
                                                <option value="Physical Science">Physical Science</option>
                                                <option value="Physics">Physics</option>
                                                <option value="Physiology And Pharmacology">Physiology And Pharmacology</option>
                                                <option value="Physiology">Physiology</option>
                                                <option value="Plant Pathology">Plant Pathology</option>
                                                <option value="Political Science">Political Science</option>
                                                <option value="Political Studies And Public Adm">Political Studies And Public Adm</option>
                                                <option value="Population Science And Human Resource Development">Population Science And Human Resource Development</option>
                                                <option value="Population Science">Population Science</option>
                                                <option value="Post Havest Technology">Post Havest Technology</option>
                                                <option value="Poultry Science">Poultry Science</option>
                                                <option value="Production Economics">Production Economics</option>
                                                <option value="Psychology">Psychology</option>
                                                <option value="Public Administration">Public Administration</option>
                                                <option value="Public Finance">Public Finance</option>
                                                <option value="Public Health">Public Health</option>
                                                <option value="Resource Mgt">Resource Mgt</option>
                                                <option value="Sanskrit">Sanskrit</option>
                                                <option value="Seed Science And Technology">Seed Science And Technology</option>
                                                <option value="Social Science">Social Science</option>
                                                <option value="Social Studies">Social Studies</option>
                                                <option value="Social Welfare">Social Welfare</option>
                                                <option value="Social Work">Social Work</option>
                                                <option value="Sociology">Sociology</option>
                                                <option value="Soil Science">Soil Science</option>
                                                <option value="Statistics">Statistics</option>
                                                <option value="Surgery And Obstetrics">Surgery And Obstetrics</option>
                                                <option value="Surgery And Theriogenology">Surgery And Theriogenology</option>
                                                <option value="Television And Film">Television And Film</option>
                                                <option value="Textile Technology">Textile Technology</option>
                                                <option value="Theatre And Performance Studies">Theatre And Performance Studies</option>
                                                <option value="Theatre">Theatre</option>
                                                <option value="Tourism And Hospitality Mgt">Tourism And Hospitality Mgt</option>
                                                <option value="Urban And Regional Planning(Urp)">Urban And Regional Planning(Urp)</option>
                                                <option value="Urban And Rural Planning">Urban And Rural Planning</option>
                                                <option value="Urdu">Urdu</option>
                                                <option value="Vetenary Science">Vetenary Science</option>
                                                <option value="Water Resources Engineering(Wre)">Water Resources Engineering(Wre)</option>
                                                <option value="Water Science">Water Science</option>
                                                <option value="Womens And Gender">Womens And Gender</option>
                                                <option value="World Religions And Culture">World Religions And Culture</option>
                                                <option value="Zoology">Zoology</option>
                                            </select>
                                        </td>
                                        <td width="12%">
                                            <select name="other_graduation_result" id="other_graduation_result" class="form-control">
                                                <option value="0">Select</option>
                                                <option value="grade">Grade</option>
                                                <option value="first">First</option>
                                                <option value="second">Second</option>
                                                <option value="cc">CC</option>
                                            </select>
                                        </td>
                                        <td width="8%">
                                            <input  class="form-control" placeholder="cgpa" type="text" name="other_graduation_cgpa" id="other_graduation_cgpa"/>
                                        </td>
                                        <td width="8%">
                                            <input  class="form-control" placeholder="scale" type="text" name="other_graduation_scale" id="other_graduation_scale"/>
                                        </td>
                                        <td width="11%">
                                            <input  class="form-control" placeholder="marks %" type="text" name="other_graduation_marks" id="other_graduation_marks"/>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="other_graduation_board" id="other_graduation_board" placeholder="University"/>
                                        </td>
                                        <td><input type="text" class="form-control" name="other_graduation_passing_year" id="other_graduation_passing_year" placeholder="Years"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Experience(If Any)</legend>
                            <table width="100%" class="table table-bordered table-striped text-center table-hover">
                                <thead class="bg-light text-dark">
                                <tr>
                                    <th scope="col" width="15%">Organization Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Job Type</th>
                                    <th scope="col" width="25%">Responsibilities</th>
                                    <th scope="col">Joining Date</th>
                                    <th scope="col">Release Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="text" name="eOrganizationNameOne" id="eOrganizationNameOne" class="form-control"/></td>
                                    <td><input type="text" name="edesignationOne" id="edesignationOne" class="form-control"/></td>
                                    <td>
                                        <select name="eJobTypeOne" id="eJobTypeOne" class="form-control">
                                            <option value="0">Select</option>
                                            <option value="fulltime">Full Time</option>
                                            <option value="parttime">Part Time</option>
                                            <option value="contractual">Contractual</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="eResponsibilitiesOne" id="eResponsibilitiesOne" class="form-control" placeholder="Maximum 500 Character"/></td>
                                    <td><input type="date" name="eJoiningDateOne" id="eJoiningDateOne" class="form-control"/></td>
                                    <td>
                                        <input type="date" name="eReleaseDateOne" id="eReleaseDateOne" class="form-control"/>
                                        <input type="checkbox" name="eRunningDateOne" id="eRunningDateOne"/> To continue
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="eOrganizationNameTwo" id="eOrganizationNameTwo" class="form-control"/></td>
                                    <td><input type="text" name="edesignationTwo" id="edesignationTwo" class="form-control"/></td>
                                    <td>
                                        <select name="eJobTypeTwo" id="eJobTypeTwo" class="form-control">
                                            <option value="0">Select</option>
                                            <option value="fulltime">Full Time</option>
                                            <option value="parttime">Part Time</option>
                                            <option value="contractual">Contractual</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="eResponsibilitiesTwo" id="eResponsibilitiesTwo" class="form-control" placeholder="Maximum 500 Character"/></td>
                                    <td><input type="date" name="eJoiningDateTwo" id="eJoiningDateTwo" class="form-control"/></td>
                                    <td>
                                        <input type="date" name="eReleaseDateTwo" id="eReleaseDateTwo" class="form-control"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="eOrganizationNameThree" id="eOrganizationNameThree" class="form-control"/></td>
                                    <td><input type="text" name="edesignationThree" id="edesignationThree" class="form-control"/></td>
                                    <td>
                                        <select name="eJobTypeThree" id="eJobTypeThree" class="form-control">
                                            <option value="0">Select</option>
                                            <option value="fulltime">Full Time</option>
                                            <option value="parttime">Part Time</option>
                                            <option value="contractual">Contractual</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="eResponsibilitiesThree" id="eResponsibilitiesThree" class="form-control" placeholder="Maximum 500 Character"/></td>
                                    <td><input type="date" name="eJoiningDateThree" id="eJoiningDateThree" class="form-control"/></td>
                                    <td>
                                        <input type="date" name="eReleaseDateThree" id="eReleaseDateThree" class="form-control"/>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Language Proficiency</legend>
                            <table width="100%" class="table table-bordered table-striped text-center table-hover">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th scope="col">Language Name</th>
                                        <th scope="col">Speaking</th>
                                        <th scope="col">Reading</th>
                                        <th scope="col">Listening</th>
                                        <th scope="col">Writing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Bangla</td>
                                    <td>
                                        <select name="bSpeaking" id="bSpeaking" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="bReading" id="bReading" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="bListening" id="bListening" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="bWriting" id="bWriting" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>English</td>
                                    <td>
                                        <select name="eSpeaking" id="eSpeaking" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="eReading" id="eReading" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="eListening" id="eListening" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="eWriting" id="eWriting" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="other_language" id="other_language"/></td>
                                    <td>
                                        <select name="oSpeaking" id="oSpeaking" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="oReading" id="oReading" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="oListening" id="oListening" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="oWriting" id="oWriting" class="form-control">
                                        <option value="0">--Select--</option>
                                        <option value="H">High</option>
                                        <option value="M">Medium</option>
                                        <option value="L">Low</option>
                                        </select>
                                    </td>
                                </tr>

                            </table>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Skills</legend>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea class="form-control" name="skills" id="skills" placeholder="Please input your skills Like: C , C++ , C# , Java, Php, Python, Mysql, Software Testing , Customer Management, CA, MS office , Marketing"></textarea>
                                </div>
                            </div>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">References (Name, Address)</legend>
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="font-weight-bold text-secondary">References 1<span class="text-danger">*</span></span>
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-6">
                                            <label for="referencesNameOne">Name<span class="required text-danger">*</span></label>
                                            <input type="text" id="referencesNameOne" name="referencesNameOne"  class="form-control">
                                            <span class="text-danger" id="referencesNameOne_check">{{ $errors->has('referencesNameOne') ? $errors->first('referencesNameOne') : ' ' }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="referencesMobileOne">Mobile<span class="required text-danger">*</span></label>
                                            <input maxlength="11" type="text" id="referencesMobileOne" name="referencesMobileOne"  class="form-control">
                                            <span class="text-danger" id="referencesMobileOne_check">{{ $errors->has('referencesMobileOne') ? $errors->first('referencesMobileOne') : ' ' }}</span>
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <label for="referencesEmailOne">Email<span class="required text-danger">*</span></label>
                                            <input type="text" id="referencesEmailOne" name="referencesEmailOne"  class="form-control">
                                            <span class="text-danger" id="referencesEmailOne_check">{{ $errors->has('referencesEmailOne') ? $errors->first('referencesEmailOne') : ' ' }}</span>
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <label for="referencesAddressOne">Address (max 200 char)<span class="required text-danger">*</span></label>
                                            <textarea maxlength="200" class="form-control" name="referencesAddressOne" id="referencesAddressOne"></textarea>
                                            <span class="text-danger" id="referencesAddressOne_check">{{ $errors->has('referencesAddressOne') ? $errors->first('referencesAddressOne') : ' ' }}</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-5 offset-md-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="font-weight-bold text-secondary">References 2</span>
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-6">
                                            <label for="referencesNameTwo">Name</label>
                                            <input type="text" id="referencesNameTwo" name="referencesNameTwo" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="referencesMobileTwo">Mobile</label>
                                            <input type="text" id="referencesMobileTwo" name="referencesMobileTwo"  class="form-control">
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <label for="referencesEmailTwo">Email</label>
                                            <input type="text" id="referencesEmailTwo" name="referencesEmailTwo"  class="form-control">
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <label for="referencesAddressTwo">Address (max 200 char)</label>
                                            <textarea class="form-control" name="referencesAddressTwo" id="referencesAddressTwo"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Photogrphy<span class="text-danger">*</span></legend>
                            <div class="form-group row">
                                <div class="col-md-5">

                                    <div class="form-group text-center">
                                        <img src="{{ asset('/front-end/image/male.png') }}" alt="User Photo">
                                        <p class="empty-message">Please upload photo </p>
                                        <span class="text-danger" id="photo_check">{{ $errors->has('photo') ? $errors->first('photo') : ' ' }}</span>
                                        <input class="file-back form-control" id="photo" name="photo" type="file" accept="image/*"><br/>

                                    </div>

                                </div>
                                <div class="col-md-5 offset-md-1">

                                    <div class="form-group text-center signature">
                                        <img style="border:1px solid #ddd;" src="{{ asset('/front-end/image/signature.jpg') }}" alt="User Photo">
                                        <p class="empty-message"> Please upload Signature here </p>
                                        <span class="text-danger" id="signature_check">{{ $errors->has('signature') ? $errors->first('signature') : ' ' }}</span>
                                        <input class="file-back form-control" id="signature" name="signature" type="file" accept="image/*"><br/>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 offset-md-4 text-center">
                                    <input type="submit" class="btn btn-success" name="applyOnlineSubmit" id="applyOnlineSubmit" value="Submit">
                                    <a class="btn btn-secondary" href="{{ url('career')}}">Back</a>
                                </div>

                            </div>
                        </fieldset>

                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

    </script>
@endsection