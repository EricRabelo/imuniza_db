@extends('layout.admin')

@section('title', 'Contato | Admin')
@section('sub_title', 'Contato')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">

                <form id="form-contact" method="POST" action=" {{ route('admin.contact.update', 1) }} "
                    enctype="multipart/form-data">

                    @csrf
                    @method("PUT")
                    @component('admin.contact.form', ['contact' => $contact])
                    @endcomponent

                </form>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" form="form-contact" class="btn btn-success mr-2">Salvar</button>
                    <a href=" {{ route('admin.home') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection