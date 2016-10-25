<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <!-- pageging  block -->

            <ol class="breadcrumb">
                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dashboard">Dashboard</a></li>
                <li class="active">ACL</li>
            </ol>
            <section class="create_list_sectoin">

                <div class="Section-title title_border gray-bg mar-b20">
                    <h2 class="trans-cap supplier">ACL</h2>

                </div>






                <div class="tab-pane active">



                    <div class="tab-content">
                        <!-- <div class="heading-tab-pr">PR Detail</div>-->
                        <form method="post" action="">
                        <div class="tab-pane active marg-bottom-15" id="step-1">

                            
                            <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Modules</th>
                                        <?php foreach ($roles as $role) { ?>
                                            <th><?php echo ucfirst($role); ?></th>
                                        <?php } ?>


                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=-1; foreach ($modules as $module) { $i++; ?>
                                        <tr>
                                            <td><b><?php echo $module['Module']; ?></b></td>
                                            <?php foreach ($roles as $role) { ?>
                                                <td>&nbsp;</td>
                                            <?php } ?>
                                        </tr>
                                        <?php $j=-1; foreach ($module['Actions'] as $key => $action) { $j++; ?>
                                            <tr>
                                                <td><span class="paddingLeft">- <?php echo $action; ?></span></td>
                                                <?php foreach ($roles as $k=>$role) { ?>
                                                    <td>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="form-control" name="<?php echo $k; ?>-<?php echo $module['Module']; ?>-<?php echo $module['Controller']; ?>-<?php echo $key; ?>-<?php echo $action; ?>" value="1" <?php echo (in_array(($k."-".$module['Module']."-".$module['Controller']."-".$key."-".$action), $acl))?"checked":""; ?> />
                                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                            </label>
                                                        </div>
                                                        <?php /*<input type="hidden" name="acl[<?php echo $k; ?>][<?php echo $i; ?>][Module]" value="<?php echo $module['Module']; ?>" />
                                                        <input type="hidden" name="acl[<?php echo $k; ?>][<?php echo $i; ?>][Controller]" value="<?php echo $module['Controller']; ?>" />
                                                        <input type="hidden" name="acl[<?php echo $k; ?>][<?php echo $i; ?>][Actions][<?php echo $j; ?>][action]" value="<?php echo $key; ?>" />
                                                        <input type="hidden" name="acl[<?php echo $k; ?>][<?php echo $i; ?>][Actions][<?php echo $j; ?>][task]" value="<?php echo $action; ?>" />*/ ?>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="btn-next">
                            <button class="btn btn-info ph_btn marg-top-20 hvr-pop hvr-rectangle-out">Save</button>
                        </div>

                        </form>

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
        //$('#campaignList').DataTable();
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

    function goToDel(url) {
        if (confirm("Are you sure?")) {
            window.location.href = url;
        }
    }

</script>






<style>

</style>



</body>

</html>