@include('panel.static.header')
@include('panel.static.main')
<h1>Reports for {{ $researcher->name }}</h1>  
    <table>  
        <thead>  
            <tr>  
                <th>Title</th>  
                <th>Product</th>  
                <th>Status</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach($reports as $report)  
                <tr>  
                    <td>{{ $report->title }}</td>  
                    <td>{{ $report->product->title }}</td>  
                    <td>{{ $report->status }}</td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  


@include('panel.static.footer')