@include('layouts.header')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Customers</li>
            </ol>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-header d-flex justify-content-between">
                            <h4>Listing Customers</h4>
                            <a href="{{ route('customers.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Customer</a>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Customer Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Amount</th>
                                        <th>Created On</th>
                                        <th>Transaction Count</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>${{ number_format($customer->balance, 2) }}</td>
                                        <td>{{ $customer->created_at->format('d-M, Y') }}</td>
                                        <td>{{ $customer->transactions_count }}</td>
                                        <td>
                                            <a href="{{ route('transactions.show', $customer->id) }}" class="btn btn-sm btn-primary">Transactions</a>
                                        </td>
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
