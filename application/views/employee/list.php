<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
			<a href="/employee/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Add Employee</a>
			<br><br>
			<table class="table table-striped table-bordered">
				<thead>
				  <tr>
				    <th> Fullname </th>
				    <th> Username </th>
				    <th> Department </th>
				    <th> Job </th>
				    <th> Email </th>
				    <th class="td-actions"> Actions </th>
				  </tr>
				</thead>
				<tbody>
				<?
					foreach ($employees as $emp) {
						// $emp->username
				?>
				  <tr>
				    <td> <?=$emp->employee_firstname ." ".$emp->employee_lastname?> </td>
				    <td> <?=$emp->employee_username ?> </td>
				    <td> <?=$emp->department_name ?> </td>
				    <td> <?=$emp->employee_type ?> </td>
				    <td> <?=$emp->employee_email ?> </td>
				    <td class="td-actions"><a href="/employee/edit/<?=$emp->employee_id?>" class="btn btn-small btn-primary"><i class="btn-icon-only icon-edit"> </i></a><a href="/employee/delete/<?=$emp->employee_id?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
				  </tr>
				<? } ?>
				</tbody>
			</table>
		</div>
	  </div>
	</div>
  </div>
</div>