@extends('layout.admin')

@section('title', 'Lotes | Admin')
@section('sub_title', 'Lotes')

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
                    <h6 class="mt-3 font-weight-bold text-grey">Listagem de Lotes @if($flag ?? '') da Vacina {{$lotes->first()->vacina()->first()->nome}}@endif</h6>
                    <a href=" {{ route('admin.lote.create') }} " class="btn btn-primary my-2">Novo Lote</a>
                </div>

                <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Lote</th>
                            <th>Vacina</th>                            
                            <th>Fabricante</th>
                            <th>Validade</th>
                            <th>Doses Disponiveis</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($lotes as $lote)
                            <tr>
                                <td>{{ $lote->idLote }}</td>
                                <td>{{ $lote->vacina()->first()->nome }}</td>                                
                                <td>{{ $lote->fabricante()->first()->razaoSocial}}</td>
                                <td>{{ $lote->dataValidadeFormatada() }}</td>
                                <td>{{ $lote->qtdDosesDisp }}</td>
                                <td>
                                    <!-- botao detalhes -->
                                    @if($flag ?? '')
                                    <button type="button" title="Detalhes do Lote" class="btn btn-primary"
                                        data-toggle="modal" data-target="#modal-detalhes" data-fabricante="{{$lote->fabricante()->first()->razaoSocial}}" data-vacina="{{$lote->vacina()->first()->nome}}" data-id="{{$lote->idLote}}/{{$lote->dataRecebimento}}"><i
                                            class="dripicons-italic"></i></button>
                                    @else
                                    <button type="button" title="Detalhes do Lote" class="btn btn-primary"
                                        data-toggle="modal" data-target="#modal-detalhes" data-fabricante="{{$lote->fabricante()->first()->razaoSocial}}" data-vacina="{{$lote->vacina()->first()->nome}}" data-id="lote/{{$lote->idLote}}/{{$lote->dataRecebimento}}"><i
                                            class="dripicons-italic"></i></button>
                                    @endif
                                    <!-- botao editar -->
                                    <a type="button" title="Editar Lote" class="btn btn-warning"
                                        href="{{ route('admin.lote.editar', ['idLote' =>$lote->idLote, 'dataRecebimento' => $lote->dataRecebimento]) }}"><i
                                            class="dripicons-pencil"></i></a>
                                    <!-- Botao apagar -->
                                    <button type="button" title="Apagar Lote" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-excluir" data-id="{{$lote->idLote}}/{{$lote->dataRecebimento}}"><i
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
                    <h5 class="modal-title">Detalhes do Lote</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="detalhes-idLote">Lote</label>
                            <input type="text" id="detalhes-idLote" name="detalhes-idLote" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="detalhes-dataRecebimento">Data de Recebimento</label>
                            <input id="detalhes-dataRecebimento" name="detalhes-dataRecebimento" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="detalhes-id_Vacina">Vacina</label>
                            <input id="detalhes-id_Vacina" name="detalhes-id_Vacina" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="detalhes-id_Fabricante">Fabricante</label>
                            <input id="detalhes-id_Fabricante" name="detalhes-id_Fabricante" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="detalhes-origem">Origem</label>
                            <input id="detalhes-origem" name="detalhes-origem" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="detalhes-dataValidade">Data de Validade</label>
                            <input id="detalhes-dataValidade" name="detalhes-dataValidade" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="detalhes-qtdDosesRec">Doses Recebidas</label>
                            <input id="detalhes-qtdDosesRec" name="detalhes-qtdDosesRec" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="detalhes-qtdDosesDisp">Doses Disponiveis</label>
                            <input id="detalhes-qtdDosesDisp" name="detalhes-qtdDosesDisp" class="form-control" readonly>
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
                <div class="modal-body" align="center">Tem certeza de que quer excluir esse Lote?</div>
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
                const vacina = button.data('vacina')
                const fabricante = button.data('fabricante')
                const url = id

                $.getJSON(url, (resposta) => {
                    $("#detalhes-idLote").val(resposta.idLote);
                    $("#detalhes-dataRecebimento").val(resposta.dataRecebimento);
                    $("#detalhes-id_Vacina").val(vacina);
                    $("#detalhes-id_Fabricante").val(fabricante);
                    $("#detalhes-origem").val(resposta.origem);
                    $("#detalhes-dataValidade").val(resposta.dataValidade);
                    $("#detalhes-qtdDosesRec").val(resposta.qtdDosesRec);
                    $("#detalhes-qtdDosesDisp").val(resposta.qtdDosesDisp);
                });
            })

            /* js para abrir Modal de excluir de forma dinâmica */
            $('#modal-excluir').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                const id = button.data('id')
                $('#form-excluir').attr('action', 'lote/' + id)

            })
        });

    </script>

@endsection
