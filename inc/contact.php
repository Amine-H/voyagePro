<?php
if(!isset($isIndex))die('');
else
{
?>
<script type="text/javascript">
	$('.top-nav .contact').addClass('active');
	function isValidEmail(email)
	{
		var part1=email.substring(0,email.indexOf('@'));
		var part2=email.substring(email.indexOf('@')+1,email.indexOf('.'));
		var part3=email.substring(email.indexOf('.')+1);

		if(part1.length<2 || part2.length<2 || part3.length<2)
			return 0;

		return 1;
	}
	function showError(msg)
	{
		alert(msg);
		return -1;
	}
	function envoyer()
	{
		var email=document.getElementById('email').value;
		if(!isValidEmail(email))
			return showError();
		else//all is cool, submit
			$('#form').submit();
	}
</script>
<form method='POST' action='contact_'>

			<div class="section group">				
				<div class="col span_1_of_3">
					<div class="contact_info">
			    	 	<h3>Trouve nous ICI</h3>
			    	 		<div class="map">
					   			<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
					   		</div>
      				</div>
      			<div class="company_address">
				     	<h3>Informations :</h3>
						<p>Adresse:<?php echo DB::getParam('adresse',$mysqlC);?></p>
				   		<p>Tel:<?php echo DB::getParam('tel',$mysqlC);?></p>
				   		<p>Email:<?php echo DB::getParam('email',$mysqlC);?></p>
				   		<p>Suivez nous sur: <a href="//<?php echo DB::getParam('fbpage',$mysqlC);?>"><span>Facebook</span></a>,<a href="//<?php echo DB::getParam('twitter',$mysqlC);?>"><span>Twitter</span></a></p>
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Contacter Nous</h3>
					    <form method="post" action="contact-post.html">
					    	<div>
						    	<span><label for='name'>NOM</label></span>
						    	<span><input name="name" id='name' type="text" class="textbox" value='<?php echo User::getFullName();?>'></span>
						    </div>
						    <div>
						    	<span><label for='email'>E-MAIL</label></span>
						    	<span><input name="email" id='email' type="text" class="textbox" value='<?php echo User::getAttrib('email',$mysqlC)?>'></span>
						    </div>
						    <div>
						    	<span><label for='message'>SUJET</label></span>
						    	<span><textarea name="message" id='message'> </textarea></span>
						    </div>
						   <div>
						   		<span><input class='button' type="button" value="Envoyer" onclick='javascript:envoyer();'></span>
						  </div>
					    </form>

				    </div>
  				</div>				
			  </div>
</form>
<?php
}
?>