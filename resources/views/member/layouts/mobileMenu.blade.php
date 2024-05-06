<div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="{{ asset("") }}members/assets/images/logo-2.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>{{ Str::ucfirst(auth()->user()->address ?? 'Not availabel') }}</li>
                        <li><a href="tel:{{ auth()->user()->phone }}">{{ auth()->user()->phone }}</a></li>
                        <li><a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a></li>
                    </ul>
                </div>
                <div class="social-links">
                   
                </div>
            </nav>
        </div>