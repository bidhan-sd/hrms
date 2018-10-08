@extends('front-end.master')
@section('body')
    <div class="front-end-content bg-white pl-4 pt-3 pr-3 pb-3">
        <div class="row">
            <div class="col-md-8">
                <div class="single-advertisement-content">
                    <h4 class="text-success font-weight-bold">{{ $advertisement->post_name}}</h4>
                    <h4 class="text-dark font-weight-bold">{{ $advertisement->company_name}}</h4>
                    <p class="text-dark font-weight-bold">Vacancy : <span class="font-weight-light"> {{ $advertisement->vacancy}} </span></p>
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
                        <div class="text-center border border-info p-4 mb-4">
                            <h4>Read Before Apply</h4>
                            <p><span class="text-danger">*Photograph</span> must be enclosed with the resume. </p>
                            <p>Apply Procedures </p>
                            <a href="{{ route('apply-online',['id' => $advertisement->id ]) }}" class="btn btn-success"> Apply Online </a>
                        </div>
                    <p class="font-weight-bold">Company Info</p>
                    <?php $str = $advertisement->company_info;
                    $data = (explode("<br/>",$str));
                    foreach($data as $da){ ?> <?php echo $da; ?> <?php }  ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-advertisement-rightSidebar">
                    <div class="card">
                        <div class="card-header bg-success text-white font-weight-bold"> <h5>Job Summary</h5> </div>
                        <div class="card-body">
                            <p class="card-text font-weight-bold"> Published on : <span class="font-weight-normal">{{ Carbon\Carbon::parse($advertisement->advertisement_date)->format('F d, Y') }} </span></p>
                            <p class="card-text font-weight-bold"> Vacancy : <span class="font-weight-normal">{{ $advertisement->vacancy }}</span></p>
                            <p class="card-text font-weight-bold"> Employment Status : <span class="font-weight-normal">{{ $advertisement->employee_status }}</span></p>
                            <p class="card-text font-weight-bold"> Gender : <span class="font-weight-normal">{{ $advertisement->gender }}</span></p>
                            <p class="card-text font-weight-bold"> Age : <span class="font-weight-normal"> 25 to 34 years </span></p>
                            <p class="card-text font-weight-bold"> Job Location : <span class="font-weight-normal">{{ $advertisement->job_location }}</span></p>
                            <p class="card-text font-weight-bold"> Salary : <span class="font-weight-normal">{{ $advertisement->salary }}</span></p>
                            <p class="card-text font-weight-bold"> Application Deadline : <span class="font-weight-normal">{{ Carbon\Carbon::parse($advertisement->deadline)->format('F d, Y') }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection