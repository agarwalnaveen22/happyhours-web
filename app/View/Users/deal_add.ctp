<div class="page animsition">

    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-md-12">
                <!-- Panel Wizard Form Container -->
                <div class="panel" id="exampleWizardFormContainer">
                    <div class="panel-heading">
                        <h3 class="panel-title">Deals</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'dealAdd');
                        if ($isPermit) {
                            ?>
                            <h3 class="panel-title">Add Deal</h3>
                            <!-- Wizard Content -->
                            <form class="wizard-content" id="supplier-deal" onsubmit="return saveDeal()" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Campaign :</label>
                                    <select class="form-control" onchange="getLocations(this.value)" required name="data[Deal][campaign_id]">
                                        <option value="">Select Campaign</option>
                                        <?php foreach ($campaigns as $c) { ?>
                                            <option value="<?php echo $c['Campaign']['id']; ?>" <?php echo (isset($deal) && $deal['Deal']['campaign_id'] == $c['Campaign']['id']) ? "selected" : ""; ?>><?php echo $c['Campaign']['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Product Category :</label>
                                    <select class="form-control" required name="data[Deal][product_category_id]">
                                        <option value="">Select Product Category</option>
                                        <?php foreach ($productCategories as $k => $c) { ?>
                                            <option value="<?php echo $k; ?>" <?php echo (isset($deal) && $deal['Deal']['product_category_id'] == $k) ? "selected" : ""; ?>><?php echo $c; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Title :</label>
                                    <input type="text" required name="data[Deal][name]" value="<?php echo (isset($deal)) ? $deal['Deal']['name'] : ""; ?>" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Description :</label>
                                    <textarea rows="5" required  name="data[Deal][description]" class="form-control"><?php echo (isset($deal)) ? $deal['Deal']['description'] : ""; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Select Locations :</label>
                                    <select class="form-control" multiple data-plugin="select2" required id="locations" name="data[Deal][locations]">
                                        <?php foreach ($deal['DealLocation'] as $location) { ?>
                                            <option value="<?php echo $location['Location']['id']; ?>" selected><?php echo $location['Location']['landmark']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Deal Image :</label>
                                    <div class="input-group input-group-file">
                                        <input type="text" class="form-control" readonly="">
                                        <span class="input-group-btn">
                                            <span class="btn btn-success btn-file">
                                                <i class="icon wb-upload" aria-hidden="true"></i>
                                                <input type="file" id="image" <?php echo isset($deal) ? "" : "required"; ?> name="data[Deal][image]">
                                            </span>
                                        </span>
                                    </div>
                                    <?php if (isset($deal)) { ?>
                                        <img style="width:50px;height:50px" src="<?php echo Configure::read('App.baseUrl'); ?>/uploads/<?php echo $deal['Deal']['image']; ?>" />
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Deal Type :</label>
                                    <select class="form-control" required name="data[Deal][deal_type]" >
                                        <option value="">Select Deal Type</option>
                                        <option value="0" <?php echo (isset($deal) && $deal['Deal']['deal_type'] == 0) ? "selected" : ""; ?>>Fixed</option>
                                        <option value="1" <?php echo (isset($deal) && $deal['Deal']['deal_type'] == 1) ? "selected" : ""; ?>>Percentage</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Deal Value :</label>
                                    <input type="number" required class="form-control" name="data[Deal][deal_value]" value="<?php echo (isset($deal)) ? $deal['Deal']['deal_value'] : ""; ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Deal Start Date :</label>
                                    <div class="input-daterange-wrap">
                                        <div class="input-daterange">
                                            <div class="input-group col-md-5 float-left">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input type="text"  id="start_date" value="<?php echo (isset($deal)) ? $deal['Deal']['start_date'] : ""; ?>" name="data[Deal][start_date]" required class="form-control datepair-date datepair-start" data-plugin="datepicker" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Deal End Date :</label>
                                    <div class="input-daterange-wrap">
                                        <div class="input-daterange">
                                            <div class="input-group col-md-5 float-left">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" required id="end_date" value="<?php echo (isset($deal)) ? $deal['Deal']['end_date'] : ""; ?>" name="data[Deal][end_date]" required class="form-control datepair-date datepair-start" data-plugin="datepicker" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkbox-custom checkbox-primary">
                                    <input type="checkbox" onchange="disableTime(this)" value="1"  id="is_all_day" <?php echo (isset($deal) && $deal['Deal']['is_all_day'] == 1) ? "checked" : ""; ?> name="data[Deal][is_all_day]" />
                                    <label for="is_all_day">Is Deal All Day</label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Deal Start Time :</label>
                                    <div class="input-daterange-wrap">
                                        <div class="input-daterange">
                                            <div class="input-group col-md-5">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-time" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" id="start_time" value="<?php echo (isset($deal)) ? $deal['Deal']['start_time'] : ""; ?>" name="data[Deal][start_time]" class="form-control datepair-time datepair-start" data-plugin="timepicker"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Deal End Time :</label>
                                    <div class="input-daterange-wrap">
                                        <div class="input-daterange">
                                            <div class="input-group col-md-5">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-time" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" id="end_time" value="<?php echo (isset($deal)) ? $deal['Deal']['end_time'] : ""; ?>" name="data[Deal][end_time]" class="form-control datepair-time datepair-start" data-plugin="timepicker"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Deal Refresh Period :</label>
                                    <select class="form-control" required name="data[Deal][deal_refresh_period_id]">
                                        <option value="">Select Deal Refresh Period</option>
                                        <?php foreach ($refreshPeriods as $k => $c) { ?>
                                            <option value="<?php echo $k; ?>" <?php echo (isset($deal) && $deal['Deal']['deal_refresh_period_id'] == $k) ? "selected" : ""; ?>><?php echo $c; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Target Country :</label>
                                    <select class="form-control" onchange="getAllTargetLocations(this.value)" required name="data[Deal][country_id]">
                                        <option value="">Select Country</option>
                                        <?php foreach ($countries as $k => $c) { ?>
                                            <option value="<?php echo $k; ?>" <?php echo (isset($deal) && $deal['Deal']['target_country_id'] == $k) ? "selected" : ""; ?>><?php echo $c; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Target Locations :</label>
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
                                <div style="clear: both"></div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Deal Uses (per user) :</label>
                                    <input type="number" required class="form-control" name="data[Deal][uses]" value="<?php echo (isset($deal)) ? $deal['Deal']['uses'] : ""; ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Deal Amount :</label>
                                    <input type="number" step="0.01" class="form-control" name="data[Deal][amount]" value="<?php echo (isset($deal)) ? $deal['Deal']['amount'] : ""; ?>" />
                                </div>

                                <div class="text-right">
                                    <input type="hidden" name="data[Deal][id]" id="dealId" value="<?php echo (isset($deal)) ? $deal['Deal']['id'] : ""; ?>" />
                                    <button type="submit" class="btn btn-primary" id="validateButton2">Save</button>
                                </div>

                            </form>


                        <?php } ?>

                    </div>


                    <!-- Wizard Content -->

                </div>
                <!-- End Panel Wizard Form Container -->
            </div>
        </div>


    </div>
</div>

<script>

    

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