@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tasks</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                        <li class="breadcrumb-item active">Tasks</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-2 mb-3">
                    <a href="{{route('admin.task.create')}}" class="btn btn-block btn-primary">Add</a>
                </div>
                <div class="col-12"></div>
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th colspan="3" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->id}}</td>
                                <td>{{ $task->title}}</td>
                                <td class="text-center"><a href="{{route('admin.task.show', $task->id )}}"> <i
                                            class="fa-solid fa-eye"></i></a></td>
                                <td class="text-center"><a href="{{route('admin.task.edit', $task->id )}}"
                                       class="text-success"> <i class="fa-solid fa-pen"></i></a></td>
                                <td class="text-center">
                                    <form action="{{ route('admin.task.delete', $task->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent">
                                        <i class="fa-solid fa-trash text-danger" role="button"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
