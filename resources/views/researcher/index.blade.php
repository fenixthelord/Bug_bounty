@include('panel.static.header')
@include('panel.static.main')

<center>
    <br><br><br>
    <h1 style="color: #333;">Trashed Researcher</h1>
</center>

<div class="text-center">
    @if(session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif 
</div>

<div class="text-center">
    @if(session('failed')) 
        <div class="alert alert-danger">{{ session('failed') }}</div>
    @endif 
</div>

<div class="text-center">
    @if(session('error')) 
        <div class="alert alert-warning">{{ session('error') }}</div>
    @endif 
</div>

<div class="row">
    <div class="col-md-12">
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
                    <table class="table table-hover table-bordered" style="background-color: #f2f2f2;">
                        <thead class="thead-light text-center" style="background-color: #666; color: white;">
                            <tr>
                                <th scope="col"><h5>الاسم</h5></th>
                                <th scope="col"><h5>البريد الإلكتروني</h5></th>
                                <th scope="col"><h5>الهاتف</h5></th>
                                <th scope="col"><h5>الكود</h5></th>
                                <th scope="col"><h5>النقاط</h5></th>
                                <th scope="col"><h5>المعدل</h5></th>
                                <th scope="col"><h5>الإجراء</h5></th>
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
                                        <a href="{{ route('restore.researcher', ['uuid' => $researcher->uuid]) }}" class="btn btn-success btn-sm" style="background-color: #4CAF50; border-color: #4CAF50;">استعادة</a>
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