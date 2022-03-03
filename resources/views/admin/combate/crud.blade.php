@extends('layout.admin')

@section('title', 'Combates | Admin')
@section('sub_title', 'Combates')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{{ isset($combate) ? 'Edição de um combate' : 'Criar novo combate' }}</b>
                </h4>
                <p class="text-muted font-14 m-b-30">
                    Formulário para {{ isset($combate) ? 'edição de um combate' : 'criação de novo combate' }} .
                </p>

                <form id="form-combate" method="POST"
                    action=" {{ isset($combate) ? route('admin.combate.atualizar', ['id_Vacina' => $combate->id_Vacina, 'id_Doenca' => $combate->id_Doenca], compact($vacinas, $doencas)) : route('admin.combate.store') }} "
                    enctype="multipart/form-data">

                    @csrf
                    @isset($combate)
                        @method("PUT")
                    @else
                        @method("post")
                    @endisset

                    @component('admin.combate.form', ['combate' => isset($combate) ? $combate : null, 'vacinas' =>isset($vacinas) ? $vacinas : null, 'doencas' =>isset($doencas) ? $doencas : null ] )
                    @endcomponent

                </form>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" form="form-combate" class="btn btn-success mr-2">Salvar</button>
                    <a href=" {{ route('admin.combate.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
