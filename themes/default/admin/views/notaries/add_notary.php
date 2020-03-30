<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-users"></i><?= lang('Add_Notary'); ?></h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
                        echo admin_form_open_multipart("notaries/add", $attrib);
                        ?>
                        <div class="row">
                            <fieldset class="scheduler-border">
                                <legend style="text-align: center" class="scheduler-border"><i
                                            class="fa-fw fa fa-user-secret"></i><b>General
                                        Information</b></legend>
                                <div class="col-md-12">
                                    <div class="col-md-5 ">
                                        <div class="form-group">
                                            <?php echo lang('First_Name', 'First_Name') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('first_name', (isset($_POST['first_name']) ? $_POST['first_name'] : ''), 'class="form-control" id="first_name" required="required" pattern=".{3,10}"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Phone_No', 'Phone_No') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('notary_phone', (isset($_POST['notary_phone']) ? $_POST['notary_phone'] : ''), 'class="form-control" id="notary_phone" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Mobile_No', 'Mobile_No') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('notary_mobile', (isset($_POST['notary_mobile']) ? $_POST['notary_mobile'] : ''), 'class="form-control" id="notary_mobile" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Email', 'Email') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('notary_email', (isset($_POST['notary_email']) ? $_POST['notary_email'] : ''), 'class="form-control" id="notary_email" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Contact_Phone', 'Contact_Phone') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('contact_phone', '', 'class="form-control" id="contact_phone"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                            <?php echo lang('Last_Name', 'Last_Name') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('last_name', (isset($_POST['last_name']) ? $_POST['last_name'] : ''), 'class="form-control" id="last_name" required="required" pattern=".{3,10}"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Office_Phone_No', 'Office_Phone_No') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('notary_office_phone', (isset($_POST['notary_office_phone']) ? $_POST['notary_office_phone'] : ''), 'class="form-control" id="notary_office_phone" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Fax_No', 'Fax_No') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('notary_fax', (isset($_POST['notary_fax']) ? $_POST['notary_fax'] : ''), 'class="form-control" id="notary_fax" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Contact_Email', 'Contact_Email') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('contact_email', '', 'class="form-control" id="contact_email"'); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <?php echo lang('Address', 'Address') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_textarea('address', (isset($_POST['address']) ? $_POST['address'] : ''), 'class="form-control" id="address" required="required" '); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <?php echo lang('Mailing_Address', 'Mailing_Address') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_textarea('mailing_address', (isset($_POST['mailing_address']) ? $_POST['mailing_address'] : ''), 'class="form-control" id="mailing_address" required="required" '); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <?php echo lang('Tell_Us_About_Yourself', 'Tell_Us_About_Yourself') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_textarea('about_yourself', (isset($_POST['about_yourself']) ? $_POST['about_yourself'] : ''), 'class="form-control" id="about_yourself" required="required" '); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
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
                                <legend style="text-align: center" class="scheduler-border"><i
                                            class="fa-fw fa fa-key"></i><b>Login
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
                                <p><?php echo form_submit('add_notary', lang('Add_Notary'), 'class="btn btn-primary"'); ?></p>

                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>