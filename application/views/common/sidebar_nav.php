<div class="vertical-menu">
        <div data-simplebar class="h-100" style="background-color: rgb(22 245 7 / 25%)!important">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="<?= base_url(); ?>" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span>Dashboards</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="bx bx bx-store"></i>
							<span class="bx bx-chevron-right float-right"></span>
                            <span>Orders</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="<?= base_url('Orders'); ?>">Purchase Orders(Draft)
                                    <span class="badge badge-pill badge-info float-right"></span>
                                </a>
                            </li>
							<li>
                                <a href="<?= base_url('Order_ctrl/history'); ?>">Order History
                                    <span class="badge badge-pill badge-info float-right"></span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <span class="bx bx-chevron-right float-right"></span>
                            <span>Schemes</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="<?= base_url('scheme'); ?>">Scheme List</a>
                            </li>
                            <?php if($this->session->userdata('user_type') == 'admin'){ ?>
                                <li>
                                    <a href="<?= base_url('scheme/create'); ?>">Create new Scheme</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo base_url('auth/logout');?>" class="waves-effect">
                            <i class="bx bx-power-off"></i>
                            <span>LogOut</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>