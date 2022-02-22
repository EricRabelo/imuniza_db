@extends('layout.admin')

@section('title', 'Pessoas | Admin')
@section('sub_title', 'Pessoas')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{{ isset($pessoa) ? 'Edição de uma pessoa' : 'Criar Nova Pessoa' }}</b>
                </h4>
                <p class="text-muted font-14 m-b-30">
                    Formulário para {{ isset($pessoa) ? 'edição de uma pessoa' : 'criação de nova pessoa' }} .
                </p>

                <form id="form-pessoa" method="POST"
                    action=" {{ isset($pessoa) ? route('admin.pessoa.update', $pessoa->cpf) : route('admin.pessoa.store') }} "
                    enctype="multipart/form-data">

                    @csrf
                    @isset($pessoa)
                        @method("PUT")
                    @else
                        @method("post")
                    @endisset

                    @component('admin.pessoa.form', ['pessoa' => isset($pessoa) ? $pessoa : null])
                    @endcomponent

                </form>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" form="form-pessoa" class="btn btn-success mr-2">Salvar</button>
                    <a href=" {{ route('admin.pessoa.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
