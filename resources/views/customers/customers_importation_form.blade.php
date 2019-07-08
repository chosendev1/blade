@extends('layouts.partials.main-forms')
@include('layouts.partials.page-header',
      ['header' => 'Customers',
       'form_title' => 'Import Customers'
      ])
  @section('create-form')
    <form class="form-horizontal" method="POST" action="/customers/importation" enctype="multipart/form-data"> 
      {{ csrf_field() }}
      <div class="panel-body container-fluid">
      <div class="row row-lg">
        <div class="example-wrap">
          <h5 class="example-title">Create an Excel file with the following headers in that order:</h5>
          <p>branch_id, name_of_applicant, member_number, gender, maritual_status, nationality, phone_number, phone_number2, email_address, country, district_city, physical_address, next_of_kin, next_of_kin_phone_number</p>
        </div>
      </div>
      <div class="row row-lg">
          <div class="panel-heading">
            <h5 class="panel-title">Branches</h5>
          </div>
      </div>
      <div class="row row-lg">
        <div class="col-xl-5">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Branch</th>
                <th>Id</th>
              </tr>
            </thead>
            <tbody>
              @foreach($branches as $branch)
              <tr>
                <td class="text-middle">{{ $branch->branch_name }}</td>
                <td class="text-middle">{{ $branch->id }}</td>
              </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="row row-lg">
        <div class="col-xl-4 col-md-6">
          <div class="example">
            <input type="file" id="input-file-now" name ="customer_import_file" data-plugin="dropify" data-default-file=""
            />
          </div>
        </div>
      </div>
      </div>
      <div class="form-group">
      <button type="submit" class="btn btn-lg btn-success col-6 col-md-4">Upload</button>
      </div>
    </form>
  @endsection
