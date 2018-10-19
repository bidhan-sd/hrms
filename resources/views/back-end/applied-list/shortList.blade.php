@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Short List</h2>
        </div>
        <div class="main_content  bg-white">
            <?php $message = Session::get('message') ?>

                @if(isset($message))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                        {{ $message }}
                    </div>
                @endif
            <form action="">
                <table id="" class="display table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>
                                <b>Post Name </b>
                                <select name="filter_post_name" id="filter_post_name" class="form-control">
                                    <option value="0"> Select </option>
                                    <option value="j_engineer">Joinor Soft. Engineer</option>
                                    <option value="s_engineer">Senior Soft. Engineer</option>
                                    <option value="a_engineer">Application Engineer</option>
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
                                    <option value="hindu">Hindu</option>
                                    <option value="muslim">Muslim</option>
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
                                    <option value="dakhel">Dakhel</option>
                                    <option value="0 level">O level</option>
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
                                    <option value="MOthers">Others</option>


                                </select>
                            </td>
                            <td>
                                <b>Group/subject</b>
                                <select name="" id="demo_group" class="form-control"></select>
                                <select name="filter_ssc_hsc_group" id="filter_ssc_hsc_group" class="form-control" style="display:none">
                                    <option value="0">Select</option>
                                    <option value="science">Science</option>
                                    <option value="commerce">Commerce</option>
                                    <option value="arts">Arts</option>
                                    <option value="general">General</option>
                                    <option value="others">Others</option>
                                </select>
                                <select name="filter_honors_masters_group" id="filter_honors_masters_group" class="form-control" style="display:none">
                                    <option value="0">Select</option>
                                    <option value="Accounting &amp; Information System">Accounting &amp; Information System</option>
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
                        </tr>
                    <tbody>
                </table>

                <p>
                    <button type="submit" class="btn btn-success"> <i class="fas fa-search fa-xs"></i> Search</button>
                </p>
            </form>
            {{ Form::open(['route'=>'save-writtenList','method'=>'POST','name'=>'writtenListForm','id'=>'writtenListForm']) }}

            <table id="table_id" class="display table table-bordered table-hover table-striped text-center">
                <thead class="bg-info text-white">
                <tr>
                    <th>All <input type="checkbox" id="checkAll" /> </th>
                    <th>Unique Id</th>
                    <th>Post Name</th>
                    <th>Total Exp.</th>
                    <th>Skills</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shortLists as $shortList)
                    <tr>
                        <td><input type="checkbox" name="checkSingle[]" id="singleCheckAll" value="{{ $shortList->id }}"/></td>
                        <td>{{ $shortList->unique_apply_id }}</td>
                        <td>{{ $shortList->post_name }}</td>
                        <td>@if($shortList->totalExperince == '') 0 @else {{ $shortList->totalExperince }} @endif</td>
                        <td>{{ $shortList->skills }}</td>
                        <td><img src="{{ asset($shortList->photo) }}" width="50" alt="Applicant Image"/></td>

                        <td>
                            <a href="{{ url('single-advertisement',['id' => $shortList->id ]) }}" class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-search-plus"></i>
                            </a>
                            <a onclick="return confirm('Are you sure to delete!'); "  href="{{ url('delete-advertisement',['id' => $shortList->id] ) }}" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <p class="text-right">
                    <input class="btn btn-success btn-sm showHidden" type="submit" name="written_list" id="short_list" value="Written List"/>
                </p>
                <tbody>
            </table>

            {{ Form::close() }}
        </div>
    </div>
@endsection