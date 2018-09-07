<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<?php 
                        if(isset($_GET['action']) && $_GET['action'] == "logout"){
                            Session::destroy();
                        }
                    ?>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="index.php"><i class="fa fa-tachometer"></i> <span>Home</span></a></li>

										 <li id="menu-academico" ><a href="book_upload.php"><i class="fa fa-file-text-o"></i> <span>Upload Books</span></a></li>

									<li><a href="notice_upload.php"><i class="lnr lnr-pencil"></i> <span>Upload Notice</span></a></li>

									<li id="menu-academico" ><a href="result_upload.php"><i class="fa fa-file-text-o"></i> <span>Upload Result</span></a></li>

									<li id="menu-academico" ><a href="profile_update.php"><i class="lnr lnr-book"></i> <span>Update Profile</span></a></li>

									<li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Reports</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="report_view_books.php">View Books</a></li>
											<li id="menu-academico-avaliacoes" ><a href="report_view_notice.php">View Notice</a></li>
											<li id="menu-academico-boletim" ><a href="report_view_result.php">View Result</a></li>
										  </ul>
										</li>

									 <li><a href="discussion.php"><i class="lnr lnr-envelope"></i> <span>Admin Discussion</span></a></li>

							        <li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Manage Students</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="manage_view_student.php">View Students</a></li>
											<li id="menu-academico-boletim" ><a href="manage_student_message.php">Students Message</a></li>
										  </ul>
									 </li>

									 <li><a href="faculty_profile.php"><i class="lnr lnr-envelope"></i> <span>Profile</span></a></li>

									 <li><a href="?action=logout"><i class="lnr lnr-envelope"></i> <span>Logout</span></a></li>
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>