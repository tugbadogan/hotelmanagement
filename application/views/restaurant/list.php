<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
			<a href="javascript:open_form();" class="btn btn-small btn-success"><i class="btn-icon-only icon-plus"></i>Add Restaurant Service</a>
			<div class="account-container" style="display: none;" id="form">
				<div class="content clearfix">
					<form action="/service/restaurant" method="post">
					
						<div class="add-fields">

							<div class="field">
								<label for="customer">Customer:</label>
								<select name="customer" required>
									<? foreach ($customers as $customer) {
										echo '<option value="'.$customer->customer_id.'">'.$customer->customer_firstname.' '.$customer->customer_lastname.'</option>';
									 } ?>
								</select>
							</div> <!-- /restaurant -->

							<div class="field">
								<label for="restaurant_name">Restaurant:</label>
								<select name="restaurant" required>
									<? foreach ($restaurants as $restaurant) {
										echo '<option value="'.$restaurant->restaurant_name.'">'.$restaurant->restaurant_name.'</option>';
									 } ?>
								</select>
							</div> <!-- /restaurant -->
							
							<div class="field">
								<label for="restaurant_checkin_date">Date:</label>
								<input type="date" name="date" required value="" placeholder="Date"/>
							</div> <!-- /date -->

							<div class="field">
								<label for="restaurant_details">Table Number:</label>
								<input type="text" name="table_num" placeholder="Table Number" /> 
							</div> <!-- /field -->

							<div class="field">
								<label for="table_count">Total Price:</label>
								<input type="text" name="price" required value="" placeholder="Total Price"/> 
							</div> <!-- /field -->

						</div> <!-- /login-fields -->
						
						<div class="login-actions">
							
							<button class="button btn btn-success btn-large">Add</button>
							
						</div> <!-- .actions -->
						
						
						
					</form>
				</div>
			</div>
			<hr>
			<a href="/restaurant/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Add Restaurants</a>
			<br><br>
			<table class="table table-striped table-bordered">
				<thead>
				  <tr>
				    <th> Restuarant name </th>
				    <th> Restaurant Opentime </th>
				    <th> Restaurant Closetime </th>
				    <th> Restaurant Details </th>
				    <th> Table Count </th>
				    <th class="td-actions", width="100"> Actions </th>
				  </tr>
				</thead>
				<tbody>
				<?
					foreach ($restaurants as $rest) {
						// $emp->username
				?>
				  <tr>
				    <td> <?=$rest->restaurant_name?> </td>
				    <td> <?=$rest->restaurant_open_time?> </td>
				    <td> <?=$rest->restaurant_close_time?> </td>
				    <td> <?=$rest->restaurant_details?> </td>
				    <td> <?=$rest->table_count?> </td>
				    <td class="td-actions"><a href="/restaurant/edit/<?=$rest->restaurant_name?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-edit"> </i></a><a href="/restaurant/delete/<?=$rest->restaurant_name?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
				  </tr>
				<? } ?>
				</tbody>
			</table>
		</div>
	  </div>
	</div>
  </div>
</div>