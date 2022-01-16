<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .main{
            text-align: center;
            font-variant: oldstyle-nums;
            font-style: inherit;
        }
        .table {

            border-collapse: collapse !important;
            align-content: center;
            width: 100%;
        }
        .table td,
        .table th {
            text-align: center;
            padding: 1em;
            background-color: #fff !important;
            border: 1px solid #dee2e6 !important;

        }
        body{


        }


    </style>

</head>
<body>
<h1 class="main header">محصل جدید به سیستم وارد شد</h1>

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

        <tr>

            <td>{{$student->id}}</td>
            <td>{{$student->firstname}}</td>
            <td>{{$student->fathername}}</td>

            <td>{{$student->grandfathername}}</td>

            <td>{{$student->kankor_id}}</td>

        </tr>
    </tbody>

</table>
</body>
</html>