<!-- Brand Update Modal -->
<div id="custom-modal-1" class="custom-modal">
    <div class="custom-modal-content">
        <h2>Update Brand</h2>
        <div class="row">
            <!-- Image Upload Section -->
            <div class="col-lg-6">
                <div class="upload-profile">
                    <div class="item">
                        <div class="img-box">
                            <!-- Image Preview -->
                            <img id="imagePreview" src="{{ asset('images/default.jpg') }}" alt="Image Preview" style="width: 50px; height: 50px; object-fit: cover; display: block;" />
                        </div>
                        <div class="profile-wrapper">
                            <label class="custom-file-input-wrapper">
                                <input type="file" class="custom-file-input" aria-label="Upload Photo" id="UpdateBrandImg" accept="image/*" onchange="previewImage(event)" />
                            </label>
                            <p>PNG, JPEG or GIF (up to 1 MB)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-4">
                <!-- Brand Name Input -->
                <label for="UpdateBrandName">Brand Name</label>
                <input type="text" name="brand_name" placeholder="Brand name" id="UpdateBrandName" class="form-control">
            </div>

            <div class="col-lg-6 mt-4">
                <!-- Status Dropdown -->
                <label for="SelectStatus">Status</label>
                <select name="status" id="UpdateBrandStatus" class="form-control">
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="InActive">InActive</option>
                </select>
                <input type="hidden" id="updateID">
                <div class="upload-profile mt-4">
                    <button type="submit" class="submit btn btn-primary" onclick="Update()">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Preview Image before uploading
    async function previewImage(event) {
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
            // Set the brand id in the hidden input
            document.getElementById('updateID').value = id;
            showLoader();

            // Fetch the brand data by ID
            let res = await axios.post("/api/brand-by-id", { id: id.toString() }, HeaderToken());
            hideLoader();

            // Populate the form with the fetched data
            let data = res.data.rows;
            document.getElementById('UpdateBrandName').value = data.name;
            document.getElementById('SelectStatus').value = data.status;

            // If there is a logo, update the image preview
            if (data.logo) {
                document.getElementById('imagePreview').src = data.logo;
            } else {
                document.getElementById('imagePreview').src = "{{ asset('images/default.jpg') }}";
            }

        } catch (e) {
            unauthorized(e.response.status);
        }
    }

   // Update Brand Script
async function Update() {
    try {
        let UpdateBrandName = document.getElementById('UpdateBrandName').value;
        let updateID = document.getElementById('updateID').value;
        let UpdateBrandImg = document.getElementById('UpdateBrandImg').files[0];
        let UpdateBrandStatus = document.getElementById('UpdateBrandStatus').value;

        // Validate required fields
        if (!UpdateBrandName || !UpdateBrandStatus) {
            return errorToast('Please fill out all required fields.');
        }

        // Prepare form data
        let formData = new FormData();
        formData.append('name', UpdateBrandName);
        formData.append('status', UpdateBrandStatus);
        if (UpdateBrandImg) {
            formData.append('img', UpdateBrandImg);
        }
        formData.append('id', updateID);

        // Set the request configuration with headers
        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers // Add authorization headers
            }
        };

        showLoader(); // Show loader when submitting

        // Make the request to update the brand
        let res = await axios.post("/api/update-brand", formData, config);
        hideLoader(); // Hide loader after request completion

        if (res.data.status === "success") {
            successToast(res.data.message);
            const updatemodal1 = document.getElementById('custom-modal-1');
            closeModal(updatemodal1);
            await getList(); // Refresh the brand list
        } else {
            errorToast(res.data.message);
        }

    } catch (e) {
        unauthorized(e.response.status);
    }
}



</script>
