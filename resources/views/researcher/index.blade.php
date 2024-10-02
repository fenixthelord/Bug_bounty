
<div class="text-center">
    @if(session('success')) 
        <div class="alert alert-success">
            <h4>{{ session('success') }}</h4>
        </div>  
    @endif 
</div>

<div class="text-center">
    @if(session('failed')) 
        <div class="alert alert-danger">
            <h4>{{ session('failed') }}</h4>
        </div>  
    @endif 
</div>

<div class="text-center">
    @if(session('error')) 
        <div class="alert alert-warning">
            <h4>{{ session('error') }}</h4> 
        </div> 
    @endif 
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row"></div>
                <div class="content-body">
                    <table class="table table-striped table-bordered" style="background-color: #f9f9f9;">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col"><h4>الاسم</h4></th>
                                <th scope="col"><h4>البريد الإلكتروني</h4></th>
                                <th scope="col"><h4>الهاتف</h4></th>
                                <th scope="col"><h4>الكود</h4></th>
                                <th scope="col"><h4>النقاط</h4></th>
                                <th scope="col"><h4>المعدل</h4></th>
                                <th scope="col"><h4>الإجراء</h4></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($researchers as $researcher)
                                <tr>
                                    <td>{{ $researcher->name }}</td>
                                    <td>{{ $researcher->email }}</td>
                                    <td>{{ $researcher->phone }}</td>
                                    <td>{{ $researcher->code }}</td>
                                    <td>{{ $researcher->points }}</td>
                                    <td>{{ $researcher->reports_count > 0 ? intval($researcher->points / $researcher->reports_count) : 0 }}</td>
                                    <td>
                                        <a href="{{ route('restore.researcher', ['uuid' => $researcher->uuid]) }}" class="btn btn-success btn-sm">استعادة</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('panel.static.footer')
