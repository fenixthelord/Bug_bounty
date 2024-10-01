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




{{--
<div class="row row-cols-1 row-cols-md-2 g-4">


  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>

</div>
--}}






{{--
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
--}}


{{--
<div class="card mb-3">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
  <img src="..." class="card-img-bottom" alt="...">
</div>
--}}

















       </div>
    </div>
</div>
@include('panel.static.footer')
