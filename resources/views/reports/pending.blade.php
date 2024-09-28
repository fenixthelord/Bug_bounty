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
    <title>المـــدن</title>  
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
    </style>   
<body>  
<h1>Pending Reports</h1>  
    <table>  
        <thead>  
            <tr>  
                <th>Title</th>  
                <th>Researcher</th>  
                <th>Product</th>  
                <th>Status</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach($reports as $report)  
                <tr>  
                    <td>{{ $report->title }}</td>  
                    <td>{{ $report->researcher->name }}</td>  
                    <td>{{ $report->product->title }}</td>  
                    <td>{{ $report->status }}</td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  


