@can($viewGate)
    @if ($row->status === 1)
        <button class="btn btn-xs btn-danger" onclick="reject({{$row->id}})">
            Reject
        </button>
    @elseif($row->status === 2)
        <button class="btn btn-xs btn-primary" onclick="approve({{$row->id}})">
            Aprove
        </button>
    @else
        <button class="btn btn-xs btn-primary" onclick="approve({{$row->id}})">
            Aprove
        </button>
        <button class="btn btn-xs btn-danger" onclick="reject({{$row->id}})">
            Reject
        </button>
    @endif
@endcan