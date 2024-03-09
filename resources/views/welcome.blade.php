<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Money Exchange</title>

    
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="text-gray-400 text-center ">

    <div class="grid grid-cols-3 mt-10">
        <div class="grid grid-cols-subgrid col-span-1"> Welcome </div>
        <div class="grid grid-cols-subgrid col-span-1">Main</div>
        <div class="grid grid-cols-subgrid col-span-1">Admin</div>
    </div>

    <div class="grid grid-cols-3 mt-10">
        <div class="grid grid-cols-subgrid col-start-2">
            <table class="table-auto gap-2 justify-between">
                <thead>
                    <tr>
                        <th>MDL</th>
                        <th>EUR</th>
                        <th>GBP</th>
                        <th>RUB</th>
                        <th>RUB</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</body>

</html>
