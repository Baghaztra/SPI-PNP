@props([
    'headers' => [],
    'rows' => [],
    'actions' => true
])

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                @foreach($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
                @if($actions)
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add datatable functionality if needed
        if (typeof $.fn.DataTable !== 'undefined') {
            $('.table').DataTable({
                responsive: true
            });
        }
    });
</script>
@endpush 