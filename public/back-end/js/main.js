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





	/*$("#filter_name_of_exam").click(function() {
		var data = $("#filter_name_of_exam").val();
		if(data == "ssc"){
			$("#filter_ssc_hsc_group").show();
			$("#filter_honors_masters_group").hide();
		}else if(data == "bsc honors"){
			$("#filter_honors_masters_group").show();
			$("#filter_ssc_hsc_group").hide();
		}
	});*/


	$("#filter_name_of_exam").click(function () {
		var data = $("#filter_name_of_exam").val();
		if (data == "ssc" || data == "dakhel"  || data == "0 level"  || data == "hsc"  || data == "alim"  || data == "a level"  || data == "diploma" ) {
			$("#filter_ssc_hsc_group").show();
			$("#filter_honors_masters_group").hide();
			$("#demo_group").hide();
		} else if (data == "bsc honors" || data == "bsc eng" || data == "bcom honors" || data == "ba honors" || data == "bss honors" || data == "bbs honors" || data == "bed honors" || data == "llb honors" || data == "bba" || data == "bsc" || data == "bcom" || data == "ba" || data == "bss" || data == "bbs" || data == "bed" || data == "b.pharm" || data == "MSc" || data == "MCom" || data == "MBS" || data == "MBA" || data == "MBM" || data == "MSS" || data == "MA" || data == "MEng" || data == "MSS" || data == "MDS" || data == "MED" || data == "M.Pharm" || data == "MOthers") {
			$("#filter_honors_masters_group").show();
			$("#filter_ssc_hsc_group").hide();
			$("#demo_group").hide();
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
