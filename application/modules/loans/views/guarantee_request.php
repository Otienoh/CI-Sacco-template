<div class="row">
	<div class="col-md-12">
		<!-- start: INBOX PANEL -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-envelope-o"></i>
				Inbox
				<div class="panel-tools">
					<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
					</a>
					<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
						<i class="fa fa-wrench"></i>
					</a>
					<a class="btn btn-xs btn-link panel-refresh" href="#">
						<i class="fa fa-refresh"></i>
					</a>
					<a class="btn btn-xs btn-link panel-expand" href="#">
						<i class="fa fa-resize-full"></i>
					</a>
					<a class="btn btn-xs btn-link panel-close" href="#">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="panel-body messages">
				<ul class="messages-list">
					<li class="messages-search">
						<form action="#" class="form-inline">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search messages...">
								<div class="input-group-btn">
									<button class="btn btn-primary" type="button">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						</form>
					</li>
					<?php echo $guarantee_request['brief'];?>
					
				</ul>
				<?php echo $guarantee_request['detailed'];?>
				
				<!-- <div class="messages-content">
					<div class="message-header">
						<div class="message-time">
							11 NOV 2014, 11:46 PM
						</div>
						<div class="message-from">
							Nicole Bell &lt;nicole@example.com&gt;
						</div>
						
						<div class="message-subject">
							New frontend layout
						</div>
						<div class="message-actions">
							<a title="Move to trash" href="#"><i class="fa fa-trash-o"></i></a>
							<a title="Reply" href="#"><i class="fa fa-reply"></i></a>
							<a title="Reply to all" href="#"><i class="fa fa-reply-all"></i></a>
							<a title="Forward" href="#"><i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
					<div class="message-content">
						<p>
							<strong>Lorem ipsum</strong> dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
						</p>
						<p>
							Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.
							Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.
						</p>
						<p>
							Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut blandit ligula. In accumsan mauris at augue feugiat consequat. Aenean consequat sem sed velit sagittis dignissim. Phasellus quis convallis est. Praesent porttitor mauris nec lectus mollis, eget sodales libero venenatis. Cras eget vestibulum turpis. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam turpis velit, tempor vitae libero ac, fermentum laoreet dolor.
						</p>
					</div>
				</div> -->
			</div>
		</div>
		<!-- end: INBOX PANEL -->
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.messages-content').hide();
		$('li').click(function(){
			id = $(this).attr('id');
			console.log(id);
			$('.messages-content').hide();
			$('#det-'+id).show();
		});

	});
</script>