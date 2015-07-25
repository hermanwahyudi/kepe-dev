<!-- appId=876274572459160 appId for KepoAbis.com -->
<div id="fb-root"></div>
<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=876274572459160";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script>!function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
	if(!d.getElementById(id)){js=d.createElement(s);js.id=id;
		js.src=p+'://platform.twitter.com/widgets.js';
		fjs.parentNode.insertBefore(js,fjs);}
	}(document, 'script', 'twitter-wjs');
</script>
<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li><a href="{article}">Article</a></li>
			<li class="active">{title}</li>
			{/get_breadcrumb}
		</ol>
	</div>
	<div class="fb-like" data-href="{url}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
	<a href="https://twitter.com/share" class="twitter-share-button" data-text="{title}" data-via="kepoabiscom" data-hashtags="KepoAbis">Tweet</a>
</div>
<div class="col-md-8">
	<div class="blog-post">
		<h2 class="blog-post-title">{title}</h2>
		<p class="blog-post-meta">{created_date} by <a href="#">{full_name}</a></p>
		{image}
		<p>
			<i class="glyphicon glyphicon-comment"></i>&nbsp;{count_article_comment} comment | 
			<i class="glyphicon glyphicon-stats"></i>&nbsp;{count_article_stat} views
		</p>
		<p>{summary}</p>
		<p>Category : {title_category}</p>
		<nav class="text-center">
		  <ul class="pagination">
			{prev_next}
		  </ul>
		</nav>
	</div>
	<hr>
	<h2>Comments:</h2>
	<div class="comment-block">
		{get_comment}
	</div>
	<p><h2>You will comment?</h2></p>
	<div class ="msg"></div><br>
    <form id='form-comment' action="<?php echo base_url(). 'comment/ajax_'; ?>" method="post">
        <input type="hidden" class="form-control" value="<?php echo $article_id; ?>" name="article_id">
        <input type="hidden" class="form-control" value="published" name="status">
        <input type="hidden" class="form-control" value="article" name="type">
        <div class="form-group">
            <label for="name">Name* :</label>
            <input type="text" class="form-control" name="nick_name" placeholder="Your Name">
        </div>
        <div class="form-group">
            <label for="comment">Comment* :</label>
            <textarea type="text" class="form-control" name="body" placeholder="Your Comment"></textarea>
        </div>
        <!--
        <div class="form-group">
            <label for="n1"><h3>{n1}</h3></label>&nbsp;<label for="op"><h3>{op}</h3></label>&nbsp;<label for="n2"><h3>{n2}</h3></label>
            <input type="text" class="form-control" name="answer" placeholder="Your Abswer?">
        	<input type="hidden" class="form-control" value="{n1}" name="n1">
        	<input type="hidden" class="form-control" value="{op}" name="op">
        	<input type="hidden" class="form-control" value="{n2}" name="n2">
        </div>-->

        <input type="submit" id='submit' value='Submit' class="btn btn-success">

    </form>
</div>
<div class="col-md-4">
	<div class="sidebar-module">
		<h2 class="title">Recent Article</h2>
		{get_article}
		<div class="latest-post-blog">
		{image}
			<p>{title}</p>
			<span>{created_date}</span>
			<span>In {recent_article_category}</span>
		</div>
		{/get_article}
	</div>
	<div class="sidebar-module">
		<h2 class="title">Category</h2>
		<ol class="list-inline list-inline-btn">
			{get_article_category}
				{list}
			{/get_article_category}
		</ol>                 	 
	</div>
	<div class="sidebar-module">
		<h2 class="title">Tag</h2>
		{tag}                	 
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url() . 'ajax/comment.js'; ?>"></script>
