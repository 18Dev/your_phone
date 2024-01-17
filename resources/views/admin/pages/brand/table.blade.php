@forelse($brands as $brand)
    <tr>
        <td>{{ indexTable($brands->currentPage(), $brands->perPage(), $loop->index) }}</td>
        <td>{{ $brand->name }}</td>
        <td>
            <img src="{{ $brand->avatar ?? asset(NO_IMAGE) }}" alt="" class="image-avatar">
        </td>
        <td class="{{ $brand->status_action->color_text_msg }} color_text_msg_{{ $brand->id }}">{{ $brand->status_action->msg }}</td>
        <td>
            <a href="{{ route(ROUTE_BRAND['SHOW'], ['brand' => $brand->id]) }}"><button class="btn btn-primary">Update</button></a>
            <button class="btn {{ $brand->status_action->bg_btn }} update-status bg_btn_{{ $brand->id }}"
                    data-id="{{ $brand->id }}" data-status="{{ $brand->status_action->status }}">
                {{ $brand->status_action->text_btn }}
            </button>
            <button class="btn btn-danger delete-item"
                    data-name="{{ $brand->name }}"
                    data-id="{{ $brand->id }}">Delete</button>
        </td>
    </tr>
@empty
@endforelse
