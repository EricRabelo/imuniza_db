@extends('layout.admin')

@section('title', 'Banners | Admin')
@section('sub_title', 'Banners')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{{ isset($banner) ? 'Edição de um Banner' : 'Criar Novo Banner' }}</b>
                </h4>
                <p class="text-muted font-14 m-b-30">
                    Formulário para {{ isset($banner) ? 'edição de um Banner' : 'criação de novo Banner' }} .
                </p>

                <form id="form-banner" method="POST"
                    action=" {{ isset($banner) ? route('admin.banner.update', $banner->id) : route('admin.banner.store') }} "
                    enctype="multipart/form-data">

                    @csrf
                    @isset($banner)
                        @method("PUT")
                    @else
                        @method("post")
                    @endisset

                    @component('admin.banner.form', ['banner' => isset($banner) ? $banner : null])
                    @endcomponent

                </form>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" form="form-banner" class="btn btn-success mr-2">Salvar</button>
                    <a href=" {{ route('admin.banner.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
