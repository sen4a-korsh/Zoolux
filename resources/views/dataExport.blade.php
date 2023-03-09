<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="{{asset('jquery.js')}}"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div class="container text-center mt-3">
    <form id="form" action="" method="POST">
        @csrf
        <label for="btn-export">Нажмите кнопку для экспорта</label>
        <div class="mt-2">
            <button
                type="submit"
                id="btn-export" class="btn btn-success">Export</button>
        </div>
    </form>
    <div id="result" class="mt-3">
    </div>
    </div>
</body>
</html>


<script>
    $(document).ready(function (){

        $("#form").submit( function (e){
            e.preventDefault()

            $.ajax({
                url: "{{ route('check.store') }}",
                type: 'POST',
                dataType: 'text',
                headers: {
                    'X_CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                success (data){
                    console.log(data)
                    data = JSON.parse(data)
                    $('#result').html( '<h3 class="text-success">' + data.message + '</h3>');
                },
            })
        })
    })
</script>
