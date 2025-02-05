<div class="row">
    <div class="col-lg-12">

        @if(config('system.settings2_extras_dimensions_billing') == 'enabled')
        <div class="modal-selector">
            <!--item-->
            <div class="form-group row">
                <label class="col-sm-12 col-lg-3 text-left control-label col-form-label">Product Type</label>
                <div class="col-sm-12 col-lg-9">
                    <select class="select2-basic form-control form-control-sm select2-preselected" id="item_types"
                        name="item_types" data-preselected="{{ $item->item_types ?? ''}}">
                        <option value="standard">Standard Product</option>
                        <option value="dimensions">Dimensions Product</option>
                    </select>
                </div>
            </div>
        </div>
        @else
        <input type="hidden" name="item_types" value="standard">
        @endif

        <!--description-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label  required">{{ cleanLang(__('lang.name')) }}*</label>
            <div class="col-sm-12 col-lg-9">
                <textarea class="w-100" id="item_description" rows="5"
                    name="item_description">{{ $item->item_description ?? '' }}</textarea>
            </div>
        </div>


        <!--rate-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label required">{{ cleanLang(__('lang.rate')) }}*</label>
            <div class="col-sm-12 col-lg-9 input-group input-group-sm">
                <span class="input-group-addon">{{ config('system.settings_system_currency_symbol') }}</span>
                <input type="number" name="item_rate" id="item_rate" class="form-control form-control-sm"
                    value="{{ $item->item_rate ?? '' }}">
            </div>
        </div>

        @if(config('system.settings2_extras_dimensions_billing') == 'enabled')
        <div id="items_dimensions_container" class="{{ runtimeVisibilityItemsType($item->item_types ?? '') }}">

            <!--item_dimensions_length-->
            <div class="form-group row">
                <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required">Length</label>
                <div class="col-sm-12 col-lg-9">
                    <input type="number" class="form-control form-control-sm" id="item_dimensions_length"
                        name="item_dimensions_length" value="{{ $item->item_dimensions_length ?? '' }}">
                </div>
            </div>


            <!--item_dimensions_width-->
            <div class="form-group row">
                <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required">Width</label>
                <div class="col-sm-12 col-lg-9">
                    <input type="number" class="form-control form-control-sm" id="item_dimensions_width"
                        name="item_dimensions_width" value="{{ $item->item_dimensions_width ?? '' }}">
                </div>
            </div>

        </div>
        @endif


        <!--units-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label  required">{{ cleanLang(__('lang.units')) }}*
                <span class="align-middle text-info font-16" data-toggle="tooltip"
                    title="{{ cleanLang(__('lang.units_examples')) }}" data-placement="top"><i
                        class="ti-info-alt"></i></span></label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm" id="item_unit" name="item_unit"
                    value="{{ $item->item_unit ?? '' }}">
            </div>
        </div>

        <!--category and type-->
        <div class="form-group row">
            <!--category-->
            <div class="col-sm-12 col-lg-6">
                <label class="text-left control-label col-form-label required">{{ cleanLang(__('lang.category')) }}*</label>
                <select class="select2-basic form-control form-control-sm" id="item_categoryid" name="item_categoryid">
                    @foreach($categories as $category)
                    <option value="{{ $category->category_id }}"
                        {{ runtimePreselected($item->item_categoryid ?? '', $category->category_id) }}>{{
                        runtimeLang($category->category_name) }}</option>
                    @endforeach
                </select>
            </div>
            <!--type-->
            <div class="col-sm-12 col-lg-6">
                <label class="text-left control-label col-form-label required">{{ cleanLang(__('lang.type')) }}*</label>
                <select class="select2-basic form-control form-control-sm" id="item_typeid" name="item_typeid">
                    @foreach($item_types as $type)
                    <option value="{{ $type->id }}"
                        {{ runtimePreselected($item->item_id ?? '', $type->id) }}>{{
                        runtimeLang($type->name) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!--item_tax_status-->
        <input type="hidden" name="item_tax_status" value="taxable">

        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required">Cost</label>
            <div class="col-sm-12 col-lg-9">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">{{ config('system.settings_system_currency_symbol') }}</span>
                    <input type="number" class="form-control form-control-sm" id="item_cost" name="item_cost"
                        value="{{ $item->cost ?? '' }}" step="0.01" min="0">
                </div>
            </div>
        </div>

        <!-- Price Input -->
        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required">Price</label>
            <div class="col-sm-12 col-lg-9">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">{{ config('system.settings_system_currency_symbol') }}</span>
                    <input type="number" class="form-control form-control-sm" id="item_price" name="item_price"
                        value="{{ $item->price ?? '' }}" min="0">
                </div>
            </div>
        </div>

        <!-- Markup and Margin Inputs -->
        <div class="form-group row">
            <div class="col-sm-12 col-lg-6">
                <label class="text-left control-label col-form-label required">Markup (%)</label>
                <input type="number" class="form-control form-control-sm" id="item_markup" name="item_markup"
                    value="{{ $item->markup ?? '' }}" ] min="0">
            </div>
            <div class="col-sm-12 col-lg-6">
                <label class="text-left control-label col-form-label required">Margin (%)</label>
                <input type="number" class="form-control form-control-sm" id="item_margin" name="item_margin"
                    value="{{ $item->margin ?? '' }}" ] min="0">
            </div>
        </div>




        <!--item_notes_estimatation - toggle-->
        <div class="spacer row">
            <div class="col-sm-12 col-lg-8">
                <span class="title">@lang('lang.estimation_notes')</span> <span class="align-middle text-info font-16" data-toggle="tooltip" title="@lang('lang.estimate_notes_info')"
                    data-placement="top"><i class="ti-info-alt"></i></span>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="switch  text-right">
                    <label>
                        <input type="checkbox" name="more_information" id="item_notes_estimatation_toggle"
                            class="js-switch-toggle-hidden-content" data-target="item_notes_estimatation_panel">
                        <span class="lever switch-col-light-blue"></span>
                    </label>
                </div>
            </div>
        </div>
        <!--item_notes_estimatation-->
        <div class="hidden p-t-10" id="item_notes_estimatation_panel">
            <div class="form-group row">
                <div class="col-sm-12">
                    <textarea class="form-control form-control-sm tinymce-textarea-plain" rows="5"
                        name="item_notes_estimatation"
                        id="item_notes_estimatation">{{ $item->item_notes_estimatation ?? '' }}</textarea>
                </div>
            </div>
        </div>




        <!--item_notes_production [not currently used]-->
        <div class="form-group row hidden">
            <label
                class="col-sm-12 text-left control-label col-form-label required">@lang('lang.production_notes')</label>
            <div class="col-sm-12 ">
                <textarea class="form-control form-control-sm tinymce-textarea-plain" rows="5"
                    name="item_notes_production"
                    id="item_notes_production">{{ $item->item_notes_production ?? '' }}</textarea>
            </div>
        </div>



        <!--pass source-->
        <input type="hidden" name="source" value="{{ request('source') }}">
        <!--notes-->
        <div class="row">
            <div class="col-12">
                <div><small><strong>* {{ cleanLang(__('lang.required')) }}</strong></small></div>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize elements
    const costInput = document.getElementById('item_cost');
    const priceInput = document.getElementById('item_price');
    const markupInput = document.getElementById('item_markup');
    const marginInput = document.getElementById('item_margin');
    let lastModified = null;
    let timeoutId;

    function calculateValues(source) {
        const cost = parseFloat(costInput.value) || 0;
        let price = parseFloat(priceInput.value) || 0;
        let markup = parseFloat(markupInput.value) || 0;
        let margin = parseFloat(marginInput.value) || 0;

        try {
            switch (source) {
                case 'cost':
                    lastModified = 'cost';
                    if (cost <= 0) break;
                    if (price > 0) {
                        // Calculate from price if it exists
                        markup = ((price - cost) / cost) * 100;
                        margin = ((price - cost) / price) * 100;
                    } else if (markup > 0) {
                        // Calculate from markup
                        price = cost * (1 + markup / 100);
                        margin = ((price - cost) / price) * 100;
                    } else if (margin > 0) {
                        // Calculate from margin
                        price = cost / (1 - margin / 100);
                        markup = ((price - cost) / cost) * 100;
                    }
                    break;

                case 'price':
                    lastModified = 'price';
                    markup = cost ? ((price - cost) / cost) * 100 : 0;
                    margin = price ? ((price - cost) / price) * 100 : 0;
                    break;

                case 'markup':
                    lastModified = 'markup';
                    if (cost > 0) {
                        price = cost * (1 + markup / 100);
                        margin = ((price - cost) / price) * 100;
                    }
                    break;

                case 'margin':
                    lastModified = 'margin';
                    if (cost > 0 && margin < 100) {
                        price = cost / (1 - margin / 100);
                        markup = ((price - cost) / cost) * 100;
                    }
                    break;
            }

            // Update fields with formatted values
            if (!isNaN(price) && price >= 0 && source !== 'price') priceInput.value = price.toFixed(2);
            if (!isNaN(markup) && markup >= 0 && source !== 'markup') markupInput.value = markup.toFixed(2);
            if (!isNaN(margin) && margin >= 0 && margin < 100 && source !== 'margin') marginInput.value = margin.toFixed(2);

        } catch (e) {
            console.error('Calculation error:', e);
        }
    }

    // Calculate initial values if all fields are present
    function initializeCalculations() {
        if (costInput.value && priceInput.value && markupInput.value && marginInput.value) {
            // If all fields have values, assume they're correct from server
            return;
        }

        // Otherwise calculate missing values
        if (costInput.value && priceInput.value) {
            calculateValues('price');
        } else if (costInput.value && markupInput.value) {
            calculateValues('markup');
        } else if (costInput.value && marginInput.value) {
            calculateValues('margin');
        } else if (priceInput.value) {
            calculateValues('price');
        }
    }

    // Initial calculation
    initializeCalculations();

    // Event listeners
    [costInput, priceInput, markupInput, marginInput].forEach(input => {
        input.addEventListener('input', function() {
            clearTimeout(timeoutId);
            const field = this.id.split('_')[1];
            timeoutId = setTimeout(() => calculateValues(field), 300);
        });

        input.addEventListener('blur', function() {
            const field = this.id.split('_')[1];
            calculateValues(field);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elements
        const costInput = document.getElementById('item_cost');
        const priceInput = document.getElementById('item_price');
        const markupInput = document.getElementById('item_markup');
        const marginInput = document.getElementById('item_margin');
        let lastModified = null;
        let timeoutId;

        // Calculation function
        function calculateValues(source) {
            const cost = parseFloat(costInput.value) || 0;
            let price = parseFloat(priceInput.value) || 0;
            let markup = parseFloat(markupInput.value) || 0;
            let margin = parseFloat(marginInput.value) || 0;

            try {
                switch (source) {
                    case 'cost':
                        if (cost <= 0) break;
                        if (price > 0) {
                            markup = ((price - cost) / cost) * 100;
                            margin = ((price - cost) / price) * 100;
                        } else if (markup > 0) {
                            price = cost * (1 + markup / 100);
                            margin = ((price - cost) / price) * 100;
                        } else if (margin > 0) {
                            price = cost / (1 - margin / 100);
                            markup = ((price - cost) / cost) * 100;
                        }
                        break;

                    case 'price':
                        markup = cost ? ((price - cost) / cost) * 100 : 0;
                        margin = price ? ((price - cost) / price) * 100 : 0;
                        break;

                    case 'markup':
                        if (cost > 0) {
                            price = cost * (1 + markup / 100);
                            margin = ((price - cost) / price) * 100;
                        }
                        break;

                    case 'margin':
                        if (cost > 0 && margin < 100) {
                            price = cost / (1 - margin / 100);
                            markup = ((price - cost) / cost) * 100;
                        }
                        break;
                }

                // Update fields without triggering events
                if (source !== 'price' && !isNaN(price) && price >= 0) {
                    priceInput.value = price.toFixed(2);
                }
                if (source !== 'markup' && !isNaN(markup) && markup >= 0) {
                    markupInput.value = markup.toFixed(2);
                }
                if (source !== 'margin' && !isNaN(margin) && margin >= 0 && margin < 100) {
                    marginInput.value = margin.toFixed(2);
                }

            } catch (e) {
                console.error('Calculation error:', e);
            }
        }

        // Event listeners with debounce
        [costInput, priceInput, markupInput, marginInput].forEach(input => {
            input.addEventListener('input', function(e) {
                clearTimeout(timeoutId);
                const field = e.target.id.split('_')[1]; // Extracts 'cost', 'price', etc. from ID
                timeoutId = setTimeout(() => calculateValues(field), 300);
            });
        });

        // Initial calculation based on provided values
        if (costInput.value && priceInput.value) {
            calculateValues('price');
        } else if (costInput.value && markupInput.value) {
            calculateValues('markup');
        } else if (costInput.value && marginInput.value) {
            calculateValues('margin');
        }
    });
</script>
