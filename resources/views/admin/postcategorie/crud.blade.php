@extends('layout.admin')

@section('title', 'Categorias | Admin')
@section('sub_title', 'Categorias ')

@section('content')

<div class="wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title"><b>{{ isset($postcategorie) ? "Editar Categoria" : "Criar nova Categoria" }} .</b></h4>
                    <p class="text-muted font-14 m-b-30">
                        Formulário para {{ isset($postcategorie) ? "edição de uma Categoria" : "criação de nova Categoria" }} .
                    </p>

                    <form id="form-postcategorie" method="POST" action=" {{ isset($postcategorie) ? route("admin.postcategorie.update", $postcategorie->id) : route("admin.postcategorie.store")}} " enctype="multipart/form-data">

                        @csrf
                        @isset($postcategorie)
                        @method("PUT")
                        @else
                        @method("post")
                        @endisset

                        @component('admin.postcategorie.form', [ "postcategorie" => isset($postcategorie) ? $postcategorie : null ])
                        @endcomponent

                    </form>

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" form="form-postcategorie" class="btn btn-success mr-2">Salvar</button>
                        <a href=" {{ route('admin.postcategorie.index') }}" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

@endsection

@section('style')

@endsection