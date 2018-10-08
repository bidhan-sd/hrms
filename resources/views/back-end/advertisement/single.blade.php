@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Single Advertisement</h2>
            <a href="{{ route('manage-advertisement') }}" class="btn btn-success btn-sm">Manage Advertisement</a>
        </div>
        <div class="main_content bg-white">
            <h2 class="text-success">{{ $advertisement->post_name }}</h2>

            <h5 class="font-weight-bold">{{ $advertisement->company_name }}</h5>

            <p class="font-weight-bold">Vacancy : <span class="font-weight-light">{{ $advertisement->vacancy }}</span></p>

            <p class="font-weight-bold">Job Responsibilities</p>
            <?php
                $job_responsibilities = $advertisement->job_responsibilities;
                $job_responsibilitiess = (explode("</li>",$job_responsibilities));
                foreach($job_responsibilitiess as $job_responsibiliti){?>
                <?php echo $job_responsibiliti; ?> <?php }  ?>

            <p class="font-weight-bold">Employment Status :  <span class="font-weight-light"> {{ $advertisement->employee_status }}</span></p>

            <p class="font-weight-bold">Education Requirements</p>
            <?php
                $educational_requirement = $advertisement->educational_requirement;
                $educational_requirements = (explode("</li>",$educational_requirement));
                foreach($educational_requirements as $educational_requiremen){ ?>
                <?php echo $educational_requiremen; ?><?php } ?>

            <p class="font-weight-bold">Experience Requirements</p>
            <?php $experience_requirement = $advertisement->experience_requirement;
                $experience_requirements = (explode("</li>",$experience_requirement));
                foreach($experience_requirements as $experience_requiremen){ ?>
                <?php echo $experience_requiremen; ?> <?php } ?>

            <p class="font-weight-bold">Additional Requirements</p>
            <?php  $additional_requirement = $advertisement->additional_requirement;
                $additional_requirements = (explode("</li>",$additional_requirement));
                foreach($additional_requirements as $additional_requiremen){?>
                <?php echo $additional_requiremen; ?> <?php } ?>

            <p class="font-weight-bold">Job Location : <span class="font-weight-light">{{ $advertisement->job_location }}</span></p>

            <p class="font-weight-bold">Salary : <span class="font-weight-light">{{ $advertisement->salary }}</span></p>

            <p class="font-weight-bold">Other & benefit</p>
                <?php $benefit = $advertisement->other_benefit;
                $benefits = (explode("</li>",$benefit));
                foreach($benefits as $benefi){ ?>  <?php echo $benefi; ?> <?php } ?>

            <p class="font-weight-bold">Company Info</p>
                <?php $str = $advertisement->company_info;
                $data = (explode("<br/>",$str));
                foreach($data as $da){ ?> <?php echo $da; ?> <?php }  ?>
        </div>
    </div>
@endsection