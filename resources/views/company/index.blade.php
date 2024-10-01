@include('panel.static.header')
@include('panel.static.main')



<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">







<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <form class="d-flex" role="search" method="get" action="{{route('admin.company.search')}}">
    @csrf
      <input class="form-control me-2" type="search" placeholder="بحث" aria-label="Search" name="company">
      <button class="btn btn-outline-danger" type="submit">بحث</button>
    </form>
  </div>
</nav>







<div class="row row-cols-1 row-cols-md-2 g-4 d-flex justify-content-center">

@foreach($comapnies as $company)
<div class="row row-cols-1 row-cols-md-2 g-4 mt-4">
  <div class="col">
    <div class="card border-danger" >
      <img src="{{asset("storage/".$company->logo)}}" class="card-img-top" alt="...">
      <div class="card-body text-danger">
        <h5 class="card-title text-center">{{$company->name}}</h5>
        <p class="card-text text-center">{{$company->email}}</p>
        <a href="{{route('admin.company.show',$company->name)}}" class="btn btn-primary stretched-link text-center">اقرأ المزيد</a>
      </div>
    </div>
  </div>

  </div>
    @endforeach
</div>



       </div>
    </div>
</div>
@include('panel.static.footer')
