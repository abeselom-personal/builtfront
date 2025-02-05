<div class="row">
    <div class="col-lg-12">
        <!--title-->
        <div class="form-group row">
            <label class="col-12 text-left control-label col-form-label required">{{ $page['form_label_type_name'] ?? '' }}</label>
            <div class="col-12">
                <input type="text" class="form-control form-control-sm" id="name" name="name"
                    value="{{ $type->name ?? '' }}">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            </div>
        </div>

        <!--migrate to another category-->
        @if(isset($page['section']) && $page['section'] == 'edit')
        <div class="form-group row">
            <label class="col-12 text-left control-label col-form-label required">{{ $page['form_label_move_items'] ?? '' }} ({{ cleanLang(__('lang.optional')) }})</label>
            <div class="col-12">
                <select class="select2-basic form-control form-control-sm" id="migrate" name="migrate">
                    <option>&nbsp;</option>
                    @foreach($types as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif
    </div>
</div>
