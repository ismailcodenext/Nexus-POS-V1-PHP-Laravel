<style>
    .modal-content-popap {
        position: relative;
        background-color: #fefefe;
        margin: 40px auto;
        padding: 20px;
        border: 1px solid #888;
        width: 100%;
    }
</style>

<!-- Finance- Pop Up Modal Start -->
<section id="myModal" class="modal">
    <div class="modal-content">
        <div id="popup-modal">
            <form id="signup" onsubmit="return Save(event)">
                <div class="modal-title">
                    <h1>Create Purchase</h1>
                    <span class="close-btn close" onclick="closeModal()">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
                <div class="row">
                    <!-- Supplier Input with Plus Icon -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Supplier <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-select input-style" id="ProductSupplier"
                                aria-label="Default select example">
                                <option value="none">Select Supplier</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                data-bs-target="#addSupplierModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Wareshop Input with Plus Icon -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Wareshop <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-select input-style" id="ADDWareShop"
                                aria-label="Default select example">
                                <option value="none">Select Wareshop</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                data-bs-target="#addWarehouseModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Date -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Purchase Date<span class="text-danger">*</span></label>
                        <input type="date" class="input-style" id="PurchaseDate" /><br />
                    </div>

                    <!-- Referance Number -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Reference No <span class="text-danger">*</span></label>
                        <input type="text" class="input-style" id="ReferenceNo" /><br />
                    </div>
                    <!-- Status -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select input-style" id="SelectStatus">
                            <option value="">Select Status</option>
                            <option value="Active">Active</option>
                            <option value="InActive">InActive</option>
                        </select><br />
                    </div>

                    <!-- Attach Document -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Attach Document</label>
                        <input type="file" class="form-control input-style" id="AttachDocument" />
                    </div>


                    <style>
                        /* Style for the barcode button */
                        .input-group .btn {
                            background-color: #f0f0f0;
                        }

                        /* Basic table styles */
                        .table th,
                        .table td {
                            vertical-align: middle;
                            text-align: center;
                        }

                        #orderTableBody td {
                            text-align: center;
                        }

                        #totalQuantity,
                        #totalSubTotal {
                            font-weight: bold;
                        }
                    </style>

{{--
<div class="container">
    <div class="mb-3">
        <label for="productInput" class="form-label">Select Product</label>
        <div class="input-group">
            <button class="btn btn-outline-secondary" type="button" id="searchButton">
                <i class="fas fa-barcode"></i>
            </button>
            <input type="text" id="productInputData" class="form-control" placeholder="Please type product code or name..." />
        </div>
        <!-- Dropdown list to show matching products -->
        <ul id="productDropdown" class="list-group" style="position: absolute; z-index: 1000;"></ul>
    </div>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>SubTotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="orderTableBody">
            <!-- Dynamic Rows Will Be Added Here -->
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total</th>
                <td></td>
                <td id="totalQuantity">0</td>
                <td id="totalSubTotal">0.00</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>





<script>
    let allProducts = []; // To store all product data

 // Fetch and store all products when the page loads
 ProductDataShow();

 async function ProductDataShow() {
     try {
         let res = await axios.get("/api/product-list", HeaderToken());
         allProducts = res.data.ProductData;
     } catch (error) {
         console.error("Error occurred while fetching products:", error);
     }
 }

 // Search product by name or code
 document.getElementById('productInputData').addEventListener('input', function () {
     const searchValue = this.value.toLowerCase();
     const filteredProducts = allProducts.filter(product =>
         product.name.toLowerCase().includes(searchValue) || product.code.toLowerCase().includes(searchValue)
     );

     // Populate dropdown with filtered products
     const productDropdown = document.getElementById('productDropdown');
     productDropdown.innerHTML = '';
     filteredProducts.forEach(product => {
         const productItem = document.createElement('li');
         productItem.classList.add('list-group-item', 'list-group-item-action');
         productItem.innerText = `${product.name} (Code: ${product.code})`;
         productItem.dataset.productId = product.id;

         // Event listener for when the product is clicked
         productItem.addEventListener('click', function () {
             addProductToOrder(product); // Pass the selected product object directly
             productDropdown.innerHTML = ''; // Clear dropdown after selecting
             document.getElementById('productInputData').value = ''; // Clear the input field
         });

         productDropdown.appendChild(productItem);
     });
 });

 // Function to add product details to the order table
 function addProductToOrder(product) {
     // Check if product exists
     if (!product) {
         alert('Product not found');
         return;
     }

     // Create a new row for the order table
     const orderTableBody = document.getElementById('orderTableBody');
     const newRow = orderTableBody.insertRow();

     newRow.innerHTML = `
         <td>${product.name}</td>
         <td>${product.code}</td>
         <td>
             <input type="number" value="1" min="1" class="form-control quantity" />
         </td>
         <td>${product.price}</td>
         <td class="subtotal">${product.price}</td>
         <td>
             <button class="btn btn-danger" onclick="removeRow(this)">Remove</button>
         </td>
     `;

     // Add event listeners to update totals when quantity or discount changes
     newRow.querySelector('.quantity').addEventListener('input', updateTotals);

     // Update totals
     updateTotals();
 }

 // Function to update total quantities and subtotals
 function updateTotals() {
     let totalQuantity = 0;
     let totalSubTotal = 0;

     const rows = document.querySelectorAll('#orderTableBody tr');
     rows.forEach(row => {
         const quantity = row.querySelector('.quantity').value;
         const price = parseFloat(row.cells[3].innerText); // Price column

         // Calculate subtotal and update it in the row
         const subtotal = (quantity * price);
         row.querySelector('.subtotal').innerText = subtotal.toFixed(2);

         // Update totals
         totalQuantity += parseInt(quantity);
         totalSubTotal += parseFloat(subtotal);
     });

     document.getElementById('totalQuantity').innerText = totalQuantity;
     document.getElementById('totalSubTotal').innerText = totalSubTotal.toFixed(2);
 }

 // Function to remove a row
 function removeRow(button) {
     const row = button.parentElement.parentElement;
     row.parentElement.removeChild(row);
     updateTotals(); // Update totals after removing the row
 }

 // Event listener for the search button (Optional if you want to keep manual search functionality)
 document.getElementById('searchButton').addEventListener('click', function () {
     const searchValue = document.getElementById('productInputData').value;
     const product = allProducts.find(product => product.code === searchValue || product.name === searchValue);

     if (product) {
         addProductToOrder(product);
     } else {
         alert('Product not found');
     }
 });

 </script> --}}




 <div class="container">
    <div class="mb-3">
        <label for="productInput" class="form-label">Select Product</label>
        <div class="input-group">
            <button class="btn btn-outline-secondary" type="button" id="searchButton">
                <i class="fas fa-barcode"></i>
            </button>
            <input type="text" id="productInputData" class="form-control" placeholder="Please type product code or name..." />
        </div>
        <!-- Dropdown list to show matching products -->
        <ul id="productDropdown" class="list-group" style="position: absolute; z-index: 1000;"></ul>
    </div>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>SubTotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="orderTableBody">
            <!-- Dynamic Rows Will Be Added Here -->
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <td id="totalQuantity">0</td>
                <td id="totalSubTotal">0.00</td>
                <td></td>
            </tr>
            <!-- Additional Fields at the Bottom of Table -->
            <tr>
                <th colspan="5">Grand Subtotal</th>
                <td colspan="2"><input type="text" id="grandSubtotal" class="form-control" readonly></td>
            </tr>
            <tr>
                <th colspan="5">Discount</th>
                <td>
                    <input type="number" id="overallDiscount" value="0" min="0" class="form-control" />
                </td>
            </tr>
            <tr>
                <th colspan="5">Payment Method Select</th>
                <td>
                    <select id="paymentMethod" class="form-select payment-method">
                        <option value="" selected>Payment Method</option>
                        <option value="Cash">Cash</option>
                        <option value="Bkash">Bkash</option>
                        <option value="Nagad">Nagad</option>
                        <option value="Bank">Bank</option>
                    </select>
                    <!-- Input field for transaction details -->
                    <input type="text" id="paymentDetails" class="form-control" style="display: none;" placeholder="Enter transaction details" />
                </td>


                <!-- Input field that will be shown when selecting Bkash, Nagad, or Bank -->



            </tr>
            <tr>
                <th colspan="5">Paid</th>
                <td><input type="text" id="paidAmount" class="form-control"></td>
            </tr>
            <tr>
                <th colspan="5">Due</th>
                <td><input type="text" id="dueAmount" class="form-control" readonly></td>
            </tr>
        </tfoot>
    </table>
</div>

<script>
 // Get references to the select dropdown and the input field
 const paymentMethodSelect = document.getElementById('paymentMethod');
    const paymentDetailsInput = document.getElementById('paymentDetails');

    // Add event listener to the payment method select dropdown
    paymentMethodSelect.addEventListener('change', function() {
        const selectedMethod = this.value;

        if (selectedMethod === 'Bkash' || selectedMethod === 'Nagad' || selectedMethod === 'Bank') {
            // Show the input field for Bkash, Nagad, or Bank
            paymentDetailsInput.style.display = 'block';
            paymentDetailsInput.placeholder = `Enter ${selectedMethod} transaction details`;
        } else {
            // Hide the input field when Cash is selected or if no option is selected
            paymentDetailsInput.style.display = 'none';
            paymentDetailsInput.value = ''; // Clear the input value when hidden
        }
    });

    let allProducts = [];

    // Fetch and store all products when the page loads
    ProductDataShow();

    async function ProductDataShow() {
        try {
            let res = await axios.get("/api/product-list", HeaderToken());
            allProducts = res.data.ProductData;
        } catch (error) {
            console.error("Error occurred while fetching products:", error);
        }
    }

    // Search product by name or code
    document.getElementById('productInputData').addEventListener('input', function () {
        const searchValue = this.value.toLowerCase();
        const filteredProducts = allProducts.filter(product =>
            product.name.toLowerCase().includes(searchValue) || product.code.toLowerCase().includes(searchValue)
        );

        const productDropdown = document.getElementById('productDropdown');
        productDropdown.innerHTML = '';
        filteredProducts.forEach(product => {
            const productItem = document.createElement('li');
            productItem.classList.add('list-group-item', 'list-group-item-action');
            productItem.innerText = `${product.name} (Code: ${product.code})`;
            productItem.dataset.productId = product.id;

            productItem.addEventListener('click', function () {
                addProductToOrder(product);
                productDropdown.innerHTML = '';
                document.getElementById('productInputData').value = '';
            });

            productDropdown.appendChild(productItem);
        });
    });

    function addProductToOrder(product) {
        if (!product) {
            alert('Product not found');
            return;
        }

        const orderTableBody = document.getElementById('orderTableBody');
        const newRow = orderTableBody.insertRow();

        newRow.innerHTML = `
            <td>${product.name}</td>
            <td>${product.code}</td>
            <td>
                <input type="number" value="1" min="1" class="form-control quantity" />
            </td>
            <td>${product.price}</td>
            <td class="subtotal">${product.price}</td>
            <td>
                <button class="btn btn-danger" onclick="removeRow(this)">Remove</button>
            </td>
        `;

        newRow.querySelector('.quantity').addEventListener('input', updateTotals);

        updateTotals();
    }

    function updateTotals() {
        let totalQuantity = 0;
        let totalSubTotal = 0;

        const rows = document.querySelectorAll('#orderTableBody tr');
        rows.forEach(row => {
            const quantity = row.querySelector('.quantity').value;
            const price = parseFloat(row.cells[3].innerText);

            const subtotal = quantity * price;
            row.querySelector('.subtotal').innerText = subtotal.toFixed(2);

            totalQuantity += parseInt(quantity);
            totalSubTotal += parseFloat(subtotal);
        });

        document.getElementById('totalQuantity').innerText = totalQuantity;
        document.getElementById('totalSubTotal').innerText = totalSubTotal.toFixed(2);

        const overallDiscount = parseFloat(document.getElementById('overallDiscount').value) || 0;
        const grandSubtotal = totalSubTotal - overallDiscount;

        document.getElementById('grandSubtotal').value = grandSubtotal.toFixed(2);

        calculateDue();
    }

    document.getElementById('paidAmount').addEventListener('input', calculateDue);
    document.getElementById('overallDiscount').addEventListener('input', updateTotals);

    function calculateDue() {
        const grandSubtotal = parseFloat(document.getElementById('grandSubtotal').value) || 0;
        const paidAmount = parseFloat(document.getElementById('paidAmount').value) || 0;
        const dueAmount = grandSubtotal - paidAmount;

        document.getElementById('dueAmount').value = dueAmount.toFixed(2);
    }

    function removeRow(button) {
        const row = button.parentElement.parentElement;
        row.parentElement.removeChild(row);
        updateTotals();
    }

    document.getElementById('searchButton').addEventListener('click', function () {
        const searchValue = document.getElementById('productInputData').value;
        const product = allProducts.find(product => product.code === searchValue || product.name === searchValue);

        if (product) {
            addProductToOrder(product);
        } else {
            alert('Product not found');
        }
    });
</script>






                    <!-- Submit Button -->
                    <div class="col-lg-6">
                        <div class="upload-profile">
                            <button type="submit" class="submit">Submit</button>
                        </div>
                    </div>
                </div>
                <!-- Add Supplier Modal -->
                <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-content-popap">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addSupplierModalLabel">Add New Supplier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="upload-profile">
                                            <div class="item">
                                                <div class="img-box">
                                                    <svg width="32" height="32" viewBox="0 0 50 50"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <rect width="50" height="50"
                                                            fill="url(#pattern0_1204_6)" fill-opacity="0.5" />
                                                        <defs>
                                                            <pattern id="pattern0_1204_6"
                                                                patternContentWarehouses="objectBoundingBox"
                                                                width="1" height="1">
                                                                <use xlink:href="#image0_1204_6"
                                                                    transform="scale(0.005)" />
                                                            </pattern>
                                                            <image id="image0_1204_6" width="200"
                                                                height="200" />
                                                        </defs>
                                                    </svg>
                                                    <!-- Add an img element for the image preview -->
                                                    <img id="SuprilerimagePreview"
                                                        style="display:none; max-width:100%; height:auto;"
                                                        alt="Image Preview" />
                                                </div>

                                                <div class="profile-wrapper">
                                                    <label class="custom-file-input-wrapper">
                                                        <input type="file" class="custom-file-input"
                                                            aria-label="Upload Photo" id="SuprilerImage" />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6"></div>

                                    <div class="col-lg-6 mt-2">
                                        <label class="data">
                                            <input type="text" name="name" placeholder="Enter Name"
                                                id="SuprilerName" /><br />
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="data">
                                            <input type="text" name="company" class="input-style"
                                                placeholder="Enter Company Name" id="SuprilerCompany" /><br />
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="data">
                                            <input type="text" name="mobile" class="input-style"
                                                placeholder="Enter Mobile Number" id="SuprilerMobile" /><br />
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="data">
                                            <input type="text" name="address" class="input-style"
                                                placeholder="Enter Address" id="SuprilerAddress" /><br />
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="data">
                                            <input type="email" name="email" class="input-style"
                                                placeholder="Enter Email" id="SuprilerEmail" /><br />
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="country">
                                            <select name="status" class="input-style" id="SuplierSelectStatus">
                                                <option value="">Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="InActive">InActive</option>
                                            </select><br />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <a onclick="SupplierSave(event)" id="save-btn" class="btn btn-primary"
                                    style="width: auto;">Save Supplier</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modals -->
                {{-- WareHouse Model  --}}

                <div class="modal fade" id="addWarehouseModal" tabindex="-1"
                    aria-labelledby="addWarehouseModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-content-popap">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addWarehouseModalLabel">Add New Warehouse</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="data">
                                            <input type="text" name="warehouse_name"
                                                placeholder="Enter your WareHouse name" id="WarehouseName" /><br />
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="data">
                                            <input type="text" name="number" placeholder="Enter your number name"
                                                id="WarehouseNumber" /><br />
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="data">
                                            <input type="text" name="email" placeholder="Enter your email name"
                                                id="WarehouseEmail" /><br />
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="data">
                                            <input type="text" name="address"
                                                placeholder="Enter your Address name" id="WarehouseAddress" /><br />
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="country">
                                            <select name="status" class="form-control"
                                                id="id="WarehouseSelectStatus"" tabindex="-98">
                                                <option value="Received">Received</option>
                                                <option value="Partial">Partial</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Ordered">Ordered</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <a onclick="WarehouseSave(event)" id="save-btn" class="btn btn-primary"
                                            style="width: auto;">Save Warehouse</a>
                                    </div>
                                </div>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</section>
<!-- Finance- Pop Up Modal End -->



<script>
    async function SupplierSave(event) {
        event.preventDefault();
        try {
            let SuprilerName = document.getElementById('SuprilerName').value;
            let SuprilerCompany = document.getElementById('SuprilerCompany').value;
            let SuprilerMobile = document.getElementById('SuprilerMobile').value;
            let SuprilerAddress = document.getElementById('SuprilerAddress').value;
            let SuprilerEmail = document.getElementById('SuprilerEmail').value;
            let SuplierSelectStatus = document.getElementById('SuplierSelectStatus').value;
            let imgInput = document.getElementById('SuprilerImage');
            let imgFile = imgInput.files[0];

            // Validation
            if (!SuprilerName) {
                errorToast("Supplier Name is required!");
                return; // Exit the function if validation fails
            } else if (!SuprilerCompany) {
                errorToast("Company Name is required!");
                return;
            } else if (!SuprilerMobile) {
                errorToast("Mobile Number is required!");
                return;
            } else if (!SuprilerAddress) {
                errorToast("Address is required!");
                return;
            } else if (!SuprilerEmail) {
                errorToast("Email is required!");
                return;
            } else if (!SuplierSelectStatus) {
                errorToast("Status is required!");
                return;
            } else if (!imgFile) {
                errorToast("Photo is required!");
                return;
            }

            // Creating form data for submission
            let formData = new FormData();
            formData.append('name', SuprilerName);
            formData.append('company', SuprilerCompany);
            formData.append('mobile', SuprilerMobile);
            formData.append('address', SuprilerAddress);
            formData.append('email', SuprilerEmail);
            formData.append('status', SuplierSelectStatus);
            formData.append('img_url', imgFile); // Append image file

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            // Sending the form data to the server
            let res = await axios.post("/api/create-supriler", formData, config);

            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                document.getElementById("signup").reset(); // Reset form

                // Close the modal after saving
                const modal = document.getElementById('addSupplierModal');
                const modalInstance = bootstrap.Modal.getInstance(modal);
                modalInstance.hide();

                // Refresh the supplier list dynamically without reloading
                await refreshSupplierList(); // Call the function to refresh the supplier list
            } else {
                errorToast(res.data['message']);
            }
        } catch (e) {
            unauthorized(e.response.status);
        }
    }
</script>


<script>
    // Function to close the modal
    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'none'; // Hide the modal
    }

    async function WarehouseSave(event) {
        event.preventDefault(); // Stop form from submitting and reloading the page

        try {
            let WarehouseName = document.getElementById('WarehouseName').value;
            let WarehouseNumber = document.getElementById('WarehouseNumber').value;
            let WarehouseEmail = document.getElementById('WarehouseEmail').value;
            let WarehouseAddress = document.getElementById('WarehouseAddress').value;
            let WarehouseSelectStatus = document.getElementById('WarehouseSelectStatus').value;

            // Validation
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
            } else if (WarehouseSelectStatus === '' || WarehouseSelectStatus === 'Select Status') {
                errorToast("Select Status Required!");
                return false;
            }

            // Form Data
            let formData = new FormData();
            formData.append('warehouse_name', WarehouseName);
            formData.append('number', WarehouseNumber);
            formData.append('email', WarehouseEmail);
            formData.append('address', WarehouseAddress);
            formData.append('status', WarehouseSelectStatus);

            // Config for Axios
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers // Assuming this adds necessary auth headers
                }
            };

            // Sending POST request to the server
            let res = await axios.post("/api/create-warehouse", formData, config);

            // Handling response
            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                document.getElementById("signup").reset(); // Reset form after success

                // Close modal
                const modal = document.getElementById('addWarehouseModal');
                const modalInstance = bootstrap.Modal.getInstance(modal);
                modalInstance.hide();

                // Refresh the Warehouse list dynamically without reloading
                await refreshWarehouseList(); // Assuming this function refreshes the list

            } else {
                // Handle unsuccessful response
                errorToast(res.data['message']);
            }

        } catch (e) {
            // Handle unauthorized or other errors
            if (e.response && e.response.status === 401) {
                unauthorized(e.response.status);
            } else {
                errorToast("An error occurred. Please try again.");
            }
        }

        return false;
    }
</script>


<script>
    // Add Supplier
    function addSupplier() {
        let supplierName = document.getElementById('newSupplierName').value;
        if (supplierName) {
            let selectSupplier = document.getElementById('ProductSupplier');
            let newOption = document.createElement('option');
            newOption.value = supplierName;
            newOption.text = supplierName;
            selectSupplier.appendChild(newOption);

            document.getElementById('newSupplierName').value = '';
            let supplierModal = new bootstrap.Modal(document.getElementById('addSupplierModal'));
            supplierModal.hide();
        }
    }
</script>

<script>
    refreshWarehouseList();
    refreshSupplierList();

    async function refreshWarehouseList() {
        try {
            // Make a GET request to fetch the Warehouse list
            let res = await axios.get("/api/warehouse-list", HeaderToken());

            // Check if the response contains the necessary data
            let Warehouse = res.data.WarehouseData;

            // Generate the HTML options from the fetched Warehouse data
            let optionsHtmlWarehouse = Warehouse.map(Warehouse =>
                `<option value="${Warehouse.id}">${Warehouse.warehouse_name}</option>`
            ).join('');

            // Add the default "Select Warehouse" option at the top
            optionsHtmlWarehouse = `<option value="none" selected>Select Warehouse</option>` + optionsHtmlWarehouse;

            // Update the dropdown with the new options
            document.getElementById("ADDWareShop").innerHTML = optionsHtmlWarehouse;

        } catch (error) {
            console.error("Error occurred while fetching Warehouses:", error);
        }
    }

    async function refreshSupplierList() {
        try {
            // Make a GET request to fetch the supplier list
            let res = await axios.get("/api/supriler-list", HeaderToken());

            // Check if the response contains the necessary data
            let Supriler = res.data.SuprilerData;

            // Generate the HTML for the supplier options
            let optionsHtmlSupriler = Supriler.map(supplier =>
                `<option value="${supplier.id}">${supplier.name}</option>`
            ).join('');

            // Add the default "Select Supplier" option at the top
            optionsHtmlSupriler = `<option value="none" selected>Select Supplier</option>` + optionsHtmlSupriler;

            // Update the dropdown with the new options
            document.getElementById("ProductSupplier").innerHTML = optionsHtmlSupriler;

        } catch (error) {
            console.error("Error occurred while fetching suppliers:", error);
        }
    }

    // Add Warehouse
    function addWarehouse() {
        let WarehouseName = document.getElementById('newWarehouseName').value;
        if (WarehouseName) {
            let selectWarehouse = document.getElementById('ADDWareShop');
            let newOption = document.createElement('option');
            newOption.value = WarehouseName;
            newOption.text = WarehouseName;
            selectWarehouse.appendChild(newOption);

            document.getElementById('newWarehouseName').value = '';
            let WarehouseModal = new bootstrap.Modal(document.getElementById('addWarehouseModal'));
            WarehouseModal.hide();
        }
    }
</script>
