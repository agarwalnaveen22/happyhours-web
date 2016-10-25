<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <!-- pageging  block -->

            <ol class="breadcrumb">
                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dashboard">Dashboard</a></li>
                <li class="active">Role</li>
            </ol>
            <section class="create_list_sectoin">
                <?php
                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Roles', 'index_1');
                if ($isPermit) {
                    ?>

                    <div class="Section-title title_border gray-bg mar-b20">
                        <h2 class="trans-cap supplier">Add</h2>

                    </div>
                <?php } ?>





                <div class="tab-pane active">



                    <div class="tab-content">
                        <!-- <div class="heading-tab-pr">PR Detail</div>-->

                        <div class="tab-pane active marg-bottom-15" id="step-1">
                            <?php if ($isPermit) { ?>
                                <form method="post" id="supplier-product-category" onsubmit="return saveRole()">
                                    <div class="upload_download_wrapper clearfix mar-t20 event_info">
                                        <h4>Role Details</h4>
                                        <div class="row">

                                            <div class="form-tander1 pad_all_15">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="text" id="name" name="data[Role][name]" required class="form-control" />
                                                </div>
                                            </div>



                                        </div>

                                    </div>



                                    <div class="btn-next">
                                        <input type="hidden" name="data[Role][id]" id="campaignId" value="" />
                                        <button class="btn btn-info ph_btn marg-top-20 hvr-pop hvr-rectangle-out">Save</button>
                                    </div>

                                </form>
                            <?php } ?>
                            <?php
                            $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Roles', 'index');
                            if ($isPermit) {
                                ?>

                                <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($roles as $role) { ?>
                                            <tr>
                                                <td><?php echo $role['Role']['id']; ?></td>
                                                <td><?php echo $role['Role']['name']; ?></td>
                                                <td>
                                                    <?php
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Roles', 'index_2');
                                                    if ($isPermit) {
                                                        ?>
                                                        <a href="javascript:" onclick="editRole('<?php echo AppController::encryption($role['Role']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit1.png" /></a>&nbsp;&nbsp;
                                                    <?php } ?>
                                                    <?php
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Roles', 'roleDelete');
                                                    if ($isPermit) {
                                                        ?>
                                                        <a href="javascript:" onclick="deleteRole('<?php echo AppController::encryption($role['Role']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
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





<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datatable/datatable-bootstrap.js"></script>


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

    function saveRole() {
        var request = $.ajax({
            url: apiUrl + "/Roles/index",
            method: "POST",
            data: $("#supplier-product-category").serialize(),
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

    function editRole(id) {
        var request = $.ajax({
            url: apiUrl + "/Roles/index/" + id,
            method: "GET",
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                $("#name").val(data.data.Role.name);
                $("#campaignId").val(data.data.Role.id);
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }

    function deleteRole(id) {
        if (showConfirm("Are you sure?")) {
            var request = $.ajax({
                url: apiUrl + "/Roles/roleDelete/" + id,
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