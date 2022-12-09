@extends('admin/template_admin')

@section('title','Tableau de bord')

@section('dashboard','active')

@section('body')

<div class="main-content-inner">
    <!-- sales report area start -->
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-md-3">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Utilisateur</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{$count1}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Gynécologue</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{$count3}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Educateur</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{$count2}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Administrateur</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{$count4}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-comments"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Messages échangées</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{$chat}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-book"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Blog</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{$blog}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-cubes"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Avis des utilisateurs</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{$rating}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sales report area end -->
    
    <!-- row area start -->
    <div class="row">
        <!-- trading history area start -->
        <div class="col-lg-12 mt-sm-30 mt-xs-30">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h4 class="header-title">Statistiques</h4>
                            <div class="trd-history-tabs">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#buy_order" role="tab">Statistiques  des échanges</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#sell_order" role="tab">Statistiques des contenus</a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                    <div class="trad-history mt-4">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="buy_order" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="dbkit-table">
                                        <tr class="heading-td">
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Profession</th>
                                            <th>Informations</th>
                                        </tr>
                                        @foreach($stats as $stat)
                                        <?php $person = App\Models\User::find($stat->from_id);?>
                                            @if($person->role == 'gyneco')
                                            <tr>
                                                <td>{{$person->name}}</td>
                                                <td>{{$person->email}}</td>
                                                <td>{{$person->work}}</td>
                                                <td>{{$stat->nbr}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        @foreach($others as $other)
                                            @if($other->role == 'gyneco')
                                            <tr>
                                                <td>{{$other->name}}</td>
                                                <td>{{$other->email}}</td>
                                                <td>{{$other->work}}</td>
                                                <td>0</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sell_order" role="tabpanel">
                                <div class="table-responsive">
                                <table class="dbkit-table">
                                        <tr class="heading-td">
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Profession</th>
                                            <th>Informations</th>
                                        </tr>
                                        @foreach($graphs as $graph)
                                        <?php $person = App\Models\User::find($graph->user_id);?>
                                            @if($person->role != 'user')
                                            <tr>
                                                <td>{{$person->name}}</td>
                                                <td>{{$person->email}}</td>
                                                <td>{{$person->work}}</td>
                                                <td>{{$graph->nbr}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        @foreach($persos as $perso)
                                            @if($perso->role != 'user')
                                            <tr>
                                                <td>{{$perso->name}}</td>
                                                <td>{{$perso->email}}</td>
                                                <td>{{$perso->work}}</td>
                                                <td>0</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- trading history area end -->
    </div>
    <!-- row area end -->
    
</div>

@endsection