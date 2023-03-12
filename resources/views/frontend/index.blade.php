<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Management Software</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <h2 class="text-center mt-4">Welcome to Management Software</h2>
    <div class="row mx-0 justify-content-center">
        <div class="col-md-12 text-center">
            <a href="{{ URL('/superadmin') }}"><button class="btn btn-primary">Super Admin Panel</button></a>
            <a href="{{ URL('/admin') }}"><button class="btn btn-primary">Admin  Panel</button></a>
            <a href="{{ URL('/digitalmarketer') }}"><button class="btn btn-primary">Digital Marketer  Panel</button></a>
            <a href="{{ URL('/contentcreator') }}"><button class="btn btn-primary">Content Creator  Panel</button></a>
            <a href="{{ URL('/backlinkmanager') }}"><button class="btn btn-primary">Backlink Manager  Panel</button></a>
        </div>
    </div>
    
</body>
</html>