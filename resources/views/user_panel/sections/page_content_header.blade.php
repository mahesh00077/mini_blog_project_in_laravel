<!-- Page Header -->
<header class="masthead" style="background-image: url(@yield('bg-img'))">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <!-- <h1>Man must explore, and this is exploration at its greatest</h1> -->
                    <h1>@yield('title')</h1>
                    <!-- <h2 class="subheading">Problems look mighty small from 150 miles up</h2> -->
                    <h2 class="subheading">@yield('sub-heading')</h2>
                    <!-- <span class="meta">Posted by -->

                    <span class="meta">Posted by
                        <a href="#">@yield('posted-by')</a>
                        @yield('posted-date')</span>

                </div>
            </div>
        </div>
    </div>
</header>