@extends('layout.app')
@section('content')
<div class="container">
  <!-- Sign in Form Start -->
  <div class="card">
    <div class="card-wrapper">
      <div class="card-image">
        <img src="{{asset('back-end/assets/img/sign-in-card-img.png')}}" alt="" />
      </div>

      <div class="card-item">
        <div class="brand-logo">
          <img src="{{asset('back-end/assets/img/pos-nav-logo.svg')}}" alt="" />
        </div>

        <h2>Welcome to NEXUS POS</h2>

        <form onsubmit="SubmitLogin(event)">
            <input type="text" id="email" placeholder="Enter a mail" />
            <label for="password">
                <input type="password" id="password" placeholder="Enter password" />
                <a href="#"><img class="hide-icon" src="{{asset('back-end/assets/icons/password-eye-icon.svg')}}" alt="" /></a>
            </label>
            <a href="#" class="forgot-password">Forgot Password?</a>
            <button type="submit">SIGN IN</button>
        </form>

        <div class="switch">
          Dont have an account?
          <a href="#" onclick="switchCard()">SIGN UP</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Sign in Form End -->

  <!-- Registration Form Start -->
  <div class="card" style="display: none">
    <div class="card-wrapper">
      <div class="card-image">
        <img src="{{asset('back-end/assets/img/sign-up-card-bg.png')}}" alt="" />
      </div>

      <div class="card-item">
        <h2>Create an account</h2>
        <form>
          <input type="text" id="name" placeholder="Name" />
          <input type="email" id="register-email" placeholder="email" />
          <input type="number" id="mobile" placeholder="Phone number" />

          <label for="password">
            <input type="password" id="register-password" placeholder="Enter password" />
            <a href="#"><img class="hide-icon" src="{{asset('back-end/assets/icons/password-eye-icon.svg')}}"
                alt="" /></a>
          </label>
          <input id="status" value="approved" class="form-control" type="hidden" />
          <input id="role" value="admin" class="form-control" type="hidden" />

          <div class="col-12">
            <div class="d-flex align-items-center mt-3">
              <img class="me-2" style="width: 18%" id="newImg" src="{{asset('images/default.jpg')}}" />

              <div>
                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control"
                  id="img_url">
              </div>
            </div>
          </div>
          <label for="cheakbox" class="cheakbox">
            <input type="checkbox" />
            <h1>I accept the <a href="#">Privacy Policy.</a></h1>
          </label>
          <button onclick="onRegistration()" type="submit">SIGN UP</button>
        </form>
        <div class="switch">
          Already have an account?
          <a href="#" onclick="switchCard()">SIGN IN</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Registration Form End -->
</div>




{{-- Registration Form --}}

<script>
  async function onRegistration() {
    try {
      // Get form values
      let name = document.getElementById('name').value.trim();
      let email = document.getElementById('register-email').value.trim();
      let password = document.getElementById('register-password').value.trim();
      let mobile = document.getElementById('mobile').value.trim();
      let status = document.getElementById('status').value.trim();
      let role = document.getElementById('role').value.trim();
      let imgInput = document.getElementById('img_url');
      let imgFile = imgInput.files[0];

      // Validate required fields
      // if (!name ||  !email || !password || !mobile) {
      //     errorToast('Please fill in all required fields.');
      //     return;
      // }

      // Create FormData object and append form data
      let formData = new FormData();
      formData.append('img', imgFile);
      formData.append('name', name);
      formData.append('email', email);
      formData.append('password', password);
      formData.append('mobile', mobile);
      formData.append('status', status);
      formData.append('role', role);

      // Display loader
      showLoader();

      // Make POST request to backend
      let response = await axios.post("user-registration", formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      });

      // Hide loader
      hideLoader();

      // Check response status and handle accordingly
      if (response.status === 200 && response.data.status === 'success') {
        // Registration successful, redirect to login page
        successToast('User registered successfully.');
        window.location.href = "/nexus-login-page";
      } else {
        // Registration failed, display error message
        errorToast(response.data.message || 'Registration failed.');
      }
    } catch (error) {
      // Hide loader and display generic error message
      hideLoader();
      errorToast('An error occurred during registration. Please try again later.');
      console.error('Registration Error:', error);
    }
  }
</script>



{{-- Login Script --}}

<script>

async function SubmitLogin(event) {
    event.preventDefault(); // Prevent the default form submission

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    if (email.length === 0) {
        errorToast("Email is required");
    } else if (password.length === 0) {
        errorToast("Password is required");
    } else {
        showLoader();
        let res = await axios.post("nexus-login-page", { email: email, password: password });
        hideLoader();
        if (res.status === 200 && res.data['status'] === 'success') {
            setToken(res.data['token']);
            window.location.href = "/admin-dashboard";
        } else {
            errorToast(res.data['message']);
        }
    }
}


</script>


<!-- Change Page Script Start -->
<script>
  function switchCard() {
    const loginCard = document.querySelector(
      ".container .card:nth-child(1)"
    );
    const registerCard = document.querySelector(
      ".container .card:nth-child(2)"
    );

    if (loginCard.style.display === "none") {
      loginCard.style.display = "block";
      registerCard.style.display = "none";
    } else {
      loginCard.style.display = "none";
      registerCard.style.display = "block";
    }
  }
</script>


@endsection
