<?php
include __DIR__ . '/../header.php';
?>
<style>
    #footer-area {
        position: absolute;
        bottom: 0;
        right: 0;
        left: 0;
        height: 0px;
    }

    .video-overlay {
        position: absolute;
        top: 1;
        left: 0;
        width: 100%;
        height: 80%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }
</style>
<video autoplay loop muted id="bg-video">
    <!-- Set the video source using PHP -->
    <source src="https://assets.mixkit.co/videos/preview/mixkit-stage-of-an-electronic-music-festival-4188-large.mp4" type="video/mp4">
</video>

<div class="video-overlay">
    <img src="https://i.imgur.com/Exlcutf.png" alt="logo" width="150px">
    <a href="/event" class="btn btn-dark">Events</a> <br>
    <a href="/merchandise" class="btn btn-dark">Merchandise</a>
</div>

<div class="container mt-5" id="footer-area">
    <footer class="py-3 text-light" id="footerid">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5>Find us on</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="https://www.instagram.com/unit_240/" target="_blank" class="nav-link p-0 text-light">Instagram</a></li>
                    <li class="nav-item mb-2"><a href="https://soundcloud.com/motche-pejhanfar-648343451" target="_blank" class="nav-link p-0 text-light">SoundCloud</a></li>
                    <li class="nav-item mb-2"><a href="https://www.youtube.com/@unit2402" target="_blank" class="nav-link p-0 text-light">YouTube</a></li>
                    <li class="nav-item mb-2"><a href="https://open.spotify.com/user/315deul4yq4yacitwdgudo6zkgmm?si=9CSWNY2kRRuY3PFg2cXsYA" target="_blank" class="nav-link p-0 text-light">Spotify</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="/resident" class="nav-link p-0 text-light">Residents</a></li>
                    <li class="nav-item mb-2"><a href="/event" class="nav-link p-0 text-light">Events</a></li>
                    <li class="nav-item mb-2"><a href="/merchandise" class="nav-link p-0 text-light">Merchandise</a></li>
                    <li class="nav-item mb-2"><a href="/home/about" class="nav-link p-0 text-light">About</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Other</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Privacy Policy</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Terms and Conditions</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Shipping and Return</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Jobs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQ</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Contact</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="mailto:unit240@gmail.com?subject=UNIT240%20%7C%20Subject" class="nav-link p-0 text-light">Email</a></li>
                </ul>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>&copy; Copyright UNIT240 All rights reserved.</p>
        </div>
    </footer>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>