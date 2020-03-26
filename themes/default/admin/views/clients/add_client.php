<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-users"></i><?= lang('Add_Client'); ?></h2>
    </div>
    <div class="box-content">
        <!--        <div class="row">-->
        <div class="col-md-12">
            <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
            echo admin_form_open_multipart("clients/add", $attrib);
            ?>
            <div class="row">
                <fieldset class="scheduler-border">
                    <legend style="text-align: center" class="scheduler-border"><i
                                class="fa-fw fa fa-user-secret"></i><b>General
                            Information</b></legend>
                    <div class="col-md-12">
                        <div class="col-md-5 ">
                            <div class="form-group">
                                <?php echo lang('Company_Name', 'Company_Name') . '<b> *</b>'; ?>
                                <div class="controls">
                                    <?php echo form_input('company_name', (isset($_POST['company_name']) ? $_POST['company_name'] : ''), 'class="form-control" id="company_name" required="required"'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo lang('Company_Phone_No', 'Company_Phone_No') . '<b> *</b>'; ?>
                                <div class="controls">
                                    <?php echo form_input('company_phone', (isset($_POST['company_phone']) ? $_POST['company_phone'] : ''), 'class="form-control" id="company_phone" required="required"'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo lang('Company_Email', 'Company_Email') . '<b> *</b>'; ?>
                                <div class="controls">
                                    <?php echo form_input('company_email', (isset($_POST['company_email']) ? $_POST['company_email'] : ''), 'class="form-control" id="company_email" required="required"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo lang('Company_Address', 'Company_Address') . '<b> *</b>'; ?>
                                <div class="controls">
                                    <?php echo form_textarea('company_address', (isset($_POST['company_address']) ? $_POST['company_address'] : ''), 'class="form-control" id="company_address" required="required" pattern=".{3,10}"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo lang('Contact_Person_First_Name', 'Contact_Person_First_Name') . '<b> *</b>'; ?>
                                <div class="controls">
                                    <?php echo form_input('first_name', (isset($_POST['first_name']) ? $_POST['first_name'] : ''), 'class="form-control" id="first_name" required="required" pattern=".{3,10}"'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo lang('Contact_Person_Phone', 'Contact_Person_Phone'). '<b> *</b>'; ?>
                                <div class="controls">
                                    <?php echo form_input('contact_phone', '', 'class="form-control" id="contact_phone"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?= lang('How_do_you_want_to_receive_invoices?', 'How_do_you_want_to_receive_invoices ? ') . '<b> *</b>'; ?>
                                <?php
                                $opt = array("By Mail" => lang('By_Mail'), "By EMail" => lang('By_Email'), "By Fax" => lang('By_Fax'));
                                echo form_dropdown('receive_invoices', $opt, (isset($_POST['receive_invoices']) ? $_POST['receive_invoices'] : ''), 'id="receive_invoices" required="required" class="form-control select" style="width:100%;"');
                                ?>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                                <?php echo lang('Tax_Identification_No', 'Tax_Identification_No') . '<b> *</b>'; ?>
                                <div class="controls">
                                    <?php echo form_input('tin', (isset($_POST['tin']) ? $_POST['tin'] : ''), 'class="form-control" id="tin" required="required"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo lang('Company_Fax_No', 'Company_Fax_No') . '<b> *</b>'; ?>
                                <div class="controls">
                                    <?php echo form_input('company_fax', (isset($_POST['company_fax']) ? $_POST['company_fax'] : ''), 'class="form-control" id="company_fax" required="required"'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?= lang('Type_Of_Company', 'Type_Of_Company') . '<b>*</b>'; ?>
                                <?php
                                $opt = array("Mortgage Broker" => lang('Mortgage_Broker'), "Title Company" => lang('Title_Company'), "Law Firm" => lang('Law_Firm'), "Real Estate Broker" => lang('Real_Estate_Broker'), "Investment Group" => lang('Investment_Group'), "Other" => lang('Other'));
                                echo form_dropdown('company_type', $opt, (isset($_POST['company_type']) ? $_POST['company_type'] : ''), 'id="company_type" required="required" class="form-control select" style="width:100%;"');
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo lang('Mailing_Address', 'Mailing_Address') . '<b> *</b>'; ?>
                                <div class="controls">
                                    <?php echo form_textarea('mailing_address', (isset($_POST['mailing_address']) ? $_POST['mailing_address'] : ''), 'class="form-control" id="mailing_address" required="required" pattern=".{3,10}"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo lang('Contact_Person_Last_Name', 'Contact_Person_Last_Name') . '<b> *</b>'; ?>
                                <div class="controls">
                                    <?php echo form_input('last_name', (isset($_POST['last_name']) ? $_POST['last_name'] : ''), 'class="form-control" id="last_name" required="required" pattern=".{3,10}"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo lang('Contact_Person_Email', 'Contact_Person_Email'). '<b> *</b>'; ?>
                                <div class="controls">
                                    <?php echo form_input('contact_email', '', 'class="form-control" id="contact_email"'); ?>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-12">
                        <div class="col-md-11 ">
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <?= lang("Other_Information", "Other_Information") ?>
                                <?= form_textarea('note', (isset($_POST['note']) ? $_POST['note'] : ''), 'class="form-control" id="note"'); ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="row">
                <fieldset class="scheduler-border">
                    <legend style="text-align: center" class="scheduler-border"><i class="fa-fw fa fa-key"></i><b>Login
                            Information</b>
                    </legend>
                    <div class="col-md-12">
                        <div class="col-md-5">
                            <div class="form-group">
                                <?php echo lang('username', 'username'); ?>
                                <div class="controls">
                                    <input type="text" id="username" name="username" class="form-control"
                                           required="required" pattern=".{4,20}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo lang('password', 'password'); ?>
                                <div class="controls">
                                    <?php echo form_password('password', '', 'class="form-control tip" id="password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" data-bv-regexp-message="' . lang('pasword_hint') . '"'); ?>
                                    <span class="help-block"><?= lang('pasword_hint') ?></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-5 col-md-offset-1">

                            <div class="clearfix"></div>

                            <div class="form-group">
                                <?= lang("Image_Upload", "Image_Upload"); ?>
                                <input type="file" data-browse-label="<?= lang('browse'); ?>" name="avatar"
                                       id="avatar" required="required"
                                       data-show-upload="false" data-show-preview="false" accept="image/*"
                                       class="form-control file"/>
                            </div>

                            <div class="form-group">
                                <?php echo lang('confirm_password', 'confirm_password'); ?>
                                <div class="controls">
                                    <?php echo form_password('confirm_password', '', 'class="form-control" id="confirm_password" required="required" data-bv-identical="true" data-bv-identical-field="password" data-bv-identical-message="' . lang('pw_not_same') . '"'); ?>
                                </div>
                            </div>
                    </div>
            </div>
            </fieldset>
            <div class="col-md-12">
                <p><?php echo form_submit('add_client', lang('Add_Client'), 'class="btn btn-primary"'); ?></p>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!--        </div>-->
