@extends('userpanel.layouts.app')

@section('header')
@endsection

@section('content')
    <section class="profile">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="avatar-acount">
                        <div class="info-acount">

                            <form action="" class="form-horizontal" enctype="multipart/form-data" method="post">
                                <fieldset>

                                    <div class="security">
                                        <div class="tittle-security">

                                            <h5>Course</h5>
                                            <select class="form-control" id="ddlCourse" name="ddlCourse">
                                                <option value="-1">Please Select Course</option>
                                                <option value="1">Diploma in Computer Science</option>
                                                <option value="2">Post Graduate Diploma in Computer Application
                                                </option>
                                                <option value="3">Diploma Course in Computer Application</option>
                                                <option value="4">Diploma In Computer Teacher Course</option>
                                                <option value="5">Certificate Course on Fundamental Application
                                                    (Kids)</option>
                                                <option value="6">Certificate in ‘C’ Programming</option>
                                                <option value="7">Certificate in Computer Concept</option>
                                                <option value="8">Tally ERP-9</option>
                                                <option value="9">Certificate in Desk Top Publishing</option>
                                                <option value="10">Certificate in MS Office</option>
                                                <option value="11">Gujarati Typing</option>
                                                <option value="12">English Typing master</option>
                                            </select>

                                            <h5>Course Code</h5>
                                            <input type="text" id="txtCode" name="txtCode" value=""
                                                readonly="">

                                            <h5>Course Amount</h5>
                                            <input type="text" id="txtPrice" name="txtPrice" value=""
                                                readonly="">

                                            <h5>Select Receipt</h5>

                                            <input type="file" name="file" style="padding-top: 5px; height: 37px;">


                                        </div>
                                        <div class="text-center">

                                            <input type="submit" name="submit" value="Upload Receipt"
                                                class="mc-btn btn-style-1">
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-50">
                    <div class="">
                        <table class="mc-table">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
