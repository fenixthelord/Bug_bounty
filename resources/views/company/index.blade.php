@include('panel.static.header')
@include('panel.static.main')

<!-- BEGIN: Content-->

<div class="text-center">
    @if(session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif 
</div>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">

            <nav class="navbar" style="background-color: #f1f1f1; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                <div class="container-fluid">
                    <form class="d-flex" role="search" method="get" action="{{ route('admin.company.search') }}" onsubmit="return validateSearch();">
                        @csrf
                        <div class="input-group" style="max-width: 400px;">
                            <input class="form-control" type="search" placeholder="بحث عن شركة" aria-label="Search" name="company" value="{{ request('company') }}" style="border-radius: 20px; border: 1px solid #ced4da;" id="searchInput">
                            <button class="btn btn-outline-danger btn-sm" type="submit" style="border-radius: 20px; padding: 8px 15px;">بحث</button>
                        </div>
                    </form>
                </div>
            </nav>

            @if(isset($notFound) && $notFound)
                <div class="alert alert-danger mt-3" style="border-radius: 8px; max-width: 400px; margin: 0 auto; text-align: center;">
                    <strong>عذراً!</strong> لا توجد شركات مطابقة للبحث عن "<strong>{{ $searchQuery }}</strong>".
                </div>
            @endif

            <div class="row row-cols-1 row-cols-md-2 g-4 d-flex justify-content-center mt-4">

                @foreach($companies as $company)
                    <div class="col">
                        <div class="card border-light shadow-sm" style="background-color: #e0e0e0; border-radius: 12px;">
                            <img src="{{ asset('storage/'.$company->logo) }}" class="card-img-top" alt="Logo of {{ $company->name }}">
                            <div class="card-body text-dark">
                                <h5 class="card-title text-center">{{ $company->name ?? 'لا توجد بيانات' }}</h5>
                                <p class="card-text text-center">{{ $company->email ?? 'لا توجد بيانات' }}</p>

                                <a href="{{ route('admin.company.show', $company->name) }}" class="btn btn-outline-danger btn-sm stretched-link text-center" style="padding: 10px 15px; border-radius: 20px;">اقرأ المزيد</a>
                            </div>  
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@include('panel.static.footer')

<script>
    function validateSearch() {
        var input = document.getElementById("searchInput").value;
        if (input.trim() === "") {
            alert("يرجى ملء حقل البحث!");
            return false;
        }
        return true;
    }
</script>