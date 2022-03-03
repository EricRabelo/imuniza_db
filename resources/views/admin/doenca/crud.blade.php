@extends('layout.admin')

@section('title', 'Doenças | Admin')
@section('sub_title', 'Doenças')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{{ isset($doenca) ? 'Edição de uma doença' : 'Criar Nova Doença' }}</b>
                </h4>
                <p class="text-muted font-14 m-b-30">
                    Formulário para {{ isset($doenca) ? 'edição de uma doença' : 'criação de nova doença' }} .
                </p>

                <form id="form-doenca" method="POST"
                    action=" {{ isset($doenca) ? route('admin.doenca.update', $doenca->idDoenca) : route('admin.doenca.store') }} "
                    enctype="multipart/form-data">

                    @csrf
                    @isset($doenca)
                        @method("PUT")
                    @else
                        @method("post")
                    @endisset

                    @component('admin.doenca.form', ['doenca' => isset($doenca) ? $doenca : null])
                    @endcomponent

                </form>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" form="form-doenca" class="btn btn-success mr-2">Salvar</button>
                    <a href=" {{ route('admin.doenca.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
