<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class=" col-sm-12 col-md-12 col-lg-12">
            <div class='text-center'>
                <div class="card card-info">
                    <?php if (isset($_SESSION["delete_staff"])): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> <?php echo $_SESSION["delete_staff"]; ?>
                    </div>
                    <?php endif ?>
                    <?php if (isset($_SESSION["select_staff"])): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> <?php echo $_SESSION["select_staff"]; ?>
                    </div>
                    <?php endif ?>
                    <div class="card-header">
                        <h3 class="card-title text-left">List of Team Data</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th style='width:100px;'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($TEAM_DATA == 0){ ?>
                                    <h2>No Found Regards</h2>
                                    <?php } else {
                                                $count = 1; foreach( $TEAM_DATA as $value ){ ?>
                                    <tr class='<?php if($value->status == 0) { echo 'disable'; } ?>'>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $value->first_name.' '.$value->last_name; ?></td>
                                        <td><?php echo $value->email_id;?></td>
                                        <td><?php echo $value->phone_no; ?></td>
                                        <td>
                                            <button type="button" id="button" class="btn"
                                                onClick="getStatus(<?php echo $value->personal_id;?>)">
                                                <b><?php if($value->status == 1){ ?><span
                                                        class="badge badge-success">Active</span><?php }
                                                        else { ?></b> <b><span
                                                        class='badge badge-danger'>Deactive</span><?php } ?></b>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" id="button" class="btn" data-toggle="modal"
                                                data-target="#settings<?php echo $value->personal_id;?>">
                                                <span class="fa fa-gear"></span></button>

                                            <!-- The Modal -->
                                            <div class="modal fade" id="settings<?php echo $value->personal_id;?>">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Staff Settings</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <?php if(empty($value->emp_id)){ ?>
                                                                <form action='' method='post'>
                                                                    <div class="col-lg-12">
                                                                        <span class='error text-center'><span
                                                                                class='error'></span></span>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <label class="has-float-label  col-md-4">
                                                                            <span id='emp_id'></span>
                                                                            <input type="text" name="emp_id"
                                                                                class='form-control emp_id'
                                                                                value='<?php echo $value->emp_id ?>'
                                                                                placeholder="Eg:- MEMP000001"
                                                                                required />
                                                                            <span for="emp_id">Emp Id</span>
                                                                        </label>
                                                                        <label class="has-float-label  col-md-6">
                                                                            <span id='biometric_id'></span>
                                                                            <input type="text" name="biometric_id"
                                                                                class='form-control biometric_id'
                                                                                value='<?php echo $value->biometric_id ?>'
                                                                                placeholder="Eg:- MBIO000001"
                                                                                required />
                                                                            <span for="biometric_id">Biometric Id</span>
                                                                        </label>
                                                                        <label class='col-md-2'>
                                                                            <input type="button"
                                                                                class="btn btn-sm btn-primary"
                                                                                onClick='emp_settings(<?php echo $value->personal_id;?>)'
                                                                                value='Update' />
                                                                        </label>
                                                                    </div>
                                                                </form>
                                                                <?php } ?>

                                                                <?php if(!empty($value->emp_id) && !empty($value->biometric_id)){ ?>
																<div class="<?php if($value->relieving_status == ''){?> col-lg-6 <?php }else{ ?> col-lg-12 <?php } ?> ?>">
                                                                    <!-- <button type="button" class="btn btn-sm no-due" onClick="no_due(<?php echo $value->personal_id;?>)">
																				<?php if($value->no_due == 1){ ?><span class='btn btn-sm btn-success'>No Due Submitted</span><?php }
																				else { ?> <span class='btn btn-sm btn-danger'>No Due Pending</span><?php } ?>
																			</button> -->

                                                                    <a href="<?php echo base_url() ?>team_data/offer_download?&personal_id=<?php echo $value->personal_id;?>"
                                                                        class='btn btn-sm btn-danger'
                                                                        id='offer_download' target='_top'>Offer Letter
                                                                        (<?php echo $value->offer_letter;?>) <i
                                                                            class="fa fa-download"
                                                                            aria-hidden="true"></i></a>

                                                                    <a href="<?php echo base_url() ?>team_data/nodue_download?&personal_id=<?php echo $value->personal_id;?>"
                                                                        class='btn btn-sm btn-danger'
                                                                        id='nodues_download' target='_top'>No Dues Form
                                                                        (<?php echo $value->no_due;?>) <i
                                                                            class="fa fa-download"
                                                                            aria-hidden="true"></i></a>

                                                                    <?php if($value->relieving_status != ""){ ?>
                                                                    <a href="<?php echo base_url() ?>team_data/relieve_download?&personal_id=<?php echo $value->personal_id;?>"
                                                                        class='btn btn-sm btn-danger'
                                                                        id='relieve_download' target='_top'>Relieve
                                                                        Letter (<?php echo $value->relieving_letter;?>)
                                                                        <i class="fa fa-download"
                                                                            aria-hidden="true"></i></a>
                                                                    <?php }else { ?>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <form action='' method='post'>
                                                                        <div class="col-md-10 col-md-10">                                                                            
                                                                            <select type="text" name="rel_reason" class='form-control rel_reason' required>
                                                                                <option value=''>---- Select Releiving Reason ----</option>
                                                                                <option value="Relieving">Relieving</option>
                                                                                <option value="No Call No Show">No Call No Show</option>
																				<option value="Terminated">Terminated</option>
																			</select>
																			<span class='relieve_error'></span>
                                                                        </div>
                                                                        <div class="col-md-2 col-md-2"><input
                                                                                type="button"
                                                                                class="btn btn-md btn-info"
                                                                                onClick='relieve_reason(<?php echo $value->personal_id;?>)'
                                                                                value='OK' /></div>
                                                                    </form>
                                                                </div>
                                                                <?php } ?>
                                                                <?php } ?>
                                                            </div>

                                                        </div>

                                                        <!-- Modal footer -->
                                                        <!-- <div class="modal-footer text-center">															
															<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</i></button>
															</div> -->
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php }  }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12 card-footer ">
                        <!-- <?php  if($_SESSION['roll_type_id'] == '0' && $_SESSION['username'] == 'developer'){  ?>
						<div class="form-inline col-lg-1 float-right">
							<button type="submit" class="btn btn-sm btn-info" name="staff_status">Submit</button>
						</div>
						<?php } ?> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function no_due2(personal_id) {

    var isTrue = confirm("Are you sure to confirm?");
    if (isTrue) {
        $.ajax({
            url: "<?php echo base_url(); ?>team_data/no_due",
            type: 'post',
            data: {
                'personal_id': personal_id
            },
            dataType: 'json',
            success: function(reponse) {
                //console.log(reponse);
                //location.reload();
                //alert('success');
            }
        });
        location.reload();
    }

}

function emp_settings(personal_id) {

    //var personal_form = $('.personalInfo').serialize();
    var emp_id = $('.emp_id').val();
    var biometric_id = $('.biometric_id').val();

    if (emp_id == '') {
        $('.error').text("Please fill the Emp Id?");
    } else if (biometric_id == '') {
        $('.error').text("Please fill the Biometric Id?");
    } else {

        var isTrue = confirm("Are you sure to confirm?");

        if (isTrue) {
            $.ajax({
                url: "<?php echo base_url(); ?>team_data/emp_settings",
                type: 'post',
                data: {
                    'personal_id': personal_id,
                    'emp_id': emp_id,
                    'biometric_id': biometric_id
                },
                dataType: 'json',
                success: function(reponse) {
                    //console.log(reponse);
                    //location.reload();
                }
            });
            location.reload();
        }

    }

}

function relieve_reason(personal_id) {

    //var personal_form = $('.personalInfo').serialize();
	var rel_reason = $(".rel_reason").val();
	
    if (rel_reason == '' || rel_reason == undefined) {
        $('.relieve_error').text("Please choose the relieving reason?");
    } else {
        $('.relieve_error').text("");
        var isTrue = confirm("Are you sure to confirm?");

        if (isTrue) {
            $.ajax({
                url: "<?php echo base_url(); ?>team_data/relieve_reason",
                type: 'post',
                data: {
                    'personal_id': personal_id,
                    'rel_reason': rel_reason
                },
                dataType: 'json',
                success: function(reponse) {
                    //console.log(reponse);
                    location.reload();

                }
            });
            location.reload();
        }

    }

}

function emp_Reject(personal_id) {
    var isTrue = confirm("Are you sure to confirm?");
    if (isTrue) {
        $.ajax({
            url: "<?php echo base_url(); ?>profile_list/disable_enable?&personal_id=" + personal_id,
            //contentType: 'application/json; charset=utf-8',
            type: 'get',
            //data: {'personal_id':personal_id},
            dataType: 'json',
            //timeout: 5000,
            success: function(reponse) {
                //console.log(reponse);
                location.reload();
                //alert('success');
            }
        });
        location.reload();
    }
}
</script>