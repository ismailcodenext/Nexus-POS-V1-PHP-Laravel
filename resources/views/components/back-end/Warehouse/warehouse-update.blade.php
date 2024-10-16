<!-- Brand Update Modal -->
<div id="custom-modal-1" class="custom-modal">
    <div class="custom-modal-content">
        <span class="custom-close">&times;</span>
        <h2>Update Warehouse</h2>
        <div class="row">
            <div class="col-lg-6 mt-4">
                <!-- Category Name Input -->
                <label for="UpdateWarehouseName">Name</label>
                <input type="text" placeholder="Update Category Name" id="UpdateWarehouseName" class="form-control">
            </div>
            <div class="col-lg-6 mt-4">
                <!-- Category Name Input -->
                <label for="UpdateWarehouseNumber">Number</label>
                <input type="text" placeholder="Update Category Name" id="UpdateWarehouseNumber" class="form-control">
            </div>
            <div class="col-lg-6 mt-4">
                <!-- Category Name Input -->
                <label for="UpdateWarehouseEmail">Email</label>
                <input type="text" placeholder="Update Category Name" id="UpdateWarehouseEmail" class="form-control">
            </div>
            <div class="col-lg-6 mt-4">
                <!-- Category Name Input -->
                <label for="UpdateWarehouseName">Address</label>
                <input type="text" placeholder="Update Category Name" id="UpdateWarehouseAddress" class="form-control">
            </div>

            <div class="col-lg-6 mt-4">
                <!-- Status Dropdown -->
                <label for="UpdateWarehouseStatus">Status</label>
                <select id="UpdateWarehouseStatus" class="form-control">
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
            let res = await axios.post("/api/warehouse-by-id", { id: id.toString() }, HeaderToken());
            hideLoader();

            // Populate the form with the fetched data
            let data = res.data.rows;
            document.getElementById('UpdateWarehouseName').value = data.warehouse_name;
            document.getElementById('UpdateWarehouseNumber').value = data.number;
            document.getElementById('UpdateWarehouseEmail').value = data.email;
            document.getElementById('UpdateWarehouseAddress').value = data.address;
            document.getElementById('UpdateWarehouseStatus').value = data.status;

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
            let UpdateWarehouseName = document.getElementById('UpdateWarehouseName').value;
            let UpdateWarehouseNumber = document.getElementById('UpdateWarehouseNumber').value;
            let UpdateWarehouseEmail = document.getElementById('UpdateWarehouseEmail').value;
            let UpdateWarehouseAddress = document.getElementById('UpdateWarehouseAddress').value;
            let UpdateWarehouseStatus = document.getElementById('UpdateWarehouseStatus').value;
            let updateID = document.getElementById('updateID').value;

            // Prepare form data
            let formData = new FormData();
            formData.append('warehouse_name', UpdateWarehouseName);
            formData.append('number', UpdateWarehouseNumber);
            formData.append('email', UpdateWarehouseEmail);
            formData.append('address', UpdateWarehouseAddress);
            formData.append('status', UpdateWarehouseStatus);
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
            let res = await axios.post("/api/update-warehouse", formData, config);
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
