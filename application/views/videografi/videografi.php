<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">Videografi</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>
{get_video}
	{open_parenthesis}
		<div class="col-md-4" style="margin-bottom: 20px;">
			<div class="recent_post">
				<div>
					<div class="title">{title}</div>
					<p class="post-body">
						On {created_date} By {full_name}
					</p>
					<p>{image}</p>
					<p>
						<i class="glyphicon glyphicon-comment"></i>&nbsp;{count_video_comment} comment | 
						<i class="glyphicon glyphicon-stats"></i>&nbsp;{count_video_stat} views | 
						<i class="glyphicon glyphicon-time"></i>&nbsp;{duration}
					</p>
					 <p>{tag}</p>
				</div>
			</div>                	 
		</div>
	{closing_parenthesis}
{/get_video}
<div class="col-md-12">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 pull-center">
			<ol class="list-inline list-inline-btn">
				<li <?php echo ($this->uri->segment(5) == '') ? "class='active'" : ""; ?>><a href='<?php echo base_url('videografi'); ?>' data-toggle='tooltip' data-placement='top' title='All'>All</a></li>
				{get_video_category}
					{list}
				{/get_video_category}
			</ol>                 	 
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-12">
			<div style="text-align: center;">
				{page}
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>