@foreach($types as $type)
<!--each row-->
<tr id="type_{{ $type->id }}">
    <td class="types_col_name">
        {{ str_limit($type->name ?? '---', 60) }}
        <!--default-->
        @if($type->category_system_default == 'yes')
        <span class="sl-icon-star text-warning p-l-5" data-toggle="tooltip"
            title="{{ cleanLang(__('lang.system_default')) }}"></span>
        @endif
    </td>
    @if(config('visibility.types_col_created_by'))
    <td class="types_col_created_by">
        <img src="{{ getUsersAvatar($type->avatar_directory, $type->avatar_filename, $type->category_creatorid) }}"
            alt="user" class="img-circle avatar-xsmall">
        {{ checkUsersName($type->first_name, $type->category_creatorid)  }}
    </td>
    @endif

    @if(config('visibility.types_col_date'))
    <td class="types_col_date">
        {{ runtimeDate($type->category_created) }}
    </td>
    @endif

    @if(config('visibility.types_col_date'))
    <td class="types_col_items">{{ $type->count }}</td>
    @endif

    <!--ticket email integration (email piping)-->
    @if(config('visibility.types_col_email_piping'))
    <td class="types_col_email_piping">

        <!--imap is enabled-->
        @if($type->category_meta_4 == 'enabled')
        <span class="display-inline-block">{{ $type->category_meta_5 }}</span>
        @endif

        <!--imap is disabled-->
        @if($type->category_meta_4 != 'enabled')
        <span class="label label-outline-default">@lang('lang.disabled')</span>
        @endif

        <!--edit imap email settings-->
        <span
            class="display-inline-block vm m-l-5 opacity-7 cursor-pointer data-toggle-action-tooltip edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
            data-toggle="modal" data-target="#commonModal"
            data-url="{{ url('/settings/tickets/emailintegration/category/'.$type->category_id) }}"
            data-loading-target="commonModalBody" data-modal-title="{{ $page['department_email_integration'] ?? '' }}"
            data-action-url="{{ url('/settings/tickets/emailintegration/category/'.$type->category_id) }}"
            data-action-method="PUT" data-action-ajax-class="ajax-request"
            data-action-ajax-loading-target="types-td-container">
            <i class="sl-icon-settings"></i>
        </span>
    </td>
    <td class="types_col_email_last_checked">
        {{ runtimeDate($type->category_meta_2 ?? '---') }}
    </td>
    <td class="types_col_email_last_fetched_count">
        {{ $type->category_meta_23 ?? '---' }}
    </td>
    <td class="types_col_email_total_count">
        {{ $type->category_meta_24 ?? '---' }}
    </td>
    @endif

    <td class="types_col_action actions_column">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">
        <button type="button" title="{{ cleanLang(__('lang.delete')) }}"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="{{ cleanLang(__('lang.delete_item')) }}"
                data-confirm-text="{{ cleanLang(__('lang.are_you_sure')) }}" data-ajax-type="DELETE"
                data-url="{{ url('/') }}/types/{{ $type->id }}">
                <i class="sl-icon-trash"></i>
            </button>

            <!--edit-->
            <button type="button" title="{{ cleanLang(__('lang.edit')) }}"
    class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
    data-toggle="modal" data-target="#commonModal"
    data-url="{{ url('/types/'.$type->id.'/edit') }}"
    data-loading-target="commonModalBody" data-modal-title="{{ $page['edit_modal_action_title'] ?? '' }}"
    data-action-url="{{ url('/types/'.$type->id) }}"
    data-action-method="PUT" data-action-ajax-class="ajax-request"
    data-action-ajax-loading-target="types-td-container">
    <i class="sl-icon-note"></i>
</button>
            <!--team members-->
            @if(request('filter_category_type')=='project')
            <button type="button" title="{{ cleanLang(__('lang.edit')) }}"
                class="data-toggle-action-tooltip btn btn-outline-warning btn-circle btn-sm edit-add-modal-button  js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal"
                data-url="{{ url('/types/'.$type->category_id.'/team') }}"
                data-loading-target="commonModalBody" data-modal-title="{{ $page['edit_team_members'] ?? '' }}"
                data-action-url="{{ url('/types/'.$type->category_id.'/team') }}" data-action-method="put"
                data-action-ajax-class="" data-action-ajax-loading-target="types-td-container">
                <i class="sl-icon-people"></i>
            </button>
            @endif
        </span>
        <!--action button-->
    </td>
</tr>
@endforeach
<!--each row-->
