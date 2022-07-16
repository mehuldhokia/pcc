@extends('studpanel.layouts.app')

@section('header')
@endsection

@section('content')
    <section class="profile">
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <input name="__RequestVerificationToken" type="hidden"
                        value="ddHhLJrMDxdpVxSze_Y3afGim_Pj6c4-J8WuDqeQfzcwu5tKf1hxFhPBP_2RZ1S9CxDMAeq4SSPllvkLKJ0h94s4OTxyVlNmXvC8hxwX23OACzk-zChm_lbA7Tee0tSp0">
                    <fieldset>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="avatar-acount">
                                <div class="info-acount">
                                    <div class="security">
                                        <div class="tittle-security">
                                            <h3 class="md black">Change Password</h3>
                                            <input type="password" placeholder="Current password" name="ResetPasswordCode"
                                                required="">
                                            <input type="password" placeholder="New password" name="NewPassword"
                                                required="">
                                            <input type="password" placeholder="Confirm password" name="ConfirmPassword"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-save ml-0 mt-0">
                                    <input type="submit" value="Save changes" class="mc-btn btn-style-1">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
