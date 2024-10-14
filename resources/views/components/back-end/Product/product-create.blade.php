<!-- Finance- Pop Up Modal Start -->
<section id="myModal" class="modal">
    <div class="modal-content">
        <div id="popup-modal">
            <form id="signup" onsubmit="return Save(event)">
                <div class="modal-title">
                    <h1>Create Product</h1>
                    <span class="close-btn close" onclick="closeModal()">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
                <div class="row">
                    <!-- Brand Input with Plus Icon -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Brand <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-select input-style" id="ProductBrand"
                            aria-label="Default select example">
                            <option value="none">Select Brand</option>
                        </select>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addBrandModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
            
                    <!-- Category Input with Plus Icon -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-select input-style" id="ProductCategory"
                            aria-label="Default select example">
                            <option value="none">Select Category</option>
                        </select>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
            
                    <!-- Unit Input with Plus Icon -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Unit <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-select input-style" id="ProductUnit"
                                            aria-label="Default select example">
                                            <option value="none">Select Unit</option>
                                        </select>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addUnitModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
            
                    <!-- Supplier Input with Plus Icon -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Supplier <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-select input-style" id="ProductSupplier"
                            aria-label="Default select example">
                            <option value="none">Select Supplier</option>
                        </select>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex align-items-center mt-3">
                            <img class="mb-4 me-3" id="newImg" style="width: 80px" src="{{asset('images/default.jpg')}}" />
                            <div>
                                <label class="form-label">Photo</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])"
                                    type="file" class="form-control" id="ProductImage">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" class="input-style" class="input-style" name="name" id="ProductName" /><br />
                    </div>


                    <div class="col-md-6 mb-4">
                        <label class="form-label">Price <span class="text-danger">*</span></label>
                        <input type="text" class="input-style" name="price" class="input-style" id="ProductPrice" /><br />
                    </div>



                    <div class="col-md-6 mb-4">
                        <label class="form-label">Sell Price <span class="text-danger">*</span></label>
                        <input type="text" class="input-style" name="sell_price" class="input-style" id="ProductSell" /><br />
                    </div>



                    <div class="col-md-6 mb-4">
                        <label class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" class="input-style" name="date" class="input-style" id="ProductDate" /><br />
                    </div>



                    <div class="col-md-6 mb-4">
                        <label class="form-label">Code <span class="text-danger">*</span></label>
                        <input type="text" class="input-style" name="date" class="input-style" id="ProductCode" /><br />
                    </div>


                    <div class="col-lg-6">
                        <label class="country">
                            <label class="form-label">Status<span class="text-danger">*</span></label>
                            <select name="status" class="input-style" id="SelectStatus">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select><br />
                        </label>
                        <div class="upload-profile">
                            <button type="submit" class="submit">Submit</button>
                        </div>
                </div>
            
                <!-- Modals -->
                
                <!-- Add Brand Modal -->
                <div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addBrandModalLabel">Add New Brand</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

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
                                                <img id="BrandimagePreview" style="display:none; max-width:100%; height:auto;" alt="Image Preview" />
                                            </div>
            
                                            <div class="profile-wrapper">
                                                <label class="custom-file-input-wrapper">
                                                    <input type="file" class="custom-file-input" aria-label="Upload Photo" id="CreateBrandImg"  />
                                                </label>
                                                <p>PNG, JPEG or GIF (up to 1 MB)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-lg-6"></div>
            
                                <div class="col-lg-6">
                                    <label class="data mt-2">
                                        <input type="text" name="name" class="input-style" placeholder="Brand name" id="CreateBrandName" /><br />
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <label class="country">
                                        <select name="status" class="input-style" id="BrandSelectStatus">
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="InActive">InActive</option>
                                        </select><br />
                                    </label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a onclick="BrandSave(event)" id="save-btn" class="btn btn-primary" style="width: auto;">Save Brand</a>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Add Category Modal -->
                <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <form id="signup" onsubmit="return false;"> <!-- Disable form submit for now -->
                                        <div class="col-lg-6">
                                            <label class="data">
                                                <input type="text" name="category_name" class="input-style" placeholder="Enter your Category name" id="CategoryName" /><br />
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="country">
                                                <select name="status" class="input-style" id="CategorySelectStatus">
                                                    <option value="">Select Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="InActive">InActive</option>
                                                </select><br />
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- Changed Save Category button as per your request -->
                                <a onclick="CategorySave(event)" id="save-btn" class="btn btn-primary" style="width: auto;">Save</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Add Unit Modal -->
                <div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="addUnitModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addUnitModalLabel">Add New Unit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="data">
                                            <input type="text" name="unit_name" placeholder="Enter your Unit name" id="UnitName" /><br />
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="country">
                                            <select name="status" id="UnitSelectStatus">
                                                <option value="">Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="InActive">InActive</option>
                                            </select><br />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a onclick="UnitSave(event)" id="save-btn" class="btn btn-primary" style="width: auto;">Save Unit</a>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Add Supplier Modal -->
                <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addSupplierModalLabel">Add New Supplier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
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
                                                    <img id="SuprilerimagePreview" style="display:none; max-width:100%; height:auto;" alt="Image Preview" />
                                                </div>
                
                                                <div class="profile-wrapper">
                                                    <label class="custom-file-input-wrapper">
                                                        <input type="file" class="custom-file-input" aria-label="Upload Photo" id="SuprilerImage"  />
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
                                            <select name="status" class="input-style" id="SuplierSelectStatus" >
                                                <option value="">Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="InActive">InActive</option>
                                            </select><br />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a onclick="SupplierSave(event)" id="save-btn" class="btn btn-primary" style="width: auto;">Save Supplier</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modals -->
            </form>
        </div>
    </div>
</section>
<!-- Finance- Pop Up Modal End -->




<script>

    document.getElementById('BrandImg').addEventListener('change', function (event) {
        const imgFile = event.target.files[0];
        const BrandimgPreview = document.getElementById('BrandimagePreview');
    
        if (imgFile) {
            const reader = new FileReader();
            reader.onload = function (e) {
                BrandimgPreview.src = e.target.result; // Set the image source to the file data
                BrandimgPreview.style.display = 'block'; // Show the image preview
            }
            reader.readAsDataURL(imgFile); // Read the file as a data URL
        } else {
            BrandimgPreview.src = ""; // Clear the preview if no file is selected
            BrandimgPreview.style.display = 'none'; // Hide the preview
        }
    });
    
    
    
        async function BrandSave(event) {
        event.preventDefault();
        try {
    
    
            let CreateBrandName = document.getElementById('CreateBrandName').value;
            let BrandSelectStatus = document.getElementById('BrandSelectStatus').value;
    
            let imgInput = document.getElementById('CreateBrandImg');
            let imgFile = imgInput.files[0];
    
            // Validation
            if (CreateBrandName.length === 0) {
                errorToast("Brand Name Required !");
                return; // Exit the function if validation fails
            } else if (BrandSelectStatus.length === 0) {
                errorToast("Status Required !");
                return;
            }
            else if (!imgFile) {
                errorToast("Photo is required!");
            } else {
                // Creating form data for submission
                let formData = new FormData();
                formData.append('name', CreateBrandName);
                formData.append('status', BrandSelectStatus);
                formData.append('img_url', imgFile); // Append image file
    
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                }
    
                // Sending the form data to the server
                let res = await axios.post("/api/create-brand", formData, config);
    
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



<script>
    async function CategorySave(event) {
        event.preventDefault();  // Stop the form from submitting and reloading the page
        
        try {
            let CategoryName = document.getElementById('CategoryName').value;
            let CategorySelectStatus = document.getElementById('CategorySelectStatus').value;

            // Basic validation
            if (CategoryName.length === 0) {
                errorToast("Category Name Required!");
                return false;
            } else if (CategorySelectStatus === '' || CategorySelectStatus === 'Select Status') {
                errorToast("Status Required!");
                return false;
            }

            // Prepare form data
            let formData = new FormData();
            formData.append('category_name', CategoryName);
            formData.append('status', CategorySelectStatus);

            // Axios request configuration
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            // Send the POST request
            let res = await axios.post("/api/create-category", formData, config);

            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                document.getElementById("signup").reset();

                const modal = document.getElementById('addCategoryModal'); // Update to correct modal ID
                const modalInstance = bootstrap.Modal.getInstance(modal);
                modalInstance.hide(); // Close the modal smoothly

                await getList();  // Refresh the category list after creation
            } else {
                errorToast(res.data['message']);
            }
        } catch (e) {
            unauthorized(e.response.status);
        }
        return false;
    }
</script>

<script>

    document.getElementById('SuprilerImage').addEventListener('change', function (event) {
        const imgFile = event.target.files[0];
        const SuprilerimgPreview = document.getElementById('SuprilerimagePreview');
    
        if (imgFile) {
            const reader = new FileReader();
            reader.onload = function (e) {
                SuprilerimgPreview.src = e.target.result; // Set the image source to the file data
                SuprilerimgPreview.style.display = 'block'; // Show the image preview
            }
            reader.readAsDataURL(imgFile); // Read the file as a data URL
        } else {
            SuprilerimgPreview.src = ""; // Clear the preview if no file is selected
            SuprilerimgPreview.style.display = 'none'; // Hide the preview
        }
    });
    
    
    
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
            } else if (!SuprilerCompany) {
                errorToast("Company Name is required!");
            } else if (!SuprilerMobile) {
                errorToast("Mobile Number is required!");
            } else if (!SuprilerAddress) {
                errorToast("Address is required!");
            } else if (!SuprilerEmail) {
                errorToast("Email is required!");
            } else if (!SuplierSelectStatus) {
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
                formData.append('status', SuplierSelectStatus);
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
    



<script>
    // Function to close the modal
    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'none'; // Hide the modal
    }

    async function UnitSave(event) {
        event.preventDefault();  // Stop form from submitting and reloading the page
        try {
            let UnitName = document.getElementById('UnitName').value;
            let UnitSelectStatus = document.getElementById('UnitSelectStatus').value;

            if (UnitName.length === 0) {
                errorToast("Unit Name Required!");
                return false;
            } else if (UnitSelectStatus === '' || UnitSelectStatus === 'Select Status') {
                errorToast("Status Required!");
                return false;
            } else {
                let formData = new FormData();
                formData.append('unit_name', UnitName);
                formData.append('status', UnitSelectStatus);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                };

                let res = await axios.post("/api/create-unit", formData, config);

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




<script>
    ProductBrandShow();
    ProductCategoryShow();
    ProductUnitShow();
    ProductSuprilerShow();
    async function ProductBrandShow() {
        try {
            let res = await axios.get("/api/brand-list", HeaderToken());
            let Brand = res.data.BrandData;
            let optionsHtmlBrand = Brand.map(Brand => `<option value="${Brand.id}">${Brand.name}</option>`).join(
            '');

            // Add the "Select Brand" option as the first option
            optionsHtmlBrand = `<option value="none" selected>Select Brand</option>` + optionsHtmlBrand;

            $("#ProductBrand").html(optionsHtmlBrand);

        } catch (error) {
            console.error("Error occurred while fetching Brand:", error);
        }
    }


    async function ProductCategoryShow() {
        try {
            let res = await axios.get("/api/category-list", HeaderToken());
            let Category = res.data.CategoryData;
            let optionsHtmlCategory = Category.map(Category =>
                `<option value="${Category.id}">${Category.category_name}</option>`).join('');

            // Add the "Select Category" option as the first option
            optionsHtmlCategory = `<option value="none" selected>Select Category</option>` + optionsHtmlCategory;

            $("#ProductCategory").html(optionsHtmlCategory);

        } catch (error) {
            console.error("Error occurred while fetching sessions:", error);
        }
    }




    async function ProductUnitShow() {
        try {
            let res = await axios.get("/api/unit-list", HeaderToken());
            let Unit = res.data.UnitData;
            let optionsHtmlUnit = Unit.map(Unit => `<option value="${Unit.id}">${Unit.unit_name}</option>`).join(
            '');

            // Add the "Select Unit" option as the first option
            optionsHtmlUnit = `<option value="none" selected>Select Unit</option>` + optionsHtmlUnit;

            $("#ProductUnit").html(optionsHtmlUnit);

        } catch (error) {
            console.error("Error occurred while fetching sessions:", error);
        }
    }



    async function ProductSuprilerShow() {
        try {
            let res = await axios.get("/api/supriler-list", HeaderToken());
            let Supriler = res.data.SuprilerData;
            let optionsHtmlSupriler = Supriler.map(Supriler =>
                `<option value="${Supriler.id}">${Supriler.name}</option>`).join('');

            // Add the "Select Supriler" option as the first option
            optionsHtmlSupriler = `<option value="none" selected>Select Supriler</option>` + optionsHtmlSupriler;

            $("#ProductSupplier").html(optionsHtmlSupriler);

        } catch (error) {
            console.error("Error occurred while fetching sessions:", error);
        }
    }




// Add Brand
function addBrand() {
    let brandName = document.getElementById('newBrandName').value;
    if (brandName) {
        let selectBrand = document.getElementById('ProductBrand');
        let newOption = document.createElement('option');
        newOption.value = brandName;
        newOption.text = brandName;
        selectBrand.appendChild(newOption);

        // Close the modal after saving
        document.getElementById('newBrandName').value = ''; // Reset input field
        let brandModal = new bootstrap.Modal(document.getElementById('addBrandModal'));
        brandModal.hide();
    }
}

// Add Category
function addCategory() {
    let categoryName = document.getElementById('newCategoryName').value;
    if (categoryName) {
        let selectCategory = document.getElementById('ProductCategory');
        let newOption = document.createElement('option');
        newOption.value = categoryName;
        newOption.text = categoryName;
        selectCategory.appendChild(newOption);

        document.getElementById('newCategoryName').value = '';
        let categoryModal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
        categoryModal.hide();
    }
}

// Add Unit
function addUnit() {
    let unitName = document.getElementById('newUnitName').value;
    if (unitName) {
        let selectUnit = document.getElementById('ProductUnit');
        let newOption = document.createElement('option');
        newOption.value = unitName;
        newOption.text = unitName;
        selectUnit.appendChild(newOption);

        document.getElementById('newUnitName').value = '';
        let unitModal = new bootstrap.Modal(document.getElementById('addUnitModal'));
        unitModal.hide();
    }
}

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



    // Function to close the modal
    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'none'; // Hide the modal
    }

    async function Save(event) {
        event.preventDefault(); // Stop form from submitting and reloading the page
        try {
            let ProductBrand = document.getElementById('ProductBrand').value;
            let ProductCategory = document.getElementById('ProductCategory').value;
            let ProductUnit = document.getElementById('ProductUnit').value;
            let ProductSupplier = document.getElementById('ProductSupplier').value;
            let ProductName = document.getElementById('ProductName').value;
            let ProductPrice = document.getElementById('ProductPrice').value;
            let ProductSell = document.getElementById('ProductSell').value;
            let ProductDate = document.getElementById('ProductDate').value;
            let ProductCode = document.getElementById('ProductCode').value;
            let SelectStatus = document.getElementById('SelectStatus').value;
            let imgInput = document.getElementById('ProductImage');
            let imgFile = imgInput.files[0];

            if (ProductBrand.length === 0) {
                errorToast("Product Brand Required!");
                return false;
            } else if (ProductCategory.length === 0) {
                errorToast("Product Category Required!");
                return false;
            } else if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Product Photo Required !");
                return;
            } else {
                let formData = new FormData();
                formData.append('brand_id', ProductBrand);
                formData.append('category_id', ProductCategory);
                formData.append('unit_id', ProductUnit);
                formData.append('suppliers_id', ProductSupplier);
                formData.append('name', ProductName);
                formData.append('price', ProductPrice);
                formData.append('sell_price', ProductSell);
                formData.append('date', ProductDate);
                formData.append('status', SelectStatus);
                formData.append('code', ProductCode);
                formData.append('img', imgFile);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                };

                let res = await axios.post("/api/create-product", formData, config);

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("signup").reset();
                    const modal = document.getElementById('myModal');
                    closeModal(modal); // Close the modal smoothly

                    await getList(); // Refresh the list after creation
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
