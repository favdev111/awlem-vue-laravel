<script src="{{url('./Panel/adminAssets/jquery-3.2.1.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#faqs ul').addClass('mm-show').find('#faqsIndex').addClass('mm-active');
    });
</script>
@extends('admin.layout')
@section('content')
<div class="app-main__inner">
    <div class="main-card mb-3 card">
        <div class="card-body">
            @if(count($data))
            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('السؤال') }}</th>
                        <th>{{ __('الأجابة') }}</th>
                        <th>{{__('General.Options')}}</th>
                        <th>{{__('General.Delete')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->question}}</td>
                        <td>{{$d->answer}}</td>
                        <td>
                            <a class="fas-size-margin add-tooltip fas fa-edit" href="{{url('/admin/faq/'.$d->id.'/edit')}}"> </a>
                        </td>
                        <td>
                            {{ Form::open(['method' => 'DELETE', 'action'=>['Admin\FaqController@destroy', $d->id]]) }}
                            {{ Form::hidden('id', $d->id) }}
                            {{ Form::submit(__('General.Delete'), ['class' => 'mt-1 btn btn-primary']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            @else
            No Data Avalible
            @endif
            {{$data->links()}}
        </div>
    </div>
</div>
@endsection
