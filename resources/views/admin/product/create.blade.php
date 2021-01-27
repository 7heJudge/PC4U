@extends('layouts.admin_layout')

@section('title', 'Добавить товар')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить товар</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row (main row) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('product.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                           placeholder="Введите название категории" required>
                                </div>
                                <div class="form-group">
                                    <label>Выберите категорию</label>
                                    <select name="cat_id" class="form-control" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea name="text" class="editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="feature_image">Текущая картинка</label>
                                    <img src="" alt="" class="img-uploaded db w300px">
                                    <input type="text" class="form-control" id="feature_image" name="feature_image" value="" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image">Загрузить картинку</a>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
