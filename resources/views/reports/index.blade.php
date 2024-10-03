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
                <title>التقارير</title>
                <style>
                    body {
                        direction: rtl;
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f9;
                        margin: 0;
                        padding: 20px;
                    }

                    h1 {
                        text-align: center;
                        color: #333;
                        margin-bottom: 30px;
                    }

                    table {
                        width: 80%;
                        margin: auto;
                        border-collapse: collapse;
                        background-color: #f9f9f9;
                        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
                        border-radius: 10px;
                        overflow: hidden;
                    }

                    th, td {
                        padding: 15px;
                        text-align: center;
                        border-bottom: 1px solid #ddd;
                    }

                    th {
                        background-color: #4e5d6c;
                        color: white;
                    }

                    td {
                        color: #333;
                    }

                    tbody tr:nth-child(odd) {
                        background-color: #eaeaea;
                    }

                    select {
                        padding: 5px;
                        border: 1px solid #ddd;
                        border-radius: 4px;
                    }

                    button {
                        background-color: #17a2b8;
                        color: white;
                        border: none;
                        padding: 10px 20px;
                        border-radius: 20px;
                        cursor: pointer;
                        font-weight: bold;
                        transition: background-color 0.3s ease, transform 0.2s;
                    }

                    button:hover {
                        background-color: #138496;
                        transform: scale(1.05);
                    }

                    td select, td button {
                        margin: 5px;
                    }
                </style>
            </head>
            <body>
                <h1>كل التقارير</h1>
                <table>
                    <thead>
                        <tr>
                            <th>عنوان التقرير</th>
                            <th>الباحث</th>
                            <th>المنتج</th>
                            <th>الحالة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                        <tr>
                            <td>{{ $report->title }}</td>
                            <td>{{ $report->researcher?->name ?? 'لا يوجد باحث'}}</td>
                            <td>{{ $report->product?->title ?? 'لا يجد منتج'}}</td>
                            <td>{{ $report->status }}</td>
                            <td>
                                <form action="{{ route('reports.update-status', $report->uuid) }}" method="POST">
                                    @csrf
                                    <select name="status">
                                        <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>معلق</option>
                                        <option value="accept" {{ $report->status == 'accept' ? 'selected' : '' }}>مقبول</option>
                                        <option value="reject" {{ $report->status == 'reject' ? 'selected' : '' }}>مرفوض</option>
                                    </select>
                                    <button type="submit">تحديث الحالة</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </body>
            </html>
        </div>
    </div>
</div>