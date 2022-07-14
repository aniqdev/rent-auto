<template>
    
    <footer class="footer">

        <div class="footer-top">

            <div class="footer-top__part">

                <div class="footer-logo">
                    
                    <logo-dark />

                </div>

            </div>

            <div class="footer-top__part">

                <div class="footer-header">

                    <h2>Nabídka</h2>

                </div>

                <the-menu 
                
                    :menuItems="[
                        
                        { name: 'Domů', link: '/', active: true },
                        { name: 'Vozový park', link: '/vozovy-park', active: false },
                        { name: 'Nájemné', link: '/najemne', active: false },
                        { name: 'Cestovní informace', link: '/cestovni-informace', active: false },
                        { name: 'Aktuality', link: '/aktuality', active: false },
                        { name: 'Kontakt', link: '/kontakt', active: false }

                    ]" 
                
                />

            </div>

            <div class="footer-top__part">

                <div class="footer-header">

                    <h2>Užitečné odkazy</h2>

                </div>

                <the-menu 
                
                    :menuItems="[
                        
                        { name: 'O půjčovně', link: '/o-pujcovne', active: false },
                        { name: 'Dárkové poukazy', link: '/darkove-poukazy', active: false },
                        { name: 'Ochrana osobních údajů', link: '/ochrana-osobnich-udaju', active: false }

                    ]" 
                
                />

            </div>

            <div class="footer-top__part">

                <div class="footer-header">

                    <h2>Rezervace</h2>

                </div>

                <div class="footer-contacts">

                    <div class="footer-contact">

                        <a href="mailto:jan.ardel@topobytnevozy.cz">
                            
                            <div href="#0"  class="icon-btn">
                                <i class="icofont-envelope"></i>
                            </div>

                            jan.andel@topobytnevozy.cz
                        
                        </a>

                    </div>

                    <div class="footer-contact">

                        <a href="tel:+420748928122">
                            
                            <div href="#0"  class="icon-btn">
                                <i class="icofont-phone"></i>
                            </div>

                            +420 748 928 122
                        
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

                        <a href="mailto:petr.marcini@topobytnevozy.cz">
                            
                            <div href="#0"  class="icon-btn">
                                <i class="icofont-envelope"></i>
                            </div>

                            petr.marcini@topobytnevozy.cz
                        
                        </a>

                    </div>

                    <div class="footer-contact">

                        <a href="tel:+420748928122">
                            
                            <div href="#0"  class="icon-btn">
                                <i class="icofont-phone"></i>
                            </div>

                            +420 748 928 122
                        
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <div class="footer-bottom">

            <separator-bg class="separator-bg" />

            <a href="#0" class="simple-btn">
                Vytvořila digitální agentura <strong>4WORKS Solutions</strong>
            </a>

            <a href="#0" class="simple-btn">
                Zpátky nahoru
            </a>

        </div>

    </footer>

</template>