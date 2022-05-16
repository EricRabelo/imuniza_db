<div class="form-row">
    <div class="form-group col-md-12 col-sm-12">
        <label for="idLote">Lote</label>
        <div>
            <input type="text" required id="idLote" name="idLote" value="{{ isset($lote)? $lote->idLote: old('idLote') }}" class="form-control @error('idLote') is-invalid @enderror" placeholder="Digite o Lote da Vacina">
            @error('idLote')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="dataRecebimento">Data de Recebimento</label>
        <div>
            <input type="date" required id="dataRecebimento" name="dataRecebimento" value="{{ isset($lote)? $lote->dataRecebimento: old('dataRecebimento') }}" class="form-control @error('dataRecebimento') is-invalid @enderror" placeholder="yyyy-mm-dd">
            @error('dataRecebimento')
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
                        @if(isset($lote) && $lote->id_Vacina == $vacina->idVacina)
                            selected
                        @endif
                        value="{{$vacina->idVacina}}">{{$vacina->nome}}</option>
                @endforeach
            @endisset
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="id_Fabricante">Fabricante</label>
        <select id="id_Fabricante" name="id_Fabricante" class="form-control" required>
            <option value="">--- Selecione um Fabricante ---</option>
            @isset($fabricantes)
                @foreach ($fabricantes as $fabricante)
                    <option
                        @if(isset($lote) && $lote->id_Fabricante == $fabricante->cnpj)
                            selected
                        @endif
                        value="{{$fabricante->cnpj}}">{{$fabricante->razaoSocial}}</option>
                @endforeach
            @endisset
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="origem">Origem</label>
        <div>
            <input type="text" required id="origem" name="origem" value="{{ isset($lote)? $lote->origem: old('origem') }}" class="form-control @error('origem') is-invalid @enderror" placeholder="Digite a origem da vacina">
            @error('origem')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="dataValidade">Data de Validade</label>
        <div>
            <input type="date" required id="dataValidade" name="dataValidade" value="{{ isset($lote)? $lote->dataValidade: old('dataValidade') }}" class="form-control @error('dataValidade') is-invalid @enderror" placeholder="yyyy-mm-dd">
            @error('dataValidade')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="qtdDosesRec">Doses Recebidas</label>
        <div>
            <input type="text" required id="qtdDosesRec" name="qtdDosesRec" value="{{ isset($lote)? $lote->qtdDosesRec: old('qtdDosesRec') }}" class="form-control @error('qtdDosesRec') is-invalid @enderror" placeholder="Digite a quantidade de doses recebidas">
            @error('qtdDosesRec')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="qtdDosesDisp">Doses Disponiveis</label>
        <div>
            <input type="text" required id="qtdDosesDisp" name="qtdDosesDisp" value="{{ isset($lote)? $lote->qtdDosesDisp: old('qtdDosesDisp') }}" class="form-control @error('qtdDosesDisp') is-invalid @enderror" placeholder="Digite a quantidade de doses disponiveis">
            @error('qtdDosesDisp')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    
</div>
