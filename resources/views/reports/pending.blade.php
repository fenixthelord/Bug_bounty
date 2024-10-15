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
                <title>التقارير المعلقة</title>
                <style>
                    body {
                        direction: rtl;
                        font-family: 'Arial', sans-serif;
                        background-color: #f0f0f5;
                        margin: 0;
                        padding: 20px;
                    }

                    h1 {
                        text-align: center;
                        color: #444;
                        margin-bottom: 30px;
                        font-size: 24px;
                        font-weight: bold;
                    }

                    table {
                        width: 80%;
                        margin: auto;
                        border-collapse: collapse;
                        background-color: #fff;
                        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
                        border-radius: 8px;
                        overflow: hidden;
                        direction: rtl;
                    }

                    th, td {
                        padding: 15px;
                        text-align: center;
                        border-bottom: 1px solid #ddd;
                    }

                    th {
                        background-color: #5A6268;
                        color: white;
                        font-weight: bold;
                    }

                    td {
                        color: #333;
                    }

                    tbody tr:nth-child(odd) {
                        background-color: #f9f9f9;
                    }

                    td, th {
                        font-size: 16px;
                    }

                    table {
                        margin-bottom: 50px;
                    }

                    .btn {
                        padding: 10px 20px;
                        font-size: 14px;
                        color: #fff;
                        background-color: #28a745;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                        transition: background-color 0.3s ease, transform 0.2s;
                    }

                    .btn:hover {
                        background-color: #218838;
                        transform: scale(1.05);
                    }
                </style>
            </head>
            <body>
                <h1>التقارير المعلقة</h1>
                <table>
                    <thead>
                        <tr>
                            <th>العنوان</th>
                            <th>الباحث</th>
                            <th>المنتج</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                        <tr>
                            <td>{{ $report?->title ?? 'لا يوجد تقرير' }}</td>
                            <td>{{ $report?->researcher->name ?? 'لا يوجد باحث للتقرير' }}</td>
                            <td>{{ $report?->product->title ?? 'لا يوجد منتج' }}</td>
                            <td>{{ $report?->status ?? 'لا توجد حالة للتقرير' }}</td>
                        </tr>
                        @endforeach
                    </tbody></table>
            </body>
            </html>

        </div>
    </div>
</div>
@include('panel.static.footer')