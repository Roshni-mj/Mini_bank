@include('layouts.header')
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ url('customers') }}">Customers</a>
          </li>
          <li class="breadcrumb-item active">Transactions</li>
        </ol>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <div>
                  <h5>Listing Transactions of <b> {{ $customer->first_name }} {{ $customer->last_name }}</b></h5>
                  <p>Balance : $ {{ $customer->balance }}</p>
                </div>
                <div>
                  <a href="{{ url('customers') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Customers</a>
                </div>
              </div>
              <div class="card-body">
                <table id="datatablesSimple">
                  <thead>
                      <tr>
                          <th>Type</th>
                          <th>Date</th>
                          <th>Amount</th>
                          <th>ip</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->created_at->format('d-M, Y') }}</td>
                        <td>${{ $transaction->amount }}</td>
                        <td>{{ $transaction->ip_address }}</td>
                    </tr>
                @endforeach
                  </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      @include('layouts.footer')
