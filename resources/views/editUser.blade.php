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
        <div class="row mt-5">
            <div class="row">
                <h3 class="text-center">Edit User</h3>
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
        <form action="/updateUserDetails" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="text-label">Name:</label>
                <input class="form-control" type="hidden" name="id" value="{{$id}}">
                <input class="form-control" type="text" name="name" value="{{$userData->name}}">
            </div>

            <div class="form-group">
                <label class="text-label">Email:</label>
                <input class="form-control" type="text" name="email" value="{{$userData->email}}">
                </label>
            </div>

            <div class="form-group">
                <label class="text-label">New Password:</label>
                <input class="form-control" type="text" name="password">
                </label>
            </div>

            <div class="form-group">
                <label class="text-label">Confirm Password:</label>
                <input class="form-control" type="text" name="password_confirmation">
                </label>
            </div>

            <div class="form-group">
                <div>
                    <img style="width:250px; height:200px; margin-top:15px;" src="{{ asset('storage/src/images/'.$userData->avatar) }}" alt="" />
                </div>
                <label class="text-label">Upload Iamges:</label>
                <input class="form-control " type="file" name="image">
                <input class="mt-3 btn btn-primary" type="submit" name="upload">
            </div>
        </form>
        </div>

    </div>
</body>

</html>