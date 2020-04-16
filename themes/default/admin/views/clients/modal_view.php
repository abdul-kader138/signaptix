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
            <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;"
                    onclick="window.print();">
                <i class="fa fa-print"></i> <?= lang('print'); ?>
            </button>
            <h4 class="modal-title"
                id="myModalLabel"><?= lang("Client- "); ?><?= $client->company_name; ?> (<?= $client->ref_no; ?>)</h4>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-xs-1">
                    <?=
                    $user->avatar ? '<img alt="" src="' . base_url() . 'assets/uploads/avatars/thumbs/' . $user->avatar . '" class="avatar">' :
                        '<img alt="" src="' . base_url() . 'assets/images/' . strtolower($user->gender) . '.png" class="avatar">';
                    ?>
                </div>
                <div class="col-xs-6">
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped dfTable table-right-left">
                            <tbody>
                            <tr>
                                <td colspan="2" style="background-color:#FFF;"></td>
                            </tr>
                            <tr>
                                <td><?= lang("Company_Name"); ?></td>
                                <td><?= $client->company_name; ?></td>
                            </tr>
                            <tr>
                                <td><?= lang("Company_Phone"); ?></td>
                                <td><?= $client->company_phone; ?></td>
                            </tr>
                            <tr>
                                <td><?= lang("Company_Email"); ?></td>
                                <td><?= $client->company_email; ?></td>
                            </tr>
                            <tr>
                                <td><?= lang("Contact_Person"); ?></td>
                                <td><?= $user->first_name . " " . $user->last_name; ?></td>
                            </tr>
                            <tr>
                                <td><?= lang("Contact_Person_Email"); ?></td>
                                <td><?= $client->contact_email; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xs-5">
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped dfTable table-right-left">
                            <tbody>
                            <tr>
                                <td colspan="2" style="background-color:#FFF;"></td>
                            </tr>
                            <tr>
                                <td><?= lang("Tax_Identification_No"); ?></td>
                                <td><?= $client->tin; ?></td>
                            </tr>
                            <tr>
                                <td><?= lang("Company_Fax"); ?></td>
                                <td><?= $client->company_fax; ?></td>
                            </tr>

                            <tr>
                                <td><?= lang("Contact_Person_Phone"); ?></td>
                                <td><?= $client->contact_phone; ?></td>
                            </tr>
                            <tr>
                                <td><?= lang("Type_Of_Company"); ?></td>
                                <td><?= $client->company_type; ?></td>
                            </tr>
                            <tr>
                                <td><?= lang("How_do_you_want_to_receive_invoices?"); ?></td>
                                <td><?= $client->receive_invoices; ?></td>
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
                            <th>Company Address</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div><?= $this->sma->decode_html($client->company_address); ?></div>
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
                                <td><?= $client->mailing_address; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped dfTable">
                            <thead class="bg-blue">
                            <th>Other Information</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?= $client->note; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="buttons">
            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                    <a href="<?= admin_url('clients/edit/' . $client->id) ?>" class="tip btn btn-info tip"
                       title="<?= lang('Edit') ?>">
                        <i class="fa fa-edit"></i>
                        <span class="hidden-sm hidden-xs"><?= lang('Edit') ?></span>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="#" class="tip btn btn-danger bpo" title="<b><?= lang("Delete") ?></b>"
                       data-content="<div style='width:150px;'><p><?= lang('r_u_sure') ?></p><a class='btn btn-danger' href='<?= admin_url('clients/delete/' . $client->id) ?>'><?= lang('i_m_sure') ?></a> <button class='btn bpo-close'><?= lang('no') ?></button></div>"
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
