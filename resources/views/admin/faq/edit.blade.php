@extends('admin.layout')
@section('content')
<style>

.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
.btn-default {
    background: #ffffff !important;
    color: #4b5359 !important;
    border: 1px solid #a2a2a2 !important;
    font-size: 1.1em !important;
}
.btn-default:hover {
    background: #002a53 !important;
    color: #ffffff !important;
   
}

    </style>
          <div class="parts form">
	<div class="main-card mb-3 card">
		<div class="card-body">
			<h5 class="card-title">{{__('Faq.Edit_Faq')}}</h5>

            @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif      
    {!! Form::open(['method'=>'patch','action'=>['Admin\FaqController@update',$data->id],'files'=>true]) !!}
    <div class="row">
					<div class="col-md">                    
                    <div class="position-relative row form-group">
                        <label for="name" class="col-sm-2 col-form-label">{{__('Faq.question_ar')}} *</label>
                        <div class="col-sm-10">
                            {!! Form::text('question_ar',$data->question_ar,['class'=>'form-control','placeholder'=>__('Faq.question_ar')]) !!}
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="name" class="col-sm-2 col-form-label">{{__('Faq.question_en')}} *</label>
                        <div class="col-sm-10">
                            {!! Form::text('question_en',$data->question_en,['class'=>'form-control','placeholder'=>__('Faq.question_en')]) !!}
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="name" class="col-sm-2 col-form-label">{{__('Faq.answer_ar')}} *</label>
                        <div class="col-sm-10">
                            {!! Form::textarea('answer_ar',$data->answer_ar,['class'=>'form-control','placeholder'=>__('Faq.answer_ar')]) !!}
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="name" class="col-sm-2 col-form-label">{{__('Faq.answer_en')}} *</label>
                        <div class="col-sm-10">
                            {!! Form::textarea('answer_en',$data->answer_en,['class'=>'form-control','placeholder'=>__('Faq.answer_en')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-12 offset-sm-2">
                        {!! Form::submit(__('General.Save'),['class'=>'btn btn-primary form-control']) !!}
                        </div>
      
    {!! Form::Close() !!}

   
            </div>
        </div>
    </div>
@endsection