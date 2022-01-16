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
<h1 class="main header">محصل گرامی شما در صنف ذیل موفقانه داخل شدید</h1>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>صنف</th>
        <th>دیپارتمنت</th>
        <th>پوهنځی</th>
        <th>تاریخ</th>

    </tr>
    </thead>
    <tbody>

        <tr>

            <td>{{$class->id}}</td>
            <td>{{$class->name}}</td>
            <td>{{$class->department->name}}</td>
            <td>{{$class->department->department->name}}</td>
            <td>{{$class->created_at}}</td>

        </tr>
    </tbody>

</table>
</body>
</html>