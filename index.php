<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Employee List - TopSoft Inc</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
		<style>
		</style>
	</head>
	<body>
		<div class="container" id="crudApp">
			<br/>
			<h1 align="center">TopSoft Inc.</h1>
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<h3 class="panel-title">Employees' List</h3>
						</div>
						<div class="col-md-6" align="right">
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Staff Status</th>
								<th>Designation</th>
								<th>Role</th>
                                <th>Time Spent</th>
								<th>View</th>

							</tr>
							<tr v-for="row in allData">
								<td>{{ row.Id }}</td>
								<td>{{ row.Name }}</td>
                                <td>{{ row.StaffStatus }}</td>
								<td>{{ row.Designation }}</td>
								<td>{{ row.Role }}</td>
								<td>{{ row.TimeSpent }}</td>
								<td></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<script>
var application = new Vue({
	el:'#crudApp',
	data:{
		allData: '',
	},
	methods: {
		fetchAllData:function(){
			axios.post('action.php', {
				action: 'fetchall'
			}).then(function(response){
				application.allData = response.data;
			});
		}
	},
	created: function(){
		this.fetchAllData();
	}
});
</script>