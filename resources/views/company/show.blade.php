@include('panel.static.header')
@include('panel.static.main')



<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">


<div class="row row-cols-1 row-cols-md-2 g-4 d-flex justify-content-center">


  <div class="col">
 
    <div class="card" >
      <img src="{{asset("storage/".$company->logo)}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title ">{{$company->name}}</h5>
        <p class="card-text ">{{$company->email}}</p>
        <h3>الاختصاصات</h3>
        <ul>
     
        @foreach($company->specializations as $spe)
        <li>{{$spe->title}}</li>
          @endforeach
         
        </ul>
        <h3>المنتجات</h3>
        <ul>
        @foreach($company->products as $product)
        <li>{{$product->title}}</li>
        
        @if($product->status==0)
             <li>غير مسموح به</li>
        @endif
        
         @if($product->status==1)
            <li>مسموح به</li>
            <li>
            <p>
               {{$product->trems}}
            </p>
            </li>
        @endif
        @endforeach
        </ul>
        <h3>الثغرات</h3>
        <table>
        <tr>
           <th>المنتج</th>
            <th>الثغرة</th>
            <th>الحالة</th>
         </tr>
            @foreach($company->products as $pr)           
            @foreach($pr->reports as $report)
            @if($report->status=='accept')
            <tr>
            <td>{{$report->product->title}}</td>
             <td>{{$report->title}}</td>
              <td>لم يتم الاصلاح بعد</td>
            </tr>
            @endif
             @if($report->status=='done')
            <tr>
            <td>{{$report->product->title}}</td>
             <td>{{$report->title}}</td>
              <td>تم الاصلاح</td>
            </tr>

            @endif
            @endforeach
              @endforeach
        </table>
        <a href="{{route('admin.company')}}">عودة</a>
      </div>
    </div>
 

 </div>
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