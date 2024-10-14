<!-- Brand Update Modal -->
<div id="custom-modal-1" class="custom-modal">
    <div class="custom-modal-content">
        <span class="custom-close">&times;</span>
        <h2>Update Unit</h2>
        <div class="row">
            <div class="col-lg-6 mt-4">
                <!-- Category Name Input -->
                <label for="UpdateCategoryName">Unit Name</label>
                <input type="text" placeholder="Update Category Name" id="UpdateUnitName" class="form-control">
            </div>

            <div class="col-lg-6 mt-4">
                <!-- Status Dropdown -->
                <label for="UpdateUnitStatus">Status</label>
                <select id="UpdateUnitStatus" class="form-control">
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="InActive">InActive</option>
                </select>
                <input type="hidden" id="updateID">
                <div class="upload-profile mt-4">
                    <button type="button" class="submit btn btn-primary" onclick="Update()">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to fill the form when editing
    async function FillUpUpdateForm(id) {
        try {
            // Set the category id in the hidden input
            document.getElementById('updateID').value = id;
            showLoader();

            // Fetch the category data by ID
            let res = await axios.post("/api/unit-by-id", { id: id.toString() }, HeaderToken());
            hideLoader();

            // Populate the form with the fetched data
            let data = res.data.rows;
            document.getElementById('UpdateUnitName').value = data.unit_name;
            document.getElementById('UpdateUnitStatus').value = data.status;

            // Open the modal after filling the form
            const modal = document.getElementById('custom-modal-1');
            openModal(modal);

        } catch (e) {
            unauthorized(e.response.status);
        }
    }

    // Update Category Script
    async function Update() {
        try {
            let UpdateUnitName = document.getElementById('UpdateUnitName').value;
            let updateID = document.getElementById('updateID').value;
            let UpdateUnitStatus = document.getElementById('UpdateUnitStatus').value;

            // Validate required fields
            if (!UpdateUnitName || !UpdateUnitStatus) {
                return errorToast('Please fill out all required fields.');
            }

            // Prepare form data
            let formData = new FormData();
            formData.append('unit_name', UpdateUnitName);
            formData.append('status', UpdateUnitStatus);
            formData.append('id', updateID);

            // Set the request configuration with headers
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers // Add authorization headers
                }
            };

            showLoader(); // Show loader when submitting

            // Make the request to update the category
            let res = await axios.post("/api/update-unit", formData, config);
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
