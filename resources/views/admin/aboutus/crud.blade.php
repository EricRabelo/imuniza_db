@extends('layout.admin')

@section('title', 'Sobre Nós | Admin')
@section('sub_title', 'Sobre Nós')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">

                <form id="form-aboutus" method="POST" action=" {{ route('admin.aboutus.update', 1) }} "
                    enctype="multipart/form-data">

                    @csrf
                    @method("PUT")
                    @component('admin.aboutus.form', ['about' => $about])
                    @endcomponent

                </form>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" form="form-aboutus" class="btn btn-success mr-2">Salvar</button>
                    <a href=" {{ route('admin.home') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>

@endsection
