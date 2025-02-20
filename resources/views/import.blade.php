<!-- @include('layouts.header') -->


<!-- @include('layouts.footer') -->


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
          <li class="breadcrumb-item active">Import Customer</li>
        </ol>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                Import Customer
                <a href="{{ url('customers') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Customers</a>
              </div>
              <div class="card-body">
              <form action="{{ url('/import-customers') }}" method="POST" enctype="multipart/form-data">
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
                    <input type="file" name="file" required>
                    <button type="submit">Import</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@include('layouts.footer')



