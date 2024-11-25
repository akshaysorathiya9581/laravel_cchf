@if ($filters)
    <tr>
        @foreach ($filters as $key => $filter)
            @if (isset($filter['searchable']))
                <td></td> @continue
            @endif
            @if ($filter['type'] == 'text')
                <td class="filter-row"><input type="text" id="filter-{{ $key }}"
                        class="datatable-filter form-control-sm" placeholder="{{ $filter['placeholder'] }}"></td>
            @elseif($filter['type'] == 'select')
                <td class="filter-row">
                    <select id="filter-{{ $key }}" class="datatable-filter form-control-sm">
                        <option value="">Select {{ $filter['placeholder'] }}</option>
                        @foreach ($filter['options'] as $optionValue => $optionLabel)
                            <option value="{{ $optionValue }}">{{ $optionLabel }}</option>
                        @endforeach
                    </select>
                </td>
            @elseif($filter['type'] == 'datepicker')
                <td class="filter-row">
                    <input type="text" id="filter-{{ $key }}"
                        class="datatable-filter form-control-sm datepicker"
                        placeholder="Select {{ $filter['placeholder'] }}">
                </td>
            @endif
        @endforeach
    </tr>
@endif
