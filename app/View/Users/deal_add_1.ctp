<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <!-- pageging  block -->
            <?php
            $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'dealAdd');
            if ($isPermit) {
                ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dashboard">Dashboard</a></li>
                    <li class="active">Add Deal</li>
                </ol>
                <section class="create_list_sectoin">
                    <form id="supplier-deal" onsubmit="return saveDeal()" enctype="multipart/form-data">
                        <div class="Section-title title_border gray-bg mar-b20">
                            <h2 class="trans-cap supplier">Add Deal</h2>
                        </div>
                        <div class="tab-pane active">
                            <div class="tab-content">
                                <!-- <div class="heading-tab-pr">PR Detail</div>-->

                                <div class="tab-pane active marg-bottom-15" id="step-1">
                                    <div class="upload_download_wrapper clearfix mar-t20 event_info">
                                        <h4>Deal Details</h4>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="form-tander1 pad_all_15">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Campaign</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select class="custom-select" onchange="getLocations(this.value)" required name="data[Deal][campaign_id]">
                                                        <option value="">Select Campaign</option>
                                                        <?php foreach ($campaigns as $c) { ?>
                                                            <option value="<?php echo $c['Campaign']['id']; ?>" <?php echo (isset($deal) && $deal['Deal']['campaign_id'] == $c['Campaign']['id']) ? "selected" : ""; ?>><?php echo $c['Campaign']['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Product Category</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select class="custom-select" required name="data[Deal][product_category_id]">
                                                        <option value="">Select Product Category</option>
                                                        <?php foreach ($productCategories as $k => $c) { ?>
                                                            <option value="<?php echo $k; ?>" <?php echo (isset($deal) && $deal['Deal']['product_category_id'] == $k) ? "selected" : ""; ?>><?php echo $c; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Title</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="text" required name="data[Deal][name]" value="<?php echo (isset($deal)) ? $deal['Deal']['name'] : ""; ?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Description</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <textarea rows="5" required  name="data[Deal][description]" class="form-control"><?php echo (isset($deal)) ? $deal['Deal']['description'] : ""; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Select Locations</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select class="custom-select chosen-select" multiple required id="locations" name="data[Deal][locations]">
                                                        <?php foreach ($deal['DealLocation'] as $location) { ?>
                                                            <option value="<?php echo $location['Location']['id']; ?>" selected><?php echo $location['Location']['landmark']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Deal Image</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">

                                                    <div data-provides="fileinput" class="fileinput fileinput-new input-group">
                                                        <div data-trigger="fileinput" class="form-control"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename show_name"></span> </div>
                                                        <span class="input-group-addon btn btn-black btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                            <input type="file" id="image" <?php echo isset($deal)?"":"required"; ?> name="data[Deal][image]">
                                                        </span> </div>
                                                    <?php if (isset($deal)) { ?>
                                                        <img style="width:50px;height:50px" src="<?php echo Configure::read('App.baseUrl'); ?>/uploads/<?php echo $deal['Deal']['image']; ?>" />
                                                    <?php } ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Deal Type</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select class="custom-select" required name="data[Deal][deal_type]" >
                                                        <option value="">Select Deal Type</option>
                                                        <option value="0" <?php echo (isset($deal) && $deal['Deal']['deal_type'] == 0) ? "selected" : ""; ?>>Fixed</option>
                                                        <option value="1" <?php echo (isset($deal) && $deal['Deal']['deal_type'] == 1) ? "selected" : ""; ?>>Percentage</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Deal Value</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="number" required class="form-control" name="data[Deal][deal_value]" value="<?php echo (isset($deal)) ? $deal['Deal']['deal_value'] : ""; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Deal Start Date</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="text"  id="start_date" value="<?php echo (isset($deal)) ? $deal['Deal']['start_date'] : ""; ?>" name="data[Deal][start_date]" required class="form-control bootstrap-datepicker" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Deal End Date</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="text" required id="end_date" value="<?php echo (isset($deal)) ? $deal['Deal']['end_date'] : ""; ?>" name="data[Deal][end_date]" class="form-control bootstrap-datepicker" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Is Deal All Day</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" onchange="disableTime(this)" value="1"  id="is_all_day" <?php echo (isset($deal) && $deal['Deal']['is_all_day'] == 1) ? "checked" : ""; ?> name="data[Deal][is_all_day]" class="form-control" />
                                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Deal Start Time</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="text" onblur="hideTimePicker()" data-format="hh:mm:ss" id="start_time" value="<?php echo (isset($deal)) ? $deal['Deal']['start_time'] : ""; ?>" name="data[Deal][start_time]" class="form-control bootstrap-timepicker" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Deal End Time</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="text" onblur="hideTimePicker()" data-format="hh:mm:ss" id="end_time" value="<?php echo (isset($deal)) ? $deal['Deal']['end_time'] : ""; ?>" name="data[Deal][end_time]" class="form-control bootstrap-timepicker" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Deal Refresh Period</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select class="custom-select" required name="data[Deal][deal_refresh_period_id]">
                                                        <option value="">Select Deal Refresh Period</option>
                                                        <?php foreach ($refreshPeriods as $k => $c) { ?>
                                                            <option value="<?php echo $k; ?>" <?php echo (isset($deal) && $deal['Deal']['deal_refresh_period_id'] == $k) ? "selected" : ""; ?>><?php echo $c; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Target Country</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select class="custom-select" onchange="getAllTargetLocations(this.value)" required name="data[Deal][country_id]">
                                                        <option value="">Select Country</option>
                                                        <?php foreach ($countries as $k => $c) { ?>
                                                            <option value="<?php echo $k; ?>" <?php echo (isset($deal) && $deal['Deal']['target_country_id'] == $k) ? "selected" : ""; ?>><?php echo $c; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Target Locations</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6" id="target_locations">
                                                    <?php if (isset($deal)) { ?>
                                                        <div class="targetContainer">
                                                            <?php foreach ($dealAllTargetLocation['State'] as $location) { ?>
                                                                <div class="stateContainer checkbox"><label>
                                                                        <input class="custom-checkbox" type="checkbox" name="State[]" id="State_<?php echo $location['id']; ?>" onchange="selectAll('State_<?php echo $location['id']; ?>', 'City_<?php echo $location['id']; ?>', 'Town_<?php echo $location['id']; ?>')" value="<?php echo $location['id']; ?>" <?php echo (in_array($location['id'], $stateArray)) ? "checked" : ""; ?> /><?php echo $location['name']; ?>
                                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                                    </label>
                                                                    <?php foreach ($location['City'] as $i => $location1) { ?>
                                                                        <div class="cityContainer checkbox"><label>
                                                                                <input class="custom-checkbox" type="checkbox" name="City[<?php echo $i; ?>]" id="City_<?php echo $location['id']; ?>_<?php echo $location1['City']['id']; ?>'" onchange="selectAll('City_<?php echo $location['id']; ?>_<?php echo $location1['City']['id']; ?>', 'Town_<?php echo $location['id']; ?>_<?php echo $location1['City']['id']; ?>')" value="<?php echo $location1['City']['id']; ?>" <?php echo (in_array($location1['City']['id'], $cityArray)) ? "checked" : ""; ?>><?php echo $location1['City']['name']; ?>
                                                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                                            </label>
                                                                            <?php if (!empty($location1['Township'])) { ?>
                                                                                <div class="townParent"> 
                                                                                    <?php foreach ($location1['Township'] as $k => $location2) { ?>
                                                                                        <div class="townContainer checkbox"><label>
                                                                                                <input class="custom-checkbox" type="checkbox" name="Town[<?php echo $k; ?>]" id="Town_<?php echo $location['id']; ?>_<?php echo $location1['City']['id']; ?>_<?php echo $location2['id']; ?>'" value="<?php echo $location2['id']; ?>" <?php echo (in_array($location2['id'], $townArray)) ? "checked" : ""; ?>><?php echo $location2['name']; ?>
                                                                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                                                            </label></div>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                    <?php }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Deal Uses (per user)</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="number" required class="form-control" name="data[Deal][uses]" value="<?php echo (isset($deal)) ? $deal['Deal']['uses'] : ""; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Deal Amount</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="number" step="0.01" class="form-control" name="data[Deal][amount]" value="<?php echo (isset($deal)) ? $deal['Deal']['amount'] : ""; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="btn-next">
                                    <input type="hidden" name="data[Deal][id]" id="dealId" value="<?php echo (isset($deal)) ? $deal['Deal']['id'] : ""; ?>" />
                                    <button class="btn btn-info ph_btn marg-top-20 hvr-pop hvr-rectangle-out">Save</button>
                                </div>


                            </div>





                        </div>




                        </div>

                    </form>
                </section>
            <?php } ?>
            </div>
        </div>
    </div>









    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datepicker/chosen.jquery.js"></script>
    <!-- Bootstrap Datepicker -->
    <link href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datepicker/datepicker.css" />
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datepicker/datepicker.js"></script>
    <link href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datepicker/bootstrap-datetimepicker.min.css" />
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datepicker/bootstrap-datetimepicker.min.js"></script>
    <link href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datepicker/multi-select.css" />
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datepicker/jquery.multi-select.js"></script>
    <script type="text/javascript">
                                                                                    /* Datepicker bootstrap */

                                                                                    $(function () {

                                                                                        //$('.targetContainer').perfectScrollbar();
                                                                                        $('.bootstrap-datepicker').bsdatepicker();
                                                                                        $('.bootstrap-timepicker').datetimepicker({
                                                                                            pickDate: false,
                                                                                        });
                                                                                        $('.chosen-select').chosen();
                                                                                        $('#optgroup').multiSelect({selectableOptgroup: true});
                                                                                    });

    </script>

    <!-- Google CDN jQuery with fallback to local -->

    <!-- Bootstrap Tooltip -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/tooltip/tooltip.js"></script>


    <!-- WIDGETS -->
    <!-- Uniform -->
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/uniform/uniform.js"></script>
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/uniform/uniform-demo.js"></script>
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/bootstrap/js/bootstrap.js"></script>

    <!-- Superclick -->

    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/superclick/superclick.js"></script>

    <!-- Chosen -->

    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/chosen/chosen.js"></script>
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/chosen/chosen-demo.js"></script>



    <!-- Perfact scroll -->
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>

    <!-- Content box -->
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/content-box/contentbox.js"></script>


    <!-- Morris charts demo -->
    <!--<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/charts/morris/morris-demo.js"></script>-->
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datepicker/datepicker.js"></script>

    <!-- EQul height js-->
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/match-height/jquery.matchHeight.js"></script>
    <!-- Theme layout -->
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/themes/admin/layout.js"></script>

    <!-- PieGage -->

    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/charts/piegage/piegage.js"></script>
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/charts/piegage/piegage-demo.js"></script>

    <!-- Morris charts -->

    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/js-core/raphael.js"></script>
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/charts/morris/morris.js"></script>


<script>
                                                                                $(document).ready(function () {


                                                                                    $('.column_button_bar').on('click', '#s1_tender_adddel_btn', function (event) {
                                                                                        event.preventDefault();
                                                                                        $('#add_delete_column').show();
                                                                                    });

                                                                                    $('.column_button_bar').on('click', '#s1_tender_additem_btn', function (event) {
                                                                                        event.preventDefault();
                                                                                        $('#creat_seaction_form').show();
                                                                                    });

                                                                                    $('.create_list_sectoin').on('click', '.bq_tender_addsub_item', function (event) {
                                                                                        event.preventDefault();
                                                                                        $('#creat_subitem_form').show();
                                                                                    });

                                                                                    $(document).on("change", "#image", function () {
                                                                                        $(".show_name").html($(this).val());
                                                                                        $(".up_btn").removeClass('btn-gray').addClass('btn-blue');
                                                                                    });

                                                                                });
</script>
<script>
    $(document).ready(function () {
        $('.mega').on('scroll', function () {
            $('.header').css('top', $(this).scrollTop());
        });

        var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"];
        $("#tags").autocomplete({
            source: availableTags
        });
        $("#tagres").autocomplete({
            source: availableTags
        });


        $.validate({
            lang: 'en'
        });



        $(".correction-ancher").click(function () {
            $(this).parent().parent().next(".correction-textarea").show('fast');
        });

        $(".correction-ancher").click(function () {
            $(this).parent().parent().hide('fast');
        });



    });

    function saveDeal() {
        //console.log($("#locations").val())
        var locations = $("#locations").val().join(",");
        console.log(locations);
        var formData = new FormData($('#supplier-deal')[0]);
        formData.append('image', $('#image')[0].files[0]);
        formData.append('locations', locations);
        var request = $.ajax({
            url: apiUrl + "/users/dealAdd",
            method: "POST",
            data: formData,
            dataType: "json",
            processData: false, // tell jQuery not to process the data
            contentType: false
        });

        request.done(function (data) {
            if (data.status) {
                window.location.href = apiUrl + "/users/dealList";
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
        return false;
    }

    function getLocations(id) {
        var request = $.ajax({
            url: apiUrl + "/users/getLocations",
            method: "POST",
            data: $.param({id: id}),
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                var html = '';
                $.each(data.data, function (k, v) {
                    html += '<option value="' + k + '">' + v + '</option>';
                });
                console.log(html);
                $("#locations").html(html);
                $("#locations").trigger("chosen:updated");
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }

    function disableTime(e) {
        if ($(e).is(":checked")) {
            $("#start_time").attr("disabled", true);
            $("#end_time").attr("disabled", true);
        } else {
            $("#start_time").attr("disabled", false);
            $("#end_time").attr("disabled", false);
        }
    }

    function hideTimePicker() {
        $(".bootstrap-datetimepicker-widget").hide();
    }

    function getAllTargetLocations(id) {
        var request = $.ajax({
            url: apiUrl + "/users/getAllTargetLocations",
            method: "POST",
            data: $.param({id: id}),
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                var html = '<div class="targetContainer">';
                $.each(data.data.State, function (k, v) {
                    html += '<div class="stateContainer checkbox"><label><input class="custom-checkbox" type="checkbox" name="State[]" id="State_' + v.id + '" onchange="selectAll(\'State_' + v.id + '\',\'City_' + v.id + '\',\'Town_' + v.id + '\')" value="' + v.id + '" /> <span class="cr"><i class="cr-icon fa fa-check"></i></span>' + v.name + "</label>";
                    $.each(v.City, function (i, j) {
                        html += '<div class="cityContainer checkbox"><label><input class="custom-checkbox" type="checkbox" name="City[' + i + ']" id="City_' + v.id + '_' + j.City.id + '" onchange="selectAll(\'City_' + v.id + '_' + j.City.id + '\',\'Town_' + v.id + '_' + j.City.id + '\')" value="' + j.City.id + '"> <span class="cr"><i class="cr-icon fa fa-check"></i></span>' + j.City.name + "</label>";
                        if (j.Township.length > 0) {
                            html += '<div class="townParent">';
                            $.each(j.Township, function (m, n) {
                                html += '<div class="townContainer checkbox"><label><input class="custom-checkbox" type="checkbox" name="Town[' + m + ']" id="Town_' + v.id + '_' + j.City.id + '_' + n.id + '" value="' + n.id + '"> <span class="cr"><i class="cr-icon fa fa-check"></i></span>' + n.name + "</label></div>";
                            });
                            html += "</div>";
                        }
                        html += "</div>";
                    });
                    html += "</div>";
                });
                html += "</div>";
                console.log(html);
                $("#target_locations").html(html);
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }

    function selectAll(id, tid, cid) {
        if ($("#" + id).is(":checked")) {
            $("input:checkbox[id^='" + tid + "']").prop("checked", true);
            if (cid != undefined) {
                $("input:checkbox[id^='" + cid + "']").prop("checked", true);
            }
        } else {
            $("input:checkbox[id^='" + tid + "']").prop("checked", false);
            if (cid != undefined) {
                $("input:checkbox[id^='" + cid + "']").prop("checked", false);
            }
        }
    }
</script>







</body>

</html>