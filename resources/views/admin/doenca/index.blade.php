@extends('layout.admin')

@section('title', 'Doenças | Admin')
@section('sub_title', 'Doenças')

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
                    <h6 class="mt-3 font-weight-bold text-grey">Listagem de Doenças</h6>
                    <a href=" {{ route('admin.doenca.create') }} " class="btn btn-primary my-2">Nova Doença</a>
                </div>

                <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($doencas as $doenca)
                            <tr>
                                <td>{{ $doenca->nome }}</td>
                                <td>
                                    <!-- botao detalhes -->
                                    <button type="button" title="Detalhes da Doença" class="btn btn-primary"
                                        data-toggle="modal" data-target="#modal-detalhes" data-id="{{ $doenca->idDoenca }}"><i
                                            class="dripicons-italic"></i></button>
                                    <!-- botao editar -->
                                    <a type="button" title="Editar Doença" class="btn btn-warning"
                                        href="{{ route('admin.doenca.edit', $doenca->idDoenca) }}"><i
                                            class="dripicons-pencil"></i></a>
                                    <!-- Botao apagar -->
                                    <button type="button" title="Apagar Doença" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-excluir" data-id="{{ $doenca->idDoenca }}"><i
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
                    <h5 class="modal-title">Detalhes da Doença</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="detalhes-id">Identificação</label>
                            <input id="detalhes-id" name="detalhes-id" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="detalhes-nome">Nome</label>
                            <input id="detalhes-nome" name="detalhes-nome" class="form-control" readonly>
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
                <div class="modal-body" align="center">Tem certeza de que quer excluir essa Doença?</div>
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
                const url = 'doenca/' + id

                $.getJSON(url, (resposta) => {
                    $("#detalhes-id").val(resposta.idDoenca);
                    $("#detalhes-nome").val(resposta.nome);
                });
            })

            /* js para abrir Modal de excluir de forma dinâmica */
            $('#modal-excluir').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                const id = button.data('id')
                $('#form-excluir').attr('action', 'doenca/' + id)

            })
        });

    </script>

@endsection
