@extends('layout.admin')

@section('title', 'Registros | Admin')
@section('sub_title', 'Registros')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{{ isset($registro) ? 'Edição de um registro' : 'Criar Novo Registro' }}</b>
                </h4>
                <p class="text-muted font-14 m-b-30">
                    Formulário para {{ isset($registro) ? 'edição de um registro' : 'criação de novo registro' }} .
                </p>

                <form id="form-registro" method="POST"
                    action=" {{ isset($registro) ? route('admin.registrovacinacao.atualizar', ['id_Pessoa' => $registro->id_Pessoa, 'id_Vacina' => $registro->id_Vacina, 'dataVacinacao' => $registro->dataVacinacao], compact($vacinas)) : route('admin.registrovacinacao.store') }} "
                    enctype="multipart/form-data">

                    @csrf
                    @isset($registro)
                        @method("PUT")
                    @else
                        @method("post")
                    @endisset

                    @component('admin.registrovacinacao.form', ['registro' => isset($registro) ? $registro : null, 'vacinas' =>isset($vacinas) ? $vacinas : null ] )
                    @endcomponent

                </form>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" form="form-registro" class="btn btn-success mr-2">Salvar</button>
                    <a href=" {{ route('admin.registrovacinacao.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
