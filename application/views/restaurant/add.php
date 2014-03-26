<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/restaurant/add" method="post">
		
			<h1>Add Restaurant</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="restaurant_name">Restaurant Name:</label>
					<input type="text" id="restaurantName" name="restaurantName" required value="" placeholder="Restaurant Name"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="restaurant_open_time">Restaurant Open Time:</label>
					<input type="time" id="restaurantOpenTime" name="restaurantOpenTime" required value="" placeholder="Restaurant Open Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="restaurant_close_time">Restaurant Close Time:</label>
					<input type="time" id="restaurantCloseTime" name="restaurantCloseTime" required value="" placeholder="Restaurant Close Time"/>
				</div> <!-- /password -->

				<div class="field">
					<label for="restaurant_details">Restaurant Details:</label>
					<textarea type="text" id="restaurantDetails" name="restaurantDetails" placeholder="Restaurant Details"></textarea> 
				</div> <!-- /field -->

				<div class="field">
					<label for="table_count">Table Count:</label>
					<input type="text" id="tableCount" name="tableCount" required value="" placeholder="Table Count"/> 
				</div> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Add</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>