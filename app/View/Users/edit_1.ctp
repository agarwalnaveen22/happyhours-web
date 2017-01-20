<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <!-- pageging  block -->
            <?php
            $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'add');
            if ($isPermit) {
                ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dashboard">Dashboard</a></li>
                    <li class="active">Edit User</li>
                </ol>
                <section class="create_list_sectoin">
                    <form id="supplier-deal" method="post" enctype="multipart/form-data">
                        <div class="Section-title title_border gray-bg mar-b20">
                            <h2 class="trans-cap supplier">Edit User</h2>
                        </div>
                        <div class="tab-pane active">
                            <div class="tab-content">
                                <!-- <div class="heading-tab-pr">PR Detail</div>-->

                                <div class="tab-pane active marg-bottom-15" id="step-1">
                                    <div class="upload_download_wrapper clearfix mar-t20 event_info">
                                        <h4>User Details</h4>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="form-tander1 pad_all_15">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Role</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select class="custom-select" required name="data[User][role_id]">
                                                        <option value="">Select Role</option>
                                                        <?php foreach ($roles as $k=>$c) { ?>
                                                            <option value="<?php echo $k; ?>" <?php echo ($this->request->data['User']['role_id']==$k)?"selected":""; ?>><?php echo $c; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input disabled name="data[User][email]" value="<?php echo $this->request->data['User']['email'] ?>" type="email" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Password</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="password" name="data[User][password]" value="" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>First Name</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="text" required name="data[UserDetail][first_name]" value="<?php echo $this->request->data['UserDetail'][0]['first_name'] ?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Last Name</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="text" required name="data[UserDetail][last_name]" value="<?php echo $this->request->data['UserDetail'][0]['last_name'] ?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Phone</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="number" required name="data[UserDetail][phone]" value="<?php echo $this->request->data['UserDetail'][0]['phone'] ?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Country</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select class="custom-select" onchange="getStates(this.value)" required name="data[UserDetail][country_id]">
                                                        <option value="">Select Country</option>
                                                        <?php foreach ($countries as $k => $c) { ?>
                                                            <option value="<?php echo $k; ?>" <?php echo ($this->request->data['UserDetail'][0]['country_id']==$k)?"selected":""; ?>><?php echo $c; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>State</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select class="custom-select state_id" onchange="getCities(this.value)" required name="data[UserDetail][state_id]">
                                                        <option value="">Select State</option>
                                                        <?php foreach ($states as $k => $c) { ?>
                                                            <option value="<?php echo $k; ?>" <?php echo ($this->request->data['UserDetail'][0]['state_id']==$k)?"selected":""; ?>><?php echo $c; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>City</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select class="custom-select city_id" required name="data[UserDetail][city_id]">
                                                        <option value="">Select City</option>
                                                        <?php foreach ($cities as $k => $c) { ?>
                                                            <option value="<?php echo $k; ?>" <?php echo ($this->request->data['UserDetail'][0]['city_id']==$k)?"selected":""; ?>><?php echo $c; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Address</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <textarea required name="data[UserDetail][address]" class="form-control"><?php echo $this->request->data['UserDetail'][0]['address']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Postal Code</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="number" required name="data[UserDetail][postal_code]" value="<?php echo $this->request->data['UserDetail'][0]['postal_code']; ?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>User Image</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">

                                                    <div data-provides="fileinput" class="fileinput fileinput-new input-group">
                                                        <div data-trigger="fileinput" class="form-control"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename show_name"></span> </div>
                                                        <span class="input-group-addon btn btn-black btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                            <input type="file" id="image" name="data[UserDetail][profile_picture]">
                                                        </span> </div>
                                                    <?php if ($this->request->data['UserDetail'][0]['profile_picture']!=''){ ?>
                                                        <img style="width:50px;height:50px" src="<?php echo Configure::read('App.baseUrl'); ?>/uploads/<?php echo $this->request->data['UserDetail'][0]['profile_picture']; ?>" />
                                                    <?php } ?>
                                                </div>

                                            </div>
                                        </div>
                                                         
                                    </div>
                                </div>




                                <div class="btn-next">
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
    
    
    
    function getStates(id) {
        var request = $.ajax({
            url: apiUrl + "/Cities/getStates",
            method: "POST",
            data: $.param({id: id}),
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                var html = "";
                $.each(data.data, function (k, v) {
                    html += '<option value="' + k + '">' + v + '</option>';
                });
                $(".state_id").html(html);
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }
    
    
    function getCities(id) {
        var request = $.ajax({
            url: apiUrl + "/Townships/getCities",
            method: "POST",
            data: $.param({id: id}),
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                var html = "";
                $.each(data.data, function (k, v) {
                    html += '<option value="' + k + '">' + v + '</option>';
                });
                $(".city_id").html(html);
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }
    
</script>







</body>

</html>