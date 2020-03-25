<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->lang->line('sale') . ' ' . $inv[0]->reference_no; ?></title>
    <link href="<?= $assets ?>styles/pdf/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $assets ?>styles/pdf/pdf.css" rel="stylesheet">
</head>

<body><?php if ($Settings->logo) {
    $path = base_url() . 'assets/uploads/logos/' . $Settings->logo;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    $years = date('Y');
    ?>
<?php }
?>
<div id="wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="padding12">
                <div class="col-xs-2" style="font-size: 11px;">
                    <img width="80px" height="80px" src="<?= $base64; ?>" alt="<?= $Settings->site_name; ?>">
                </div>

                <div class="col-xs-6" style="text-align: center;font-size: 11px;">

                    <h2>SECONDARY SCHOOLS FOOTBALL LEAGUE</h2>
                    <h2><?= date('Y'); ?> PLAYER REGISTRATION FORM</h2>
                </div>

                <div class="col-xs-2 pull-right" style="font-size: 11px; margin-left: 20px;">
                    <img width="80px" height="80px" src="<?= $base64; ?>" alt="<?= $Settings->site_name; ?>">
                </div>
            </div>
            <div class="clearfix">&nbsp;&nbsp;&nbsp;</div>
            <div class="padding12">
                <p style="justify-content: center;font-size: 12px;">The following bona-fide students of
                    <b><?php echo $inv[0]->s_name; ?></b> are requesting registration as players in the <?php echo date('Y'); ?> season
                    of the Secondary Schools Football League. I hereby verify that the information given
                    is correct and in accordance with the Rules &amp; Regulations of the Ministry of Education.</p>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="padding12">
                <div class="table-responsive">
                    <table style="font-size: 9px;" class="table table-bordered table-hover table-striped">
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
                        <?php
                        $CI =& get_instance();
                        $r = 1;
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
                                    style="text-align:center; vertical-align:middle;">   <?= $CI->order_status($row->trs); ?></td>
                                <td class="col-xs-1"
                                    style="text-align:center; vertical-align:middle;">   <?= $year; ?></td>
                                <td class="col-xs-2"
                                    style="text-align:center; vertical-align:middle;">   <?= $row->last_attend_school; ?></td>
                            </tr>
                            <?php
                            $r++;
                        endforeach;
                        ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="padding12">
                <h3>FOR THE PRINCIPAL:</h3>
                <p style="font-size: 11px;">I am satisfied that the above named players are full time students of this institution and that
                    he/she is not registered with or participating in any other full time educational program. I, wish
                    to indicate by affixing my signature to this registration form, that the information given above is
                    true </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>


<div class="col-xs-4 pull-left">
    <span>----------------------------</span>
    <p style="height: 80px;">Principal</p>
    <span>----------------------------</span>
    <p>Date</p>
</div>

<div class="col-xs-4">
    <span>----------------------------</span>
    <p style="height: 80px;">School Stamp</p>
</div>

<div class="col-xs-4 pull-right">
    <span>----------------------------</span>
    <p style="height: 80px;">Principal</p>
    <span>----------------------------</span>
    <p>Date</p>
</div>
<br>
<br>
