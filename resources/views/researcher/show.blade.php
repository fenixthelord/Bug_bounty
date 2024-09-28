
@include('panel.static.header')
@include('panel.static.main')
<center>
<br><br><br>
<h1> Researcher 
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
              <th>name</th>
               <th>email</th>
               <th>phone</th>
          
               <th>rate</th>
               <th>points</th>
               <th></th>
                <th></th>
                <th></th>

              
              </tr> 
                    </thead>
                    <tbody>
                   
            @foreach($researchers as $researcher)
              <tr>
               <td>{{ $researcher->name }}</td>
               <td>{{ $researcher->email }}</td>
               <td>{{ $researcher->phone }}</td>
               <td>{{ $researcher->reports_count > 0 ? intval($researcher->points/$researcher->reports_count):0 }}</td>
               <td>{{ $researcher->points }}</td>
          <td><a href="{{ route('trashed.researcher', $researcher->uuid) }}"   style="color: red ;" class="btn btn-update" >Trashed Data</a></td>         
             <td> <div style="display: inline-block; margin-right:2px;"> 
                <a href="{{route('edit.researcher',$researcher->uuid)}}" id="edit">Edit</a> 
                 <span class="icon" onclick="edit()"><i class="fas fa-edit"></i></span> 
            </div> </td> 

           <td> <div style="display: inline-block;"> 
                <form action="{{ route('destroy.researcher',$researcher->uuid)}}" 

method="get" style="display: inline;"> 
                    @csrf 
                    <input type="hidden" name="id" value="{{$researcher->id}}"> 
                    <button type="submit" id="delete" style="background: none; border: none; color: rgb(161, 17, 17); cursor: pointer;">Delete</button> 
                </form> 
                <span class="icon" onclick="deleteRow()"><i class="fas fa-trash"></i></span> 
            </div></td> 

            
              
             
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