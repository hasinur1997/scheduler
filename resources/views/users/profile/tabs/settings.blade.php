<div class="tab-pane" id="settings">
    <form 
        class="form-horizontal" 
        method="post" 
        action="{{ url('team/' . active_team()->id . '/users/'. $user->id .'/update') }}"
    >
        @csrf
        @method('put')
        <!-- name field -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name" 
                    name="name" 
                    placeholder="Name" 
                    value="{{ $user->name ? $user->name : old('name') }}"
                >
                @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!--  Email Field -->
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    name="email" id="inputEmail" 
                    placeholder="Email" 
                    value="{{ $user->email ? $user->email : old('email') }}"
                >
                @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Phone Field -->
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input 
                    type="text" 
                    class="form-control @error('phone') is-invalid @enderror" 
                    id="phone" 
                    name="phone" 
                    placeholder="Phone" 
                    value="{{ $user->profile ? $user->profile->phone : old('phone') }}"
                >
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- Address One -->
        <div class="form-group row">
            <label for="address1" class="col-sm-2 col-form-label">Address 1</label>
            <div class="col-sm-10">
                <textarea 
                    class="form-control @error('address1') is-invalid @enderror" 
                    id="address1" 
                    name="address1" 
                    placeholder="Address 1"
                >
                    {{ $user->profile ? $user->profile->address1 : old('address1') }}
                </textarea>

                @error('address1')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Address Two -->
        <div class="form-group row">
            <label for="address2" class="col-sm-2 col-form-label">Address 2</label>
            <div class="col-sm-10">
                <textarea 
                    class="form-control @error('address2') is-invalid @enderror" 
                    id="address2" 
                    name="address2" 
                    placeholder="Address 2"
                >
                    {{ $user->profile ? $user->profile->address2 : old('address2') }}
                </textarea>

                @error('address2')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Birth Date -->
        <div class="form-group row">
            <label for="birth_date" class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-10">
                <input 
                    type="text" 
                    class="form-control @error('birth_date') is-invalid @enderror" 
                    id="birth_date" 
                    name="birth_date" 
                    placeholder="Date of Birth"
                    value="{{ $user->profile ? $user->profile->birth_date : old('birth_date') }}"
                >
                @error('birth_date')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Gender -->
        <div class="form-group row">
            <label for="blood_group" class="col-sm-2 col-form-label">Blood Group</label>
            <div class="col-sm-10">
                @php 
                    $blood_groups = [
                        'A+' => 'A+',
                        'A-' => 'A-',
                        'B+' => 'B+',
                        'B-' => 'B-',
                        'AB+' => 'AB+',
                        'AB-' => 'AB-',
                        'O+' => 'O+',
                        'O-' => 'O-',
                    ]
                @endphp
                <select 
                    name="blood_group" 
                    id="blood_group" 
                    class="form-control"
                >
                    <option value="">Select</option>
                    @foreach($blood_groups as $key => $value)
                        <option 
                            value="{{ $key }}"
                            {{ $user->profile && $user->profile->blood_group === $key ? 'selected' : '' }} 
                        >
                            {{ $value }}
                        </option>
                    @endforeach
                </select>

                @error('blood_group')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Gender -->
        <div class="form-group row">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                @php 
                    $genders = [
                        'Male'  => 'Male',
                        'Female'  => 'Female',
                        'Others'  => 'Others',
                    ]
                @endphp
                <select 
                    name="gender" 
                    id="gender" 
                    class="form-control"
                >
                    <option value="">Select</option>
                    @foreach($genders as $key => $value)
                        <option 
                            value="{{ $key }}"
                            {{ $user->profile && $user->profile->gender === $key ? 'selected' : '' }}
                        >
                            {{ $value }}
                        </option>
                    @endforeach
                </select>

                @error('gender')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="roles" class="col-sm-2 col-form-label">Roles</label>
            <div class="col-sm-10">
                @foreach($roles as $role)
                    <label>
                        <input 
                            type="checkbox" 
                            name="roles[]" 
                            value="{{ $role->id }}"
                            {{ $user->roles && $user->roles->contains($role) ? 'checked' : '' }}
                        > {{ $role->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </div>
    </form>
</div>