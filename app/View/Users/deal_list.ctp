<div id="page-content-wrapper">
    <div class="page animsition">

    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-md-12">
                <!-- Panel Wizard Form Container -->
                <div class="panel" id="exampleWizardFormContainer">
                    <div class="panel-heading">
                        <h3 class="panel-title">Deals</h3>
                    </div>
                        <!-- <div class="heading-tab-pr">PR Detail</div>-->

                        <div class="panel-body">
                            

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



        </div>
    </div>
</div>



</div>




<script>
   
 
    function goToDel(url){
        if(confirm("Are you sure?")){
            window.location.href=url;
        }
    }
    
</script>