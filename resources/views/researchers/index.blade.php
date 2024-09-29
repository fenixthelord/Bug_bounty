 <!-- @include('panel.static.header')
@include('panel.static.main')
<div class ="app-content content">
     <div class ="content-overly"></div>
     <div class ="content-wrapper">
        <div class="content-header row"> </div>
        <div class="content-body"> </div> 
 

<!DOCTYPE html>  
<html>  
<head> 
     
    <title>Researchers List</title>  
    <!-- Include Bootstrap CSS -->  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  

    <style>  
        body {  
            direction: rtl;  
            text-align: right; /* Optional: aligns text to the right */  
        }  
    </style
    <body>  
    <div class="container mt-5">  
        <h1>قائمة الباحثين</h1>  

        <table class="table table-bordered">  
            <thead>  
                <tr>  
                    <th>الاسم</th>  
                    <th>البريد الالكتروني</th>  
                    <th>النقاط</th>  
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
                            <button class="btn btn-info" data-toggle="collapse" data-target="#reports-{{ $researcher->id }}">  
                                اظهار التقارير  
                            </button>  
                            <div id="reports-{{ $researcher->id }}" class="collapse">  
                                <ul class="list-group mt-2">  
                                    @foreach($researcher->reports as $report)  
                                        <li class="list-group-item">  
                                            {{ $report->title }} - {{ $report->status }} ({{ $report->created_at }})  
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

    <!-- Include jQuery and Bootstrap JS for collapse functionality -->  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html> -->