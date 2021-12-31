<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Image Upload</title>
</head>

<body>
    <div class="container">
        <!-- {{$allUser}} -->
        <div class="row mt-5">
            <div class="row">
                <h3 class="text-center">Add User</h3>
                @if($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
                @endif
                @if(session()->get('success'))
                <div class="alert alert-success">
                    <div class="text-semibold">{{ session()->get('success') }}</div>
                </div>
                @endif
            </div>
        <form action="/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="text-label">Name:</label>
                <input class="form-control" type="text" name="name">
            </div>

            <div class="form-group">
                <label class="text-label">Email:</label>
                <input class="form-control" type="text" name="email">
                </label>
            </div>

            <div class="form-group">
                <label class="text-label">Password:</label>
                <input class="form-control" type="text" name="password">
                </label>
            </div>

            <div class="form-group">
                <label class="text-label">Confirm Password:</label>
                <input class="form-control" type="text" name="password_confirmation">
                </label>
            </div>

            <div class="form-group">
                <label class="text-label">Upload Iamges:</label>
                <input class="form-control " type="file" name="image">
                <input class="mt-3 btn btn-primary" type="submit" name="upload">
            </div>
        </form>
        </div>

        <div class="row mt-5">
        <div class="row">
            <h5>User List</h5>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ( $allUser as $User )
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$User->name}}</td>
            <td>{{$User->email}}</td>
            <td><img style="width:200px; height:100px;" src="{{ asset('storage/src/images/'.$User->avatar) }}" alt="" /></td>
            <td>
                <div>
                <a href="/editUser/{{$User->id}}" ><button class="btn btn-success">Edit</button></a>
                </div>
            </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</body>

</html>