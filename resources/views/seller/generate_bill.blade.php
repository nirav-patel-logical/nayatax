<!--Start Include header here-->
<style>
    #errmsg {
        color: red;
    }
</style>
@include('layouts.header')
<!--End Include header here-->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container" >
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
                    <li>
                        <span>{{ trans('label_word.farmer_bill') }}</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN CREATE ADMIN-->

            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa icon-user font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold ">Select Farmer</span>
                            </div>
                            <div class="action">
                                <div class="col-sm-3 pull-right" id="divMobileSearch">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="glyphicon glyphicon-search"></i>
                                            <input name='mobile_no' id="mobile_no" type='text' class="form-control "
                                                   placeholder="{{ trans('label_word.search_farmer') }}" value=""
                                                   autofocus
                                                   onkeyup="search_farmer();">
                                            <span class="help-block" id="msgMonth" style="float:right;"></span>
                                            <input type="hidden" id="mobile_no_selected" value=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 pull-right">
                                    @if($data['role_id'] ==1)
                                        <div class="form-group" id="div_nick_name">
                                            <select name="nick_name" id="nick_name" class="form-control select2">
                                                @foreach($data['company_list'] as $item)
                                                    <option value="{{$item->id}}"
                                                    <?php if (isset($seller_data['seller_data']) && !empty($seller_data['seller_data']) && $item->id == $seller_data['seller_data']->biz_id) {
                                                        echo 'selected';
                                                    }?>>{{$item->biz_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    @else
                                        <div class="form-group hidden" id="div_nick_name" >
                                            <select name="nick_name" id="nick_name" class="form-control select2 hidden">
                                                @foreach($data['company_list'] as $item)
                                                    <option value="{{$item->id}}"
                                                    <?php if (isset($seller_data['seller_data']) && !empty($seller_data['seller_data']) && $item->id == $seller_data['seller_data']->biz_id) {
                                                        echo 'selected';
                                                    }?>>{{$item->biz_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    @endif
                                    <span class="help-block" id="msg_nick_name" style="float:right;"></span>
                                    <input type="hidden" id="nick_name_selected" value=""/>

                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form name="farmer_add" id="bill_Add" method="post" enctype="multipart/form-data">

                                <!-- Display Data Ends-->
                                <div class="row"><!-- Add Information Row-->
                                    <div class="col-sm-3">

                                        <div class="form-group" id="div_farmer_name">
                                            <label class="control-label">{{ trans('label_word.first_name') }}</label>

                                            <div class="input-icon">
                                                <input type='text' id="first_name" class="form-control"
                                                       name='farmer_name'
                                                       value="" placeholder="{{ trans('label_word.first_name') }}">
                                                <span class="help-block" id="msg_farmer_name"
                                                      style="float:right;"></span>
                                                <input type="hidden" id="farmer_name_selected" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group" id="div_mobile">
                                            <label class="control-label">{{ trans('label_word.mobile_no') }}</label>

                                            <div class="input-icon">
                                                <input name='mobile' id="mobile" type='text' class="form-control"
                                                       value=""
                                                       placeholder="{{ trans('label_word.mobile_no') }}">
                                                <span class="help-block" id="msg_mobile" style="float:right;"></span>
                                                <input type="hidden" id="mobile_selected" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group" id="divcity">

                                            <label class="control-label">{{ trans('label_word.city') }}</label>

                                            <div class="input-icon">
                                                <input name='city' id="city" type='city' class="form-control" value=""
                                                       placeholder="{{ trans('label_word.city') }}">
                                                <span class="help-block" id="msgcity" style="float:right;"></span>

                                                <input type="hidden" id="city_selected" value=""/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group pull-right" id="page_id">
                                            <input type="hidden" id="farmer_id" value=""/>
                                            <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

                                            <div id="add_farmer_data">
                                                <button type="button" value="Save" id="farmer_data_save" name="btn_save"
                                                        class="btn green"
                                                        onclick="add_farmer_data()">{{ trans('label_word.submit') }}</button>
                                                <a href="<?php echo route('dashboard'); ?>"
                                                   class="btn default">{{ trans('label_word.cancel') }}</a>
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="chnageFarmer">
                                            <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <button type="button" value="Save"
                                                    class="btn default"
                                                    onclick="change_farmer()" style="margin-top: 25px;">
                                                <i class="fa fa-refresh"></i> Change Farmer
                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                        <!--<div class="row">
                            <div class="col-sm-3">
                                <input type="hidden" id="farmer_id" value="" />
                                <div class="form-group" id="add_farmer_data" style="display: none;">
                                    <input type="button" value="Save" id="farmer_data_save" name="btn_save" style=" background:#e67e22;border:0px; color:#fff;width: 26%;" class="btn btn-primary col-md-12" />
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa icon-user font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold ">Select Goods</span>
                                    </div>
                                    <div class="action">
                                        <button type="button" value="Save" id="changes_goods_types"
                                                class="btn default pull-right hidden"
                                                onclick="change_Goods()" style="margin-top: 2px;" >
                                            <i class="fa fa-refresh"></i> Change Goods
                                        </button>
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 pull-right" id="div_good_type">
                                            <div class="form-group">
                                                <div class="input-icon">
                                                    <!-- <select name='good_type' style="    width: 154px;" id="good_type" onchange="gethsnno()">
                                                        <option value="">Select Goods</option>
                                                        @foreach($data['goods_type_list'] as $list)
                                                            <option value="{{$list->gt_id}}">{{$list->gt_type}}</option>
                                                        @endforeach
                                                            </select>-->
                                                    <input type="text" class="form-control" id="good_type"
                                                           name="good_type"
                                                           placeholder="{{ trans('label_word.good_type_sidebar') }}"
                                                           onkeyup="search_goods_type();">
                                                    <input type="hidden" id="goods_type_selected" value="">

                                                    <p class="help-block" id="msg_good_type"></p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row" id="Form_add_farmer_invoice">
                                        <div class="form-group inline-radio-hight">

                                            <label class="col-md-6 control-label">{{ trans('label_word.gst_item_include') }}</label>

                                            <div class="col-md-6">
                                                <div class="radio-inline">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="tex" id="yes"
                                                               value="True" > {{ trans('label_word.yes') }} </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="tex" id="no"
                                                               value="False" > {{ trans('label_word.no') }} </label>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-12 col-lg-3 " id="div_hsn_no"
                                                >
                                            <div class="form-group">

                                                <input type="text" class="form-control" id="hsn_no" name="hsn_no"
                                                       placeholder="{{ trans('label_word.hsn_no') }}">

                                                <p class="help-block" id="msg_hsn_no"></p>

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xs-12 col-lg-3 " id="div_cgst">
                                            <div class="form-group">

                                                <input type="text" class="form-control" id="cgst_tax"
                                                       name="cgst_tax"
                                                       placeholder="{{ trans('label_word.c_tax') }}">

                                                <p class="help-block" id="msg_cgst"></p>

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xs-12 col-lg-3 " id="div_sgst">
                                            <div class="form-group">

                                                <input type="text" class="form-control" id="sgst_tax"
                                                       name="sgst_tax"
                                                       placeholder="{{ trans('label_word.s_tax') }}">

                                                <p class="help-block" id="msg_sgst"></p>

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xs-12 col-lg-3 " id="div_igst">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="igst_tax"
                                                       name="igst_tax"
                                                       placeholder="{{ trans('label_word.i_tax') }}">

                                                <p class="help-block" id="msg_igst"></p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12 col-lg-4 " id="div_weight">
                                            <div class="form-group">

                                                <input type="text" class="form-control" id="weight" name="weight"
                                                       placeholder="{{ trans('label_word.weight') }} (Kg.)">

                                                <p class="help-block" id="msg_weight"></p>

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-lg-4 " id="div_price">

                                            <div class="form-group">

                                                <input type="text" class="form-control" id="price" name="price"
                                                       placeholder="{{ trans('label_word.price') }} Per <?php if (!empty($data['site_setting_data'])) {
                                                           echo $data['site_setting_data']->setting_kg_price;
                                                       }?>">

                                                <p class="help-block" id="msg_price"></p>

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-lg-4 " id="div_bags">
                                            <div class="form-group">

                                                <input type="text" class="form-control" id="bags" name="bags"
                                                       placeholder="{{ trans('label_word.bags') }}">

                                                <p class="help-block" id="msg_bags"></p>
                                            </div>
                                        </div>
                                        <!--<div class="col-md-12 col-xs-12 col-lg-12 " id="page_id">
                                            <input type="hidden" id="farmer_id" value=""/>

                                            <div id="add_farmer_data" style="display: none;">
                                                <button type="button" value="Save" id="farmer_data_save" name="btn_save"
                                                        class="btn green"
                                                        onclick="add_farmer_data()">{{ trans('label_word.submit') }}</button>
                                            </div>
                                        </div>-->


                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portlet light bordered" id="buyer_bill_Add_data">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa icon-user font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold ">Select Buyer</span>
                                    </div>
                                    <div class="action">
                                        <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 pull-right">
                                            <div class="form-group" id="buyer_name_hide">
                                                <div class="input-icon">

                                                    <i class="glyphicon glyphicon-search"></i>

                                                    <input type="text" class="form-control" id="buyer_name"
                                                           name="buyer_name"
                                                           placeholder="{{ trans('label_word.search_buyer') }}"
                                                           autofocus
                                                           onkeyup="search_buyer();">
                                                    <input type="hidden" id="buyer_name_selected" value="">
                                                    <input type="hidden" id="buyer_name_select" value="">

                                                    <p class="help-block" id="msg_buyer_name"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <form name="buyer_bill_Add" id="buyer_bill_Add" method="post"
                                          enctype="multipart/form-data">
                                        <div id="buyer_add_data_form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" id="div_buyer_names">
                                                        <input type="text" class="form-control" id="buyer_names"
                                                               name="buyer_names"
                                                               value=""
                                                               placeholder="{{ trans('label_word.first_name') }}"
                                                               autofocus>

                                                        <p class="help-block" id="msg_buyer_names"></p>

                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group" id="div_buyer_mobile">
                                                        <input type="text" class="form-control" id="buyer_mobile"
                                                               name="buyer_mobile"
                                                               value=""
                                                               placeholder="{{ trans('label_word.mobile_no') }}"
                                                               autofocus>

                                                        <p class="help-block" id="msg_buyer_mobile"></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">

                                                    <div class="form-group" id="div_buyer_city">
                                                        <input type="text" class="form-control" id="buyer_city"
                                                               name="buyer_city"
                                                               value=""
                                                               placeholder="{{ trans('label_word.city') }}" autofocus>

                                                        <p class="help-block" id="msg_buyer_city"></p>

                                                    </div>

                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group" id="div_buyer_district">
                                                        <input type="text" class="form-control" id="buyer_district"
                                                               placeholder="{{ trans('label_word.district') }}"
                                                               name="buyer_district"
                                                               value=""
                                                               autofocus>

                                                        <p class="help-block" id="msg_buyer_district"></p>

                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group" id="div_buyer_state">
                                                        <input type="text" class="form-control" id="buyer_state"
                                                               name="buyer_state"
                                                               placeholder="{{ trans('label_word.state') }}" value=""
                                                               autofocus>

                                                        <p class="help-block" id="msg_buyer_state"></p>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6">

                                                <div class="form-group">
                                                    <div class="input-icon">
                                                        <select name="company_select" id="company_select" class="form-control select2">
                                                            @foreach($data['company_list'] as $item)
                                                                <option value="{{$item->id}}"
                                                                <?php if (isset($seller_data['seller_data']) && !empty($seller_data['seller_data']) && $item->id == $seller_data['seller_data']->biz_id) {
                                                echo 'selected';
                                            }?>>{{$item->biz_name}}</option>
                                                            @endforeach
                                                    </select>

                                                    <p class="help-block" id="msg_company_select"></p>
                                                </div>
                                            </div>

                                        </div>-->
                                            <div class="row">
                                            <div class="col-md-2 pull-right">
                                                <div class="form-group">
                                                    <button type="button" id="add_new_row_for_product"
                                                            class="btn green">{{ trans('label_word.save') }}</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6 " id="page_id">
                                                <input type="hidden" id="buyer_id" value=""/>

                                                <div class="pull-left" id="add_buyer_data">
                                                    <button type="button" value="Save" id="addmaintencebillbtn"
                                                            name="btn_save"
                                                            class="btn green"
                                                            onclick="add_buyer_data()">{{ trans('label_word.submit') }}</button>
                                                    <a href="<?php echo route('dashboard'); ?>"
                                                       class="btn default">{{ trans('label_word.cancel') }}</a>
                                                </div>

                                            </div>
                                            </div>

                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="portlet light bordered" id="Form_view_farmer_invoice" style="display: none">
                        <span id="msg_remove_product" class="pull-right"></span>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                <table class="table table-hover" style="margin: 0;">
                                    <thead id="table_header">
                                    <tr>
                                        <th class='text-center'> SR. No</th>
                                        <th class='text-center'> {{ trans('label_word.buyer_name') }}</th>
                                        <th class='text-center'> {{ trans('label_word.good_type_sidebar') }}</th>
                                        <th class='text-center'> {{ trans('label_word.weight') }}(Kg.)</th>
                                        <th class='text-center'> {{ trans('label_word.price') }} Per
                                            <?php if (!empty($data['site_setting_data'])) {
                                                echo $data['site_setting_data']->setting_kg_price;
                                            }?>
                                            <input type='hidden' name="price_kg"
                                                   id="price_kg"
                                                   value="<?php if (!empty($data['site_setting_data'])) {
                                                       echo $data['site_setting_data']->setting_kg_price;
                                                   }?>"
                                        </th>
                                        <th class='text-right'> {{ trans('label_word.bags') }}</th>
                                        <th class='text-right'> {{ trans('label_word.total') }}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="add_row_tr_td">

                                    </tbody>
                                </table>

                                <table class="table table-hover" style="margin: 0;">
                                    <tbody id="total_table">
                                    <tr>
                                        <td class="text-right" id="market" style="line-height: 2.42857 !important;">
                                                                <span style="margin-left: 921px;">{{ trans('label_word.wages') }}

                                                                    :</span>
                                            <span>
                                            <input type="text"
                                                   style="width: 10%; float: right;"
                                                   name="market_fee" class="form-control" id="market_fee"
                                                   value="<?php echo $data['site_setting_data']->settings_wages;?>"
                                                   disabled>&nbsp;
                                                </span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" id="market" style="line-height: 2.42857 !important;">
                                                                <span style="margin-left: 876px;">Other Charge
                                                                    :</span>
                                            <span>
                                            <input type="text" class="form-control"
                                                   style="width: 10%;  float: right;"
                                                   name="other_charge" id="other_charge"
                                                   value="">&nbsp;</span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="text-right" id="grand_total">
                                                                <span style="margin-left: 876px;">{{ trans('label_word.grand_total') }}
                                                                    :</span>
                                            <i
                                                    class="fa fa-inr"
                                                    aria-hidden="true"></i>&nbsp; <label id="grandTotal"
                                                                                         for="grandTotal"></label>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <span id="msg_market_fee"></span>
                                <input type="hidden" value="" id="supergrandTotal">

                            </div>

                            <div class="text-right" id="page_id">
                                <button type="button" id="product_submit"
                                        class="btn green">{{ trans('label_word.submit') }}</button>
                                <!--<button type="button" id="product_submit_pdf" class="btn green" >Save AND Print</button>-->
                                <a href="<?php echo route('dashboard'); ?>"
                                   class="btn default">{{ trans('label_word.cancel') }}</a>
                            </div>

                        </div>
                        <!--</div>-->

                    </div>

                </div>



            </div>

            <div class="clearfix"></div>
            <!-- END CREATE ADMIN-->

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
@include('layouts.footer')

<!-- END FOOTER -->

<script>

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    //--------------------------------------Search farmer data---------------------------------
    $("#add_farmer_data").hide();
    var display_add_data = [];
    var selected_farmer_mobile_number;
    var buyer_display_add_data = [];
    var buyers_display_add_data = [];
    var goods_display_data = [];
    var goods_data_details =[];
    $('#nick_name').on('change', function() {
        display_add_data =[];
        buyer_display_add_data = [];
        goods_display_data = [];
        goods_data_details =[];
        $("#first_name").prop("disabled", false);
        $("#mobile").prop("disabled", false);
        $("#city").prop("disabled", false);
        $("#good_type").val('');
        search_farmer();
        search_buyer();
        search_goods_type();
    })
    function search_farmer() {
        var company_id =$('#nick_name').val();
        if (display_add_data.length == 0) {
            $('#mobile_no').addClass('loadinggif');
            $.ajax({
                url: '<?php echo route('seller_data_serach');?>',
                method: 'POST',
                data: {
                    '_token': '<?php echo csrf_token();?>',
                    'company_id': company_id
                },
                success: function (result) {
                    $('#mobile_no').removeClass('loadinggif');
                    display_add_data = [];
                    var obj = JSON.parse(result);

                    var length = obj.length;

                    for (var i = 0; i < length; i++) {

                        // farmer_user_id.push(obj[i].id);
                        //  farmer_data.push({id:obj[i].id, name:obj[i].f_name + ' ' +obj[i].m_name+ ' ' +obj[i].l_name , email:obj[i].email, mobile:obj[i].mobile,company_name:obj[i].biz_name,city:obj[i].city});
                        display_add_data.push(obj[i].f_name + ' ' + obj[i].m_name + ' ' + obj[i].l_name + '-' + obj[i].mobile + '-' + obj[i].city)
                    }
                },
                complete: function (result) {
                    $('#mobile_no').removeClass('loadinggif');
                }
            });

        }


        $("#mobile_no").autocomplete({
            source: display_add_data,
            minLength: 3
        })
        $("#add_farmer_data").hide();
        $('#mobile_no').on('autocompletechange change', function () {

            $('#mobile_no_selected').val(this.value);
            var flags = 0;
            if (this.value.length > 3) {
                for (var a = 0; a < display_add_data.length; a++) {
                    if (this.value == display_add_data[a]) {
                        flags = 1;
                        break;
                    }
                }
                if (flags == 1) {
                    selected_farmer_mobile_number = this.value;
                    $("#first_name").prop("disabled", false);
                    $("#mobile").prop("disabled", false);
                    $("#city").prop("disabled", false);
                    $("#msgMonth").html('');
                    $("#add_farmer_data").hide();
                    search_all_farmer_data();
                } else {
                    $("#first_name").prop("disabled", false);
                    $("#mobile").prop("disabled", false);
                    $("#city").prop("disabled", false);
                    $("#add_farmer_data").show();
                    $("#msgMonth").html("No Data Found.");
                    $("#farmer_name").html('');
                    $("#farmer_mobile").html('');
                    $("#farmer_city").html('');
                    $('#farmer_id').val('');
                    $("#msgMonth").attr("style", "color:red");
                    //  add_farmer_data();
                }
            }

        }).change();
    }
    function search_all_farmer_data() {
        var farmer_name_selected = $('#mobile_no_selected').val();
        $('#divMobileSearch').hide();
        $("#add_farmer_data").attr("style", "display:none");
        if (farmer_name_selected != '') {
            var all_data = farmer_name_selected.split("-");
            var mobile_no = all_data[1];
            var name = all_data[0];
            var city = all_data[2];
            $("#first_name").val(name);
            $("#mobile").val(mobile_no);
            $("#city").val(city);
            $('#farmer_id').val(mobile_no);
            $('#chnageFarmer').removeClass('hidden');
            $("#Form_add_farmer_invoice").attr("style", "display:block");
            $("#buyer_bill_Add").attr("style", "display:block");
            $("#buyer_bill_Add_data").attr("style", "display:block");
            $("#first_name").prop("disabled", true);
            $("#mobile").prop("disabled", true);
            $("#city").prop("disabled", true);

        }
    }
    //--------------------------------Add Farmer Data----------------------------------------

    function add_farmer_data() {

        var flag = 0;
        var scroll_element = '';


        var mobile_no = $('#mobile').val();
        var city = $('#city').val();
        var nick_name = $('#nick_name').val();
        var farmer_name = $('#first_name').val();
        var middle_name = $('#middle_name').val();
        var last_name = $('#last_name').val();
        var district = $('#district').val();
        var state = $('#state').val();
        var flag = 0;
        if (mobile_no == '') {
            $("#div_mobile").addClass('has-error');
            $("#msg_mobile").html("Required Field..");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_mobile';
            }

        } else if (mobile_no != '') {
            var user_id = '';
            var mobile_test = $.ajax({
                url: '<?php echo route("check_unique_mobile");?>',
                method: 'POST',
                async: false,
                data: {
                    'mobile': mobile_no,
                    'user_id': user_id,
                    '_token': '<?php echo csrf_token();?>'
                },
                success: function (result) {
                    $obj = JSON.parse(result);
                    if ($obj['SUCCESS'] == 'TRUE') {
                        $("#div_mobile").removeClass('has-error');
                        $("#msg_mobile").html("");
                        $("#btnSubmit").removeAttr('disabled');
                    } else {
                        $("#div_mobile").addClass('has-error');
                        $("#msg_mobile").html("Mobile Exist.");
                        flag++;
                    }

                }
            });
        } else {
            $("#div_mobile").removeClass('has-error');
            $("#msg_mobile").html("");
        }
        if (farmer_name == '') {
            $("#div_farmer_name").addClass('has-error');
            $("#msg_farmer_name").html("Required Field...");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_farmer_name';
            }

        } else {
            $("#div_farmer_name").removeClass('has-error');
            $("#msg_farmer_name").html("");
        }
        if (middle_name == '') {
            $("#div_middle_name").addClass('has-error');
            $("#msg_middle_name").html("Required Field...");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_middle_name';
            }

        } else {
            $("#div_middle_name").removeClass('has-error');
            $("#msg_middle_name").html("");
        }
        if (last_name == '') {
            $("#div_last_name").addClass('has-error');
            $("#msg_last_namee").html("Required Field...");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_last_name';
            }

        } else {
            $("#div_last_name").removeClass('has-error');
            $("#msg_last_namee").html("");
        }
        if (city == '') {
            $("#divcity").addClass('has-error');
            $("#msgcity").html("Required Field...");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'divcity';
            }

        } else {
            $("#divcity").removeClass('has-error');
            $("#msgcity").html("");
        }
        if (flag == 0) {
            $("#msg_bags").html("");
            $.ajax({
                url: '<?php echo route('farmer_data_add');?>',
                method: 'POST',
                data: {
                    'mobile_no': mobile_no,
                    'name': farmer_name,
                    'city': city,
                    'middle_name': middle_name,
                    'nick_name': nick_name,
                    'last_name': last_name,
                    '_token': '<?php echo csrf_token();?>'
                },
                success: function (result) {
                    $obj = JSON.parse(result);
                    if ($obj == '') {
                        $("#add_farmer_data").attr("style", "display:block");
                        $("#msgMonth").html("No Data Found.");
                        $("#msgMonth").attr("style", "color:red");
                    }
                    else {
                        $("#first_name").val($obj[0].f_name + ' ' + $obj[0].m_name + ' ' + $obj[0].l_name);
                        $("#mobile").val($obj[0].mobile);
                        $("#city").val($obj[0].city);
                        $('#farmer_id').val($obj[0].mobile);
                        $("#msgMonth").html('');
                    }

                }

            });
        } else {

            return false;
        }

    }

    function change_farmer(){
        $("#first_name").val('');
        $("#mobile").val('');
        $("#city").val('');
        $('#farmer_id').val('');
        $('#mobile_no').val('');
        $("#first_name").prop("disabled", false);
        $("#mobile").prop("disabled", false);
        $("#city").prop("disabled", false);
        $('#divMobileSearch').show();
        $('#chnageFarmer').addClass('hidden');
    }
    //--------------------------------------Search Buyer data---------------------------------


    function search_buyer() {
        $('#mobile_no').val('');
        var company_id =$('#nick_name').val();
        var buyer_name = [];
        if (buyer_display_add_data.length == 0) {
            $.ajax({
                url: '<?php echo route('buyer_data_serach');?>',
                method: 'POST',
                data: {
                    '_token': '<?php echo csrf_token();?>',
                    'company_id': company_id
                },
                success: function (result) {
                    buyer_display_add_data = [];
                    var obj = JSON.parse(result);

                    var length = obj.length;

                    for (var i = 0; i < length; i++) {

                        buyer_display_add_data.push(obj[i].f_name + ' ' + obj[i].m_name + ' ' + obj[i].l_name + '-' + obj[i].mobile + '-' + obj[i].city)
                        buyers_display_add_data.push(obj[i].mobile + '-' + obj[i].district + '-' + obj[i].state )
                    }
                }
            });
        }

        $("#buyer_name").autocomplete({
            source: buyer_display_add_data,
            minLength: 3
        })

        $('#buyer_name').on('autocompletechange change', function () {

            $('#buyer_name_selected').val(this.value);
            var flagss = 0;

            if (this.value.length > 3) {
                for (var a = 0; a < buyer_display_add_data.length; a++) {

                    if (this.value == buyer_display_add_data[a]) {
                        flagss = 1;
                        break;
                    }

                }

                if (flagss == 1) {
                    $("#msg_buyer_name").html('');
                    $("#buyer_mobile").prop("disabled", false);
                    $("#buyer_names").prop("disabled", false);
                    $("#buyer_city").prop("disabled", false);
                    $("#buyer_district").prop("disabled", false);
                    $("#buyer_state").prop("disabled", false);
                    search_all_buyer_data();
                    $('#add_buyer_data').hide();
                    $('#add_new_row_for_product').show();
                    $("#msgMonth").html("");
                } else {
                    $('#add_buyer_data').show();
                    $('#add_new_row_for_product').hide();
                    $("#msg_buyer_name").html("No Data Found.");
                    $("#msg_buyer_name").css("color", "red");
                    // $("#buyer_add_data_form").attr("style", "display:block");
                    $('#buyer_mobile').val('');
                    $('#buyer_names').val('');
                    $('#buyer_city').val('');
                    $('#buyer_district').val('');
                    $('#buyer_state').val('');
                    $("#buyer_district").prop("disabled", false);
                    $("#buyer_state").prop("disabled", false);
                    $("#buyer_mobile").prop("disabled", false);
                    $("#buyer_names").prop("disabled", false);
                    $("#buyer_city").prop("disabled", false);
                }
            }

        }).change();


    }

    function search_all_buyer_data() {
        var buyer_name_selected = $('#buyer_name_selected').val();


        var city = $('#city').val();

        if (buyer_name_selected != '') {
            var all_data = buyer_name_selected.split("-");
            var mobile_no = all_data[1];
            var name = all_data[0];
            var city = all_data[2];
            for(var i=0; i<buyers_display_add_data.length; i++){
                var buyers_all_data = buyers_display_add_data[i].split("-");
                if(mobile_no == buyers_all_data[0]){
                    $('#buyer_district').val(buyers_all_data[1]);
                    $('#buyer_state').val(buyers_all_data[2]);
                }
            }
            $('#buyer_mobile').val(mobile_no);
            $('#buyer_names').val(name);
            $('#buyer_city').val(city);

            // $("#buyer_mobile").val(mobile_no);
            $("#buyer_name_select").val(name);
            //$('#buyer_name_hide').hide();
            $("#buyer_district").prop("disabled", true);
            $("#buyer_state").prop("disabled", true);
            $("#buyer_mobile").prop("disabled", true);
            $("#buyer_names").prop("disabled", true);
            $("#buyer_city").prop("disabled", true);
        }
    }

    $('#add_buyer_data').hide();
    function add_buyer_data() {

        var flag = 0;
        var scroll_element = '';


        var buyer_mobile = $('#buyer_mobile').val();
        var buyer_names = $('#buyer_names').val();
        var buyer_middle_name = $('#buyer_middle_name').val();
        var buyer_last_name = $('#buyer_last_name').val();
        var buyer_city = $('#buyer_city').val();
        var buyer_district = $('#buyer_district').val();
        var buyer_state = $('#buyer_state').val();
        var company_select =$('#nick_name').val();
        var flag = 0;
        if (buyer_mobile == '') {
            $("#div_buyer_mobile").addClass('has-error');
            $("#msg_buyer_mobile").html("Required Field..");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_mobile';
            }

        } else if (buyer_mobile != '') {
            var user_id = '';
            var mobile_test = $.ajax({
                url: '<?php echo route("check_unique_mobile");?>',
                method: 'POST',
                async: false,
                data: {
                    'mobile': buyer_mobile,
                    'user_id': user_id,
                    '_token': '<?php echo csrf_token();?>'
                },
                success: function (result) {
                    $obj = JSON.parse(result);
                    if ($obj['SUCCESS'] == 'TRUE') {
                        $("#div_buyer_mobile").removeClass('has-error');
                        $("#msg_buyer_mobile").html("");
                        $("#btnSubmit").removeAttr('disabled');
                    } else {
                        $("#div_buyer_mobile").addClass('has-error');
                        $("#msg_buyer_mobile").html("Mobile Exist.");
                        flag++;
                    }

                }
            });
        } else {
            $("#div_buyer_mobile").removeClass('has-error');
            $("#msg_buyer_mobile").html("");
        }
        if (buyer_names == '') {
            $("#div_buyer_names").addClass('has-error');
            $("#msg_buyer_names").html("Required Field...");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_buyer_names';
            }

        } else {
            $("#div_buyer_names").removeClass('has-error');
            $("#msg_buyer_names").html("");
        }
        if (buyer_middle_name == '') {
            $("#div_buyer_middle_name").addClass('has-error');
            $("#msg_buyer_middle_name").html("Required Field...");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_buyer_middle_name';
            }

        } else {
            $("#div_buyer_middle_name").removeClass('has-error');
            $("#msg_buyer_middle_name").html("");
        }
        if (buyer_last_name == '') {
            $("#div_buyer_last_name").addClass('has-error');
            $("#msg_buyer_last_name").html("Required Field...");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'buyer_last_name';
            }

        } else {
            $("#div_buyer_last_name").removeClass('has-error');
            $("#msg_buyer_last_name").html("");
        }
        if (buyer_city == '') {
            $("#div_buyer_city").addClass('has-error');
            $("#msg_buyer_city").html("Required Field...");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_buyer_city';
            }

        } else {
            $("#div_buyer_city").removeClass('has-error');
            $("#msg_buyer_city").html("");
        }
        if (buyer_district == '') {
            $("#div_buyer_district").addClass('has-error');
            $("#msg_buyer_district").html("Required Field...");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_buyer_district';
            }

        } else {
            $("#div_buyer_district").removeClass('has-error');
            $("#msg_buyer_district").html("");
        }
        if (flag == 0) {
            $("#msg_bags").html("");
            $.ajax({
                url: '<?php echo route('farmer_data_add');?>',
                method: 'POST',
                data: {
                    'mobile_no': buyer_mobile,
                    'name': buyer_names,
                    'city': buyer_city,
                    'middle_name': buyer_middle_name,
                    'nick_name': company_select,
                    'last_name': buyer_last_name,
                    'buyer_district': buyer_district,
                    'buyer_state': buyer_state,
                    'type': 'buyer',
                    '_token': '<?php echo csrf_token();?>'
                },
                success: function (result) {
                    $obj = JSON.parse(result);
                    if ($obj == '') {
                        $("#div_buyer_district").attr("style", "display:block");
                        $("#div_buyer_city").attr("style", "display:block");
                        $("#buyer_middle_name").attr("style", "display:block");
                        $("#div_buyer_last_name").attr("style", "display:block");
                        $("#div_nick_name").attr("style", "display:block");
                        $("#div_buyer_names").attr("style", "display:block");
                        $("#div_buyer_state").attr("style", "display:block");
                        $("#div_buyer_mobile").attr("style", "display:block");
                        $("#msg_buyer_name").html("No Data Found.");
                        $('#buyer_mobile').val('');
                        $('#buyer_names').val('');
                        $('#buyer_city').val('');
                        $('#add_buyer_data').show();
                        $("#msg_buyer_name").attr("style", "color:red");
                        $('#add_new_row_for_product').hide();
                        // $('#buyer_name_hide').show();
                    }
                    else {
                        $('#buyer_mobile').val($obj[0].mobile);
                        $('#buyer_names').val($obj[0].f_name + ' ' + $obj[0].m_name + ' ' + $obj[0].l_name);
                        $('#buyer_city').val($obj[0].city);
                        $('#buyer_district').val($obj[0].district);
                        $('#buyer_state').val($obj[0].state);
                        $("#buyer_name_select").val($obj[0].f_name + ' ' + $obj[0].m_name + ' ' + $obj[0].l_name);
                        $('#buyer_id').val($obj[0].id);
                        $("#buyer_name").html();
                        $("#msg_buyer_name").html('');
                        $('#add_new_row_for_product').show();
                        $('#add_buyer_data').hide();
                        //  $('#buyer_name_hide').hide();
                        $("#Form_add_farmer_invoice").attr("style", "display:block");
                    }


                }

            });
        }

    }
</script>


<script>
    //called when key is pressed in textbox
    $("#weight").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            //  $("#errmsg").html("Digits Only").show().fadeOut("slow");
            $("#div_weight").addClass('has-error');
            $("#msg_weight").html("Digits Only");
            return false;
        }
        else {
            $("#div_weight").removeClass('has-error');
            $("#msg_weight").html("");
        }
    });


    $("#buyer_names").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (CheckAlphabate(e.keyCode)) {
            $("#div_buyer_names").addClass('has-error');
            $("#msg_buyer_names").html("Alphabate Only");
            return false;
        }
        else {
            $("#div_buyer_names").removeClass('has-error');
            $("#msg_buyer_names").html("");
        }
    });

    function CheckAlphabate(key) {
        // var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            return true;
        }
        else {
            return false;
        }
    }
    function CheckDigits(key) {
        if (key != 8 && key != 0 && (key < 48 || key > 57)) {
            return true;
        }
        else {
            return false;
        }
    }
    $("#bags").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (CheckDigits(e.which)) {
            $("#div_bags").addClass('has-error');
            $("#msg_bags").html("Digits Only");
            return false;
        }
        else {
            $("#div_bags").removeClass('has-error');
            $("#msg_bags").html("");
        }
    });

    $("#price").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            //  $("#errmsg").html("Digits Only").show().fadeOut("slow");
            $("#div_price").addClass('has-error');
            $("#msg_price").html("Digits Only");
            return false;
        }
        else {
            $("#div_price").removeClass('has-error');
            $("#msg_price").html("");
        }
    });
    $("#market_fee").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            //  $("#errmsg").html("Digits Only").show().fadeOut("slow");
            $("#msg_market_fee").html("Digits Only Enter In Market Fees");
            return false;
        }
        else {
            $("#msg_market_fee").html("");
        }
    });

    $("#other_charge").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            //  $("#errmsg").html("Digits Only").show().fadeOut("slow");
            $("#msg_market_fee").html("Digits Only Enter In Other Charge");
            return false;
        }
        else {
            $("#msg_market_fee").html("");
        }
    });

    $("#farmer_name").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            $("#div_farmer_name").addClass('has-error');
            $("#msg_farmer_name").html("Alphabate Only");
            return false;
        }
        else {
            $("#div_farmer_name").removeClass('has-error');
            $("#msg_farmer_name").html("");
        }
    });

    $("#good_type").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            $("#div_good_type").addClass('has-error');
            $("#msg_good_type").html("Alphabate Only");
            return false;
        }
        else {
            $("#div_good_type").removeClass('has-error');
            $("#msg_good_type").html("");
        }
    });

    $("#first_name").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            $("#div_farmer_name").addClass('has-error');
            $("#msg_farmer_name").html("Alphabate Only");
            return false;
        }
        else {
            $("#div_farmer_name").removeClass('has-error');
            $("#msg_farmer_name").html("");
        }
    });

    $("#mobile").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            //  $("#errmsg").html("Digits Only").show().fadeOut("slow");
            $("#div_mobile").addClass('has-error');
            $("#msg_mobile").html("Digits Only");
            return false;
        }
        else {
            $("#div_mobile").removeClass('has-error');
            $("#msg_mobile").html("");
        }
    });

    $("#farmer_name").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            $("#div_farmer_name").addClass('has-error');
            $("#msg_farmer_name").html("Alphabate Only");
            return false;
        }
        else {
            $("#div_farmer_name").removeClass('has-error');
            $("#msg_farmer_name").html("");
        }
    });
    $("#last_name").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            $("#div_last_name").addClass('has-error');
            $("#msg_last_namee").html("Alphabate Only");
            return false;
        }
        else {
            $("#div_last_name").removeClass('has-error');
            $("#msg_last_namee").html("");
        }
    });
    $("#middle_name").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            $("#div_middle_name").addClass('has-error');
            $("#msg_middle_name").html("Alphabate Only");
            if (scroll_element == '') {
                scroll_element = 'div_middle_name';
            }
            return false;
        }
        else {
            $("#div_middle_name").removeClass('has-error');
            $("#msg_middle_name").html("");
        }
    });
    $("#city").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            $("#divcity").addClass('has-error');
            $("#msgcity").html("Alphabate Only");
            return false;
        }
        else {
            $("#divcity").removeClass('has-error');
            $("#msgcity").html("");
        }
    });


    $("#buyer_mobile").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            //  $("#errmsg").html("Digits Only").show().fadeOut("slow");
            $("#div_buyer_mobile").addClass('has-error');
            $("#msg_buyer_mobile").html("Digits Only");
            return false;
        }
        else {
            $("#div_buyer_mobile").removeClass('has-error');
            $("#msg_buyer_mobile").html("");
        }
    });


    $("#buyer_middle_name").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            $("#div_buyer_middle_name").addClass('has-error');
            $("#msg_buyer_middle_name").html("Alphabate Only");
            return false;
        }
        else {
            $("#div_buyer_middle_name").removeClass('has-error');
            $("#msg_buyer_middle_name").html("");
        }
    });
    $("#buyer_last_name").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            $("#div_buyer_last_name").addClass('has-error');
            $("#msg_buyer_last_name").html("Alphabate Only");
            return false;
        }
        else {
            $("#div_buyer_last_name").removeClass('has-error');
            $("#msg_buyer_last_name").html("");
        }
    });
    $("#buyer_city").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            $("#div_buyer_city").addClass('has-error');
            $("#msg_buyer_city").html("Alphabate Only");
            return false;
        }
        else {
            $("#div_buyer_city").removeClass('has-error');
            $("#msg_buyer_city").html("");
        }
    });

    function search_goods_type() {
        var company_id =$('#nick_name').val();
        var search_name = $('#b_search_name').html();
        if (search_name == '') {
            $('#msg_buyer_name').html('Please First Select Buyer.');
            $("#msg_buyer_name").css("color", "red");
            $("#buyer_name").focus();
            return false;
        } else {
            $('#msg_buyer_name').html('');
        }
        $('#buyer_name').val('');
        var display_add_data = [];

        if (goods_display_data.length == 0) {
            $.ajax({
                url: '<?php echo route('good_type_serach');?>',
                method: 'POST',
                data: {
                    '_token': '<?php echo csrf_token();?>',
                    'company_id':company_id
                },
                success: function (result) {
                    var obj = JSON.parse(result);

                    var length = obj.length;
                    goods_display_data =[];
                    for (var i = 0; i < length; i++) {

                        goods_display_data.push(obj[i].gt_type);
                        goods_data_details.push(obj[i].gt_type +'-'+obj[i].gt_hsn_no +'-'+ obj[i].gt_cgst_tax +'-'+ obj[i].gt_cgst_tax +'-'+ obj[i].gt_cgst_tax+'-'+ obj[i].gt_is_tax_apply);
                    }
                }
            });
        }

        $("#good_type").autocomplete({
            source: goods_display_data,
            minLength: 2
        })

        $('#good_type').on('autocompletechange change', function () {
            $('#good_type_selected').val(this.value);

            var flagsss = 0;

            if (this.value.length > 2) {
                for (var a = 0; a < goods_display_data.length; a++) {

                    if (this.value == goods_display_data[a]) {
                        flagsss = 1;
                        break;
                    }

                }

                if (flagsss == 1) {
                    for (var a = 0; a < goods_data_details.length; a++) {
                        var all_data_goods_type_details = goods_data_details[a].split("-");
                        var all_data_goods_type = all_data_goods_type_details[0];
                        if (this.value == all_data_goods_type) {
                            $("#hsn_no").val(all_data_goods_type_details[1]);
                            $("#cgst_tax").val(all_data_goods_type_details[2]);
                            $("#sgst_tax").val(all_data_goods_type_details[3]);
                            $("#igst_tax").val(all_data_goods_type_details[4]);
                            if(all_data_goods_type_details[5] == 'True'){
                                $('#uniform-yes span').addClass('checked');
                                $('#uniform-no span').removeClass('checked');
                            }else{
                                $('#uniform-no span').addClass('checked');
                                $('#uniform-yes span').removeClass('checked');
                            }

                        }
                    }
                    $('#changes_goods_types').removeClass('hidden');
                    $("#hsn_no").prop("disabled", true);
                    $("#cgst_tax").prop("disabled", true);
                    $("#sgst_tax").prop("disabled", true);
                    $("#igst_tax").prop("disabled", true);
                    $("#yes").prop("disabled", true);
                    $("#no").prop("disabled", true);
                } else {
                    $('#changes_goods_types').addClass('hidden');
                    $('#uniform-yes span').removeClass('checked');
                    $('#uniform-no span').removeClass('checked');
                    $("#hsn_no").val('');
                    $("#cgst_tax").val('');
                    $("#sgst_tax").val('');
                    $("#igst_tax").val('');
                    $("#hsn_no").prop("disabled", false);
                    $("#cgst_tax").prop("disabled", false);
                    $("#sgst_tax").prop("disabled", false);
                    $("#igst_tax").prop("disabled", false);
                    $("#yes").prop("disabled", false);
                    $("#no").prop("disabled", false);
                }
            }

        }).change();
    }


</script>
<script>
    var buyer_input = document.getElementById('buyer_city');
    var autocomplete = new google.maps.places.Autocomplete(buyer_input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
        /*$("#result").html('');*/
        var types_arr;
        $("#place_id").val(place.place_id);
        var city = '';
        var state = '';
        var country = '';

        $.each(place.address_components, function (index, value) {
            //$("#result").html($("#result").html()+'<label><strong>'+index+'</strong>:&nbsp;&nbsp;</label>'+value+'<br>');
            /*$.each(this.types,function(index,value){
             alert(this.index);
             });*/
            var locality = 0;
            var administrative_area_level_2 = 0;
            var administrative_area_level_1 = 0;
            var country = 0;
            //alert(place.place_id);

            $.each(this.types, function (index, value) {
                //alert(index+' -- '+value);
                if (value == 'locality') {
                    locality++;
                    return;
                }
                ;
                if (value == 'administrative_area_level_2') {
                    administrative_area_level_2++;
                    return;
                }
                ;
                if (value == 'administrative_area_level_1') {
                    administrative_area_level_1++;
                    return;
                }
                ;
                if (value == 'country') {
                    country++;
                    return;
                }
                ;
            });

            if (locality > 0) {
                city = this.long_name;
                $("#buyer_city").val(this.long_name);
            } else if (administrative_area_level_1 > 0) {
                state = this.long_name;
                if (city == '') {
                    //$("#"+element_city).val(this.long_name);
                    $("#buyer_city").val('');
                }
                $("#buyer_state").val(this.long_name);
            } else if (administrative_area_level_2 > 0) {
                distirict = this.long_name;
                if (city == '') {
                    $("#buyer_district").val('');
                }
                $("#buyer_district").val(this.long_name);
            } else if (country > 0) {
                country = this.long_name;
                if (state == '') {
                    //$("#"+element_state).val(this.long_name);
                    $("#buyer_state").val('');
                }
                if (city == '') {
                    if (state != '') {
                        //$("#"+element_city).val(state);
                        $("#buyer_state").val('');
                    } else {
                        //$("#"+element_city).val(this.long_name);
                        $("#buyer_city").val('');
                    }
                }

                $("#buyer_country").val(this.long_name);
            } else {

            }
        });
    });

    var Save_all_product_data = [];
    var product_grand_total = 0;

    $("#add_new_row_for_product").on("click", function () {

        $("#buyer_name").focus();

        var buyer_name = $("#buyer_name").val();
        var b_search_name = $("#buyer_names").val();
        var b_search_mobile = $("#buyer_mobile").val();
        var good_type = $("#good_type").val();
        var hsn_no = $("#hsn_no").val();
        var weight = $("#weight").val();
        var price = $("#price").val();
        var bags = $("#bags").val();
        var buyer_mobile = $("#buyer_mobile").val();
        var buyer_id = $("#buyer_id").val();
        var cgst_tax = $("#cgst_tax").val();
        var sgst_tax = $("#sgst_tax").val();
        var igst_tax = $("#igst_tax").val();

        if($('#uniform-yes span').hasClass('checked')){
            var tex_value = "True";
        }
        else if($('#uniform-no span').hasClass('checked')){
            var tex_value = "False";
        }

        var flag = 0;
        var scroll_element = '';

        if (b_search_name == '') {
            $("#buyer_name_hide").addClass('has-error');
            $("#msg_buyer_name").html("Please Select Buyer.");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_buyer_mobile';
            }

        } else {
            $("#buyer_name_hide").removeClass('has-error');
            $("#msg_buyer_name").html("");
        }

        if (good_type == '') {
            $("#div_good_type").addClass('has-error');
            //$("#msg_good_type").html("Required Field.");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_good_type';
            }

        } else {
            $("#div_good_type").removeClass('has-error');
            $("#msg_good_type").html("");
        }

        if (weight == '') {
            $("#div_weight").addClass('has-error');
            //$("#msg_good_type").html("Required Field.");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_weight';
            }

        } else {
            $("#div_weight").removeClass('has-error');
            // $("#msg_good_type").html("");
        }

        if (price == '') {
            $("#div_price").addClass('has-error');
            //$("#msg_good_type").html("Required Field.");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_price';
            }

        } else {
            $("#div_price").removeClass('has-error');
            // $("#msg_good_type").html("");
        }

        if (bags == '') {
            $("#div_bags").addClass('has-error');
            //$("#msg_good_type").html("Required Field.");
            flag++;
            if (scroll_element == '') {
                scroll_element = 'div_weight';
            }

        } else {
            $("#div_bags").removeClass('has-error');
            // $("#msg_good_type").html("");
        }


        if (flag == 0) {
            $("#msg_bags").html("");

            var kg = $("#price_kg").val().replace('Kg', '');

            if (kg != 1) {
                var kg_price = (price * 1) / kg;

            } else {
                var kg_price = (price * 1);
            }


            var total = weight * kg_price;
            if (isNaN(total)) {
                $("#msg_bags").html("Please Enter Valid Input.");
                $("#msg_bags").attr("style", "color:red");
                if (scroll_element == '') {
                    scroll_element = 'div_weight';
                }
                return false;
            } else {
                $("#msg_bags").html("");
            }



            var cgst_tax = $("#cgst_tax").val();
            var sgst_tax = $("#sgst_tax").val();
            var igst_tax = $("#igst_tax").val();

            var product_data = {
                buyers_name: b_search_name,
                buyer_id: buyer_id,
                buyer_mobile: b_search_mobile,
                good_type: good_type,
                hsn_no: hsn_no,
                weight: weight,
                price: kg_price,
                kg_price: price,
                bags: bags,
                total: (parseFloat(total).toFixed(2)),
                cgst_tax: cgst_tax,
                sgst_tax: sgst_tax,
                igst_tax: igst_tax,
                tex: tex_value
            }
            product_grand_total = product_grand_total + total;
            $("#grandTotal").html(parseFloat(product_grand_total).toFixed(2));
            $("#supergrandTotal").val(parseFloat(product_grand_total).toFixed(2));

            Save_all_product_data.push(product_data);
            var grandTotal = $("#supergrandTotal").val();
            var market_fee = $("#market_fee").val();
            grandTotal = grandTotal - market_fee;
            $("#grandTotal").html(parseFloat(grandTotal).toFixed(2));

            $("#buyer_name").val('');
            $("#buyer_names").val('');
            $("#buyer_middle_name").val('');
            $("#buyer_last_name").val('');
            $("#buyer_district").val('');
            $("#buyer_state").val('');
            $("#buyer_city").val('');
//            $("#good_type").val('');
//            $("#hsn_no").val('');
            $("#weight").val('');
            $("#price").val('');
            $("#bags").val('');
            $("#buyer_mobile").val('');
            $("#buyer_id").val('');
            $("#b_search_name").html('');
            $("#b_search_mobile").html('');
            $("#b_search_city").html('');
//            $("#div_cgst").val('');
//            $("#div_sgst").val('');
//            $("#div_igst").val('');
//            $("input[name='tex']:checked").val('');
            $('#buyer_name_hide').show();
            // $("#total_table").css("display", "block");
            $("#Form_view_farmer_invoice").attr("style", "display:block");
            //$("#Form_view_farmer_invoice").attr("style", " margin-left: 10px");

            var newRowContent;
            $("#add_row_tr_td").html('');
            for (var i = 0; i < Save_all_product_data.length; i++) {
                var j = i + 1;

                newRowContent = '<tr data-row-id=' + i + '>' +
                '<td style="text-align: center;">' + j + '</td>' +
                '<td style="text-align: center;">' + Save_all_product_data[i].buyers_name + '</td>' +
                '<td style="text-align: center;">' + Save_all_product_data[i].good_type + '</td>' +
                '<td style="text-align: center;">' + Save_all_product_data[i].weight + '</td>' +
                '<td style="text-align: center;">' + Save_all_product_data[i].kg_price + '</td>' +
                '<td style="text-align: right;">' + Save_all_product_data[i].bags + '</td>' +
                '<td style="text-align: right;">' + Save_all_product_data[i].total + '</td>' +
                '<td style="text-align: right;" > <a href="javascript:void(0);" class="remCF">Remove</button> </td>' +
                '</tr> ';

                $("#add_row_tr_td").append(newRowContent);
            }
        } else {
            $("#msg_bags").html("Please Fill All Required Field.");
            return false;
        }
    });

    $("#add_row_tr_td").on('click', '.remCF', function () {

        if(Save_all_product_data.length > 1){
            alert("call");
            var market_fee = $("#market_fee").val();
            $('#changes_goods_types').removeClass('hidden');
            $(this).parent().parent().remove();
            var row_id = $(this).parent().parent().data('row-id');
            var total = Save_all_product_data[row_id].total;
            Save_all_product_data.splice(row_id, 1);
            var grandTotal = $("#supergrandTotal").val();
            grandTotal = grandTotal - total -market_fee;
            product_grand_total= product_grand_total-total;
            $("#grandTotal").html(parseFloat(grandTotal).toFixed(2));
            $("#supergrandTotal").val(grandTotal);
            $("#msg_remove_product").html('');
        }else{
            toastr.error("You can not remove all.");
            return false;
        }

    });

    $("#product_submit").on('click', function () {
        var company_id =$('#nick_name').val();
        $("#product_submit").prop('disabled', true);
        var data = Save_all_product_data;


        //  console.log(JSON.parse(data));
        var grandTotal = $("#grandTotal").html();
        var market_fee = $("#market_fee").val();
        var other_charge = $("#other_charge").val();
        var farmer_id = $('#farmer_id').val();
        $.ajax({
            url: '<?php echo route('seller_product_add');?>',
            method: 'POST',
            data: {
                'product_data': data,
                'grandTotal': grandTotal,
                'market_fee': market_fee,
                'other_charge': other_charge,
                'farmer_mobile': farmer_id,
                'company_id':company_id,
                '_token': '<?php echo csrf_token();?>'
            },
            success: function (result) {

                var url = "seller_bills_list_pending/";
                window.location.pathname = url;
            }
        });
        Save_all_product_data = [];
        $.session.remove('key');
    });


    $("#market_fee").keyup(function () {
        var grandTotal = $("#supergrandTotal").val();
        var market_fee = $("#market_fee").val();
        grandTotal = grandTotal - market_fee;
        $("#grandTotal").html(parseFloat(grandTotal).toFixed(2));
    });

    $("#other_charge").keyup(function () {
        var grandTotal = $("#supergrandTotal").val();
        var market_fee = $("#market_fee").val();
        var other_charge = $("#other_charge").val();
        grandTotal = grandTotal - other_charge - market_fee;
        $("#grandTotal").html(parseFloat(grandTotal).toFixed(2));
    });


    $('input[type=radio][name=tex]').change(function () {
        if (this.value == 'True') {
            $("#cgst_tax").prop("disabled", false);
            $("#sgst_tax").prop("disabled", false);
            $("#igst_tax").prop("disabled", false);
        }
        else if (this.value == 'False') {
            $("#cgst_tax").prop("disabled", true);
            $("#sgst_tax").prop("disabled", true);
            $("#igst_tax").prop("disabled", true);
        }
    });


    function change_Goods(){
        $("#cgst_tax").val('');
        $("#sgst_tax").val('');
        $("#igst_tax").val('');
        $("#good_type").val('');
        $("#hsn_no").val('');
        $('#uniform-no span').removeClass('checked');
        $('#uniform-yes span').removeClass('checked');
        $("#hsn_no").prop("disabled", false);
        $("#cgst_tax").prop("disabled", false);
        $("#sgst_tax").prop("disabled", false);
        $("#igst_tax").prop("disabled", false);
    }
</script>
