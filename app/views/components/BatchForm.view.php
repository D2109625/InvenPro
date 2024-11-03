<div id="batch-form-modal" class="modal">
    <div class="modal-content">
        <div class="row">
            <span class="material-symbols-rounded close-btn">close</span>
        </div>
        <h1 class="modal-header">Add New Batch</h1>
        <form id="batch-form" action="/batch/new" method="post">
            <label for="prod-id">Product ID</label>
            <input id="prod-id" type="text" name="id" required>
            <label for="prod-bno">Batch No.</label>
            <input id="prod-bno" type="text" name="bno" required>
            <label for="prod-price">Price</label>
            <input id="prod-price" type="number" step="0.01" min="0" name="price" required>
            <label for="prod-qty">Quantity</label>
            <input id="prod-qty" type="number" step="0.001" min="0" name="qty" required>
            <label for="prod-mfd">Manufacture Date</label>
            <input id="prod-mfd" type="date" name="mfd" required>
            <label for="prod-exp">Expiry Date</label>
            <input id="prod-exp" type="date" name="exp" required>
            <div class="error">
                <span class="material-symbols-rounded">error</span>
                <span id="error-msg" class="error-msg"></span>
            </div>
            <div class="row action-btns">
                <span class="loader" style="margin: 24px 12px 0px; font-size: 12px"></span>
                <button type="button" class="btn btn-secondary">Cancel</button>
                <button id="submit-btn" type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>