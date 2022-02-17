<div class="form-row">
    <div class="form-group col-md-12 col-sm-12">
        <label for="categorie">Nome da Categoria</label>
        <div>
            <input type="text" id="categorie" name="categorie" value="{{ isset($postcategorie)? $postcategorie->categorie: old('categorie') }}" class="form-control @error('categorie') is-invalid @enderror" placeholder="Escreva o nome da categoria" required>
            @error('categorie')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>