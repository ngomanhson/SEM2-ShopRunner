@extends('admin.layout.master')
@section('title','Role')
@section('body')
    <main role="main" class="main-content">
        <div id="content" class="container-fluid">
            @if(session('status'))
                <div class="alert alert-success" role="alert">{{session('status')}}</div>
            @endif
            <div class="card">
                <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                    <h5 class="m-0 ">ROLE LIST</h5>
                    <div class="form-search form-inline">
                        <form action="#">
                            <input type="" class="form-control form-search" placeholder="Search...">
                            <input type="submit" name="btn-search" value="Search" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                @php

                @endphp
                <div class="card-body">
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" id="">
                            <option>--Select--</option>
                            <option>Task 1</option>
                            <option>Task 2</option>
                        </select>
                        <input type="submit" name="btn-search" value="Apply" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                        <tr>
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date created</th>
                            <th scope="col">Task</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $i=1;
                        @endphp
                        @forelse ($roles as $role)
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td scope="row">{{$i++}}</td>
                                <td><a href="{{route('role.edit',$role->id)}}">{{$role->name}}</a></td>
                                <td>{{$role->description}}</td>
                                <td>{{$role->created_at}}</td>
                                <td>
                                    <a href="{{route('role.edit',$role->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('role.delete',$role->id)}} " class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" onclick="return confirm('Are you sure you want to remove this permission?')" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-warning">
                                <td colspan="3"><p>Không tồn tại vai trò nào </p></td></tr>

                        @endforelse


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>

@endsection
