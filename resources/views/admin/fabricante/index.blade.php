@extends('layout.admin')

@section('title', 'Fabricantes | Admin')
@section('sub_title', 'Fabricantes')

@section('style')

    <!-- DataTables -->
    <link href="{{ asset('assets/sistema/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/sistema/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable -->
    <link href="{{ asset('assets/sistema/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div style="display: flex;justify-content: space-between" class="card-header py-2 mb-3">
                    <h6 class="mt-3 font-weight-bold text-grey">Listagem de Fabricantes</h6>
                    <a href=" {{ route('admin.fabricante.create') }} " class="btn btn-primary my-2">Novo Fabricante</a>
                </div>

                <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>CNPJ</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($fabricantes as $fabricante)
                            <tr>
                                <td>{{ $fabricante->cnpj }}</td>
                                <td>{{ $fabricante->razaoSocial }}</td>
                                <td>
                                    <!-- botao detalhes -->
                                    <button type="button" title="Detalhes do Fabricante" class="btn btn-primary"
                                        data-toggle="modal" data-target="#modal-detalhes" data-id="{{ $fabricante->cnpj }}"><i
                                            class="dripicons-italic"></i></button>
                                    <!-- botao editar -->
                                    <a type="button" title="Editar Fabricante" class="btn btn-warning"
                                        href="{{ route('admin.fabricante.edit', $fabricante->cnpj) }}"><i
                                            class="dripicons-pencil"></i></a>
                                    <!-- Botao apagar -->
                                    <button type="button" title="Apagar Fabricante" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-excluir" data-id="{{ $fabricante->cnpj }}"><i
                                            class="dripicons-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- Modal Detalhes -->
    <div id="modal-detalhes" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalhes do Fabricante</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="detalhes-razaoSocial">Razão Social</label>
                            <input type="text" id="detalhes-razaoSocial" name="detalhes-razaoSocial" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal excluir -->
    <div id="modal-excluir" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title col-12 text-dark" id="exampleModalLabel">Confirmação</h5>
                </div>
                <div class="modal-body" align="center">Tem certeza de que quer excluir esse Fabricante?</div>
                <div class="modal-footer">
                    <form id="form-excluir" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')

                        <button type="submit" form="form-excluir" class="btn btn-danger">Excluir</button>
                    </form>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')

    <!-- Required datatable js -->
    <script src="{{ asset('assets/sistema/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/sistema/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/sistema/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/sistema/datatables/buttons.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/sistema/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/sistema/datatables/responsive.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('.datatable').DataTable({
                "language": {
                    "sProcessing": "Aguarde enquanto os dados são carregados ...",
                    "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                    "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
                    "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
                    "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                    "sInfoFiltered": "",
                    "sSearch": "Procurar",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                    }
                }
            });

            /* js para abrir Modal de Detalhes de forma dinâmica com as informações desejadas */
            $('#modal-detalhes').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                let modal = $(this)

                const id = button.data('id')
                const url = 'fabricante/' + id

                $.getJSON(url, (resposta) => {
                    $("#detalhes-razaoSocial").val(resposta.razaoSocial);
                });
            })

            /* js para abrir Modal de excluir de forma dinâmica */
            $('#modal-excluir').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                const id = button.data('id')
                $('#form-excluir').attr('action', 'fabricante/' + id)

            })
        });

    </script>

@endsection
