					<div class="col-sm-12" id="header_bottom">
						
						<h1><a href="#"><i class="fa fa-users"></i> People </a></h1>
					
					</div>				
				</div>
			</div>
			
			
			
			<!-- start my profile area -->
			<div class="container-fluid" id="myprofile_area">

				<!-- start my profile row -->
				<div class="row">

					<div class="col-md-2">

						<div class="side-panel">

							<h5 class="ng-binding">Filter</h5>

							<input id="filter" class="form-control" type="search" onkeyup="restrict('filter'); filterPeople('filter')" >

							<br>

							<h5>Order</h5>

							<ul>
								<li class="side-menu">
									<a href="javascript:void(0)">Full name</a>
								</li>
								<li class="side-menu">
									<a href="javascript:void(0)">Organization or Dept.</a>
								</li>
								<li class="side-menu">
									<a href="javascript:void(0)">Position</a>
								</li>
							</ul>

						</div> <!-- end side panel -->

					</div> <!-- end col2 -->
					
					
					<!-- start  right_form  -->
					<div class="col-md-10" id="right_form">
							
						<div class="panel-stream">

							<div class="row">

								<table id="table" class="table">
									<thead>
										<tr>
											<td>&nbsp;</td>
										</tr>
									</thead>
									
									<?php if ( isset($users[0]) ): ?>
									<tbody>
										<?php $ids = array(); ?>
										<?php foreach ($users as $user): ?>
											<?php $ids[] = trim(strtolower( preg_replace('#[ ]#i', '', $user['fullname']) ).'|'); ?>
										<tr>
											<td id="<?php trim(ternary( strtolower( preg_replace('#[ ]#i', '', $user['fullname']) ) ) ); ?>">
												<img width="30" class="pull-left" src="<?php ternary($user['avatar'], '../images/default-avatar.png'); ?>">
												<div style="margin-left:47px; font-weight:300; font-size:15px">
													<a href="user-single.php?id=<?php ternary($user['id']);?>"><?php ternary($user['fullname']); ?></a>
													<br>
													<small><?php ternary($user['organization'], '', ' - '); ?><?php ternary($user['position']); ?><!-- ngIf: user.position --></small>
												</div>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
									<?php endif ?>
								</table>

								<!-- Ids for filter -->
								<div style="display:none;" id="filter-ids">
									<?php foreach ($ids as $id): ?>
										<?php echo $id; ?>
									<?php endforeach ?>
								</div>
								
								<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
								<script src="../js/main.js"></script>
								<script>
									function filterPeople(fieldId) {
										var filterBy = document.getElementById(fieldId).value;

										if ( filterBy != "" ) {
											$('.table tbody tr td').css('display', 'none');

											var filterIds = document.getElementById('filter-ids').innerHTML;
											var filterIds = filterIds.split('|');
											
											for (var i = 0; i <= filterIds.length - 1; i++) {
												var filterIdsTrimed = filterIds[i].trim();
												var existsIds = filterIdsTrimed.search(filterBy);

												if ( existsIds > -1 ) {
													document.getElementById(filterIdsTrimed).style.display = "block";
												};
											};
										} else {
											$('.table tbody tr td').css('display', 'block');
										};
									};
								</script>

							</div> <!-- end row -->

						</div> <!-- end panel strem -->				
					
					</div><!-- end col9 --> <!-- end right form -->

				</div><!-- end my profile row-->
			
			</div><!-- end my profile area -->