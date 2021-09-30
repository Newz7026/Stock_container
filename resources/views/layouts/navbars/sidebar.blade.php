<div class="sidebar" data-image="{{ asset('light-bootstrap/img/June-imports.png') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('dashboard') }}" class="simple-text" style="text-decoration-line: none">
                {{ __('Stock Container') }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if ($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item @if ($activePage == 'gate-in-management') active @endif">
                <a class="nav-link" href="{{ route('gate-in') }}">
                    <i class="nc-icon nc-cloud-upload-94"></i>
                    <p>{{ __('GET IN') }}</p>
                </a>
            </li>
            {{-- <li class="nav-item @if ($activePage == 'gate-out-management') active @endif">
                <a class="nav-link" href="{{ route('gate-out') }}">
                    <i class="nc-icon nc-cloud-download-93"></i>
                    <p>{{ __('Manage OUT') }}</p>
                </a>
            </li> --}}
            <li class="nav-item @if ($activePage == 'container-manage') active @endif">
                <a class="nav-link" href="{{ route('container-manage') }}">
                    <i class="nc-icon nc-layers-3"></i>
                    <p>{{ __('Container Movement') }}</p>
                </a>
            </li>
            <li class="nav-item @if ($activePage == 'record-manage') active @endif">
                <a class="nav-link" href="{{ route('record-manage') }}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __('Record') }}</p>
                </a>
            </li>
            <li class="nav-item @if ($activePage == 'receipt-manage') active @endif">
                <a class="nav-link" href="{{ route('receipt-manage') }}">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>{{ __('Receipt') }}</p>
                </a>
            </li>
            <li class="nav-item @if ($activePage == 'agent-manage') active @endif">
                <a class="nav-link" href="{{ route('agent') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>{{ __('Agents') }}</p>
                </a>
            </li>
            {{-- <li class="nav-item @if ($activePage == 'export-manage') active @endif">
                <a class="nav-link" href="{{ route('export') }}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>{{ __('Export') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
