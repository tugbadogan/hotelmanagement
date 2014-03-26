<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/medical_service/edit/<?=$medical_service->medicalservice_id?>" method="post">
		
			<h1>Update Medical Service's Information</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="medicalservice_open_time">Medicalservice Open Time:</label>
					<input type="time" id="medicalserviceOpenTime" name="medicalserviceOpenTime" required value="<?=$medical_service->medicalservice_open_time?>" placeholder="Medicalservice Open Time"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="medicalservice_close_time">Medicaservice Open Time:</label>
					<input type="time" id="medicalserviceCloseTime" name="medicalserviceCloseTime" required value="<?=$medical_service->medicalservice_close_time?>" placeholder="Medicalservice Close Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="medicalservice_details">Medicalservice Details:</label>
					<textarea type="text" id="medicalserviceDetails" name="medicalserviceDetails">
<?=$medical_service->medicalservice_details?>
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