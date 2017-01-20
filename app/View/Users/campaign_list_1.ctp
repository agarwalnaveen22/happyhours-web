<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <!-- pageging  block -->

            <ol class="breadcrumb">
                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dashboard">Dashboard</a></li>
                <li class="active">Campaigns</li>
            </ol>
            <section class="create_list_sectoin">
                <?php
                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'campaignList_1');
                if ($isPermit) {
                    ?>
                <div class="Section-title title_border gray-bg mar-b20">
                    <h2 class="trans-cap supplier">Add Campaign</h2>

                </div>
                                <?php } ?>



                <div class="tab-pane active">



                    <div class="tab-content">
                        <!-- <div class="heading-tab-pr">PR Detail</div>-->

                        <div class="tab-pane active marg-bottom-15" id="step-1">
                            <?php 
                                if($isPermit){
                            ?>
                            <form method="post" id="supplier-campaign" onsubmit="return saveCampaign()">
                                <div class="upload_download_wrapper clearfix mar-t20 event_info">
                                    <h4>Campaign Details</h4>
                                    <div class="row">
                                        <?php if($this->Session->read("Auth.User")['User']['role_id']==1){ ?>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="col-sm-4 col-md-3 col-xs-6">
                                                <label>Supplier</label>
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                <select class="custom-select supplier_detail_id" name="data[Campaign][supplier_detail_id]" required >
                                                    <option value="">Select Supplier</option>
                                                    <?php foreach ($suppliers as $key => $supplier) { ?>
                                                        <option value="<?php echo $key; ?>"><?php echo $supplier ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="col-sm-4 col-md-3 col-xs-6">
                                                <label>Campaign Name</label>
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                <input type="text" name="data[Campaign][name]" id="name" required class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="col-sm-4 col-md-3 col-xs-6">
                                                <label>Campaign Start Date & Time</label>
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                <input type="text" data-date-format="dd-mm-yyyy HH:ii:ss" id="start_datetime" name="data[Campaign][start_datetime]" required class="form-control bootstrap-datepicker" />
                                            </div>
                                        </div>

                                        <div class="form-tander1 pad_all_15">
                                            <div class="col-sm-4 col-md-3 col-xs-6">
                                                <label>Campaign End Date & Time</label>
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                <input type="text" required data-date-format="dd-mm-yyyy HH:ii:ss" id="end_datetime" name="data[Campaign][end_datetime]" class="form-control bootstrap-datepicker" />
                                            </div>
                                        </div>

                                        <div class="form-tander1 pad_all_15">
                                            <div class="col-sm-4 col-md-3 col-xs-6">
                                                <label>Comment</label>
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                <textarea rows="5" name="data[Campaign][comment]" id="comment" class="form-control"></textarea>
                                            </div>
                                        </div>


                                    </div>

                                </div>



                                <div class="btn-next">
                                    <input type="hidden" name="data[Campaign][id]" id="campaignId" value="" />
                                    <button class="btn btn-info ph_btn marg-top-20 hvr-pop hvr-rectangle-out">Save</button>
                                </div>

                            </form>
                            <?php } ?>
                            <?php 
                                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'campaignList'); 
                                if($isPermit){
                            ?>
                            <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Supplier Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php if(!empty($campaignList)){
                                        foreach ($campaignList as $campaign) { ?>
                                        <tr>
                                            <td><?php echo $campaign['Campaign']['name']; ?></td>
                                            <td><?php echo $campaign['SupplierDetail']['company_name']; ?></td>
                                            <td><?php echo $this->App->getDateTimeFormat($campaign['Campaign']['start_datetime']); ?></td>
                                            <td><?php echo $this->App->getDateTimeFormat($campaign['Campaign']['end_datetime']); ?></td>
                                            <td><?php echo $campaign['Campaign']['comment']; ?></td>
                                            <td>
                                                <?php 
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'campaignDetail'); 
                                                    if($isPermit){
                                                ?>
                                                <a href="javascript:" onclick="editCampaign('<?php echo AppController::encryption($campaign['Campaign']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit1.png" /></a>&nbsp;&nbsp;
                                                <?php } ?>
                                                <?php 
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'campaignDelete'); 
                                                    if($isPermit){
                                                ?>
                                                <a href="javascript:" onclick="deleteCampaign('<?php echo AppController::encryption($campaign['Campaign']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                            <?php } ?>
                        </div>





                    </div>




                </div>


            </section>

        </div>
    </div>
</div>



</div>





<!-- Bootstrap Datepicker -->
<link href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datepicker/bootstrap-datetimepicker.css" />
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datepicker/bootstrap-datetimepicker.js"></script>

<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datatable/datatable-bootstrap.js"></script>

<script type="text/javascript">
                                                        /* Datepicker bootstrap */

                                                        $(function () {
                                                            "use strict";
                                                            $('.bootstrap-datepicker').datetimepicker({
                                                                language: 'pt-BR'
                                                            });
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


                                                        });
</script>
<script>
    $(document).ready(function () {
        $('#campaignList').DataTable();
        $("#campaignList_wrapper").attr("style", "margin-top:50px");
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

    function saveCampaign() {
        var request = $.ajax({
            url: apiUrl + "/users/campaignList",
            method: "POST",
            data: $("#supplier-campaign").serialize(),
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                window.location.reload();
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
        return false;
    }

    function editCampaign(id) {
        var request = $.ajax({
            url: apiUrl + "/users/campaignDetail/" + id,
            method: "GET",
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                $(".supplier_detail_id").val(data.data.Campaign.supplier_detail_id);
                $("#name").val(data.data.Campaign.name);
                $("#start_datetime").val(data.data.Campaign.start_datetime);
                $("#end_datetime").val(data.data.Campaign.end_datetime);
                $("#comment").val(data.data.Campaign.comment);
                $("#campaignId").val(data.data.Campaign.id);
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }

    function deleteCampaign(id) {
        if (showConfirm("Are you sure?")) {
            var request = $.ajax({
                url: apiUrl + "/users/campaignDelete/" + id,
                method: "GET",
                dataType: "json"
            });

            request.done(function (data) {
                if (data.status) {
                    window.location.reload();
                } else {
                    alert(data.message);
                }
            });

            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);

            });
        }

    }
</script>






<style>

</style>



</body>

</html>