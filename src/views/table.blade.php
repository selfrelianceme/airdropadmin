@extends('adminamazing::teamplate')

@section('pageTitle', 'Пользователи на получение бонуса')
@section('content')
    <script>
        var route = '{{ route('home') }}';
        var message = 'Вы точно хотите удалить данное сообщение?';
    </script>
    @push('display')
        
        <a href="{{route('SharesUserAdminCreate')}}" class="btn hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Создать токен</a>
    @endpush
    <div class="row">
        <!-- Column -->
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title pull-left">@yield('pageTitle')</h4>
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
                                                <a href="" style="font-size:24px;" data-toggle="tooltip" data-original-title="Подтвердить"><i class="fa fa-check-circle text-success"></i></a>
                                                <a href="" style="font-size:24px;" data-toggle="tooltip" data-original-title="Отклонить"><i class="fa fa-ban text-warning"></i></a>
                                                <a href="" style="font-size:24px;" data-toggle="tooltip" data-original-title="Удалить заявку"><i class="fa fa-close text-danger"></i></a>
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