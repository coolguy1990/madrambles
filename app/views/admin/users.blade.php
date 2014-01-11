<div class="container">
	<h1>Users</h1>
	<table class="table table-striped table-bordered table-responsive">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Screen Name</th>
				<th>Email</th>
				<th>Active</th>
				<th>Last Updated</th>
				<th>Created At</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td><a href="/admin/user/{{ $user->id }}">{{ ucwords($user->first_name . ' ' . $user->last_name) }}</a></td>
					<td><a href="/admin/user/{{ $user->id }}">{{ $user->screen_name }}</a></td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->active ? 'yes' : 'no' }}</td>
					<td>{{ $user->updated_at }}</td>
					<td>{{ $user->created_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
