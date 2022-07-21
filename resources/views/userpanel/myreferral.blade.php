@extends('userpanel.layouts.app')

@section('header')
@endsection

@section('content')
    <section class="profile">
        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="avatar-acount ref_tree">
                        <h1 class="title">My Referral Tree</h1>
                        <span class="display">Show: </span>
                        <input checked="" data-tooltip="first level" id="radio-1" name="test" type="radio"><label
                            for="radio-1">First level</label>
                        <input id="radio-2" data-tooltip="second level" name="test" type="radio"><label
                            for="radio-2">Second level</label>
                        <input id="radio-3" data-tooltip="third level" name="test" type="radio"><label
                            for="radio-3">Third level</label>
                        <input id="radio-4" data-tooltip="Fourth level" name="test" type="radio"><label
                            for="radio-4">Fourth level</label>
                        <input id="radio-5" data-tooltip="Fifth level" name="test" type="radio"><label
                            for="radio-5">Fifth level</label>

                        <ul class="wtree">
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="social-connect" style="padding-top:20px;">
                        <div class="widget widget_share" style="word-break: break-word;">
                            <h4 class="xsm black bold">Invite Friends</h4>
                            <p>
                                I'm inviting you to Join PCC Foundation for best online eduction system. Click on this link
                                for register http://www.pccindia.com/Home/Register?rpwegp
                            </p>
                            <div class="share-body">
                                <a target="_blank"
                                    href="https://api.whatsapp.com/send?text=I'm inviting you to Join PCC Foundation for best online education system. Click on this link for register http://pcc.ginfotech2017.com/Home/Register?rpwegp"
                                    data-action="share/whatsapp/share">
                                    <i class="icon md-twitter"></i>
                                </a>

                                <a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u=I am inviting you to Join PCC Foundation for best online education system. Click on this link for register http://pcc.ginfotech2017.com/Home/Register?rpwegp"
                                    class="facebook" title="facebook">
                                    <i class="icon md-facebook-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
