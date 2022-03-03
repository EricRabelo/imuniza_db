@extends('layout.admin')

@section('title', 'Fabricantes | Admin')
@section('sub_title', 'Fabricantes')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{{ isset($fabricante) ? 'Edição de um fabricante' : 'Criar Novo Fabricante' }}</b>
                </h4>
                <p class="text-muted font-14 m-b-30">
                    Formulário para {{ isset($fabricante) ? 'edição de um fabricante' : 'criação de novo fabricante' }} .
                </p>

                <form id="form-fabricante" method="POST"
                    action=" {{ isset($fabricante) ? route('admin.fabricante.update', $fabricante->cnpj) : route('admin.fabricante.store') }} "
                    enctype="multipart/form-data">

                    @csrf
                    @isset($fabricante)
                        @method("PUT")
                    @else
                        @method("post")
                    @endisset

                    @component('admin.fabricante.form', ['fabricante' => isset($fabricante) ? $fabricante : null])
                    @endcomponent

                </form>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" form="form-fabricante" class="btn btn-success mr-2">Salvar</button>
                    <a href=" {{ route('admin.fabricante.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
