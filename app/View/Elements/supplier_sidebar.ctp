<div id="page-sidebar">
    <div class="scroll-sidebar">

        <div class="user_box">
            <div class="user-pic">
                <img src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/image-resources/image-procurehere/avatar-1.jpg" />
            </div>
            <div class="user_detail_box">
                <span class="user_Name">Mozes Fenandez</span>
                <h4 class="user_mail">sample@gmail.com</h4>
                <span class="user_designation">Event Owner</span>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/users/supplierEdit/<?php echo AppController::encryption($this->Session->read("Auth.User")['SupplierDetail'][0]['id']); ?>" class="user_edit_icon"><i aria-hidden="true" class="glyph-icon icon-edit"></i></a>
            </div>
            <div class="ip_detail_box">
                <span>IP : 192.169.0.12</span>
                <span>Last Login : 12-03-2016 08:30 PM</span>
                <span>Last Login Failed : 12-03-2016 08:30 PM</span>
            </div>
        </div>
        <ul id="sidebar-menu">
            <li>
                <a href="index.html" title="Supplier Dashboard">
                    <i class="glyphicon glyphicon-blackboard"></i>
                    <span>Dashboard</span>
                </a>


            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/users/campaignList" title="Campaign">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Campaigns</span>
                </a>


            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/users/locations" title="Location">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Locations</span>
                </a>


            </li>
            <li class="divider"></li>
            <li class="no-menu">
                <a href="" title="Users">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Deals</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dealList"><span>Listing</span></a></li>
                        <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dealAdd"><span>Add</span></a></li>

                    </ul>

                </div>
                <!-- .sidebar-submenu -->
            </li>



            <li class="divider"></li>

            <li class="no-menu">
                <a href="Transaction.html" title="Transaction">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                    <span>Transaction</span>
                </a>

            </li>
        </ul>
        <!-- #sidebar-menu -->


    </div>
</div>