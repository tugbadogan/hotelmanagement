<div class="account-container" style="margin: 0 auto;">
	
	<div class="content clearfix">
		
		<form action="/departments/edit/<?=$department->department_id?>" method="post">
		
			<h1>Update Department's Information</h1>		
			
			<div class="add-fields">

				<div class="field">
					<label for="department_name">Department Name:</label>
					<input type="text" id="departmentName" name="departmentName" required value="<?=$department->department_name?>" placeholder="Department Name"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="department_budget">Department's Budget:</label>
					<input type="text" id="departmentBudget" name="departmentBudget" required value="<?=$department->department_budget?>" placeholder="Department Budget"/>
				</div> <!-- /password -->

			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<button class="button btn btn-success btn-large">Save</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<br>