<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">Search</li>
			{/get_breadcrumb}
		</ol>
	</div>
	<div class="btn-group" role="group" aria-label="...">
		{tab_search}
			{tab}
		{/tab_search}
	</div>
</div>
<div class="col-md-12">
	<div><h4>Keyword : '{q}' result ({elapsed_time}) s</h4></div>
</div>
<div class="col-md-8 blog-main">
	{get_search}
	<div class="blog-post">
		<h2 class="blog-post-title"><a href="{url}">{title}</a></h2>
		<p class="blog-post-meta">
			{summary}
			{no_result}
		</p>
	</div>
	{/get_search}
	<div class="col-md-12">
		<div style="text-align: center;">
			{paging}
		</div>
	</div>
</div>
