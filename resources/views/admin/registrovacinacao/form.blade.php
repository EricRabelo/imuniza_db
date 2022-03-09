<div class="form-row">
    <div class="form-group col-md-12 col-sm-12">
        <label for="id_Pessoa">CPF</label>
        <div>
            <input type="text" required id="id_Pessoa" name="id_Pessoa" value="{{ isset($registro)? $registro->id_Pessoa: old('id_Pessoa') }}" class="form-control @error('id_Pessoa') is-invalid @enderror" placeholder="Digite o CPF">
            @error('id_Pessoa')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="id_Vacina">Vacina</label>
        <select id="id_Vacina" name="id_Vacina" class="form-control" required>
            <option value="">--- Selecione uma Vacina ---</option>
            @isset($vacinas)
                @foreach ($vacinas as $vacina)
                    <option
                        @if(isset($registro) && $registro->id_Vacina == $vacina->idVacina)
                            selected
                        @endif
                        value="{{$vacina->idVacina}}">{{$vacina->nome}}</option>
                @endforeach
            @endisset
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="dataVacinacao">Data de Vacinacao</label>
        <div>
            <input type="date" required id="dataVacinacao" name="dataVacinacao" value="{{ isset($registro)? $registro->dataVacinacao: old('dataVacinacao') }}" class="form-control @error('dataVacinacao') is-invalid @enderror" placeholder="Digite a data de vacinacao">
            @error('dataVacinacao')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @if ($registro)
    <div class="form-group col-md-12 col-sm-12">
        <label for="id_Lote">Lote antigo</label>
        <div>
            <input type="text" required id="id_Lote" name="id_Lote" value="{{ isset($registro)? $registro->id_Lote: old('id_Lote') }}" class="form-control @error('id_Lote') is-invalid @enderror" placeholder="" readonly>
            <p> </p>
            @error('id_Lote')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @endif
</div>
