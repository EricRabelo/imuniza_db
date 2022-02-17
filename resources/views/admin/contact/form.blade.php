<div class="form-row">

    <div class="form-group col-md-12 col-sm-12">
        <label for="whatsapp">Whatsapp</label>
        <div>
            <input type="tel" id="whatsapp" name="whatsapp" value="{{ $contact->whatsapp }}"
                class="form-control @error('whatsapp') is-invalid @enderror" placeholder="" required>
            @error('whatsapp')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label for="phone">Telefone</label>
        <div>
            <input maxlength="19" type="tel" id="phone" name="phone" value="{{ $contact->phone }}"
                class="form-control @error('phone') is-invalid @enderror" placeholder="" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label for="email">E-mail</label>
        <div>
            <input type="email" id="email" name="email" value="{{ $contact->email }}"
                class="form-control @error('email') is-invalid @enderror" placeholder="" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label for="email">LinkedIn</label>
        <div>
            <input type="text" id="linkedin" name="linkedin" value="{{ $contact->linkedin }}"
                class="form-control @error('linkedin') is-invalid @enderror" placeholder="" required>
            @error('linkedin')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label for="instagram">Instagram</label>
        <div>
            <input type="text" id="instagram" name="instagram" value="{{ $contact->instagram }}"
                class="form-control @error('instagram') is-invalid @enderror" placeholder="" required>
            @error('instagram')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label for="facebook">Facebook</label>
        <div>
            <input type="text" id="facebook" name="facebook" value="{{ $contact->facebook }}"
                class="form-control @error('facebook') is-invalid @enderror" placeholder="" required>
            @error('facebook')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label for="location">Endereço</label>
        <div>
            <input type="text" id="location" name="location" value="{{ $contact->location }}"
                class="form-control @error('location') is-invalid @enderror" placeholder="" required>
            @error('location')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label for="opening">Horario de Funcionamento</label>
        <div>
            <input type="tel" id="opening" name="opening" value="{{ $contact->opening }}"
                class="form-control @error('opening') is-invalid @enderror" placeholder="" required>
            @error('opening')
                <span class="invalid-feedback" role="alert">
                    <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#phone').val(phoneMask($('#phone').val()));
                $('#whatsapp').val(phoneMask($('#whatsapp').val()));
            });

            $("#phone").keypress(function() {
                $('#phone').val(phoneMask($('#phone').val()));
            });
            $("#phone").keydown(function() {
                $('#phone').val(phoneMask($('#phone').val()));
            });
            $("#phone").keyup(function() {
                $('#phone').val(phoneMask($('#phone').val()));
            });

            $("#whatsapp").keypress(function() {
                $('#whatsapp').val(phoneMask($('#whatsapp').val()));
            });
            $("#whatsapp").keydown(function() {
                $('#whatsapp').val(phoneMask($('#whatsapp').val()));
            });
            $("#whatsapp").keyup(function() {
                $('#whatsapp').val(phoneMask($('#whatsapp').val()));
            });

        </script>
    @endsection
</div>
