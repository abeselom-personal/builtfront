<!-- action buttons -->
@include('pages.types.components.misc.list-page-actions')
<!-- action buttons -->

<!--stats panel-->
@if(auth()->user()->is_team)
<div id="categories-stats-wrapper" class="stats-wrapper card-embed-fix">
    @if (@count($types ?? []) > 0) @include('misc.list-pages-stats') @endif
</div>
@endif
<!--stats panel-->

<!--categories table-->
<div class="card-embed-fix">
    @include('pages.types.components.table.wrapper')
</div>
<!--categories table-->
