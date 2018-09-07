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

										 <li id="menu-academico" ><a href="view_books.php"><i class="fa fa-file-text-o"></i> <span>View Books</span></a></li>

									<li><a href="view_notice.php"><i class="lnr lnr-pencil"></i> <span>View Notice</span></a></li>

									<li id="menu-academico" ><a href="view_result.php"><i class="fa fa-file-text-o"></i> <span>View Result</span></a></li>

									 <li><a href="discussion.php"><i class="lnr lnr-envelope"></i> <span>Student Discussion</span></a></li>

									 <li><a href="messageTofaculty.php"><i class="lnr lnr-envelope"></i> <span>Message To Faculty</span></a></li>

									 <li><a href="?action=logout"><i class="lnr lnr-envelope"></i> <span>Logout</span></a></li>
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>