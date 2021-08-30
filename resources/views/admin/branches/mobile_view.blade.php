@extends('admin.layout_mobile')
@section('content')


    <div class="row">
        @forelse ($branches as $key => $branch)
            <div class="col-md-6 col-sm-12">
                <div class="card" style="width: 70%; margin: auto;margin-bottom: 1em;">
                    <div class="card-body text-center">
                        <h5 class="card-title text-center">{{ $branch->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $branch->restorant->name }}</h6>
                        {{-- <p class="card-text">{{ $branch->description }}</p> --}}
                        <a href="{{ url('/admin/branches/' . $branch->id) }}" class="btn btn-primary">مشاهدة الفرع</a>
                        <a href="{{ route('branches.ordersCategory',$branch->id) }}" class="btn btn-primary">الطلبات</a>
                    </div>
                </div>
            </div>
        @empty

        @endforelse


    </div>
@endsection
