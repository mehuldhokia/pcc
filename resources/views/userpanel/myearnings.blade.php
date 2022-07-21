@extends('userpanel.layouts.app')

@section('header')
@endsection

@section('content')
    <section class="profile question-content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="question-content avatar-acount pr-60">
                        <h3 class="">My Earning</h3>
                        <br />

                        {{-- @foreach ($earnings as $earning) --}}
                        {{-- { --> --}}
                        <table class="table table-striped result">
                            <tbody>
                                <tr class="">
                                    <td>First Level</td>
                                    <td class="number">0</td>
                                </tr>
                                <tr class="">
                                    <td> Second Level</td>
                                    <td class="number">0</td>
                                </tr>
                                <tr class="">
                                    <td> Third Level</td>
                                    <td class="number">0</td>
                                </tr>
                                <tr class="">
                                    <td>Fourth Level</td>
                                    <td class="number">0</td>
                                </tr>
                                <tr class="">
                                    <td>Fifth Level</td>
                                    <td class="number">0</td>
                                </tr>
                                <tr class="">
                                    <td>Total</td>
                                    <td class="number">0</td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- } --}}
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection

@section('js')
@endsection
