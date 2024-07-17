@section('title')
Update Customer
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
		<div id="fh5co-services-section">
            @if (Session::has('update_success'))
                <h4 class="alert alert-warning animate-box text-center" role="alert">
                    {{ Session::get('update_success') }}
                </h4>
            @endif
			<div class="container">
				<div class="row display-flex justify-content">
					<div class="col-md-6 col-sm-6 col-md-offset-3">
						<div class=" animate-box">
							<div class="col-md-12 ">
                                <h3>General Information</h3>
                                <form action="{{ route('admin#updatedCustomer', $userData->id) }}" method="POST">
                                    @csrf
                                    <label class="userManagement">Name</label><br>
                                    <input name="name" class="input-md col-md-12" type="text" readonly value="{{ old('name', $userData->name) }}"/>
                                    <label class="userManagement">Email</label><br>
                                    <input name='email' class="input-md col-md-12" type="text" readonly value="{{ old('email', $userData->email) }}"/><br><br>
                                    <label class="userManagement">Age</label><br>
                                    <input name="age" class="input-md col-md-12" type="number" min="18" max="105" value="{{ old('age', $customerData->age) }}"/><br><br>
                                    <label class="userManagement">Disease</label><br>
                                    <input name="disease" class="input-md col-md-12" type="text" value="{{ old('disease', $customerData->disease) }}"/><br><br>
                                    <label class="userManagement">Disability</label><br>
                                    <input name="disability" class="input-md col-md-12" type="text" value="{{ old('disability', $customerData->disability) }}"/><br><br>
                                    <label class="userManagement">Address</label><br>
                                    <input name="address" class="input-md col-md-12" type="text" value="{{ old('address', $customerData->address) }}"/><br><br>
                                    <label class="userManagement">Contact</label><br>
                                    <input name='phone_number' class="input-md col-md-12" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="{{ old('phone', $customerData->phone_number) }}"/><br><br>
                                    <div class="text-center"> 
                                        <button class="btn-primary">Update</button> &nbsp;
                                        <a href="{{ route('customer#index') }}">Cancel</a>
                                    </div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection