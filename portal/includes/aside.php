<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">	
        <div class="multinav">
        <div class="multinav-scroll" style="height: 100%;">	
            <!-- sidebar menu-->
            <ul class="sidebar-menu" data-widget="tree">	
                <li class="header">Dashboard & Apps</li>
                <li><a href="index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard</a></li>
                <li><a href="roster.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Duty Roster</a></li>
                <li><a href="dutyPostAll.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Duty Posts</a></li>
                
                <?php if($data["is_admin"]){

                    echo '
                        <li class="header">Administrative</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="icon-Write fa-solid fa-users"><span class="path1"></span><span class="path2"></span></i>
                                <span>Staff Management</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">			
                                <li><a href="addStaff.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Staff</a></li>								
                                <li><a href="staffList.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Staff List</a></li>								
                                
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="icon-Write fa-solid fa-calendar-days"><span class="path1"></span><span class="path2"></span></i>
                                <span>Duty Roster</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">			
                                <li><a href="rosterGeneration.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Roster Generation</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="icon-Write fa-solid fa-bars-progress"><span class="path1"></span><span class="path2"></span></i>
                                <span>Duty Posts</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">			
                                <li><a href="addPost.php"><i class="fa-solid fa-location"><span class="path1"></span><span class="path2"></span></i>Add Post</a></li>
                                <li><a href="dutyPosts.php"><i class="fa-solid fa-list-check"><span class="path1"></span><span class="path2"></span></i>Dusty Posts</a></li>
                            </ul>
                        </li>
                    ';

                }?>	 	     
            </ul>
        </div>
        </div>
    </section>
    <div class="sidebar-footer">
        <a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
        <a href="mailbox.html" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
        <a href="includes/logout.php" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning fa-solid fa-right-from-bracket"><span class="path1"></span><span class="path2"></span></span></a>
    </div>
</aside>