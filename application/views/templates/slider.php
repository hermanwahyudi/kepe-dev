<!-- Slider -->
<div id="slider" style="background: rgba(0, 0, 0, 0) linear-gradient(to bottom, #4c0000 0%, #870000 10%, #870000 100%) repeat scroll 0 0;">

	<!-- Flexslider Start-->
	<div class="flexslider">
		<ul class="slides">
			{get_video}
			<li class="custom-slide" style="background: #870000 repeat scroll 0 0;">
				<div class="container">
					<div class="seven columns">
						<div class="slider_description">
							<h2 style="color: #fff;">{title}</h2>
							<p style="color: #fff;">{description}</p>
							<a href="{url}" class="button medium yellow">View</a>
						</div>
					</div>
					{image}
				</div>
			</li>
			{/get_video}
		</ul>
	</div>
	<!-- Flexslider End-->		
</div>
<!-- End Slider -->

<script src=<?php echo base_url('assets/js/flexslider_slide.js'); ?>></script>