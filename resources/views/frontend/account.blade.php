@extends('layouts.frontend')

@section('content')

    <section class="sectionPadding imageBackground02">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="text-center">
                        <h2 class="fw-bold welcomeUser">
                            <span class="text-red">Welcome</span>
                            {{ $user->first_name ?? $user->name }} {{ $user->last_name ?? '' }}
                        </h2>
                    </div>

<div class="userProfileImage">

<form id="profileImageForm"
      action="{{ route('customer.profile.image') }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf

    <a href="javascript:void(0);"
       onclick="document.getElementById('profileImageUpload').click();"
       class="d-block shadow">

        <img
            src="{{ $profile->profile_image 
                ? asset($profile->profile_image) 
                : asset('images/user-image.jpg') }}"
            alt="User"
            class="imgResponsive"
        >
    </a>

    <input
        type="file"
        id="profileImageUpload"
        name="profile_image"
        accept="image/*"
        style="display:none;"
    >

</form>

<div class="memberSince fw-bold">
    Member Since {{ $user->created_at->format('Y') }}
</div>

</div>

                    <!-- @if(session('success'))
                        <div class="alert alert-success mt-4">
                            {{ session('success') }}
                        </div>
                    @endif -->

                </div>
            </div>
        </div>
    </section>


    <section class="sectionPadding profileInfoOuter">
    <div class="container">
    <div class="row userProfileTabs">

    <div class="col-lg-3 col-md-4">
    <ul class="nav flex-column nav-pills userProfileTabs-links">

    <li class="nav-item">
    <button class="nav-link active" data-target="#userProfileTabs1">
    <i class="fa-solid fa-user"></i> My Profile
    </button>
    </li>

    <!-- <li class="nav-item">
    <button class="nav-link" data-target="#userProfileTabs2">
    <i class="fa-solid fa-heart"></i> My Wishlist
    </button>
    </li>

    <li class="nav-item">
    <button class="nav-link" data-target="#userProfileTabs3">
    <i class="fa-solid fa-list"></i> Order History
    </button>
    </li> -->

    <li class="nav-item">
    <button class="nav-link" data-target="#userProfileTabs4">
    <i class="fa-solid fa-key"></i> Change Password
    </button>
    </li>

    <li class="nav-item">
    <a href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"
    class="nav-link">
    <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>

    <form id="logout-form"
    action="{{ route('logout') }}"
    method="POST"
    style="display:none;">
    @csrf
    </form>

    </li>

    </ul>
    </div>


    <div class="col-lg-9 col-md-8">
    <div class="tab-content-box">


    <!-- PROFILE TAB -->
    <div id="userProfileTabs1" class="userProfileTabs-content active">

    <h2>Profile Details</h2>

    <div class="userProfileTabs-content-inner">

    <div class="headingBlock underLineHeading d-none d-md-block"></div>


    <form method="POST"
    action="{{ route('customer.profile.update') }}"
    class="mt-2 mt-lg-3">

    @csrf


    <!-- Personal Information -->
    <h5 class="mb-2">Personal Information</h5>

    <div class="row">

    <div class="col-md-6 mb-3">
    <label>First Name</label>
    <input type="text"
    name="first_name"
    class="form-control"
    value="{{ old('first_name', $firstName) }}">
    </div>

    <div class="col-md-6 mb-3">
    <label>Last Name</label>
    <input type="text"
    name="last_name"
    class="form-control"
    value="{{ old('last_name', $lastName) }}">
    </div>

    <div class="col-md-6 mb-3">
    <label>Gender</label>

    <select name="gender" class="form-control">
    <option value="">Select</option>

    <option value="Male"
    {{ $profile->gender == 'Male' ? 'selected' : '' }}>
    Male
    </option>

    <option value="Female"
    {{ $profile->gender == 'Female' ? 'selected' : '' }}>
    Female
    </option>

    <option value="Other"
    {{ $profile->gender == 'Other' ? 'selected' : '' }}>
    Other
    </option>

    </select>

    </div>

    <div class="col-md-6 mb-3">
    <label>Date of Birth</label>

    <input type="date"
    name="dob"
    class="form-control"
    value="{{ old('dob', $profile->dob) }}">
    </div>

    </div>



    <!-- Contact -->
    <h5 class="mt-3 mt-lg-4 mb-2">
    Contact Information
    </h5>

    <div class="row">

    <div class="col-md-6 mb-3">
    <label>Email</label>
    <input type="email"
    name="email"
    class="form-control"
    value="{{ old('email', $user->email) }}">
    </div>


    <div class="col-md-6 mb-3">
    <label>Phone</label>

    <input type="text"
    name="phone"
    class="form-control"
    value="{{ old('phone', $profile->phone) }}">
    </div>


    <div class="col-md-6 mb-3">
    <label>Alternate Phone</label>

    <input type="text"
    name="alternate_phone"
    class="form-control"
    value="{{ old('alternate_phone', $profile->alternate_phone) }}">
    </div>

    </div>



    <!-- Address -->
    <h5 class="mt-3 mt-lg-4 mb-2">
    Shipping Address
    </h5>

    <div class="row">

    <div class="col-md-12 mb-3">
    <label>Address Line 1</label>

    <input type="text"
    name="address_line1"
    class="form-control"
    value="{{ old('address_line1', $profile->address_line1) }}">
    </div>


    <div class="col-md-12 mb-3">
    <label>Address Line 2</label>

    <input type="text"
    name="address_line2"
    class="form-control"
    value="{{ old('address_line2', $profile->address_line2) }}">
    </div>


    <div class="col-md-6 mb-3">
    <label>Landmark</label>

    <input type="text"
    name="landmark"
    class="form-control"
    value="{{ old('landmark', $profile->landmark) }}">
    </div>


    <div class="col-md-6 mb-3">
    <label>Pincode</label>

    <input type="text"
    name="pincode"
    class="form-control"
    value="{{ old('pincode', $profile->pincode) }}">
    </div>


    <div class="col-md-4 mb-3">
    <label>City</label>

    <input type="text"
    name="city"
    class="form-control"
    value="{{ old('city', $profile->city) }}">
    </div>


    <div class="col-md-4 mb-3">
    <label>State</label>

    <input type="text"
    name="state"
    class="form-control"
    value="{{ old('state', $profile->state) }}">
    </div>


    <div class="col-md-4 mb-3">
    <label>Country</label>

    <input type="text"
    name="country"
    class="form-control"
    value="{{ old('country', $profile->country ?? 'India') }}">
    </div>


    <div class="col-md-12 mb-3">
    <label>Address Type</label>

    <select name="address_type"
    class="form-control">

    <option value="Home"
    {{ $profile->address_type == 'Home' ? 'selected' : '' }}>
    Home
    </option>

    <option value="Work"
    {{ $profile->address_type == 'Work' ? 'selected' : '' }}>
    Work
    </option>

    </select>

    </div>

    </div>



    <!-- Business -->
    <h5 class="mt-3 mt-lg-4 mb-2">
    Business Details (Optional)
    </h5>

    <div class="row">

    <div class="col-md-6 mb-3">
    <label>Company Name</label>

    <input type="text"
    name="company_name"
    class="form-control"
    value="{{ old('company_name', $profile->company_name) }}">
    </div>


    <div class="col-md-6 mb-3">
    <label>GST Number</label>

    <input type="text"
    name="gst_number"
    class="form-control"
    value="{{ old('gst_number', $profile->gst_number) }}">
    </div>

    </div>



    <!-- Preferences -->
    <h6 class="mt-3 mt-lg-4 mb-3">
    Preferences
    </h6>


    <div class="form-check">
    <input class="form-check-input"
    type="checkbox"
    name="newsletter"
    value="1"
    {{ $profile->newsletter ? 'checked' : '' }}>

    <label class="form-check-label">
    Subscribe to Newsletter
    </label>
    </div>


    <div class="form-check">
    <input class="form-check-input"
    type="checkbox"
    name="sms_updates"
    value="1"
    {{ $profile->sms_updates ? 'checked' : '' }}>

    <label class="form-check-label">
    Receive SMS Updates
    </label>
    </div>



    <button type="submit"
    class="mt-3 mt-md-4 submitBtn btn-lg btn-block customBtn01 redBg d-inline-block">
    Update Profile
    </button>

    </form>

    </div>
    </div>



    <!-- Wishlist -->
    <div id="userProfileTabs2"
    class="userProfileTabs-content">

    <h2>My Wishlist</h2>

    <div class="userProfileTabs-content-inner">
    <div class="headingBlock underLineHeading d-none d-md-block"></div>

    <p>Wishlist products will load here dynamically.</p>

    </div>
    </div>



    <!-- Orders -->
    <div id="userProfileTabs3"
    class="userProfileTabs-content">

    <h2>Order Listing</h2>

    <div class="userProfileTabs-content-inner">

    <div class="headingBlock underLineHeading d-none d-md-block"></div>

    <table class="table order-table align-middle table-striped text-center">

    <thead class="table-light">
    <tr>
    <th>Order ID</th>
    <th>Date</th>
    <th>Items</th>
    <th>Total</th>
    <th>Status</th>
    <th>Action</th>
    </tr>
    </thead>

    <tbody>
    <tr>
    <td colspan="6">No Orders Found</td>
    </tr>
    </tbody>

    </table>

    </div>
    </div>



    <!-- Password -->
    <div id="userProfileTabs4"
    class="userProfileTabs-content">

    <h2>Change Password</h2>

    <div class="userProfileTabs-content-inner">

    <div class="headingBlock underLineHeading d-none d-md-block"></div>

    <form>

    <div class="mb-3">
    <label>Current Password</label>
    <input type="password" class="form-control">
    </div>

    <div class="mb-3">
    <label>New Password</label>
    <input type="password" class="form-control">
    </div>

    <div class="mb-3">
    <label>Confirm Password</label>
    <input type="password" class="form-control">
    </div>

    <button
    class="mt-2 submitBtn btn-lg btn-block customBtn01 redBg d-inline-block">
    Update Password
    </button>

    </form>

    </div>
    </div>


    </div>
    </div>

    </div>
    </div>
    </section>
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
<script>
document.getElementById('profileImageUpload').addEventListener('change', function () {

    if(this.files.length > 0){
        document.getElementById('profileImageForm').submit();
    }

});
</script>
@endsection