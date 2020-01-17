<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo $title; ?>
    </title>

    <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='assets/build/css/recruitment.css' rel='stylesheet'>
    <link href='assets/build/css/float-label.css' rel='stylesheet'>
    <!-- DataTable -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/@popperjs/core@2.0.0-rc.1"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src='assets/build/js/recruitment.js'></script>
    <script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <h1 class='mr-top'><strong>Teaching Staff Recruitment</strong></h1>
            <div class="col-11 col-sm-9 col-md-7 col-lg-10 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <div id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="user" data-toggle="tooltip" title='Check User'><strong></strong></li>
                                    <li id="personal" data-toggle="tooltip" title='Personal Information'><strong></strong></li>
                                    <li id="communication" data-toggle="tooltip" title='Communication Information'><strong></strong></li>
                                    <li id="education" data-toggle="tooltip" title='Education Information'><strong></strong></li>
                                    <li id="experience" data-toggle="tooltip" title='Experience Information'><strong></strong></li>
                                    <li id="achivement" data-toggle="tooltip" title='Achievements Information'><strong></strong></li>
                                    <li id="joining" data-toggle="tooltip" title='Joining Information'><strong></strong></li>
                                    <li id="confirm" data-toggle="tooltip" title='Finish'><strong></strong></li>
                                </ul>
                                <!-- fieldsets -->
                                <?php if($this->session->flashdata('captcha')){ ?>
                                    <div class="alert alert-danger alert-dismissible col-lg-3 offset-md-4">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Error!</strong>
                                        <?php echo $this->session->flashdata('captcha'); ?>
                                    </div>
                                    <?php } ?>
                                        <fieldset>
                                            <form name='checkUser' action='' method='GET'>
                                                <div class="form-card">
                                                    <div class='offset-4'>
                                                        <h2 class="fs-title">Check User</h2>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                              <label class="has-float-label col-md-6">
                                                                <span id='email_verify'></span>
                                                                <input type="email" id='email_id' name="email_id" class='form-control' value='' placeholder="Enter your e-mail" required />
                                                                <span  for="email">Email</span>
                                                              </label>
                                                              <label class="has-float-label  col-md-6">
                                                                <span id='mobile'></span>
                                                                <span id='mobileValid'></span>
                                                                <span id='phone_verify'></span>
                                                                <input type="text" id='phone' name="phone_no" class='form-control' value='' maxlength='10' placeholder="Enter your mobile no" required/>
                                                                <span class='float-text' for="mobile">Mobile</span>
                                                              </label>            
                                                            </div>                                                           
                                                        </div>
                                                        <!-- <div class="row">
                                                            <div class="col-12">
                                                                <label class="col-3" for="captcha">Captcha <span class="required">*</span></label>
                                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                                   <div class="g-recaptcha" data-sitekey="6LeYqMQUAAAAAN5ESVDHgxWRzZwT3UsbLlmWfVhc"></div>
                                                                </div> 
                                                            </div>
                                                        </div>                                                         -->
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <span class='col-md-6 text-center error'><span class='error'></span></span>
                                                    </div>
                                                </div>
                                            </form>
                                            <input type="button" name="next" id='checkUser' class="next action-button" value="NEXT" />
                                        </fieldset>
                                        <fieldset>
                                            <form name='personalInfo' class='personalInfo' action='' method='GET'>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Personal Information</h2>
                                                    <div class='row'>
                                                            <input type="hidden" class='col-sm-4 col-md-4 personal_id' id='personal_id' value="0" name="personal_id" />
                                                            <div class="col-lg-12">
                                                                <label class="has-float-label col-sm-3 col-md-3">                                                           
                                                                    <select class='list-dt department' id='department' name='department' required>
                                                                        <option value=''>---Select---</option>
                                                                        <?php foreach($getDepartments as $value){ ?>
                                                                        <option value="<?php echo $value->id; ?>"><?php echo $value->dept_name; ?></option>  
                                                                        <?php } ?>                                                              
                                                                    </select>
                                                                    <span class='float-text' for="dept">Department of Assistant Professor in</span>
                                                                </label>
                                                            <!-- </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-12"> -->
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                              <input type="text" class='form-control first_name' id='first_name' name="first_name" placeholder="First Name" required/>
                                                              <span class='float-text' for="fname">First Name</span>
                                                            </label>
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <input type="text" class='form-control last_name' id='last_name' name="last_name" placeholder="Last Name" required/>
                                                                <span class='float-text' for="lname">Last Name</span>
                                                            </label>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row">                                                         
                                                        <div class="col-12">
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <input type="date" class='form-control dob' id='dob' name="dob" value='' placeholder="DOB" required/>
                                                                <span class='float-text' for="dob">DOB</span>
                                                            </label>
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <select class='list-dt gender' id='gender' name='gender' required>
                                                                    <option value="">---Select---</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>                                                                    
                                                                </select>
                                                                <span class='float-text' for="gender">Gender</span>
                                                            </label>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <input type="text" class='form-control father_name' id='father_name' name="father_name" placeholder="Father/Husband Name" required/>
                                                                <span class='float-text' for="fatherName">Father/Husband Name</span>
                                                            </label>
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <select class='list-dt married_status' id='married_status' name='married_status' required>
                                                                    <option value="">---Select---</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Un-Married">Un-Married</option>                                                                    
                                                                </select>
                                                                <span class='float-text' for="married_status">Married Status</span>
                                                            </label>  
                                                            <!-- <label>Married Status<span style='color:red;'>*</span></label>
                                                            <input type="radio" class='col-sm-1 col-md-1 married_status' id='married_status' name="married_status" value='Married' required/> Married
                                                            <input type="radio" class='col-sm-1 col-md-1 married_status' id='married_status' name="married_status" value='Un-Married' required/> Un-Married -->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <input type="text" class='form-control father_occupation' id='father_occupation' name="father_occupation" placeholder="Father/Husband Occupation" required/>
                                                                <span class='float-text' for="father_occupation">Father Occupation</span>
                                                            </label>
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <input type="text" class='form-control nationality' id='nationality' name="nationality" placeholder="Nationality" required/>
                                                                <span class='float-text' for="nationality">Nationality</span>
                                                            </label>
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <input type="text" class='form-control mother_tongue' name="mother_tongue" id='mother_tongue' maxlength='10' placeholder="Mother Tonque" required/>
                                                                <span class='float-text' for="mother_tongue">Mother Tonque</span>
                                                            </label>
                                                            <!-- <select class="list-dt" class='form-control' id='nationality' name='nationality' required>
                                                                <option>Indian</option>
                                                                <option value='Indian'>Indian</option>
                                                            </select> -->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <input type="text" class='form-control religion' name='religion' id='religion' placeholder="Religion" required/>
                                                                <span class='float-text' for="religion">Religion</span>
                                                            </label>
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <select class='list-dt community' id='community' name='community' required>
                                                                <option value="">----- Select community -----</option>
                                                                    <?php
                                                                        foreach($caste as $castes){
                                                                            echo '<option value="'.$castes['ccgroup'].'">'.$castes['ccgroup'].'</option>';
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <span class='float-text' for="community">Community</span>
                                                            </label>
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <select class='list-dt caste' id='caste' name='caste' required>
                                                                <option value="">----- Select caste -----</option>
                                                                    
                                                                </select>
                                                                <span class='float-text' for="caste">Caste</span>
                                                            </label>
                                                            <!-- <label class="has-float-label col-sm-3 col-md-3">
                                                                <input type="test" class='form-control caste' name="caste" id='caste' placeholder="Caste" required/>
                                                                <span class='float-text' for="caste">Caste</span>
                                                            </label> -->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <input type="email" class='form-control' name="email_id" id='personal_email_id' placeholder="Email Id" required/>
                                                                <span class='float-text' for="email_id">Email Id</span>
                                                            </label>
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <input type="text" class='form-control email_id' name="phone_no" id='personal_phone_no' maxlength='10' placeholder="Phone No" required/>
                                                                <span class='float-text' for="phone_no">Phone No</span>
                                                            </label>
                                                            <label class="has-float-label col-sm-3 col-md-3">
                                                                <input type="text" class='form-control native_place' id='native_place' name="native_place" placeholder="Native Place" required/>
                                                                <span class='float-text' for="native_place">Native Place</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row" style='display:none;'>
                                                        <div class="col-12">
                                                            <label>Status</label>
                                                            <select class="list-dt" class='form-control status' id='status' name='status' required>
                                                                <option>---Select---</option>
                                                                <option value='1' selected>Active</option>
                                                                <option value='0'>Deactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <span class='col-md-6 per_error text-center'><span class='per_error'></span></span>
                                                </div>                                                
                                            </form>
                                            <!-- <input type="button" name="previous" class="previous action-button-previous" value="PREVIOUS" />  -->
                                            <input type="submit" name="next" id='personalInfo' class="next action-button" value="NEXT" />

                                        </fieldset>
                                        <fieldset>
                                            <form name='communicationInfo' class='communicationInfo' action='' method='GET' enctype="multipart/form-data">
                                                <div class="form-card">
                                                    <h2 class="fs-title">Communication Information</h2>
                                                    <div class='row'>
                                                        <div class="col-lg-6">
                                                            <h6 class='address'>Present Address:</h6>                                                            
                                                                <input type="hidden" class='col-sm-7 col-md-7' id='type_of_address_1' value='1.Present' name="type_of_address[]" />
                                                                <label class="has-float-label col-sm-6 col-md-6">
                                                                    <input type="text" class="form-control has-feedback-left" name="addr_phone_no[]" id="phone_no_1" maxlength="10" placeholder="Mobile Number">
                                                                    <span class='float-text' for="addr_phone_no">Mobile Number</span>
                                                                </label>                                                               
                                                          
                                                                <label class="has-float-label col-sm-7 col-md-7">
                                                                    <input type="text" class="form-control has-feedback-left" id="street_address_1" name="street_address[]" placeholder="Street address">
                                                                    <span class='float-text' for="street_address_1">Street address</span>
                                                                </label>
                                                                <label class="has-float-label col-sm-7 col-md-7">
                                                                <select class="list-dt country" id="country_1" name="country[]">
                                                                    <option value="India" selected>India</option>
                                                                </select>
                                                                <span class='float-text' for="country_1">Country</span>
                                                                </label>
                                                                <label class="has-float-label col-sm-7 col-md-7">
                                                                <select class="list-dt state_1" id="state_1" name="state[]">
                                                                <option value="">----- Select State -----</option>
                                                                    <?php
                                                                        foreach($state as $states){
                                                                            echo '<option value="'.$states['state'].'">'.$states['state'].'</option>';
                                                                        }
                                                                    ?>                                                                              
                                                                </select>
                                                                <span class='float-text' for="state_1">State</span>
                                                                </label>  
                                                                <label class="has-float-label col-sm-7 col-md-7">
                                                                <select class="list-dt has-feedback-left city_1" id="city_1" name="city[]">
                                                                    <option value="">----- Select City -----</option>
                                                                   
                                                                </select>
                                                                <span class='float-text' for="city_1">City</span>
                                                                </label>
                                                                                                                              
                                                                <label class="has-float-label col-sm-7 col-md-7">
                                                                <input type="text" class="form-control" id="pin_no_1" name="pin_no[]" maxlength="6" placeholder="Pin Code">
                                                                <span class='float-text' for="pin_no">Pin Code</span>
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <label>Same present address as permanent address?*</label>                                                                   
                                                                        <input type="checkbox" class='col-1 form-control' id="copy_address">
                                                                        <span class='error'></span>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <h6 class='address'>Permanent Address:</h6>
                                                                <input type="hidden" class='col-sm-7 col-md-7' id='type_of_address_2' value='2.Permanent' name="type_of_address[]" />
                                                                <label class="has-float-label col-sm-6 col-md-6">
                                                                    <input type="text" class="form-control has-feedback-left" name="addr_phone_no[]" id="phone_no_2" maxlength="10" placeholder="Alternate Mobile Number">
                                                                    <span class='float-text' for="phone_no_2">Alternate Mobile Number</span>
                                                                </label>                                                               
                                                          
                                                                <label class="has-float-label col-sm-7 col-md-7">
                                                                    <input type="text" class="form-control has-feedback-left" id="street_address_2" name="street_address[]" placeholder="Street address">
                                                                    <span class='float-text' for="street_address_2">Street address</span>
                                                                </label>
                                                                <label class="has-float-label col-sm-7 col-md-7">
                                                                    <select class="list-dt" id="country_2" name="country[]">
                                                                        <option value="India" selected>India</option>
                                                                    </select>
                                                                    <span class='float-text' for="country_2">Country</span>
                                                                    </label>
                                                                <label class="has-float-label col-sm-7 col-md-7">
                                                                    <select class="list-dt state_2" id="state_2" name="state[]">
                                                                    <option value="">----- Select State -----</option>
                                                                    <?php
                                                                        foreach($state as $states){
                                                                            echo '<option value="'.$states['state'].'">'.$states['state'].'</option>';
                                                                        }
                                                                    ?>    
                                                                    </select>
                                                                    <span class='float-text' for="state_2">State</span>
                                                                </label>  
                                                                <label class="has-float-label col-sm-7 col-md-7">
                                                                    <select class="list-dt has-feedback-left city_2" id="city_2" name="city[]">
                                                                        <option value="">----- Select City -----</option>
                                                                        
                                                                    </select>
                                                                    <span class='float-text' for="city_2">City</span>
                                                                </label>                                                                                                                              
                                                                <label class="has-float-label col-sm-7 col-md-7">
                                                                <input type="text" class="form-control" id="pin_no_2" name="pin_no[]" maxlength="6" placeholder="Pin Code">
                                                                <span class='float-text' for="pin_no_2">Pin Code</span>
                                                                </label>
                                                        </div>
                                                    </div>
                                                    <span class='col-md-6 com_error text-center'><span class='com_error'></span></span>
                                                </div>
                                            </form>
                                            <!-- <input type="button" name="previous" class="previous action-button-previous" value="PREVIOUS" />  -->
                                            <input type="button" name="next" id='communicationInfo' class="next action-button" value="NEXT" />
                                        </fieldset>
                                        <fieldset>
                                            <form name='educationInfo' class='educationInfo' action='' method='GET' enctype="multipart/form-data">
                                                <div class="form-card">
                                                  <h2 class="fs-title">Education Information</h2>
                                                    <div class='row'>
                                                        <div class="col-lg-12 table-responsive">
                                                            <table class="table table-bordered table-striped" style='overflow-x:scroll;' id="add_row1">
                                                                <thead>
                                                                    <th>S.No</th>
                                                                    <th>Degree</th>
                                                                    <th>Subject</th>
                                                                    <th>College/University/Board</th>
                                                                    <th>Mode of Study (Regular/Correspondence)</th>
                                                                    <th>Affiliated University</th>
                                                                    <th>Year of Joining</th>
                                                                    <th>Year of Passing</th>
                                                                    <th> % </th>
                                                                    <th>Action</th>
                                                                    <thead>
                                                                    <form class="form-inline" role="form" id="educationFrm" action="" method="POST">
                                                                        <tbody id='edu_fields'>                                                                            
                                                                                <tr>
                                                                                    <td><span>1</span></td>
                                                                                    <td>
                                                                                        <input type="text" name="degree[]" id="degree" class="form-control degree degree0" alt="0" placeholder="Enter Degree">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" name="subject[]" id="subject" class="form-control subject subject0" placeholder="Enter Specialization" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" name="college[]" id="college" class="form-control college college0" placeholder="Enter College/University" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" name="mos[]" id='mos' class="form-control mos mos0" placeholder="Enter Mode of Study" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" name="aff_university[]" id="aff_university" class="form-control aff_university aff_university0" placeholder="Affiliated University" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="date" name="yoj[]" id="yoj" class="form-control yoj yoj0" placeholder="" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="date" name="yop[]" id="yop" class="form-control yop yop0" placeholder="" />
                                                                                    </td>                                                                                    
                                                                                    <td>
                                                                                        <input type="number" name="percentage[]" id="percentage" class="form-control percentage percentage0" placeholder=" % " style="width:50px;" />
                                                                                    </td>
                                                                                    <td align="center"><span>-</span></td>
                                                                                </tr>
                                                                             </tbody>                                                                             
                                                                         </table>
                                                                         </form>                                                                    
                                                                        </div>
                                                                    </div>
                                                                    <span class='col-md-6 edu_error text-center'><span class='edu_error'></span></span>
                                                                </div>                                                                
                                                            </form>
                                                            <div class='text-center add-row'>
                                                                <button class="btn btn-sm btn-info float-right" type="" onclick="edu_fields();">Add Row</button>
                                                            </div>
                                            <!-- <input type="button" name="previous" class="previous action-button-previous" value="PREVIOUS" />  -->
                                            <input type="button" name="next" id='educationInfo' class="next action-button" value="NEXT" />
                                        </fieldset>
                                        <fieldset>
                                            <form name='experienceInfo' class='experienceInfo' action='' method='GET' enctype="multipart/form-data">
                                                <div class="form-card">
                                                    <h2 class="fs-title">Experience Information</h2>
                                                    <div class='row'>
                                                        <div class="col-lg-12 table-responsive">
                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                    <th>S.No</th>
                                                                    <th>Experience College</th>
                                                                    <th>Affiliated University</th>
                                                                    <th>Designation</th>
                                                                    <th>Date of Joining</th>
                                                                    <th>Date of Leaving</th>
                                                                    <th>Total Years Experience</th>
                                                                    <th>Action</th>
                                                                    <thead>
                                                                        <form class="form-inline" role="form" id="experienceFrm" action="" method="POST">
                                                                            <tbody id='exp_fields'>
                                                                                <tr>
                                                                                    <td>1.</td>
                                                                                    <td>
                                                                                        <input type="text" name="exp_college[]" class="form-control exp_college exp_college0" alt="0" id="exp_college" placeholder="Enter experience College">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" name="university[]" id="university" class="form-control university university0" placeholder="Enter University" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" name="designation[]" id="designation" class="form-control designation designation0" placeholder="Enter Designation" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="date" name="doj[]" id='doj' class="form-control doj doj0" placeholder="" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="date" name="dol[]" id="dol" class="form-control dol dol0" placeholder="" />
                                                                                    </td>                                                                                    
                                                                                    <td>
                                                                                        <input type="number" name="doe[]" id="doe" class="form-control doe doe0" placeholder="Years of Experience" />
                                                                                    </td>
                                                                                    <td align="center"><span>-</span></td>
                                                                                </tr>
                                                                            </tbody>                                                                       
                                                                        </table>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <span class='col-md-6 exp_error text-center'><span class='exp_error'></span></span>
                                                        </div>
                                                    </form>
                                                <div class='text-center add-row'>
                                                    <button class="btn btn-sm btn-info float-right" type="" onclick="exp_fields();">Add Row</button>
                                                </div>
                                            <!-- <input type="button" name="previous" class="previous action-button-previous" value="PREVIOUS" /> -->
                                            <input type="button" name="next" id='experienceInfo' class="next action-button" value="NEXT" />
                                        </fieldset>
                                         <fieldset>
                                         <form name='achievementInfo' class='achievementInfo' action='' method='GET'>
                                            <div class="form-card">
                                                <h2 class="fs-title">Achievements Information</h2>
                                                <div class='row'>
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class='col-2'>Whether SET/NET passed?</label>
                                                                <input type="radio" class='col-sm-1 col-md-1 set_net' id='set_net' name="set_net[]" value='Yes' required/> Yes
                                                                <input type="radio" class='col-sm-1 col-md-1 set_net' id='set_net' name="set_net[]" value='No' required/> No                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="col-3">No. of Articles published in National Journals :</label>
                                                                <select class="col-1 list-dt nat_journals" id='nat_journals' name='nat_journals[]'>
                                                                    <option value="">----- Select -----</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="col-3">No. of Articles published in International Journals :</label>
                                                                <select class="col-1 list-dt int_journals" id='int_journals' name='int_journals[]'>
                                                                    <option value="">----- Select -----</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="col-3">No. of Confrences / Seminner Presentation :</label>
                                                                <select class="col-1 list-dt sem_journals" id='sem_journals' name='sem_journals[]'>
                                                                    <option value="">----- Select -----</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="col-3">No. of Books / Chapter - Published :</label>
                                                                <select class="col-1 list-dt published_book" id='published_book' name='published_book[]'>
                                                                    <option value="">----- Select -----</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                            <label class="has-float-label col-sm-4 col-md-4" style='margin-top: 15px;'>                                                                
                                                                <input type="text" class="form-control known_lan" id="known_languages" name='known_languages[]' placeholder="Eg:- Tamil, English" style='padding: 5px 0px 0px 0px !important;' required/>
                                                                <span class='float-text' for="known_languages" style='left: 13px !important;'>Known Languages - specify</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="col-2">Proficiency in English :</label>
                                                                <input type="checkbox" value="Read" id="eng_read" name="eng_read[]" class='col-1 eng_read'> Read
                                                                <input type="checkbox" value="Speak" id="eng_speak" name="eng_speak[]" class='col-1 eng_speak'> Speak
                                                                <input type="checkbox" value="Write" id="eng_write" name="eng_write[]" class='col-1 eng_write'> Write
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="col-3">Typing Lower / Higher in Tamil :</label>
                                                                <select class="col-2 list-dt typing_tamil" id='typing_tamil' name='typing_tamil[]'>
                                                                    <option value="">----- Select -----</option>
                                                                    <option value="Lower">Lower</option>
                                                                    <option value="Higher">Higher</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="col-3">Typing Lower / Higher in English :</label>
                                                                <select class="col-2 list-dt typing_english" id='typing_english' name='typing_english[]'>
                                                                    <option value="">----- Select -----</option>
                                                                    <option value="Lower">Lower</option>
                                                                    <option value="Higher">Higher</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="col-2">Computer Knowledge :</label>
                                                                <input type="radio" class='col-sm-1 col-md-1 comp_knowledge' id='comp_knowledge' name="comp_knowledge[]" value='Yes' required/> Yes
                                                                <input type="radio" class='col-sm-1 col-md-1 comp_knowledge' id='comp_knowledge' name="comp_knowledge[]" value='No' required/> No                                                                                                                                 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class='col-md-6 achieve_error text-center'><span class='achieve_error'></span></span>
                                            </div>
                                            </form>
                                            <!-- <input type="button" name="previous" class="previous action-button-previous" value="PREVIOUS" /> -->
                                            <input type="button" name="next" id='achievementInfo' class="next action-button" value="NEXT" />
                                        </fieldset>
                                        <fieldset>
                                        <form name='joiningInfo' class='joiningInfo' action='' method='GET'>
                                            <div class="form-card">
                                               
                                                <div class="row">
                                                    <div class="col-12 offset-4">
                                                    <h2 class="fs-title">Joining Infromation</h2>
                                                    <label class="has-float-label col-sm-3 col-md-3">                                                                
                                                        <input type="date" class="form-control date_of_joining" id="date_of_joining" name='date_of_joining[]' placeholder="" required/>
                                                        <span class='float-text' for="date_of_joining" >Date of Joining</span>
                                                    </label>                                                     
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 offset-4">                
                                                        <label class="has-float-label col-sm-3 col-md-3">
                                                        <input type="number" class="form-control current_salary" id="current_salary" name='current_salary[]' placeholder="Enter current salary">
                                                        <span class='float-text' for="current_salary" >Current Salary in Month</span>
                                                    </label> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 offset-4">
                                                        <label class="has-float-label col-sm-3 col-md-3">
                                                            <input type="number" class="form-control expected_salary" id="expected_salary" name='expected_salary[]' placeholder="Enter expected salary">
                                                            <span class='float-text' for="expected_salary" >Expected Salary in Month</span>
                                                        </label> 
                                                    </div>
                                                </div>
                                                <span class='col-md-6 joining_error text-center'><span class='joining_error'></span></span>
                                            </div>
                                        </form>
                                            <!-- <input type="button" name="previous" class="previous action-button-previous" value="PREVIOUS" /> -->
                                            <input type="button" name="next" id='joiningInfo' class="next action-button" value="NEXT" />
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-card">
                                                <h2 class="fs-title text-center">Success !</h2>
                                                <br>
                                                <br>
                                                <div class="row justify-content-center">
                                                    <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="row justify-content-center">
                                                    <div class="col-7 text-center">
                                                        <h5>You Have Successfully registered with us..</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>

    <script>
        $("#email_id").keyup(function() {
            var email_id = $("#email_id").val();
            //var phone = $("#phone").val();
            if ($("#email_id").val().length >= 4 && $("#phone").val().length == 10 ) {
                $.ajax({
                    type: "POST",
                    url: "Staff_recruitment/check_exist",
                    data: {
                        "email_id": email_id
                    },
                    success: function(res) {
                        // console.log(res);
                        if (res == "0") {
                            $("#email_verify").text("");
                        } else {                            
                            $("#email_verify").text("Already user taken, Please enter phone number then click next.");
                        }
                    }
                });
            } else {
                $("#email_verify").text(""); /*css({ "background-image" "none" })*/
            }
        });

        $("#phone").keyup(function() {
            if ($("#phone").val().length >= 1) {
                if (validatePhone('txtphone')) {
                    if ($("#phone").val().length < 10 || $("#phone").val().length > 10) {
                        $("#mobile").text("Enter a 10 digit number");
                        $("#mobileValid").text("");
                    } else {
                        $("#mobileValid").text("Valid");
                        $("#mobile").text("");
                    }
                } else {
                    $("#mobile").text("Enter the digits");
                    $("#mobileValid").text("");
                }
            } else {
                $("#mobile").text("");
                $("#mobileValid").text("");
            }

            function validatePhone(txtPhone) {
                var filter = /^[0-9-+]+$/;
                if (filter.test($("#phone").val())) {
                    return true;
                } else {
                    return false;
                }
            }
        });

        var eduId = 1;

        function edu_fields() {
            eduId++;
            var objTo = document.getElementById('edu_fields')
            var tableRow = document.createElement("tr");
            tableRow.setAttribute("class", "removeClassEdu_" + eduId);
            var rdiv = 'removeClassEdu_' + eduId;
            tableRow.innerHTML = '<td>' + eduId + '</td>' +
                '<td><input type="text" name="degree[]" class="form-control degree degree'+eduId+'" alt="'+eduId+'" id="degree" placeholder="Enter College"></td>' +
                '<td><input type="text" name="subject[]" id="subject" class="form-control subject subject'+eduId+'" placeholder="Enter Subject"/></td>' +
                '<td><input type="text" name="college[]" id="designation" class="form-control college college'+eduId+'" placeholder="Enetr College/University" /></td>' +
                '<td><input type="text" name="mos[]" id="mos" class="form-control mos mos'+eduId+'" placeholder="Mode of Stydy"/></td>' +
                '<td><input type="text" name="aff_university[]" id="aff_university" class="form-control  aff_university aff_university'+eduId+'" placeholder="Mode of Stydy"/></td>' +
                '<td><input type="date" name="yoj[]" id="yoj" class="form-control yoj yoj'+eduId+'" placeholder="YYYY-MM-DD"/></td>' +
                '<td><input type="date" name="yop[]" id="yop" class="form-control yop yop'+eduId+'" placeholder="YYYY-MM-DD"/></td>' +                
                '<td><input type="number" name="percentage[]" id="percentage" class="form-control percentage percentage'+eduId+'" placeholder="%" style="width:50px;"/></td>' +
                '<td><button class="btn btn-sm btn-danger" type="button" onclick="remove_edu_fields(' + eduId + ');"> <span class="fa fa-trash" aria-hidden="true"></span> </button></td>';

                objTo.appendChild(tableRow)
        }

        function remove_edu_fields(eduId) {
            $('.removeClassEdu_' + eduId).remove();
        }

        var expId = 1;

        function exp_fields() {
            expId++;
            var objTo = document.getElementById('exp_fields')
            var tableRow = document.createElement("tr");
            tableRow.setAttribute("class", "removeClassExp_" + expId);
            var rdiv = 'removeClassExp_' + expId;
            tableRow.innerHTML = '<td>' + expId + '</td>' +
                '<td><input type="text" name="exp_college[]" class="form-control exp_college exp_college'+expId+'" alt="'+expId+'" id="exp_college" placeholder="Enter College"></td>' +
                '<td><input type="text" name="university[]" id="university" class="form-control university university'+expId+'" placeholder="Enter University"/></td>' +
                '<td><input type="text" name="designation[]" id="designation" class="form-control designation designation'+expId+'" placeholder="Enter Designation" /></td>' +
                '<td><input type="date" name="doj[]" id="doj" class="form-control doj doj'+expId+'" placeholder="YYYY/MM/DD"/></td>' +
                '<td><input type="date" name="dol[]" id="dol" class="form-control dol dol'+expId+'" placeholder="YYYY/MM/DD"/></td>' +
                '<td><input type="number" name="doe[]" id="doe" class="form-control doe doe'+expId+'" placeholder="Years of Experience"/></td>' +
                '<td><button class="btn btn-sm btn-danger" type="button" onclick="remove_exp_fields(' + expId + ');"> <span class="fa fa-trash" aria-hidden="true"></span> </button></td>';

            objTo.appendChild(tableRow)
        }

        function remove_exp_fields(rid) {
            $('.removeClassExp_' + rid).remove();
        }

        //add rows
        /*$("#insert-more_1").click(function () {
     $("#add_row1").each(function () {
         var tds = '<tr class="txtMult1">';
         jQuery.each($('tr:last td', this), function () {
             tds += '<td>' + $(this).html() + '</td>';
         });
         tds += '</tr>';
         if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds);
         } else {
             $(this).append(tds);
         }
     });
});

$("#education_table").on("keyup", ".txtMult input", multInputs); */

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

// $(function () {
//    var bindDatePicker = function() {
// 		$("#dob").datetimepicker({
//         format:'YYYY-MM-DD',
// 			icons: {
// 				time: "fa fa-clock-o",
// 				date: "fa fa-calendar",
// 				up: "fa fa-arrow-up",
// 				down: "fa fa-arrow-down"
// 			}
// 		}).find('input:first').on("blur",function () {
// 			// check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
// 			// update the format if it's yyyy-mm-dd
// 			var date = parseDate($(this).val());

// 			if (! isValidDate(date)) {
// 				//create date based on momentjs (we have that)
// 				date = moment().format('YYYY-MM-DD');
// 			}

// 			$(this).val(date);
// 		});
// 	}
   
//    var isValidDate = function(value, format) {
// 		format = format || false;
// 		// lets parse the date to the best of our knowledge
// 		if (format) {
// 			value = parseDate(value);
// 		}

// 		var timestamp = Date.parse(value);

// 		return isNaN(timestamp) == false;
//    }
   
//    var parseDate = function(value) {
// 		var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
// 		if (m)
// 			value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

// 		return value;
//    }
   
//    bindDatePicker();
//  });

$(document).ready(function() {

$('.state_1').change(function() {
    var state = $('.state_1').val();
    if (state != '' || state != undefined) {
        $.ajax({
            url: "<?php echo base_url(); ?>staff_recruitment/fetch_city",
            method: "POST",
            data: {state: state},
            success: function(data) {
                console.log(data);
                $('.city_1').html(data);
            }
        });
    } else {
        $('.city_1').html('<option value="">Select City</option>');
    }
});

$('.state_2').change(function() {
    var state = $('.state_2').val();
    if (state != '' || state != undefined) {
        $.ajax({
            url: "<?php echo base_url(); ?>staff_recruitment/fetch_city",
            method: "POST",
            data: {state: state},
            success: function(data) {
                //console.log(data);
                $('.city_2').html(data);
            }
        });
    } else {
        $('.city_2').html('<option value="">Select City</option>');
    }
});

$('.community').change(function() {
    var community = $('.community').val();
    if (community != '' || community != undefined) {
        $.ajax({
            url: "<?php echo base_url(); ?>staff_recruitment/fetch_caste",
            method: "POST",
            data: {community: community},
            success: function(data) {
                //console.log(data);
                $('.caste').html(data); 
            }
        });
    } else {
        $('.caste').html('<option value="">Select City</option>');
    }
});

});

</script>

</body>

</html>