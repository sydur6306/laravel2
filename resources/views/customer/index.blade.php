<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

	<title>Project</title>
</head>
<body>

	<div class="wrap-table log">
        <a class="btn btn-primary btn-sm" href="{{route('customer.create')}}">Add customer</a>
		<div class="class-card shadow">
			<div class="card-body">
				<h2>All data</h2>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>id</th>
								<th>name</th>
								<th>email</th>
								<th>cell</th>
								<th>uname</th>
                                <th>age</th>
								<th>Photo</th>
								<th>Action</th>
							</tr>
						</thead>


						 <tbody>
                         @foreach($all_customer as $customer)
						<tr>
							<td>{{$loop->index+1}}</td>
							<td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->cell}}</td>
                            <td>{{$customer->username}}</td>
                            <td>{{$customer->age}}</td>
							<td><img style="width:50px;height:50px;" src="../assets/photo/{{$customer->photo}}"></td>
						<td style="width:250px;">
								<a class="btn btn-sm btn-primary" href="{{route('customer.show',$customer->id)}}">View</a>
								<a class="btn btn-sm btn-info" href="{{route('customer.edit',$customer->id)}}">edit</a>
								<a class="btn btn-sm btn-warning" href="{{route('customer.delete',$customer->id)}}">delete</a>
							</td>

						 </tr>
                         @endforeach

						 </tbody>

					</table>

			</div>
		 </div>
	</div>

    <script type="text/javascript"src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>

</body>
</html>
