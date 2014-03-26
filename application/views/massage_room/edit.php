<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/massage_room/edit/<?=$massage_room->massageroom_id?>" method="post">
		
			<h1>Update Massage Room's Information</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="massageroom_open_time">Massageroom Open Time:</label>
					<input type="time" id="massageroomOpenTime" name="massageroomOpenTime" required value="<?=$massage_room->massageroom_open_time?>" placeholder="Massageroom Open Time"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="massageroom_close_time">Massageroom Open Time:</label>
					<input type="time" id="massageroomCloseTime" name="massageroomCloseTime" required value="<?=$massage_room->massageroom_close_time?>" placeholder="Massageroom Close Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="massageroom_details">Massageroom Details:</label>
					<textarea type="text" id="massageroomDetails" name="massageroomDetails">
<?=$massage_room->massageroom_details?>
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