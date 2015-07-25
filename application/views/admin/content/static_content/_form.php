<script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>
<?php if($flag == "update") { ?>
<input type="hidden" class="form-control" value="<?php echo $static_content_id; ?>" name="static_content_id">
<?php } ?>
<div class="form-group">
    <label class="col-sm-2">Title</label>
    <div class="col-sm-6">
        <?php $title = ($flag == "update") ? $title : ""; ?>
        <input type="text" class="form-control" value="<?php echo $title; ?>" name="title">
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

<div class="form-group">
    <label class="col-sm-2">Body</label>
    <div class="col-sm-6">
        <?php $body = ($flag == "update") ? $body : ""; ?>
        <textarea class="form-control" rows="3" value="<?php echo $body; ?>" name="body"><?php echo $body; ?></textarea>
    </div>
</div>