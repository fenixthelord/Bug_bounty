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
<h1>Researchers</h1>  
    <table>  
        <thead>  
            <tr>  
                <th>Name</th>  
                <th>Points</th>  
                <th>Rating</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach($researchers as $researcher)  
                <tr>  
                    <td>{{ $researcher->name }}</td>  
                    <td>{{ $researcher->points }}</td>  
                    <td>{{ $researcher->rating }}</td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
