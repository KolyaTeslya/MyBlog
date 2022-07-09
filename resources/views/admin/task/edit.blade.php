@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit task</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main page</a></li>
                            <li class="breadcrumb-item active">Edit task</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.task.update',  $task->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Name task"
                                       value="{{ $task->title }}"
                                >
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">
                                    {{ $task->content }}
                                </textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Тэги</label>
                                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги"
                                            style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option {{ is_array( $task->tags->pluck('id')->toArray() ) && in_array($tag->id, $task->tags->pluck('id')->toArray()) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>
@endsection
