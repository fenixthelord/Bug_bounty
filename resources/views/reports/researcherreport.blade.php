@include('panel.static.header')
@include('panel.static.main')

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
                <title>قائمة الباحثين</title>

                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <style>
                    body {
                        direction: rtl;
                        text-align: right;
                        font-family: 'Arial', sans-serif;
                        background-color: #f4f4f9;
                        padding: 20px;
                    }

                    h1 {
                        text-align: center;
                        color: #333;
                        margin-bottom: 30px;
                        font-size: 24px;
                        font-weight: bold;
                    }

                    table {
                        width: 100%;
                        background-color: #f8f9fa;
                        border-radius: 10px;
                        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
                        border-collapse: collapse;
                    }

                    th, td {
                        text-align: center;
                        padding: 15px;
                        border-bottom: 1px solid #ddd;
                    }

                    th {
                        background-color: #6c757d;
                        color: white;
                        font-weight: bold;
                    }

                    td {
                        color: #333;
                    }

                    tbody tr:nth-child(odd) {
                        background-color: #e9ecef;
                    }

                    .btn-info {
                        background-color: #5a6268;
                        color: white;
                        border: none;
                        padding: 8px 16px;
                        border-radius: 5px;
                        cursor: pointer;
                        transition: background-color 0.3s ease, transform 0.2s;
                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    }

                    .btn-info:hover {
                        background-color: #495057;
                        transform: translateY(-3px);
                    }

                    .list-group-item {
                        background-color: #f1f1f1;
                        border: none;
                        padding: 10px;
                        color: #333;
                    }

                    .list-group-item a {
                        text-decoration: none;
                        color: #007bff;
                    }

                    .list-group-item a:hover {
                        text-decoration: underline;
                    }

                    .collapse {
                        margin-top: 15px;
                    }
                </style>
            </head>
            <body>
                <div class="container mt-5">
                    <h1>قائمة الباحثين</h1>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>البريد الالكتروني</th><th>النقاط</th>
                                <th>التقييم</th>
                                <th>التقارير</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($researchers as $researcher)
                            <tr>
                                <td>{{ $researcher->name }}</td>
                                <td>{{ $researcher->email }}</td>
                                <td>{{ $researcher->points }}</td>
                                <td>{{ number_format($researcher->rating, 2) }}</td>
                                <td>
                                    <button class="btn btn-danger" data-toggle="collapse" data-target="#reports-{{ $researcher->id }}">
                                        اظهار التقارير
                                    </button>
                                    <div id="reports-{{ $researcher->id }}" class="collapse">
                                        <ul class="list-group mt-2">
                                            @foreach($researcher->reports as $report)
                                            <li class="list-group-item">
                                                {{ $report->user?->name }} شاهد التقرير
                                                <a href="{{ $report->file }}" target="_blank">{{ $report->title }}</a>
                                                - {{ $report->status }} ({{ $report->created_at }})
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
            </body>
            </html>

        </div>
    </div>
</div>
