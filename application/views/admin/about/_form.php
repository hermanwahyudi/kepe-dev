<script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>
<input type="hidden" class="form-control" value="<?php echo $setting_id; ?>" name="setting_id">
<input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="user_id">
<div class="form-group">
    <label class="col-sm-2">Title</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $title; ?>" name="title">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Tagline</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $tagline; ?>" name="tagline">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Description</label>
    <div class="col-sm-6">
        <textarea class="form-control" rows="3" value="<?php echo $description; ?>" name="description"><?php echo $description; ?></textarea>    
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Email Address First</label>
    <div class="col-sm-6">
        <input type="email" class="form-control" value="<?php echo $contact_email_address_first; ?>" name="contact_email_address_first">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Email Address Second</label>
    <div class="col-sm-6">
        <input type="email" class="form-control" value="<?php echo $contact_email_address_second; ?>" name="contact_email_address_second">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Phone</label>
    <div class="col-sm-6">
        <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="form-control" value="<?php echo $contact_phone; ?>" name="contact_phone">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Phone Mobile First</label>
    <div class="col-sm-6">
        <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="form-control" value="<?php echo $contact_phone_mobile_first; ?>" name="contact_phone_mobile_first">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Phone Mobile Second</label>
    <div class="col-sm-6">
        <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="form-control" value="<?php echo $contact_phone_mobile_second; ?>" name="contact_phone_mobile_second">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Fax</label>
    <div class="col-sm-6">
        <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="form-control" value="<?php echo $contact_fax; ?>" name="contact_fax">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Lat</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_lat; ?>" name="contact_lat">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Long</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_long; ?>" name="contact_long">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">City</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_city; ?>" name="contact_city">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">State</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_state; ?>" name="contact_state">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Zip</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_zip; ?>" name="contact_zip">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Country</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_country; ?>" name="contact_country">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Facebook</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_facebook; ?>" name="contact_facebook">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Twitter</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_twitter; ?>" name="contact_twitter">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Google Plus</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_googleplus; ?>" name="contact_googleplus">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Youtube</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_youtube; ?>" name="contact_youtube">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Instagram</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_instagram; ?>" name="contact_instagram">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Path</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_path; ?>" name="contact_path">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Logo</label>
    <div class="col-sm-6">
        <input type="file" name="userfile" onchange="read_image(this);">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2">Preview</label>
    <div class="col-sm-6">
        <img id="img_prev" style="border-radius:25px; box-shadow: 10px 10px 5px #888888; max-width:95%;border:6px groove #545565;" src="<?php echo base_url() . 'assets/img/' . $logo_name;?>"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Background Color</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $background_color; ?>" name="background_color">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Content Title</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $content_title ?>" name="content_title">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Content Body</label>
    <div class="col-sm-6">
        <textarea class="form-control" rows="3" value="<?php echo $content_body; ?>" name="content_body"><?php echo $content_body; ?></textarea>    
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Content Mission</label>
    <div class="col-sm-6">
        <textarea class="form-control" rows="3" value="<?php echo $content_mission; ?>" name="content_mission"><?php echo $content_mission; ?></textarea>    
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Address</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_address ?>" name="contact_address">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Created Year</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $created_year ?>" name="created_year">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Version</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $version; ?>" name="version">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Footer</label>
    <div class="col-sm-6">
        <textarea class="form-control" rows="3" value="<?php echo $footer; ?>" name="footer"><?php echo $footer; ?></textarea>    
    </div>
</div>

