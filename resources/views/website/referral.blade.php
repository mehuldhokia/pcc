@extends('website.layouts.app')

@section('header')
@endsection

@section('content')

    <!-- SUB BANNER -->
    <section class="sub-banner section">
        <div class="awe-parallax bg-profile-feature"></div>
        <div class="awe-overlay overlay-color-3"></div>
        <div class="container">
            <div class="sub-banner-content">
                <h2 class="big">Referel Programme</h2>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->
    <!-- PAGE CONTROL -->
    <section class="page-control">
        <div class="container">
            <div class="page-info">
                <a href="{{ route('website.root') }}"><i class="icon md-arrow-left"></i>Back to home</a>
            </div>
        </div>
    </section>
    <!-- END / PAGE CONTROL -->
    <!-- BLOG -->
    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="avatar-acount">
                        <div class="info-acount text-justify">
                            <h3 class="md black gujarat_title">
                                ભણતા ભણતા કમાઓ - કમાતા કમાતા ભણો
                            </h3>
                            <p class="gujarat_text text-blue">અત્યારના આ હરીફાઈના યુગમાં વિદ્યાર્થીઓને એજ્યુકેશન અપાવવુ એ
                                વાલીઓ માટે ખુબ જ મુશ્કેલ થઇ રહ્યું છે, કેમ કે અત્યારે વિધાર્થીઓના અભ્યાસ માટે મોટી મોટી ફી
                                ચુક્વવી પડે છે આ મોટી ફી ઘણા વાલીઓ ચુક્વી શક્તા નથી. આથી તે તેમના બાળક્ને અત્યારની આધુનીક
                                ટેક્નોલોજીનું જ્ઞાન અપાવી શક્તા નથી.</p>
                            <p class="gujarat_text text-blue">બધા વાલીઓના મુંઝવતા પ્રશ્ન અમારી સંસ્થા તરફથી થોડા ધણા અંશે
                                નિરાકરણ કરવાનો પ્રયત્ન કરવામાં આવ્યો છે. જેમાં અમારી સંસ્થા તરફ્થી એક રેફ્રરલ ઇન્કમનું આયોજન
                                કરવામાં આવ્યું છે. જેમાં વિધાર્થી ભણતા ભણતા કમાઈ શકે અને કમતા કમતા ભણી શકે જેથી વિધાર્થીઓના
                                તેમના અભ્યાસની ફી ભરવામાં મુશ્કેલી ના પડે અને વાલીને મદદરૂપ થઈ શકે. વાલી-મિત્રોથી બાળકના
                                અભ્યાસનો બોજ ના પડે અને બધા વિધાર્થીઓને સમાન અભ્યાસનો લાભ મળી શકે એવુ અમારી સંસ્થા દ્વારા
                                આયોજન કરવામાં આવ્યું છે. </p>
                            <p class="gujarat_text text-blue">આ યોજનામાં વિધાર્થીઓને 2% થી 50% સુધીની આવક મેળવી શકશે, જેમાં
                                વિધાર્થીએ આ આવક મેળવવા કોઇ વધારે સમય આપવાનો નથી, તેના અભ્યાસની સાથે-સાથે તેમના મિત્રો અને
                                તેમના કુટુંબીજનોને જે પણ કોમ્પ્યૂટરનો અભ્યાસ કરવા માંગતા હોય તે વિધાર્થીઓને અમારી સંસ્થામાં
                                અભ્યાસ માટે પ્રેરીત કરવાના છે. જે વિધાર્થી આપના રેફ્રરલ કોડથી જોડાશે. તેને આપના લેવલ પ્રમાણે
                                યોગ્ય વળતર આપવામાં આવશે. જે વિધાર્થીઓ આમાં કામ કરશે. તેને લેવલ પ્રમાણે આવક મળવાપાત્ર થશે.
                                ટોટલ 5 લેવલ પ્રમાણે આપને આવક મળશે.</p>

                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Level</th>
                                        <th>Income %</th>
                                        <th>Referral</th>
                                        <th>I.E. : On Rs. 3,000/- Cource Referral Income</th>
                                    </tr>
                                    <tr>
                                        <td scope="row">1<sup>st</sup> Level</td>
                                        <td scope="row">25%</td>
                                        <td scope="row">On Direct Referral</td>
                                        <td>Rs. 750/-</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">2<sup>nd</sup> Level</td>
                                        <td scope="row">8%</td>
                                        <td scope="row">On 1<sup>st</sup> Downline Referral</td>
                                        <td>Rs. 240/-</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">3<sup>rd</sup> Level</td>
                                        <td scope="row">6%</td>
                                        <td scope="row">On 2<sup>nd</sup> Downline Referral</td>
                                        <td>Rs. 180/-</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">4<sup>th</sup> Level</td>
                                        <td scope="row">4%</td>
                                        <td scope="row">On 3<sup>rd</sup> Downline Referral</td>
                                        <td>Rs. 120/-</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">5<sup>th</sup> Level</td>
                                        <td scope="row">2%</td>
                                        <td scope="row">On 4<sup>th</sup> Downline Referral</td>
                                        <td>Rs. 60/-</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="gujarat_text">વધારે માહિતી માટે સંમ્પર્ક કરો : <a href="tel:+919909994300">+91 99090
                                    94300</a> / <a href="tel:+919925453208">+91 99254 53208</a></p>
                            <a></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="create-course-sidebar" style="margin-top:10px!important;">
                        <ul class="list-bar border-none">
                            <a href="{{ route('website.loginpage') }}">
                                <li class="active"><span class="count"><i class="fa fa-key"></i></span>Login</li>
                            </a>
                            <a href="{{ route('website.registerpage') }}">
                                <li class="active"><span class="count"><i class="fa fa-pencil"></i></span>Register</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / BLOG -->
@endsection

@section('js')
@endsection
