<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">Article</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>
<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			{get_article}
			<div class="post">
				<h2 class="post-title">{title}</h2>
				<p class="post-body">
					On {created_date} By {full_name}
				</p>
				{image}
				<p>
					<i class="glyphicon glyphicon-comment"></i>&nbsp;{count_article_comment} comment | 
					<i class="glyphicon glyphicon-stats"></i>&nbsp;{count_article_stat} views
				</p>
				{summary}
				{tag}
			</div>
			{read_more}
			{/get_article}
			<div style="text-align: center;">
				{page}
			</div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="sidebar-module">
		<h2 class="title">Category</h2>
		<ol class="list-inline list-inline-btn">
			{get_article_category}
				{list}
			{/get_article_category}
		</ol>                 	 
	</div>
	<div class="sidebar-module">
		<h2 class="title">Archives</h2>
            <ol class="list-unstyled">
				{get_archives_list}
					{list}
				{/get_archives_list}
            </ol>
    </div>
</div>

