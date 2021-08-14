@extends('layouts.admin')
@section('title','PERMISSIONS')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Modifier Les permissions de ce Rôle</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.users.permissions.role.update',['id'=>$role->id])}}" method="POST">
                @csrf
                <div class="col-md-12 col-sm-12 form-group has-feedback">
                    <label for="role">Rôle</label>
                    <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="inputSuccess2" placeholder="Rôle" value="{{$role->name}}">
                </div>
                <div class="col-md-12 col-sm-12 form-group has-feedback">
                    <label for="permissions" class="form-control-label">Permissions</label>
                    @foreach ($permissions as $permission)
                    <div class="form-group form-check">
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}" id="{{$permission->id}}" @if($role->permissions->pluck('id')->contains($permission->id)) checked @endif>
                        <label for="{{$permission->id}}">{{$permission->name}}</label>
                    </div>
                    @endforeach
                    @error('permissions')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-9 col-sm-9">
                    <button type="submit" class="btn btn-danger">MODIFIER</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
