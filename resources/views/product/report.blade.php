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
    </style>   
<body> 
<h1>Reports for {{ $product->title }}</h1>  

@if($reports->isEmpty())  
    <p>No reports available for this product.</p>  
@else  
    <table>  
        <thead>  
            <tr>  
                <th>Title</th>  
                <th>Researcher</th>  
                <th>Status</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach($reports as $report)  
                <tr>  
                    <td>{{ $report->title }}</td>  
                    <td>{{ $report->researcher->name }}</td>  
                    <td>{{ $report->status }}</td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
@endif  
