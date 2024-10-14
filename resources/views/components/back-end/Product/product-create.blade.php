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
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Brand<span class="text-danger">*</span></label>
                        <select class="form-select" class="input-style" id="ProductBrand" aria-label="Default select example">
                            <option value="none">Select Brand</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Category<span class="text-danger">*</span></label>
                        <select class="form-select" class="input-style" id="ProductCategory" aria-label="Default select example">
                            <option value="none">Select Category</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Unit<span class="text-danger">*</span></label>
                        <select class="form-select" class="input-style" id="ProductUnit" aria-label="Default select example">
                            <option value="none">Select Unit</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label">Supplier<span class="text-danger">*</span></label>
                        <select class="form-select" class="input-style" id="ProductSupplier" aria-label="Default select example">
                            <option value="none">Select Supplier</option>
                        </select>
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
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Finance- Pop Up Modal End -->

<script>

ProductBrandShow();
ProductCategoryShow();
ProductUnitShow();
ProductSuprilerShow();
    async function ProductBrandShow() {
        try {
            let res = await axios.get("/api/brand-list", HeaderToken());
            let Brand = res.data.BrandData;
            let optionsHtmlBrand = Brand.map(Brand => `<option value="${Brand.id}">${Brand.name}</option>`).join('');

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
            let optionsHtmlCategory = Category.map(Category => `<option value="${Category.id}">${Category.category_name}</option>`).join('');

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
            let optionsHtmlUnit = Unit.map(Unit => `<option value="${Unit.id}">${Unit.unit_name}</option>`).join('');

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
            let optionsHtmlSupriler = Supriler.map(Supriler => `<option value="${Supriler.id}">${Supriler.name}</option>`).join('');

            // Add the "Select Supriler" option as the first option
            optionsHtmlSupriler = `<option value="none" selected>Select Supriler</option>` + optionsHtmlSupriler;

            $("#ProductSupplier").html(optionsHtmlSupriler);

        } catch (error) {
            console.error("Error occurred while fetching sessions:", error);
        }
    }




    // Function to close the modal
    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'none'; // Hide the modal
    }

    async function Save(event) {
        event.preventDefault();  // Stop form from submitting and reloading the page
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
            }

            else if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Product Photo Required !");
                return;
            }
            else {
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
