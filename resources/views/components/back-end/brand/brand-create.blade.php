<!-- Finance- Pop Up Modal Start -->
<section id="myModal" class="modal">
    <div class="modal-content">
        <div id="popup-modal">
            <form id="signup" onsubmit="return Save(event)">
                <div class="modal-title">
                    <h1>Create Brand</h1>
                    <span class="close-btn close" onclick="closeModal()">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="upload-profile">
                            <div class="item">
                                <div class="img-box">
                                    <!-- Image Preview -->
                                    <img id="imagePreview" src="{{ asset('images/default.jpg') }}" alt="Image Preview" style="width: 50px; height: 50px; object-fit: cover; display: block;" />
                                </div>

                                <div class="profile-wrapper">
                                    <label class="custom-file-input-wrapper">
                                        <input type="file" class="custom-file-input" aria-label="Upload Photo" id="BrandImg" accept="image/*" onchange="previewImage(event)" />
                                    </label>
                                    <p>PNG, JPEG or GIF (up to 1 MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6"></div>

                    <div class="col-lg-6 mt-4">
                        <label class="data">
                            <input type="text" name="brand_name" placeholder="Brand name" id="BrandName" /><br />
                        </label>
                    </div>
                    <div class="col-lg-6 mt-4">
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
//    async function Save(event) {
//     event.preventDefault(); // Prevent the form from submitting and refreshing the page
//     try {
//         let BrandName = document.getElementById('BrandName').value;
//         let SelectStatus = document.getElementById('SelectStatus').value;
//         let imgInput = document.getElementById('BrandImg');
//         let imgFile = imgInput.files[0];

//         if (BrandName.length === 0) {
//             errorToast("Brand Name Required !");
//             return; // Exit the function if validation fails
//         } else if (SelectStatus.length === 0) {
//             errorToast("Status Required !");
//             return;
//         } else if (!imgInput.files || imgInput.files.length === 0) {
//             errorToast("Photo Required !");
//             return;
//         } else {
//             let formData = new FormData();
//             formData.append('brand_name', BrandName);
//             formData.append('status', SelectStatus);
//             formData.append('img', imgFile);

//             const config = {
//                 headers: {
//                     'content-type': 'multipart/form-data',
//                     ...HeaderToken().headers
//                 }
//             }

//             let res = await axios.post("/api/create-brand", formData, config);

//             if (res.data['status'] === "success") {
//                 successToast(res.data['message']);
//                 document.getElementById("signup").reset();
//                 document.getElementById('imagePreview').src = "{{ asset('images/default.jpg') }}"; // Reset the image preview

//                 // Use the global closeModal function to close the modal properly
//                 const modal = document.getElementById('myModal');
//                 closeModal(modal);  // Close the modal smoothly

//                 await getList();  // Refresh your brand list or any other actions needed
//             } else {
//                 errorToast(res.data['message']);
//             }
//         }
//     } catch (e) {
//         unauthorized(e.response.status);
//     }
// }



// Brand Create Script
async function Save(event) {
    event.preventDefault(); // Prevent the form from submitting and refreshing the page
    try {
        let BrandName = document.getElementById('BrandName').value;
        let SelectStatus = document.getElementById('SelectStatus').value;
        let imgInput = document.getElementById('BrandImg');
        let imgFile = imgInput.files[0];

        // Validation
        if (BrandName.length === 0) {
            errorToast("Brand Name Required !");
            return; // Exit the function if validation fails
        } else if (SelectStatus.length === 0) {
            errorToast("Status Required !");
            return;
        } else if (!imgInput.files || imgInput.files.length === 0) {
            errorToast("Photo Required !");
            return;
        }

        // Prepare form data
        let formData = new FormData();
        formData.append('brand_name', BrandName);
        formData.append('status', SelectStatus);
        formData.append('img', imgFile);

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        // Make the request
        let res = await axios.post("/api/create-brand", formData, config);

        if (res.data['status'] === "success") {
            successToast(res.data['message']);
            document.getElementById("signup").reset();
            document.getElementById('imagePreview').src = "{{ asset('images/default.jpg') }}"; // Reset the image preview

            // Use the global closeModal function to close the modal properly
            const modal = document.getElementById('myModal');
            closeModal(modal);  // Close the modal smoothly

            await getList();  // Refresh your brand list or any other actions needed
        } else {
            errorToast(res.data['message']);
        }
    } catch (e) {
        unauthorized(e.response.status);
    }
}

</script>
