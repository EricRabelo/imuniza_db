@extends('layout.admin')

@section('title', 'Home ')
@section('sub_title', 'Dashboard ')

@section('content')

    <div class="wrapper">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-head float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Pessoas</h6>
                        <h4 class="mb-3" data-plugin="counterup">{{ $pessoas }}</h4>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-head float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Fabricantes</h6>
                        <h4 class="mb-3" data-plugin="counterup">{{ $fabricantes }}</h4>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-layers float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Vacinas</h6>
                        <h4 class="mb-3" data-plugin="counterup">{{ $vacinas }}</h4>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-layers float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Doses Disponiveis</h6>
                        <h4 class="mb-3" data-plugin="counterup">@if($doses->total != null) {{ $doses->total }}@else 0 @endif</h4>
                    </div>
                </div>
                    <!--<div class="card-box tilebox-one">
                        <i class="fi-tag float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Average Price</h6>
                        <h4 class="mb-3">$<span data-plugin="counterup">15.9</span></h4>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="fi-briefcase float-right"></i>
                        <h6 class="text-muted text-uppercase mb-3">Product Sold</h6>
                        <h4 class="mb-3" data-plugin="counterup">1,890</h4>
                    </div>
                </div>-->
            </div>


        </div> <!-- end container -->
    </div>
    
    <form class="form-consulta" id="form-consulta" action="{{ route('admin.buscar') }}" method="POST" enctype="multipart/form-data">
        <div class="consulta">
        @csrf
        <legend> Selecione os filtros de busca: </legend>
        <div class="escolhas">
            <fieldset>
            <div>
                <input type = "checkbox" id = "alfabetica" name = "alfabetica" value = "Ordem alfabetica">
                <label for = "alfabetica"> Nome </label>
            </div>
            <div>
                <input type = "checkbox" id = "data" name = "data" value = "data">
                <label for = "data"> Data </label>
            </div>
            </fieldset>
            <div class="doenca">
                <label for="id_Doenca">Doença</label>
                <select id="id_Doenca" name="id_Doenca" class="form-control">
                    <option value="">Selecione uma Doença</option>
                        @foreach ($doencas as $doenca)
                            <option
                                value="{{$doenca->idDoenca}}">{{$doenca->nome}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        
    </form>
    <button class="filtrar" type="submit">Filtrar</button>
        
    </div>
    <!-- end wrapper -->

@endsection