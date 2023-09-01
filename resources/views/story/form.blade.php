<div class="card">
    @csrf
    <label for="name">Name</label>
    <input value="{{ old('name') }}" class="text-field @error('name') is-invalid @enderror" name="name" />
    @error('name')
        <div class="error">{{ $message }}</div>
    @enderror

    {{-- <label for="password">Password</label>
            <input value="{{ old('password') }}" class="text-field @error('password') is-invalid @enderror"
                type="password" name="password" />
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror --}}

    <label for="drink">İçecek</label>
    <select class="text-field @error('drink') is-invalid @enderror" name="drink" id="drink">
        <option {{ old('drink') == '-' ? 'selected' : '' }} value="-">-</option>
        <option {{ old('drink') == 'Ice Cappuccino' ? 'selected' : '' }} value="Ice Cappuccino">Ice Cappuccino</option>
        <option {{ old('drink') == 'Mocha' ? 'selected' : '' }} value="Mocha">Mocha</option>
        <option {{ old('drink') == 'Çay' ? 'selected' : '' }} value="Çay">Çay</option>
        <option {{ old('drink') == 'Filtre Kahve' ? 'selected' : '' }} value="Filtre Kahve">Filtre Kahve</option>
    </select>
    @error('drink')
        <div class="error">{{ $message }}</div>
    @enderror

    <label>Hobi</label>
    <div class="text-field @error('hobby') is-invalid @enderror">
        <label>
            <input {{ old('hobby') == 'music' ? 'checked' : '' }} type="radio" name="hobby" value="music"
                id="music">
            Müzik
        </label>
        <label>
            <input {{ old('hobby') == 'art' ? 'checked' : '' }} type="radio" name="hobby" value="art"
                id="art">
            Resim
        </label>
        <label>
            <input {{ old('hobby') == 'sport' ? 'checked' : '' }} type="radio" name="hobby" value=sport
                id="sport">
            Spor
        </label>
    </div>
    @error('hobby')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="notes">Notes</label>
    <textarea class="text-field @error('notes') is-invalid @enderror" name="notes" id="notes">{{ old('notes') }}</textarea>
    @error('notes')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="accept">Kullanıcı Sözleşmesi</label>
    <div class="text-field @error('accept') is-invalid @enderror">
        <label for="accept">
            <input type="checkbox" name="accept" id="accept">
            Kabul Ediyorum.
        </label>
    </div>
    @error('accept')
        <div class="error">{{ $message }}</div>
    @enderror

    <button class="submit-button">Login</button>
</div>
