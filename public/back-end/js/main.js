$(function() {

	$("#post_name_error").hide();
	$("#company_name_error").hide();
	$("#vacancy_number_error").hide();
	$("#job_responsibilities_error").hide();
	$("#employee_status_error").hide();
	$("#job_location_error").hide();
	$("#salary_error").hide();
	$("#advertisement_date_error").hide();
	$("#deadline_error").hide();

	var error_postName = false;
	var error_companyName = false;
	var error_vacancy = false;
	var error_job_responsibilities = false;
	var error_employee_status = false;
	var error_job_location = false;
	var error_salary = false;
	var error_advertisement_date = false;
	var error_deadline_date = false;

	$("#post_name").focusout(function() {
		check_post_name();
	});

	$("#company_name").focusout(function() {
		check_company_name();
	});

	$("#vacancy").focusout(function() {
		vacancy_number();
	});

	/*$("#editor").focusout(function() {
		job_responsibilities();
	});*/

	$("#employee_status").focusout(function() {
		employee_status();
	});
	$("#job_location").focusout(function() {
		job_location();
	});
	$("#salary").focusout(function() {
		salary();
	});
	$("#advertisement_date").focusout(function() {
		advertisement_date();
	});

	$("#deadline").focusout(function() {
		deadline_date();
	});

	$("#checkAll").click(function() {
		$("#short_list").toggleClass("showHidden");
		$('input:checkbox').not(this).prop('checked', this.checked);
	});

	$("#filter_name_of_exam").change(function () {
		console.log($('#filter_name_of_exam').val());
		var data = $(this).val();
		$('#filter_exam_group').html('');
		if(data == 0){

		}else if (data == "ssc" || data == "dakhil"  || data == "o level"  || data == "hsc"  || data == "alim"  || data == "a level"  || data == "diploma" ) {

			$('#filter_exam_group').append('<option value="science">Science</option>');
			$('#filter_exam_group').append('<option value="commerce">Commerce</option>');
			$('#filter_exam_group').append('<option value="arts">Arts</option>');
			$('#filter_exam_group').append('<option value="general">General</option>');
			$('#filter_exam_group').append('<option value="others">Others</option>');

		} else {
			$('#filter_exam_group').append('<option value="Accounting & Information System">Accounting & Information System</option>');
			$('#filter_exam_group').append('<option value="Accounting">Accounting</option>');
			$('#filter_exam_group').append('<option value="Agribusiness And Marketing">Agribusiness And Marketing</option>');
			$('#filter_exam_group').append('<option value="Agricultural Botany">Agricultural Botany</option>');
			$('#filter_exam_group').append('<option value="Agricultural Extension And Information System">Agricultural Extension And Information System</option>');
			$('#filter_exam_group').append('<option value="Agricultural Extension And Rural Development">Agricultural Extension And Rural Development</option>');
			$('#filter_exam_group').append('<option value="Agricultural Extension Education">Agricultural Extension Education</option>');
			$('#filter_exam_group').append('<option value="Agricultural Statistics">Agricultural Statistics</option>');
			$('#filter_exam_group').append('<option value="Agriculture And Mineral Sciences">Agriculture And Mineral Sciences</option>');
			$('#filter_exam_group').append('<option value="Agriculture Chemistry">Agriculture Chemistry</option>');
			$('#filter_exam_group').append('<option value="Agriculture Co-Operatives">Agriculture Co-Operatives</option>');
			$('#filter_exam_group').append('<option value="Agriculture Economics">Agriculture Economics</option>');
			$('#filter_exam_group').append('<option value="Agriculture Engineering">Agriculture Engineering</option>');
			$('#filter_exam_group').append('<option value="Agriculture Finance">Agriculture Finance</option>');
			$('#filter_exam_group').append('<option value="Agriculture Marketing">Agriculture Marketing</option>');
			$('#filter_exam_group').append('<option value="Agriculture Science">Agriculture Science</option>');
			$('#filter_exam_group').append('<option value="Agriculture Soil Science">Agriculture Soil Science</option>');
			$('#filter_exam_group').append('<option value="Agriculture">Agriculture</option>');
			$('#filter_exam_group').append('<option value="Agroforestry">Agroforestry</option>');
			$('#filter_exam_group').append('<option value="Agronomy And Agricultural Extension">Agronomy And Agricultural Extension</option>');
			$('#filter_exam_group').append('<option value="Agronomy">Agronomy</option>');
			$('#filter_exam_group').append('<option value="Agrotechnology">Agrotechnology</option>');
			$('#filter_exam_group').append('<option value="Al-Fiqh">Al-Fiqh</option>');
			$('#filter_exam_group').append('<option value="Al-Hadith And Islamic Studies">Al-Hadith And Islamic Studies</option>');
			$('#filter_exam_group').append('<option value="Al-Quran And Islamic Studies">Al-Quran And Islamic Studies</option>');
			$('#filter_exam_group').append('<option value="Anatomy And Histology">Anatomy And Histology</option>');
			$('#filter_exam_group').append('<option value="Animal Husbandry And Veterinary Science">Animal Husbandry And Veterinary Science</option>');
			$('#filter_exam_group').append('<option value="Animal Husbandry">Animal Husbandry</option>');
			$('#filter_exam_group').append('<option value="Animal Nutrition">Animal Nutrition</option>');
			$('#filter_exam_group').append('<option value="Animal Production And Biproduction Technology">Animal Production And Biproduction Technology</option>');
			$('#filter_exam_group').append('<option value="Animal Production And Management">Animal Production And Management</option>');
			$('#filter_exam_group').append('<option value="Animal Science And Nutrition">Animal Science And Nutrition</option>');
			$('#filter_exam_group').append('<option value="Animal Science">Animal Science</option>');
			$('#filter_exam_group').append('<option value="Anthropology">Anthropology</option>');
			$('#filter_exam_group').append('<option value="Applied And Environmental Chemistry">Applied And Environmental Chemistry</option>');
			$('#filter_exam_group').append('<option value="Applied Chemistry And Chemical Engineering">Applied Chemistry And Chemical Engineering</option>');
			$('#filter_exam_group').append('<option value="Applied Chemistry">Applied Chemistry</option>');
			$('#filter_exam_group').append('<option value="Applied Linguisties & Elt">Applied Linguisties & Elt</option>');
			$('#filter_exam_group').append('<option value="Applied Mathematics">Applied Mathematics</option>');
			$('#filter_exam_group').append('<option value="Applied Physics And Electronic Engineering">Applied Physics And Electronic Engineering</option>');
			$('#filter_exam_group').append('<option value="Applied Physics">Applied Physics</option>');
			$('#filter_exam_group').append('<option value="Applied Sciences And Technology">Applied Sciences And Technology</option>');
			$('#filter_exam_group').append('<option value="Applied Statistics">Applied Statistics</option>');
			$('#filter_exam_group').append('<option value="Aquaculture">Aquaculture</option>');
			$('#filter_exam_group').append('<option value="Arabic">Arabic</option>');
			$('#filter_exam_group').append('<option value="Archaeology">Archaeology</option>');
			$('#filter_exam_group').append('<option value="Architecture">Architecture</option>');
			$('#filter_exam_group').append('<option value="Arts">Arts</option>');

			$('#filter_exam_group').append('<option value="Astronomy">Astronomy</option>');

			$('#filter_exam_group').append('<option value="Bangla">Bangla</option>');
			$('#filter_exam_group').append('<option value="Banking And Insurance">Banking And Insurance</option>');
			$('#filter_exam_group').append('<option value="Banking">Banking</option>');
			$('#filter_exam_group').append('<option value="Basic Science">Basic Science</option>');
			$('#filter_exam_group').append('<option value="Biochemistry And Food Analysis">Biochemistry And Food Analysis</option>');
			$('#filter_exam_group').append('<option value="Biochemistry And Molicular Biology">Biochemistry And Molicular Biology</option>');
			$('#filter_exam_group').append('<option value="Biochemistry">Biochemistry</option>');
			$('#filter_exam_group').append('<option value="Biomedical Engineering">Biomedical Engineering</option>');
			$('#filter_exam_group').append('<option value="Biomedical Phy And Tech">Biomedical Phy And Tech</option>');
			$('#filter_exam_group').append('<option value="Biotechnology And Genetic Engineering">Biotechnology And Genetic Engineering</option>');
			$('#filter_exam_group').append('<option value="Biotechnology">Biotechnology</option>');
			$('#filter_exam_group').append('<option value="Botany And Crop Science">Botany And Crop Science</option>');
			$('#filter_exam_group').append('<option value="Botany">Botany</option>');
			$('#filter_exam_group').append('<option value="Buddist Studies">Buddist Studies</option>');
			$('#filter_exam_group').append('<option value="Business Administration">Business Administration</option>');
			$('#filter_exam_group').append('<option value="Chemical">Chemical</option>');
			$('#filter_exam_group').append('<option value="Chemistry">Chemistry</option>');
			$('#filter_exam_group').append('<option value="Civil">Civil</option>');
			$('#filter_exam_group').append('<option value="Clinical Psychology">Clinical Psychology</option>');
			$('#filter_exam_group').append('<option value="Communication Disorder">Communication Disorder</option>');
			$('#filter_exam_group').append('<option value="Community Health And Hygiene">Community Health And Hygiene</option>');
			$('#filter_exam_group').append('<option value="Computer Science And Eng.">Computer Science And Eng.</option>');
			$('#filter_exam_group').append('<option value="Computer Science">Computer Science</option>');
			$('#filter_exam_group').append('<option value="Criminology And Police Science">Criminology And Police Science</option>');
			$('#filter_exam_group').append('<option value="Criminology">Criminology</option>');
			$('#filter_exam_group').append('<option value="Crop Botany">Crop Botany</option>');
			$('#filter_exam_group').append('<option value="Crop Science And Technology">Crop Science And Technology</option>');
			$('#filter_exam_group').append('<option value="Dairy Science">Dairy Science</option>');
			$('#filter_exam_group').append('<option value="Dawah And Islamic Studies">Dawah And Islamic Studies</option>');
			$('#filter_exam_group').append('<option value="Development And Proverty Studies">Development And Proverty Studies</option>');
			$('#filter_exam_group').append('<option value="Development Studies">Development Studies</option>');
			$('#filter_exam_group').append('<option value="Disaster Management">Disaster Management</option>');
			$('#filter_exam_group').append('<option value="Disaster Risk Mgt">Disaster Risk Mgt</option>');
			$('#filter_exam_group').append('<option value="Drama And Dramatics">Drama And Dramatics</option>');
			$('#filter_exam_group').append('<option value="Drama And Music">Drama And Music</option>');
			$('#filter_exam_group').append('<option value="Drama">Drama</option>');
			$('#filter_exam_group').append('<option value="Ecology">Ecology</option>');
			$('#filter_exam_group').append('<option value="Economics And Sociology">Economics And Sociology</option>');
			$('#filter_exam_group').append('<option value="Economics">Economics</option>');
			$('#filter_exam_group').append('<option value="Education">Education</option>');
			$('#filter_exam_group').append('<option value="Electrical And Electronics">Electrical And Electronics</option>');
			$('#filter_exam_group').append('<option value="Electrical">Electrical</option>');
			$('#filter_exam_group').append('<option value="Electronics And Communication Engineering">Electronics And Communication Engineering</option>');
			$('#filter_exam_group').append('<option value="Electronics">Electronics</option>');
			$('#filter_exam_group').append('<option value="Emergency Mgt">Emergency Mgt</option>');
			$('#filter_exam_group').append('<option value="Engineering">Engineering</option>');
			$('#filter_exam_group').append('<option value="English">English</option>');
			$('#filter_exam_group').append('<option value="Entomology">Entomology</option>');
			$('#filter_exam_group').append('<option value="Environmental Sanitation">Environmental Sanitation</option>');
			$('#filter_exam_group').append('<option value="Environmental Science And Resource Management">Environmental Science And Resource Management</option>');
			$('#filter_exam_group').append('<option value="Environmental Science">Environmental Science</option>');
			$('#filter_exam_group').append('<option value="Epidemiology">Epidemiology</option>');
			$('#filter_exam_group').append('<option value="Farm Power And Machinery">Farm Power And Machinery</option>');
			$('#filter_exam_group').append('<option value="Farm Stucture And Environmental Engineering">Farm Stucture And Environmental Engineering</option>');
			$('#filter_exam_group').append('<option value="Farsi Language And Literature">Farsi Language And Literature</option>');
			$('#filter_exam_group').append('<option value="Fesheries Technology">Fesheries Technology</option>');
			$('#filter_exam_group').append('<option value="Finance And Banking">Finance And Banking</option>');
			$('#filter_exam_group').append('<option value="Finance">Finance</option>');
			$('#filter_exam_group').append('<option value="Fine Art">Fine Art</option>');
			$('#filter_exam_group').append('<option value="Fisheries And Marine Technology">Fisheries And Marine Technology</option>');
			$('#filter_exam_group').append('<option value="Fisheries Biology And Genetics">Fisheries Biology And Genetics</option>');
			$('#filter_exam_group').append('<option value="Fisheries Mgt">Fisheries Mgt</option>');
			$('#filter_exam_group').append('<option value="Fisheries">Fisheries</option>');
			$('#filter_exam_group').append('<option value="Folklore">Folklore</option>');
			$('#filter_exam_group').append('<option value="Food And Nutrition">Food And Nutrition</option>');
			$('#filter_exam_group').append('<option value="Food Technology And Engineering">Food Technology And Engineering</option>');
			$('#filter_exam_group').append('<option value="Food Technology And Nutritional Science">Food Technology And Nutritional Science</option>');
			$('#filter_exam_group').append('<option value="Food Technology And Rural Industries">Food Technology And Rural Industries</option>');
			$('#filter_exam_group').append('<option value="Foood Microbiology">Foood Microbiology</option>');
			$('#filter_exam_group').append('<option value="Forestry And Environmental Sciences">Forestry And Environmental Sciences</option>');
			$('#filter_exam_group').append('<option value="Forestry">Forestry</option>');
			$('#filter_exam_group').append('<option value="Foresty And Wood Technology">Foresty And Wood Technology</option>');
			$('#filter_exam_group').append('<option value="Genetic Engineering And Biotechnology">Genetic Engineering And Biotechnology</option>');
			$('#filter_exam_group').append('<option value="Genetics And Animal Breeding">Genetics And Animal Breeding</option>');
			$('#filter_exam_group').append('<option value="Genetics And Plant Breeding">Genetics And Plant Breeding</option>');
			$('#filter_exam_group').append('<option value="Genetics">Genetics</option>');
			$('#filter_exam_group').append('<option value="Geo Information">Geo Information</option>');
			$('#filter_exam_group').append('<option value="Geochemistry">Geochemistry</option>');
			$('#filter_exam_group').append('<option value="Geography">Geography</option>');
			$('#filter_exam_group').append('<option value="Geological Sciences">Geological Sciences</option>');
			$('#filter_exam_group').append('<option value="Geology And Mining">Geology And Mining</option>');
			$('#filter_exam_group').append('<option value="Geology">Geology</option>');
			$('#filter_exam_group').append('<option value="Glass And Ceramic Engineering">Glass And Ceramic Engineering</option>');
			$('#filter_exam_group').append('<option value="Government And Politics">Government And Politics</option>');
			$('#filter_exam_group').append('<option value="Health Economics">Health Economics</option>');
			$('#filter_exam_group').append('<option value="History">History</option>');
			$('#filter_exam_group').append('<option value="Home Economics">Home Economics</option>');
			$('#filter_exam_group').append('<option value="Homeopathy">Homeopathy</option>');
			$('#filter_exam_group').append('<option value="Horticulture">Horticulture</option>');
			$('#filter_exam_group').append('<option value="Human Nurition And Dietetics">Human Nurition And Dietetics</option>');
			$('#filter_exam_group').append('<option value="Human Resource Management">Human Resource Management</option>');
			$('#filter_exam_group').append('<option value="Human Right">Human Right</option>');
			$('#filter_exam_group').append('<option value="Humanities(Hum)">Humanities(Hum)</option>');
			$('#filter_exam_group').append('<option value="Industrial Production Engineering(Ipe)">Industrial Production Engineering(Ipe)</option>');
			$('#filter_exam_group').append('<option value="Industrial">Industrial</option>');
			$('#filter_exam_group').append('<option value="Info. Sc. And  Library Management">Info. Sc. And  Library Management</option>');
			$('#filter_exam_group').append('<option value="Information And Commun Eng">Information And Commun Eng</option>');
			$('#filter_exam_group').append('<option value="International Business">International Business</option>');
			$('#filter_exam_group').append('<option value="International Relation">International Relation</option>');
			$('#filter_exam_group').append('<option value="Irrigation And Water Management">Irrigation And Water Management</option>');
			$('#filter_exam_group').append('<option value="Is And Library Mgt">Is And Library Mgt</option>');
			$('#filter_exam_group').append('<option value="Islamic History And Culture">Islamic History And Culture</option>');
			$('#filter_exam_group').append('<option value="Islamic Philosophy">Islamic Philosophy</option>');
			$('#filter_exam_group').append('<option value="Islamic Studies">Islamic Studies</option>');
			$('#filter_exam_group').append('<option value="Journalism And Media Studies">Journalism And Media Studies</option>');
			$('#filter_exam_group').append('<option value="Journalism">Journalism</option>');
			$('#filter_exam_group').append('<option value="Laguages">Laguages</option>');
			$('#filter_exam_group').append('<option value="Law And Muslim Jurisprudence">Law And Muslim Jurisprudence</option>');
			$('#filter_exam_group').append('<option value="Law">Law</option>');
			$('#filter_exam_group').append('<option value="Leather Technology">Leather Technology</option>');
			$('#filter_exam_group').append('<option value="Life Sciences">Life Sciences</option>');
			$('#filter_exam_group').append('<option value="Linguistics">Linguistics</option>');
			$('#filter_exam_group').append('<option value="Livestock">Livestock</option>');
			$('#filter_exam_group').append('<option value="Management And Business Administration">Management And Business Administration</option>');
			$('#filter_exam_group').append('<option value="Management And Finance">Management And Finance</option>');
			$('#filter_exam_group').append('<option value="Management Information System">Management Information System</option>');
			$('#filter_exam_group').append('<option value="Management">Management</option>');
			$('#filter_exam_group').append('<option value="Marine Fisheries And Oceanography">Marine Fisheries And Oceanography</option>');
			$('#filter_exam_group').append('<option value="Marine">Marine</option>');
			$('#filter_exam_group').append('<option value="Marketing">Marketing</option>');
			$('#filter_exam_group').append('<option value="Mass Commn. And Journalism">Mass Commn. And Journalism</option>');
			$('#filter_exam_group').append('<option value="Materials And Metallurgical Engineering(Mme)">Materials And Metallurgical Engineering(Mme)</option>');
			$('#filter_exam_group').append('<option value="Materials Science">Materials Science</option>');
			$('#filter_exam_group').append('<option value="Mathematics">Mathematics</option>');
			$('#filter_exam_group').append('<option value="Mbm">Mbm</option>');
			$('#filter_exam_group').append('<option value="Mechanical">Mechanical</option>');
			$('#filter_exam_group').append('<option value="Media And Journalism">Media And Journalism</option>');
			$('#filter_exam_group').append('<option value="Medical Sciences">Medical Sciences</option>');
			$('#filter_exam_group').append('<option value="Medicine Surgery And Obstetrics">Medicine Surgery And Obstetrics</option>');
			$('#filter_exam_group').append('<option value="Medicine">Medicine</option>');
			$('#filter_exam_group').append('<option value="Microbiology And Virology">Microbiology And Virology</option>');
			$('#filter_exam_group').append('<option value="Microbiology">Microbiology</option>');
			$('#filter_exam_group').append('<option value="Modern Language">Modern Language</option>');
			$('#filter_exam_group').append('<option value="Music">Music</option>');
			$('#filter_exam_group').append('<option value="Naval Architecture And Marine Engineering(Name)">Naval Architecture And Marine Engineering(Name)</option>');
			$('#filter_exam_group').append('<option value="Neuroscience">Neuroscience</option>');
			$('#filter_exam_group').append('<option value="Nutrition And Food Technology">Nutrition And Food Technology</option>');
			$('#filter_exam_group').append('<option value="Others">Others</option>');
			$('#filter_exam_group').append('<option value="Pali(Oriental Language)">Pali(Oriental Language)</option>');
			$('#filter_exam_group').append('<option value="Parasitology">Parasitology</option>');
			$('#filter_exam_group').append('<option value="Pathology And Paracytology">Pathology And Paracytology</option>');
			$('#filter_exam_group').append('<option value="Pathology">Pathology</option>');
			$('#filter_exam_group').append('<option value="Peace And Conflict">Peace And Conflict</option>');
			$('#filter_exam_group').append('<option value="Persian Language And Literature">Persian Language And Literature</option>');
			$('#filter_exam_group').append('<option value="Petroleum And Mineral Resources Engineering(Pmre)">Petroleum And Mineral Resources Engineering(Pmre)</option>');
			$('#filter_exam_group').append('<option value="Petroleum And Mining Engineering(Pme)">Petroleum And Mining Engineering(Pme)</option>');
			$('#filter_exam_group').append('<option value="Pharmacology And Toxicology">Pharmacology And Toxicology</option>');
			$('#filter_exam_group').append('<option value="Pharmacology">Pharmacology</option>');
			$('#filter_exam_group').append('<option value="Pharmacy">Pharmacy</option>');
			$('#filter_exam_group').append('<option value="Philosophy">Philosophy</option>');
			$('#filter_exam_group').append('<option value="Physical Education And Sports Science(Pess)">Physical Education And Sports Science(Pess)</option>');
			$('#filter_exam_group').append('<option value="Physical Science">Physical Science</option>');
			$('#filter_exam_group').append('<option value="Physics">Physics</option>');
			$('#filter_exam_group').append('<option value="Physiology And Pharmacology">Physiology And Pharmacology</option>');
			$('#filter_exam_group').append('<option value="Physiology">Physiology</option>');
			$('#filter_exam_group').append('<option value="Plant Pathology">Plant Pathology</option>');
			$('#filter_exam_group').append('<option value="Political Science">Political Science</option>');
			$('#filter_exam_group').append('<option value="Political Studies And Public Adm">Political Studies And Public Adm</option>');
			$('#filter_exam_group').append('<option value="Population Science And Human Resource Development">Population Science And Human Resource Development</option>');
			$('#filter_exam_group').append('<option value="Population Science">Population Science</option>');
			$('#filter_exam_group').append('<option value="Post Havest Technology">Post Havest Technology</option>');
			$('#filter_exam_group').append('<option value="Poultry Science">Poultry Science</option>');
			$('#filter_exam_group').append('<option value="Production Economics">Production Economics</option>');
			$('#filter_exam_group').append('<option value="Psychology">Psychology</option>');
			$('#filter_exam_group').append('<option value="Public Administration">Public Administration</option>');
			$('#filter_exam_group').append('<option value="Public Finance">Public Finance</option>');
			$('#filter_exam_group').append('<option value="Public Health">Public Health</option>');
			$('#filter_exam_group').append('<option value="Resource Mgt">Resource Mgt</option>');
			$('#filter_exam_group').append('<option value="Sanskrit">Sanskrit</option>');
			$('#filter_exam_group').append('<option value="Seed Science And Technology">Seed Science And Technology</option>');
			$('#filter_exam_group').append('<option value="Social Science">Social Science</option>');
			$('#filter_exam_group').append('<option value="Social Studies">Social Studies</option>');
			$('#filter_exam_group').append('<option value="Social Welfare">Social Welfare</option>');
			$('#filter_exam_group').append('<option value="Social Work">Social Work</option>');
			$('#filter_exam_group').append('<option value="Sociology">Sociology</option>');
			$('#filter_exam_group').append('<option value="Soil Science">Soil Science</option>');
			$('#filter_exam_group').append('<option value="Statistics">Statistics</option>');
			$('#filter_exam_group').append('<option value="Surgery And Obstetrics">Surgery And Obstetrics</option>');
			$('#filter_exam_group').append('<option value="Surgery And Theriogenology">Surgery And Theriogenology</option>');
			$('#filter_exam_group').append('<option value="Television And Film">Television And Film</option>');
			$('#filter_exam_group').append('<option value="Textile Technology">Textile Technology</option>');
			$('#filter_exam_group').append('<option value="Theatre And Performance Studies">Theatre And Performance Studies</option>');
			$('#filter_exam_group').append('<option value="Theatre">Theatre</option>');
			$('#filter_exam_group').append('<option value="Tourism And Hospitality Mgt">Tourism And Hospitality Mgt</option>');
			$('#filter_exam_group').append('<option value="Urban And Regional Planning(Urp)">Urban And Regional Planning(Urp)</option>');
			$('#filter_exam_group').append('<option value="Urban And Rural Planning">Urban And Rural Planning</option>');
			$('#filter_exam_group').append('<option value="Urdu">Urdu</option>');
			$('#filter_exam_group').append('<option value="Vetenary Science">Vetenary Science</option>');
			$('#filter_exam_group').append('<option value="Water Resources Engineering(Wre)">Water Resources Engineering(Wre)</option>');
			$('#filter_exam_group').append('<option value="Water Science">Water Science</option>');
			$('#filter_exam_group').append('<option value="Womens And Gender">Womens And Gender</option>');
			$('#filter_exam_group').append('<option value="World Religions And Culture">World Religions And Culture</option>');
			$('#filter_exam_group').append('<option value="Zoology">Zoology</option>');
		}
	});






	$("#singleCheckAll").click(function () {
		$("#short_list").toggleClass("showHidden");
	});

	function check_post_name() {
		var post_name_length = $("#post_name").val().length;
		var pattern = new RegExp(/^[a-zA-Z\s\)\(._-]+$/);
		if(post_name_length == 0) {
			$("#post_name_error").html("Input field not empty");
			$("#post_name_error").show();
			error_postName = true;
		}else if(!pattern.test($("#post_name").val())){
			$("#post_name_error").html("Only character!");
			$("#post_name_error").show();
			error_postName = true;
		}else {
			$("#post_name_error").hide();
			error_postName = false;
		}
	}

	function check_company_name() {
		var company_name_length = $("#company_name").val().length;
		var pattern = new RegExp(/^[a-zA-Z0-9\s\)\(._-]+$/);
		if(company_name_length == 0) {
			$("#company_name_error").html("Input field not empty");
			$("#company_name_error").show();
			error_companyName = true;
		}else if(!pattern.test($("#company_name").val())){
			$("#company_name_error").html("Only character and numeric!");
			$("#company_name_error").show();
			error_companyName = true;
		}else {
			$("#company_name_error").hide();
			error_companyName = false;
		}
	}

	function vacancy_number() {
		var vacancy_number = $("#vacancy").val().length;
		var pattern = new RegExp(/^[0-9]+$/);
		if(vacancy_number == 0) {
			$("#vacancy_number_error").html("Input at least 1 digit");
			$("#vacancy_number_error").show();
			error_vacancy = true;
		}else if(!pattern.test($("#vacancy").val())){
			$("#vacancy_number_error").html("Only numeric digit!");
			$("#vacancy_number_error").show();
			error_vacancy = true;
		}else {
			$("#vacancy_number_error").hide();
			error_vacancy = false;
		}
	}

	function job_responsibilities() {
		var job_res = $("#editor").val().length;
		if(job_res == 0) {
			$("#job_responsibilities_error").html("Input field not empty");
			$("#job_responsibilities_error").show();
			error_job_responsibilities = true;
		}else {
			$("#job_responsibilities_error").hide();
			error_job_responsibilities = false;
		}
	}

	function employee_status() {
		var employee_status_length = $("#employee_status").val().length;
		var pattern = new RegExp(/^[a-zA-Z0-9\s\)\(._-]+$/);
		if(employee_status_length == 0) {
			$("#employee_status_error").html("Input field not empty");
			$("#employee_status_error").show();
			error_employee_status = true;
		}else if(!pattern.test($("#employee_status").val())){
			$("#employee_status_error").html("Only character!");
			$("#employee_status_error").show();
			error_employee_status = true;
		}else {
			$("#employee_status_error").hide();
			error_employee_status = false;
		}
	}

	function job_location() {
		var job_location_length = $("#job_location").val().length;
		var pattern = new RegExp(/^[a-zA-Z0-9\s\)\(._-]+$/);
		if(job_location_length == 0) {
			$("#job_location_error").html("Input field not empty");
			$("#job_location_error").show();
			error_job_location = true;
		}else if(!pattern.test($("#job_location").val())){
			$("#job_location_error").html("Only character and numeric!");
			$("#job_location_error").show();
			error_job_location = true;
		}else {
			$("#job_location_error").hide();
			error_job_location = false;
		}
	}

	function salary() {
		var salary_amount = $("#salary").val().length;
		var pattern = new RegExp(/^[a-zA-Z0-9\s\)\(._-]+$/);
		if(salary_amount == 0) {
			$("#salary_error").html("Input field not empty");
			$("#salary_error").show();
			error_salary = true;
		}else if(!pattern.test($("#salary").val())){
			$("#salary_error").html("Only character and numeric");
			$("#salary_error").show();
			error_salary = true;
		}else {
			$("#salary_error").hide();
			error_salary = false;
		}
	}

	function advertisement_date() {
		var job_res = $("#advertisement_date").val().length;
		if(job_res == 0) {
			$("#advertisement_date_error").html("Input field not empty");
			$("#advertisement_date_error").show();
			error_advertisement_date = true;
		}else {
			$("#advertisement_date_error").hide();
			error_advertisement_date = false;
		}
	}

	function deadline_date() {
		var job_res = $("#deadline").val().length;
		if(job_res == 0) {
			$("#deadline_error").html("Input field not empty");
			$("#deadline_error").show();
			error_deadline_date = true;
		}else {
			$("#deadline_error").hide();
			error_deadline_date = false;
		}
	}

	$("#registration_form").submit(function() {
		error_postName = false;
		error_companyName = false;
		error_vacancy = false;
		error_job_responsibilities = false;
		error_employee_status = false;
		error_job_location = false;
		error_salary = false;
		error_advertisement_date = false;
		error_deadline_date = false;

		check_post_name();
		check_company_name();
		vacancy_number();
		job_responsibilities();
		employee_status();
		job_location();
		salary();
		advertisement_date();
		deadline_date();

		if(error_postName == false && error_companyName == false && error_vacancy == false && error_job_responsibilities == false && error_employee_status == false && error_job_location == false && error_salary == false && error_advertisement_date == false && error_deadline_date == false) {
			return true;
		} else {
			return false;
		}

	});
});
