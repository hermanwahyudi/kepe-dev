<style>
.crop {
    float: left;
    margin: .5em 10px .5em 0;
    overflow: hidden; /* this is important */
    position: relative; /* this is important too */
    border: 1px solid #ccc;
    width: 100%;
    height: 200px;
}
.crop img {
    position: absolute;
   width: 100%;
}
</style>
<div class="col-md-12">
	<div clas="row">
		<h2 class="line-title">
			<strong class="bold-text">ABOUT</strong>
			<span class="light-text main-color">US</span>
		</h2>
		<div class="line main-bg"></div>
		<div class="row margin-bottom-medium">
			<div class="col-md-8">
				<div data-wow-duration="2s" class="jumbo-text light-text margin-top-medium wow slideInLeft animated" style="visibility: visible; animation-duration: 2s; animation-name: slideInLeft;">
					{content_title}
				</div>
			</div>
			<div class="col-md-4">
				{content_image}
			</div>
			<div class="clearfix"></div>
		</div>
		<p class="margin-bottom-medium wow slideInUp animated" style="text-align: justify; visibility: visible; animation-name: slideInUp;">
			{content_body}
		</p>
		<div class="row margin-top-large">
			<div class="col-md-8">
				<div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group">

					<!-- =========================
					Collapsible Panel 1
					============================== -->
					<div class="panel panel-default">
						<div id="headingOne" role="tab" class="panel-heading">
							<div class="panel-title">
								<a aria-controls="collapseOne" aria-expanded="true" data-parent="#accordion" data-toggle="collapse" href="#collapseOne">
										<span class="state"><strong>+</strong></span>
										<strong>Mission</strong>
								</a>
							</div>
						</div> <!-- *** end panel-heading *** -->
						<div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse" id="collapseOne">
							<div class="panel-body">
							{content_mission}
							</div>
						</div> <!-- *** end collapsed item *** -->
					</div> <!-- *** end panel *** -->
				</div> <!-- *** end panel-group *** -->
			</div> <!-- *** end col-md-8 *** -->
		</div>
	</div>
</div>
<div class="col-md-12">
     <div class="row">
		<div class="col-md-12">
			<h2 class="line-title"><strong class="bold-text">NEWS</strong></h2>
		</div>
		{get_news}
		<div class="col-md-4">
			<div class="recent_post">
				<div>
					<div class="title">{title}</div>
					<p><em>{created_date} {full_name}</em></p>		
					{image}
					<div style="text-align: justify;">
						{summary}
					</div>
					<p>
						<em>{category}</em>
					</p>
				</div>
			</div>                	 
		</div>
		{/get_news}
		<br>
		<div class="col-md-12" style="text-align: center; margin-top: 20px;">
			<a class="button medium yellow" href="<?php echo base_url('news'); ?>">View All News</a>
		</div>
    </div>
</div>

<div class="col-md-12">
     <div class="row">
		<div class="col-md-12">
			<h2 class="line-title"><strong class="bold-text">ARTICLE</strong></h2>
		</div>
		{get_article}
        {no_recent_art}
		<div class="col-md-6">
			<div class="recent_post">
				<div>
					<div class="title">{title}</div>
					<p><em>{created_date} {full_name}</em></p>		
					{image}
					<div style="text-align: justify;">
						{summary}
					</div>
					<p>
						<em>{category}</em>
					</p>
				</div>
			</div>                	 
		</div>
		{/get_article}
		<br>
		<div class="col-md-12" style="text-align: center; margin-top: 20px;">
			<a class="button medium yellow" href="<?php echo base_url('article'); ?>">View All Articles</a>
		</div>
    </div>
</div>

<div class="col-md-12">
	<h2 class="line-title"><strong class="bold-text">FOLLOW US</strong></h2>
	<div class="social-media pull-center">
	<ul class="list-inline">
		<li class="social-icons">
			<a target="_blank" title="Follow Twitter" href="{contact_twitter}">
				<img class="img-responsive" src="<?php echo base_url('assets/img//twitter.png'); ?>">
			</a>
		</li>
		<li class="social-icons">
			<a target="_blank" title="Facebook group" href="{contact_facebook}">
				<img class="img-responsive" src="<?php echo base_url('assets/img//facebook.png'); ?>">
			</a>
		</li>
		<li class="social-icons">
			<a target="_blank" title="Google Plus group" href="{contact_googleplus}">
				<img class="img-responsive" src="<?php echo base_url('assets/img//googleplus.png'); ?>">
			</a>
		</li>
		<li class="social-icons">
			<a target="_blank" title="Watch Youtube" href="{contact_youtube}">
				<img class="img-responsive" src="<?php echo base_url('assets/img//youtube.png'); ?>">
			</a>
		</li>
		<li class="social-icons">
			<a target="_blank" title="Instagram" href="{contact_instagram}">
				<img class="img-responsive" src="<?php echo base_url('assets/img//instagram.png'); ?>">
			</a>
		</li>
		<li class="social-icons">
			<a target="_blank" title="Path" href="{contact_path}">
				<img class="img-responsive" src="<?php echo base_url('assets/img//path.png'); ?>">
			</a>
		</li>
	</ul>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>