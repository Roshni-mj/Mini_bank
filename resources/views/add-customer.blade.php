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
          <li class="breadcrumb-item active">Add New Customer</li>
        </ol>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                Add New Customer
                <a href="{{ url('customers') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Customers</a>
              </div>
              <div class="card-body">
                <form method="post" action="{{ url('customers') }}">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="firstName">First name</label>
                                <input class="form-control" id="firstName" name="first_name" type="text" placeholder="Enter first name" required />
                            </div>
                            <div class="col-md-6">
                                <label for="lastName">Last name</label>
                                <input class="form-control" id="lastName" name="last_name" type="text" placeholder="Enter last name" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email">Email address</label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter email" required />
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Phone number</label>
                                <input class="form-control" id="phone" name="phone" type="tel" placeholder="Enter phone" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Enter password" required />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Customer</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@include('layouts.footer')
