@extends('layouts.app')

@section('content')
<div class="container">
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
                    <input type="text" class="form-control" id="newBrandName" placeholder="Enter Brand Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addBrand()">Save Brand</button>
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
                    <input type="text" class="form-control" id="newCategoryName" placeholder="Enter Category Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addCategory()">Save Category</button>
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
                    <input type="text" class="form-control" id="newUnitName" placeholder="Enter Unit Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addUnit()">Save Unit</button>
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
                    <input type="text" class="form-control" id="newSupplierName" placeholder="Enter Supplier Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addSupplier()">Save Supplier</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
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
</script>
@endsection
