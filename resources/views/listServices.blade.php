<!doctype html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body class="container">
<h1> List services Page </h1>

@if(!empty($data['errors']))
    @foreach($data['errors'] as $errorKey => $errorMessage)
        <p style="color:darkred"> {{$errorKey}}
            : {{is_array($errorMessage) ? implode(',',$errorMessage) : $errorMessage}}</p>
    @endforeach
@else
    <h3>Services</h3>
    <br/>
    <table class="table table-striped table-dark table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Bandwidth</th>
            <th scope="col">Type</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        @foreach($data as $service)
            @foreach($service as $serviceEntity)
                <tr>
                    <td>{{$serviceEntity['id']}}</td>
                    <td>
                        <a class="btn btn-primary" target="_blank" href="/services/{{$serviceEntity['id']}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                            {{$serviceEntity['name']}}
                        </a>
                    </td>
                    <td>{{$serviceEntity['bandwidth']}}</td>
                    <td>{{$serviceEntity['type']}}</td>
                    <td>{{$serviceEntity['status']}}</td>
                </tr>
            @endforeach
        @endforeach
    </table>
@endif

</body>
</html>




