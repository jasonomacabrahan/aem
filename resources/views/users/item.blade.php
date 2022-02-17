@extends('layouts.app', [
    'namePage' => 'ITEM',
    'class' => 'sidebar-mini',
    'activePage' => 'inventory',
])
@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">


      <div class="col-md-12">
          <div class="card shadow">
              <div class="card-header">
                <h2><i class="fa fa-fw fa-th-list"></i>Item</h2>
              </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane container active" id="add">
                  <a href="#" class="btn btn-success"><i class="fa fa-fw fa-arrow-left"></i>Back</a>
                  @if ($message = Session::get('success'))
                        <script>
                            swal("Success","New Item Added","success");
                        </script>
                  @endif


                  @if ($message = Session::get('error'))
                        <script>
                            swal("Oops!","Problem adding the item","error");
                        </script>
                  @endif

                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  <form method="POST" action="#" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                      <div><code>*</code> Indicates a required field</div>
                      <strong>Upload Item Image</strong>
                      <div id="msg"></div>
                      <input type="file" name="image_name" accept="image/*">
                      <hr color="blue"/>
                      <img src="{{ asset('assets') }}/img/favicon.png" id="preview" class="img-thumbnail" alt="It will be displayed here...">
                      <hr color="red"/>
                      <div class="">
                        <strong>CATEGORY<code>*</code></strong>
                        <select class="form-control js-select" name="cat_id" id="cat_id" required>
                            <option></option>

                        </select>
                      </div>

                      <div class="">
                        <strong>SUB-CATEGORY<code>*</code></strong>
                        <select class="form-control subcategory" name="sub_cat_id" id="sub_cat_id" required>
                            <option></option>

                        </select>
                      </div>
                      <div class="form-group">
                        <strong>ITEM<code>*</code></strong>
                        <input type="text" name="item" class="form-control" required/>
                      </div>

                      <div class="form-group">
                        <strong>DESCRIPTION<code>*</code></strong>
                        <textarea name="description" class="form-control editor"></textarea>

                      </div>


                      <div class="form-group">
                        <strong>QUANTITY<code>*</code></strong>
                        <input type="number" name="qty" class="form-control" required/>
                      </div>

                      <div class="form-group">
                        <strong>UNIT<code>*</code></strong>
                        <select class="form-control" name="unit_id">
                          <option></option>
                        </select>
                      </div>

                      <div class="form-group">
                        <strong>AMOUNT PER ITEM<code>*</code></strong>
                        <input type="text" name="amount_per_item" class="form-control" required/>
                      </div>

                      <div class="form-group">
                        <strong>SERIAL NUMBER<code>*</code></strong>
                        <input type="text" name="serial_number" class="form-control" required/>
                      </div>

                      <div class="form-group">
                        <strong>PROPERTY NUMBER<code>*</code></strong>
                        <input type="text" name="property_number" class="form-control" value="{{ 'val' }}" required/>
                        <input type="hidden" name="property_number_hidden" class="form-control" value="{{ 'val' }}"/>
                      </div>

                      <div class="form-group">
                        <strong>Date Purchased<code>*</code></strong>
                        <input type="date" name="date_purchased" class="form-control" value="date" required/>
                      </div>

                      <div class="form-group">
                        <button class="btn btn-primary pull-right"><i class="fa fa-fw fa-check-circle"></i>SAVE</button>
                        <a href="{{ '#' }}" class="btn btn-danger pull-right"><i class="fas fa-window-close"></i>Cancel</a>

                      </div>
                    </form>
                </div>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection
