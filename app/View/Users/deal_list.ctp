<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <!-- pageging  block -->

            <ol class="breadcrumb">
                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dashboard">Dashboard</a></li>
                <li class="active">Deals</li>
            </ol>
            <section class="create_list_sectoin">

                <div class="Section-title title_border gray-bg mar-b20">
                    <h2 class="trans-cap supplier">Deals</h2>

                </div>






                <div class="tab-pane active">



                    <div class="tab-content">
                        <!-- <div class="heading-tab-pr">PR Detail</div>-->

                        <div class="tab-pane active marg-bottom-15" id="step-1">
                            

                            <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Campaign</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Deal Type</th>
                                        <th>Deal Value</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Uses</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach ($dealList as $deal) { ?>
                                        <tr>
                                            <td><?php echo $deal['Campaign']['name']; ?></td>
                                            <td><?php echo $deal['Deal']['name']; ?></td>
                                            <td><?php echo $deal['Deal']['description']; ?></td>
                                            <td><img style="width:50px;height:50px" src="<?php echo Configure::read('App.baseUrl'); ?>/uploads/<?php echo $deal['Deal']['image']; ?>" /></td>
                                            <td><?php echo ($deal['Deal']['deal_type']==0)?"Fixed":"Percentage"; ?></td>
                                            <td><?php echo $deal['Deal']['deal_value']; ?></td>
                                            <td><?php echo $this->App->getDateFormat($deal['Deal']['start_date']); ?></td>
                                            <td><?php echo $this->App->getDateFormat($deal['Deal']['end_date']); ?></td>
                                            <td><?php echo $deal['Deal']['uses']; ?></td>
                                            <td><?php echo $deal['Deal']['amount']; ?></td>
                                            <td>
                                                <?php
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'dealAdd_1');
                                                    if ($isPermit) {
                                                ?>
                                                <a href="<?php echo Configure::read('App.baseUrl')."/users/dealAdd/".AppController::encryption($deal['Deal']['id']); ?>"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit1.png" /></a>&nbsp;&nbsp;
                                                <?php } ?>
                                                <?php
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'dealDelete');
                                                    if ($isPermit) {
                                                ?>
                                                <a href="javascript:" onclick="goToDel('<?php echo Configure::read('App.baseUrl')."/users/dealDelete/".AppController::encryption($deal['Deal']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
 
    function goToDel(url){
        if(confirm("Are you sure?")){
            window.location.href=url;
        }
    }
    
</script>






<style>

</style>



</body>

</html>