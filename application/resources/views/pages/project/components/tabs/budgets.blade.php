<!-- Include jQuery and Bootstrap JS/CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Buttons to Show Forms -->
<button type="button"
    class="billing-mode-only-item btn btn-secondary btn-rounded btn-sm btn-rounded-icon actions-modal-button js-ajax-ux-request reset-target-modal-form"
    data-toggle="modal" data-target="#categoryModal"><i class="mdi mdi-cart-outline text-themecontrast"></i>
    <span>{{ cleanLang(__('lang.product_category')) }}</span></button>

<button type="button"
    class="billing-mode-only-item btn btn-secondary btn-rounded btn-sm btn-rounded-icon actions-modal-button js-ajax-ux-request reset-target-modal"
    onclick="showAddItemForm()"><i class="mdi mdi-playlist-plus text-themecontrast"></i>
    <span>{{ cleanLang(__('lang.product_item')) }}</span>
</button>


<!-- Form for Adding Items -->
<div id="itemForm" style="display: none;" class="mb-4">
    <div class="row">
        <div class="col-md-2">
            <label>Item Name</label>
            <input type="text" class="form-control" id="itemName" required>
        </div>
        <div class="col-md-2">
            <label>Quantity</label>
            <input type="number" class="form-control" id="itemQuantity" step="1" required>
        </div>
        <div class="col-md-2">
            <label>Cost</label>
            <input type="number" class="form-control" id="itemCost" step="0.01" required>
        </div>
        <div class="col-md-2">
            <label>Markup (%)</label>
            <input type="number" class="form-control" id="itemMarkup" step="0.01" required>
        </div>
        <div class="col-md-2">
            <label>Margin (%)</label>
            <input type="number" class="form-control" id="itemMargin" step="0.01" >
        </div>
        <div class="col-md-2">
            <label>Price </label>
            <input type="number" class="form-control" id="itemPrice" step="0.01" >
        </div>
        <div class="p-2 col-md-3 align-self-end">
            <button type="button" class="btn waves-effect waves-light btn-xs btn-info" onclick="addItem()">Add Item</button>
            <button type="button" class="btn btn-secondary" onclick="hideForm()">Cancel</button>
        </div>
    </div>
</div>
<!-- <button type="button" class="btn btn-success mb-3" onclick="saveBudget()">
    <i class="mdi mdi-content-save"></i> Save Budget
</button> -->


<table class="table" id="itemsTable">
<thead>
        <tr>
            <th>Description</th>
            <th>Quantity</th>
            <th>Cost</th>
            <th>Markup (%)</th>
            <th>Margin (%)</th>
            <th>Price</th>
            <th>Total</th>
            <th>Actions</th> <!-- New column -->

        </tr>
    </thead>

    <tbody>
        <!-- Dynamic content will be added here -->
    </tbody>
    <tfoot>
        <tr>
            <th colspan="7" class="text-right">Subtotal</th>
            <td class="x-total text-right" id="subtotal">0.00</td>
        </tr>
        <tr class="x-tax">
            <th colspan="7" class="text-right">Tax</th>
            <td class="x-total text-right" id="taxTotal">0.00</td>
        </tr>
        <tr>
            <th colspan="7" class="text-right">Grand Total</th>
            <td class="x-total text-right" id="grandTotal">0.00</td>
        </tr>
    </tfoot>
</table>


<!-- Analysis Section -->
<div class="card mt-4">
    <div class="card-header">
        <h5>Analysis</h5>
    </div>
    <div class="card-body">
        <p><strong>Total Cost:</strong> The sum of all item costs is <span id="analysisTotalCost">0.00</span>.</p>
        <p><strong>Total Price:</strong> The sum of all item costs is <span id="analysisTotalPrice">0.00</span>.</p>
        <p><strong>Average Markup:</strong> On average, items have a markup of <span id="analysisAvgMarkup">0.00</span>%.</p>
        <p><strong>Average Margin:</strong> On average, items yield a margin of <span id="analysisAvgMargin">0.00</span>%.</p>
        <p><strong>Insight:</strong> A higher average margin indicates better profitability per item.</p>
    </div>
</div>

<!-- Modal for Category Selection -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Select Items from Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Category Selection Dropdown -->
                <div class="form-group">
                    <label for="categorySelect">Select Category</label>
                    <select class="form-control" id="categorySelect">
                        <option value="all">All Categories</option>
                        <!-- Dynamically populated categories will go here -->
                    </select>
                </div>

                <!-- Items List -->
                <div id="itemsList">
                    <!-- Dynamically populated items will go here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addSelectedItems()">Add Selected Items</button>
            </div>
        </div>
    </div>
</div>

<script>
    let selectedItems = {};

    const data = @json($data)

    // Function to calculate margin from markup
    function calculateMargin(markup) {
        return (markup / (100 + markup)) * 100;
    }

    // Function to calculate markup from margin
    function calculateMarkup(margin) {
        return (margin / (100 - margin)) * 100;
    }

// Modified updateTotalsAndAverages to handle margin
function updateTotalsAndAverages() {
    let totalCost = 0, totalPrice = 0, totalMarkup = 0,
        totalMargin = 0, count = 0;

    $('#itemsTable tbody tr').each(function() {
        const item = selectedItems[$(this).data('id')];
        totalCost += item.cost * item.quantity;
        totalPrice += item.price * item.quantity;
        totalMarkup += item.markup;
        totalMargin += item.margin;
        count++;
    });

    // Update analysis section
    $('#analysisTotalCost').text(totalCost.toFixed(2));
    $('#analysisTotalPrice').text(totalPrice.toFixed(2));
    $('#analysisAvgMarkup').text(count ? (totalMarkup / count).toFixed(2) : '0.00');
    $('#analysisAvgMargin').text(count ? (totalMargin / count).toFixed(2) : '0.00');

    // Update totals
    $('#subtotal').text(totalPrice.toFixed(2));
    const tax = totalPrice * 0.10;
    $('#taxTotal').text(tax.toFixed(2));
    $('#grandTotal').text((totalPrice + tax).toFixed(2));
}

    // Function to add a new item to the table
    function addItem() {
        const id = Date.now();
        const name = document.getElementById('itemName').value.trim();
        const quantity = parseFloat(document.getElementById('itemQuantity').value) || 0;
        const cost = parseFloat(document.getElementById('itemCost').value) || 0;
        const markup = parseFloat(document.getElementById('itemMarkup').value) || 0;
        const price = cost * (1 + markup / 100);
        const margin = calculateMargin(markup);

        if (!name || cost <= 0 || markup < 0) {
            alert('Please enter valid values for item name, cost, and markup.');
            return;
        }

        selectedItems[id] = {
            name,
            quantity,
            cost,
            price,
            markup,
            margin
        };
        addTableRow(id);
        hideForm();
        updateTotalsAndAverages();
    }
    function addTableRow(id) {
    const item = selectedItems[id];
    const row = `
        <tr data-id="${id}">
            <td>${item.name}</td>
            <td><input type="number" class="form-control quantity" value="${item.quantity}" min="0"></td>
            <td><input type="number" class="form-control cost" value="${item.cost.toFixed(2)}" step="0.01"></td>
            <td><input type="number" class="form-control markup" value="${item.markup.toFixed(2)}" step="0.01"></td>
            <td class="margin">${item.margin.toFixed(2)}%</td>
            <td class="price">${item.price.toFixed(2)}</td>
            <td class="total">${(item.quantity * item.price).toFixed(2)}</td>
                        <td>
                <button class="btn btn-danger btn-sm" onclick="deleteRow(${id})">
                    ×
                </button>
            </td>

        </tr>
    `;
    $('#itemsTable tbody').append(row);

    // Add event listeners
    $(`tr[data-id="${id}"] input`).on('input', function() {
        updateRowTotals(id);
        updateTotalsAndAverages();
    });
}

function deleteRow(id) {
    // Remove from DOM
    $(`tr[data-id="${id}"]`).remove();
    // Remove from selectedItems
    delete selectedItems[id];
    // Update totals
    updateTotalsAndAverages();
}

function updateRowTotals(id) {
    const row = $(`tr[data-id="${id}"]`);
    const quantity = parseFloat(row.find('.quantity').val()) || 0;
    const cost = parseFloat(row.find('.cost').val()) || 0;
    const markup = parseFloat(row.find('.markup').val()) || 0;

    // Calculate derived values
    const margin = calculateMargin(markup);
    const price = cost * (1 + markup / 100);
    const total = quantity * price;

    // Update row cells
    row.find('.margin').text(margin.toFixed(2) + '%');
    row.find('.price').text(price.toFixed(2));
    row.find('.total').text(total.toFixed(2));

    // Update stored data
    selectedItems[id] = {
        ...selectedItems[id],
        quantity,
        cost,
        markup,
        margin,
        price,
        total
    };
}

    // Function to show the add item form
    function showAddItemForm() {
        document.getElementById('itemForm').style.display = 'block';
    }

    // Function to hide the add item form
    function hideForm() {
        document.getElementById('itemForm').style.display = 'none';
        clearForm();
    }

    // Function to clear the form inputs
    function clearForm() {
        document.getElementById('itemName').value = '';
        document.getElementById('itemCost').value = '';
        document.getElementById('itemMarkup').value = '';
        document.getElementById('itemMargin').value = '';
    }

    // Function to populate the modal with categories and items
    function populateCategoryModal() {
        const categories = {};
        data.data.forEach(item => {
            const categoryId = item.category_id;
            if (!categories[categoryId]) {
                categories[categoryId] = {
                    name: item.category_name,
                    items: []
                };
            }
            categories[categoryId].items.push(item);
        });

        // Populate the category dropdown
        const categorySelect = document.getElementById('categorySelect');
        Object.keys(categories).forEach(categoryId => {
            const option = document.createElement('option');
            option.value = categoryId;
            option.textContent = categories[categoryId].name;
            categorySelect.appendChild(option);
        });

        // Populate the items list
        const itemsList = document.getElementById('itemsList');
        itemsList.innerHTML = ''; // Clear existing items
        Object.keys(categories).forEach(categoryId => {
            const category = categories[categoryId];
            const categoryHeader = document.createElement('h5');
            categoryHeader.textContent = category.name;
            itemsList.appendChild(categoryHeader);

            category.items.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.className = 'form-check';
                itemDiv.innerHTML = `
          <input class="form-check-input" type="checkbox" value="${item.item_id}" id="item_${item.item_id}">
          <label class="form-check-label" for="item_${item.item_id}">
            ${item.item_description} (Cost: ${item.cost}, Markup: ${item.markup}%, Margin: ${item.margin}%)
          </label>
        `;
                itemsList.appendChild(itemDiv);
            });
        });
    }

    // Function to add selected items to the table
    function addSelectedItems() {
        const selectedItems = [];
        document.querySelectorAll('#itemsList input[type="checkbox"]:checked').forEach(checkbox => {
            const itemId = checkbox.value;
            const item = data.data.find(item => item.item_id == itemId);
            if (item) {
                selectedItems.push(item);
            }
        });

        selectedItems.forEach(item => {
            addItemToTable(item);
        });

        // Close the modal
        $('#categoryModal').on('hidden.bs.modal', function() {
            $('.modal-backdrop').remove();
        });
        $('.close, [data-dismiss="modal"]').on('click', function() {
            $('#categoryModal').modal('hide');
            $('.modal-backdrop').remove(); // Remove leftover backdrop

        });
    }

    function findExistingItem(name, cost, markup) {
    let existingId = null;
    $('#itemsTable tbody tr').each(function() {
        const rowName = $(this).find('td:eq(0)').text().trim();
        const rowCost = parseFloat($(this).find('.cost').val());
        const rowMarkup = parseFloat($(this).find('.markup').val());
        if (rowName === name && rowCost === cost && rowMarkup === markup) {
            existingId = $(this).data('id');
            return false; // break loop
        }
    });
    return existingId;
}

function addItemToTable(item) {
    const name = item.item_description;
    const cost = parseFloat(item.cost) || 0;
    const markup = parseFloat(item.markup) || 0;
    const existingId = findExistingItem(name, cost, markup);

    if (existingId) {
        const qtyInput = $(`tr[data-id="${existingId}"] .quantity`);
        qtyInput.val(parseInt(qtyInput.val()) + 1);
    } else {
        const id = Date.now();
        selectedItems[id] = {
            name,
            cost,
            markup,
            quantity: 1, // Default quantity
            price: cost * (1 + markup / 100),
            margin: calculateMargin(markup)
        };
        addTableRow(id);
    }
    updateTotalsAndAverages();
}

    // Call the function to populate the modal when the modal is shown
    $('#categoryModal').on('show.bs.modal', function() {
        populateCategoryModal();
    });

    // Add event listeners for markup in the form
    document.addEventListener('DOMContentLoaded', () => {
        const markupInput = document.getElementById('itemMarkup');
        const marginInput = document.getElementById('itemMargin');

        markupInput.addEventListener('input', () => {
            const markup = parseFloat(markupInput.value) || 0;
            const margin = calculateMargin(markup);
            marginInput.value = margin.toFixed(2);
        });

        marginInput.addEventListener('input', () => {
            const margin = parseFloat(marginInput.value) || 0;
            const markup = calculateMarkup(margin);
            markupInput.value = markup.toFixed(2);
        });
    });
    $('#categoryModal').on('hidden.bs.modal', function() {
        $('.modal-backdrop').remove(); // Remove leftover backdrop
        $('body').removeClass('modal-open'); // Remove modal-open class to fix scrolling issues
    });

    $('.close, [data-dismiss="modal"]').on('click', function() {
        $('#categoryModal').modal('hide');
        $('.modal-backdrop').remove(); // Remove leftover backdrop

    });
</script>
