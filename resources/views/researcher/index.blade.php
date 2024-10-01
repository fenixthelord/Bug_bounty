
@include('panel.static.header')
@include('panel.static.main')
<center>
<br><br><br>
<h1> Trashed Researcher 
</h1>
</center>


<div class=text-center>@if(session('success')) <h4>{{session('success')}}</h4>  @endif </div>

<div class=text-center>@if(session('failed')) <h4>{{session('failed')}}</h4>  @endif </div>


<div class=text-center>@if(session('error')) <h4>{{session('error')}}</h4> @endif </div>

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
        <center>
        <div class="app-content content">
        <div class="content-overly" ></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
        
              
                <table class="table" border = "1" >
                    <thead>
                        <tr>
                        <th scope="col"><h3>name   </h3> </th>
                            <th scope="col"><h3> email </h3></th>
                            <th scope="col"><h3> phone </h3></th>
                            <th scope="col"><h3> code </h3></th>
                            <th scope="col"><h3> points </h3></th>
                            <th scope="col"><h3> rate </h3></th>
                            <th scope="col">  </th>
                           
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($researchers as $researcher)
                        <tr>
                        <td>&nbsp;  &nbsp;{{$researcher->name}}</td>
                        <td>&nbsp; &nbsp; {{$researcher->email}} </td>
                        <td>&nbsp;  &nbsp;{{$researcher->phone}}</td>
                        <td>&nbsp;  &nbsp;{{$researcher->code}}</td>
                        <td>&nbsp;  &nbsp;{{$researcher->points}}</td>

                        <td>{{ $researcher->reports_count > 0 ? intval($researcher->points/$researcher->reports_count):0 }}</td>
                        
                       <td>
                            &nbsp;  &nbsp; &nbsp;  <a href="{{ route('restore.researcher',['uuid'=>$researcher->uuid]) }}" class="button">Restore </a> &nbsp;  &nbsp;  &nbsp; </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
</center>
            </div>
        </div>
    </div>
</div>


    </div>
</div>


</html>
@include('panel.static.footer')