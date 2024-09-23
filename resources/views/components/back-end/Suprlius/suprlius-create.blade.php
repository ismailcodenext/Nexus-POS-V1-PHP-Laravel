<!-- Finance- Pop Up Modal Start -->
<section id="myModal" class="modal">
    <div class="modal-content">
        <div id="popup-modal">
            <form id="signup">
                <div class="modal-title">
                    <h1>Create Brand</h1>
                    <span class="close-btn close">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="upload-profile">
                            <div class="item">
                                <div class="img-box">
                                    <svg width="32" height="32" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="50" height="50" fill="url(#pattern0_1204_6)" fill-opacity="0.5" />
                                        <defs>
                                            <pattern id="pattern0_1204_6" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_1204_6" transform="scale(0.005)" />
                                            </pattern>
                                            <image id="image0_1204_6" width="200" height="200" />
                                        </defs>
                                    </svg>
                                </div>

                                <div class="profile-wrapper">
                                    <label class="custom-file-input-wrapper">
                                        <input type="file" class="custom-file-input" aria-label="Upload Photo" id="SuprilerImg" />
                                    </label>
                                    <p>PNG, JPEG or GIF (up to 1 MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6"></div>

                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="name" placeholder="Enter  Name" id="SuprilerName" required /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="company" placeholder="Enter  Company Name" id="SuprilerCompany" required /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="mobile"  placeholder="Enter  Mobile Number" id="SuprilerMobile" required /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="address"  placeholder="Enter Address" id="SuprilerAddress" required /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="email"  placeholder="Enter email" id="Suprileremail" required /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="country">
                            <select name="status" id="SelectStatus">
                                <option>Select Status</option>
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select><br />
                        </label>
                        <button onclick="Save()" type="submit" class="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Finance- Pop Up Modal End -->

<script>
    async function Save() {
        try {
            let SuprilerName = document.getElementById('SuprilerName').value;
            let SuprilerCompany = document.getElementById('SuprilerCompany').value;
            let SuprilerMobile = document.getElementById('SuprilerMobile').value;
            let SuprilerAddress = document.getElementById('SuprilerAddress').value;
            let SuprilerEmail = document.getElementById('Suprileremail').value;
            let SelectStatus = document.getElementById('SelectStatus').value;
            let imgInput = document.getElementById('SuprilerImg');
            let imgFile = imgInput.files[0];

            // Validation
            if (SuprilerName.length === 0) {
                errorToast("Supplier Name Required !");
            } else if (SuprilerCompany.length === 0) {
                errorToast("Company Name Required !");
            } else if (SuprilerMobile.length === 0) {
                errorToast("Mobile Number Required !");
            } else if (SuprilerAddress.length === 0) {
                errorToast("Address Required !");
            } else if (SuprilerEmail.length === 0) {
                errorToast("Email Required !");
            } else if (SelectStatus.length === 0) {
                errorToast("Status Required !");
            } else if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Photo Required !");
                return;
            } else {
                // Creating form data for submission
                let formData = new FormData();
                formData.append('name', SuprilerName);
                formData.append('company', SuprilerCompany);
                formData.append('mobile', SuprilerMobile);
                formData.append('address', SuprilerAddress);
                formData.append('email', SuprilerEmail);
                formData.append('status', SelectStatus);
                formData.append('img_url', imgFile); // Append image file

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                }

                // Sending the form data to the server
                let res = await axios.post("/api/create-supriler", formData, config);

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("signup").reset();  // Reset form
                    await getList();  // Refresh the list after adding a new supplier
                } else {
                    errorToast(res.data['message']);
                }
            }
        } catch (e) {
            unauthorized(e.response.status);  // Handle authorization issues
        }
    }
</script>
