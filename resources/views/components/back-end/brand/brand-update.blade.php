<div id="custom-modal-1" class="custom-modal">
    <div class="custom-modal-content">
        <span class="custom-close">&times;</span>
        <h2>Update Brand</h2>
        <div class="row">

            <div class="col-md-12">
                <div class="d-flex align-items-center mt-3">
                    <img class="me-3" style="width: 60px;" id="oldImg"
                         src="{{ asset('images/default.jpg') }}" />
                    <div>
                        <label class="form-label">Photo</label>
                        <input oninput="updatePreview(this)"  type="file" class="form-control" id="UpdateBrandImage">
                        <input class="d-none" id="updateID">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4">
                <!-- Brand Name Input -->
                <label for="UpdateBrandName">Brand Name</label>
                <input type="text" name="name" placeholder="Brand name" id="UpdateBrandName" class="form-control">
            </div>

            <div class="col-lg-6 mt-4">
                <!-- Status Dropdown -->
                <label for="UpdateSelectStatus">Status</label>
                <select name="status" class="form-control" id="UpdateSelectStatus"> <!-- Changed to form-control -->
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="InActive">InActive</option>
                </select>
                <div class="upload-profile mt-4">
                    <button type="submit" class="submit btn btn-primary" onclick="Update()">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

async function updatePreview(input, imageUrl) {
        const oldImg = document.getElementById('oldImg');

        if (input.files && input.files[0]) {
            oldImg.src = window.URL.createObjectURL(input.files[0]);
        } else if (imageUrl) {
            oldImg.src = imageUrl;
        } else {
            oldImg.src = "{{ asset('images/default.jpg') }}";
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
        document.getElementById('UpdateSelectStatus').value = data.status;
        updatePreview(document.getElementById('UpdateBrandImage'), data.logo);
        openModal(document.getElementById('custom-modal-1'));

    } catch (e) {
        unauthorized(e.response.status);
    }
}

// Update Brand Script
async function Update() {
    try {
        let UpdateBrandName = document.getElementById('UpdateBrandName').value;
        let UpdateBrandImage = document.getElementById('UpdateBrandImage').files[0];
        let UpdateBrandStatus = document.getElementById('UpdateSelectStatus').value;
        let updateID = document.getElementById('updateID').value;

        // Validate required fields
        if (!UpdateBrandName || !UpdateBrandStatus) {
            return errorToast('Please fill out all required fields.');
        }

        // Prepare form data
        let formData = new FormData();
        formData.append('name', UpdateBrandName);
        formData.append('status', UpdateBrandStatus);

        // Append the image if it exists
        if (UpdateBrandImage) {
            formData.append('img', UpdateBrandImage);
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
        unauthorized(e.response.status); // Handle unauthorized or other errors
    }
}

</script>


