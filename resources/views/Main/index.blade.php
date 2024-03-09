<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Weather Application</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

</head>
<body class="text-gray-400 text-center ">
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between ">
                <div class="text-lg font-medium">
                    <a href="{{ route('weather.index') }}">Weather Data</a>
                </div>
                <div class="text-xl text-blue-600 dark:text-blue-300 font-bold text-center">
                    <a href="{{ route('weather.index') }}">Main</a>
                </div>
                @if ($isAdmin)
                    <div class="flex items-center gap-4">
                        <div>
                            <a href="{{ route('filament.admin.pages.dashboard') }}">Dashboard</a>
                        </div>
                    </div>
                @else
                    <div class="flex items-center gap-4">
                        <div>
                            <a href="{{ route('filament.admin.auth.login') }}">Login</a>
                        </div>
                    </div>
                @endif
            </nav>
        </div>
    </header>
    <table class=" inputs mx-auto mt-10">
        <thead>
            <tr>
                <td>Minimum temperature:</td>
                <td>Maximum temperature:</td>
                <td>Minimum hour:</td>
                <td>Maximum hour:</td>
                <td>Minimum date:</td>
                <td >Maximum date:</td>
            </tr>
        </thead>
        <tbody>
            <td>
                <input class="form-control" type="number" id="min" name="min">
            </td>
            <td>
                <input class="form-control" type="number" id="max" name="max">
            </td>
            <td>
                <input class="form-control" type="time" id="minHour" name="minHour">
            </td>
            <td>
                <input class="form-control" type="time" id="maxHour" name="maxHour">
            </td>
            <td>
                <input class="form-control" type="date" id="minDate" name="minDate">
            </td>
            <td>
                <input class="form-control" type="date" id="maxDate" name="maxDate">
            </td>
        </tbody>
    </table>

    <div class="card-body mt-10">
        <table class="table table-bordered" id="daterange_table">
            <thead>
                <tr>
                    <th class="text-center">Capital</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Hour</th>
                    <th class="text-center">Temperature</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">

        const minEl = document.querySelector('#min');
        const maxEl = document.querySelector('#max');

        const minElHour = document.querySelector('#minHour');
        const maxElHour = document.querySelector('#maxHour');

        const minElDate = document.querySelector('#minDate');
        const maxElDate = document.querySelector('#maxDate');

        var table = $('#daterange_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('weather.index') }}",
                data : function(data) {

                    data.min = minEl.value;
                    data.max = maxEl.value;

                    data.minHour = minElHour.value;
                    data.maxHour = maxElHour.value;

                    data.minDate = minElDate.value;
                    data.maxDate = maxElDate.value;
                }
            },
            columns: [
                {data: 'capital', name: 'capital'},
                {data: 'date', name: 'date'},
                {data: 'hour', name: 'hour'},
                {data: 'temperature', name: 'temperature'},
            ]
        });

        minEl.addEventListener('input', function () {
            table.draw();
        });
        maxEl.addEventListener('input', function () {
            table.draw();
        });


        minElHour.addEventListener('input', function () {
            table.draw();
        });
        maxElHour.addEventListener('input', function () {
            table.draw();
        });


        minElDate.addEventListener('input', function () {
            table.draw();
        });
        maxElDate.addEventListener('input', function () {
            table.draw();
        });

    </script>
</body>
</html>
