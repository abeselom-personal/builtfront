@if($packages && $label && $prop)
    <tr class="">
        <td class="p-3">
            <p>{{ $label }}</p>
        </td>
        @forelse($packages as $package)
            <?php if(!is_array($package)) $package = $package->attributesToArray(); ?>
            <td class="p-3 text-center">
                @if($package[$prop] == 'yes')
                    <img src="{{ asset('/public/frontend-v2/pricing/tic.png') }}" alt="" class="mx-auto" />
                @elseif($package[$prop] == 'no')
                    <img src="{{ asset('/public/frontend-v2/pricing/cross.png') }}" alt="" class="mx-auto" />
                @elseif($package[$prop] == -1)
                    @lang('lang.unlimited')

                @else
                    {{ $package[$prop] }}
                @endif
            </td>
        @empty
            <td class="p-3">N/A</td>
        @endforelse
    </tr>
@endif