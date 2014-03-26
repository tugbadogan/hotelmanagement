<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/sport_facility/add" method="post">
		
			<h1>Add Sport Facility</h1>		
			
			<div class="add-fields">
				
				<div class="field">
					<label for="sportfacility_open_time">Sport Facility Open Time:</label>
					<input type="time" id="sportfacilityOpenTime" name="sportfacilityOpenTime" required value="" placeholder="Sportfacility Open Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="sportfacility_close_time">Sport Facility Close Time:</label>
					<input type="time" id="sportfacilityCloseTime" name="sportfacilityCloseTime" required value="" placeholder="Sport Facility Close Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="sportfacility_details">Sport Facility Details:</label>
					<textarea type="text" id="sportfacilityDetails" name="sportfacilityDetails" placeholder="Sport Facility Details"></textarea> 
				</div> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Add</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>