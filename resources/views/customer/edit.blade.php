<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Project</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
</head>
<body>

<div class="wrap">
    <a class="btn btn-primary btn-sm" href="{{route('customer.index')}}">Back</a>
		<div class="card">
			<div class="card-body">
				<h2>Edit {{$edit_data->name}}'s Data</h2>
                @include('validation')
				<form action="{{route('customer.update',$edit_data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="{{$edit_data->name}}" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input value="{{$edit_data->email}}" type="text" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Cell</label>
                        <input value="{{$edit_data->cell}}" type="text" name="cell" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input value="{{$edit_data->username}}" type="text" name="uname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <input value="{{$edit_data->age}}" type="text" name="age" class="form-control">
                    </div>

                    <div class="form-group">
                        <img style="width:150px;" src="{{url('')}}/assets/photo/{{$edit_data->photo}}" alt="">
                        <label>upload a photo</label>
                        <input type="hidden" value="{{$edit_data->photo}}" name="old_photo" class="form-control">
                        <input type="file"  name="new_photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Add">
                    </div>
				</form>
			</div>
		</div>
	</div>

<script type="text/javascript"src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</body>
</html>
