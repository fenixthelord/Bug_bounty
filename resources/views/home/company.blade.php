@include('panel.static.header')
@include('panel.static.main')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 85%;
            margin: 40px auto;
            overflow: hidden;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #495057;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #6c757d; /* رمادي داكن */
            color: white;
            font-weight: bold;
            text-align: center;
        }

        td {
            color: #343a40;
            text-align: center;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            th, td {
                padding: 10px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>الشركات</h1>
    <table>
        <thead>
            <tr>
                <th>اسم الشركة</th>
                <th>رقم الهاتف</th>
                <th>الايميل</th>
                <th>نوعها</th>
                <th>الموقع الخاص بها</th>
                <th>عدد الموظفين</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($company))
            <tr>
                <td>{{ $company->name ?? 'لا توجد بيانات' }}</td>
                <td>{{ $company->phone ?? 'لا توجد بيانات' }}</td>
                <td>{{ $company->email ?? 'لا توجد بيانات' }}</td>
                <td>{{ $company->type ?? 'لا توجد بيانات' }}</td>
                <td>{{ $company->domain ?? 'لا توجد بيانات' }}</td>
                <td>{{ $company->employess_count ?? 'لا توجد بيانات' }}</td>
            </tr>
            @else
            <tr>
                <td colspan="6">لا توجد بيانات متاحة.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

</body>
</html>

        </div>
    </div>
</div>
<!-- END: Content-->

@include('panel.static.footer')