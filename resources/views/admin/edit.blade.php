<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

</head>

<body>
    <form action="" method="post"></form>
    <div class="card">
        <div class="card-body">
            <div class="form group">
            <input type="text" name="editname" value="{{$category->name}}">
        </div>
           
            <div class="form-group">
                <select class="form-select form-select-lg" name="editstatus"
                    id="exampleFormControlSelect2">
                    <option>avialiable</option>
                    <option>out of stock</option>
                    <option>awaiting restock</option>

                </select>
            </div>


<button class="btn btn-md btn-secondary" >add</button>
           
        </div>
    </div>
</body>

</html>
