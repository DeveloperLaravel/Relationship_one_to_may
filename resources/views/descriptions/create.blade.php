@extends('layouts.mester')
@section('title')
@endsection
@section('content')
<div class="container">
<div class="row justify-content-center" style="margin-top: 70px">
    <div class="col-lg-7 margin-tb">
        <div class="pull-left">
            <h2 >اظافات وصف للاسم</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('description.index') }}"> <i class="fa fa-arrow-right"></i></a>
        </div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row mt-5">
    <div class="col-12">
<form action="{{ isset($descriptions) ? route('description.update',$descriptions->id) : route('description.store') }}" method="POST">

            <div class="form-group mt-2">
                @csrf
                @if(isset($descriptions))
                    @method('PUT')
                @endif
                <strong>الوصف:</strong>

                <input  class="form-control" type="text" name="name" value="{{isset($descriptions) ? $descriptions->name : ''}}">
            </div>
            <strong>الاسم:</strong>
                <div class="form-group mt-2">
                <select class="form-control" name="production_id" id="production_id">
                    <option>Select Category</option>
                    @foreach($productions as $production)
                        <option
                            value="{{$production->id}}"  {{isset($descriptions) ? 'selected' : ''}}>{{$production->first_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
</div>
        <div class="row mt-3">
            <div class="col-12">
                <input type="submit"  value="{{isset($descriptions) ?  'حفط تغير' : 'حفط البيانات' }}" class="btn btn-primary form-control">
        </div>
    </div>

</form>
@endsection
