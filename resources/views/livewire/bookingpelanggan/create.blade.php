<div>
    @if(!empty($successMessage))
    <div class="alert alert-success">
        {{ $successMessage }}
    </div>
    @endif

    <div class=" row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3>Choose your service</h3>
                <div class="form-group">
                    <div class="d-flex justify-content-center flex-wrap ">
                        @foreach ($services as $data)
                        <div class="mx-2" style="width: 16rem; border: none;">
                            <div class="card-body custom-card-body text-center">
                                <div class="text-center">
                                    <img src="{{ asset('storage/' . $data->photo) }}" style="object-fit: cover;">
                                </div>
                                <p><strong>{{ $data->nama_service }}</strong></p>

                                <button class="btn btn-warning btn-md" wire:click="selectService({{ $data->id }})">
                                    Pilih
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-primary nextBtn btn-md float-end" wire:click="firstStepSubmit" type="button">
                    Next
                </button>
            </div>
        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3>Choose your Barberman</h3>
                <div class="form-group">
                    <div class="d-flex justify-content-center flex-wrap">
                        @foreach($barbermen as $data)
                        <div class="mx-2" style="width: 16rem; border: none;">
                            <div class="card-body custom-card-body text-center">
                                <div class="text-center">
                                    <img src="{{ asset('storage/foto_profile/barberman/' . $data->foto_profile) }}"
                                        class="rounded mx-auto my-2" width="200" height="200"
                                        style="object-fit: cover;">
                                </div>
                                <p>{{ $data->name }}</p>

                                <button class="btn btn-warning btn-md" wire:click="selectBarberman({{ $data->id }})">
                                    Pilih
                                </button>

                                {{-- <label>
                                    <input type="radio" wire:model="selectedBarberman" value="{{ $data->id }}">
                                    Pilih
                                </label> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- @endif --}}
                    @error('barberman') <span class="error">{{ $message }}</span> @enderror
                </div>
                <button class="btn btn-warning nextBtn btn-md float-start" type="button"
                    wire:click="back(1)">Back</button>
                <button class="btn btn-primary nextBtn btn-md float-end" type="button"
                    wire:click="secondStepSubmit">Next</button>
            </div>
        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3>Pilih Tanggal</h3>
                <div class="card-body custom-card-body text-center">
                    <div class="row">
                        <div class="form-group col-6">
                            <div id="calendar" style="width: 100%"></div>
                            <input type="date" name="selectedTanggal" wire:model="selectedTanggal"
                                class="form-control @error('selectedTanggal') is-invalid @enderror"
                                min="{{ date('Y-m-d') }}">
                            @error('selectedTanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            @error('jam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            @php
                            $availableSlots = $this->getAvailableSlots();
                            @endphp

                            @foreach ($availableSlots as $slot)
                            <input type="radio" class="btn-check" wire:model="selectedJam" name="selectedJam"
                                id="btn-check-outlined-{{ $slot }}" value="{{ $slot }}" {{ in_array($slot,
                                $this->selectedSlots) ? 'disabled' : '' }}>
                            <label class="btn btn-outline-primary" for="btn-check-outlined-{{ $slot }}"
                                style="margin-bottom: 10px;">{{ substr($slot, 0,5)}}</label>
                            @endforeach
                        </div>

                    </div>
                    <button class="btn btn-warning nextBtn btn-md float-start" type="button"
                        wire:click="back(2)">Back</button>
                    <button class="btn btn-primary nextBtn btn-md float-end" type="button"
                        wire:click="thirdStepSubmit">Next</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3>Konfirmasi Booking</h3>
                <table class="table">
                    <tr>
                        <td>Nama :</td>
                        <td><strong>{{ Auth()->user()->name }}</strong></td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td><strong>{{ Auth()->user()->phone }}</strong></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><strong>{{ Auth()->user()->email }}</strong></td>
                    </tr>
                    <tr>
                        <td>Service:</td>
                        <td><strong>{{ $this->getServiceName() }}</strong></td>
                    </tr>
                    <tr>
                        <td>Barberman:</td>
                        <td><strong>{{ $this->getBarbermanName() }}</strong></td>
                    </tr>
                    <tr>
                        <td>Tanggal:</td>
                        <td><strong>{{$tanggal}}</strong></td>
                    </tr>
                    <tr>
                        <td>Jam:</td>
                        <td><strong>{{$jam}}</strong></td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td><strong>{{$status}}</strong></td>
                    </tr>
                </table>
                <button class="btn btn-warning nextBtn btn-md float-start" type="button"
                    wire:click="back(3)">Back</button>
                <button class="btn btn-primary nextBtn btn-md float-end" wire:click="submitForm"
                    type="button">Finish!</button>
            </div>
        </div>
    </div>
</div>