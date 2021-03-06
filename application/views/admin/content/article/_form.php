<script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>
<input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="user_id">
<?php if($flag == "update") { ?>
<input type="hidden" class="form-control" value="<?php echo $article_id; ?>" name="article_id">
<input type="hidden" class="form-control" value="<?php echo $image_id; ?>" name="image_id">
<?php } ?>
<div class="form-group">
    <label class="col-sm-2">Title</label>
    <div class="col-sm-6">
        <?php $title = ($flag == "update") ? $title : ""; ?>
        <input type="text" class="form-control" value="<?php echo $title; ?>" name="title">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Category</label>
    <div class="col-sm-6">
        <select class="form-control" id="article_category_id" name="article_category_id">
        <?php echo $category; ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Tag</label>
    <div class="col-sm-6">
        <?php $tag = ($flag == "update") ? $tag : ""; ?>
        <input type="text" class="form-control" value="<?php echo $tag; ?>" name="tag">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Article Image</label>
    <div class="col-sm-6">
        <input type="file" name="userfile" onchange="read_image(this);">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Preview</label>
    <div class="col-sm-6">
        <?php $image = ($flag == "update") ? $image : "assets/img/article/default-image.png"; ?>
        <img id="img_prev" style="border-radius:25px; box-shadow: 10px 10px 5px #888888; max-width:95%;border:6px groove #545565;" src="<?php echo base_url() . $image;?>"  width="150" height="200"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2">Status</label>
    <div class="col-sm-6">
        <select class="form-control" id="status" name="status">
            <?php if($flag != "update" or $status == "unpublished") { ?>
            <option value="unpublished">Unpublished</option>
            <option value="pending">Pending</option>
            <option value="published">Published</option>
            <?php } else { ?>
            <?php if ($status == "published") { ?>
            <option value="published">Published</option>
            <option value="unpublished">Unpublished</option>
            <option value="pending">Pending</option>
            <?php } else { ?>
            <option value="pending">Pending</option>
            <option value="published">Published</option>
            <option value="unpublished">Unpublished</option>
            <?php } } ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Summary</label>
    <div class="col-sm-6">
        <?php $summary = ($flag == "update") ? $summary : ""; ?>
        <textarea class="form-control" rows="3" value="<?php echo $summary; ?>" name="summary"><?php echo $summary; ?></textarea>
    </div>
</div>

<!--
<div class="form-group">
    <label class="col-sm-2">File input</label>
    <div class="col-sm-6">
        <input type="file" name="userfile">
    </div>
</div>
-->