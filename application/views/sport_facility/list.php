<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
        	<a href="javascript:open_form();" class="btn btn-small btn-success"><i class="btn-icon-only icon-plus"></i>Add Sport Service</a>
			<div class="account-container" style="display: none;" id="form">
				<div class="content clearfix">
					<form action="/service/sport_facility" method="post">
					
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
								<label for="maage">Sport Facility:</label>
								<select name="sport" required>
									<? foreach ($sportFacilities as $sport) {
										echo '<option value="'.$sport->sportfacility_id.'">'.$sport->sportfacility_details.'</option>';
									 } ?>
								</select>
							</div> <!-- /restaurant -->
							
							<div class="field">
								<label for="restaurant_checkin_date">Date:</label>
								<input type="date" name="date" required value="" placeholder="Date"/>
							</div> <!-- /date -->

							<div class="field">
								<label for="details">Sport Details:</label>
								<input type="text" name="details" placeholder="Details" /> 
							</div> <!-- /field -->

							<div class="field">
								<label for="price">Total Price:</label>
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
			<a href="/sport_facility/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Add Sport Facility</a>
			<br><br>
			<table class="table table-striped table-bordered">
				<thead>
				  <tr>
				    <th> Sport Facility Opentime </th>
				    <th> Sport Facility Closetime </th>
				    <th> Sport Facility Details </th>
				    <th class="td-actions", width="100"> Actions </th>
				  </tr>
				</thead>
				<tbody>
				<?
					foreach ($sportFacilities as $sport) {
						// $emp->username
				?>
				  <tr>
				    <td> <?=$sport->sportfacility_open_time?> </td>
				    <td> <?=$sport->sportfacility_close_time?> </td>
				    <td> <?=$sport->sportfacility_details?> </td>
				    <td class="td-actions"><a href="/sport_facility/edit/<?=$sport->sportfacility_id?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-edit"> </i></a><a href="/sport_facility/delete/<?=$sport->sportfacility_id?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
				  </tr>
				<? } ?>
				</tbody>
			</table>
		</div>
	  </div>
	</div>
  </div>
</div>