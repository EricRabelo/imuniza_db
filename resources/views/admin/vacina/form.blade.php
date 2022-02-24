<div class="form-row">
    <div class="form-group col-md-12 col-sm-12">
        <label for="nome">Nome</label>
        <div>
            <input type="text" id="nome" name="nome" value="{{ isset($vacina)? $vacina->nome: old('nome') }}" class="form-control @error('nome') is-invalid @enderror" placeholder="Digite o Nome">
            @error('nome')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
