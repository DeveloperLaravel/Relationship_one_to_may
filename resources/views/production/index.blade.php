@extends('layouts.mester')
@section('title')
@endsection
@section('content')
<div class="container mt-5">
<div class="row justify-content-center">
    <h4 class=" text-center">طريقه الاساسيه التعامل مع الجداول</h4>
    <div class="container">
    <div class="row justify-content-around">
    <div class="col-7 margin-tb">
            <a class="btn btn-info" href="{{ route('production.create') }}"> اظافات اسم جديد</a>
        </div>
        <div class="col-3">
            <a class="btn btn-warning" href="{{ route('description.index') }}"> <i class="fa fa-arrow-left " aria-hidden="true"></i></a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success mt-2">
        <p>{{ $message }}</p>
    </div>
@endif
<table style="margin-top: 20px" class="table table-bordered  text-center">
    <tr>
        <th width="15%">رقم التسلسلي</th>
        <th>الاسم</th>
        <th>عرض</th>
        <th >تعديل</th>
        <th >حذف</th>
    </tr>

    @foreach ($productions as $x)
    <tr>
        <td> {{++$i}}</td>
        <td>{{ $x->first_name }}</td>
        <td>
            <a  href="{{ route('production.show',$x->id) }}"><i class="fa fa-eye fa-1x text-success"></i></a>
        </td>
        <td>
            <a class="" href="{{ route('production.edit',$x->id) }}"><i class="fa fa-edit fa-1x text-warning"></i></a>
        </td>
        <td>
            <form action="{{ route('production.destroy',$x->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" style="border: none; background:none"><i class="fa fa-trash text-danger fa-1x"></i>
            </form>
        </td>
    </tr>
    @endforeach
</table>

    </div>
</div>
</div>

@endsection

