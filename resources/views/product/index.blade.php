
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
<h1>Products</h1>  
    <table>  
        <thead>  
            <tr>  
                <th>Product Title</th>  
                <th>Actions</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach($products as $product)  
                <tr>  
                    <td>{{ $product->title }}</td>  
                    <td>  
                        <a href="{{ route('products.reports', $product->id) }}">View Reports</a>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
