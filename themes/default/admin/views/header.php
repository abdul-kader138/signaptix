<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <base href="<?= site_url() ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?> - <?= $Settings->site_name ?></title>
    <link rel="shortcut icon" href="<?= $assets ?>images/icon.png"/>
    <link href="<?= $assets ?>styles/theme.css" rel="stylesheet"/>
    <link href="<?= $assets ?>styles/style.css" rel="stylesheet"/>
    <script type="text/javascript" src="<?= $assets ?>js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?= $assets ?>js/jquery-migrate-1.2.1.min.js"></script>
    <!--[if lt IE 9]>
    <script src="<?= $assets ?>js/jquery.js"></script>
    <![endif]-->
    <noscript>
        <style type="text/css">#loading {
                display: none;
            }</style>
    </noscript>
    <?php if ($Settings->user_rtl) { ?>
        <link href="<?= $assets ?>styles/helpers/bootstrap-rtl.min.css" rel="stylesheet"/>
        <link href="<?= $assets ?>styles/style-rtl.css" rel="stylesheet"/>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.pull-right, .pull-left').addClass('flip');
            });
        </script>
    <?php } ?>
    <script type="text/javascript">
        $(window).load(function () {
            $("#loading").fadeOut("slow");
        });
    </script>
</head>

<body>
<noscript>
    <div class="global-site-notice noscript">
        <div class="notice-inner">
            <p><strong>JavaScript seems to be disabled in your browser.</strong><br>You must have JavaScript enabled in
                your browser to utilize the functionality of this website.</p>
        </div>
    </div>
</noscript>
<div id="loading"></div>
<div id="app_wrapper">
    <header id="header" class="navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= admin_url() ?>"><span class="logo"><?= $Settings->site_name ?></span></a>

            <div class="btn-group visible-xs pull-right btn-visible-sm">
                <button class="navbar-toggle btn" type="button" data-toggle="collapse" data-target="#sidebar_menu">
                    <span class="fa fa-bars"></span>
                </button>
                <?php if (SHOP) { ?>
                    <a href="<?= site_url('/') ?>" class="btn">
                        <span class="fa fa-shopping-cart"></span>
                    </a>
                <?php } ?>
                <a href="<?= admin_url('calendar') ?>" class="btn">
                    <span class="fa fa-calendar"></span>
                </a>
                <a href="<?= admin_url('users/profile/' . $this->session->userdata('user_id')); ?>" class="btn">
                    <span class="fa fa-user"></span>
                </a>
                <a href="<?= admin_url('logout'); ?>" class="btn">
                    <span class="fa fa-sign-out"></span>
                </a>
            </div>
            <div class="header-nav">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                        <a class="btn account dropdown-toggle" data-toggle="dropdown" href="#">
                            <img alt=""
                                 src="<?= $this->session->userdata('avatar') ? base_url() . 'assets/uploads/avatars/thumbs/' . $this->session->userdata('avatar') : base_url('assets/images/male1.png'); ?>"
                                 class="mini_avatar img-rounded">

                            <div class="user">
                                <span><?= lang('welcome') ?> <?= strtoupper($this->session->userdata('username')); ?></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="<?= admin_url('users/profile/' . $this->session->userdata('user_id')); ?>">
                                    <i class="fa fa-user"></i> <?= lang('profile'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= admin_url('users/profile/' . $this->session->userdata('user_id') . '/#cpassword'); ?>"><i
                                            class="fa fa-key"></i> <?= lang('change_password'); ?>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?= admin_url('logout'); ?>">
                                    <i class="fa fa-sign-out"></i> <?= lang('logout'); ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown hidden-xs">
                        <a class="btn tip" title="<?= lang('Chat') ?>" data-placement="bottom" href="#"
                           data-toggle="dropdown">
                            <i class="fa fa-comments"></i></i>
                        </a>
                    </li>
                    <li class="dropdown hidden-xs"><a class="btn tip" title="<?= lang('dashboard') ?>"
                                                      data-placement="bottom" href="<?= admin_url('welcome') ?>"><i
                                    class="fa fa-dashboard"></i></a></li>
                    <?php if ($Owner) { ?>
                        <li class="dropdown hidden-sm">
                            <a class="btn tip" title="<?= lang('settings') ?>" data-placement="bottom"
                               href="<?= admin_url('system_settings') ?>">
                                <i class="fa fa-cogs"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="dropdown hidden-xs">
                        <a class="btn tip" title="<?= lang('calculator') ?>" data-placement="bottom" href="#"
                           data-toggle="dropdown">
                            <i class="fa fa-calculator"></i>
                        </a>
                        <ul class="dropdown-menu pull-right calc">
                            <li class="dropdown-content">
                                <span id="inlineCalc"></span>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown hidden-sm">
                        <a class="btn tip" title="<?= lang('styles') ?>" data-placement="bottom" data-toggle="dropdown"
                           href="#">
                            <i class="fa fa-css3"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li class="bwhite noPadding">
                                <a href="#" id="fixed" class="">
                                    <i class="fa fa-angle-double-left"></i>
                                    <span id="fixedText">Fixed</span>
                                </a>
                                <a href="#" id="cssBlue" class="blue">
                                    <i class="fa fa-stop"></i> Blue
                                </a>
                                <a href="#" id="cssBlack" class="black">
                                    <i class="fa fa-stop"></i> Black
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container" id="container">
        <div class="row" id="main-con">
            <table class="lt">
                <tr>
                    <td class="sidebar-con">
                        <div id="sidebar-left">
                            <div class="sidebar-nav nav-collapse collapse navbar-collapse" id="sidebar_menu">
                                <ul class="nav main-menu">
                                    <li class="mm_welcome">
                                        <a href="<?= admin_url() ?>">
                                            <i class="fa fa-dashboard"></i>
                                            <span class="text"> <?= lang('dashboard'); ?></span>
                                        </a>
                                    </li>

                                    <?php
                                    if ($Owner || $Admin) { ?>
                                        <li class="mm_auth">
                                            <a class="dropmenu" href="#">
                                                <i class="fa fa-users"></i>
                                                <span class="text"> <?= lang('Users'); ?> </span>
                                                <span class="chevron closed"></span>
                                            </a>
                                            <ul>
                                                <li id="auth_users">
                                                    <a class="submenu" href="<?= admin_url('users'); ?>">
                                                        <i class="fa fa-users"></i><span
                                                                class="text"> <?= lang('list_users'); ?></span>
                                                    </a>
                                                </li>
                                                <li id="auth_create_user">
                                                    <a class="submenu"
                                                       href="<?= admin_url('users/create_user'); ?>">
                                                        <i class="fa fa-user-plus"></i><span
                                                                class="text"> <?= lang('new_user'); ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>


                                        <li class="mm_clients">
                                            <a class="dropmenu" href="#">
                                                <i class="fa fa-user-md"></i>
                                                <span class="text"> <?= lang('Clients'); ?> </span>
                                                <span class="chevron closed"></span>
                                            </a>
                                            <ul>
                                                <li id="clients_index">
                                                    <a class="submenu"
                                                       href="<?= admin_url('clients'); ?>">
                                                        <i class="fa fa-users"></i><span
                                                                class="text"> <?= lang('List_Clients'); ?></span>
                                                    </a>
                                                </li>
                                                <li id="clients_add">
                                                    <a class="submenu"
                                                       href="<?= admin_url('clients/add'); ?>">
                                                        <i class="fa fa-user-plus"></i><span
                                                                class="text"> <?= lang('Add_Client'); ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mm_notaries">
                                            <a class="dropmenu" href="#">
                                                <i class="fa fa-user-md"></i>
                                                <span class="text"> <?= lang('Notaries'); ?> </span>
                                                <span class="chevron closed"></span>
                                            </a>
                                            <ul>
                                                <li id="clients_index">
                                                    <a class="submenu"
                                                       href="<?= admin_url('notaries'); ?>">
                                                        <i class="fa fa-users"></i><span
                                                                class="text"> <?= lang('List_Notaries'); ?></span>
                                                    </a>
                                                </li>
                                                <li id="clients_add">
                                                    <a class="submenu"
                                                       href="<?= admin_url('notaries/add'); ?>">
                                                        <i class="fa fa-user-plus"></i><span
                                                                class="text"> <?= lang('Add_Notary'); ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="mm_notifications">
                                            <a class="submenu" href="<?= admin_url('notifications'); ?>">
                                                <i class="fa fa-info-circle"></i><span
                                                        class="text"> <?= lang('notifications'); ?></span>
                                            </a>
                                        </li>

                                        <li class="mm_calendar">
                                            <a class="submenu" href="<?= admin_url('calendar'); ?>">
                                                <i class="fa fa-calendar"></i><span
                                                        class="text"> <?= lang('Event_Calender'); ?></span>
                                            </a>
                                        </li>
                                        <?php if ($Owner) { ?>
                                            <li class="mm_system_settings <?= strtolower($this->router->fetch_method()) == 'sales' ? '' : 'mm_pos' ?>">
                                                <a class="dropmenu" href="#">
                                                    <i class="fa fa-cog"></i><span
                                                            class="text"> <?= lang('settings'); ?> </span>
                                                    <span class="chevron closed"></span>
                                                </a>
                                                <ul>
                                                    <li id="system_settings_index">
                                                        <a href="<?= admin_url('system_settings') ?>">
                                                            <i class="fa fa-cogs"></i><span
                                                                    class="text"> <?= lang('system_settings'); ?></span>
                                                        </a>
                                                    </li>
                                                    <li id="system_settings_change_logo">
                                                        <a href="<?= admin_url('system_settings/change_logo') ?>"
                                                           data-toggle="modal" data-target="#myModal">
                                                            <i class="fa fa-upload"></i><span
                                                                    class="text"> <?= lang('change_logo'); ?></span>
                                                        </a>
                                                    </li>

                                                    <li id="system_settings_email_templates">
                                                        <a href="<?= admin_url('system_settings/email_templates') ?>">
                                                            <i class="fa fa-envelope"></i><span
                                                                    class="text"> <?= lang('email_templates'); ?></span>
                                                        </a>
                                                    </li>
                                                    <li id="system_settings_user_groups">
                                                        <a href="<?= admin_url('system_settings/user_groups') ?>">
                                                            <i class="fa fa-key"></i><span
                                                                    class="text"> <?= lang('group_permissions'); ?></span>
                                                        </a>
                                                    </li>
                                                    <li id="system_settings_backups">
                                                        <a href="<?= admin_url('system_settings/backups') ?>">
                                                            <i class="fa fa-database"></i><span
                                                                    class="text"> <?= lang('Backups'); ?></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php } ?>

                                        <?php
                                    } else { // not owner and not admin ?>
                                            <li class="mm_calendar">
                                                <a href="<?= admin_url('calendar') ?>" class="btn-block link">
                                                    <i class="fa fa-calendar"></i> <?= lang('Event_Calender') ?>
                                                </a>
                                            </li>

                                        <?php if ($GP['clients-index'] || $GP['clients-add']) { ?>
                                            <li class="mm_clients">
                                                <a class="dropmenu" href="#">
                                                    <i class="fa fa-user-md"></i>
                                                    <span class="text"> <?= lang('Clients'); ?> </span>
                                                    <span class="chevron closed"></span>
                                                </a>
                                                <ul>
                                                    <?php if ($GP['clients-index']) { ?>
                                                        <li id="clients_index">
                                                            <a class="submenu"
                                                               href="<?= admin_url('clients'); ?>">
                                                                <i class="fa fa-users"></i><span
                                                                        class="text"> <?= lang('List_Clients'); ?></span>
                                                            </a>
                                                        </li>

                                                    <?php } ?>

                                                    <?php if ($GP['clients-add']) { ?>
                                                        <li id="clients_add">
                                                            <a class="submenu"
                                                               href="<?= admin_url('clients/add'); ?>">
                                                                <i class="fa fa-user-plus"></i><span
                                                                        class="text"> <?= lang('Add_Client'); ?></span>
                                                            </a>
                                                        </li>

                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                            <a href="#" id="main-menu-act" class="full visible-md visible-lg">
                                <i class="fa fa-angle-double-left"></i>
                            </a>
                        </div>
                    </td>
                    <td class="content-con">
                        <div id="content">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <ul class="breadcrumb">
                                        <?php
                                        foreach ($bc as $b) {
                                            if ($b['link'] === '#') {
                                                echo '<li class="active">' . $b['page'] . '</li>';
                                            } else {
                                                echo '<li><a href="' . $b['link'] . '">' . $b['page'] . '</a></li>';
                                            }
                                        }
                                        ?>
                                        <li class="right_log hidden-xs">
                                            <?= lang('your_ip') . ' ' . $ip_address . " <span class='hidden-sm'>( " . lang('last_login_at') . ": " . date($dateFormats['php_ldate'], $this->session->userdata('old_last_login')) . " " . ($this->session->userdata('last_ip') != $ip_address ? lang('ip:') . ' ' . $this->session->userdata('last_ip') : '') . " )</span>" ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if ($message) { ?>
                                        <div class="alert alert-success">
                                            <button data-dismiss="alert" class="close" type="button">×</button>
                                            <?= $message; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($error) { ?>
                                        <div class="alert alert-danger">
                                            <button data-dismiss="alert" class="close" type="button">×</button>
                                            <?= $error; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($warning) { ?>
                                        <div class="alert alert-warning">
                                            <button data-dismiss="alert" class="close" type="button">×</button>
                                            <?= $warning; ?>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($info) {
                                        foreach ($info as $n) {
                                            if (!$this->session->userdata('hidden' . $n->id)) {
                                                ?>
                                                <div class="alert alert-info">
                                                    <a href="#" id="<?= $n->id ?>" class="close hideComment external"
                                                       data-dismiss="alert">&times;</a>
                                                    <?= $n->comment; ?>
                                                </div>
                                            <?php }
                                        }
                                    } ?>
                                    <div class="alerts-con"></div>
