<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/medical_service/add" method="post">
		
			<h1>Add Medical Service</h1>		
			
			<div class="add-fields">
				
				<div class="field">
					<label for="medicalservice_open_time">Medical Service Open Time:</label>
					<input type="time" id="medicalserviceOpenTime" name="medicalserviceOpenTime" required value="" placeholder="Medicalservice Open Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="medicalservice_close_time">Medical Service Close Time:</label>
					<input type="time" id="medicalserviceCloseTime" name="medicalserviceCloseTime" required value="" placeholder="Medical Service Close Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="medicalservice_details">Medical Service Details:</label>
					<textarea type="text" id="medicalserviceDetails" name="medicalserviceDetails" placeholder="Medical Service Details"></textarea> 
				</div> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Add</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>