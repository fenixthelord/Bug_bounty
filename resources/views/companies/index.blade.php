@include('panel.static.header')
@include('panel.static.main')
<div class ="app-content content">
     <div class ="content-overly"></div>
     <div class ="content-wrapper">
        <div class="content-header row"> </div>
        <div class="content-body"> </div> 
 
        <!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Companies</title>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
</head>
<style>  
        body {  
            direction: rtl;  
            text-align: right; /* Optional: aligns text to the right */  
        }  
    </style  
<body>  
<div class="container mt-5">  
<h1>{{ __('كل الشركات') }}</h1>
    @foreach($companies as $company)  
        <div class="card mb-3">  
            <div class="card-body">  
                <h5 class="card-title">{{ $company->name }}</h5>  
                <p class="card-text">{{ $company->description }}</p>  
                <p class="card-text"><strong>Phone:</strong> {{ $company->phone }}</p>  
                <p class="card-text"><strong>Email:</strong> {{ $company->email }}</p>  
                <p class="card-text"><strong>Employees Count:</strong> {{ $company->employess_count }}</p>  

                <h6>Products:</h6>  
                @if($company->products->isEmpty())  
                    <p>No products available.</p>  
                @else  
                    <ul class="list-group">  
                        @foreach($company->products as $product)  
                            <li class="list-group-item">  
                                <h6>{{ $product->title }}</h6>  
                                <p>{{ $product->description }}</p>  
                                <p><strong>Status:</strong> {{ $product->status }}</p>  
                                <p><strong>Terms:</strong> {{ $product->terms }}</p> 
                                <p>{{ $product->url }}</p>  
 
                            </li>  
                        @endforeach  
                    </ul>  
                @endif  
            </div>  
        </div>  
    @endforeach  
</div>  

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>  