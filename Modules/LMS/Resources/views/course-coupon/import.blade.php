
{{ Form::open(array('route' => array('product-coupon.import'),'method'=>'post', 'enctype' => "multipart/form-data", 'class' => "px-3 py-2")) }}
    <div class="row">
        <div class="col-md-12 mb-2 d-flex align-items-center justify-content-between">
            {{Form::label('file',__('Download sample product-coupon CSV file'),['class'=>'form-label'])}}
            <a href="{{asset(Storage::url('uploads/sample')).'/sample-productCoupon.csv'}}" class="btn btn-sm btn-primary mr-0">
                <i class="fa fa-download"></i> {{__('Download')}}
            </a>
        </div>
        <div class="col-md-12">
            <div class="form-file mb-3">
                <label for="file" class="form-label">{{ __('Select CSV File') }}</label>
                <input type="file" class="form-control" name="file" id="file" data-filename="upload_file" required>
                <div class="invalid-feedback">{{ __('invalid form file') }}</div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{ __('Upload') }}" class="btn btn-primary">
    </div>
{{ Form::close() }}
