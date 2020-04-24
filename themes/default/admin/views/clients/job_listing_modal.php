<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
            <h2 class="modal-title" id="myModalLabel"
                style="color: #00A0C6; text-align:center"> <?= $client_job->form_type; ?>
                ( <?= $client_job->order_number; ?>) </h2>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table">

                                <tbody>
                                <tr>
                                    <td>Company Name :</td>
                                    <td><?= $client->company_name ?></td>
                                    <td>|</td>
                                    <td>Company Phone :</td>
                                    <td><?= $client->company_phone ?></td>
                                </tr>
                                <tr>
                                    <td>Company Email :</td>
                                    <td><?= $client->company_email ?></td>
                                    <td>|</td>
                                    <td>Contact Person :</td>
                                    <td><?= $user->first_name . " " . $user->last_name ?></td>
                                </tr>
                                <tr>
                                    <td>Contact Email :</td>
                                    <td><?= $client->contact_email ?></td>
                                    <td>|</td>
                                    <td>Contact Phone :</td>
                                    <td><?= $client->contact_email ?></td>
                                </tr>
                                <tr>
                                    <td>Order No :</td>
                                    <td><?= $client_job->order_number ?></td>
                                    <td>|</td>
                                    <td>Loan Number :</td>
                                    <td><?= $client_job->loan_number ?></td>
                                </tr>
                                <tr>
                                    <td>Date & Time :</td>
                                    <td><?= $this->sma->hrld($client_job->order_date) ?></td>
                                    <td>|</td>
                                    <td>Type Of Signing :</td>
                                    <td><?= $client_job->signing_type ?></td>
                                </tr>
                                <tr>
                                    <td>Document Sent :</td>
                                    <td><?= $client_job->documents_sent ?></td>
                                    <td>|</td>
                                    <td>Signer(Client) :</td>
                                    <td><?= $client_job->signer ?></td>
                                </tr>
                                <tr>
                                    <td>Signing Location :</td>
                                    <td><?= $client_job->signing_location ?></td>
                                    <td>|</td>
                                    <td>Instruction :</td>
                                    <td><?= $client_job->instructions ?></td>
                                </tr>
                                <tr>
                                    <td>Signer :</td>
                                    <td><?= $client_job->signer ?></td>
                                    <td>|</td>
                                    <td>Co-Signer :</td>
                                    <td><?= $client_job->co_signer ?></td>
                                </tr>
                                <tr>
                                    <td>Signing Location :</td>
                                    <td><?= $client_job->signing_location2 ?></td>
                                    <td>|</td>
                                    <td>Property Address :</td>
                                    <td><?= $client_job->property_address ?></td>
                                </tr>
                                <tr>
                                    <td>Signer Phone (Mobile) :</td>
                                    <td><?= $client_job->telephone_mobile ?></td>
                                    <td>|</td>
                                    <td>Signer Phone (Home) :</td>
                                    <td><?= $client_job->telephone_home ?></td>
                                </tr>
                                <tr>
                                    <td>Signer Phone (Work) :</td>
                                    <td><?= $client_job->telephone_work ?></td>
                                    <td>|</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table">

                                <tbody>
                                <tr style="text-align: center">
                                    <td colspan="<?= count($client_document); ?>">Attached Document :</td>
                                </tr>
                                <tr>
                                    <?php foreach ($client_document as $document): ?>
                                        <td>
                                            <a href="<?= base_url("/assets/uploads/clients/job_listing/" . $document->file_name); ?>"
                                               download><?= $document->file_name; ?></a></td>
                                    <?php endforeach; ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class=" clearfix">
                </div>
                <?php if ($analysis->comment) { ?>
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <th>Comment</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= $analysis->comment; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php } ?>

                <div class="col-xs-12">

                    <?= $product->details ? '<div class="panel panel-success"><div class="panel-heading">' . lang('product_details_for_invoice') . '</div><div class="panel-body">' . $product->details . '</div></div>' : ''; ?>
                    <?= $product->product_details ? '<div class="panel panel-primary"><div class="panel-heading">' . lang('product_details') . '</div><div class="panel-body">' . $product->product_details . '</div></div>' : ''; ?>

                </div>
            </div>
            <div class="buttons">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <a href="#" class="tip btn btn-danger bpo" title="<b><?= lang("Delete_Document") ?></b>"
                           data-content="<div style='width:150px;'><p><?= lang('r_u_sure') ?></p><a class='btn btn-danger' href='<?= site_url('document/delete/' . $document->id) ?>'><?= lang('i_m_sure') ?></a> <button class='btn bpo-close'><?= lang('no') ?></button></div>"
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
