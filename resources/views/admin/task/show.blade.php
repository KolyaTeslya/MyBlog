@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-2">{{ $task->title }}</h1>
                    <a href="{{route('admin.task.edit', $task->id )}}" class="text-success"> <i class="fa-solid fa-pen"></i></a>
                    <form action="{{ route('admin.task.delete', $task->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0 bg-transparent">
                            <i class="fa-solid fa-trash text-danger" role="button"></i>
                        </button>
                    </form>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.task.index') }}">Tasks</a></li>
                        <li class="breadcrumb-item active">{{ $task->title }}</li>
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
                <div class="col-12"></div>
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed text-nowrap">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $task->id}}</td>
                            </tr>
                            <tr>
                                <td>Название</td>
                                <td>{{ $task->title}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- ./col -->
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
