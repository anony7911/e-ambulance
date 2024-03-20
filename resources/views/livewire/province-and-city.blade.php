<div>
    <div>
        <label for="province">Pilih Provinsi:</label>

        <select wire:model="selectedProvince" class="form-select mb-3">
            <option value="">Pilih Provinsi</option>
            @foreach($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }}</option>
            @endforeach
        </select>

        <label for="city">Pilih Kota:</label>

        <select class="form-select">
            <option value="">Pilih Kota</option>
            @foreach($cities as $city)
                <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
            @endforeach
        </select>
    </div>
</div>
