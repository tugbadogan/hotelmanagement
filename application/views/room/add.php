<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/room/add" method="post">
		
			<h1>Add Rooms</h1>		
<? if(isset($error)) {?>
			<div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Error!</strong> <?=$error?>
            </div>
<? } ?>

			<div class="add-fields">

				<div class="field">
					<label for="room_range">Room Type:</label>
					<select id="room_type" name="room_type">
					<?
						foreach ($room_types as $k=>$rt) {
							?>
							<option value="<?=$rt->room_type?>" <? if($k==0) { echo "selected"; } ?>><?=$rt->room_type?></option>
							<?
						}
					?>
					</select>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="min_id">ID range start:</label>
					<input type="number" min="1" id="min_id" name="min_id" required value="" placeholder="-"/>
					<i icon="icon-dollar"></i>
				</div> <!-- /field -->

				<div class="field">
					<label for="max_id">ID range end:</label>
					<input type="number" min="1" id="max_id" name="max_id" value="" placeholder="-"/>
				</div> <!-- /field -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Add</button>
				
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>