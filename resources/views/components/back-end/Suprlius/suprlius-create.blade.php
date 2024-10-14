<!-- Finance- Pop Up Modal Start -->
<section id="myModal" class="modal">
    <div class="modal-content">
        <div id="popup-modal">
            <form id="signup" onsubmit="return Save(event)">
                <div class="modal-title">
                    <h1>Create Brand</h1>
                    <span class="close-btn close" onclick="closeModal()">
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
                                    <!-- Add an img element for the image preview -->
                                    <img id="imagePreview" style="display:none; max-width:100%; height:auto;" alt="Image Preview" />
                                </div>

                                <div class="profile-wrapper">
                                    <label class="custom-file-input-wrapper">
                                        <input type="file" class="custom-file-input" aria-label="Upload Photo" id="SuprilerImg"  />
                                    </label>
                                    <p>PNG, JPEG or GIF (up to 1 MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6"></div>

                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="name" placeholder="Enter Name" id="SuprilerName"  /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="company" class="input-style" placeholder="Enter Company Name" id="SuprilerCompany"  /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="mobile" class="input-style" placeholder="Enter Mobile Number" id="SuprilerMobile"  /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="address" class="input-style" placeholder="Enter Address" id="SuprilerAddress"  /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="email" name="email" class="input-style" placeholder="Enter Email" id="SuprilerEmail"  /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="country">
                            <select name="status" class="input-style" id="SelectStatus" >
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select><br />
                        </label>
                        <div class="upload-profile">
                            <button type="submit" class="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Finance- Pop Up Modal End -->

<script>

document.getElementById('SuprilerImg').addEventListener('change', function (event) {
    const imgFile = event.target.files[0];
    const imgPreview = document.getElementById('imagePreview');

    if (imgFile) {
        const reader = new FileReader();
        reader.onload = function (e) {
            imgPreview.src = e.target.result; // Set the image source to the file data
            imgPreview.style.display = 'block'; // Show the image preview
        }
        reader.readAsDataURL(imgFile); // Read the file as a data URL
    } else {
        imgPreview.src = ""; // Clear the preview if no file is selected
        imgPreview.style.display = 'none'; // Hide the preview
    }
});



    async function Save(event) {
    event.preventDefault();
    try {
        let SuprilerName = document.getElementById('SuprilerName').value;
        let SuprilerCompany = document.getElementById('SuprilerCompany').value;
        let SuprilerMobile = document.getElementById('SuprilerMobile').value;
        let SuprilerAddress = document.getElementById('SuprilerAddress').value;
        let SuprilerEmail = document.getElementById('SuprilerEmail').value;
        let SelectStatus = document.getElementById('SelectStatus').value;
        let imgInput = document.getElementById('SuprilerImg');
        let imgFile = imgInput.files[0];

        // Validation
        if (!SuprilerName) {
            errorToast("Supplier Name is required!");
        } else if (!SuprilerCompany) {
            errorToast("Company Name is required!");
        } else if (!SuprilerMobile) {
            errorToast("Mobile Number is required!");
        } else if (!SuprilerAddress) {
            errorToast("Address is required!");
        } else if (!SuprilerEmail) {
            errorToast("Email is required!");
        } else if (!SelectStatus) {
            errorToast("Status is required!");
        } else if (!imgFile) {
            errorToast("Photo is required!");
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
                const modal = document.getElementById('myModal');
            closeModal(modal);  // Close the modal smoothly
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
