@if (Auth::user() == null)
    <a href="{{ route('login') }}" class="small-box-footer">
        Ver <i class="fas fa-arrow-circle-right"></i>
    </a>
    <script type="text/javascript">
        function redirect() {
            window.location.href = "<?php echo URL::to('/'); ?>";
        }
        window.onload = redirect;
    </script>
@else
    @if (isset($item['role']) && (Auth::user()->rol == 'admin' || $item['role'] == Auth::user()->rol))

        <li @if (isset($item['id'])) id="{{ $item['id'] }}" @endif class="nav-item">

            <a class="nav-link {{ $item['class'] }} @if (isset($item['shift'])) {{ $item['shift'] }} @endif"
                href="{{ $item['href'] }}" @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
                {!! $item['data-compiled'] ?? '' !!}>

                <i
                    class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>

                <p>
                    {{ $item['text'] }}

                    @if (isset($item['label']))
                        <span class="badge badge-{{ $item['label_color'] ?? 'primary' }} right">
                            {{ $item['label'] }}
                        </span>
                    @endif
                </p>

            </a>

        </li>
    @endif
@endif
