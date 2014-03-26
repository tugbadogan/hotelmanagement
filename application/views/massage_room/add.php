<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/massage_room/add" method="post">
		
			<h1>Add Massage Room</h1>		
			
			<div class="add-fields">
				
				<div class="field">
					<label for="massageroom_open_time">Massageroom Open Time:</label>
					<input type="time" id="massageroomOpenTime" name="massageroomOpenTime" required value="" placeholder="Massageroom Open Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="massageroom_close_time">Massageroom Close Time:</label>
					<input type="time" id="massageroomCloseTime" name="massageroomCloseTime" required value="" placeholder="Massageroom Close Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="massageroom_details">Massageroom Details:</label>
					<textarea type="text" id="massageroomDetails" name="massageroomDetails" placeholder="Massageroom Details"></textarea> 
				</div> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Add</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>