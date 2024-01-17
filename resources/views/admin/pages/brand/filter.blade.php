<div class="w-100 d-flex">
    <div class="mb-3 mr-2">
        <select class="form-control w-10 filter-brand border border-primary" name="status">
            <option value="">{{ __('Status') }}</option>
            <option value="{{ STOP_SELLING }}">{{ __('Stop selling') }}</option>
            <option value="{{ ON_SALE }}">{{ __('On sale') }}</option>
        </select>
    </div>
    <div class="mb-3 mr-2 d-flex w-25">
        <input name="start_date" class="form-control w-10 search-status datepicker mr-1 filter-brand border border-primary" placeholder="Start date"/>
        <b>~</b>
        <input name="end_date" class="form-control w-10 search-status datepicker ml-1 filter-brand border border-primary" placeholder="End date"/>
    </div>
    <div class="d-none d-sm-inline-block form-inline mr-auto mb-3 w-25 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="key_search" class="form-control bg-light small border border-primary filter-brand" placeholder="Search for..."
                   aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </div>
</div>
