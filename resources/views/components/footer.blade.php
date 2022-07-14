<footer class="footer">

    {{-- <div class="footer-top">

        <div class="footer-top__part">

            <div class="footer-logo">

                <x-logo-dark />

            </div>

        </div>

        <div class="footer-top__part">

            <div class="footer-header">

                <h2>Nabídka</h2>

            </div>

            <x-main-menu :items="$footer_menu1" />

        </div>

        <div class="footer-top__part">

            <div class="footer-header">

                <h2>Užitečné odkazy</h2>

            </div>

            <x-main-menu :items="$footer_menu2" />

        </div>

        <div class="footer-top__part">

            <div class="footer-header">

                <h2>Rezervace</h2>

            </div>

            <div class="footer-contacts">

                <div class="footer-contact">
                    <a href="mailto:rezervace@topobytnevozy.cz">
                        <div class="icon-btn">
                            <i class="icofont-envelope"></i>
                        </div>
                        rezervace@topobytnevozy.cz
                    </a>
                </div>

                <div class="footer-contact">
                    <a href="tel:00420734757756">
                        <div class="icon-btn">
                            <i class="icofont-phone"></i>
                        </div>
                        +420 734 757 756
                    </a>
                </div>

            </div>

        </div>


        <div class="footer-top__part">

            <div class="footer-header">

                <h2>Technické dotazy</h2>

            </div>

            <div class="footer-contacts">

                <div class="footer-contact">
                    <a href="mailto:servis@topobytnevozy.cz">
                        <div class="icon-btn">
                            <i class="icofont-envelope"></i>
                        </div>
                        servis@topobytnevozy.cz
                    </a>
                </div>

                <div class="footer-contact">
                    <a href="tel:00420734757756">
                        <div class="icon-btn">
                            <i class="icofont-phone"></i>
                        </div>
                        +420 734 757 756
                    </a>
                </div>

            </div>

        </div>

    </div> --}}


{{-- 2 footer --}}



    <div class="container mt-5">

        <div class="row">

            <div class="col-xl-1 footer-div-blocks">
                <div class="footer-logo-dark" >
                    <x-logo-dark />
                </div>
            </div>
            <div class="col-xl-2 footer-div-blocks">
                    <h2 style="font-size: 24px">Nabídka</h2>
                <x-main-menu :items="$footer_menu1" />
            </div>
            <div class="col-xl-3 footer-div-blocks">
                    <h2  style="font-size: 24px" >Užitečné odkazy</h2>
                <x-main-menu :items="$footer_menu2" />
            </div>
            <div class="col-xl-3 footer-div-blocks">
                <h2  style="font-size: 24px" >Rezervace</h2>
                    <a href="mailto:rezervace@topobytnevozy.cz">
                        <div class="icon-btn">
                            <i class="icofont-envelope"></i>
                        </div>
                        rezervace@topobytnevozy.cz
                    </a>

                    <a href="tel:00420734757756">
                        <div class="icon-btn">
                            <i class="icofont-phone"></i>
                        </div>
                        +420 734 757 756
                    </a>
            </div>
            <div class="col-xl-3 footer-div-blocks">
                <h2  style="font-size: 24px" >Technické dotazy</h2>

                <a href="mailto:servis@topobytnevozy.cz">
                    <div class="icon-btn">
                        <i class="icofont-envelope"></i>
                    </div>
                    servis@topobytnevozy.cz
                </a>

                <a href="tel:00420734757756">
                    <div class="icon-btn">
                        <i class="icofont-phone"></i>
                    </div>
                    +420 734 757 756
                </a>
            </div>
        </div>

    </div>


    <div class="footer-bottom">

        <separator-bg class="separator-bg"></separator-bg>
        <a href="https://posunemevasvys.cz/" class="simple-btn">
            Vytvořila digitální agentura <strong>4WORKS Solutions</strong>
        </a>
        <a href="#" class="simple-btn" id="scrollToTop">
            <i class="icofont-rounded-up"></i>
            <span>Zpátky nahoru</span>
        </a>
    </div>

</footer>
