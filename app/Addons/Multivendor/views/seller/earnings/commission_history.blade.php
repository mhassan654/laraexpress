@extends('addon:multivendor::seller.layouts.app')

@section('content')

<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
      <div class="col-md-6">
          <h1 class="h3">{{ translate('Commission History') }}</h1>
      </div>
    </div>
  </div>
  <div class="card">
    <form action="{{ route('seller.commission_log.index') }}" method="GET">
        <div class="card-header row gutters-5">
            <div class="col text-center text-md-left">
                <h5 class="mb-md-0 h6">{{ translate('Commission History') }}</h5>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-0">
                    <input type="text" class="form-control form-control-sm aiz-date-range" id="search" name="date_range"@isset($date_range) value="{{ $date_range }}" @endisset placeholder="{{ translate('Daterange') }}" autocomplete="off">
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-sm btn-primary">{{ translate('Filter') }}</button>
            </div>
        </div>
    </form>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th data-breakpoints="lg">{{ translate('Order Code') }}</th>
                    <th>{{ translate('Admin Commission') }}</th>
                    <th>{{ translate('Your Earning') }}</th>
                    <th data-breakpoints="lg">{{ translate('Calculated At') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commission_history as $key => $history)
                    <tr>
                        <td>{{ ($key+1) }}</td>
                        <td>{{ $history->order->combined_order->code ?? translate('Order Deleted') }}</td>
                        <td>{{ format_price($history->admin_commission) }}</td>
                        <td>{{ format_price($history->seller_earning) }}</td>
                        <td>{{ $history->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination mt-4">
            {{ $commission_history->links() }}
        </div>
    </div>
  </div>
    
  
@endsection