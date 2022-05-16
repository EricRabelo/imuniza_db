<div class="form-row">
    <div class="form-group col-md-12 col-sm-12">
        <label for="id_Doenca">Doença</label>
        <select id="id_Doenca" name="id_Doenca" class="form-control" required>
            <option value="">--- Selecione uma Doença ---</option>
            @isset($doencas)
                @foreach ($doencas as $doenca)
                    <option
                        @if(isset($combate) && $combate->id_Doenca == $doenca->idDoenca)
                            selected
                        @endif
                        value="{{$doenca->idDoenca}}">{{$doenca->nome}}</option>
                @endforeach
            @endisset
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="id_Vacina">Vacina</label>
        <select id="id_Vacina" name="id_Vacina" class="form-control" required>
            <option value="">--- Selecione uma Vacina ---</option>
            @isset($vacinas)
                @foreach ($vacinas as $vacina)
                    <option
                        @if(isset($combate) && $combate->id_Vacina == $vacina->idVacina)
                            selected
                        @endif
                        value="{{$vacina->idVacina}}">{{$vacina->nome}}</option>
                @endforeach
            @endisset
        </select>
    </div>
</div>
