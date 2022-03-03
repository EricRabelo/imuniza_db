<div class="form-row">
    <div class="form-group col-md-12 col-sm-12">
        <label for="cnpj">CNPJ</label>
        <div>
            <input required type="text" id="cnpj" name="cnpj" value="{{ isset($fabricante) ? $fabricante->cnpj: old('cnpj') }}" class="form-control @error('cnpj') is-invalid @enderror" placeholder="Digite o CNPJ">
            @error('cnpj')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        
        <label for="razaoSocial">Razão Social</label>
        <div>
            <input required type="text" id="razaoSocial" name="razaoSocial" value="{{ isset($fabricante) ? $fabricante->razaoSocial: old('razaoSocial') }}" class="form-control @error('razaoSocial') is-invalid @enderror" placeholder="Digite a Razão Social">
            @error('razaoSocial')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
