<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/restaurant/edit/<?=$restaurant->restaurant_name?>" method="post">
		
			<h1>Update Restaurant's Information</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="restaurant_name">Restaurant Name:</label>
					<input type="text" id="restaurantName" name="restaurantName" required value="<?=$restaurant->restaurant_name?>" placeholder="Restaurant Name"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="restaurant_open_time">Restaurant Open Time:</label>
					<input type="time" id="restaurantOpenTime" name="restaurantOpenTime" required value="<?=$restaurant->restaurant_open_time?>" placeholder="Restaurant Open Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="restaurant_close_time">Restaurant CLose Time:</label>
					<input type="time" id="restaurantCloseTime" name="restaurantCloseTime" required value="<?=$restaurant->restaurant_close_time?>" placeholder="Restaurant Close Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="restaurant_details">Restaurant Details:</label>
					<textarea type="text" id="restaurantDetails" name="restaurantDetails" required placeholder="restaurant Details">
<?=$restaurant->restaurant_details?>
					</textarea>
				</div> <!-- /password -->

				<div class="field">
					<label for="table_count">Table Count:</label>
					<input type="text" id="tableCount" name="tableCount" required value="<?=$restaurant->table_count?>" placeholder="Table Count"/>
				</div> <!-- /password -->
				

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Save</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>