@extends('adminamazing::teamplate')

@section('pageTitle', 'Отклонить заявку на получение токенов')
@section('content')
	<div class="row">
	    <div class="col-sm-12">
	        <div class="card">
	            <div class="card-block">
	                <h4 class="card-title">Отклонить заявку на получение токенов</h4>
	                @if(Session::has('error'))
                        <div class="alert alert-danger alert-rounded">{{Session::get('error')}}</div>     		
	                @endif	
	                @if(Session::has('success'))
                        <div class="alert alert-success alert-rounded">{{Session::get('success')}}</div>     		
	                @endif	        
	                <form class="form" method="POST" action="{{route('AirDropAdminDoCancel')}}">
	                    
	                    <div class="form-group {{ $errors->has('message_cancel_admin') ? ' error' : '' }}">
	                        <label for="example-text-input" class="col-12 col-form-label">Сообщение</label>
	                        <div class="col-12">
	                        <textarea class="form-control" name="message_cancel_admin">{{old('message_cancel_admin', $find->message_from_admin)}}</textarea>
								@if ($errors->has('message_cancel_admin'))
                                    <div class="help-block"><ul role="alert"><li>{{ $errors->first('message_cancel_admin') }}</li></ul></div>
                                @endif
	                        </div>
	                    </div>

	                    <div class="form-group">
                            <div class="col-md-12">
                                <label class="custom-control custom-checkbox">
                                    <input name="resend_app" {{($find->status == 3)?'checked':''}} type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Разрешить повторную подачу заявку</span>
                                </label>
                            </div>
                        </div>
						
	                    <div class="form-group m-b-0">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Отклонить</button>
                            </div>
                        </div>
                        <input type="hidden" value="{{$find->id}}" name="app_id">
                        {{ csrf_field() }}
	                </form>
	            </div>
	        </div>
	    </div>
	</div>    
@endsection