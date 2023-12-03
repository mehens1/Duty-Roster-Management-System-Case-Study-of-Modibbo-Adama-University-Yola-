<?php
    // include "portal/includes/auth.php";
	
	if(isset($_COOKIE['mau_user_token'])) {
		$token = $_COOKIE['mau_user_token'];
		$jsonData = $_COOKIE['mau_user_data'];
		$data = json_decode($jsonData, true);
	} else {
		header('Location: ../index.php');
	}
	
?>
<?php include "includes/head.php" ?>
		
		<div class="wrapper">
			<div id="loader"></div>

			<?php include "includes/header.php"; ?>
			<?php include "includes/aside.php"; ?>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<div class="container-full">
					<!-- Main content -->
					<section class="content">
						<div class="row">
							<div class="col-xl-8 col-12">
								<div class="box bg-primary-light">
									<div class="box-body d-flex px-0">
										<div class="flex-grow-1 p-30 flex-grow-1 bg-img dask-bg bg-none-md" style="background-position: right bottom; background-size: auto 100%; background-image: url(assets/images/svg-icon/color-svg/custom-1.svg)">
											<div class="row">
												<div class="col-12 col-xl-7">
													<h2>Welcome back, <strong><?php if($data != ""){echo $data["first_name"];} ?></strong> </h2>

													<p class="text-dark my-10 fs-16">
														We are happy to have you back to your dashboard!
													</p>
													<p class="text-dark my-10 fs-16">
														You can proceed, <strong class="text-warning">Thank You!</strong>
													</p>
												</div>
												<div class="col-12 col-xl-5"></div>
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="row">
									<div class="col-12">
										<div class="box">
											<div class="box-header with-border">
												<h4 class="box-title">Working Hours</h4>
												<ul class="box-controls pull-right d-md-flex d-none">
												<li class="dropdown">
													<button class="dropdown-toggle btn btn-warning-light px-10" data-bs-toggle="dropdown" href="#">Today</button>										  
													<div class="dropdown-menu dropdown-menu-end">
													<a class="dropdown-item active" href="#">Today</a>
													<a class="dropdown-item" href="#">Yesterday</a>
													<a class="dropdown-item" href="#">Last week</a>
													<a class="dropdown-item" href="#">Last month</a>
													</div>
												</li>
												</ul>
											</div>
											<div class="box-body">
												<div id="revenue5" class="min-h-325"></div>
												<div class="d-flex justify-content-center">
													<p class="d-flex align-items-center fw-600 mx-20"><span class="badge badge-xl badge-dot badge-warning me-20"></span> Progress</p>
													<p class="d-flex align-items-center fw-600 mx-20"><span class="badge badge-xl badge-dot badge-primary me-20"></span> Done</p>
												</div>
											</div>
										</div>
									</div>
								</div> -->
								<div class="row">
									<div class="col-xl-6">
										<div class="box">
											<div class="box-body d-flex p-0">
												<div class="flex-grow-1 bg-danger p-30 flex-grow-1 bg-img" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 100%; background-image: url(../images/svg-icon/color-svg/custom-3.svg)">

													<h4 class="fw-400">User Activity</h4>

													<p class="my-10 fs-16">
														Grow marketing &amp; sales<br>through product.
													</p>

													<a href="#" class="btn btn-danger-light">Read More</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="box">
											<div class="box-body d-flex p-0">
											<div class="flex-grow-1 bg-primary p-30 flex-grow-1 bg-img" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 100%; background-image: url(../images/svg-icon/color-svg/custom-4.svg)">

												<h4 class="fw-400">Based On</h4>

												<div class="mt-5">
													<div class="d-flex mb-10 fs-16">
														<span class="icon-Arrow-right mt-5 me-10"><span class="path1"></span><span class="path2"></span></span>
														<span class="text-white">Activities</span>
													</div>

													<div class="d-flex mb-10 fs-16">
														<span class="icon-Arrow-right mt-5 me-10"><span class="path1"></span><span class="path2"></span></span>
														<span class="text-white">Sales</span>
													</div>

													<div class="d-flex mb-10 fs-16">
														<span class="icon-Arrow-right mt-5 me-10"><span class="path1"></span><span class="path2"></span></span>
														<span class="text-white">Releases</span>
													</div>
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="box bg-transparent no-shadow mb-0">
										<div class="box-header no-border">
											<h4 class="box-title">Previous Complains</h4>							
											<div class="box-controls pull-right d-md-flex d-none">
											<a href="#">View All</a>
											</div>
										</div>
									</div>
									<div class="box">
										<div class="box-body py-0">
											<div class="table-responsive">
												<table class="table no-border mb-0">
													<tbody>
														<tr>
															<td>
																<div class="bg-danger h-50 w-50 l-h-50 rounded text-center">
																<p class="mb-0 fs-20 fw-600">A1</p>
																</div>
															</td>
															<td class="fw-600">Biology Course</td>
															<td class="text-fade">StarterReplacement.pdf</td>
															<td class="fw-500"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Only view</td>
															<td class="text-fade">78 members</td>
															<td class="fw-600">47 MB</td>
														</tr>
														<tr>
															<td>
																<div class="bg-info h-50 w-50 l-h-50 rounded text-center">
																<p class="mb-0 fs-20 fw-600">B1</p>
																</div>
															</td>
															<td class="fw-600">Contemporary Art</td>
															<td class="text-fade">Loremipsum.doc</td>
															<td class="fw-500 text-warning"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Edit available</td>
															<td class="text-fade">78 members</td>
															<td class="fw-600">78 MB</td>
														</tr>
														<tr>
															<td>
																<div class="bg-primary h-50 w-50 l-h-50 rounded text-center">
																<p class="mb-0 fs-20 fw-600">C1</p>
																</div>
															</td>
															<td class="fw-600">Programming Language</td>
															<td class="text-fade">phpcore.mp3</td>
															<td class="fw-500"><span class="badge badge-sm badge-dot badge-primary me-10"></span>Only view</td>
															<td class="text-fade">48 members</td>
															<td class="fw-600">12 MB</td>
														</tr>
														<tr>
															<td>
																<div class="bg-success h-50 w-50 l-h-50 rounded text-center">
																<p class="mb-0 fs-20 fw-600">A2</p>
																</div>
															</td>
															<td class="fw-600">Geometry Course</td>
															<td class="text-fade">dummyabz.pdf</td>
															<td class="fw-500"><span class="badge badge-sm badge-dot badge-primary me-10"></span>Only view</td>
															<td class="text-fade">24 members</td>
															<td class="fw-600">18 MB</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
																
							</div>
							<?php include "includes/rightPanel.php" ?>
							
						</div>
					</section>
					<!-- /.content -->
				</div>
			</div>
			<!-- /.content-wrapper -->
			<?php include "includes/footer.php"; ?>

			<!-- Control Sidebar -->
			<aside class="control-sidebar">
				
				<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
				<ul class="nav nav-tabs control-sidebar-tabs">
				<li class="nav-item"><a href="#control-sidebar-home-tab" data-bs-toggle="tab" class="active"><i class="mdi mdi-message-text"></i></a></li>
				<li class="nav-item"><a href="#control-sidebar-settings-tab" data-bs-toggle="tab"><i class="mdi mdi-playlist-check"></i></a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
				<!-- Home tab content -->
				<div class="tab-pane active" id="control-sidebar-home-tab">
					<div class="flexbox">
						<a href="javascript:void(0)" class="text-grey">
							<i class="ti-more"></i>
						</a>	
						<p>Users</p>
						<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
					</div>
					<div class="lookup lookup-sm lookup-right d-none d-lg-block">
						<input type="text" name="s" placeholder="Search" class="w-p100">
					</div>
					<div class="media-list media-list-hover mt-20">
						<div class="media py-10 px-0">
						<a class="avatar avatar-lg status-success" href="#">
							<img src="../images/avatar/1.jpg" alt="...">
						</a>
						<div class="media-body">
							<p class="fs-16">
							<a class="hover-primary" href="#"><strong>Tyler</strong></a>
							</p>
							<p>Praesent tristique diam...</p>
							<span>Just now</span>
						</div>
						</div>

						<div class="media py-10 px-0">
						<a class="avatar avatar-lg status-danger" href="#">
							<img src="../images/avatar/2.jpg" alt="...">
						</a>
						<div class="media-body">
							<p class="fs-16">
							<a class="hover-primary" href="#"><strong>Luke</strong></a>
							</p>
							<p>Cras tempor diam ...</p>
							<span>33 min ago</span>
						</div>
						</div>

						<div class="media py-10 px-0">
						<a class="avatar avatar-lg status-warning" href="#">
							<img src="../images/avatar/3.jpg" alt="...">
						</a>
						<div class="media-body">
							<p class="fs-16">
							<a class="hover-primary" href="#"><strong>Evan</strong></a>
							</p>
							<p>In posuere tortor vel...</p>
							<span>42 min ago</span>
						</div>
						</div>

						<div class="media py-10 px-0">
						<a class="avatar avatar-lg status-primary" href="#">
							<img src="../images/avatar/4.jpg" alt="...">
						</a>
						<div class="media-body">
							<p class="fs-16">
							<a class="hover-primary" href="#"><strong>Evan</strong></a>
							</p>
							<p>In posuere tortor vel...</p>
							<span>42 min ago</span>
						</div>
						</div>			
						
						<div class="media py-10 px-0">
						<a class="avatar avatar-lg status-success" href="#">
							<img src="../images/avatar/1.jpg" alt="...">
						</a>
						<div class="media-body">
							<p class="fs-16">
							<a class="hover-primary" href="#"><strong>Tyler</strong></a>
							</p>
							<p>Praesent tristique diam...</p>
							<span>Just now</span>
						</div>
						</div>

						<div class="media py-10 px-0">
						<a class="avatar avatar-lg status-danger" href="#">
							<img src="../images/avatar/2.jpg" alt="...">
						</a>
						<div class="media-body">
							<p class="fs-16">
							<a class="hover-primary" href="#"><strong>Luke</strong></a>
							</p>
							<p>Cras tempor diam ...</p>
							<span>33 min ago</span>
						</div>
						</div>

						<div class="media py-10 px-0">
						<a class="avatar avatar-lg status-warning" href="#">
							<img src="../images/avatar/3.jpg" alt="...">
						</a>
						<div class="media-body">
							<p class="fs-16">
							<a class="hover-primary" href="#"><strong>Evan</strong></a>
							</p>
							<p>In posuere tortor vel...</p>
							<span>42 min ago</span>
						</div>
						</div>

						<div class="media py-10 px-0">
						<a class="avatar avatar-lg status-primary" href="#">
							<img src="../images/avatar/4.jpg" alt="...">
						</a>
						<div class="media-body">
							<p class="fs-16">
							<a class="hover-primary" href="#"><strong>Evan</strong></a>
							</p>
							<p>In posuere tortor vel...</p>
							<span>42 min ago</span>
						</div>
						</div>
						
					</div>

				</div>
				<!-- /.tab-pane -->
				<!-- Settings tab content -->
				<div class="tab-pane" id="control-sidebar-settings-tab">
					<div class="flexbox">
						<a href="javascript:void(0)" class="text-grey">
							<i class="ti-more"></i>
						</a>	
						<p>Todo List</p>
						<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
					</div>
					<ul class="todo-list mt-20">
						<li class="py-15 px-5 by-1">
						<!-- checkbox -->
						<input type="checkbox" id="basic_checkbox_1" class="filled-in">
						<label for="basic_checkbox_1" class="mb-0 h-15"></label>
						<!-- todo text -->
						<span class="text-line">Nulla vitae purus</span>
						<!-- Emphasis label -->
						<small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
						<!-- General tools such as edit or delete-->
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
						</li>
						<li class="py-15 px-5">
						<!-- checkbox -->
						<input type="checkbox" id="basic_checkbox_2" class="filled-in">
						<label for="basic_checkbox_2" class="mb-0 h-15"></label>
						<span class="text-line">Phasellus interdum</span>
						<small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
						</li>
						<li class="py-15 px-5 by-1">
						<!-- checkbox -->
						<input type="checkbox" id="basic_checkbox_3" class="filled-in">
						<label for="basic_checkbox_3" class="mb-0 h-15"></label>
						<span class="text-line">Quisque sodales</span>
						<small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
						</li>
						<li class="py-15 px-5">
						<!-- checkbox -->
						<input type="checkbox" id="basic_checkbox_4" class="filled-in">
						<label for="basic_checkbox_4" class="mb-0 h-15"></label>
						<span class="text-line">Proin nec mi porta</span>
						<small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
						</li>
						<li class="py-15 px-5 by-1">
						<!-- checkbox -->
						<input type="checkbox" id="basic_checkbox_5" class="filled-in">
						<label for="basic_checkbox_5" class="mb-0 h-15"></label>
						<span class="text-line">Maecenas scelerisque</span>
						<small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
						</li>
						<li class="py-15 px-5">
						<!-- checkbox -->
						<input type="checkbox" id="basic_checkbox_6" class="filled-in">
						<label for="basic_checkbox_6" class="mb-0 h-15"></label>
						<span class="text-line">Vivamus nec orci</span>
						<small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
						</li>
						<li class="py-15 px-5 by-1">
						<!-- checkbox -->
						<input type="checkbox" id="basic_checkbox_7" class="filled-in">
						<label for="basic_checkbox_7" class="mb-0 h-15"></label>
						<!-- todo text -->
						<span class="text-line">Nulla vitae purus</span>
						<!-- Emphasis label -->
						<small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
						<!-- General tools such as edit or delete-->
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
						</li>
						<li class="py-15 px-5">
						<!-- checkbox -->
						<input type="checkbox" id="basic_checkbox_8" class="filled-in">
						<label for="basic_checkbox_8" class="mb-0 h-15"></label>
						<span class="text-line">Phasellus interdum</span>
						<small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
						</li>
						<li class="py-15 px-5 by-1">
						<!-- checkbox -->
						<input type="checkbox" id="basic_checkbox_9" class="filled-in">
						<label for="basic_checkbox_9" class="mb-0 h-15"></label>
						<span class="text-line">Quisque sodales</span>
						<small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
						</li>
						<li class="py-15 px-5">
						<!-- checkbox -->
						<input type="checkbox" id="basic_checkbox_10" class="filled-in">
						<label for="basic_checkbox_10" class="mb-0 h-15"></label>
						<span class="text-line">Proin nec mi porta</span>
						<small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
						<div class="tools">
							<i class="fa fa-edit"></i>
							<i class="fa fa-trash-o"></i>
						</div>
						</li>
					</ul>
				</div>
				<!-- /.tab-pane -->
				</div>
			</aside>
			<!-- /.control-sidebar -->
			
			<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		
		</div>
		<!-- ./wrapper -->
			
		<div id="chat-box-body">
			<div id="chat-circle" class="waves-effect waves-circle btn btn-circle btn-lg btn-warning l-h-70">
				<div id="chat-overlay"></div>
				<span class="icon-Group-chat fs-30"><span class="path1"></span><span class="path2"></span></span>
			</div>

			<div class="chat-box">
				<div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
					<div class="btn-group">
					<button class="waves-effect waves-circle btn btn-circle btn-primary-light h-40 w-40 rounded-circle l-h-45" type="button" data-bs-toggle="dropdown">
						<span class="icon-Add-user fs-22"><span class="path1"></span><span class="path2"></span></span>
					</button>
					<div class="dropdown-menu min-w-200">
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Color me-15"></span>
							New Group</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Clipboard me-15"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
							Contacts</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Group me-15"><span class="path1"></span><span class="path2"></span></span>
							Groups</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Active-call me-15"><span class="path1"></span><span class="path2"></span></span>
							Calls</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Settings1 me-15"><span class="path1"></span><span class="path2"></span></span>
							Settings</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Question-circle me-15"><span class="path1"></span><span class="path2"></span></span>
							Help</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Notifications me-15"><span class="path1"></span><span class="path2"></span></span> 
							Privacy</a>
					</div>
					</div>
					<div class="text-center flex-grow-1">
						<div class="text-dark fs-18">Mayra Sibley</div>
						<div>
							<span class="badge badge-sm badge-dot badge-primary"></span>
							<span class="text-muted fs-12">Active</span>
						</div>
					</div>
					<div class="chat-box-toggle">
						<a id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-45" href="#">
						<span class="icon-Close fs-22"><span class="path1"></span><span class="path2"></span></span>
						</a>                    
					</div>
				</div>
				<div class="chat-box-body">
					<div class="chat-box-overlay">   
					</div>
					<div class="chat-logs">
						<div class="chat-msg user">
							<div class="d-flex align-items-center">
								<span class="msg-avatar">
									<img src="../images/avatar/2.jpg" class="avatar avatar-lg">
								</span>
								<div class="mx-10">
									<a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
									<p class="text-muted fs-12 mb-0">2 Hours</p>
								</div>
							</div>
							<div class="cm-msg-text">
								Hi there, I'm Jesse and you?
							</div>
						</div>
						<div class="chat-msg self">
							<div class="d-flex align-items-center justify-content-end">
								<div class="mx-10">
									<a href="#" class="text-dark hover-primary fw-bold">You</a>
									<p class="text-muted fs-12 mb-0">3 minutes</p>
								</div>
								<span class="msg-avatar">
									<img src="../images/avatar/3.jpg" class="avatar avatar-lg">
								</span>
							</div>
							<div class="cm-msg-text">
							My name is Anne Clarc.         
							</div>        
						</div>
						<div class="chat-msg user">
							<div class="d-flex align-items-center">
								<span class="msg-avatar">
									<img src="../images/avatar/2.jpg" class="avatar avatar-lg">
								</span>
								<div class="mx-10">
									<a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
									<p class="text-muted fs-12 mb-0">40 seconds</p>
								</div>
							</div>
							<div class="cm-msg-text">
								Nice to meet you Anne.<br>How can i help you?
							</div>
						</div>
					</div><!--chat-log -->
				</div>
				<div class="chat-input">      
					<form>
						<input type="text" id="chat-input" placeholder="Send a message..."/>
						<button type="submit" class="chat-submit" id="chat-submit">
							<span class="icon-Send fs-22"></span>
						</button>
					</form>      
				</div>
			</div>
		</div>
		
		<!-- Page Content overlay -->
		
<?php include "includes/foot.php" ?>
