<div>
    @if(!empty($successMessage))
    <div class="alert alert-success">
        {{ $successMessage }}
    </div>
    @endif

    <div class="text-center">
        <!-- progressbar -->
        <ul class="progressbar">
            <li class="{{ $currentStep != 1 ? '' : 'active' }}"><a href="#step-1" type="button">Step 1</a></li>
            <li class="{{ $currentStep != 2 ? '' : 'active' }}"><a href="#step-2" type="button">Step 2</a></li>
            <li class="{{ $currentStep != 3 ? '' : 'active' }}"><a href="#step-3" type="button" disabled="disabled">Step
                    3</a></li>
        </ul>
    </div>

    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 1</h3>
                <div class="form-group">
                    <label for="service">Service:</label>
                    <select wire:model="service" class="form-control">
                        <option value="">Select Service</option>
                        @foreach($service as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                    @error('service') <span class="error">{{ $message }}</span> @enderror
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                    type="button">Next</button>
            </div>
        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 2</h3>
                <div class="form-group">
                    <label for="barberman">Barberman:</label>
                    <select wire:model="barberman" class="form-control">
                        <option value="">Select Barberman</option>
                        @foreach($barberman as $b)
                        <option value="{{ $b->id }}">{{ $b->name }}</option>
                        @endforeach
                    </select>
                    @error('barberman') <span class="error">{{ $message }}</span> @enderror
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                    wire:click="secondStepSubmit">Next</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                    wire:click="back(1)">Back</button>
            </div>
        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>
                <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" wire:model="tanggal" class="form-control" />
                    @error('tanggal') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="jam">Jam:</label>
                    <input type="time" wire:model="jam" class="form-control" />
                    @error('jam') <span class="error">{{ $message }}</span> @enderror
                </div>
                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                    wire:click="back(2)">Back</button>
            </div>
        </div>
    </div>
</div>