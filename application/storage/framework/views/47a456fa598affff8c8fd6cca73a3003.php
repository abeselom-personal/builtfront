<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="type_<?php echo e($type->id); ?>">
    <td class="types_col_name">
        <?php echo e(str_limit($type->name ?? '---', 60)); ?>

        <!--default-->
        <?php if($type->category_system_default == 'yes'): ?>
        <span class="sl-icon-star text-warning p-l-5" data-toggle="tooltip"
            title="<?php echo e(cleanLang(__('lang.system_default'))); ?>"></span>
        <?php endif; ?>
    </td>
    <?php if(config('visibility.types_col_created_by')): ?>
    <td class="types_col_created_by">
        <img src="<?php echo e(getUsersAvatar($type->avatar_directory, $type->avatar_filename, $type->category_creatorid)); ?>"
            alt="user" class="img-circle avatar-xsmall">
        <?php echo e(checkUsersName($type->first_name, $type->category_creatorid)); ?>

    </td>
    <?php endif; ?>

    <?php if(config('visibility.types_col_date')): ?>
    <td class="types_col_date">
        <?php echo e(runtimeDate($type->category_created)); ?>

    </td>
    <?php endif; ?>

    <?php if(config('visibility.types_col_date')): ?>
    <td class="types_col_items"><?php echo e($type->count); ?></td>
    <?php endif; ?>

    <!--ticket email integration (email piping)-->
    <?php if(config('visibility.types_col_email_piping')): ?>
    <td class="types_col_email_piping">

        <!--imap is enabled-->
        <?php if($type->category_meta_4 == 'enabled'): ?>
        <span class="display-inline-block"><?php echo e($type->category_meta_5); ?></span>
        <?php endif; ?>

        <!--imap is disabled-->
        <?php if($type->category_meta_4 != 'enabled'): ?>
        <span class="label label-outline-default"><?php echo app('translator')->get('lang.disabled'); ?></span>
        <?php endif; ?>

        <!--edit imap email settings-->
        <span
            class="display-inline-block vm m-l-5 opacity-7 cursor-pointer data-toggle-action-tooltip edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
            data-toggle="modal" data-target="#commonModal"
            data-url="<?php echo e(url('/settings/tickets/emailintegration/category/'.$type->category_id)); ?>"
            data-loading-target="commonModalBody" data-modal-title="<?php echo e($page['department_email_integration'] ?? ''); ?>"
            data-action-url="<?php echo e(url('/settings/tickets/emailintegration/category/'.$type->category_id)); ?>"
            data-action-method="PUT" data-action-ajax-class="ajax-request"
            data-action-ajax-loading-target="types-td-container">
            <i class="sl-icon-settings"></i>
        </span>
    </td>
    <td class="types_col_email_last_checked">
        <?php echo e(runtimeDate($type->category_meta_2 ?? '---')); ?>

    </td>
    <td class="types_col_email_last_fetched_count">
        <?php echo e($type->category_meta_23 ?? '---'); ?>

    </td>
    <td class="types_col_email_total_count">
        <?php echo e($type->category_meta_24 ?? '---'); ?>

    </td>
    <?php endif; ?>

    <td class="types_col_action actions_column">
        <!--action button-->
        <span class="list-table-action dropdown font-size-inherit">
        <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="<?php echo e(cleanLang(__('lang.delete_item'))); ?>"
                data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
                data-url="<?php echo e(url('/')); ?>/types/<?php echo e($type->id); ?>">
                <i class="sl-icon-trash"></i>
            </button>

            <!--edit-->
            <button type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
    class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
    data-toggle="modal" data-target="#commonModal"
    data-url="<?php echo e(url('/types/'.$type->id.'/edit')); ?>"
    data-loading-target="commonModalBody" data-modal-title="<?php echo e($page['edit_modal_action_title'] ?? ''); ?>"
    data-action-url="<?php echo e(url('/types/'.$type->id)); ?>"
    data-action-method="PUT" data-action-ajax-class="ajax-request"
    data-action-ajax-loading-target="types-td-container">
    <i class="sl-icon-note"></i>
</button>
            <!--team members-->
            <?php if(request('filter_category_type')=='project'): ?>
            <button type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-warning btn-circle btn-sm edit-add-modal-button  js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal"
                data-url="<?php echo e(url('/types/'.$type->category_id.'/team')); ?>"
                data-loading-target="commonModalBody" data-modal-title="<?php echo e($page['edit_team_members'] ?? ''); ?>"
                data-action-url="<?php echo e(url('/types/'.$type->category_id.'/team')); ?>" data-action-method="put"
                data-action-ajax-class="" data-action-ajax-loading-target="types-td-container">
                <i class="sl-icon-people"></i>
            </button>
            <?php endif; ?>
        </span>
        <!--action button-->
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<?php /**PATH /var/www/html/application/resources/views/pages/types/components/table/ajax.blade.php ENDPATH**/ ?>