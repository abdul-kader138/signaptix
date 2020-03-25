<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
function order_status($x)
{
    if ($x == '') {
        return '';
    } else if ($x == 'Repeater') {
        return '<b>R</b>';
    } else if ($x == 'Transfer') {
        return '<b>T</b>';
    } else if ($x == 'Transfer Repeater') {
        return '<b>TR</b>';
    } else if ($x == 'N/A') {
        return '<b>N</b>';
    } else {
        return '';
    }
}

?>
<div class="modal-dialog modal-lg" xmlns="http://www.w3.org/1999/html">
    <div class="modal-content">
        <div class="modal-header" style="border-width: 0px;">
            <div class="clearfix"></div>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="fa fa-2x">&times;</i>
            </button>
            <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;"
                    onclick="window.print();">
                <i class="fa fa-print"></i> <?= lang('Print'); ?>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="box">
                    <div class="box-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="clearfix"></div>
                                <div class="well well-sm">
                                    <div class="col-xs-2">
                                        <img width="80px" height="80px"
                                             src="<?= base_url() . 'assets/uploads/logos/' . $Settings->logo; ?>"
                                             alt="<?= $Settings->site_name; ?>">
                                    </div>
                                    <div class="col-xs-8" style="text-align: center">

                                        <h2>SECONDARY SCHOOLS FOOTBALL LEAGUE</h2>
                                        <h2><?=date('Y');?> PLAYER REGISTRATION FORM</h2>
                                    </div>
                                    <div class="col-xs-2">
                                        <img width="80px" height="80px"
                                             src="<?= base_url() . 'assets/uploads/logos/' . $Settings->logo; ?>"
                                             alt="<?= $Settings->site_name; ?>">
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-sm-12" style="justify-content: center"><p>The following bona-fide students of <strong> <?=$inv[0]->s_name?> </strong> are requesting registration as players in the
                                    2019 season of the Secondary Schools Football League. I hereby verify that the information given is
                                    correct and in accordance with the Rules &amp; Regulations of the Ministry of Education.</p></div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped print-table order-table">
                                        <thead>
                                        <tr>
                                            <th><?= lang("SL"); ?></th>
                                            <th><?= lang("Name"); ?></th>
                                            <th><?= lang("DOB"); ?></th>
                                            <th><?= lang("Birth_Certificate_Pin"); ?></th>
                                            <th><?= lang("Gender"); ?></th>
                                            <th><?= lang("Zone"); ?></th>
                                            <th><?= lang("Division"); ?></th>
                                            <th><?= lang("status"); ?></th>
                                            <th><?= lang("SEA_Year"); ?></th>
                                            <th><?= lang("Previous_School"); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $r = 1;
                                        $col = 7;
                                        $total = 0;
                                        foreach ($inv as $row):
                                            $current_year = date("Y");
                                            $sea_year = $row->sea_year;
                                            $year = ($current_year - $sea_year);
                                            ?>
                                            <tr>
                                                <td class="col-xs-1"
                                                    style="text-align:center; vertical-align:middle;"><?= $r; ?></td>
                                                <td class="col-xs-2"
                                                    style="text-align:center; vertical-align:middle;"><?= $row->last_name . ' ' . $row->first_name; ?></td>
                                                <td class="col-xs-1"
                                                    style="text-align:center; vertical-align:middle;">  <?= $this->sma->hrsd($row->dob); ?></td>
                                                <td class="col-xs-1"
                                                    style="text-align:center; vertical-align:middle;">  <?= $row->bcp; ?></td>
                                                <td class="col-xs-1"
                                                    style="text-align:center; vertical-align:middle;">   <?= $row->gender; ?></td>
                                                <td class="col-xs-1"
                                                    style="text-align:center; vertical-align:middle;">   <?= $row->zone; ?></td>
                                                <td class="col-xs-1"
                                                    style="text-align:center; vertical-align:middle;">   <?= $row->d_name; ?></td>
                                                <td class="col-xs-1"
                                                    style="text-align:center; vertical-align:middle;">   <?= order_status($row->trs); ?></td>
                                                <td class="col-xs-1"
                                                    style="text-align:center; vertical-align:middle;">   <?= $year; ?></td>
                                                <td class="col-xs-1"
                                                    style="text-align:center; vertical-align:middle;">   <?= $row->last_attend_school; ?></td>
                                            </tr>
                                            <?php
                                            $total = $total + $row->amount;
                                            $usage = $usage + $row->qty;
                                            $tax_amount = $tax_amount + $row->tax;
                                            $r++;
                                        endforeach;
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr></tr>
                                        </tfoot>
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
                        <a href="<?= admin_url('registration/pdf/' . $inv[0]->r_ref) ?>" class="tip btn btn-success"
                           title="<?= lang('Download_PDF') ?>">
                            <i class="fa fa-download"></i> <span class="hidden-sm hidden-xs"><?= lang('PDF') ?></span>
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

