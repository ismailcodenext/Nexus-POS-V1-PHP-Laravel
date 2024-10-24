<div id="custom-modal-2" class="custom-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="mt-3 text-danger">Delete!</h3>
                <p class="mb-3" style="font-size: 18px;">Once deleted, you can't get it back.</p>
                <input class="d-none" id="deleteID" />
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn mx-2 delete-custom-close"
                        style="background: #016a70; color: #fff;" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="itemDelete()" type="button" id="confirmDelete"
                        class="btn bg-gradient-danger" style="background: #bd0000; color: #fff;">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
// Delete Brand Script
async function itemDelete() {
    try {
        let id = document.getElementById('deleteID').value;
        showLoader(); // Show loader while the request is being processed

        // Make the request to delete the brand
        let res = await axios.post("/api/delete-brand", { id: id }, HeaderToken());

        hideLoader(); // Hide loader after request completion
        const modal = document.getElementById('custom-modal-2');
        openModal(modal);
        if (res.data.status === "success") {
            successToast(res.data.message);
            const Deletemodal1 = document.getElementById('custom-modal-2');
            closeModal(Deletemodal1);
            await getList(); // Refresh the brand list
        } else {
            errorToast(res.data.message);
        }
    } catch (e) {
        unauthorized(e.response.status);
    }
}
</script>
