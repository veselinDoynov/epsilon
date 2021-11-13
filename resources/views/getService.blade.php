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
<h1> Service detail page </h1>

@if(!empty($data['errors']))
    @foreach($data['errors'] as $errorKey => $errorMessage)
        <p style="color:darkred"> {{$errorKey}}
            : {{is_array($errorMessage) ? implode(',',$errorMessage) : $errorMessage}}</p>
    @endforeach
@else
    <a href="/services" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back to listing</a>
    <!- General data -->
    <h3>General details:  <i><strong>{{$data['name']}}</strong></i></h3>
    <br/>
    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Protection</th>
            <th scope="col">Expires at</th>
            <th scope="col">Manual service</th>
            <th scope="col">Paused</th>
        </tr>
        </thead>
        <tr>
            <td>
                {{$data['id']}}
            </td>
            <td>
                {{$data['protected']}}
            </td>
            <td>
                {{$data['expires']}}
            </td>
            <td>
                {{$data['manual_service'] ? 'Yes' : 'No'}}
            </td>
            <td>
                {{$data['paused'] ? 'Yes': 'No'}}
            </td>
        </tr>
    </table>

    <!- Port data -->
    <h3>Port:  <i><strong>{{$data['port']['name']}}</strong></i></h3>
    <br/>
    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ref</th>
            <th scope="col">Data center name</th>
            <th scope="col">Speed</th>
            <th scope="col">Throughput</th>
            <th scope="col">Regions</th>
            <th scope="col">Services</th>
        </tr>
        </thead>
        <tr>
            <td>
                {{$data['port']['id']}}
            </td>
            <td>
                {{$data['port']['ref']}}
            </td>
            <td>
                {{$data['port']['datacentre_name']}}
            </td>
            <td>
                {{$data['port']['speed']}}
            </td>
            <td>
                {{$data['port']['throughput']}}
            </td>
            <td>
                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Region name</th>
                    </tr>
                    </thead>
                    @foreach($data['port']['regions'] as $region)
                        <tr><td>{{$region['name']}}</td></tr>
                    @endforeach
                </table>
            </td>
            <td>
                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Service name</th>
                    </tr>
                    </thead>
                    @foreach($data['port']['services'] as $service)
                        <tr>
                            <td>{{$service['id']}}</td>
                            <td>{{$service['name']}}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>

    <!- Statistics data -->
    <h3>Statistics: </h3>
    <br/>
    @foreach($data['statistics'] as $statisticName => $statisticData)
        <h3> {{$statisticName}} </h3>
        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Last value</th>
                <th scope="col">Last value raw</th>
            </tr>
            </thead>
            <tr>
                <td>
                    {{$statisticData['name']}}
                </td>
                <td>
                    {{$statisticData['lastvalue']}}
                </td>
                <td>
                    {{$statisticData['lastvalue_raw']}}
                </td>
            </tr>
        </table>
    @endforeach

@endif

</body>
</html>





