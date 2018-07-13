@extends('adminamazing::teamplate')

@section('pageTitle', 'Пользователи на получение бонуса')
@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">@yield('pageTitle')</h4>
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-rounded">{{Session::get('success')}}</div>            
                    @endif  
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Вышестоящий</th>
                                    <th>Создание</th>
                                    
                                    <th>Телеграм</th>
                                    <th>Фейсбук</th>
                                    <th>Твиттер</th>
                                    <th>Статус</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($airdrops))
                                    @foreach($airdrops as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>
                                                <a href="{{route('AdminUsersEdit', $row->user_id)}}">{{$row->user->email}}</a>
                                            </td>
                                            <td>
                                                @if($row->user->upline)
                                                    <a href="{{route('AdminUsersEdit', $row->user->parent_id)}}">{{$row->user->upline->email}}</a>
                                                @endif
                                            </td>
                                            <td>{{$row->created_at}}</td>
                                            
                                            <td>{{$row->data_form['telegram_login']}}</td>
                                            <td>{{$row->data_form['facebook_profile']}}</td>
                                            <td>{{$row->data_form['twitter_account']}}</td>
                                            <td>
                                                @if($row->status == 0)
                                                    <span class="text-success">новый</span>
                                                
                                                @elseif($row->status == 1)
                                                    <span class="text-primary">выполнено</span>
                                                @elseif($row->status == 2)
                                                    <span class="text-warning">отклонено</span>
                                                @elseif($row->status == 3)
                                                    <span class="text-warning">на повтор</span>
                                                @elseif($row->status == 4)
                                                    <span class="text-danger">повторная подача</span>
                                                @else

                                                @endif
                                            </td>
                                            <td>
                                                @if($row->status != 1)
                                                    <a href="{{route('AirDropAdminConfirm', $row->id)}}" style="font-size:24px;" data-toggle="tooltip" data-original-title="Подтвердить"><i class="fa fa-check-circle text-success"></i></a>
                                                    <a href="{{route('AirDropAdminCancel', $row->id)}}" style="font-size:24px;" data-toggle="tooltip" data-original-title="Отклонить"><i class="fa fa-ban text-warning"></i></a>
                                                    <a href="{{route('AirDropAdminDestroy', $row->id)}}" style="font-size:24px;" data-toggle="tooltip" data-original-title="Удалить заявку"><i class="fa fa-close text-danger"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            @if(isset($airdrops))
                <nav aria-label="Page navigation example" class="m-t-40">
                    {{ $airdrops->links('vendor.pagination.bootstrap-4') }}
                </nav>
            @endif
        </div>
        <!-- Column -->    
    </div>
@endsection