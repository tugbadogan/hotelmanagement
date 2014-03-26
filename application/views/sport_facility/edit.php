<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/sport_facility/edit/<?=$sport_facility->sportfacility_id?>" method="post">
		
			<h1>Update Sport Facility's Information</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="sportfacility_open_time">Sportfacility Open Time:</label>
					<input type="time" id="sportfacilityOpenTime" name="sportfacilityOpenTime" required value="<?=$sport_facility->sportfacility_open_time?>" placeholder="Sportfacility Open Time"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="sportfacility_close_time">Sportfacility Close Time:</label>
					<input type="time" id="sportfacilityCloseTime" name="sportfacilityCloseTime" required value="<?=$sport_facility->sportfacility_close_time?>" placeholder="Sportfacility Close Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="sportfacility_details">Sportfacility Details:</label>
					<textarea type="text" id="sportfacilityDetails" name="sportfacilityDetails">
<?=$sport_facility->sportfacility_details?>
					</textarea>
				</div> <!-- /password -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Save</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>