
			<div class="col-md-12">
				<div>
					<ol class="breadcrumb">
					  {get_breadcrumb}
					  <li><a href="{home}">Beranda</a></li>
					  <li class="active">Kontak</li>
					  {/get_breadcrumb}
					</ol>
				</div>
			</div>
                    	<div class="col-md-4">
                        	<h2 class="title">Contact Info</h2>
                            <div style="padding: 5px; background-color: #ddd;">
								<div id="googleMap" style="width:100%;height:310px; border: 1px solid #fff;"></div>
							</div>
							<br>
							{contact_footer}                     
                        </div>
                    	<div class="col-md-8">
                        	<h2 class="title">Get In Touch</h2>
							<form class="bs-example bs-example-form" role="form">
							<div class="input-group">
							  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							  <input type="text" class="form-control" placeholder="Name" value="" name="name">
							</div>
							<br>
							<div class="input-group">
							  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span></span>
							 <input type="text" class="form-control"  placeholder="Email" value="" name="email" >
							</div>
							<br>
							<div class="input-group">
							  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							 <input type="text" class="form-control"  placeholder="Subject" value="" name="subject" >
							</div>
							<br>
							<div class="input-group">
							  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
								<textarea class="form-control" placeholder="Message" id="message" name="message"></textarea>
							</div>
							<br>
							<div class="clear"></div>
                                        <input type="reset" value="CLEAR" class="btn btn-primary">
                                        <input type="submit" value="SEND" class="btn btn-primary">
                                        <div class="clear"></div>
						  </form>
                        </div>                	
        </div>