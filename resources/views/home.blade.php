@extends('layouts.app')

@section('content')
    <page size="10">
        <panel title="Dashboard">
            <div class="row">
                <div class="col-md-4">
                    <box qtd="80" title="Articles" url="{{ route('articles.index') }}" color="orange" icon="ion ion-stats-bars"></box>
                </div>
                <div class="col-md-4">
                    <box qtd="1500" title="Users" url="#" color="blue" icon="ion ion-person"></box>
                </div>
                <div class="col-md-4">
                    <box qtd="10" title="Authors" url="#" color="red" icon="ion ion-person-stalker"></box>
                </div>
            </div>
        </panel>
    </page>
@endsection
