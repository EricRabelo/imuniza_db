<div class="form-row">
    <div class="form-group col-md-12 col-sm-12">
        <label for="text">Texto</label>
        <div>
            <textarea id="text" name="text" class="ckeditor form-control @error('text') is-invalid @enderror"
                placeholder="" required>{{ $about->text }}</textarea>
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label for="mission">Missão</label>
        <div>
            <input type="text" id="mission" name="mission" value="{{ $about->mission }}"
                class="form-control @error('mission') is-invalid @enderror" placeholder="" required>
            @error('mission')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label for="vision">Visão</label>
        <div>
            <input type="text" id="vision" name="vision" value="{{ $about->vision }}"
                class="form-control @error('vision') is-invalid @enderror" placeholder="" required>
            @error('vision')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label for="values">Valores</label>
        <p style="font-size:85%">Valores separados por vírgula. Ex: Valor 1, Valor 2, Valor 3...</p>
        <div>
            <input type="text" id="values" name="values" value="{{ $about->values }}"
                class="form-control @error('values') is-invalid @enderror" placeholder="" required>
            @error('values')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-6 col-sm-12">
        <label for="image">Imagem</label>
        <input type="file" id="image" name="image" at1="image" class="form-control" accept="image/*" @if (!isset($about)) required @endif>
    </div>
    @if (isset($about))
        <div class="form-group col-md-6 col-sm-12">
            <label for="image">Imagem Atual</label>
            <div><img src="/storage/{{ $about->image }}" alt="image About"
                    style="max-height: 430px; max-width: 540px; object-fit: cover;"></div>
        </div>
    @endif
</div>
