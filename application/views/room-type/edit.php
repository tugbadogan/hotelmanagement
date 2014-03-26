<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/room-type/edit/<?=$room_type->room_type?>" method="post">
		
			<h1>Update Room Type</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="room_type">Room Type:</label>
					<input type="text" id="type" name="type" required value="<?=$room_type->room_type?>" placeholder="Room Type" readonly/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="room_price">Price:</label>
					<input type="number" min="1" id="price" name="price" required value="<?=$room_type->room_price?>" placeholder="Price"/>
					<i icon="icon-dollar"></i>
				</div> <!-- /field -->

				<div class="field">
					<label for="room_details">Details:</label>
					<input type="text" id="details" name="details" value="<?=$room_type->room_details?>" placeholder="Details of room"/>
				</div> <!-- /field -->

				<!--div class="field">
					<label for="room_quantity">Quantity:</label>
					<input type="number" min="1" id="quantity" name="quantity" value="<?=$room_type->room_quantity?>" placeholder="Quantity"/>
				</div--> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Save</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>
