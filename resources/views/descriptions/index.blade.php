@extends('layouts.mester')
@section('title')
@endsection
@section('content')
<div class="container mt-5">
<div class="row justify-content-center">
    <h4 class=" text-center">طريقه الاساسيه العلاقات بين الجداول</h4>
    <div class="container">
        <div class="row justify-content-around">
        <div class="col-7 margin-tb">
            <a class="btn btn-warning" href="{{ route('production.index') }}"> <i class="fa fa-arrow-right " aria-hidden="true"></i></a>

            </div>
            <div class="col-3">
                <a class="btn btn-info" href="{{ route('description.create') }}"> اظافات اسم جديد</a>
            </div>
        </div>
    </div>
    <div class="col-7 mt-2" style="margin-left: 150px">
        <div class="pull-right">

        </div>

@if ($message = Session::get('success'))
    <div class="alert alert-success text-center">
        <p>{{ $message }}</p>
    </div>
@endif
    </div>
<table style="margin-top: 70px" class="table table-bordered  text-center">
    <tr>
        <th width="15%">رقم التسلسلي</th>
        <th>الاسم</th>
        <th>الوصف</th>
        <th >تعديل</th>
        <th >حذف</th>
    </tr>
<?php $i=1 ?>
    @foreach ($descriptions as $x)
    <tr>
        <td><?php echo $i++?> </td>
        <td>{{ $x->production->first_name }}</td>
        <td>{{ $x->name }}</td>

        <td>
            <a class="" href="{{ route('description.edit',$x->id) }}"><i class="fa fa-edit fa-1x text-warning"></i></a>
        </td>
        <td>
            <form action="{{ route('description.destroy',$x->id) }}" method="POST">
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

