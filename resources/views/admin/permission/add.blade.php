@extends('admin.layout.master')
@section('title','Permission')
@section('body')
    <main role="main" class="main-content">
    <div id="content" class="container-fluid">
        @if(session('status'))
            <div class="alert alert-success" role="alert">{{session('status')}}</div>
        @endif
        <div class="row">
            <div class="col-4">
                <div class="card">

                    <div class="card-header font-weight-bold">
                        Add Rights
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route'=>'permission.store']) !!}
{{--                        <form>--}}
                            <div class="form-group">
                                {{ Form::label('name' ,'Right Name') }}
                                {{ Form::text('name',old('name'),['class' => 'form-control','id'=>'name']) }}
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
{{--                                <label for="name">Right Name</label>--}}
{{--                                <input class="form-control" type="text" name="name" id="name">--}}
                            </div>
                            <div class="form-group">
                                {{ Form::label('slug' ,'Slug') }}
                                <small class="form-text text-muted pb-2">Example: posts.add</small>
                                {{ Form::text('slug',old('slug'),['class' => 'form-control','id'=>'slug']) }}
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
{{--                                <label for="slug">Slug</label>--}}
{{--                                <small class="form-text text-muted pb-2">Example: posts.add</small>--}}
{{--                                <input class="form-control" type="text" name="slug" id="slug">--}}
                            </div>
                            <div class="form-group">
                                {{ Form::label('description' ,'Description') }}
                                {{ Form::text('description',old('description'),['class' => 'form-control','id'=>'description','rows'=>3]) }}
{{--                                <label for="description">Describe</label>--}}
{{--                                <textarea class="form-control" type="text" name="description" id="description"> </textarea>--}}
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Authorization List
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role name</th>
                                <th scope="col">Slug</th>
                               <th scope="col">Task</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($permissions as $moduleName => $modulePermissions)
                            <tr>
                                <td scope="row"></td>
                                <td><strong>Module {{ucfirst($moduleName)}}</strong></td>
                                <td></td>
                               <td></td>
                            </tr>
                         @foreach($modulePermissions as $permission)
                            <tr>
                                <td scope="row">{{$i++}}</td>
                                <td>|---{{$permission->name}}</td>
                                <td>{{$permission->slug}}</td>
                                <td>
                                    <a href="{{route('permission.edit',$permission->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href=" {{route('permission.delete',$permission->id)}}" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" onclick="return confirm('Are you sure you want to remove this permission?')" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
{{--                                {{route('permission.delete',$permission->id)}}--}}
                            </tr>
                         @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </main>
@endsection
