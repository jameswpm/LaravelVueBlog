@extends('layouts.app')

@section('content')
    <page size="12">
        <panel title="All Articles">
            <breadcrumbs v-bind:list="{{$listBreadcrumbs}}"></breadcrumbs>
            <list-table
                v-bind:titles="['#', 'Title', 'Description', 'Author', 'Date']"
                v-bind:items="[['1', 'PHP', 'PHP for all', 'James', 'Published at'],
                               ['2', 'Vue', 'Test Course Vue.js', 'Lana',  'Published at']
                              ]"
                order="desc" ordemcol="1"
                create="#create" detail="#detail" edit="#edit" erase="#erase" token="124578"
            >
            </list-table>
        </panel>
    </page>
@endsection
