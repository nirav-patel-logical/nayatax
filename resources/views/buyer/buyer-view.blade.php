<!--Start Include header here-->
@include('layouts.header')
<!--End Include header here-->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    @include('layouts.sidebar')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?php echo route('dashboard');?>">{{ trans('label_word.home') }}</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <?php if($buyer_data['buyer_data']->login_role === 'Admin') { ?>
                    <li>
                        <a href="<?php echo route('buyer');?>">{{ trans('label_word.buyer_list') }}</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <?php } ?>
                    <li>
                        <span>{{ trans('label_word.buyer_view') }}</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">{{ trans('label_word.buyer_view') }}</h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN CREATE ADMIN-->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa icon-user font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">{{ trans('label_word.buyer_view') }}</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    <button id="sample_editable_1_new" class="btn sbold green"
                                            onclick="location.href='<?php echo route('buyer_edit', ['id' => $buyer_data['buyer_data']->id]); ?>'"> {{ trans('label_word.edit') }}
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.buyer_name') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">{{$buyer_data['buyer_data']->f_name}}
                                                &nbsp;{{$buyer_data['buyer_data']->m_name}}
                                                &nbsp;{{$buyer_data['buyer_data']->l_name}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.mobile_no') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">{{$buyer_data['buyer_data']->mobile}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.address1') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">
                                                <?php if (!empty($buyer_data['buyer_data']->address1)) {
                                                    echo $buyer_data['buyer_data']->address1;
                                                } else {
                                                    echo '---';
                                                } ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.city') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">{{$buyer_data['buyer_data']->city}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.state') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">{{$buyer_data['buyer_data']->state}}</h5>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.create_by') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">
                                                <?php
                                                if (!empty($buyer_data['add_by'][0]->f_name) && !empty($buyer_data['add_by'][0]->m_name) && !empty($buyer_data['add_by'][0]->l_name)) {
                                                    echo $buyer_data['add_by'][0]->f_name . ' ' . $buyer_data['add_by'][0]->m_name . ' ' . $buyer_data['add_by'][0]->l_name;
                                                } else if (!empty($buyer_data['add_by'][0]->f_name) && empty($buyer_data['add_by'][0]->m_name) && !empty($buyer_data['add_by'][0]->l_name)) {
                                                    echo $buyer_data['add_by'][0]->f_name . ' ' . $buyer_data['add_by'][0]->l_name;
                                                } else if (!empty($buyer_data['add_by'][0]->f_name) && empty($buyer_data['add_by'][0]->m_name) && empty($buyer_data['add_by'][0]->l_name)) {
                                                    echo $buyer_data['add_by'][0]->f_name;
                                                } else {
                                                    echo '---';
                                                }?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.modify_by') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">
                                                <?php
                                                if (!empty($buyer_data['modify_by'][0]->f_name) && !empty($buyer_data['modify_by'][0]->m_name) && !empty($buyer_data['modify_by'][0]->l_name)) {
                                                    echo $buyer_data['modify_by'][0]->f_name . ' ' . $buyer_data['modify_by'][0]->m_name . ' ' . $buyer_data['modify_by'][0]->l_name;
                                                } else if (!empty($buyer_data['modify_by'][0]->f_name) && empty($buyer_data['modify_by'][0]->m_name) && !empty($buyer_data['modify_by'][0]->l_name)) {
                                                    echo $buyer_data['modify_by'][0]->f_name . ' ' . $buyer_data['modify_by'][0]->l_name;
                                                } else if (!empty($buyer_data['modify_by'][0]->f_name) && empty($buyer_data['modify_by'][0]->m_name) && empty($buyer_data['modify_by'][0]->l_name)) {
                                                    echo $buyer_data['modify_by'][0]->f_name;
                                                } else {
                                                    echo '---';
                                                }?>
                                            </h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.nick_name') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">
                                                <?php if ($buyer_data['buyer_data']->nick_name != '') {
                                                    echo $buyer_data['buyer_data']->nick_name;
                                                } else {
                                                    echo "---";
                                                }?>
                                            </h5>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.email') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">{{$buyer_data['buyer_data']->email}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.address2') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">{{$buyer_data['buyer_data']->address2}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.district') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">{{$buyer_data['buyer_data']->district}}</h5>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.create_date') }}
                                                &nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">
                                                <?php if (isset($buyer_data['buyer_data']->add_date) && !empty($buyer_data['buyer_data']->add_date)) {
                                                    echo date('d-m-Y h:i:s', strtotime($buyer_data['buyer_data']->add_date));
                                                } else {
                                                    echo '---';
                                                } ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.modify_date') }}
                                                &nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">
                                                <?php if (isset($buyer_data['buyer_data']->modify_date) && !empty($buyer_data['buyer_data']->modify_date)) {
                                                    echo date('d-m-Y h:i:s', strtotime($buyer_data['buyer_data']->modify_date));
                                                } else {
                                                    echo '---';
                                                } ?>
                                            </h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row margin-top-10 margin-bottom-10" align="center">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="caption">
                                        <i class="fa fa-file-text-o font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">{{ trans('label_word.legal_details') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">

                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.adhar_no') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">
                                                <?php if ($buyer_data['buyer_data']->aadhar_no != '') {
                                                    echo $buyer_data['buyer_data']->aadhar_no;
                                                } else {
                                                    echo "---";
                                                }?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.gst_tin') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">
                                                <?php if ($buyer_data['buyer_data']->gstin_no != '') {
                                                    echo $buyer_data['buyer_data']->gstin_no;
                                                } else {
                                                    echo "---";
                                                }?>
                                            </h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">

                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.hsn_no') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">
                                                <?php if ($buyer_data['buyer_data']->hsn_no != '') {
                                                    echo $buyer_data['buyer_data']->hsn_no;
                                                } else {
                                                    echo "---";
                                                }?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-6">
                                            <label class="text-bold">{{ trans('label_word.pan_no') }}&nbsp;:</label>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-6">
                                            <h5 class="text-normal col-h5">
                                                <?php if ($buyer_data['buyer_data']->pan_no != '') {
                                                    echo $buyer_data['buyer_data']->pan_no;
                                                } else {
                                                    echo "---";
                                                }?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- END CREATE ADMIN-->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN FOOTER -->
    @include('layouts.footer')
   </div>
    <!-- END FOOTER -->
