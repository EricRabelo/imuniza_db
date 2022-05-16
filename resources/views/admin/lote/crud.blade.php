@extends('layout.admin')

@section('title', 'Lotes | Admin')
@section('sub_title', 'Lotes')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{{ isset($lote) ? 'Edição de um lote' : 'Criar Novo Lote' }}</b>
                </h4>
                <p class="text-muted font-14 m-b-30">
                    Formulário para {{ isset($lote) ? 'edição de um lote' : 'criação de novo lote' }} .
                </p>

                <form id="form-lote" method="POST"
                    action=" {{ isset($lote) ? route('admin.lote.atualizar', ['idLote' => $lote->idLote, 'dataRecebimento' => $lote->dataRecebimento], compact($vacinas, $fabricantes)) : route('admin.lote.store') }} "
                    enctype="multipart/form-data">

                    @csrf
                    @isset($lote)
                        @method("PUT")
                    @else
                        @method("post")
                    @endisset

                    @component('admin.lote.form', ['lote' => isset($lote) ? $lote : null, 'vacinas' =>isset($vacinas) ? $vacinas : null, 'fabricantes' =>isset($fabricantes) ? $fabricantes : null ] )
                    @endcomponent

                </form>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" form="form-lote" class="btn btn-success mr-2">Salvar</button>
                    <a href=" {{ route('admin.lote.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
