<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-users"></i><?= lang('Add_Job'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-md-12">
                <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
                //            echo admin_form_open_multipart("clients/add", $attrib);
                echo admin_form_open_multipart("clients/addJobList   ", $attrib);
                ?>
                <div class="row">
                    <fieldset class="scheduler-border">
                        <legend style="text-align: center" class="scheduler-border"><i
                                    class="fa-fw fa fa-user-secret"></i><b>About the Client…
                            </b></legend>
                        <div class="col-md-12">
                            <div class="col-md-5 ">
                                <div class="form-group">
                                    <?= lang("Client", "Client") . '<b> *</b>'; ?>
                                    <?php
                                    if ($Owner) $wh[''] = "Select Client";
                                    foreach ($client_list as $client) {
                                        $wh[$client->id] = $client->company_name;
                                    }
                                    echo form_dropdown('client_id', $wh, (isset($_POST['client_id']) ? $_POST['client_id'] : ''), 'id="client_id" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-5 clearfix col-md-offset-1">
                                <div class="form-group">
                                    <?= lang('Document_Type', 'Document_Type') . '<b> :</b>'; ?>
                                    <?php
                                    $opt = array("Loan Signing" => lang('Loan Signing'), "Remote Hire I-9 Verification" => lang('Remote Hire I-9 Verification'));
                                    echo form_dropdown('documents_type', $opt, (isset($_POST['documents_type']) ? $_POST['documents_type'] : ''), 'id="documents_type" required="required" class="form-control select"');
                                    ?>
                                </div>
                            </div>

                        </div>
                    </fieldset>

                </div>

                <div class="row">
                    <fieldset class="scheduler-border">
                        <legend style="text-align: center" class="scheduler-border"><i
                                    class="fa-fw fa fa-user-secret"></i><b>About the Signing… </b>
                        </legend>
                        <div class="col-md-12">
                            <div class="col-md-5">

                                <div class="form-group">
                                    <label for="order_number">Order No</label>
                                    <div class="controls">
                                        <?php echo form_input('order_number', (isset($_POST['order_number']) ? $_POST['order_number'] : ''), 'class="form-control" id="order_number" required="required"'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="total_fee">Total Fees</label>
                                    <div class="controls">
                                        <?php echo form_input('total_fee', (isset($_POST['total_fee']) ? $_POST['total_fee'] : ''), 'class="form-control" id="total_fee" required="required"'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="signing_type">Type of Signing</label>
                                    <div class="controls">
                                        <?php echo form_input('signing_type', (isset($_POST['signing_type']) ? $_POST['signing_type'] : ''), 'class="form-control" id="signing_type" required="required"'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ststus">Status *</label>
                                    <?php
                                    $opt = array("Not Confirmed" => lang('Not Confirmed'), "Could Not Confirm" => lang('Could Not Confirm'), "Confirmed" => lang('Confirmed'), "Completed" => lang('Completed'), "Cancelled" => lang('Cancelled'));
                                    echo form_dropdown('status', $opt, (isset($_POST['status']) ? $_POST['status'] : ''), 'id="status" required="required" class="form-control select" style="width:100%;"');
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="signing_location" id="signing_location_div">Signing Location </label>
                                    <div class="controls">
                                        <?php echo form_textarea('signing_location', (isset($_POST['signing_location']) ? $_POST['signing_location'] : ''), 'class="form-control" id="signing_location" required="required" pattern=".{3,10}"'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <?php echo lang('Instructions', 'Instructions') . '<b> *</b>'; ?>

                                    <div class="controls">
                                        <?php echo form_textarea('instructions', (isset($_POST['instructions']) ? $_POST['instructions'] : ''), 'class="form-control" id="instructions" required="required" pattern=".{3,10}"'); ?>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-5 col-md-offset-1">

                                <div class="form-group" id="loan_number_div">
                                    <label for="loan_number">Loan Number</label>
                                    <div class="controls">
                                        <?php echo form_input('loan_number', (isset($_POST['loan_number']) ? $_POST['loan_number'] : ''), 'class="form-control" id="loan_number" required="required"'); ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <?php echo lang('Date Time', 'Date Time') . '<b> *</b>'; ?>
                                    <div class="controls">
                                        <?php echo form_input('order_date', (isset($_POST['order_date']) ? $_POST['order_date'] : ''), 'class="form-control input-tip datetime" id="order_date" readonly required="required"'); ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="documents_sent">Documents Sent</label>
                                    <?php
                                    $opt = array("Uploaded to Portal" => lang('Uploaded to Portal'), "Mailed to Signer(s)" => lang('Mailed to Signer(s)'), "Mailed to Notary" => lang('Mailed to Notary'));
                                    echo form_dropdown('documents_sent', $opt, (isset($_POST['documents_sent']) ? $_POST['documents_sent'] : ''), 'id="documents_sent" required="required" class="form-control select" style="width:100%;"');
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="signers" id="signers_div">Signer(s)</label>
                                    <div class="controls">
                                        <?php echo form_input('signers', (isset($_POST['signers']) ? $_POST['signers'] : ''), 'class="form-control" id="signers" required="required"'); ?>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <?php echo lang('Documents', 'Documents)') . '<b> *</b>'; ?>
                                    <div class="controls">
                                        <input type="file" data-browse-label="<?= lang('browse'); ?>"
                                               name="upload_attachment[]"
                                               id="upload_attachment" required="required" multiple
                                               data-show-upload="false" data-show-preview="false" accept="image/*"
                                               class="form-control file"/>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row">
                    <fieldset class="scheduler-border">
                        <legend style="text-align: center" class="scheduler-border"><i
                                    class="fa-fw fa fa-user-secret"></i><b>About
                                the Signer(s)…
                            </b>
                        </legend>
                        <div class="col-md-12">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="signer">Signer*</label>
                                    <div class="controls">
                                        <?php echo form_input('signer', (isset($_POST['Signer']) ? $_POST['Signer'] : ''), 'class="form-control" id="Signer" required="required"'); ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <?php echo lang('Signing Location', 'Signing Location') . '<b> *</b>'; ?>
                                    <div class="controls">
                                        <?php echo form_textarea('signing_location2', (isset($_POST['signing_location2']) ? $_POST['signing_location2'] : ''), 'class="form-control" id="signing_location2" required="required" pattern=".{3,10}"'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <?php echo lang('Telephone Work', 'Telephone Work') . '<b> *</b>'; ?>
                                    <div class="controls">
                                        <?php echo form_input('telephone_work', (isset($_POST['telephone_work']) ? $_POST['telephone_work'] : ''), 'class="form-control" id="telephone_work" required="required"'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo lang('Telephone Mobile', 'Telephone Mobile') . '<b> *</b>'; ?>
                                    <div class="controls">
                                        <?php echo form_input('telephone_mobile', (isset($_POST['telephone_mobile']) ? $_POST['telephone_mobile'] : ''), 'class="form-control" id="telephone_mobile" required="required"'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5 col-md-offset-1">

                                <div class="form-group" id="co_signer_div">
                                    <label for="co_signer">Co-Signer</label>
                                    <div class="controls">
                                        <?php echo form_input('co_signer', (isset($_POST['co_signer']) ? $_POST['co_signer'] : ''), 'class="form-control" id="co_signer" required="required"'); ?>
                                    </div>
                                </div>
                                <div class="form-group" id="start_date_div">
                                    <label for="start_date">Start Date</label>
                                    <div class="controls">
                                        <?php echo form_input('start_date', (isset($_POST['start_date']) ? $_POST['hire_status'] : ''), 'class="form-control date" id="start_date" required="required"'); ?>
                                    </div>
                                </div>
                                <div class="form-group" id="mail_completed_div">
                                    <label for="mail_completed">Mail Completed Package To</label>
                                    <div class="controls">
                                        <?php echo form_input('mail_completed', (isset($_POST['mail_completed']) ? $_POST['mail_completed'] : ''), 'class="form-control" id="mail_completed" required="required"'); ?>
                                    </div>
                                </div>

                                <div class="form-group" id="property_address_div">
                                    <label for="property_address">Property Address</label>
                                    <div class="controls">
                                        <?php echo form_textarea('property_address', (isset($_POST['property_address']) ? $_POST['property_address'] : ''), 'class="form-control" id="property_address" required="required" pattern=".{3,10}"'); ?>
                                    </div>
                                </div>
                                <div class="form-group" id="hire_status_div">
                                    <?php echo lang('Hire Status', 'Hire Status') . '<b> *</b>'; ?>
                                    <div class="controls">
                                        <?php echo form_input('hire_status', (isset($_POST['hire_status']) ? $_POST['hire_status'] : ''), 'class="form-control" id="hire_status" required="required"'); ?>
                                    </div>
                                </div>
                                <div class="form-group" id="send_scanned_copy_div">
                                    <?php echo lang('Send Scanned Copy TO', 'Send Scanned Copy TO') . '<b> *</b>'; ?>
                                    <div class="controls">
                                        <?php echo form_input('send_scanned_copy', (isset($_POST['send_scanned_copy']) ? $_POST['hire_status'] : ''), 'class="form-control" id="send_scanned_copy" required="required"'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo lang('Telephone Home', 'Telephone Home') . '<b> *</b>'; ?>
                                    <div class="controls">
                                        <?php echo form_input('telephone_home', (isset($_POST['telephone_home']) ? $_POST['telephone_home'] : ''), 'class="form-control" id="telephone_home" required="required"'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-12">
                    <p><?php echo form_submit('add_client_job', lang('Add_Client_job'), 'class="btn btn-primary"'); ?></p>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">

        $(document).ready(function () {
            $('#hire_status_div').hide();
            $('#start_date_div').hide();
            $('#mail_completed_div').hide();
            $('#send_scanned_copy_div').hide();
            $("#hire_status_div").prop('required', false);
            $("#start_date_div").prop('required', false);
            $("#mail_completed_div").prop('required', false);
            $("#send_scanned_copy_div").prop('required', false);
            $('#documents_type').change(function () {
                var type = $(this).val();
                if (type == 'Remote Hire I-9 Verification') {
                    $('#hire_status_div').show();
                    $('#start_date_div').show();
                    $('#mail_completed_div').show();
                    $('#send_scanned_copy_div').show();
                    $("#hire_status_div").prop('required', true);
                    $("#start_date_div").prop('required', true);
                    $("#mail_completed_div").prop('required', true);
                    $("#send_scanned_copy_div").prop('required', true);
                    $('#signers_div').text('Employee *');
                    $('#signing_location_div').text('Appointment Location *');
                    $('#loan_number_div').hide();
                    $('#property_address_div').hide();
                    $('#co_signer_div').hide();
                    $("#loan_number_div").prop('required', false);
                    $("#property_address_div").prop('required', false);
                    $("#co_signer_div").prop('required', false);
                } else {
                    $('#hire_status_div').hide();
                    $('#start_date_div').hide();
                    $('#mail_completed_div').hide();
                    $('#send_scanned_copy_div').hide();
                    $("#hire_status_div").prop('required', false);
                    $("#start_date_div").prop('required', false);
                    $("#mail_completed_div").prop('required', false);
                    $("#send_scanned_copy_div").prop('required', false);
                    $('#signers_div').text('Signer(s) *');
                    $('#signing_location_div').text('Signing Location *');
                    $('#loan_number_div').show();
                    $('#property_address_div').show();
                    $('#co_signer_div').show();
                    $("#loan_number_div").prop('required', true);
                    $("#property_address_div").prop('required', true);
                    $("#co_signer_div").prop('required', true);
                }
            });
        })
    </script>