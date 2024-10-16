<!-- Finance- Pop Up Modal Start -->
<section id="myModal" class="modal">
    <div class="modal-content">
        <div id="popup-modal">
            <form id="signup" onsubmit="return Save(event)">
                <div class="modal-title">
                    <h1>Create Warehouse</h1>
                    <span class="close-btn close" onclick="closeModal()">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="warehouse_name" placeholder="Enter your WareHouse name" id="WarehouseName" /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="number" placeholder="Enter your number name" id="WarehouseNumber" /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="email" placeholder="Enter your email name" id="WarehouseEmail" /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="address" placeholder="Enter your Address name" id="WarehouseAddress" /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="country">
                            <select name="status" id="SelectStatus">
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
    // Function to close the modal
    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'none'; // Hide the modal
    }

    async function Save(event) {
        event.preventDefault();  // Stop form from submitting and reloading the page
        try {
            let WarehouseName = document.getElementById('WarehouseName').value;
            let WarehouseNumber = document.getElementById('WarehouseNumber').value;
            let WarehouseEmail = document.getElementById('WarehouseEmail').value;
            let WarehouseAddress = document.getElementById('WarehouseAddress').value;
            let SelectStatus = document.getElementById('SelectStatus').value;

            if (WarehouseName.length === 0) {
                errorToast("Warehouse Name Required!");
                return false;
            } else if (WarehouseNumber.length === 0) {
                errorToast("Warehouse Number Required!");
                return false;

            } else if (WarehouseEmail.length === 0) {
                errorToast("Warehouse Email Required!");
                return false;

            } else if (WarehouseAddress.length === 0) {
                errorToast("Warehouse Address Required!");
                return false;

            } else if (SelectStatus === '' || SelectStatus === 'Select Status') {
                errorToast("Select Status Required!");
                return false;
            }

            else {
                let formData = new FormData();
                formData.append('warehouse_name', WarehouseName);
                formData.append('number', WarehouseNumber);
                formData.append('email', WarehouseEmail);
                formData.append('address', WarehouseAddress);
                formData.append('status', SelectStatus);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                };

                let res = await axios.post("/api/create-warehouse", formData, config);

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("signup").reset();
                    const modal = document.getElementById('myModal');
            closeModal(modal);  // Close the modal smoothly

                    await getList();  // Refresh the list after creation
                } else {
                    errorToast(res.data['message']);
                }
            }
        } catch (e) {
            unauthorized(e.response.status);
        }
        return false;
    }
</script>
