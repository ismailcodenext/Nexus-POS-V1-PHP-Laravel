<!-- Brand Update Modal -->
<div id="custom-modal-1" class="custom-modal">
    <div class="custom-modal-content">
        <h2>Update Category</h2>
        <div class="row">
            <div class="col-lg-6 mt-4">
                <!-- Category Name Input -->
                <label for="UpdateCategoryName">Category Name</label>
                <input type="text" name="category_name" placeholder="Update Category Name" id="UpdateCategoryName" class="form-control">
            </div>

            <div class="col-lg-6 mt-4">
                <!-- Status Dropdown -->
                <label for="UpdateCategoryStatus">Status</label>
                <select name="status" id="UpdateCategoryStatus" class="form-control">
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
            let res = await axios.post("/api/category-by-id", { id: id.toString() }, HeaderToken());
            hideLoader();

            // Populate the form with the fetched data
            let data = res.data.rows;
            document.getElementById('UpdateCategoryName').value = data.category_name;
            document.getElementById('UpdateCategoryStatus').value = data.status;

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
            let UpdateCategoryName = document.getElementById('UpdateCategoryName').value;
            let updateID = document.getElementById('updateID').value;
            let UpdateCategoryStatus = document.getElementById('UpdateCategoryStatus').value;

            // Validate required fields
            if (!UpdateCategoryName || !UpdateCategoryStatus) {
                return errorToast('Please fill out all required fields.');
            }

            // Prepare form data
            let formData = new FormData();
            formData.append('category_name', UpdateCategoryName);
            formData.append('status', UpdateCategoryStatus);
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
            let res = await axios.post("/api/update-category", formData, config);
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
