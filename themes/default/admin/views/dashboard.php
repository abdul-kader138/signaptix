<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
function row_status($x)
{
    if ($x == null) {
        return '';
    } elseif ($x == 'pending') {
        return '<div class="text-center"><span class="label label-warning">' . lang($x) . '</span></div>';
    } elseif ($x == 'completed' || $x == 'paid' || $x == 'sent' || $x == 'received') {
        return '<div class="text-center"><span class="label label-success">' . lang($x) . '</span></div>';
    } elseif ($x == 'partial' || $x == 'transferring') {
        return '<div class="text-center"><span class="label label-info">' . lang($x) . '</span></div>';
    } elseif ($x == 'due') {
        return '<div class="text-center"><span class="label label-danger">' . lang($x) . '</span></div>';
    } else {
        return '<div class="text-center"><span class="label label-default">' . lang($x) . '</span></div>';
    }
}

$m_central = 0;
$m_east = 0;
$m_north = 0;
$m_south = 0;
$m_tobago = 0;

foreach ($zone_male_history as $zones) {
    if ($zones->zone == 'Central') $m_central = (int)$zones->id;
    if ($zones->zone == 'East') $m_east = (int)$zones->id;
    if ($zones->zone == 'North') $m_north = (int)$zones->id;
    if ($zones->zone == 'South') $m_south = (int)$zones->id;
    if ($zones->zone == 'Tobago') $m_tobago = (int)$zones->id;
}


$f_central = 0;
$f_east = 0;
$f_north = 0;
$f_south = 0;
$f_tobago = 0;

foreach ($zone_female_history as $zones_m) {
    if ($zones_m->zone == 'Central') $f_central = (int)$zones_m->id;
    if ($zones_m->zone == 'East') $f_east = (int)$zones_m->id;
    if ($zones_m->zone == 'North') $f_north = (int)$zones_m->id;
    if ($zones_m->zone == 'South') $f_south = (int)$zones_m->id;
    if ($zones_m->zone == 'Tobago') $f_tobago = (int)$zones_m->id;
}
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
    $(function () {

        Highcharts.chart('bschart_js', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'Job Summary',
                align: 'center',
                // verticalAlign: 'middle',
                // y: 60
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,

                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'Job',
                innerSize: '50%',
                data: [
                    ['Jobs Open', 57],
                    ['Work In Process', 37],
                    {
                        name: 'Job Closed',
                        y: 6,
                        dataLabels: {
                            enabled: true
                        }
                    }
                ]
            }]
        });

        Highcharts.chart('bschart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Wise Job Summary'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: false
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true,
                enabled: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Job Initiated',
                data: [83, 78, 98, 93, 106, 84, 105, 104, 91, 83, 106, 92]

            }, {
                name: 'Job Resolved',
                data: [49, 71, 97, 87, 100, 82, 85, 70, 87, 75, 95, 54]

            }]
        });
    });

</script>


<div class="row" style="margin-bottom: 5px;">
    <div class="col-sm-12">
        <div class="col-sm-3">
            <div class="card mini-stat bg-blue">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon"><i class="fa fa-users float-right"></i></div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3"></h6>
                        <h5 >Total Users</h5>
                        <a class="text-card-muted text-font" href="#"><?= $total_clients->total ? $total_clients->total : 0 ?></a></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mini-stat bg-mild">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon"><i class="fa fa-user-plus float-right"></i></div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3"></h6>
                        <h5 >Total Clients</h5>
                        <a class="text-card-muted text-font" href="#"><?= $total_clients->total ? $total_clients->total : 0 ?></a></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mini-stat bg-purple">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon"><i class="fa fa-user-plus float-right"></i></div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3"></h6>
                        <h5 >Total Notary Person</h5>
                        <a class="text-card-muted text-font" href="#">0</a></div>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mini-stat bg-pink">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon"><i class="fa fa-tasks float-right"></i></div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3"></h6>
                        <h5 >Total Jobs</h5>
                        <a class="text-card-muted text-font" href="#">0</a></div>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-8">
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i
                            class="fa-fw fa fa-line-chart"></i>Monthly Wise Job Summary
                </h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <div id="bschart" style="width:100%; height:450px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i
                            class="fa-fw fa fa-line-chart"></i>Job Summary
                </h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <div id="bschart_js" style="width:100%; height:450px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-bottom: 15px;">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-tasks"></i> <?= lang('latest_five') ?></h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">

                        <ul id="dbTab" class="nav nav-tabs">
                            <?php if ($Owner || $Admin || $GP['users-index']) { ?>
                                <li class=""><a href="#sales"><?= lang('Users') ?></a></li>
                            <?php }
                            if ($Owner || $Admin || $GP['clients-index']) { ?>
                                <li class=""><a href="#players"><?= lang('Clients') ?></a></li>
                            <?php }
                            ?>
                        </ul>

                        <div class="tab-content">
                            <?php if ($Owner || $Admin || $GP['users-index']) { ?>

                                <div id="sales" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="sales-tbl" cellpadding="0" cellspacing="0" border="0"
                                                       class="table table-bordered table-hover table-striped"
                                                       style="margin-bottom: 0;">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:30px !important;">#</th>
                                                        <th><?= $this->lang->line("Full_Name"); ?></th>
                                                        <th><?= $this->lang->line("User_Name"); ?></th>
                                                        <th><?= $this->lang->line("Email"); ?></th>
                                                        <th><?= $this->lang->line("Phone"); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if (!empty($users)) {
                                                        $r = 1;
                                                        foreach ($users as $user) {
                                                            echo '<tr><td>' . $r . '</td>
                                                            <td>' . $user->first_name . ' ' . $user->last_name . '</td>
                                                            <td>' . $user->username . '</td>
                                                            <td>' . $user->email . '</td>
                                                            <td>' . $user->phone . '</td>
                                                        </tr>';
                                                            $r++;
                                                        }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="6"
                                                                class="dataTables_empty"><?= lang('no_data_available') ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }
                            if ($Owner || $Admin) { ?>

                                <div id="coaches" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="quotes-tbl" cellpadding="0" cellspacing="0" border="0"
                                                       class="table table-bordered table-hover table-striped"
                                                       style="margin-bottom: 0;">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:30px !important;">#</th>
                                                        <th><?= $this->lang->line("Full_Name"); ?></th>
                                                        <th><?= $this->lang->line("User_Name"); ?></th>
                                                        <th><?= $this->lang->line("Email"); ?></th>
                                                        <th><?= $this->lang->line("Phone"); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if (!empty($coaches)) {
                                                        $r = 1;
                                                        foreach ($coaches as $coach) {
                                                            echo '<tr><td>' . $r . '</td>
                                                            <td>' . $coach->first_name . ' ' . $coach->last_name . '</td>
                                                            <td>' . $coach->username . '</td>
                                                            <td>' . $coach->wname . '</td>
                                                            <td>' . $coach->zone . '</td>
                                                    </tr>';
                                                            $r++;
                                                        }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="6"
                                                                class="dataTables_empty"><?= lang('no_data_available') ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }
                            if ($Owner || $Admin || $GP['clients-index']) { ?>

                                <div id="players" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="purchases-tbl" cellpadding="0" cellspacing="0" border="0"
                                                       class="table table-bordered table-hover table-striped"
                                                       style="margin-bottom: 0;">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:30px !important;">#</th>
                                                        <th><?= $this->lang->line("Full_Name"); ?></th>
                                                        <th><?= $this->lang->line("User_Name"); ?></th>
                                                        <th><?= $this->lang->line("Email"); ?></th>
                                                        <th><?= $this->lang->line("Phone"); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if (!empty($players)) {
                                                        $r = 1;
                                                        foreach ($players as $player) {
                                                            echo '<tr><td>' . $r . '</td>
                                                            <td>' . $player->first_name . ' ' . $player->last_name . '</td>
                                                            <td>' . $this->sma->hrsd($player->dob) . '</td>
                                                            <td>' . $player->bcp . '</td>
                                                            <td>' . $player->wname . '</td>
                                                </tr>';
                                                            $r++;
                                                        }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="6"
                                                                class="dataTables_empty"><?= lang('no_data_available') ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }
                            if ($Owner || $Admin) { ?>

                                <div id="teams" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="transfers-tbl" cellpadding="0" cellspacing="0" border="0"
                                                       class="table table-bordered table-hover table-striped bg-blue"
                                                       style="margin-bottom: 0;">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:30px !important;">#</th>
                                                        <th><?= $this->lang->line("Name"); ?></th>
                                                        <th><?= $this->lang->line("Email"); ?></th>
                                                        <th><?= $this->lang->line("Phone"); ?></th>
                                                        <th><?= $this->lang->line("Principal"); ?></th>
                                                        <th><?= $this->lang->line("Home_Ground"); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if (!empty($schools)) {
                                                        $r = 1;
                                                        foreach ($schools as $school) {
                                                            echo '<tr><td>' . $r . '</td>
                                                            <td>' . $school->name . '</td>
                                                            <td>' . $school->email . '</td>
                                                            <td>' . $school->phone . '</td>
                                                            <td>' . $school->principal . '</td>
                                                            <td>' . $school->home_ground . '</td>
                                            </tr>';
                                                            $r++;
                                                        }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="6"
                                                                class="dataTables_empty"><?= lang('no_data_available') ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

