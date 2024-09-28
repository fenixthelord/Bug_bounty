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
    <h1>All Reports</h1>  
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
                    <td>  
                        <form action="{{ route('reports.update-status', $report->uuid) }}" method="POST">  
                            @csrf  
                            <select name="status">  
                                <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Pending</option>  
                                <option value="accept" {{ $report->status == 'accept' ? 'selected' : '' }}>Accept</option>  
                                <option value="reject" {{ $report->status == 'reject' ? 'selected' : '' }}>Reject</option>  
                            </select>  
                            <button type="submit">Update</button>  
                        </form>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
     

    </table>  
</html>

