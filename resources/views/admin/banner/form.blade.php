<div class="form-row">
    <div class="form-group col-md-12 col-sm-12">
        <label for="title">Frase em destaque</label>
        <div>
            <input type="text" id="title" name="title" value="{{ isset($banner)? $banner->title: old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Escreva uma frase para ficar em destaque">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="button_text">Texto do botão</label>
        <div>
            <input type="text" id="button_text" name="button_text" value="{{ isset($banner)? $banner->button_text: old('button_text') }}" class="form-control @error('button_text') is-invalid @enderror" placeholder="Escreva texto do botão"></input>
            @error('button_text')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label for="button_link">Link do botão</label>
        <div>
            <input type="text" id="button_link" name="button_link" value="{{ isset($banner)? $banner->button_link: old('button_link') }}" class="form-control @error('button_link') is-invalid @enderror" placeholder="Escreva um Link a ser direcionado através do botão"></input>
            @error('button_link')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-6 col-sm-12">
        <label for="image">Imagem</label>
        <input type="file" id="image" name="image" at1="image" class="form-control" accept="image/*" @if(!isset($banner)) required @endif>
    </div>
    @if(isset($banner))
    <div class="form-group col-md-6 col-sm-12">
        <label for="image">Imagem Atual</label>
        <div><img src="/storage/{{ $banner->image }}" alt="image Banner" style="max-height: 500px; max-width: 100%; object-fit: cover;"></div>
    </div>
    @endif
</div>
