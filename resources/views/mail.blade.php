<html dir="rtl">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Student</title>
<style>
    .header{
        text-align: center;
    }
    .table {
        border-collapse: collapse !important;
        align-content: center;
    }
    .table td,
    .table th {
        padding: 1em;
        background-color: #fff !important;
        border: 1px solid #dee2e6 !important;
    }
</style>
</head>
<body>
<h1 class="header">به پوهنتون کابل خوش آمدید.</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>اسم</th>
            <th>ولد</th>
            <th>پدر کلان</th>
            <th>ایدی کانکور</th>

        </tr>
    </thead>
    <tbody>
    @foreach($student as $s)

        <tr>

            <td>{{$s->id}}</td>
            <td>{{$s->firstname}}</td>
            <td>{{$s->fathername}}</td>

            <td>{{$s->grandfathername}}</td>

            <td>{{$s->kankor_id}}</td>

        </tr>
               @endforeach
    </tbody>

</table>
</body>
</html>