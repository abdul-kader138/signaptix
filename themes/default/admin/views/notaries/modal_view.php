<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    td {
        word-break: break-all
    }
</style>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="fa fa-2x">&times;</i>
            </button>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#general_information" aria-controls="profile" role="tab"
                       data-toggle="tab"><?= lang('General_Information') ?></a>
                </li>
                <li role="presentation" class="<?php echo ($nav == "commission") ? "active" : ''; ?>">
                    <a href="#commission" aria-controls="profile" role="tab"
                       data-toggle="tab"><?= lang('Commission') ?></a>
                </li>
                <li role="presentation" class="<?php echo ($nav == "license") ? "active" : ''; ?>">
                    <a href="#license" aria-controls="profile" role="tab"
                       data-toggle="tab"><?= lang('License') ?></a>
                </li>
                <li role="presentation" class="<?php echo ($nav == "background") ? "active" : ''; ?>">
                    <a href="#background" aria-controls="profile" role="tab"
                       data-toggle="tab"><?= lang('Background_Check_&_Insurance') ?></a>
                </li>
                <li role="presentation" class="<?php echo ($nav == "training") ? "active" : ''; ?>">
                    <a href="#training" aria-controls="profile" role="tab"
                       data-toggle="tab"><?= lang('Training_&_Payment') ?></a>
                </li>
            </ul>
        </div>
        <div class="modal-body">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active"
                     id="general_information">
                    <div class="row">
                        <div class="col-xs-1">
                            <?=
                            $user->avatar ? '<img alt="" src="' . base_url() . 'assets/uploads/avatars/thumbs/' . $user->avatar . '" class="avatar">' :
                                '<img alt="" src="' . base_url() . 'assets/images/' . strtolower($user->gender) . '.png" class="avatar">';
                            ?>
                        </div>
                        <div class="col-xs-6">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped">
                                    <tbody>
                                    <tr>
                                        <td><?= lang("Code"); ?></td>
                                        <td><?= $notary->ref_no; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Name"); ?></td>
                                        <td><?= $user->first_name . " " . $user->last_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Phone"); ?></td>
                                        <td><?= $notary->notary_phone; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Mobile No"); ?></td>
                                        <td><?= $notary->notary_mobile; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped">
                                    <tbody>
                                    <tr>
                                        <td colspan="2" style="background-color:#FFF;"></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Office_Phone"); ?></td>
                                        <td><?= $notary->notary_office_phone; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Fax"); ?></td>
                                        <td><?= $notary->notary_fax; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Contact_Person_Phone"); ?></td>
                                        <td><?= $notary->contact_phone; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Contact_Person_Email"); ?></td>
                                        <td><?= $notary->contact_email; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dfTable">
                                    <thead>
                                    <th>Address</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div><?= $this->sma->decode_html($notary->address); ?></div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dfTable">
                                    <thead>
                                    <th>Mailing Address</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $notary->mailing_address; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dfTable">
                                    <thead class="bg-blue">
                                    <th>Tell About Youself</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $notary->about_yourself; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane"
                     id="commission">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td colspan="2" style="text-align: center"><b>Commission</b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Commission_State"); ?></td>
                                        <td><?= $notary_commission->commission_state; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Expiration_Date"); ?></td>
                                        <td><?= $this->sma->hrsd($notary_commission->expiration_date); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Commission_Number"); ?></td>
                                        <td><?= $notary_commission->commission_number; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Notary_Certificate"); ?></td>
                                        <td style="width: 70%"><a
                                                    href="<?= base_url('assets/uploads/notary_commission/') . $notary_commission->certificate_attachment ?>"
                                                    download>
                                                <?php echo $notary_commission->certificate_attachment; ?></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td colspan="2" style="text-align: center"><b>Electronic Commission</b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Electronic_Commission_State"); ?></td>
                                        <td><?= $e_notary_commission->e_commission_state; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Expiration_Date"); ?></td>
                                        <td><?= $this->sma->hrsd($e_notary_commission->e_expiration_date); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Commission_Number"); ?></td>
                                        <td><?= $e_notary_commission->e_commission_number; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Notary_Certificate"); ?></td>
                                        <td style="width: 70%"><a
                                                    href="<?= base_url('assets/uploads/electric_notary_commission/') . $e_notary_commission->e_certificate_attachment ?>"
                                                    download>
                                                <?php echo $e_notary_commission->e_certificate_attachment; ?></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane"
                     id="license">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td colspan="2" style="text-align: center"><b>Producer License</b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("State"); ?></td>
                                        <td><?= $producer_license->state; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Expiration_Date"); ?></td>
                                        <td><?= $this->sma->hrsd($producer_license->p_expiration_date); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("License_Number"); ?></td>
                                        <td><?= $producer_license->license_number; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Notary_Certificate"); ?></td>
                                        <td style="width: 70%"><a
                                                    href="<?= base_url('assets/uploads/notary_producer_license/') . $producer_license->p_certificate_attachment ?>"
                                                    download>
                                                <?php echo $producer_license->p_certificate_attachment; ?></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td colspan="2" style="text-align: center"><b>Bar License</b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("State"); ?></td>
                                        <td><?= $bar_license->b_state; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Expiration_Date"); ?></td>
                                        <td><?= $this->sma->hrsd($bar_license->b_expiration_date); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("License_Number"); ?></td>
                                        <td><?= $bar_license->b_license_number; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Notary_Certificate"); ?></td>
                                        <td style="width: 70%"><a
                                                    href="<?= base_url('assets/uploads/notary_bar_license/') . $bar_license->b_certificate_attachment ?>"
                                                    download>
                                                <?php echo $bar_license->b_certificate_attachment; ?></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane"
                            id="background">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td colspan="2" style="text-align: center"><b>Background Check</b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Company"); ?></td>
                                        <td><?= $background_check->company; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Issue_Date"); ?></td>
                                        <td><?= $this->sma->hrsd($background_check->issue_date); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("URL"); ?></td>
                                        <td><?= $background_check->url; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Background_Check"); ?></td>
                                        <td style="width: 70%"><a
                                                    href="<?= base_url('assets/uploads/notary_background_check/') . $background_check->background_check ?>"
                                                    download>
                                                <?php echo $background_check->background_check; ?></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td colspan="2" style="text-align: center"><b>Error & Omissions Insurance</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Company"); ?></td>
                                        <td><?= $insurance->i_company; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Issue_Date"); ?></td>
                                        <td><?= $this->sma->hrsd($insurance->i_expiration_date); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Policy_Number"); ?></td>
                                        <td><?= $insurance->i_policy_number; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Amount"); ?></td>
                                        <td><?= $insurance->i_amount; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Background_Check"); ?></td>
                                        <td style="width: 70%"><a
                                                    href="<?= base_url('assets/uploads/notary_insurance/') . $insurance->i_background_check ?>"
                                                    download>
                                                <?php echo $insurance->i_background_check; ?></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane"
                     id="training">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td colspan="2" style="text-align: center"><b>Training</b></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Training Certification"); ?></td>
                                        <td><?= $training->training; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Background_Check"); ?></td>
                                        <td style="width: 70%"><a
                                                    href="<?= base_url('assets/uploads/notary_training/') . $training->background_check ?>"
                                                    download>
                                                <?php echo $training->training_certificate; ?></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td colspan="2" style="text-align: center"><b>Payment</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("Make_Cheque_Payable_To"); ?></td>
                                        <td><?= $payment->cheque_payable; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("SSE/ENI"); ?></td>
                                        <td><?= $payment->eni; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang("W-9"); ?></td>
                                        <td style="width: 70%"><a
                                                    href="<?= base_url('assets/uploads/notary_payment/') . $payment->w_9 ?>"
                                                    download>
                                                <?php echo $payment->w_9; ?></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttons">
            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                    <a href="<?= admin_url('notaries/edit/' . $notary->id) ?>" class="tip btn btn-info tip"
                       title="<?= lang('Edit') ?>">
                        <i class="fa fa-edit"></i>
                        <span class="hidden-sm hidden-xs"><?= lang('Edit') ?></span>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="#" class="tip btn btn-danger bpo" title="<b><?= lang("Delete") ?></b>"
                       data-content="<div style='width:150px;'><p><?= lang('r_u_sure') ?></p><a class='btn btn-danger' href='<?= admin_url('notaries/delete/' . $client->id) ?>'><?= lang('i_m_sure') ?></a> <button class='btn bpo-close'><?= lang('no') ?></button></div>"
                       data-html="true" data-placement="top">
                        <i class="fa fa-trash-o"></i>
                        <span class="hidden-sm hidden-xs"><?= lang('delete') ?></span>
                    </a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.tip').tooltip();
            });
        </script>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.change_img').click(function (event) {
            event.preventDefault();
            var img_src = $(this).attr('href');
            $('#pr-image').attr('src', img_src);
            return false;
        });
    });
</script>
