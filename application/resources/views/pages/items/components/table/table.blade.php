<div class="card count-{{ @count($grouped_items ?? []) }}" id="items-table-wrapper">
    <div class="card-body">
        <div>
            <div class="table-responsive list-table-wrapper">
                <table id="items-list-table" class="table m-t-0 m-b-0 table-hover no-wrap item-list" data-page-size="10">
                    @foreach ($grouped_items as $category)
                        <tr class="category-header" id="category-header-{{ $loop->index }}">
                            <td colspan="8">
                                <div class="category-toggle" ">
                                    <span class="toggle-icon" data-toggle="collapse" data-target="#category-{{ $loop->index }}" aria-expanded="false" aria-controls="category-{{ $loop->index }}">
                                        <i class="ti ti-folder"></i>
                                    </span>
                                    <strong>{{ $category['name'] ?? 'Unnamed Category' }}</strong>
                                    <span>({{ count($category['items'] ?? []) }} items)</span>
                                </div>
                            </td>
                        </tr>

                        <!-- Items List for the Category -->
                        <tr id="category-{{ $loop->index }}" class="category-items collapse">
                            <td colspan="8">
                                <table class="table m-t-0 m-b-0 table-hover no-wrap item-list">
                                    <thead>
                                        <tr>
                                            @if(config('visibility.items_col_checkboxes'))
                                            <th class="list-checkbox-wrapper">
                                                <span class="list-checkboxes display-inline-block w-px-20">
                                                    <input type="checkbox" class="filled-in chk-col-light-blue select-item-checkbox" data-category-index="{{ $loop->index }}">
                                                    <label></label>
                                                </span>
                                            </th>
                                            @endif
                                            <th class="items_col_description">
                                                <a class="js-ajax-ux-request js-list-sorting"
                                                    id="sort_item_description" href="javascript:void(0)"
                                                    data-url="{{ urlResource('/items?action=sort&orderby=item_description&sortorder=asc') }}">
                                                    {{ cleanLang(__('lang.description')) }}<span class="sorting-icons"><i class="ti-arrows-vertical"></i></span>
                                                </a>
                                            </th>
                                            <th class="items_col_rate">
                                                <a class="js-ajax-ux-request js-list-sorting" id="sort_item_rate"
                                                    href="javascript:void(0)"
                                                    data-url="{{ urlResource('/items?action=sort&orderby=item_rate&sortorder=asc') }}">
                                                    {{ cleanLang(__('lang.rate')) }}<span class="sorting-icons"><i class="ti-arrows-vertical"></i></span>
                                                </a>
                                            </th>
                                            <th class="items_col_unit">
                                                <a class="js-ajax-ux-request js-list-sorting" id="sort_item_unit"
                                                    href="javascript:void(0)"
                                                    data-url="{{ urlResource('/items?action=sort&orderby=item_unit&sortorder=asc') }}">
                                                    {{ cleanLang(__('lang.unit')) }}<span class="sorting-icons"><i class="ti-arrows-vertical"></i></span>
                                                </a>
                                            </th>
                                            @if(config('visibility.items_col_category'))
                                            <th class="items_col_category">
                                                <a class="js-ajax-ux-request js-list-sorting" id="sort_category"
                                                    href="javascript:void(0)"
                                                    data-url="{{ urlResource('/items?action=sort&orderby=category&sortorder=asc') }}">
                                                    {{ cleanLang(__('lang.category')) }}<span class="sorting-icons"><i class="ti-arrows-vertical"></i></span>
                                                </a>
                                            </th>
                                            @endif
                                            <th class="items_col_margin">
                                                <a class="js-ajax-ux-request js-list-sorting" id="sort_margin"
                                                    href="javascript:void(0)"
                                                    data-url="{{ urlResource('/items?action=sort&orderby=margin&sortorder=asc') }}">
                                                    @lang('lang.margin')<span class="sorting-icons"><i class="ti-arrows-vertical"></i></span>
                                                </a>
                                            </th>
                                            <th class="items_col_markup">
                                                <a class="js-ajax-ux-request js-list-sorting" id="sort_markup"
                                                    href="javascript:void(0)"
                                                    data-url="{{ urlResource('/items?action=sort&orderby=markup&sortorder=asc') }}">
                                                    @lang('lang.markup')<span class="sorting-icons"><i class="ti-arrows-vertical"></i></span>
                                                </a>
                                            </th>
                                            <!-- <th class="items_col_count_sold">
                                                <a class="js-ajax-ux-request js-list-sorting" id="sort_count_sold"
                                                    href="javascript:void(0)"
                                                    data-url="{{ urlResource('/items?action=sort&orderby=count_sold&sortorder=asc') }}">
                                                    @lang('lang.number_sold')<span class="sorting-icons"><i class="ti-arrows-vertical"></i></span>
                                                </a>
                                            </th> -->
                                            <th class="items_col_amount_sold">
                                                <a class="js-ajax-ux-request js-list-sorting" id="cost"
                                                    href="javascript:void(0)"
                                                    data-url="{{ urlResource('/items?action=sort&orderby=amount_sold&sortorder=asc') }}">
                                                    @lang('lang.cost')<span class="sorting-icons"><i class="ti-arrows-vertical"></i></span>
                                                </a>
                                            </th>
                                            <th class="items_col_amount_sold">
                                                <a class="js-ajax-ux-request js-list-sorting" id="price"
                                                    href="javascript:void(0)"
                                                    data-url="{{ urlResource('/items?action=sort&orderby=price&sortorder=asc') }}">
                                                    @lang('lang.price')<span class="sorting-icons"><i class="ti-arrows-vertical"></i></span>
                                                </a>
                                            </th>
                                            @if(config('visibility.items_col_action'))
                                            <th class="items_col_action">
                                                <a href="javascript:void(0)">{{ cleanLang(__('lang.action')) }}</a>
                                            </th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody id="items-td-container">
                                        @include('pages.items.components.table.ajax', ['items' => $category['items']])
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle category visibility on folder click
    function toggleCategoryVisibility(categoryIndex) {
        const categoryRow = document.getElementById('category-' + categoryIndex);
        const selectAllCheckbox = document.getElementById('select-all-' + categoryIndex);

        // Toggle category visibility
        $(categoryRow).collapse('toggle');

        // Ensure the "Select All" checkbox is properly checked or unchecked based on the items visibility
        updateSelectAllCheckbox(categoryIndex);
    }

    // Update the "Select All" checkbox based on item selection
    function updateSelectAllCheckbox(categoryIndex) {
        const checkboxes = document.querySelectorAll(`#category-${categoryIndex} .select-item-checkbox`);
        const selectAllCheckbox = document.getElementById('select-all-' + categoryIndex);

        let checkedCount = 0;
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                checkedCount++;
            }
        });

        // If all items are selected, check the "Select All" checkbox
        if (checkedCount === checkboxes.length) {
            selectAllCheckbox.checked = true;
        } else {
            selectAllCheckbox.checked = false;
        }
    }

    // Listen for "Select All" checkbox change
    document.querySelectorAll('.select-all-checkbox').forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            const categoryIndex = this.getAttribute('data-category-index');
            const checkboxes = document.querySelectorAll(`#category-${categoryIndex} .select-item-checkbox`);

            checkboxes.forEach((checkbox) => {
                checkbox.checked = this.checked;
            });
        });
    });
</script>
