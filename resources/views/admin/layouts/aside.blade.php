<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto" id="kt_brand" kt-hidden-height="72" style="">
        <a href="{{ route('admin.dashboard') }}" class="brand-logo">
            <img alt="Logo" src="{{ asset('images/logo-admin.svg') }}" class="h-40px">
        </a>
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 11.5C22 12.3284 21.3284 13 20.5 13H3.5C2.6716 13 2 12.3284 2 11.5C2 10.6716 2.6716 10 3.5 10H20.5C21.3284 10 22 10.6716 22 11.5Z" fill="black"></path>
                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M14.5 20C15.3284 20 16 19.3284 16 18.5C16 17.6716 15.3284 17 14.5 17H3.5C2.6716 17 2 17.6716 2 18.5C2 19.3284 2.6716 20 3.5 20H14.5ZM8.5 6C9.3284 6 10 5.32843 10 4.5C10 3.67157 9.3284 3 8.5 3H3.5C2.6716 3 2 3.67157 2 4.5C2 5.32843 2.6716 6 3.5 6H8.5Z" fill="black"></path>
                    </g>
                </svg>
            </span>
        </button>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu scroll my-4" style="height: 90vh;">
            <ul class="menu-nav">
                <li class="menu-item {{ (request()->routeIs('dashboard*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-text">Nástěnka</span>
                    </a>
                </li>
                <li class="menu-section">
                    <h4 class="menu-text">Hlavní menu</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                @can('Zobrazit rezervace')
                    <li class="menu-item {{ (request()->routeIs('admin.rezervace*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('admin.rezervace.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                        <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Rezervace</span>
                        </a>
                    </li>
                @endcan

                {{-- @can('Zobrazit rezervace')
                <li class="menu-item {{ (request()->routeIs('admin.rezervace.departure')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.rezervace.departure') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-text">Odjezdy</span>
                    </a>
                </li>
            @endcan --}}

                {{-- @can('Zobrazit odjezdy')
                <li class="menu-item {{ (request()->routeIs('admin.rezervace.departure')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.rezervace.departure') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M3,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,19 C14,19.5522847 13.5522847,20 13,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,11 C2,10.4477153 2.44771525,10 3,10 Z" fill="#000000"/>
                                    <rect fill="#000000" opacity="0.3" x="16" y="10" width="5" height="10" rx="1"/>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-text">Odjezdy</span>
                    </a>
                </li>
                @endcan --}}

                @can('Zobrazit kalendář')
                    <li class="menu-item {{ (request()->routeIs('kalendar*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('kalendar') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M3,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,19 C14,19.5522847 13.5522847,20 13,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,11 C2,10.4477153 2.44771525,10 3,10 Z" fill="#000000"/>
                                        <rect fill="#000000" opacity="0.3" x="16" y="10" width="5" height="10" rx="1"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Kalendář</span>
                        </a>
                    </li>
                @endcan

                @can('Zobrazit kupóny')
                    <li class="menu-item {{ (request()->routeIs('kupony*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('kupony.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z" fill="#000000" opacity="0.3" transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) "/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Slevové kupóny</span>
                        </a>
                    </li>
                @endcan

                @can('Zobrazit kupóny')
                    <li class="menu-item {{ (request()->routeIs('admin.slevy*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('admin.slevy.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z" fill="#000000" opacity="0.3" transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) "/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Slevová pravidla</span>
                        </a>
                    </li>
                @endcan

                @can('Zobrazit kupóny')
                    <li class="menu-item {{ (request()->routeIs('lastminute*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('admin.lastminute.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Lastminute</span>
                        </a>
                    </li>
                @endcan

                @can('Zobrazit kupóny')
                    <li class="menu-item {{ (request()->routeIs('admin.options*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('admin.options') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                viewBox="0 0 507.496 507.496" style="enable-background:new 0 0 507.496 507.496;" xml:space="preserve">
                            <g>
                                <g>
                                    <g>
                                        <path d="M254.88,262.344c8.671-12.813,14.798-27.503,17.753-43.228h43.551v-0.022V174.81h-43.551
                                            c-3.02-15.833-9.103-30.458-17.774-43.249l30.695-30.717l-31.342-31.364l-30.738,30.717c-12.77-8.715-27.46-14.798-43.249-17.839
                                            V38.849h-44.285v43.508c-15.79,3.085-30.458,9.124-43.206,17.839L61.994,69.479L30.609,100.8l30.738,30.76
                                            c-8.671,12.791-14.776,27.395-17.796,43.249H0v44.306h43.551c3.063,15.725,9.146,30.415,17.796,43.228l-30.738,30.738
                                            l31.385,31.321l30.695-30.76c12.791,8.671,27.46,14.841,43.249,17.861v43.551h44.328v-43.551
                                            c15.747-3.041,30.458-9.189,43.249-17.817l30.738,30.717l31.342-31.321L254.88,262.344z M158.071,245.26
                                            c-26.661,0-48.319-21.679-48.319-48.362c0-26.705,21.657-48.319,48.319-48.319c26.683,0,48.362,21.614,48.362,48.319
                                            C206.432,223.581,184.754,245.26,158.071,245.26z" fill="#000000" opacity="0.3"/>
                                        <path d="M507.496,365.28v-33.694h-33.09c-2.243-12.015-6.881-23.124-13.525-32.852l23.34-23.34l-23.836-23.836l-23.318,23.34
                                            c-9.728-6.622-20.924-11.238-32.852-13.568v-33.111h-33.694v33.09c-12.015,2.351-23.145,6.946-32.831,13.568l-23.426-23.34
                                            l-23.836,23.814l23.34,23.383c-6.622,9.728-11.238,20.924-13.568,32.874h-33.068v33.694h33.068
                                            c2.308,11.95,6.946,23.167,13.568,32.852l-23.34,23.34l23.836,23.814l23.34-23.383c9.685,6.665,20.88,11.282,32.831,13.611
                                            v33.111h33.694v-33.111c11.993-2.287,23.124-6.946,32.831-13.525l23.34,23.296l23.814-23.814l-23.34-23.34
                                            c6.665-9.685,11.238-20.967,13.525-32.852L507.496,365.28L507.496,365.28z M387.303,385.189
                                            c-20.255,0-36.757-16.48-36.757-36.778c0-20.277,16.502-36.735,36.757-36.735c20.298,0,36.757,16.458,36.757,36.735
                                            C424.06,368.731,407.602,385.189,387.303,385.189z" fill="#000000"/>
                                    </g>
                                </g>
                            </svg>
                            </span>
                            <span class="menu-text">Options</span>
                        </a>
                    </li>
                @endcan

                @can('Zobrazit kupóny')
                <li class="menu-item {{ (request()->routeIs('admin.review*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.review') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 458 458" style="enable-background:new 0 0 458 458;" xml:space="preserve">
                                <g>
                                    <g>
                                        <g>
                                            <path d="M428,41.533H30c-16.568,0-30,13.431-30,30v252c0,16.568,13.432,30,30,30h132.1l43.942,52.243
                                                c5.7,6.777,14.103,10.69,22.959,10.69c8.856,0,17.259-3.912,22.959-10.69l43.942-52.243H428c16.569,0,30-13.432,30-30v-252
                                                C458,54.965,444.569,41.533,428,41.533z M428,323.533H281.932L229,386.465l-52.932-62.932H30v-252h398V323.533z" fill="#000000" opacity="0.3"/>
                                            <path d="M83.379,144.895h292.242c8.284,0,15-6.716,15-15s-6.716-15-15-15H83.379c-8.284,0-15,6.716-15,15
                                                S75.095,144.895,83.379,144.895z" fill="#000000"/>
                                            <path d="M83.379,212.675h182.904c8.284,0,15-6.716,15-15s-6.716-15-15-15H83.379c-8.284,0-15,6.716-15,15
                                                S75.095,212.675,83.379,212.675z" fill="#000000"/>
                                            <path d="M83.379,280.456h244.623c8.284,0,15-6.716,15-15s-6.716-15-15-15H83.379c-8.284,0-15,6.716-15,15
                                                S75.095,280.456,83.379,280.456z" fill="#000000"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-text">Recenze</span>
                    </a>
                </li>
                @endcan

                @can('Zobrazit kupóny')
                <li class="menu-item {{ (request()->routeIs('admin.gallery*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('admin.gallery') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="enable-background:new 0 0 458 458;" >
                                <g>
                                <path fill="#000000" d="M17.5531248,16.4450044 C17.6286997,16.179405 17.9052761,16.0253597 18.1708755,16.1009346 C18.4364749,16.1765095 18.5905202,16.4530859 18.5149453,16.7186853 C18.2719275,17.5727439 17.5931039,18.2421122 16.71594,18.4614032 L8.58845447,20.4931921 C7.21457067,20.8106614 5.86688485,19.9801117 5.55483435,18.6278929 L3.45442103,9.52610182 C3.14793844,8.19801056 3.96175966,6.86917188 5.28405996,6.53859681 L7.17308561,6.06634039 C7.44098306,5.99936603 7.71245031,6.16224638 7.77942467,6.43014383 C7.84639904,6.69804129 7.68351869,6.96950853 7.41562123,7.03648289 L5.52659559,7.50873931 C4.7332154,7.70708435 4.24492267,8.50438756 4.42881223,9.30124232 L6.52922555,18.4030334 C6.71644059,19.2142985 7.52497921,19.7125835 8.35461578,19.5209579 L16.4734044,17.4912607 C17.0000615,17.3595964 17.407086,16.9582414 17.5531248,16.4450044 Z M20,13.2928932 L20,5.5 C20,4.67157288 19.3284271,4 18.5,4 L9.5,4 C8.67157288,4 8,4.67157288 8,5.5 L8,11.2928932 L10.1464466,9.14644661 C10.3417088,8.95118446 10.6582912,8.95118446 10.8535534,9.14644661 L14.5637089,12.8566022 L17.2226499,11.0839749 C17.4209612,10.9517673 17.6850212,10.9779144 17.8535534,11.1464466 L20,13.2928932 L20,13.2928932 Z M19.9874925,14.6945992 L17.4362911,12.1433978 L14.7773501,13.9160251 C14.5790388,14.0482327 14.3149788,14.0220856 14.1464466,13.8535534 L10.5,10.2071068 L8,12.7071068 L8,14.5 C8,15.3284271 8.67157288,16 9.5,16 L18.5,16 C19.2624802,16 19.8920849,15.4310925 19.9874925,14.6945992 L19.9874925,14.6945992 Z M9.5,3 L18.5,3 C19.8807119,3 21,4.11928813 21,5.5 L21,14.5 C21,15.8807119 19.8807119,17 18.5,17 L9.5,17 C8.11928813,17 7,15.8807119 7,14.5 L7,5.5 C7,4.11928813 8.11928813,3 9.5,3 Z M16,5 L18,5 C18.5522847,5 19,5.44771525 19,6 L19,8 C19,8.55228475 18.5522847,9 18,9 L16,9 C15.4477153,9 15,8.55228475 15,8 L15,6 C15,5.44771525 15.4477153,5 16,5 Z M16,6 L16,8 L18,8 L18,6 L16,6 Z"/>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-text">Gallery</span>
                    </a>
                </li>
                @endcan

                <li class="menu-section">
                    <h4 class="menu-text">Správa karavanů</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item menu-item-submenu {{ (request()->routeIs('admin.karavany*') || request()->routeIs('admin.karavany-kategorie*') || request()->routeIs('admin.karavany-vlasnosti*') || request()->routeIs('admin.karavany-vlasnost*')) ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M12,19 C15.8659932,19 19,15.8659932 19,12 C19,8.13400675 15.8659932,5 12,5 C8.13400675,5 5,8.13400675 5,12 C5,15.8659932 8.13400675,19 12,19 Z M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z" fill="#000000" fill-rule="nonzero"/>
                                    <path d="M12,9.66666667 C11.3333333,8.64514991 11,7.88126102 11,7.375 C11,6.61560847 11.4477153,6 12,6 C12.5522847,6 13,6.61560847 13,7.375 C13,7.88126102 12.6666667,8.64514991 12,9.66666667 Z M12,14 C12.6666667,15.0215168 13,15.7854056 13,16.2916667 C13,17.0510582 12.5522847,17.6666667 12,17.6666667 C11.4477153,17.6666667 11,17.0510582 11,16.2916667 C11,15.7854056 11.3333333,15.0215168 12,14 Z M14.3333333,12 C15.3548501,11.3333333 16.118739,11 16.625,11 C17.3843915,11 18,11.4477153 18,12 C18,12.5522847 17.3843915,13 16.625,13 C16.118739,13 15.3548501,12.6666667 14.3333333,12 Z M10,12 C8.97848324,12.6666667 8.21459435,13 7.70833333,13 C6.9489418,13 6.33333333,12.5522847 6.33333333,12 C6.33333333,11.4477153 6.9489418,11 7.70833333,11 C8.21459435,11 8.97848324,11.3333333 10,12 Z M13.6499158,10.3500842 C13.9008327,9.15635823 14.2052815,8.38050496 14.5632621,8.02252436 C15.100233,7.48555345 15.8521164,7.36683502 16.2426407,7.75735931 C16.633165,8.1478836 16.5144465,8.89976702 15.9774756,9.43673792 C15.619495,9.79471852 14.8436418,10.0991673 13.6499158,10.3500842 Z M10.5857864,13.4142136 C10.3348695,14.6079395 10.0304208,15.3837928 9.67244018,15.7417734 C9.13546928,16.2787443 8.38358587,16.3974627 7.99306157,16.0069384 C7.60253728,15.6164141 7.72125572,14.8645307 8.25822662,14.3275598 C8.61620722,13.9695792 9.39206049,13.6651305 10.5857864,13.4142136 Z M13.6499158,13.6499158 C14.8436418,13.9008327 15.619495,14.2052815 15.9774756,14.5632621 C16.5144465,15.100233 16.633165,15.8521164 16.2426407,16.2426407 C15.8521164,16.633165 15.100233,16.5144465 14.5632621,15.9774756 C14.2052815,15.619495 13.9008327,14.8436418 13.6499158,13.6499158 Z M10.5857864,10.5857864 C9.39206049,10.3348695 8.61620722,10.0304208 8.25822662,9.67244018 C7.72125572,9.13546928 7.60253728,8.38358587 7.99306157,7.99306157 C8.38358587,7.60253728 9.13546928,7.72125572 9.67244018,8.25822662 C10.0304208,8.61620722 10.3348695,9.39206049 10.5857864,10.5857864 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-text">Vozidla</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="440" style="display: none; overflow: hidden;">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">Vozidla</span>
                                </span>
                            </li>

                            @can('Zobrazit vozidla')
                                <li class="menu-item {{ (request()->routeIs('admin.karavany.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                    <a href="{{ route('admin.karavany.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Karavany</span>
                                    </a>
                                </li>
                            @endcan

                            @can('Zobrazit kategorií vozidel')
                                <li class="menu-item {{ (request()->routeIs('admin.karavany-kategorie*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                    <a href="{{ route('admin.karavany-kategorie.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Kategorie karavanů</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                @can('Zobrazit příslušenství')
                    <li class="menu-item {{ (request()->routeIs('admin.prislusenstvi*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('admin.prislusenstvi.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M10,6 L10,5 C10,4.44771525 10.4477153,4 11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 L14,6 L14.383822,6 C16.2072694,6 18.0148165,6.33909803 19.7142779,7 L19.8017005,7.03399769 C20.0590665,7.1340845 20.1865664,7.42385724 20.0864796,7.6812232 C20.0117407,7.87340889 19.8266841,8 19.6204773,8 L4.37951429,8 C4.10337192,8 3.87951429,7.77614237 3.87951429,7.5 C3.87951429,7.2937932 4.0061054,7.10873661 4.19829109,7.03399769 L4.28571369,7 C5.98517509,6.33909803 7.79272222,6 9.61616964,6 L10,6 Z M20,11 L22,11 C22.5522847,11 23,11.4477153 23,12 C23,12.5522847 22.5522847,13 22,13 L20,13 C19.4477153,13 19,12.5522847 19,12 C19,11.4477153 19.4477153,11 20,11 Z M2,11 L4,11 C4.55228475,11 5,11.4477153 5,12 C5,12.5522847 4.55228475,13 4,13 L2,13 C1.44771525,13 1,12.5522847 1,12 C1,11.4477153 1.44771525,11 2,11 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M5,9 L19,9 C19.5522847,9 20,9.44771525 20,10 L20,17 C20,19.209139 18.209139,21 16,21 L8,21 C5.790861,21 4,19.209139 4,17 L4,10 C4,9.44771525 4.44771525,9 5,9 Z" fill="#000000"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Volitelné příslušenství</span>
                        </a>
                    </li>
                @endcan

                @can('Zobrazit sezóny')
                    <li class="menu-item {{ (request()->routeIs('admin.sezony*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('admin.sezony.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M8,14 C8,11.790861 9.790861,10 12,10 C14.209139,10 16,11.790861 16,14 C16,14 8,14 8,14 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M19.5,11 L21,11 C21.8284271,11 22.5,11.6715729 22.5,12.5 C22.5,13.3284271 21.8284271,14 21,14 L19.5,14 C18.6715729,14 18,13.3284271 18,12.5 C18,11.6715729 18.6715729,11 19.5,11 Z M16.0606602,6.87132034 L17.1213203,5.81066017 C17.7071068,5.22487373 18.6568542,5.22487373 19.2426407,5.81066017 C19.8284271,6.39644661 19.8284271,7.34619408 19.2426407,7.93198052 L18.1819805,8.99264069 C17.5961941,9.57842712 16.6464466,9.57842712 16.0606602,8.99264069 C15.4748737,8.40685425 15.4748737,7.45710678 16.0606602,6.87132034 Z M3,11 L4.5,11 C5.32842712,11 6,11.6715729 6,12.5 C6,13.3284271 5.32842712,14 4.5,14 L3,14 C2.17157288,14 1.5,13.3284271 1.5,12.5 C1.5,11.6715729 2.17157288,11 3,11 Z M12,2.5 C12.8284271,2.5 13.5,3.17157288 13.5,4 L13.5,5.5 C13.5,6.32842712 12.8284271,7 12,7 C11.1715729,7 10.5,6.32842712 10.5,5.5 L10.5,4 C10.5,3.17157288 11.1715729,2.5 12,2.5 Z M4.81066017,5.81066017 C5.39644661,5.22487373 6.34619408,5.22487373 6.93198052,5.81066017 L7.99264069,6.87132034 C8.57842712,7.45710678 8.57842712,8.40685425 7.99264069,8.99264069 C7.40685425,9.57842712 6.45710678,9.57842712 5.87132034,8.99264069 L4.81066017,7.93198052 C4.22487373,7.34619408 4.22487373,6.39644661 4.81066017,5.81066017 Z M2.5,16 L21.5,16 C21.7761424,16 22,16.2238576 22,16.5 C22,16.7761424 21.7761424,17 21.5,17 L2.5,17 C2.22385763,17 2,16.7761424 2,16.5 C2,16.2238576 2.22385763,16 2.5,16 Z M2.5,18 L7.5,18 C7.77614237,18 8,18.2238576 8,18.5 C8,18.7761424 7.77614237,19 7.5,19 L2.5,19 C2.22385763,19 2,18.7761424 2,18.5 C2,18.2238576 2.22385763,18 2.5,18 Z M14.5,20 L21.5,20 C21.7761424,20 22,20.2238576 22,20.5 C22,20.7761424 21.7761424,21 21.5,21 L14.5,21 C14.2238576,21 14,20.7761424 14,20.5 C14,20.2238576 14.2238576,20 14.5,20 Z M9.5,18 L21.5,18 C21.7761424,18 22,18.2238576 22,18.5 C22,18.7761424 21.7761424,19 21.5,19 L9.5,19 C9.22385763,19 9,18.7761424 9,18.5 C9,18.2238576 9.22385763,18 9.5,18 Z M2.5,20 L12.5,20 C12.7761424,20 13,20.2238576 13,20.5 C13,20.7761424 12.7761424,21 12.5,21 L2.5,21 C2.22385763,21 2,20.7761424 2,20.5 C2,20.2238576 2.22385763,20 2.5,20 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Sezóny</span>
                        </a>
                    </li>
                @endcan

                @canany(['Správa oznámení', 'Vytvořit příspěvek', 'Vytvořit stránku', 'Vytvořit často kladenou otázku'])
                    <li class="menu-section">
                        <h4 class="menu-text">Webové stránky</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>
                @endcan

                @can('Správa oznámení')
                    <li class="menu-item" aria-haspopup="true">
                        <a href="#" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                        <rect fill="#000000" x="11" y="7" width="2" height="8" rx="1"/>
                                        <rect fill="#000000" x="11" y="16" width="2" height="2" rx="1"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Oznámení</span>
                        </a>
                    </li>
                @endcan

                @can('Vytvořit příspěvek')
                    <li class="menu-item menu-item-submenu {{ (request()->routeIs('admin.aktuality*')) ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M10.5,8 L6,19 C6.0352633,19.1332661 6.06268417,19.2312688 6.08226261,19.2940083 C6.43717645,20.4313361 8.07642225,21 9,21 C10.5,21 11,19 12.5,19 C14,19 14.5917308,20.9843119 16,21 C16.9388462,21.0104588 17.9388462,20.3437921 19,19 L14.5,8 L10.5,8 Z" fill="#000000"/>
                                        <path d="M11.3,6 L12.5,3 L13.7,6 L11.3,6 Z M14.5,8 L10.5,8 L14.5,8 Z" fill="#000000"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Aktuality</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu" kt-hidden-height="440" style="display: none; overflow: hidden;">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Aktuality</span>
                                    </span>
                                </li>
                                <li class="menu-item {{ (request()->routeIs('admin.aktuality.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                    <a href="{{ route('admin.aktuality.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Aktuality</span>
                                    </a>
                                </li>
                                <li class="menu-item {{ (request()->routeIs('aktuality-kategorie*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                                    <a href="{{ route('aktuality-kategorie.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Kategorie aktualit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('Vytvořit pojem')
                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('admin.slovnik.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M7.34,19 L7.34,4.8 L12.68,4.8 C15,4.8 16.9,6.7 16.9,9.02 C16.9,10.02 16.52,10.84 15.9,11.46 C17.1,12.1 17.9,13.26 17.9,14.78 C17.9,17.12 16,19 13.6,19 L7.34,19 Z M10.54,16.06 L13.3,16.06 C14.16,16.06 14.78,15.44 14.78,14.66 C14.78,13.88 14.16,13.24 13.3,13.24 L10.54,13.24 L10.54,16.06 Z M10.54,10.54 L12.32,10.54 C13.18,10.54 13.8,9.92 13.8,9.14 C13.8,8.36 13.18,7.72 12.32,7.72 L10.54,7.72 L10.54,10.54 Z" fill="#000000"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Slovník pojmů</span>
                        </a>
                    </li>
                @endcan

                @can('Vytvořit stránku')
                    <li class="menu-item {{ (request()->routeIs('admin.stranky*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('admin.stranky.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Stránky</span>
                        </a>
                    </li>
                @endcan

                @can('Vytvořit často kladenou otázku')
                    <li class="menu-item {{ (request()->routeIs('admin.otazky*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('admin.otazky.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"></path>
                                        <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"></path>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">FAQ</span>
                        </a>
                    </li>
                @endcan

                @can('Správa slideru')
                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('slider.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L10.1818182,16 C8.76751186,16 8,15.2324881 8,13.8181818 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Slider</span>
                        </a>
                    </li>
                @endcan

                @can('Nastavení rezervací')
                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('slider.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
                                        <rect fill="#000000" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13" y="6" width="2" height="12" rx="1"/>
                                        <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Opuštěné rezervace</span>
                        </a>
                    </li>
                @endcan

                <li class="menu-section">
                    <h4 class="menu-text">Nastavení</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                @can('Zobrazit uživatele')
                    <li class="menu-item {{ (request()->routeIs('uzivatele*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('uzivatele.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Uživatelé</span>
                        </a>
                    </li>
                @endcan

                @can('Nastavení rezervací')
                    <li class="menu-item {{ (request()->routeIs('tarify*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('admin.rezervace.settings') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Rezervace</span>
                        </a>
                    </li>
                @endcan

                @can('Nastavení rezervací')
                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('admin.exporty.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) " x="11" y="2" width="2" height="12" rx="1"/>
                                        <path d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) "/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Exporty</span>
                        </a>
                    </li>
                @endcan

                @can('Nastavení rezervací')
                    <li class="menu-item {{ (request()->routeIs('admin.statusy*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                        <a href="{{ route('admin.statusy.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/>
                                        <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-text">Statusy</span>
                        </a>
                    </li>
                @endcan

            </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 548px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 275px;"></div></div></div>
    </div>
</div>
