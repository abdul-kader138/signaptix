<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="<?php echo ($nav == "general_information") ? "active" : ''; ?>">
        <a href="#general_information" aria-controls="profile" role="tab"
           data-toggle="tab"><?= lang('General_Information') ?></a>
    </li>
    <li role="presentation" class="<?php echo ($nav == "commission") ? "active" : ''; ?>">
        <a href="#commission" aria-controls="profile" role="tab" data-toggle="tab"><?= lang('Commission') ?></a>
    </li>
    <li role="presentation" class="<?php echo ($nav == "electronic_commission") ? "active" : ''; ?>">
        <a href="#elctronic_commission" aria-controls="profile" role="tab"
           data-toggle="tab"><?= lang('Electronic_Commission') ?></a>
    </li>
    <li role="presentation" class="<?php echo ($nav == "producer_license") ? "active" : ''; ?>">
        <a href="#producer_license" aria-controls="profile" role="tab"
           data-toggle="tab"><?= lang('Producer_License') ?></a>
    </li>
    <li role="presentation" class="<?php echo ($nav == "bar_license") ? "active" : ''; ?>">
        <a href="#bar_license" aria-controls="profile" role="tab" data-toggle="tab"><?= lang('Bar_License') ?></a>
    </li>
    <li role="presentation" class="<?php echo ($nav == "background_check") ? "active" : ''; ?>">
        <a href="#background_check" aria-controls="profile" role="tab"
           data-toggle="tab"><?= lang('Background_Check') ?></a>
    </li>
    <li role="presentation" class="<?php echo ($nav == "insurance") ? "active" : ''; ?>">
        <a href="#insurance" aria-controls="profile" role="tab"
           data-toggle="tab"><?= lang('Error_&_Omissions_Insurance') ?></a>
    </li>
    <li role="presentation" class="<?php echo ($nav == "training") ? "active" : ''; ?>" style="margin-bottom: 7px;margin-top: 5px;">
        <a href="#training" aria-controls="profile" role="tab" data-toggle="tab"><?= lang('Training') ?></a>
    </li>
    <li role="presentation" class="<?php echo ($nav == "payment") ? "active" : ''; ?>" style="margin-bottom: 7px;margin-top: 5px;">
        <a href="#payment" aria-controls="profile" role="tab" data-toggle="tab"><?= lang('Payment') ?></a>
    </li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane <?php echo ($nav == "general_information") ? "active" : ''; ?>"
         id="general_information">
        <div class="box">
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
                        echo admin_form_open_multipart("notaries/edit/" . $notary->id, $attrib);
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
                                                <?php echo form_input('first_name', (isset($_POST['first_name']) ? $_POST['first_name'] : $user->first_name), 'class="form-control" id="first_name" required="required" pattern=".{3,10}"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Phone_No', 'Phone_No') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('notary_phone', (isset($_POST['notary_phone']) ? $_POST['notary_phone'] : $notary->notary_phone), 'class="form-control" id="notary_phone" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Mobile_No', 'Mobile_No') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('notary_mobile', (isset($_POST['notary_mobile']) ? $_POST['notary_mobile'] : $notary->notary_mobile), 'class="form-control" id="notary_mobile" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Email', 'Email') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('notary_email', (isset($_POST['notary_email']) ? $_POST['notary_email'] : $notary->notary_email), 'class="form-control" id="notary_email" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Contact_Phone', 'Contact_Phone') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('contact_phone', $notary->contact_phone, 'class="form-control" id="contact_phone"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                            <?php echo lang('Last_Name', 'Last_Name') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('last_name', (isset($_POST['last_name']) ? $_POST['last_name'] : $user->last_name), 'class="form-control" id="last_name" required="required" pattern=".{3,10}"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Office_Phone_No', 'Office_Phone_No') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('notary_office_phone', (isset($_POST['notary_office_phone']) ? $_POST['notary_office_phone'] : $notary->notary_office_phone), 'class="form-control" id="notary_office_phone" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Fax_No', 'Fax_No') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('notary_fax', (isset($_POST['notary_fax']) ? $_POST['notary_fax'] : $notary->notary_fax), 'class="form-control" id="notary_fax" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Contact_Email', 'Contact_Email') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('contact_email', $notary->contact_email, 'class="form-control" id="contact_email"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?= lang("Image_Upload", "Image_Upload"); ?>
                                            <input type="file" data-browse-label="<?= lang('browse'); ?>" name="avatar"
                                                   id="avatar"
                                                   data-show-upload="false" data-show-preview="false" accept="image/*"
                                                   class="form-control file"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <?php echo lang('Address', 'Address') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_textarea('address', (isset($_POST['address']) ? $_POST['address'] : $notary->address), 'class="form-control" id="address" required="required" '); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <?php echo lang('Mailing_Address', 'Mailing_Address') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_textarea('mailing_address', (isset($_POST['mailing_address']) ? $_POST['mailing_address'] : $notary->mailing_address), 'class="form-control" id="mailing_address" required="required" '); ?>
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
                                                <?php echo form_textarea('about_yourself', (isset($_POST['about_yourself']) ? $_POST['about_yourself'] : $notary->about_yourself), 'class="form-control" id="about_yourself" required="required" '); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <?= lang("Other_Information", "Other_Information") ?>
                                            <?= form_textarea('note', (isset($_POST['note']) ? $_POST['note'] : $notary->note), 'class="form-control" id="note"'); ?>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo form_submit('edit_notary', lang('Edit_Notary'), 'class="btn btn-primary"'); ?></p>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane <?php echo ($nav == "commission") ? "active" : ''; ?>" id="commission">
        <div class="box">
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
                        echo admin_form_open_multipart("notaries/edit_commission/" . $notary->id, $attrib);
                        ?>
                        <div class="row">
                            <fieldset class="scheduler-border">
                                <legend style="text-align: center" class="scheduler-border"><i
                                            class="fa-fw fa fa-th"></i> <b>Notary Commission</b></legend>
                                <div class="col-md-12">
                                    <div class="col-md-5 ">
                                        <div class="form-group">
                                            <?php echo lang('Notary_Commission_State', 'Notary_Commission_State') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('commission_state', (isset($_POST['commission_state']) ? $_POST['commission_state'] : $notary_commission->commission_state), 'class="form-control" id="commission_state" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Expiration_Date', 'Expiration_Date') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('expiration_date', (isset($_POST['expiration_date']) ? $_POST['expiration_date'] : $this->sma->hrsd($notary_commission->expiration_date)), 'class="form-control date" id="expiration_date" required="required"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                            <?php echo lang('Notary_Commission_Number', 'Notary_Commission_Number') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('commission_number', (isset($_POST['commission_number']) ? $_POST['commission_number'] : $notary_commission->commission_number), 'class="form-control" id="commission_number" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?= lang("Certificate_File_Upload", "Certificate_File_Upload") . " *"; ?>
                                            <input type="file" data-browse-label="<?= lang('browse'); ?>"
                                                   name="certificate_attachment"
                                                   id="certificate_attachment"
                                                   data-show-upload="false" data-show-preview="false" accept="pdf/*"
                                                   class="form-control file"/>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo form_submit('edit_commission', lang('Edit_Commission'), 'class="btn btn-primary"'); ?></p>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane <?php echo ($nav == "electronic_commission") ? "active" : ''; ?>"
         id="elctronic_commission">
        <div class="box">
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
                        echo admin_form_open_multipart("notaries/edit_electronic_commission/" . $notary->id, $attrib);
                        ?>
                        <div class="row">
                            <fieldset class="scheduler-border">
                                <legend style="text-align: center" class="scheduler-border"><i
                                            class="fa-fw fa fa-th"></i> <b>Notary Electronic Commission</b></legend>
                                <div class="col-md-12">
                                    <div class="col-md-5 ">
                                        <div class="form-group">
                                            <?php echo lang('Notary_Commission_State', 'Notary_Commission_State') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('e_commission_state', (isset($_POST['e_commission_state']) ? $_POST['e_commission_state'] : $e_notary_commission->e_commission_state), 'class="form-control" id="e_commission_state" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Expiration_Date', 'Expiration_Date') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('e_expiration_date', (isset($_POST['e_expiration_date']) ? $_POST['e_expiration_date'] : $this->sma->hrsd($e_notary_commission->e_expiration_date)), 'class="form-control date" id="e_expiration_date" required="required"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                            <?php echo lang('Notary_Commission_Number', 'Notary_Commission_Number') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('e_commission_number', (isset($_POST['e_commission_number']) ? $_POST['e_commission_number'] : $e_notary_commission->e_commission_number), 'class="form-control" id="e_commission_number" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?= lang("Certificate_File_Upload", "Certificate_File_Upload") . " *"; ?>
                                            <input type="file" data-browse-label="<?= lang('browse'); ?>"
                                                   name="e_certificate_attachment"
                                                   id="e_certificate_attachment"
                                                   data-show-upload="false" data-show-preview="false" accept="pdf/*"
                                                   class="form-control file"/>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo form_submit('edit_commission', lang('Edit_Commission'), 'class="btn btn-primary"'); ?></p>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane <?php echo ($nav == "producer_license") ? "active" : ''; ?>"
         id="producer_license">
        <div class="box">
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
                        echo admin_form_open_multipart("notaries/edit_producer_license/" . $notary->id, $attrib);
                        ?>
                        <div class="row">
                            <fieldset class="scheduler-border">
                                <legend style="text-align: center" class="scheduler-border"><i
                                            class="fa-fw fa fa-th"></i> <b>Title Producer License</b></legend>
                                <div class="col-md-12">
                                    <div class="col-md-5 ">
                                        <div class="form-group">
                                            <?php echo lang('State', 'State') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('state', (isset($_POST['state']) ? $_POST['state'] : $producer_license->state), 'class="form-control" id="state" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Expiration_Date', 'Expiration_Date') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('p_expiration_date', (isset($_POST['p_expiration_date']) ? $_POST['p_expiration_date'] : $this->sma->hrsd($producer_license->p_expiration_date)), 'class="form-control date" id="p_expiration_date" required="required"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                            <?php echo lang('License_Number', 'License_Number') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('license_number', (isset($_POST['license_number']) ? $_POST['license_number'] : $producer_license->license_number), 'class="form-control" id="license_number" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?= lang("Certificate_File_Upload", "Certificate_File_Upload") . " *"; ?>
                                            <input type="file" data-browse-label="<?= lang('browse'); ?>"
                                                   name="p_certificate_attachment"
                                                   id="p_certificate_attachment"
                                                   data-show-upload="false" data-show-preview="false" accept="pdf/*"
                                                   class="form-control file"/>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo form_submit('edit_producer_license', lang('Edit_Producer_License'), 'class="btn btn-primary"'); ?></p>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane <?php echo ($nav == "bar_license") ? "active" : ''; ?>" id="bar_license">
        <div class="box">
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
                        echo admin_form_open_multipart("notaries/edit_bar_license/" . $notary->id, $attrib);
                        ?>
                        <div class="row">
                            <fieldset class="scheduler-border">
                                <legend style="text-align: center" class="scheduler-border"><i
                                            class="fa-fw fa fa-th"></i> <b>Bar License</b></legend>
                                <div class="col-md-12">
                                    <div class="col-md-5 ">
                                        <div class="form-group">
                                            <?php echo lang('State', 'State') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('b_state', (isset($_POST['b_state']) ? $_POST['b_state'] : $bar_license->b_state), 'class="form-control" id="b_state" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Expiration_Date', 'Expiration_Date') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('b_expiration_date', (isset($_POST['b_expiration_date']) ? $_POST['b_expiration_date'] : $this->sma->hrsd($bar_license->b_expiration_date)), 'class="form-control date" id="b_expiration_date" required="required"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                            <?php echo lang('License_Number', 'License_Number') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('b_license_number', (isset($_POST['b_license_number']) ? $_POST['b_license_number'] : $bar_license->b_license_number), 'class="form-control" id="b_license_number" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?= lang("Certificate_File_Upload", "Certificate_Certificate_File_Upload") . " *"; ?>
                                            <input type="file" data-browse-label="<?= lang('browse'); ?>"
                                                   name="b_certificate_attachment"
                                                   id="b_certificate_attachment"
                                                   data-show-upload="false" data-show-preview="false" accept="pdf/*"
                                                   class="form-control file"/>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo form_submit('edit_bar_license', lang('Edit_Bar_License'), 'class="btn btn-primary"'); ?></p>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane <?php echo ($nav == "background_check") ? "active" : ''; ?>"
         id="background_check">
        <div class="box">
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
                        echo admin_form_open_multipart("notaries/edit_background_check/" . $notary->id, $attrib);
                        ?>
                        <div class="row">
                            <fieldset class="scheduler-border">
                                <legend style="text-align: center" class="scheduler-border"><i
                                            class="fa-fw fa fa-th"></i> <b>Background Check</b></legend>
                                <div class="col-md-12">
                                    <div class="col-md-5 ">
                                        <div class="form-group">
                                            <?php echo lang('Company', 'Company') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('company', (isset($_POST['company']) ? $_POST['company'] : $background_check->company), 'class="form-control" id="company" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Issue_Date', 'Issue_Date') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('issue_date', (isset($_POST['issue_date']) ? $_POST['issue_date'] : $this->sma->hrsd($background_check->issue_date)), 'class="form-control date" id="issue_date" required="required"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                            <?php echo lang('URL', 'URL') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('url', (isset($_POST['url']) ? $_POST['url'] : $background_check->url), 'class="form-control" id="url" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?= lang("Background_Check", "Background_Check") . " *"; ?>
                                            <input type="file" data-browse-label="<?= lang('browse'); ?>"
                                                   name="background_check"
                                                   id="background_check"
                                                   data-show-upload="false" data-show-preview="false" accept="pdf/*"
                                                   class="form-control file"/>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo form_submit('edit_background_check', lang('Edit_Background_Check'), 'class="btn btn-primary"'); ?></p>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane <?php echo ($nav == "insurance") ? "active" : ''; ?>" id="insurance">
        <div class="box">
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
                        echo admin_form_open_multipart("notaries/edit_insurance/" . $notary->id, $attrib);
                        ?>
                        <div class="row">
                            <fieldset class="scheduler-border">
                                <legend style="text-align: center" class="scheduler-border"><i
                                            class="fa-fw fa fa-th"></i> <b>Error & Omissions Insurance</b></legend>
                                <div class="col-md-12">
                                    <div class="col-md-5 ">
                                        <div class="form-group">
                                            <?php echo lang('Company', 'Company') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('i_company', (isset($_POST['i_company']) ? $_POST['i_company'] : $insurance->i_company), 'class="form-control" id="i_company" required="required"'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <?php echo lang('Policy_Number', 'Policy_Number') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('i_policy_number', (isset($_POST['i_policy_number']) ? $_POST['i_policy_number'] : $insurance->i_company), 'class="form-control" id="i_policy_number" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo lang('Issue_Date', 'Issue_Date') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('i_expiration_date', (isset($_POST['i_expiration_date']) ? $_POST['i_expiration_date'] : $this->sma->hrsd($insurance->i_expiration_date)), 'class="form-control date" id="i_expiration_date" required="required"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                            <?php echo lang('Amount', 'Amount') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('i_amount', (isset($_POST['i_amount']) ? $_POST['i_amount'] : $insurance->i_amount), 'class="form-control" id="i_amount" required="required"'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?= lang("Background_Check", "Background_Check") . " *"; ?>
                                            <input type="file" data-browse-label="<?= lang('browse'); ?>"
                                                   name="i_background_check"
                                                   id="i_background_check"
                                                   data-show-upload="false" data-show-preview="false" accept="pdf/*"
                                                   class="form-control file"/>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo form_submit('edit_insurance', lang('Edit_Insurance'), 'class="btn btn-primary"'); ?></p>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane <?php echo ($nav == "training") ? "active" : ''; ?>" id="training">
        <div class="box">
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form', 'id'=>'training_form');
                        echo admin_form_open_multipart("notaries/edit_training/" . $notary->id, $attrib);
                        ?>
                        <div class="row">
                            <fieldset class="scheduler-border">
                                <legend style="text-align: center" class="scheduler-border"><i
                                            class="fa-fw fa fa-th"></i> <b>Training Certification</b></legend>
                                <div class="col-md-12">
                                    <div class="col-md-5 ">
                                        <div class="form-group">
                                            <input type="radio" class="checkbox type" value="Loan Signing System" name="training" id="loan_signing" <?= ($training->training=='Loan Signing System' ? 'checked="checked"' : ''); ?> required="required">
                                            <label for="featured" class="padding05"><?= lang('Loan_Signing_System') ?></label>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" class="checkbox type" value="Notary2pro" name="training" id="notary_pro" <?= ($training->training=='Notary2pro' ? 'checked="checked"' : ''); ?> required="required">
                                            <label for="featured" class="padding05"><?= lang('Notary2pro') ?></label>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" class="checkbox type" value=123Notary" name="training" id="notary_123" <?= ($training->training=='123Notary' ? 'checked="checked"' : ''); ?> required="required">
                                            <label for="featured" class="padding05"><?= lang('123Notary') ?></label>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" class="checkbox type" value=Other" name="training" id="other" <?= ($training->training=='Other' ? 'checked="checked"' : ''); ?> required="required">
                                            <label for="featured" class="padding05"><?= lang('Other') ?></label>
                                        </div>

                                        <div class="form-group">
                                            <?= lang("Training_Certificate", "Training_Certificate") . " *"; ?>
                                            <input type="file" data-browse-label="<?= lang('browse'); ?>"
                                                   name="training_certificate"
                                                   id="training_certificate"
                                                   data-show-upload="false" data-show-preview="false" accept="pdf/*"
                                                   class="form-control file"/>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo form_submit('edit_training', lang('Edit_Training'), 'class="btn btn-primary"'); ?></p>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane <?php echo ($nav == "payment") ? "active" : ''; ?>" id="payment">
        <div class="box">
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <?php $attrib = array('class' => 'form-horizontal', 'data-toggle' => 'validator', 'role' => 'form');
                        echo admin_form_open_multipart("notaries/edit_payment/" . $notary->id, $attrib);
                        ?>
                        <div class="row">
                            <fieldset class="scheduler-border">
                                <legend style="text-align: center" class="scheduler-border"><i
                                            class="fa-fw fa fa-th"></i> <b>Payment</b></legend>
                                <div class="col-md-12">
                                    <div class="col-md-5 ">
                                        <div class="form-group">
                                            <?php echo lang('Make_Cheque_Payable_To', 'Make_Cheque_Payable_To') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('cheque_payable', (isset($_POST['cheque_payable']) ? $_POST['cheque_payable'] : $payment->cheque_payable), 'class="form-control" id="cheque_payable" required="required"'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <?php echo lang('SSE/ENI', 'SSE/ENI') . '<b> *</b>'; ?>
                                            <div class="controls">
                                                <?php echo form_input('eni', (isset($_POST['eni']) ? $_POST['eni'] : $payment->eni), 'class="form-control" id="eni" required="required"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                            <?= lang("W-9", "W-9") . " *"; ?>
                                            <input type="file" data-browse-label="<?= lang('browse'); ?>"
                                                   name="w_9"
                                                   id="w_9"
                                                   data-show-upload="false" data-show-preview="false" accept="pdf/*"
                                                   class="form-control file"/>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo form_submit('edit_payment', lang('Edit_Payment'), 'class="btn btn-primary"'); ?></p>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#training_form input:checkbox").change(function() {
        $("#training_form input:checkbox").attr("checked", false);
        $(this).attr("checked", true);
        console.log( $(this));
    });
</script>

