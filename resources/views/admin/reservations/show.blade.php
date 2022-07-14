@extends('admin.layouts.app')

@section('content')

    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Rezervace č. <span class="font-weight-bold text-primary">{{ $reservation->id }}</span> z <strong>{{ $reservation->created_at->format('d.m.Y') }}</strong></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="d-flex flex-row flex-aside">
                <div class="flex-row-auto w-300px w-xl-350px">
                    <div class="card card-custom gutter-b">
                        <div class="card-body pt-4">
                            <div class="d-flex justify-content-end">
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Možnosti">
                                    <a href="#" class="btn btn-icon-primary btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="svg-icon svg-icon-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1">
                                                    <rect x="14" y="9" width="6" height="6" rx="3" fill="black"></rect>
                                                    <rect x="3" y="9" width="6" height="6" rx="3" fill="black" fill-opacity="0.7"></rect>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                        <ul class="navi navi-hover navi-active navi-accent admin-reservation-dropdown">
                                            <li class="navi-item">
                                                <a href="{{ route('admin.rezervace.reservationDeposite', $reservation->id) }}" class="navi-link">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-md svg-icon-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
                                                                    <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="navi-text">Odeslat výzvu k zaplacení zálohy</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('admin.send.sendRecenseTest', $reservation->id) }}" class="navi-link {{$recenze_disabled_class}}">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-md svg-icon-success">
                                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                viewBox="0 0 460 460" style="enable-background:new 0 0 460 460;" xml:space="preserve">
                                                                <g>
                                                                    <path style="fill:#FF5419;" d="M230,0C102.975,0,0,102.975,0,230c0,98.967,62.507,183.335,150.196,215.778L447.33,154.523C416.094,64.571,330.588,0,230,0z"/><path style="fill:#E03A00;" d="M447.313,154.521l-86.24-86.24L21.407,230l116.782,116.781L100,394.5l50.196,51.27C175.058,454.968,201.94,460,230,460c127.025,0,230-102.975,230-230C460,203.559,455.524,178.166,447.313,154.521z"/><polygon style="fill:#FFEDB5;" points="276.563,87.084 276.563,48.281 230,48.281 214.479,87.084 	"/><rect x="183.437" y="48.281" style="fill:#FFFFFF;" width="46.563" height="38.802"/><polygon style="fill:#FFC61B;" points="214.829,371.741 230,394.5 361.073,394.5 361.073,68.281 302,68.281 	"/><polygon style="fill:#C2FBFF;" points="341.07,129 341.07,374.5 230,374.5 210.47,125 	"/><polygon style="fill:#71E2F0;" points="341.07,88.28 341.07,129 230,129 206.66,88.28 	"/><polygon style="fill:#FEE187;" points="158,68.281 100,68.281 100,394.5 230,394.5 230,371.741 	"/><polygon style="fill:#FFFFFF;" points="230,125 230,374.5 118.93,374.5 118.93,129 	"/><rect x="118.93" y="88.28" style="fill:#C2FBFF;" width="111.07" height="40.72"/><polygon style="fill:#FEE187;" points="230,68.281 214.827,88.281 230,108.281 302,108.281 302,68.281 	"/><rect x="158" y="68.281" style="fill:#FFEDB5;" width="72" height="40"/><polygon style="fill:#C2FBFF;" points="138.927,287.5 138.927,307.5 230,307.5 239.5,297.5 230,287.5 	"/><rect x="230" y="287.5" style="fill:#71E2F0;" width="51.073" height="20"/><rect x="301.073" y="287.5" style="fill:#71E2F0;" width="20" height="20"/><polygon style="fill:#C2FBFF;" points="138.927,331 138.927,351 230,351 239.5,341 230,331 	"/><rect x="230" y="331" style="fill:#71E2F0;" width="51.073" height="20"/><rect x="301.073" y="331" style="fill:#71E2F0;" width="20" height="20"/><polygon style="fill:#C2FBFF;" points="138.927,172.5 138.927,152.5 230,152.5 239.5,162.5 230,172.5 	"/><rect x="230" y="152.5" style="fill:#71E2F0;" width="51.073" height="20"/><rect x="301.073" y="152.5" style="fill:#71E2F0;" width="20" height="20"/><polygon style="fill:#FEE187;" points="100,265 21.407,230 100,211.333 	"/><polygon style="fill:#FFFFFF;" points="100,230 21.407,230 100,195 	"/><polygon style="fill:#121149;" points="341.411,264.999 100,265 100,230 351.411,211.333 	"/><polygon style="fill:#366796;" points="351.411,230 100,230 100,195 341.411,195 	"/><rect x="230" y="219.474" style="fill:#FFFFFF;" width="121.411" height="20"/><polygon style="fill:#FEE187;" points="431.411,239.47 431.411,220.53 381.411,220.526 381.411,239.474 	"/><polygon style="fill:#121149;" points="401.64,265 361.64,265 351.64,211.333 401.64,230 	"/><polygon style="fill:#366796;" points="401.64,230 351.64,230 361.64,195 401.64,195 	"/><polygon style="fill:#FEE187;" points="341.411,264.999 341.411,230 346.411,220.666 361.411,230 361.411,264.999 	"/><rect x="341.411" y="195.002" style="fill:#FFFFFF;" width="20" height="35"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="navi-text">Poslat recenze</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('admin.send.sendClientFotoTest', $reservation->id) }}" class="navi-link {{ $client_image_class }}">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-md svg-icon-success">
                                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                viewBox="0 0 460 460" style="enable-background:new 0 0 460 460;" xml:space="preserve">
                                                                <g>
                                                                    <path style="fill:#FF5419;" d="M230,0C102.975,0,0,102.975,0,230c0,98.967,62.507,183.335,150.196,215.778L447.33,154.523C416.094,64.571,330.588,0,230,0z"/><path style="fill:#E03A00;" d="M447.313,154.521l-86.24-86.24L21.407,230l116.782,116.781L100,394.5l50.196,51.27C175.058,454.968,201.94,460,230,460c127.025,0,230-102.975,230-230C460,203.559,455.524,178.166,447.313,154.521z"/><polygon style="fill:#FFEDB5;" points="276.563,87.084 276.563,48.281 230,48.281 214.479,87.084 	"/><rect x="183.437" y="48.281" style="fill:#FFFFFF;" width="46.563" height="38.802"/><polygon style="fill:#FFC61B;" points="214.829,371.741 230,394.5 361.073,394.5 361.073,68.281 302,68.281 	"/><polygon style="fill:#C2FBFF;" points="341.07,129 341.07,374.5 230,374.5 210.47,125 	"/><polygon style="fill:#71E2F0;" points="341.07,88.28 341.07,129 230,129 206.66,88.28 	"/><polygon style="fill:#FEE187;" points="158,68.281 100,68.281 100,394.5 230,394.5 230,371.741 	"/><polygon style="fill:#FFFFFF;" points="230,125 230,374.5 118.93,374.5 118.93,129 	"/><rect x="118.93" y="88.28" style="fill:#C2FBFF;" width="111.07" height="40.72"/><polygon style="fill:#FEE187;" points="230,68.281 214.827,88.281 230,108.281 302,108.281 302,68.281 	"/><rect x="158" y="68.281" style="fill:#FFEDB5;" width="72" height="40"/><polygon style="fill:#C2FBFF;" points="138.927,287.5 138.927,307.5 230,307.5 239.5,297.5 230,287.5 	"/><rect x="230" y="287.5" style="fill:#71E2F0;" width="51.073" height="20"/><rect x="301.073" y="287.5" style="fill:#71E2F0;" width="20" height="20"/><polygon style="fill:#C2FBFF;" points="138.927,331 138.927,351 230,351 239.5,341 230,331 	"/><rect x="230" y="331" style="fill:#71E2F0;" width="51.073" height="20"/><rect x="301.073" y="331" style="fill:#71E2F0;" width="20" height="20"/><polygon style="fill:#C2FBFF;" points="138.927,172.5 138.927,152.5 230,152.5 239.5,162.5 230,172.5 	"/><rect x="230" y="152.5" style="fill:#71E2F0;" width="51.073" height="20"/><rect x="301.073" y="152.5" style="fill:#71E2F0;" width="20" height="20"/><polygon style="fill:#FEE187;" points="100,265 21.407,230 100,211.333 	"/><polygon style="fill:#FFFFFF;" points="100,230 21.407,230 100,195 	"/><polygon style="fill:#121149;" points="341.411,264.999 100,265 100,230 351.411,211.333 	"/><polygon style="fill:#366796;" points="351.411,230 100,230 100,195 341.411,195 	"/><rect x="230" y="219.474" style="fill:#FFFFFF;" width="121.411" height="20"/><polygon style="fill:#FEE187;" points="431.411,239.47 431.411,220.53 381.411,220.526 381.411,239.474 	"/><polygon style="fill:#121149;" points="401.64,265 361.64,265 351.64,211.333 401.64,230 	"/><polygon style="fill:#366796;" points="401.64,230 351.64,230 361.64,195 401.64,195 	"/><polygon style="fill:#FEE187;" points="341.411,264.999 341.411,230 346.411,220.666 361.411,230 361.411,264.999 	"/><rect x="341.411" y="195.002" style="fill:#FFFFFF;" width="20" height="35"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="navi-text">Send Foto</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('admin.export.reservationList', $reservation->id) }}" class="navi-link">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-md svg-icon-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z" fill="#000000"/>
                                                                    <rect fill="#000000" opacity="0.3" x="8" y="2" width="8" height="2" rx="1"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="navi-text">Rezervační list</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('admin.export.reservationInvoice', $reservation->id) }}" class="navi-link">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z" fill="#000000"/>
                                                                    <rect fill="#000000" opacity="0.3" x="8" y="2" width="8" height="2" rx="1"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="navi-text">Zálohová faktura</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('admin.export.depositeAccount', $reservation->id) }}" class="navi-link {{$pdf_buttons_disabled_class}}">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><g><path d="M409.6,324.267c9.412,0,17.067,7.654,17.067,17.067c0,4.71,3.814,8.533,8.533,8.533s8.533-3.823,8.533-8.533 c0-15.855-10.914-29.107-25.6-32.922V307.2c0-4.71-3.814-8.533-8.533-8.533s-8.533,3.823-8.533,8.533v1.212 c-14.686,3.814-25.6,17.067-25.6,32.922c0,18.825,15.309,34.133,34.133,34.133c9.412,0,17.067,7.654,17.067,17.067 c0,9.412-7.654,17.067-17.067,17.067c-9.412,0-17.067-7.654-17.067-17.067c0-4.71-3.814-8.533-8.533-8.533 c-4.719,0-8.533,3.823-8.533,8.533c0,15.855,10.914,29.107,25.6,32.922v1.212c0,4.71,3.814,8.533,8.533,8.533 s8.533-3.823,8.533-8.533v-1.212c14.686-3.814,25.6-17.067,25.6-32.922c0-18.825-15.309-34.133-34.133-34.133 c-9.412,0-17.067-7.654-17.067-17.067C392.533,331.921,400.188,324.267,409.6,324.267z"/> <path d="M401.067,187.733c4.719,0,8.533-3.823,8.533-8.533s-3.814-8.533-8.533-8.533h-51.2c-4.719,0-8.533,3.823-8.533,8.533 s3.814,8.533,8.533,8.533H401.067z"/> <path d="M341.333,366.933c0-4.71-3.814-8.533-8.533-8.533H256c-4.71,0-8.533,3.823-8.533,8.533s3.823,8.533,8.533,8.533h76.8 C337.519,375.467,341.333,371.644,341.333,366.933z"/> <path d="M213.333,187.733h102.4c4.719,0,8.533-3.823,8.533-8.533s-3.814-8.533-8.533-8.533h-102.4 c-4.71,0-8.533,3.823-8.533,8.533S208.623,187.733,213.333,187.733z"/> <path d="M469.333,68.267H170.667c-4.71,0-8.533,3.823-8.533,8.533s3.823,8.533,8.533,8.533h298.667 c14.114,0,25.6,11.486,25.6,25.6v384H153.6v-384c0-23.526-19.14-42.667-42.667-42.667c-23.526,0-42.667,19.14-42.667,42.667 v290.133c0,14.114-11.486,25.6-25.6,25.6s-25.6-11.486-25.6-25.6v-384H358.4v25.6c0,4.71,3.814,8.533,8.533,8.533 s8.533-3.823,8.533-8.533V8.533c0-4.71-3.814-8.533-8.533-8.533H8.533C3.823,0,0,3.823,0,8.533v392.533 c0,23.526,19.14,42.667,42.667,42.667c23.526,0,42.667-19.14,42.667-42.667V110.933c0-14.114,11.486-25.6,25.6-25.6 s25.6,11.486,25.6,25.6v315.733H93.867c-4.71,0-8.533,3.823-8.533,8.533s3.823,8.533,8.533,8.533h42.667v59.733 c0,4.71,3.823,8.533,8.533,8.533h358.4c4.719,0,8.533-3.823,8.533-8.533V110.933C512,87.407,492.86,68.267,469.333,68.267z"/> <path d="M213.333,238.933H435.2c4.719,0,8.533-3.823,8.533-8.533s-3.814-8.533-8.533-8.533H213.333 c-4.71,0-8.533,3.823-8.533,8.533S208.623,238.933,213.333,238.933z"/> <path d="M256,409.6c-4.71,0-8.533,3.823-8.533,8.533s3.823,8.533,8.533,8.533h68.267c4.719,0,8.533-3.823,8.533-8.533 s-3.814-8.533-8.533-8.533H256z"/> <path d="M213.333,426.667h8.533c4.71,0,8.533-3.823,8.533-8.533s-3.823-8.533-8.533-8.533h-8.533 c-4.71,0-8.533,3.823-8.533,8.533S208.623,426.667,213.333,426.667z"/> <path d="M213.333,375.467h8.533c4.71,0,8.533-3.823,8.533-8.533s-3.823-8.533-8.533-8.533h-8.533 c-4.71,0-8.533,3.823-8.533,8.533S208.623,375.467,213.333,375.467z"/> <path d="M256,324.267h59.733c4.719,0,8.533-3.823,8.533-8.533s-3.814-8.533-8.533-8.533H256c-4.71,0-8.533,3.823-8.533,8.533 S251.29,324.267,256,324.267z"/> <path d="M213.333,324.267h8.533c4.71,0,8.533-3.823,8.533-8.533s-3.823-8.533-8.533-8.533h-8.533 c-4.71,0-8.533,3.823-8.533,8.533S208.623,324.267,213.333,324.267z"/></g></g></g>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="navi-text">Daňový doklad k přijaté platbě</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('admin.export.accountTotal', $reservation->id) }}" class="navi-link {{$pdf_buttons_disabled_class}}">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><g><path d="M409.6,324.267c9.412,0,17.067,7.654,17.067,17.067c0,4.71,3.814,8.533,8.533,8.533s8.533-3.823,8.533-8.533 c0-15.855-10.914-29.107-25.6-32.922V307.2c0-4.71-3.814-8.533-8.533-8.533s-8.533,3.823-8.533,8.533v1.212 c-14.686,3.814-25.6,17.067-25.6,32.922c0,18.825,15.309,34.133,34.133,34.133c9.412,0,17.067,7.654,17.067,17.067 c0,9.412-7.654,17.067-17.067,17.067c-9.412,0-17.067-7.654-17.067-17.067c0-4.71-3.814-8.533-8.533-8.533 c-4.719,0-8.533,3.823-8.533,8.533c0,15.855,10.914,29.107,25.6,32.922v1.212c0,4.71,3.814,8.533,8.533,8.533 s8.533-3.823,8.533-8.533v-1.212c14.686-3.814,25.6-17.067,25.6-32.922c0-18.825-15.309-34.133-34.133-34.133 c-9.412,0-17.067-7.654-17.067-17.067C392.533,331.921,400.188,324.267,409.6,324.267z"/> <path d="M401.067,187.733c4.719,0,8.533-3.823,8.533-8.533s-3.814-8.533-8.533-8.533h-51.2c-4.719,0-8.533,3.823-8.533,8.533 s3.814,8.533,8.533,8.533H401.067z"/> <path d="M341.333,366.933c0-4.71-3.814-8.533-8.533-8.533H256c-4.71,0-8.533,3.823-8.533,8.533s3.823,8.533,8.533,8.533h76.8 C337.519,375.467,341.333,371.644,341.333,366.933z"/> <path d="M213.333,187.733h102.4c4.719,0,8.533-3.823,8.533-8.533s-3.814-8.533-8.533-8.533h-102.4 c-4.71,0-8.533,3.823-8.533,8.533S208.623,187.733,213.333,187.733z"/> <path d="M469.333,68.267H170.667c-4.71,0-8.533,3.823-8.533,8.533s3.823,8.533,8.533,8.533h298.667 c14.114,0,25.6,11.486,25.6,25.6v384H153.6v-384c0-23.526-19.14-42.667-42.667-42.667c-23.526,0-42.667,19.14-42.667,42.667 v290.133c0,14.114-11.486,25.6-25.6,25.6s-25.6-11.486-25.6-25.6v-384H358.4v25.6c0,4.71,3.814,8.533,8.533,8.533 s8.533-3.823,8.533-8.533V8.533c0-4.71-3.814-8.533-8.533-8.533H8.533C3.823,0,0,3.823,0,8.533v392.533 c0,23.526,19.14,42.667,42.667,42.667c23.526,0,42.667-19.14,42.667-42.667V110.933c0-14.114,11.486-25.6,25.6-25.6 s25.6,11.486,25.6,25.6v315.733H93.867c-4.71,0-8.533,3.823-8.533,8.533s3.823,8.533,8.533,8.533h42.667v59.733 c0,4.71,3.823,8.533,8.533,8.533h358.4c4.719,0,8.533-3.823,8.533-8.533V110.933C512,87.407,492.86,68.267,469.333,68.267z"/> <path d="M213.333,238.933H435.2c4.719,0,8.533-3.823,8.533-8.533s-3.814-8.533-8.533-8.533H213.333 c-4.71,0-8.533,3.823-8.533,8.533S208.623,238.933,213.333,238.933z"/> <path d="M256,409.6c-4.71,0-8.533,3.823-8.533,8.533s3.823,8.533,8.533,8.533h68.267c4.719,0,8.533-3.823,8.533-8.533 s-3.814-8.533-8.533-8.533H256z"/> <path d="M213.333,426.667h8.533c4.71,0,8.533-3.823,8.533-8.533s-3.823-8.533-8.533-8.533h-8.533 c-4.71,0-8.533,3.823-8.533,8.533S208.623,426.667,213.333,426.667z"/> <path d="M213.333,375.467h8.533c4.71,0,8.533-3.823,8.533-8.533s-3.823-8.533-8.533-8.533h-8.533 c-4.71,0-8.533,3.823-8.533,8.533S208.623,375.467,213.333,375.467z"/> <path d="M256,324.267h59.733c4.719,0,8.533-3.823,8.533-8.533s-3.814-8.533-8.533-8.533H256c-4.71,0-8.533,3.823-8.533,8.533 S251.29,324.267,256,324.267z"/> <path d="M213.333,324.267h8.533c4.71,0,8.533-3.823,8.533-8.533s-3.823-8.533-8.533-8.533h-8.533 c-4.71,0-8.533,3.823-8.533,8.533S208.623,324.267,213.333,324.267z"/></g></g></g>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="navi-text">Faktura-daňový doklad</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-end py-2 justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $reservation->customer_name }}</a>
                                        <span class="text-muted font-weight-bold">Objednávka č. <strong>{{ $reservation->id }}</strong></span>
                                    </div>
                                </div>
                                @if ($reservation->review_block == 1)
                                <div class="mail-blocks">
                                    <span >
                                        <svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                                        <path d="M13,23c0-1.4,0.3-2.8,0.9-4c-0.2,0-0.4-0.1-0.5-0.2l-1.6-1.4l-5.1,4.4C6.5,21.9,6.2,22,6,22c-0.3,0-0.6-0.1-0.8-0.3
                                            c-0.4-0.4-0.3-1,0.1-1.4l4.9-4.2l-4.9-4.2c-0.4-0.4-0.5-1-0.1-1.4c0.4-0.4,1-0.5,1.4-0.1l7.3,6.4l7.3-6.4c0.4-0.4,1-0.3,1.4,0.1
                                            c0.4,0.4,0.3,1-0.1,1.4L21,13.2c0.6-0.1,1.3-0.2,2-0.2c1.4,0,2.8,0.3,4,0.8V9c0-1.7-1.3-3-3-3H4C2.3,6,1,7.3,1,9v14c0,1.7,1.3,3,3,3
                                            h9.5C13.2,25.1,13,24,13,23z"/>
                                        <path d="M17.3,17.3c-3.1,3.1-3.1,8.2,0,11.3s8.2,3.1,11.3,0s3.1-8.2,0-11.3S20.5,14.2,17.3,17.3z M25.8,21.6L24.4,23l1.4,1.4
                                            c0.4,0.4,0.4,1,0,1.4c-0.4,0.4-1,0.4-1.4,0L23,24.4l-1.4,1.4c-0.4,0.4-1,0.4-1.4,0c-0.4-0.4-0.4-1,0-1.4l1.4-1.4l-1.4-1.4
                                            c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0l1.4,1.4l1.4-1.4c0.4-0.4,1-0.4,1.4,0C26.2,20.6,26.2,21.2,25.8,21.6z"/>
                                        </svg>
                                    </span>
                                </div>
                                @endif
                            </div>
                            <div class="py-2">
                                <div class="d-flex align-items-center my-4">
                                    <span class="label label-inline font-weight-bold" style="background: {{ $reservation->status->color }};">{{ $reservation->status->name }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="flex-shrink-0 mr-2">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
                                                    <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="text-muted font-weight-bold">{{ date('d.m.Y', strtotime($reservation->birthdate)) }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="flex-shrink-0 mr-2">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M13.0799676,14.7839934 L15.2839934,12.5799676 C15.8927139,11.9712471 16.0436229,11.0413042 15.6586342,10.2713269 L15.5337539,10.0215663 C15.1487653,9.25158901 15.2996742,8.3216461 15.9083948,7.71292558 L18.6411989,4.98012149 C18.836461,4.78485934 19.1530435,4.78485934 19.3483056,4.98012149 C19.3863063,5.01812215 19.4179321,5.06200062 19.4419658,5.11006808 L20.5459415,7.31801948 C21.3904962,9.0071287 21.0594452,11.0471565 19.7240871,12.3825146 L13.7252616,18.3813401 C12.2717221,19.8348796 10.1217008,20.3424308 8.17157288,19.6923882 L5.75709327,18.8875616 C5.49512161,18.8002377 5.35354162,18.5170777 5.4408655,18.2551061 C5.46541191,18.1814669 5.50676633,18.114554 5.56165376,18.0596666 L8.21292558,15.4083948 C8.8216461,14.7996742 9.75158901,14.6487653 10.5215663,15.0337539 L10.7713269,15.1586342 C11.5413042,15.5436229 12.4712471,15.3927139 13.0799676,14.7839934 Z" fill="#000000"></path>
                                                    <path d="M14.1480759,6.00715131 L13.9566988,7.99797396 C12.4781389,7.8558405 11.0097207,8.36895892 9.93933983,9.43933983 C8.8724631,10.5062166 8.35911588,11.9685602 8.49664195,13.4426352 L6.50528978,13.6284215 C6.31304559,11.5678496 7.03283934,9.51741319 8.52512627,8.02512627 C10.0223249,6.52792766 12.0812426,5.80846733 14.1480759,6.00715131 Z M14.4980938,2.02230302 L14.313049,4.01372424 C11.6618299,3.76737046 9.03000738,4.69181803 7.1109127,6.6109127 C5.19447112,8.52735429 4.26985715,11.1545872 4.51274152,13.802405 L2.52110319,13.985098 C2.22450978,10.7517681 3.35562581,7.53777247 5.69669914,5.19669914 C8.04101739,2.85238089 11.2606138,1.72147333 14.4980938,2.02230302 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="text-muted font-weight-bold">{{ $reservation->phone }}</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="flex-shrink-0 mr-2">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <a href="mailto:{{ $reservation->email }}" class="text-muted text-hover-primary font-weight-bold">{{ $reservation->email }}</a>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="flex-shrink-0 mr-2">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold">{{ $reservation->address }}, {{ $reservation->zip }} {{ $reservation->city }}</a>
                                </div>

                                @if(!empty($reservation->company))
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="flex-shrink-0 mr-2">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
                                                        <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                        <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg>
                                            </span>
                                        </span>
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold">{{ $reservation->company }} {{ $reservation->ico }}</a>
                                    </div>
                                @endif
                            </div>

                            @if($reservation->status->name !== 'V pronájmu' || $reservation->status->name !== 'Storno')
                                <div class="pt-4">
                                    <span>Počet dnů do pronájmu: <span class="font-weight-bold">{{ $reservation->days_to_start }} dni</span></span>
                                </div>
                            @endif

                            @can('Upravit rezervaci')
                                <div class="pt-8">
                                    <reservation-status-select :reservation="{{ $reservation->id }}" :statuses="{{ $statuses }}" :selected="{{ $reservation->status_id }}"></reservation-status-select>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="flex-row-fluid ml-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-custom card-stretch gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Podrobnosti</h3>
                                    </div>
                                    <div class="card-toolbar">
                                        @can('Upravit rezervaci')
                                            <a href="{{ route('admin.rezervace.edit', $reservation->id) }}" class="btn btn-fixed-height btn-default font-weight-bolder font-size-sm px-5 my-1">
                                                <span class="svg-icon svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                        </g>
                                                    </svg>
                                                </span>Upravit
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if(!empty($reservation->extra_price))
                                                <div class="alert alert-custom alert-danger" role="alert">
                                                    <div class="alert-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-xl">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
                                                                    <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="alert-text">Částka k doplacení / vrácení: {{ round($reservation->extra_price) }} Kč</div>
                                                </div>
                                            @endif
                                            @if(!empty($reservation->comment))
                                                <div class="alert alert-custom alert-default" role="alert">
                                                    <div class="alert-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-xl">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
                                                                    <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="alert-text">{{ $reservation->comment }}</div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-md-6 font-weight-bold">Termín rezervace</div>
                                                <div class="col-md-6">{{ $reservation->start_date->format('d.m.Y') }} - {{ $reservation->end_date->format('d.m.Y') }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 font-weight-bold">Vozidlo</div>
                                                <div class="col-md-6">{{ $reservation->caravan->name }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 font-weight-bold">SPZ</div>
                                                <div class="col-md-6 text-primary">{{ $reservation->caravan->spz }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 font-weight-bold">Druh platby  </div>
                                                <div class="col-md-6">{{ $reservation->payment }}</div>
                                            </div>
                                            @if ( $reservation->deposite_date)
                                            <div class="form-group row">
                                                <div class="col-md-6 font-weight-bold">Přijetí zálohové platby </div>
                                                <div class="col-md-6">{{ $reservation->deposite_date->format('Y-m-d H:i:s') }}</div>
                                            </div>
                                            @endif
                                            @if ($reservation->rest_pay_date)
                                            <div class="form-group row">
                                                <div class="col-md-6 font-weight-bold">Přijetí celkové platby</div>
                                                <div class="col-md-6">{{ $reservation->rest_pay_date->format('Y-m-d H:i:s') }}</div>
                                            </div>
                                            @endif

                                            {{-- @if (!is_null($reservation->deposite_date) || !is_null($reservation->rest_pay_date))

                                            @else
                                            @endif --}}
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-md-6 font-weight-bold">Základní cena za pronájem</div>
                                                <div class="col-md-6">{{ number_format($reservation->base_price, 0) }} Kč</div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 font-weight-bold">Cena za příslušenství</div>
                                                <div class="col-md-6">{{ number_format($reservation->accessories_price, 0) }} Kč</div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 font-weight-bold">Aplikovaná sleva</div>
                                                <div class="col-md-6">
                                                    {{ number_format($reservation->discount, 0) }}
                                                    @if(!empty($reservation->coupon_id))
                                                        - {{ $reservation->coupon->name }}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 font-weight-bold">Výše zálohy</div>
                                                <div class="col-md-6 font-weight-boldest text-warning">{{ number_format($reservation->base_deposit, 0) }} Kč</div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 font-weight-bold">Celková cena za pronájem</div>
                                                <div class="col-md-6 font-weight-boldest text-danger">{{ number_format($reservation->total_price, 0) }} Kč</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul>
                                                @foreach($reservation->accessories as $accessory)
                                                    <li>{{ $accessory->name }} - {{ $accessory->pivot->count }}x</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- @if(!empty($reservation->note)) --}}
                                        <div class="separator separator-dashed my-10"></div>
                                        {{-- <div class="row">
                                            <div class="col-md-12">

                                                {{ $reservation->note }}
                                            </div>
                                        </div> --}}

                                    {{-- @endif --}}
                                    @if($reservation->caravan->tenerife)
                                        <div class="row mt-5 mb-5">
                                            @if ($reservation->contract === 1)

                                            <div class="col-md-6">
                                                <button class="btn btn-success">
                                                    Smlouva podepsana
                                                </button>
                                            </div>
                                            @else
                                            <div class="col-md-6">
                                                <button class="btn btn-danger">
                                                    Smlouva ne podepsana
                                                </button>
                                            </div>
                                            @endif

                                            @if ($reservation->bail === 1)
                                            <div class="col-md-6">
                                                <button class="btn btn-success cursor-none">
                                                    Kauce zaplacena
                                                </button>
                                            </div>
                                            @else
                                            <div class="col-md-6">
                                                <button class="btn btn-danger cursor-none">
                                                    Kauce  nezaplacena
                                                </button>
                                            </div>
                                            @endif
                                        </div>
                                    @endif

                                        <p class="pt-5"><strong>Interní poznámka:</strong></p>
                                        @foreach ($reservation->notes as $note_key => $note)
                                            @include('admin.blocks.notes-block')
                                        @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                     {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-custom card-stretch gutter-b">
                                <div class="card-header pt-6">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Historie</span>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="timeline timeline-6 mt-3">
                                        <div class="timeline-item align-items-start">
                                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">03.05.</div>
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-warning icon-xl"></i>
                                            </div>
                                            <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                                                Uhrazena záloha
                                            </div>
                                        </div>
                                        <div class="timeline-item align-items-start">
                                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{ $reservation->created_at->format('d.m.') }}</div>
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-success icon-xl"></i>
                                            </div>
                                            <div class="timeline-content d-flex">
                                                <span class="font-weight-bolder text-dark-75 pl-3 font-size-lg">Vytvořena rezervace</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
