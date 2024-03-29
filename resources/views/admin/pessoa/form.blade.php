<div class="form-row">
    <div class="form-group col-md-12 col-sm-12">
        <label for="cpf">CPF</label>
        <div>
            <input required type="text" id="cpf" name="cpf" value="{{ isset($pessoa)? $pessoa->cpf: old('cpf') }}" class="form-control @error('cpf') is-invalid @enderror" placeholder="Digite o CPF">
            @error('cpf')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="numeroSus">Numero do SUS</label>
        <div>
            <input required type="text" id="numeroSus" name="numeroSus" value="{{ isset($pessoa)? $pessoa->numeroSus: old('numeroSus') }}" class="form-control @error('numeroSus') is-invalid @enderror" placeholder="Digite o Numero do SUS">
            @error('numeroSus')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="nome">Nome</label>
        <div>
            <input required type="text" id="nome" name="nome" value="{{ isset($pessoa)? $pessoa->nome: old('nome') }}" class="form-control @error('nome') is-invalid @enderror" placeholder="Digite o Nome">
            @error('nome')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="nomeMae">Nome da Mae</label>
        <div>
            <input required type="text" id="nomeMae" name="nomeMae" value="{{ isset($pessoa)? $pessoa->nomeMae: old('nomeMae') }}" class="form-control @error('nomeMae') is-invalid @enderror" placeholder="Digite o Nome da Mae">
            @error('nomeMae')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="dataNascimento">Data de Nascimento</label>
        <div>
            <input type="date" required id="dataNascimento" name="dataNascimento" value="{{ isset($pessoa)? $pessoa->dataNascimento: old('dataNascimento') }}" class="form-control @error('dataNascimento') is-invalid @enderror" placeholder="yyyy-mm-dd">
            @error('dataNascimento')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="sexo">Sexo</label>
        <div style="gap:1rem; display:flex;">
            <div style="display:flex; align-items:center; gap:.3rem;"><input @if(isset($pessoa) && $pessoa->sexo == "M")
                                                                                    checked
                                                                                @endif type="radio" id="sexo" name="sexo" value="M">Masculino</div>
            <div style="display:flex; align-items:center; gap:.3rem;"><input @if(isset($pessoa) && $pessoa->sexo == "F")
                                                                                    checked 
                                                                                @endif type="radio" id="sexo" name="sexo" value="F">Feminino</div>
            @error('sexo')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="cidade">Cidade</label>
        <div>
            <input required type="text" id="cidade" name="cidade" value="{{ isset($pessoa)? $pessoa->cidade: old('cidade') }}" class="form-control @error('cidade') is-invalid @enderror" placeholder="Digite a Cidade">
            @error('cidade')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="estado">Estado</label>
        <div>
            <input required type="text" id="estado" name="estado" value="{{ isset($pessoa)? $pessoa->estado: old('estado') }}" class="form-control @error('estado') is-invalid @enderror" placeholder="Digite a sigla do Estado">
            @error('estado')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="rua">Rua</label>
        <div>
            <input required type="text" id="rua" name="rua" value="{{ isset($pessoa)? $pessoa->rua: old('rua') }}" class="form-control @error('rua') is-invalid @enderror" placeholder="Digite o nome da rua">
            @error('rua')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="bairro">Bairro</label>
        <div>
            <input required type="text" id="bairro" name="bairro" value="{{ isset($pessoa)? $pessoa->bairro: old('bairro') }}" class="form-control @error('bairro') is-invalid @enderror" placeholder="Digite o bairro">
            @error('bairro')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="num">Numero</label>
        <div>
            <input required type="text" id="num" name="num" value="{{ isset($pessoa)? $pessoa->num: old('num') }}" class="form-control @error('num') is-invalid @enderror" placeholder="Digite o numero da residencia">
            @error('num')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="estadoCivil">Estado Civil</label>
        <div>
            <input required type="text" id="estadoCivil" name="estadoCivil" value="{{ isset($pessoa)? $pessoa->estadoCivil: old('estadoCivil') }}" class="form-control @error('estadoCivil') is-invalid @enderror" placeholder="Digite o estado Civil">
            @error('estadoCivil')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="etnia">Etnia</label>
        <div>
            <input required type="text" id="etnia" name="etnia" value="{{ isset($pessoa)? $pessoa->etnia: old('etnia') }}" class="form-control @error('etnia') is-invalid @enderror" placeholder="Digite a etnia">
            @error('etnia')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="planoSaude">Plano de Saude</label>
        <div>
            <!-- <input required type="text" id="planoSaude" name="planoSaude" value="{{ isset($pessoa)? $pessoa->planoSaude: old('planoSaude') }}" class="form-control @error('planoSaude') is-invalid @enderror" placeholder="Possui plano de saude?"> -->
            <select style="width:100%; border: 1px solid #ccc; border-radius: 4px; padding: 0.375rem 0.75rem; background-color: #fff;" name="planoSaude" id="planoSaude">
                <option value="">--- Selecione uma opção ---</option>
                <option @if(isset($pessoa) && $pessoa->planoSaude == "1")
                            selected
                        @endif style="padding: 0.375rem 0.75rem;" value="1">Sim</option>
                <option @if(isset($pessoa) && $pessoa->planoSaude == "0")
                            selected
                        @endif value="0">Não</option>
            </select>
            @error('planoSaude')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>
