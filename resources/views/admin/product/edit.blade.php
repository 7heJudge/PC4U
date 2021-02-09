@extends('layouts.admin_layout')

@section('title', 'Редактировать товар')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать товар: {{ $product['title'] }}</h1>
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
                        <form action="{{ route('product.update', $product['id']) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название</label>
                                    <input type="text" value="{{ $product['title'] }}" name="title" class="form-control" id="exampleInputEmail1"
                                           placeholder="Введите название товара" required>
                                </div>
                                <div class="form-group">
                                    <label>Выберите категорию</label>
                                    <select name="cat_id" class="form-control" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}" @if($category['id'] == $product['cat_id']) selected @endif>{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea name="text" class="editor">{{ $product['text'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="feature_image">Текущее изображение</label>
                                    <img src="/{{ $product['img'] }}" alt="" class="img-uploaded db w300px">
                                    <input type="text" name="img" class="form-control" id="feature_image" value="{{ $product['img'] }}" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image">Выбрать изображение</a>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Цена</label>
                                    <input type="number" name="price" value="{{ $product['price'] }}" class="form-control" id="exampleInputEmail1"
                                           placeholder="Введите цену товара" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Количество</label>
                                    <input type="number" name="quantity" value="{{ $product['quantity'] }}" class="form-control" id="exampleInputEmail1"
                                           placeholder="Введите количество товара" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
