@include('panel.static.header')
@include('panel.static.main')
<div class ="app-content content">
     <div class ="content-overly"></div>
     <div class ="content-wrapper">
        <div class="content-header row"> </div>
        <div class="content-body"> </div> 
 
<!DOCTYPE html>  
<html>  
<head>  
</head> 
<style>  
        
        table {  
            border-collapse: collapse;  
            width: 50%;  
            border: 2px solid black;  
        }  
        th, td {  
            border: 1px solid black;  
            padding: 10px;  
            text-align: center;  
        } 
        body {  
            direction: rtl;  
            text-align: right; /* Optional: aligns text to the right */  
        }  
    </style>   
<body>  
    <h1>كل التقارير</h1>  
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
                    <td>{{ $report->title }}</td>  
                    <td>{{ $report->researcher->name }}</td>  
                    <td>{{ $report->product->title }}</td>  
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
</html>

