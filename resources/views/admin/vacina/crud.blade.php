@extends('layout.admin')

@section('title', 'Vacinas | Admin')
@section('sub_title', 'Vacinas')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{{ isset($vacina) ? 'Edição de uma vacina' : 'Criar Nova Vacina' }}</b>
                </h4>
                <p class="text-muted font-14 m-b-30">
                    Formulário para {{ isset($vacina) ? 'edição de uma vacina' : 'criação de nova vacina' }} .
                </p>

                <form id="form-vacina" method="POST"
                    action=" {{ isset($vacina) ? route('admin.vacina.update', $vacina->idVacina) : route('admin.vacina.store') }} "
                    enctype="multipart/form-data">

                    @csrf
                    @isset($vacina)
                        @method("PUT")
                    @else
                        @method("post")
                    @endisset

                    @component('admin.vacina.form', ['vacina' => isset($vacina) ? $vacina : null])
                    @endcomponent

                </form>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" form="form-vacina" class="btn btn-success mr-2">Salvar</button>
                    <a href=" {{ route('admin.vacina.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
