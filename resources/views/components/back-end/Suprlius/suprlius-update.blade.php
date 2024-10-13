<!-- Supplier Update Modal -->
<div id="custom-modal-1" class="custom-modal">
    <div class="custom-modal-content">
        <h2>Update Supplier</h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="upload-profile">
                    <div class="item">
                        <div class="img-box">
                            <!-- Image Preview -->
                            <img id="imagePreview" src="{{ asset('images/default.jpg') }}" alt="Image Preview"
                                style="width: 50px; height: 50px; object-fit: cover; display: block;" />
                        </div>
                        <div class="profile-wrapper">
                            <label class="custom-file-input-wrapper">
                                <input type="file" class="custom-file-input" aria-label="Upload Photo"
                                    id="UpdateSuprilerImg" accept="image/*" onchange="previewImage(event)" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6"></div>

            <div class="col-lg-6">
                <input type="text" name="name" placeholder="Enter Name" id="UpdateSuprilerName" /><br />
            </div>
            <div class="col-lg-6">
                <input type="text" name="company" placeholder="Enter Company Name"
                    id="UpdateSuprilerCompany" /><br />
            </div>
            <div class="col-lg-6">
                <input type="text" name="mobile" placeholder="Enter Mobile Number"
                    id="UpdateSuprilerMobile" /><br />
            </div>
            <div class="col-lg-6">
                <input type="text" name="address" placeholder="Enter Address" id="UpdateSuprilerAddress" /><br />
            </div>
            <div class="col-lg-6">
                <input type="email" name="email" placeholder="Enter Email" id="UpdateSuprilerEmail" /><br />
            </div>
            <input type="hidden" id="updateID">
            <div class="col-lg-6">
                <select name="status" id="UpdateSelectStatus">
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="InActive">InActive</option>
                </select><br />
                <div class="upload-profile">
                    <button type="submit" class="submit" onclick="Update()">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Preview Image before uploading
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const input = event.target;
        if (input.files && input.files[0]) {
            const file = input.files[0];
            imagePreview.src = URL.createObjectURL(file);
        }
    }

    // Function to fill the form when editing
    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();

            let res = await axios.post("/api/supriler-by-id", {
                id: id.toString()
            }, HeaderToken());
            hideLoader();
            let data = res.data.rows;
            document.getElementById('UpdateSuprilerName').value = data.name;
            document.getElementById('UpdateSuprilerCompany').value = data.company;
            document.getElementById('UpdateSuprilerMobile').value = data.mobile;
            document.getElementById('UpdateSuprilerAddress').value = data.address;
            document.getElementById('UpdateSuprilerEmail').value = data.email;
            document.getElementById('UpdateSelectStatus').value = data.status;

            if (data.img_url) {
                document.getElementById('imagePreview').src = data.img_url;
            } else {
                document.getElementById('imagePreview').src = "{{ asset('images/default.jpg') }}";
            }

        } catch (e) {
            unauthorized(e.response.status);
        }
    }

    // Update Supplier Script
    async function Update() {
        try {
            const updateID = document.getElementById('updateID').value;
            const UpdateSuprilerName = document.getElementById('UpdateSuprilerName').value;
            const UpdateSuprilerCompany = document.getElementById('UpdateSuprilerCompany').value;
            const UpdateSuprilerMobile = document.getElementById('UpdateSuprilerMobile').value;
            const UpdateSuprilerAddress = document.getElementById('UpdateSuprilerAddress').value;
            const UpdateSuprilerEmail = document.getElementById('UpdateSuprilerEmail').value;
            const UpdateSuprilerStatus = document.getElementById('UpdateSelectStatus').value;
            const UpdateSuprilerImg = document.getElementById('UpdateSuprilerImg').files[0];

            // Validate required fields
            if (!UpdateSuprilerName || !UpdateSuprilerStatus) {
                return errorToast('Please fill out all required fields.');
            }

            // Prepare form data
            const formData = new FormData();
            formData.append('name', UpdateSuprilerName);
            formData.append('company', UpdateSuprilerCompany);
            formData.append('mobile', UpdateSuprilerMobile);
            formData.append('address', UpdateSuprilerAddress);
            formData.append('email', UpdateSuprilerEmail);
            formData.append('status', UpdateSuprilerStatus);
            formData.append('id', updateID);

            if (UpdateSuprilerImg) {
                formData.append('img', UpdateSuprilerImg);
            }


            // Set the request configuration with headers
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers // Add authorization headers
                }
            };

            showLoader(); // Show loader when submitting

            // Make the request to update the category
            let res = await axios.post("/api/update-supriler", formData, config);
            hideLoader(); // Hide loader after request completion

            if (res.data.status === "success") {
                successToast(res.data.message);
                const updatemodal1 = document.getElementById('custom-modal-1');
                closeModal(updatemodal1);
                await getList(); // Refresh the category list
            } else {
                errorToast(res.data.message);
            }

        } catch (e) {
            unauthorized(e.response.status); // Handle unauthorized or other errors
        }
    }
</script>




{{--
<script>
    // Preview Image before uploading
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const input = event.target;
        if (input.files && input.files[0]) {
            const file = input.files[0];
            imagePreview.style.display = 'block';
            imagePreview.src = URL.createObjectURL(file);
        }
    }

    // Function to fill the form when editing
    async function FillUpUpdateForm(id) {
        try {
            let res = await axios.post("/api/supriler-by-id", { id: id.toString() }, HeaderToken());
            let data = res.data.rows;

            document.getElementById('UpdateSuprilerName').value = data.name;
            document.getElementById('UpdateSuprilerCompany').value = data.company;
            document.getElementById('UpdateSuprilerMobile').value = data.mobile;
            document.getElementById('UpdateSuprilerAddress').value = data.address;
            document.getElementById('UpdateSuprilerEmail').value = data.email;
            document.getElementById('UpdateSelectStatus').value = data.status;

            // If there is an image, update the image preview
            if (data.img_url) {
                document.getElementById('imagePreview').src = data.img_url;
                document.getElementById('imagePreview').style.display = 'block';
            } else {
                document.getElementById('imagePreview').src = "{{ asset('images/default.jpg') }}";
                document.getElementById('imagePreview').style.display = 'block';
            }

        } catch (e) {
            unauthorized(e.response.status);
        }
    }

    // Update Supplier Script
    async function Update() {
        try {
            let updateID = document.getElementById('updateID').value;
            let UpdateSuprilerName = document.getElementById('UpdateSuprilerName').value;
            let UpdateSuprilerCompany = document.getElementById('UpdateSuprilerCompany').value;
            let UpdateSuprilerMobile = document.getElementById('UpdateSuprilerMobile').value;
            let UpdateSuprilerAddress = document.getElementById('UpdateSuprilerAddress').value;
            let UpdateSuprilerEmail = document.getElementById('UpdateSuprilerEmail').value;
            let UpdateSuprilerStatus = document.getElementById('UpdateSelectStatus').value;
            let UpdateSuprilerImg = document.getElementById('UpdateSuprilerImg').files[0];

            // Validate required fields
            if (!UpdateSuprilerName || !UpdateSuprilerStatus) {
                return errorToast('Please fill out all required fields.');
            }

            // Prepare form data
            let formData = new FormData();
            formData.append('id', updateID);
            formData.append('name', UpdateSuprilerName);
            formData.append('company', UpdateSuprilerCompany);
            formData.append('mobile', UpdateSuprilerMobile);
            formData.append('address', UpdateSuprilerAddress);
            formData.append('email', UpdateSuprilerEmail);
            formData.append('status', UpdateSuprilerStatus);
            if (UpdateSuprilerImg) {
                formData.append('img', UpdateSuprilerImg);
            }

            // Set the request configuration with headers
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers // Add authorization headers
                }
            };

            showLoader(); // Show loader when submitting

            // Make the request to update the supplier
            let res = await axios.post("/api/update-supriler", formData, config);
            hideLoader(); // Hide loader after request completion

            if (res.data.status === "success") {
                successToast(res.data.message);
                const updatemodal1 = document.getElementById('custom-modal-1');
                closeModal(updatemodal1);
                await getList(); // Refresh the supplier list
            } else {
                errorToast(res.data.message);
            }

        } catch (e) {
            unauthorized(e.response.status);
        }
    }

</script> --}}
